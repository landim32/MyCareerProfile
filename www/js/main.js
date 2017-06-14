jQuery(document).ready(function($) {
    $('.level-bar-inner').css('width', '0');
    $(window).on('load', function() {
        $('.level-bar-inner').each(function() {
            var itemWidth = $(this).data('level');
            $(this).animate({
                width: itemWidth
            }, 800);
        });
    });
    $('a.hidden-btn').click(function () {
        var link = $(this).attr('href');
        $(this).hide();
        $(link).slideDown( 'slow', function() {
            //animacao completa
        });
        return false;
    });

});