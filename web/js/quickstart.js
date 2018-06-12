/* eslint-env browser *//* global $, lbry */ "use strict";



lbry.quickstartForm = function (selector, apiUrl) {
  const form = $(selector);
  const accessToken = form.find(":input[name='access_token']").val();
  const walletAddressInput = form.find(":input[name='wallet_address']");
  const transactionIdInput = form.find(":input[name='transaction_id']");
  const storageKey = form.attr("id") + "SuccessHTML";
  const submitButton = form.find(":input[type='submit']");

  let isAutomaticSubmit = false;
  let isSubmitting = false;

  function resetFormState() {
    isSubmitting = false;

    walletAddressInput.attr("readonly", null);
    transactionIdInput.attr("readonly", null);
    submitButton.val(submitButton.data("submitLabel")).attr("disabled", null);
  }

  if (window.localStorage.getItem(storageKey)) {
    form.find(".notice-success").html(window.localStorage.getItem(storageKey)).show();
    form.find(".form-row, .submit-row").hide();
  } else if (accessToken) {
    form.submit(function (event) {
      if (isSubmitting) return false;

      const postData = {
        access_token: accessToken,
        wallet_address: walletAddressInput.val()
      };

      form.find(".notice-success, .notice-error").hide();

      if (!walletAddressInput.val()) {
        resetFormState();

        if (!isAutomaticSubmit) {
          form.find(".notice-error").html("Please supply a wallet address.").show();
        }

        return false;
      }

      if (transactionIdInput.length) {
        if (!transactionIdInput.val()) {
          resetFormState();

          if (!isAutomaticSubmit) {
            form.find(".notice-error").html("Please supply a transaction ID.").show();
          }

          return false;
        }

        postData.transaction_id = transactionIdInput.val();
      }

      event.preventDefault();

      walletAddressInput.attr("readonly", "readonly");
      transactionIdInput.attr("readonly", "readonly");
      submitButton.val(submitButton.data("submittingLabel")).attr("disabled", "disabled");

      $.post(apiUrl, postData)
        .done(function (responseData) {
          const data = responseData.data;
          const anchor = $("<a class='link-primary--break-word'></a>");

          anchor.attr("href", "https://explorer.lbry.io/tx/" + data.TransactionID);
          anchor.html(data.TransactionID);

          form.find(".notice-success")
            .html(data.RewardAmount + " credits sent in transaction ")
            .append(anchor)
            .show();

          window.localStorage.setItem(storageKey, form.find(".notice-success").html());
        })
        .fail(function (xhr) {
          const responseData = $.parseJSON(xhr.responseText);
          form.find(".notice-error").html(
            responseData.error.length ? responseData.error : "Something went wrong. Please email grin@lbry.io"
          ).show();
        })
        .always(resetFormState);
    });

    isAutomaticSubmit = true;
    form.submit();
    isAutomaticSubmit = false;
  }
};
