(function () {
  if (!window.veaLogUrl || !window.veaLogToken) return;

  const b64urlEncode = (str) => {
    const utf8 = new TextEncoder().encode(String(str));
    let bin = '';
    for (let i = 0; i < utf8.length; i++) bin += String.fromCharCode(utf8[i]);
    return btoa(bin).replace(/\+/g, '-').replace(/\//g, '_').replace(/=+$/,'');
  };

  const encStr = (v, maxLen = 4000) => {
    if (v === null || v === undefined) return null;
    const s = String(v);
    return b64urlEncode(s.slice(0, maxLen));
  };

  const isOwnSource = (source = '') =>
    /\/themes\/vasco-theme\/assets\/js\/theme\.js|\/modules\/ve_analytics\/views\/js\/datalayer\.js/i.test(source);

  const extractUrls = (input = '') =>
    String(input).match(/(?:https?|chrome-extension):\/\/[^\s)]+/gi) || [];

  const isFirstPartyUrl = (candidate = '') => {
    try {
      return new URL(candidate, location.href).host === location.host;
    } catch (e) {
      return false;
    }
  };

  const hasFirstPartyUrl = (input = '') =>
    extractUrls(input).some((value) => isFirstPartyUrl(value));

  const hasExternalUrl = (input = '') =>
    extractUrls(input).some((value) => !isFirstPartyUrl(value));

  const shouldIgnore = ({ message, file = '', stack = '', ua = navigator.userAgent || '' }) => {
    const msg = String(message || '').trim().replace(/^Uncaught\s+/i, '');
    if (!msg) return false;

    const source = `${file}\n${stack}`;

    const ignoreFb = [
      "Can't find variable: _AutofillCallbackHandler",
      "Can't find variable: _WebForm",
      "Can't find variable: __firefox__",
    ];

    const ignoreGtag = [
      "gtag is not defined",
      "Can't find variable: gtag",
    ];

    const isFbNoise = ignoreFb.some((value) => msg.includes(value));
    const isGtagNoise = ignoreGtag.some((value) => msg.includes(value));
    const isCookiebotExtensionNoise =
      /Illegal invocation/i.test(msg) &&
      /consent\.cookiebot\.com|chrome-extension:\/\//i.test(source);
    const isGenericNetworkNoise =
      /NetworkError when attempting to fetch resource/i.test(msg) &&
      !hasFirstPartyUrl(source);
    const isExternalDynamicImportNoise =
      /(Failed to fetch dynamically imported module|error loading dynamically imported module)/i.test(msg) &&
      hasExternalUrl(`${msg}\n${source}`);
    const isIosInApp =
      /(iphone|ipad|ipod)/i.test(ua) &&
      /(FBAN|FBAV|Instagram)/i.test(ua);

    if (
      isFbNoise ||
      isGtagNoise ||
      isCookiebotExtensionNoise ||
      /Database deleted by request of the user/i.test(msg) ||
      /play\(\) failed because the user didn't interact with the document first/i.test(msg) ||
      /\bNotReadableError\b/i.test(msg) ||
      isGenericNetworkNoise ||
      isExternalDynamicImportNoise ||
      msg === '{}' ||
      msg === '{"isTrusted":true}'
    ) {
      return true;
    }

    if (isOwnSource(source)) return false;

    return (
      (/Can't find variable: Notification/i.test(msg) && /gr-cdn\.com|gr-wcon\.com/i.test(source)) ||
      (/Automation journey data does not match required schema/i.test(msg) && /gr-cdn\.com|gr-wcon\.com/i.test(source)) ||
      (/(window\.GRWP\.init|window\.GRWE\.init|reading 'init')/i.test(msg) && /gr-cdn\.com|gr-wcon\.com/i.test(source)) ||
      (/^(AbortError|The operation was aborted\.?|The request is not allowed by the user agent or the platform)/i.test(msg)) ||
      (/The play\(\) request was interrupted|paused to save power/i.test(msg)) ||
      (msg === 'Script error.' && /analytics\.optimalpeople\.fr/i.test(file)) ||
      (/webkit\.messageHandlers/i.test(msg) && isIosInApp) ||
      (/reading 'Uq'/i.test(msg) && /gstatic\.com\/recaptcha/i.test(file))
    );
  };

  const send = (payload) => {
    try {
      const body = JSON.stringify(payload);
      if (navigator.sendBeacon) {
        const ok = navigator.sendBeacon(window.veaLogUrl, new Blob([body], { type: 'application/json' }));
        if (ok) return;
      }
      fetch(window.veaLogUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body,
        credentials: 'same-origin',
        keepalive: true
      }).catch(()=>{});
    } catch (e) {}
  };

  const base = () => ({
    enc: 'b64url',
    token: encStr(window.veaLogToken, 512),
    url: encStr(location.href, 2000),
    ref: encStr(document.referrer || '', 2000),
    ua: encStr(navigator.userAgent, 1000),
    ts: encStr(new Date().toISOString(), 64),
  });

  window.addEventListener('error', function (e) {
    const msg = e.message || 'Unknown error';
    const file = (e.filename || '').toString();
    if (msg === 'Script error.' && !file) return;

    const rawStack = e.error && e.error.stack ? String(e.error.stack) : null;

    if (shouldIgnore({ message: msg, file, stack: rawStack })) return;

    send({
      ...base(),
      type: encStr('error', 64),
      message: encStr(msg, 4000),
      file: encStr(file, 1000),
      line: e.lineno || null,
      col: e.colno || null,
      stack: rawStack ? encStr(rawStack, 8000) : null
    });
  });

  window.addEventListener('unhandledrejection', function (e) {
    let reason = e.reason;
    let message = '';
    let stack = null;

    if (reason instanceof Error) {
      message = reason.message || '';
      stack = reason.stack ? String(reason.stack) : '';
    } else {
      message = typeof reason === 'string' ? reason : JSON.stringify(reason);
    }

    if (shouldIgnore({ message, stack })) return;

    send({
      ...base(),
      type: encStr('unhandledrejection', 64),
      message: encStr(message, 4000),
      file: null,
      line: null,
      col: null,
      stack: stack ? encStr(stack, 8000) : null
    });
  });
})();
