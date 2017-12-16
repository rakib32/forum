$(document).on("ajaxStart", function () {
    $(".loading").show();
});

$(document).on("ajaxComplete", function () {
    $(".loading").hide();
});

$(document).on("ajaxError", function () {
    $(".loading").hide();
});

$(document).on(function () {
    $(".loading").show();
});