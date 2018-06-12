/* eslint-env browser *//* global $ */ "use strict";



function playVideo(id) { // eslint-disable-line
  const myVideo = document.getElementById(id);
  myVideo.play();

  $(`#${id}`).prop("controls", true);
  $(`#play-${id}`).hide();
}
