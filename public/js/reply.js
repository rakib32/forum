var reply = function () {
    var public = {
        init: function () {
            var thisControl = this;

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

                $('.replies a').css('color', '#dfecf6');

                var url = $(this).attr('href');

                thisControl.getReplies(url);

                window.history.pushState("", "", url);
            });

            $('#reply-form').on('submit', function (e) {
                e.preventDefault(e);
                var url = $(this).attr("action");

                thisControl.saveReply(url);
            });
        },
        getReplies: function (url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.reply-list').html(data);
            }).fail(function () {
                alert('Replies could not be loaded.');
            });

        },
        saveReply: function (url) {
            $.ajax({
                type: "POST",
                url: url,
                data: $('#reply-form').serialize()
            }).done(function (data) {
                $('.reply-list').prepend(data);
                $(".reply-content").val();
            }).fail(function () {
                alert('Replies could not be loaded.');
            });
        }
    };

    return public;
}();

$(document).ready(function () {
    reply.init();
});
