/* The production server's platform selection, performed locally for static hosting. */
(() => {
  'use strict';
  const paths = { '/windows': 'windows', '/osx': 'osx', '/linux': 'linux', '/android': 'android', '/ios': 'ios' };
  const parameters = new URLSearchParams(window.location.search);
  const enabled = name => {
    const values = parameters.getAll(name);
    const value = values[values.length - 1];
    return value !== undefined && value !== '' && value !== '0';
  };
  const detectOS = () => {
    const explicit = paths[window.location.pathname.replace(/\/+$/, '')];
    if (explicit) return explicit;
    const ua = navigator.userAgent;
    if (/bot|spider|crawler|siteexplorer|yahoo|slurp|dataaccessd|facebook|twitter|coccoc|calendar|curl|wget|panopta|blogtrottr|zapier|newrelic|luasocket|okhttp|python/i.test(ua)) return '';
    if (/OS X/i.test(ua)) return /iPhone|iPad/i.test(ua) ? 'ios' : 'osx';
    if (/Linux|X11/i.test(ua)) return /Android/.test(ua) ? 'android' : 'linux';
    if (/Windows/i.test(ua)) return 'windows';
    return '';
  };
  const os = enabled('showall') ? '' : detectOS();
  const template = document.querySelector(`template[data-download-platform="${os}"]`);
  const current = document.querySelector('main[data-download-page]');
  if (!template || !current) return;
  if (current.dataset.downloadOs !== os) current.replaceWith(template.content.cloneNode(true));
  document.title = template.dataset.documentTitle;
  const description = os ? 'Experience content freedom! Download the latest version of LBRY for Windows, mac OS, or Linux.' : 'Download or install the latest version of LBRY.';
  for (const selector of ['meta[name="description"]', 'meta[property="og:description"]', 'meta[name="twitter:description"]']) {
    const meta = document.querySelector(selector);
    if (meta) meta.content = description;
  }
  for (const selector of ['meta[property="og:title"]', 'meta[name="twitter:title"]']) {
    const meta = document.querySelector(selector);
    if (meta) meta.content = document.title;
  }
  if (enabled('auto') && !enabled('showall')) {
    const autoDownload = () => {
      const anchor = document.getElementById('get-download-btn');
      if (!anchor) return; // Mobile store buttons do not auto-download in production.
      if (typeof window.ga === 'function') window.ga('send', 'event', 'Sign Up', 'Download', anchor.dataset.analyticsLabel);
      window.setTimeout(() => { window.location.href = anchor.href; }, 500);
    };
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', autoDownload, { once: true });
    else autoDownload();
  }
})();
