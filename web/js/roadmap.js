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
    $(this).next('.roadmap-group')
      .toggleClass('roadmap-group-closed').toggleClass('roadmap-group-open');
      // .find('.roadmap-item')
      //   .toggleClass('roadmap-item-open', $(this).hasClass('roadmap-group-open'))
      //   .toggleClass('roadmap-item-closed', $(this).hasClass('roadmap-group-closed'))
  });
  // roadmap.on('click', '.roadmap-item-header', function() {
  //   $(this).closest('.roadmap-item').toggleClass('roadmap-item-open').toggleClass('roadmap-item-closed');
  // });
}