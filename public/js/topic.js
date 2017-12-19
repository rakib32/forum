var topic = function () {
    var public = {
        init: function () {
            var thisControl = this;

            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();

                $('.topic-table a').css('color', '#dfecf6');

                var url = $(this).attr('href');
                url = url + "&category_id=" + $(".select-category").val();

                thisControl.getTopics(url);

                window.history.pushState("", "", url);
            });

            $(".select-category").change(function (e) {
                var categoryId = $(this).val();
                var url = "/topics?category_id=" + categoryId;
                thisControl.getTopics(url);
            });

            $(".topic-editor").summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']]
                ]
            });
        },
        getTopics: function (url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.topic-table').html(data);
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
