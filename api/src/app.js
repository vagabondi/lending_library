$(document).ready(function () {
    var div = $('#book'),
        list = div.find('ul');


    $.ajax({
        url: 'api/books.php',
        type: 'GET',
        dataType: 'json'
    })
        .done(function (objects) {
            $.each(objects, function (index, value) {
                var li = $("<li>"),
                    a = $("<a>");
                li.appendTo(list);
                a.appendTo(li);
                a.text(value.title);
                a.attr('href', 'api/books.php?id=' + index);
            });
            var links = $('a');
            links.each(function(index, value) {
                $(this).on('click', function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: $(this).attr('href'),
                        type: 'GET',
                        dataType: "json"
                    })
                        .done(function(obj) {
                            list.empty();
                            list.remove();
                            var info = $('<p>');
                            info.appendTo(div);
                            info.text(obj.title);
                        })
                        .fail(function () {
                            console.log('NIe udało się!');
                        })
                });
            });
        })
        .fail(function () {
            console.log('fail');
        });




});