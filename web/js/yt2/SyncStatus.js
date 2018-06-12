/* eslint-env browser *//* global $ */ "use strict";



$(document).ready(function () {
  const status_token = localStorage.getItem("status_token");
  const lbry_channel_name_sync = localStorage.getItem("lbry_channel_name_sync");

  if (status_token || lbry_channel_name_sync) {
    const url = `/youtube/status/${status_token}`;

    $("#sync-status").show();
    $("#sync-status").html(`Hey, ${lbry_channel_name_sync}! <a href="${url}">See your channel sync status here</a>.`);
  }
});
