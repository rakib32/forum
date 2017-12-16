var topic = function () {
    var public = {
        init: function () {
            var thisControl = this;

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

                $('.topics a').css('color', '#dfecf6');
                $('.topics').append('<img  width="100px" position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

                var url = $(this).attr('href');
                thisControl.getTopics(url);
                window.history.pushState("", "", url);
            });

            $(".select-category").change(function (e) {
                var categoryId = $(this).val();
                var url = "/topics?category_id=" + categoryId;
                thisControl.getTopics(url);
            });
        },
        getTopics: function (url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.topics').html(data);
            }).fail(function () {
                alert('Topics could not be loaded.');
            });

        }
    };

    return public;
}();

$(document).ready(function () {
    topic.init();
});
