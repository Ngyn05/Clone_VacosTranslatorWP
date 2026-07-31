document.addEventListener('DOMContentLoaded', () => {
  const bannerTimers = document.querySelectorAll('.banner-countdown-timer');

  const serverNowMs = (window.serverNowTimezone ? window.serverNowTimezone * 1000 : Date.now());
  const driftMs = serverNowMs - Date.now();

  function getServerNowMs() {
    return Date.now() + driftMs;
  }

  function setText(root, selector, value) {
    const el = root.querySelector(selector);
    if (el) el.textContent = String(value);
  }

	function pad(n) {
		return String(n).padStart(2, '0');
	}

  function updateCountdown(element) {
    const currentMs = getServerNowMs();

    let endMs;
    if (element.dataset.promoEndTs) {
      endMs = parseInt(element.dataset.promoEndTs, 10) * 1000;
    } else {
      endMs = Date.parse(element.dataset.promoEnd);
    }
    if (!Number.isFinite(endMs)) return;

    const diff = endMs - currentMs;

    if (diff > 0 && diff <= 2 * 24 * 60 * 60 * 1000) {
      const days = Math.floor(diff / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diff % (1000 * 60)) / 1000);

      setText(element, '.days-span .value', pad(days));
      setText(element, '.hours-span .value', pad(hours));
      setText(element, '.minutes-span .value', pad(minutes));
      setText(element, '.seconds-span .value', pad(seconds));
    }
  }

  function updateAllCountdowns() {
    bannerTimers.forEach(updateCountdown);
  }

  setInterval(updateAllCountdowns, 1000);
  updateAllCountdowns();
});


function checkMarqueeWidths() {
	const mainBanner = document.querySelector('.banner-wrapper-main');
  const marquees = mainBanner?.querySelectorAll('.marquee p');

  marquees?.forEach(function(marquee) {
    if (marquee.offsetWidth > window.innerWidth - 32) {
      marquee.classList.add('animate');
    } else {
      marquee.classList.remove('animate');
    }
  });
}

document.addEventListener("DOMContentLoaded", checkMarqueeWidths);
window.addEventListener("resize", checkMarqueeWidths);



