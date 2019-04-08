"use strict";



function playVideo(id) {
  const video = document.getElementById(id);

  video.play();
  video.controls = true;
}
