/* Initialize
*/
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};
jQuery(document).ready(function ($) {

	// Bootstrap Init
		$("[rel=tooltip]").tooltip();
		$('[data-toggle=tooltip]').tooltip();
		$("[rel=popover]").popover();
		$('#authorTab a').click(function (e) {e.preventDefault(); $(this).tab('show'); });
		$('.sc_tabs a').click(function (e) {e.preventDefault(); $(this).tab('show'); });
		
		$(".videofit").fitVids();
		$(".embed-youtube").fitVids();
		$('.kad-select').customSelect();
		$('.woocommerce-ordering select').customSelect();
    $('.collapse-next').click(function (e) {
      //e.preventDefault();
        var $target = $(this).siblings('.sf-dropdown-menu');
         if($target.hasClass('in') ) {
          $target.collapse('toggle');
          $(this).removeClass('toggle-active');
        } else {
          $target.collapse('toggle');
          $(this).addClass('toggle-active');
        }
    });
	// Lightbox
  function kt_check_images( index, element ) {
      return /(png|jpg|jpeg|gif|tiff|bmp)$/.test(
        $( element ).attr( 'href' ).toLowerCase().split( '?' )[0].split( '#' )[0]
      );
    }

    function kt_find_images() {
      $( 'a[href]' ).filter( kt_check_images ).attr( 'data-rel', 'lightbox' );
    }
    kt_find_images();
		$.extend(true, $.magnificPopup.defaults, {
			tClose: '',
			tLoading: light_load, // Text that is displayed during loading. Can contain %curr% and %total% keys
			gallery: {
				tPrev: '', // Alt text on left arrow
				tNext: '', // Alt text on right arrow
				tCounter: light_of // Markup for "1 of 7" counter
			},
			image: {
				tError: light_error, // Error message when image could not be loaded
				titleSrc: function(item) {
					return item.el.find('img').attr('alt');
					}
				}
		});
		$("a[rel^='lightbox']").magnificPopup({type:'image'});
    $("a[data-rel^='lightbox']").magnificPopup({type:'image'});
		$('.kad-light-gallery').each(function(){
			$(this).find('a[rel^="lightbox"]').magnificPopup({
				type: 'image',
				gallery: {
					enabled:true
					},
					image: {
						titleSrc: 'title'
					}
				});
		});
    $('.kad-light-gallery').each(function(){
      $(this).find("a[data-rel^='lightbox']").magnificPopup({
        type: 'image',
        gallery: {
          enabled:true
          },
          image: {
            titleSrc: 'title'
          }
        });
    });
		$('.kad-light-wp-gallery').each(function(){
			$(this).find('a[rel^="lightbox"]').magnificPopup({
				type: 'image',
				gallery: {
					enabled:true
					},
					image: {
						titleSrc: function(item) {
						return item.el.find('img').attr('alt');
						}
					}
				});
		});
    $('.kad-light-wp-gallery').each(function(){
      $(this).find("a[data-rel^='lightbox']").magnificPopup({
        type: 'image',
        gallery: {
          enabled:true
          },
          image: {
            titleSrc: function(item) {
            return item.el.find('img').attr('alt');
            }
          }
        });
    });
	//Superfish Menu
		$('ul.sf-menu').superfish({
			delay:       200,                            // one second delay on mouseout
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation
			speed:       'fast'                          // faster animation speed
		});
		function kad_fullwidth_panel() {
		var margins = $(window).width() - $('#content').width();
			$('.panel-row-style-wide-feature').each(function(){
				$(this).css({'padding-left': margins/2 + 'px'});
				$(this).css({'padding-right': margins/2 + 'px'});
				$(this).css({'margin-left': '-' + margins/2 + 'px'});
				$(this).css({'margin-right': '-' + margins/2 + 'px'});
				$(this).css({'visibility': 'visible'});
			});
		}
		kad_fullwidth_panel();
	$(window).on("debouncedresize", function( event ) {kad_fullwidth_panel();});

	 //init Flexslider
     $('.kt-flexslider').each(function(){
	 	var flex_speed = $(this).data('flex-speed'),
		flex_animation = $(this).data('flex-animation'),
		flex_animation_speed = $(this).data('flex-anim-speed'),
		flex_auto = $(this).data('flex-auto');
	 	$(this).flexslider({
	 		animation:flex_animation,
			animationSpeed: flex_animation_speed,
			slideshow: flex_auto,
			slideshowSpeed: flex_speed,
			start: function ( slider ) {
				slider.removeClass( 'loading' );
			}
		});
    });
	//init masonry
	$('.init-masonry').each(function(){
    	var masonrycontainer = $(this),
    	masonry_selector = $(this).data('masonry-selector');
    	masonrycontainer.imagesLoadedn( function(){
			masonrycontainer.masonry({itemSelector: masonry_selector});
		});
	});
		 //init carousel
    jQuery('.initcaroufedsel').each(function(){
     	  var container = jQuery(this);
          var wcontainerclass = container.data('carousel-container'), 
          cspeed = container.data('carousel-speed'), 
          ctransition = container.data('carousel-transition'),
          cauto = container.data('carousel-auto'),
          carouselid = container.data('carousel-id'),
          ss = container.data('carousel-ss'), 
          xs = container.data('carousel-xs'),
          sm = container.data('carousel-sm'),
          md = container.data('carousel-md');
          var wcontainer = jQuery(wcontainerclass);
          function getUnitWidth() {var width;
          if(jQuery(window).width() <= 540) {
          width = wcontainer.width() / ss;
          } else if(jQuery(window).width() <= 768) {
          width = wcontainer.width() / xs;
          } else if(jQuery(window).width() <= 990) {
          width = wcontainer.width() / sm;
          } else {
          width = wcontainer.width() / md;
          }
          return width;
          }

          function setWidths() {
          var unitWidth = getUnitWidth() -1;
          container.children().css({ width: unitWidth });
          }
          setWidths();
          function initCarousel() {
          container.carouFredSel({
            scroll: {items:1, easing: "swing", duration: ctransition, pauseOnHover : true}, 
            auto: {play: cauto, timeoutDuration: cspeed},
              prev: '#prevport-'+carouselid, next: '#nextport-'+carouselid, pagination: false, swipe: true, items: {visible: null}
            });
	      }
	      container.imagesLoadedn( function(){
          	initCarousel();
      	});
        	wcontainer.animate({'opacity' : 1});
          	jQuery(window).on("debouncedresize", function( event ) {
          		container.trigger("destroy");
          		setWidths();
          		initCarousel();
          	});
    });
	 //init carouselslider
    jQuery('.initcarouselslider').each(function(){
     	  var container = jQuery(this);
          var wcontainerclass = container.data('carousel-container'), 
          cspeed = container.data('carousel-speed'), 
          ctransition = container.data('carousel-transition'),
          cauto = container.data('carousel-auto'),
          carouselid = container.data('carousel-id'),
          carheight = container.data('carousel-height'),
          align = 'center';
          var wcontainer = jQuery(wcontainerclass);

          function setWidths() {
            var unitWidth = container.width();
            container.children().css({ width: unitWidth });
              if(jQuery(window).width() <= 768) {
                  carheight = null;
                  container.children().css({ height: 'auto' });
              }
          }
          setWidths();
          function initCarouselslider() {
            container.carouFredSel({
              width: '100%',
              height: carheight,
              align: align,
              auto: {play: cauto, timeoutDuration: cspeed},
              scroll: {items : 1,easing: 'quadratic'},
              items: {visible: 1,width: 'variable'},
              prev: '#prevport-'+carouselid,
              next: '#nextport-'+carouselid,
              swipe: {onMouse: false,onTouch: true},
            });
	      }
	      container.imagesLoadedn( function(){
          	initCarouselslider();
            wcontainer.animate({'opacity' : 1});
            wcontainer.css({ height: 'auto' });
            wcontainer.parent().removeClass('loading');
      	});
          	jQuery(window).on("debouncedresize", function( event ) {
          		container.trigger("destroy");
          		setWidths();
          		initCarouselslider();
          	});
    });
});
if( isMobile.any() ) {
jQuery(document).ready(function ($) {
		$('.caroufedselclass').tswipe({
			              excludedElements:"button, input, select, textarea, .noSwipe",
						   tswipeLeft: function() {
							$('.caroufedselclass').trigger('next', 1);
						  },
						  tswipeRight: function() {
							$('.caroufedselclass').trigger('prev', 1);
						  },
						  tap: function(event, target) {
							window.open(jQuery(target).closest('.grid_item').find('a').attr('href'), '_self');
						  }
		});
	});
}


