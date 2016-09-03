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
  var body = $('body'),
      labelCycles = body.find('.label-cycle'); //should use better pattern but we have so little JS right now

  body.on('click', 'a', onAnchorClick);

  if (window.twttr)
  {
    twttr.events.bind('follow', onTwitterFollow);
  }

  window.fbAsyncInit = function()
  {
    window.FB.Event.subscribe('edge.create', onFacebookLike);
  };

  //$(window).scroll(onBodyScroll);

  if (labelCycles.length)
  {
    setInterval(refreshLabelCycles,5000);
    labelCycles.each(function() {
      var labelCycle = $(this),
          maxHeight = Math.max.apply(Math, labelCycles.find('> *').map(function(){ return $(this).height(); }).get());
      if (maxHeight)
      {
        labelCycle.height(maxHeight);
      }
      labelCycle.addClass('label-cycle-init');
    });
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
    if (anchor.data('facebook-track-id') && window.fbq)
    {
      fbq('track', anchor.data('facebook-track-id'));
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

  function onBodyScroll()
  {
    var header = $('.header');
    if (header.hasClass('header-scroll'))
    {
        if (window.scrollY <= 1)
        {
          header.removeClass('header-light');
          header.addClass('header-dark');
        }
        else
        {
          header.removeClass('header-dark');
          header.addClass('header-light');
        }
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

  $('.video > iframe').each(function() {
    var iframe = $(this);
    iframe.data('maxWidth', iframe.attr('width'));
    iframe.data('maxHeight', iframe.attr('height'));
    iframe.data('aspectRatio', iframe.attr('height') / iframe.attr('width'))
      .removeAttr('height')
      .removeAttr('width');

    resizeVideo(iframe);
  });

  $(window).resize(function() {
    $('.video > iframe').each(function() {
      resizeVideo($(this));
    })
  });

  function refreshLabelCycles()
  {
    labelCycles.each(function() {
      var labelCycle = $(this),
          activeLabel = labelCycle.find(':first-child');

      activeLabel.fadeOut(function() {
        labelCycle.append(activeLabel);
        labelCycle.find(':first-child').fadeIn();
      });
    });
  }

  var langDropdown = $('#language-dropdown');
  langDropdown.val(_currentLang);
  langDropdown.on('change', function(x) {
      $.ajax({type: 'POST', url: '/language', data: {'culture': this.value},
              success: function (d) {
                window.location.reload();
              }});
  });
});
