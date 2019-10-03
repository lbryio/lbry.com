window.lbry = {};

jQuery.fn.extend({
  jFor: function() {
    var self = $(this),
        target = self.data('for') || self.attr('for');

    if (!target)
      return $();

    if (target instanceof jQuery)
      return target;

    return $(target.toString());
  }
});

$(document).ready(function() {
  var body = $('body');

  body.on('click', 'a', onAnchorClick);

  if (window.twttr) {
    twttr.events.bind('follow', onTwitterFollow);
  }

  window.fbAsyncInit = function() {
    window.FB.Event.subscribe('edge.create', onFacebookLike);
  }

  function onAnchorClick() {
    var anchor = $(this),
        action = anchor.data('action');

    if (action == 'toggle') {
      anchor.jFor().toggle();
      anchor.data('toggle-count', 1 + (anchor.data('toggle-count') ? anchor.data('toggle-count') : 0));
      anchor.find('.toggle-even, .toggle-odd').hide();
      anchor.find(anchor.data('toggle-count') % 2 == 1 ? '.toggle-odd' : '.toggle-even').show();
    }

    if (action == 'toggle-class') {
      anchor.jFor().toggleClass(anchor.data('class'));
    }

    if (anchor.data('facebook-track') && window.fbq) {
      fbq('track', "Lead");
    }

    if (anchor.data('twitter-track-id') && window.twttr) {
      twttr.conversion.trackPid(anchor.data('twitter-track-id'));
    }

    if (anchor.data('analytics-category') && anchor.data('analytics-action') && anchor.data('analytics-label') && window.ga) {
      ga('send', 'event', anchor.data('analytics-category'), anchor.data('analytics-action'), anchor.data('analytics-label'));
    }
  }

  function resizeVideo(iframe) {
    var maxWidth = Math.min(iframe.offsetParent().width(), iframe.data('maxWidth')),
        maxHeight = iframe.data('maxHeight'),
        ratio = iframe.data('aspectRatio');

    if (ratio && maxWidth && maxHeight) {
      var height = maxWidth * ratio,
          width = maxWidth;

      if (height > maxHeight) {
        height = maxHeight;
        width = maxHeight * 1 / ratio;
      }

      iframe
        .width(width)
        .height(width * ratio);
    }
  }

  function onTwitterFollow(intentEvent) {
    if (!intentEvent || !ga)
      return;

    ga('send', 'social', 'Twitter', 'follow', window.location.href);
  }

  function onFacebookLike() {
    if (!ga)
      return;

    ga('send', 'social', 'Facebook', 'like', window.location.href);
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
    };
  });

  document.querySelector("body").addEventListener("touchstart", event => {
    if (event.target === document.querySelector(".header__toggle")) {
      $("drawer-navigation").toggleClass("active")
    }
  });

  function hideNavigationHelpers() {
    document.querySelectorAll("drawer-navigation-helper").forEach(navigationHelper => {
      navigationHelper.style.display = "none";
    });
  }
}
