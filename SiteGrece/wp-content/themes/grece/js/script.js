$(function(){$('a[href*="#"]:not([href="#"])').click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var a=$(this.hash);if(a=a.length?a:$("[name="+this.hash.slice(1)+"]"),a.length)return $("html, body").animate({scrollTop:a.offset().top},500),!1}})}),$(".alignleft").parent().css({"float":"left",margin:"30px"}),$(".alignright").parent().css({"float":"right",margin:"30px"}),$(".aligncenter").parent().css("text-align","center");