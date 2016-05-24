$j(window).load(function() {
	showNav();
	showSearch();
	navigationFadeAndHover();
	smoothScroll();
	subNavsOnHover($j('#menu-item-241'),$j('.subpage-subnav.board'))
	subNavsOnHover ($j('#menu-item-242'),$j('.subpage-subnav.departments'))
	subNavsOnHover($j('#menu-item-255'),$j('.subpage-subnav.gate-access'))
	subNavsOnHover($j('#menu-item-269'),$j('.subpage-subnav.island-orgs'))
	subNavsOnHover($j('#menu-item-257'),$j('.subpage-subnav.shuttle'))
	subNavsOnPageVisit();
	greenArrows();
	contactFormErrors();
	stickyAnnouncement();
})

google.maps.event.addDomListener(window, 'load', mapInitialize);

$j(window).load(function() {
    $j('.flexslider').flexslider({
    	animation:'slide',
    	startAt: 0,
    	controlNav:true,
    	direction:'vertical',
    	prevText: '',
    	nextText: '',
    	start: function(slider) {
    		var index = $j('li:has(.flex-active)').index('.flex-control-nav li')+1;
				var total = $j('.flex-control-nav li').length;
				$j('.flexslider').append('<p class="counter kepler-bold-italic">' + index + '/' + total + '</p>')
    	},
    	after: function(slider) {
    		var index = $j('li:has(.flex-active)').index('.flex-control-nav li')+1;
				var total = $j('.flex-control-nav li').length;
				$j('.flexslider .counter').html(index + '/' + total)
    	}
    });
});

/////////////////////////////////////////////////////////////////


function showNav() {
  $j('#hamburger').on({
    click: function() {
      $j('#nav-wrapper').slideToggle();
      $j(this).hide();
      $j('#nav-close').css('display','inline-block');
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
    }
  });
}

function showSearch() {
	$j('#magnifying-glass').on({
	    click: function() {
	      $j('#search-wrapper').slideToggle();
	      $j(this).hide();
	      $j('#search-close').css('display','inline-block');
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
	    }
	});
}

function navigationFadeAndHover() {
	setTimeout(function() {
		$j('#nav-controls span').fadeOut("slow");
	}, 5000);
	$j('#nav-controls').on({
		'mouseenter': function() {
			$j('#nav-controls span').show();
		},
		'mouseleave': function() {
			$j('#nav-controls span').hide();
		}
	})
}

function sliderText() {
	var index = $j('li:has(.flex-active)').index('.flex-control-nav li')+1;
	var total = $j('.flex-control-nav li').length;
	$j('.flexslider').append('<p>' + index + '/' + total + '</p>')
}

function stickyAnnouncement() {
	if($j('.sticky-image').length>0) {
		$j('.slides li:first-child').after('<li>'+ $j('.sticky-image').html() +'<div class="flex-caption">' + $j('.sticky-announcement').html() + '</div></li>');
	}
}


function smoothScroll() {
	$j('.arrow-link').click(function(){
	    $j('html, body').animate({
	        scrollTop: $j( $j.attr(this, 'href') ).offset().top
	    }, 400);
	    return false;
	});
}

function subNavsOnHover(menuItem,subNav) {
	menuItem.on({
		'mouseenter': function() {
			subNav.show();
		},
		'mouseleave': function() {
			subNav.hide();
		}
	});
	subNav.on({
		'mouseenter': function() {
			$j(this).show();
			menuItem.css('border-bottom','#0c796a solid 5px');
		},
		'mouseleave': function() {
			$j(this).hide();
			// menuItem.css('border-bottom','4px white solid');
		}
	})
}

function subNavsOnPageVisit() {
	$j('.current-menu-item').closest('.subpage-subnav').show();
}

function greenArrows() {

}


function contactFormErrors() {
	if (window.location.href.indexOf("wpcf") > -1) {
		console.log("uh oh");
		$j('.wpcf7-not-valid').css('border-bottom', '4px #db3a1b solid');
		$j('.wpcf7-not-valid').closest('p').css('color', '#db3a1b');
	}

}

function mapInitialize() {
	var myOptions = {
	    zoom: 15,
	    center: new google.maps.LatLng(32.60103, -80.10853),
	    mapTypeId: google.maps.MapTypeId.ROADMAP,
	    styles: [
		    {
		        "featureType": "road",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "lightness": 100
		            },
		            {
		                "visibility": "simplified"
		            }
		        ]
		    },
		    {
		        "featureType": "water",
		        "elementType": "geometry",
		        "stylers": [
		            {
		                "visibility": "on"
		            },
		            {
		                "color": "#C6E2FF"
		            }
		        ]
		    },
		    {
		        "featureType": "poi",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#C5E3BF"
		            }
		        ]
		    },
		    {
		        "featureType": "road",
		        "elementType": "geometry.fill",
		        "stylers": [
		            {
		                "color": "#D1D1B8"
		            }
		        ]
		    }
		]

	};

	var map = new google.maps.Map(document.getElementById('map-canvas'), myOptions);
}

















