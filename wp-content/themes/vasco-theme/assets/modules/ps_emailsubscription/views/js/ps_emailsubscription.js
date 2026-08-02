/**
 * 2007-2020 PrestaShop.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2020 PrestaShop SA
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 */
$(document).ready(function () {
	const form = $(".block_newsletter form");

	form.find("input[required]").on("invalid", function () {
		const input = $(this);
		const errorSpan = input.next(".error-message");

		errorSpan.text(this.validationMessage);
	});

	form.find("input[required]").on("input", function () {
		const input = $(this);
		const errorSpan = input.next(".error-message");

		if (this.checkValidity()) {
			errorSpan.text('');
		}
	});

	$(".block_newsletter form").on("submit", async function (e) {
		e.preventDefault();
		e.stopImmediatePropagation();

		var psemailsubscriptionForm = $(this);
		if (typeof psemailsubscription_subscription === "undefined") {
			return true;
		}
		$(".block_newsletter_alert").remove();

		try {
      if (!window.veRecaptchaV3 || typeof window.veRecaptchaV3.execute !== "function") {
        console.error("veRecaptchaV3.execute is missing");
        return false;
      }

			await window.veRecaptchaV3.execute({
				formId: this.id || "newsletter-form",
				action: "newsletter_submit",
			})

			$.ajax({
				type: "POST",
				dataType: "JSON",
				url: psemailsubscription_subscription,
				cache: false,
				data: $(this).serialize(),
				success: function (data) {
					if (data.nw_error) {
						psemailsubscriptionForm.append(
							'<div class="alert alert-info alert-toast toast-animation block_newsletter_alert" role="alert" aria-atomic="true">' +
								data.msg +
								"</div>"
						);
						setTimeout(function () {
							$(".block_newsletter_alert").fadeOut(300, function () {
								$(this).remove();
							});
						}, 5000);
					} else {
						psemailsubscriptionForm.append(
							'<div class="alert alert-success alert-toast toast-animation block_newsletter_alert" role="alert" aria-atomic="true">' +
								data.msg +
								"</div>"
						);
						setTimeout(function () {
							$(".block_newsletter_alert").fadeOut(300, function () {
								$(this).remove();
							});
						}, 5000);

						window.dataLayer = window.dataLayer || [];
						window.dataLayer.push({
							event: "newsletter_signup",
							position: "footer"
						});

						setTimeout(function () {
							psemailsubscriptionForm[0].reset();
						}, 1000);

					}
				},
				error: function (err) {
					console.error(err);
				},
			});
		} catch(err) {
			console.error("reCAPTCHA failed:", err);
		}
		return false;
	});
});
