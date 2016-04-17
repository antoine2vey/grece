jQuery(document).ready(function(){
    var str = $('#montant-recolte').text();
    var amountTotal = str.substring(0, str.length -1);
    var goal = 25000;
    var percentEnd = Math.floor((amountTotal/goal)*100);
    console.log(percentEnd+"%")
    $('#percent').text(percentEnd+"%")
    $('#progress-bar').css({
        width:percentEnd+'%'
    });
})



$(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") && location.hostname == this.hostname) {
            var a = $(this.hash);
            if (a = a.length ? a : $("[name=" + this.hash.slice(1) + "]"), a.length)return $("html, body").animate({scrollTop: a.offset().top}, 500), !1
        }
    })
}), $(".alignleft").parent().css({"float": "left", margin: "30px"}), $(".alignright").parent().css({
    "float": "right",
    margin: "30px"
}), $(".aligncenter").parent().css("text-align", "center");


$('.amount').hide()
$('#button').click(function () {
    $('.amount').slideToggle('slow')
})

$('.amount').submit(function () {
    $(this).slideUp('fast')
});




