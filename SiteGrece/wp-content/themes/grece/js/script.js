/**
 * Created by deveyracantoine on 14/03/16.
 */
$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });
});


/** reset photo **/

$('.alignleft').parent().css({
    float: 'left',
    margin: '30px'
})
$('.alignright').parent().css({
    float: 'right',
    margin: '30px'
})
$('.aligncenter').parent().css('text-align', 'center')