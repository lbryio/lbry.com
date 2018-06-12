/* eslint-env browser *//* global $ */ "use strict";



let is_first_time = true;

function submitEditForm() { // eslint-disable-line
  $("#youtube_settings").submit(function (event) {
    // get value from id
    const lbry_channel_name = $.trim($("#channel-name").val());
    const email = $.trim($("#email").val());

    // Hide the error message
    $("#channel-name-error").hide();
    $("#email-error").hide();

    // If the channel name is invalid or blank stop the post request
    if (!validateLBRYName(lbry_channel_name) || lbry_channel_name === "") {
      event.preventDefault();

      $("#lbry_channel_name").addClass("error_form");
      $("#channel-name-error").show();
    }

    if (!validateEmail(email) || email === "") {
      event.preventDefault();

      $("#email").addClass("error_form");
      $("#email-error").show();
    }

    else if (!validateEmailIsNotGooglePlus(email)) {
      $("#email").addClass("error_form");

      if (is_first_time) {
        $("#email").addClass("error_form");
        $("#email-google-plus-error").show();
        is_first_time = false;
        event.preventDefault();
      }
    }

    localStorage.setItem("status_token", $.trim($("#status_token").val()));
    localStorage.setItem("lbry_channel_name_sync", $.trim($("#channel-name").val()));
  });
}

function submitDetailsForm() { // eslint-disable-line
  $("#youtube_claim").submit(function (event) {
    // get value from id
    const lbry_channel_name = $.trim($("#lbry_channel_name").val());

    // Make sure that the error message are hidden before trying to validate value
    $("#lbry_error").hide();

    // If the lbry name is invalid or blank stop the post request
    if (!validateLBRYName(lbry_channel_name) || lbry_channel_name === "") {
      event.preventDefault();

      $("#lbry_channel_name").addClass("error_form");
      $("#lbry_error").show();
    }
  });
}

function validateEmail(email) {
  const re = /\S+@\S+\.\S+/;
  return re.test(email);
}

function validateLBRYName(lbry_channel_name) {
  const re = /^[@A-Za-z0-9-]*$/g;
  return re.test(lbry_channel_name);
}

function validateYoutubeChannelUrl(youtube_channel_url) { // eslint-disable-line
  const re = /^UC[A-Za-z0-9_-]{22}$/;
  return re.test(youtube_channel_url);
}

function validateEmailIsNotGooglePlus(email) {
  const re = /^[A-Za-z0-9._%+-]+@(?!plusgoogle.com)[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
  return re.test(email);
}
