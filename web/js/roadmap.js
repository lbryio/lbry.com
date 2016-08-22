lbry.roadmap = function(selector)
{
  var roadmap = $(selector);
  roadmap.on('click', '.show-all-releases', function() {
    roadmap.find('.roadmap-group-title').show();
    $(this).remove();
  });
  roadmap.on('click', '.roadmap-group-title', function() {
    $(this).next('.roadmap-group').toggleClass('roadmap-group-closed').toggleClass('roadmap-group-open');
  });
  roadmap.on('click', '.roadmap-item-header', function() {
    $(this).closest('.roadmap-item').toggleClass('roadmap-item-open').toggleClass('roadmap-item-closed');
  });
}