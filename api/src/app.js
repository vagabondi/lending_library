$(document).ready(function () {
    var list = $('#book');



    $.ajax({
        url: 'api/books.php',
        type: 'GET',
        dataType: 'json'
    })
        .done(function (objects) {
            $.each(objects, function (index, value) {
                var bookTitle = $("<div>"),
                    a = $("<a>");
                bookTitle.appendTo(list);
                a.appendTo(bookTitle);
                a.text(value.title);
                a.attr('href', 'api/books.php?id=' + index);

            });
            var links = $('a');
            links.each(function(index, value) {
                $(this).on('click', function (event) {
                    event.preventDefault();
                    var link = $(this);
                    $.ajax({
                        url: $(this).attr('href'),
                        type: 'GET',
                        dataType: "json"
                    })
                        .done(function(obj) {
                            if(!link.next().hasClass('info')) {
                                var info = $("<div>");
                                info.insertAfter(link);
                                info.addClass('info');
                                info.html('Author: ' + obj.author + '<br /><br />' + obj.description);
                            } else {
                                link.next().remove();
                            }
                        })
                        .fail(function () {
                            console.log('Nie udało się!');
                        })
                });
            });
        })
        .fail(function () {
            console.log('fail');
        });
});