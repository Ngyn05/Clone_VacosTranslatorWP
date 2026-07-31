/**
 * 2007-2025 patworx.de
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade AmazonPay to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    patworx multimedia GmbH <service@patworx.de>
 *  @copyright 2007-2025 patworx multimedia GmbH
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

function getEstimatedOrderAmount() {
    if (!amazonpay.is_prestashop16) {
        let estimatedAmount = 0;
        if (typeof prestashop.cart !== 'undefined' && typeof prestashop.cart.totals.total_including_tax.amount !== 'undefined') {
            estimatedAmount = parseFloat(prestashop.cart.totals.total_including_tax.amount);
        } else if ($(".cart-summary-line.cart-total span.value").length > 0) {
            estimatedAmount = parseFloat($(".cart-summary-line.cart-total span.value").html().replace(',', '.').replace(/[^\d.]+/g, ""));
        }
        if ($("body").attr("id") == 'product' && $(".current-price-value[content]").length > 0) {
            if ($("#quantity_wanted").length > 0) {
                estimatedAmount = parseFloat(estimatedAmount) + parseFloat(($("#quantity_wanted").val() * $(".current-price-value[content]").attr('content')).toFixed(2));
            }
        } else if ($("body").attr("id") == 'product' && $("span[itemprop=price]").length > 0) {
            if ($("#quantity_wanted").length > 0) {
                estimatedAmount = parseFloat(estimatedAmount) + parseFloat(($("#quantity_wanted").val() * $("span[itemprop=price]").attr('content')).toFixed(2));
            }
        }
        if (estimatedAmount > 0) {
            return estimatedAmount.toFixed(2);
        }
    } else {
        if ($(".price.cart_block_total.ajax_block_cart_total").length > 0) {
            return parseFloat($(".price.cart_block_total.ajax_block_cart_total").html().replace(',', '.'));
        }
    }
    return amazonpay.estimatedOrderAmount;
}

function amazonPayInit()
{
    let initCheckoutLoad = {
        merchantId: amazonpay.merchant_id,
        ledgerCurrency: amazonpay.ledgerCurrency,
        sandbox: amazonpay.sandbox,
        checkoutLanguage: amazonpay.checkoutLanguage,
        productType: amazonpay.checkoutType,
        placement: 'Checkout',
        createCheckoutSessionConfig: {
            payloadJSON: amazonpay.button_payload,
            signature: amazonpay.button_signature,
            publicKeyId: amazonpay.public_key_id
        }
    };
    if (getEstimatedOrderAmount() > 0) {
        initCheckoutLoad.estimatedOrderAmount = { "amount": getEstimatedOrderAmount(), "currencyCode": amazonpay.customerCurrencyCode};
    }
    amazon.Pay.initCheckout(initCheckoutLoad);
}
function amazonPayInitApb()
{
    let initCheckoutLoad = {
        merchantId: amazonpay.merchant_id,
        ledgerCurrency: amazonpay.ledgerCurrency,
        sandbox: amazonpay.sandbox,
        checkoutLanguage: amazonpay.checkoutLanguage,
        productType: amazonpay.checkoutType,
        placement: 'Checkout',
        createCheckoutSessionConfig: {
            payloadJSON: amazonpay.button_payload_apb,
            signature: amazonpay.button_signature_apb,
            publicKeyId: amazonpay.public_key_id
        }
    }
    if (getEstimatedOrderAmount() > 0) {
        initCheckoutLoad.estimatedOrderAmount = { "amount": getEstimatedOrderAmount(), "currencyCode": amazonpay.customerCurrencyCode};
    }
    amazon.Pay.initCheckout(initCheckoutLoad);
}

let setEstimatedAmount = getEstimatedOrderAmount();
let AmazonPayProductClickInProcess = false;
let AmazonPayButtonGeneratedIdCounter = 0;
let AmazonPayProductActionLockTimeout = null;
let AmazonPayProductActionLockAttribute = 'data-amazonpay-processing-locked';
let AmazonPayProductActionLockTimeoutDelay = 15000;

function dispatchAmazonPayProductButtonClick()
{
    let eventName = 'amazonPayProductButtonClick';

    if (typeof window.CustomEvent === 'function') {
        document.dispatchEvent(new CustomEvent(eventName));
        return;
    }

    let event = document.createEvent('CustomEvent');
    event.initCustomEvent(eventName, true, true, {});
    document.dispatchEvent(event);
}

function isAmazonPayElementVisible(element)
{
    return !!(element.offsetWidth || element.offsetHeight || element.getClientRects().length);
}

function getAmazonPayProductActionsWrapper(amazonPayButton)
{
    let wrapper = amazonPayButton.closest('.js-product-amazonpay-actions');

    return wrapper.length > 0 ? wrapper : $();
}

function hasAvailableAddToCartButton(wrapper)
{
    let scope = wrapper.closest('.product-add-to-cart');
    if (scope.length === 0) {
        scope = wrapper.closest('#add-to-cart-or-refresh');
    }

    if (scope.length === 0) {
        return false;
    }

    return scope.find('button[data-button-action="add-to-cart"]').filter(function() {
        return isAmazonPayElementVisible(this)
            && !this.disabled
            && !$(this).hasClass('disabled')
            && $(this).attr('aria-disabled') !== 'true';
    }).length > 0;
}

function updateAmazonPayProductButtonState(amazonPayButton)
{
    if (!amazonPayButton.hasClass('amazonPayProductButton')) {
        return;
    }

    let wrapper = getAmazonPayProductActionsWrapper(amazonPayButton);
    if (wrapper.length === 0) {
        return;
    }

    let isDisabled = !hasAvailableAddToCartButton(wrapper);

    wrapper.toggleClass('is-disabled', isDisabled);
    wrapper.attr('aria-disabled', isDisabled ? 'true' : 'false');
    wrapper.attr('data-erp-has-quantity', isDisabled ? '0' : '1');
}

function updateAmazonPayProductButtonsState()
{
    $('.amazonPayProductButton').each(function() {
        updateAmazonPayProductButtonState($(this));
    });
}

function hasRenderedAmazonPayButton(amazonPayButton)
{
    let buttonElement = amazonPayButton.get(0);

    return !!(
        buttonElement
        && buttonElement.shadowRoot
        && buttonElement.shadowRoot.querySelector('.amazonpay-button-container')
    );
}

function resetAmazonPayProductButtonForRender(amazonPayButton)
{
    amazonPayButton.attr('data-rendered', '0');
    amazonPayButton.removeAttr('rendered role aria-label style');
    amazonPayButton.removeClass(function(index, className) {
        return className
            .split(/\s+/)
            .filter(function(singleClassName) {
                return singleClassName.indexOf('amazonpay-') === 0;
            })
            .join(' ');
    });
}

function resetStaleAmazonPayProductButtons()
{
    $('.amazonPayProductButton[data-rendered="1"]').each(function() {
        let amazonPayButton = $(this);

        if (!hasRenderedAmazonPayButton(amazonPayButton)) {
            resetAmazonPayProductButtonForRender(amazonPayButton);
        }
    });
}

function shouldStretchAmazonPayButton(amazonPayButton)
{
    return amazonPayButton.hasClass('amazonPayProductButton')
        || amazonPayButton.closest('.amazonPayShoppingCartFooterButton').length > 0
        || (
            $('body').attr('id') === 'cart'
            && amazonPayButton.attr('data-placement') === 'Cart'
        );
}

function stretchAmazonPayProductButton(amazonPayButton)
{
    if (!shouldStretchAmazonPayButton(amazonPayButton)) {
        return;
    }

    amazonPayButton.css({
        width: '100%',
        maxWidth: '100%'
    });

    let buttonElement = amazonPayButton.get(0);
    if (!buttonElement || !buttonElement.shadowRoot) {
        return;
    }

    let buttonContainer = buttonElement.shadowRoot.querySelector('.amazonpay-button-container');
    if (!buttonContainer) {
        return;
    }

    buttonContainer.style.width = '100%';
    buttonContainer.style.maxWidth = '100%';
}

function stretchAmazonPayProductButtons()
{
    $(
        '.amazonPayProductButton, '
        + '.amazonPayShoppingCartFooterButton .amazonPayButton, '
        + 'body#cart .amazonPayButton[data-placement="Cart"]'
    ).each(function() {
        stretchAmazonPayProductButton($(this));
    });
}

function isAmazonPayProductButtonDisabled(amazonPayButton)
{
    updateAmazonPayProductButtonState(amazonPayButton);

    let wrapper = getAmazonPayProductActionsWrapper(amazonPayButton);
    if (wrapper.length === 0) {
        return false;
    }

    return wrapper.hasClass('is-disabled') || wrapper.attr('aria-disabled') === 'true';
}

function getAmazonPayProductAddToCartButtons()
{
    return $(
        '.product-actions .product-add-to-cart button[data-button-action="add-to-cart"], '
        + '.product-actions-bottom .product-add-to-cart button[data-button-action="add-to-cart"]'
    );
}

function markAmazonPayProductActionButtonsForLock()
{
    getAmazonPayProductAddToCartButtons().each(function() {
        let button = $(this);

        if (
            !button.prop('disabled')
            && !button.hasClass('disabled')
            && button.attr('aria-disabled') !== 'true'
        ) {
            button.attr(AmazonPayProductActionLockAttribute, '1');
        }
    });
}

function clearAmazonPayProductActionButtonLockMarks()
{
    getAmazonPayProductAddToCartButtons().removeAttr(AmazonPayProductActionLockAttribute);
}

function lockAmazonPayProductActions()
{
    getAmazonPayProductAddToCartButtons()
        .filter('[' + AmazonPayProductActionLockAttribute + '="1"]')
        .each(function() {
            $(this)
                .prop('disabled', true)
                .addClass('disabled')
                .attr('aria-disabled', 'true');
        });

    $('.js-product-amazonpay-actions')
        .addClass('is-disabled')
        .attr('aria-disabled', 'true');

    if (AmazonPayProductActionLockTimeout) {
        clearTimeout(AmazonPayProductActionLockTimeout);
    }

    AmazonPayProductActionLockTimeout = setTimeout(function() {
        AmazonPayProductClickInProcess = false;
        unlockAmazonPayProductActions();
    }, AmazonPayProductActionLockTimeoutDelay);
}

function unlockAmazonPayProductActions()
{
    if (AmazonPayProductActionLockTimeout) {
        clearTimeout(AmazonPayProductActionLockTimeout);
        AmazonPayProductActionLockTimeout = null;
    }

    getAmazonPayProductAddToCartButtons()
        .filter('[' + AmazonPayProductActionLockAttribute + '="1"]')
        .each(function() {
            $(this)
                .prop('disabled', false)
                .removeClass('disabled')
                .removeAttr('aria-disabled')
                .removeAttr(AmazonPayProductActionLockAttribute);
        });

    clearAmazonPayProductActionButtonLockMarks();
    updateAmazonPayProductButtonsState();
}

$(document).ready(function() {

    if (typeof isLoginToCheckout !== 'undefined') {
        if (isLoginToCheckout === true) {
            amazonPayInitApb();
        } else {
            amazonPayInit();
        }
    }

    function renderAmazonPayButton() {
        if (typeof amazon === 'undefined') {
            return;
        }

        resetStaleAmazonPayProductButtons();
        updateAmazonPayProductButtonsState();
        stretchAmazonPayProductButtons();

        $(".amazonPayButton").each(function() {
            if ($(this).attr('data-rendered') != '1') {

                if ($(this).parent().hasClass('product-quantity') && !amazonpay.is_prestashop16) {
                    $(this).insertAfter($(this).parent());
                }

                let amazonPayButton = $(this);
                let amazonPayButtonId = getAmazonPayButtonId(amazonPayButton);
                stretchAmazonPayProductButton(amazonPayButton);

                if (amazonPayButton.hasClass('amazonLogin')) {
                    let renderedAmazonPayButton = amazon.Pay.renderButton('#'+amazonPayButtonId, {
                        merchantId: amazonpay.merchant_id,
                        sandbox: amazonpay.sandbox, // dev environment
                        ledgerCurrency: amazonpay.ledgerCurrency, // Amazon Pay account ledger currency
                        checkoutLanguage: amazonpay.checkoutLanguage, // render language
                        productType: 'SignIn',
                        placement: amazonPayButton.attr('data-placement'), // button placement
                        buttonColor: amazonPayButton.attr('data-color'), // button color
                        signInConfig: {
                            payloadJSON: amazonPayButton.hasClass('amazonLoginCheckout') ? amazonpay.login_to_checkout_button_payload : amazonpay.login_button_payload,
                            signature: amazonPayButton.hasClass('amazonLoginCheckout') ? amazonpay.login_to_checkout_button_signature : amazonpay.login_button_signature,
                            publicKeyId: amazonpay.public_key_id
                        }
                    });
                    $(this).attr('data-rendered', '1');
                    return;
                }

                let createCheckoutSessionParams = {
                    url: amazonpay.amazonPayCheckoutSessionURL
                };

                let renderAmazonPayButtonLoad = {
                    merchantId: amazonpay.merchant_id,
                    sandbox: amazonpay.sandbox, // dev environment
                    ledgerCurrency: amazonpay.ledgerCurrency, // Amazon Pay account ledger currency
                    checkoutLanguage: amazonpay.checkoutLanguage, // render language
                    productType: amazonpay.checkoutType, // 'PayAndShip', // checkout type
                    placement: amazonPayButton.attr('data-placement'), // button placement
                    buttonColor: amazonPayButton.attr('data-color'), // button color
                    design: amazonPayButton.attr('data-design') != '' ? amazonPayButton.attr('data-design') : false // specific design params
                };

                if (getEstimatedOrderAmount() > 0) {
                    renderAmazonPayButtonLoad.estimatedOrderAmount = { "amount": getEstimatedOrderAmount(), "currencyCode": amazonpay.customerCurrencyCode};
                }

                let renderedAmazonPayButton = amazon.Pay.renderButton('#'+amazonPayButtonId, renderAmazonPayButtonLoad);
                stretchAmazonPayProductButton(amazonPayButton);
                setTimeout(function() { stretchAmazonPayProductButton(amazonPayButton) }, 0);
                setTimeout(function() { stretchAmazonPayProductButton(amazonPayButton) }, 250);

                setInterval(function() { updateEstimatedAmount(renderedAmazonPayButton)}, 1000);

                renderedAmazonPayButton.onClick(function() {
                    let click_timeout = 1;
                    if (amazonPayButton.hasClass('amazonPayProductButton')) {
                        if (isAmazonPayProductButtonDisabled(amazonPayButton)) {
                            return false;
                        }

                        AmazonPayProductClickInProcess = true;
                        markAmazonPayProductActionButtonsForLock();
                        dispatchAmazonPayProductButtonClick();
                        if ($("#add-to-cart-or-refresh").length > 0) {
                            if ($("#add-to-cart-or-refresh .add-to-cart").length > 0) {
                                $("#add-to-cart-or-refresh .add-to-cart").trigger('click');
                                lockAmazonPayProductActions();
                                click_timeout = 2000;
                            }
                        } else if ($("#buy_block").length > 0) {
                            if ($("#buy_block button[type=submit]").length > 0) {
                                $("#buy_block button[type=submit]").trigger('click');
                                lockAmazonPayProductActions();
                                click_timeout = 2000;
                            }
                        }

                        if (click_timeout === 1) {
                            clearAmazonPayProductActionButtonLockMarks();
                        }
                    }
                    setTimeout(function() { buttonInitCheckout(renderedAmazonPayButton) }, click_timeout);
                });

                $(this).attr('data-rendered', '1');
            }
        });
    }

    function getAmazonPayButtonId(amazonPayButton)
    {
        let amazonPayButtonId = amazonPayButton.attr("id");

        if (amazonPayButtonId == '' || typeof amazonPayButtonId === typeof undefined || hasDuplicateAmazonPayButtonId(amazonPayButton)) {
            AmazonPayButtonGeneratedIdCounter++;
            amazonPayButtonId = "amazonPayTsBtn_" + Date.now() + "_" + AmazonPayButtonGeneratedIdCounter;
            amazonPayButton.attr("id", amazonPayButtonId);
        }

        return amazonPayButtonId;
    }

    function hasDuplicateAmazonPayButtonId(amazonPayButton)
    {
        let amazonPayButtonId = amazonPayButton.attr("id");

        if (amazonPayButtonId == '' || typeof amazonPayButtonId === typeof undefined) {
            return false;
        }

        return $('[id]').filter(function() {
            return this.id == amazonPayButtonId;
        }).length > 1;
    }

    function buttonInitCheckout(renderedButton)
    {
        let initCheckoutLoad = {
            createCheckoutSessionConfig: {
                payloadJSON: amazonpay.button_payload,
                signature: amazonpay.button_signature,
                publicKeyId: amazonpay.public_key_id
            }
        }
        if (getEstimatedOrderAmount() > 0) {
            initCheckoutLoad.estimatedOrderAmount = { "amount": getEstimatedOrderAmount(), "currencyCode": amazonpay.customerCurrencyCode};
        }
        renderedButton.initCheckout(initCheckoutLoad);
    }

    function updateEstimatedAmount(button)
    {
        if (AmazonPayProductClickInProcess) {
            return;
        }
        if (setEstimatedAmount != getEstimatedOrderAmount() && getEstimatedOrderAmount() > 0) {
            button.updateButtonInfo({"amount": getEstimatedOrderAmount(), "currencyCode": amazonpay.customerCurrencyCode});
            setEstimatedAmount = getEstimatedOrderAmount();
        }
    }

    renderAmazonPayButton();
    setInterval(renderAmazonPayButton, 1000);

    if (typeof prestashop !== 'undefined' && typeof prestashop.on === 'function') {
        prestashop.on('updatedProduct', function() {
            setTimeout(renderAmazonPayButton, 0);
            setTimeout(renderAmazonPayButton, 250);
        });
        prestashop.on('updatedProductCombination', function() {
            setTimeout(renderAmazonPayButton, 0);
            setTimeout(renderAmazonPayButton, 250);
        });
        prestashop.on('updateCart', function() {
            AmazonPayProductClickInProcess = false;
            unlockAmazonPayProductActions();
        });
        prestashop.on('handleError', function() {
            AmazonPayProductClickInProcess = false;
            unlockAmazonPayProductActions();
        });
    }

});
