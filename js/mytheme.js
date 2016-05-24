$j(window).load(function() {
	showNav();
	flexSlider();

	if ($j(window).width() > 1122) {
		$j('.columnize').columnize({
			columns: 2,
			buildOnce: true
		});
	}
	showSearch();
	smoothScroll();
	homeCtaHeight();
	ctaHeight();
	contactFormErrors();
	pillWrapper()
	divHeights()

	if ($j('parent-pageid-20') || $j('parent-pageid-28') || $j('.parent-pageid-42')|| $j('.parent-pageid-48') || $j('.parent-pageid-80')) {
		$j('.sub-menu').has('li.current-menu-item').show();
	}
	if ($j('.sidebar-content').length < 1) {
		$j('.one-column-cont').css('border-right', 0);
	}

	if ( !(/(iPad|iPhone|iPod).*OS [6-7].*AppleWebKit.*Version.*Mobile.*Safari/.test(navigator.userAgent)) ) {
		$j.smartbanner({
		  title: 'KICA',
		  author: 'Download our App!',
		  daysHidden: 100,
		  icon: "https://lh6.ggpht.com/PgFTizDFW29lRFV1xOoEaiIVXh_7RKSesN8Y_L-bCb-ST2fzP2SV513sXmQL84yIEGY=w300-rw"
		});
	}

})


$j(window).resize(function() {
	homeCtaHeight();
	responsiveColumnizer();
	ctaHeight();

  	if ($j(window).width() > 1122) {
   		// navigationFadeAndHover();
   		subNavsOnHover()
   		divHeights()

  	} else {
  		$j('.one-column-cont.standard').css('height', 'auto')
	}
});


/////////////////////////////////////////////////////////////////

function flexSlider() {
	$j('.flexslider').flexslider({
  	animation:'fade',
  	startAt: 0,
  	controlNav:true,
  	direction:'vertical',
  	prevText: '',
  	nextText: '',
  	slideshowSpeed: 8500,
  	start: function(slider) {
  		var index = $j('li:has(.flex-active)').index('.flex-control-nav li')+1;
			var total = $j('.flex-control-nav li').length;
			$j('.flex-direction-nav').append('<p class="counter kepler-bold-italic">' + index + '/' + total + '</p>')
  	},
		before:function(){

		},
  	after: function(slider) {
  		var index = $j('li:has(.flex-active)').index('.flex-control-nav li')+1;
			var total = $j('.flex-control-nav li').length;
			$j('.flex-direction-nav .counter').html(index + '/' + total)
  	}
  });
}

function showNav() {
	$j('.nav-help').text('Navigation')
  	$j('#hamburger').on({
    	click: function() {
	      $j('#nav-wrapper').slideToggle();
	      $j(this).hide();
	      $j('#nav-close').css('display','inline-block');
	      $j('.nav-help').text('Close')
	      $j('.house').fadeIn(1000);
	      if ($j('#search-wrapper').css('display', 'block')) {
	      	$j('#search-wrapper').hide();
	      	$j('#search-close').hide();
	      	$j('#magnifying-glass').show();
	      }

	    }
	  });
	$j('#nav-close').on({
	    click: function() {
	      $j('#nav-wrapper').slideToggle();
	      $j(this).hide();
	      $j('#hamburger').show();
	      $j('.nav-help').text('Navigation')
	      $j('.house').fadeOut(500)
	    }
	});
}

function showSearch() {
	$j('#magnifying-glass').on({
	    click: function() {
	      $j('#search-wrapper').slideToggle();
	      $j(this).hide();
	      $j('#search-close').css('display','inline-block');
	      $j('.nav-help').text('Close')
	      if ($j('#nav-wrapper').css('display', 'block')) {
	      	$j('#nav-wrapper').hide();
	      	$j('#nav-close').hide();
	      	$j('#hamburger').show();
	      }
	    }
	});
	$j('#search-close').on({
	    click: function() {
	      $j('#search-wrapper').slideToggle();
	      $j(this).hide();
	      $j('#magnifying-glass').show();
	      $j('.nav-help').text('Navigation')
	    }
	});
}

function navigationFadeAndHover() {
	if ($j('.home').length > 0 && $j(window).width() > 1122) {
		$j('#nav-controls span').show();
		setTimeout(function() {
			$j('#nav-controls span').fadeOut("slow");
		}, 5000);
	}
	if ($j(window).width() > 1122) {
		$j('#nav-controls').on({
			'mouseenter': function() {
				$j('#nav-controls span').fadeIn('fast');
			},
			'mouseleave': function() {
				$j('#nav-controls span').fadeOut('fast');
			}
		})
	}

}

function responsiveColumnizer() {
  if ($j(window).width() > 1122) {
    // $j('.columnize').columnize({ columns: 2, buildOnce: true });
  } else {
    $j('.column > *').unwrap();
    // $('.intro').columnize({ columns: 1 });
  }
}

function smoothScroll() {
	$j('.arrow-overlay img').on('click', function(){
		console.log('clic')
	    $j('html, body').animate({
	        scrollTop: $j('#home-cont').offset().top
	    });
	    return false;
	});
}

function subNavsOnHover() {
	// var $arrow = $('.subheader .subpage-nav img');
	if ($j(window).width() > 1122) {
		$j('.subpage-subnav .sub-menu').on({
			'mouseenter': function() {
				$j(this).show();
			},
			'mouseleave': function() {
				$j(this).hide();
			}
		})
		$j('.subpage-nav .menu .menu-item-has-children').on({
			'mouseenter': function() {
				$j(this).children('ul').show();
				$j(this).append('')
			},
			'mouseleave': function() {
				$j(this).children('ul').hide();
			}
		});
	}
}

function subNavsOnPageVisit() {
	$j('.current-menu-item').closest('.subpage-subnav').show();
}

function homeCtaHeight() {
	var width = $j('.home-page.tiles a:nth-child(4)').width();
	$j('.tiles a').css('height', width);
}

function ctaHeight() {
	var width = $j('.main-subpage-ctas .tiles a').width();
	$j('.main-subpage-ctas .tiles a').css('height', (0.69 * width));
}

function contactFormErrors() {
	if (window.location.href.indexOf("wpcf") > -1) {
		console.log("uh oh");
		$j('.wpcf7-not-valid').css('border-bottom', '4px #db3a1b solid');
		$j('.wpcf7-not-valid').closest('p').css('color', '#db3a1b');
	}
}

function divHeights() {
	if ($j(window).width() > 1122) {
		var sideHeight = $j('.sidebar-content.standard').height()
		var mainHeight = $j('.one-column-cont.standard').height()
		if (mainHeight < sideHeight) {
			$j('.one-column-cont.standard').css('height', sideHeight);
		}
	}
}

function pillWrapper() {
	$j('.page-id-22 .bottom-cont ul').wrap('<div class="pill"></div>')
	$j('.page-id-38 .bottom-cont ul').wrap('<div class="pill"></div>')
	$j('.page-id-88 .bottom-cont ul').wrap('<div class="pill"></div>')
	$j('.page-id-94 .bottom-cont ul').wrap('<div class="pill"></div>')
}