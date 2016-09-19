$(document).ready(function () {
    var div = $('#book'),
        button = $('#button'),
        link = $('#button').attr('href');
    button.on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: link,
            type: 'GET',
            dataType: "json"
        })
            .done(function(obj) {
                console.log(obj.title, obj.description);
            })
            .fail(function () {
                console.log('NIe udało się!');
            })
    });

});