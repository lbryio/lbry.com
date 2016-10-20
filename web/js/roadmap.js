lbry.roadmap = function(selector)
{
  var roadmap = $(selector);
  roadmap.on('click', '.show-all-roadmap-groups', function() {
    roadmap.find('.roadmap-group-title').show();
    $(this).remove();
  });
  roadmap.on('click', '.show-all-roadmap-group-items', function() {
    $(this).closest('.roadmap-group').find('.roadmap-item').show();
    $(this).remove();
  });
  roadmap.on('click', '.roadmap-group-title', function() {
    var target = $(this).next('.roadmap-group');
    target.toggleClass('roadmap-group-closed').toggleClass('roadmap-group-open');
    if (target.hasClass('roadmap-group-open'))
    {
      target.find('.show-all-roadmap-group-items').click();
    }
  });
}