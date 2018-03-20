$("#scroll_email").click(function () {
    $('html, body').animate({
        scrollTop: $("#email").offset().top
    }, 2000);
    $('#email').select();
    $("#email").focus();

});

$("#scroll-sync").click(function () {
    $('html, body').animate({
        scrollTop: $("#sync-consent").offset().top
    }, 2000);
});