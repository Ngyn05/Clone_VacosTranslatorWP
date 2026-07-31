$('.termsandprivacy-formfields input[name="select-all"]').on('click', function () {
	$('.termsandprivacy-formfields input[type=checkbox]').prop('checked', $(this).prop('checked'));
});

$('.termsandprivacy-formfields .form-terms input[type=checkbox]').on('change', function () {
	if (!$('.termsandprivacy-formfields .form-terms input[type=checkbox]').not(':checked').length) {
		$('.termsandprivacy-formfields input[name=select-all]').prop('checked', true);
	} else {
		$('.termsandprivacy-formfields input[name=select-all]').prop('checked', false);
	}
});

document.addEventListener('DOMContentLoaded', function () {
  const shippingConsent = document.querySelector('[name="vasco-shipping-consent"]');
  if (!shippingConsent) return;

  const errorMsg = "Bitte kreuzen Sie alle Felder an. Wenn Sie nicht möchten, dass der Paketversender Ihre E-Mail Adresse erhält, geben Sie Ihre Bestellung bitte telefonisch bei unserem Kundendienst auf.";

  function showToast(message) {
    const old = document.querySelector('.mail-alert');
    if (old) old.remove();

    const toast = document.createElement('div');
    toast.className = 'alert alert-info toast-animation mail-alert mail-custom-popup';
		toast.setAttribute('role', 'alert');
		toast.setAttribute('aria-live', 'assertive');
		toast.setAttribute('aria-atomic', 'true');

		const msgSpan = document.createElement('span');
		msgSpan.textContent = message;
		toast.appendChild(msgSpan);

		const closeBtn = document.createElement('button');
		closeBtn.type = 'button';
		closeBtn.className = 'toast-close';
		closeBtn.textContent = '×';
		closeBtn.setAttribute('aria-label', 'Schließe Benachrichtigung');
		closeBtn.addEventListener('click', () => {
			toast.remove()
			shippingConsent.focus();
		});

		toast.appendChild(closeBtn);
    document.body.appendChild(toast);

		closeBtn.focus();

		toast.addEventListener('keydown', e => {
			if (e.key === 'Escape') {
				toast.remove();
				shippingConsent.focus();
			}
		})
  }

  shippingConsent.addEventListener('invalid', function (e) {
    e.preventDefault();
    showToast(errorMsg);
  });

  shippingConsent.addEventListener('change', function () {
    const old = document.querySelector('.mail-alert');
    if (old) old.remove();
  });
});
