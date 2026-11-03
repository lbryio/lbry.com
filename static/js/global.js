window.lbry = {};

$(document).ready(function() {
  var body = $('body');

  body.on('click', 'a', onAnchorClick);

  function onAnchorClick() {
    var anchor = $(this);

    if (anchor.data()['analyticsCategory'] && anchor.data()['analyticsAction'] && anchor.data()['analyticsLabel'] && window.ga) {
      ga('send', 'event', anchor.data()['analyticsCategory'], anchor.data()['analyticsAction'], anchor.data()['analyticsLabel']);
    }

    if (anchor.data()['analyticsCategory'] && anchor.data()['analyticsAction'] && anchor.data()['analyticsLabel'] && window._paq) {
      _paq.push(['trackEvent', anchor.data()['analyticsCategory'], anchor.data()['analyticsAction'], anchor.data()['analyticsLabel']]);
    }
  }
});



// Allow checkboxes to be checked, rather than just the label
document.querySelectorAll("checkbox-toggle").forEach(toggle => {
  toggle.addEventListener("click", event => {
    const siblings = event.target.parentElement.children;

    for (const sibling of siblings) {
      switch(true) {
        case sibling.tagName.toLowerCase() === "label":
          sibling.click();
          break;

        default:
          break;
      }
    }
  });
});

// Automatically open external links in new tabs
document.querySelectorAll("a[href]").forEach(link => {
  if (link.href.indexOf(location.hostname) === -1) {
    link.rel = "noopener noreferrer";
    link.target = "_blank";
  }
});

// Greet visitors from .tech
document.addEventListener("DOMContentLoaded", () => {
  switch(true) {
    case document.referrer.includes("http://localhost:8080"):
    case document.referrer.includes("https://lbry.tech"):
      const html = `
        <section class="alert" id="tech-greeting">
          <div class="inner-wrap">
            <p><strong>Welcome to the consumer side of LBRY!</strong> You've had fun delving into the tech, we hope.</p>
            <br><br>
            <p>Here by accident? Come back to <a href="${document.referrer}">the techno scene</a>.</p>

            <button id="close-alert">&times;</button>
          </div>
        </section>
      `;

      document.querySelector("body").insertAdjacentHTML("afterend", html);

      document.getElementById("close-alert").onclick = () => {
        document.getElementById("tech-greeting").style.display = "none";
      };

      break;

    default:
      break;
  }
});

// Fix for touchscreen devices
if ("ontouchstart" in window) {
  const navigationLinks = document.querySelectorAll("drawer-title");

  navigationLinks.forEach(navigationLink => {
    navigationLink.ontouchstart = () => {
      hideNavigationHelpers();
      navigationLink.onhover.call(navigationLink);
    };
  });

  document.querySelector("body").addEventListener("touchstart", event => {
    if (event.target !== document.querySelector("drawer-navigation"))
      document.querySelector("drawer-wrap").hide();
  });

  function hideNavigationHelpers() {
    document.querySelectorAll("drawer-navigation-helper").forEach(navigationHelper => {
      navigationHelper.style.display = "none";
    });
  }
}
