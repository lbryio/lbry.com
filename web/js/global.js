window.lbry = {};
//document.domain = 'lbry.io';

jQuery.fn.extend({
  jFor: function() {
    var self = $(this),
        target = self.data('for') || self.attr('for');

    if (!target)
    {
      return $();
    }
    if (target instanceof jQuery) //can be set in JS
    {
      return target;
    }
    return $(target.toString());
  }
});

$(document).ready(function() {
  var body = $('body');

  body.on('click', 'a', onAnchorClick);

  if (window.twttr)
  {
    twttr.events.bind('follow', onTwitterFollow);
  }

  window.fbAsyncInit = function()
  {
    window.FB.Event.subscribe('edge.create', onFacebookLike);
  }

  function onAnchorClick()
  {
    var anchor = $(this),
        action = anchor.data('action');

    if (action == 'toggle')
    {
      anchor.jFor().toggle();
      anchor.data('toggle-count', 1 + (anchor.data('toggle-count') ? anchor.data('toggle-count') : 0));
      anchor.find('.toggle-even, .toggle-odd').hide();
      anchor.find(anchor.data('toggle-count') % 2 == 1 ? '.toggle-odd' : '.toggle-even').show();
    }
    if (action == 'toggle-class')
    {
      anchor.jFor().toggleClass(anchor.data('class'));
    }
    if (anchor.data('facebook-track') && window.fbq)
    {
      fbq('track', "Lead");
    }
    if (anchor.data('twitter-track-id') && window.twttr)
    {
      twttr.conversion.trackPid(anchor.data('twitter-track-id'));
    }
    if (anchor.data('analytics-category') && anchor.data('analytics-action') && anchor.data('analytics-label') && window.ga)
    {
      ga('send', 'event', anchor.data('analytics-category'), anchor.data('analytics-action'), anchor.data('analytics-label'));
    }
  }

  function resizeVideo(iframe)
  {
    var maxWidth = Math.min(iframe.offsetParent().width(), iframe.data('maxWidth')),
        maxHeight = iframe.data('maxHeight'),
        ratio = iframe.data('aspectRatio');

    if (ratio && maxWidth && maxHeight)
    {
      var height = maxWidth * ratio,
          width = maxWidth;

      if (height > maxHeight)
      {
        height = maxHeight;
        width = maxHeight * 1 / ratio;
      }

      iframe
        .width(width)
        .height(width * ratio);
    }
  }

  function onTwitterFollow (intentEvent)
  {
    if (!intentEvent || !ga) return;
    ga('send', 'social', 'Twitter', 'follow', window.location.href);
  }

  function onFacebookLike()
  {
    if (!ga) return;
    ga('send', 'social', 'Facebook', 'like', window.location.href);
  }
  //
  // $('.video > video').each(function() {
  //   var iframe = $(this);
  //   iframe.data('maxWidth', iframe.attr('width'));
  //   iframe.data('maxHeight', iframe.attr('height'));
  //   iframe.data('aspectRatio', iframe.attr('height') / iframe.attr('width'))
  //     .removeAttr('height')
  //     .removeAttr('width');
  //
  //   resizeVideo(iframe);
  // });
  //
  // $(window).resize(function() {
  //   $('.video > video').each(function() {
  //     resizeVideo($(this));
  //   })
  // });
});
