(function($) {




	$(document).ready(function() {

		
		// if home no nav, otherwise nav is permanent
		if ( $('body').hasClass('home') ) {
			console.log('is home');
		} else {
			console.log('is not home');
			$('.navigation-top').addClass('made-it');
		}


		$('.title-click').click(function() {
			// folio plus click
			var $plus = $('.title-click svg');
			
			$('.hidden-content').slideToggle(200);
			$plus.toggleClass('clicked');
		});

		// mobile nav click
		$('.menu-toggle').click(function() {
			
			$('.menu-main-container').slideToggle(200);
		});

		// scroll click
		$(function() {
		  $('a[href*=#]:not([href=#])').click(function() {
		    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		      var target = $(this.hash);
		      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		      if (target.length) {
		        $('html,body').animate({
		          scrollTop: target.offset().top
		        }, 1000);
		        return false;
		      }
		    }
		  });
		});

		// scrolled nav click to home
		$(".logo-link").click(function(e){
        	e.preventDefault();
        	window.location = "/";    
		});

		// the timeline
		var arrowJiggle = new TimelineLite();

		// the variables
		var scrollArrow = $('.menu-scroll-down');

		function arrowAnim(){
		    arrowJiggle

		        .add( TweenMax.fromTo(scrollArrow, 1, {top: -40}, {top: -20, repeat: 5, yoyo: true, ease:Elastic.easeIn})) // arrow effect 2

		        ; // end of animation
		}

		setTimeout(arrowAnim, 500);



		// scrolls
		var controller = new ScrollMagic.Controller();

		var scene = new ScrollMagic.Scene({
			//triggerElement: '.navigation-top',
			triggerElement: '.home #content',
			triggerHook: 'onLeave',
			offset: -20
		})

		.on('start', function() {
			console.log('trigger passed');
		})

		.setClassToggle(".navigation-top", 'made-it') // add class toggle

		//.addIndicators() // add indicators
		.addTo(controller);

		// add class when images come into view
		$('.masonry .column img').on('inview', function(event, isInView) {
  			if (isInView) {
		    // element is now visible in the viewport
		    jQuery(this).addClass('lazy-loaded');
		  } else {
		    // element has gone out of viewport
		    jQuery(this).removeClass('lazy-loaded');
		  }
		});

		
	});

	function masonryHome() {

		$('.column-custom img').each(function( index ) {
			var $thumbsHeight = $(this).outerHeight();

			$(this).parent().css('height', $thumbsHeight);

		  console.log($thumbsHeight);
		});


		var $grid = $('.masonry').imagesLoaded( function() {

			console.log('images are loaded');
  			// init Masonry after all images have loaded
  			$grid.masonry({
				// options
				itemSelector: '.column-custom',
				columnWidth: '.column-custom',
				gutter: 20
			});
		});
	}

	$(window).load(function() {

		console.log('window loaded');
		setTimeout(masonryHome, 500);
		
	});


	// Returns a function, that, as long as it continues to be invoked, will not
	// be triggered. The function will be called after it stops being called for
	// N milliseconds. If `immediate` is passed, trigger the function on the
	// leading edge, instead of the trailing.
	function debounce(func, wait, immediate) {
		var timeout;
		return function() {
			var context = this, args = arguments;
			var later = function() {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		};
	};

	var myEfficientFn = debounce(function() {
		console.log('resized');
		masonryHome();
	}, 250);

	window.addEventListener('resize', myEfficientFn);


})( jQuery );