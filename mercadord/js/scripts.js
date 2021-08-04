$(function() {


    $('ul#options li img').click(function() {
        $('ul#options li img').removeClass('selected');
        $(this).addClass('selected');

        var imageName = $(this).attr('alt');
        var imageName2 = $(this).attr('name');

        // $('#featured img').attr('src', 'productos/' + imageName);
        document.getElementById('featured').style.backgroundImage = 'url("productos/'+imageName+'")';

        var chopped = imageName.split('.');
        var chopped2 = imageName2.split('.');
        $('#featured h2').remove();
        $('#featured')
            .prepend('<h2>' + chopped2[0] + ' </h2>')
            .children('h2')
            .fadeIn(500)
            .fadeto(200, .6);

    });

    $('ul#options li a').click(function() {
        return false;
    });
});