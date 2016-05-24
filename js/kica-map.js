;(function($, window, undefined){

  $(document).ready(function(){

    var map,
        geocoder,
        styles = [{"featureType": "road",
                   "elementType": "geometry",
                   "stylers": [{ "lightness": 100   },
                              { "visibility": "simplified" }]
                  },
                  {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"visibility": "on"},
                                {"color": "#C6E2FF"}]
                  },
                  {
                    "featureType": "poi",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#C5E3BF"}]
                  },
                  {
                    "featureType": "road",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#D1D1B8"}]
                  }]

    var map_tools = {
      map_html: $('#map-canvas')[0],
      init_zoom: 15,
      init_center: new google.maps.LatLng(32.60103, -80.10853),
      map_type: google.maps.MapTypeId.ROADMAP,
      map_init: function()
      {
        geocoder = new google.maps.Geocoder();

        var myOptions = {
          zoom: this.init_zoom,
          center: this.init_center,
          mapTypeId: this.map_type,
          styles: styles,
        };

        var marker = new google.maps.Marker({
          map: map,
          position: this.init_center
        });

        map = new google.maps.Map( this.map_html, myOptions );

      },
      geocode_string:function( a, b )
      {
        geocoder.geocode( { 'address': a}, function(r, s)
        {
          if (s == google.maps.GeocoderStatus.OK)
          {
            b( a, r[0] );
          }
          else
          {
            map_tools.fire_error( s );
          }
        })
      },
      fire_error:function( a )
      {
        alert( 'Geocoding failed to find your address, please try again.' );
      },
      reset_map_center:function(m,c)
      {
        m.setCenter(c);
      },
      add_marker:function(m, c, a, d)
      {
        var marker = new google.maps.Marker({ map: map, position: c });
        marker.setMap(map);
        this.add_infowindow(marker, d, a);
      },
      add_infowindow:function(m, d, a)
      {
        var contentString = '<div class="marker-content">'+
                            '<h1>'+ d.formatted_address+'</h1>'+
                            '<div class="read-more"><p><a href="https://www.google.com/maps/place/'+ a +'" target="_blank">Get directions &raquo;</a></p></div>'+
                            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        infowindow.open(map,m);
      }

    }



    // BUILD THE MAP ON PAGE LOAD
    google.maps.event.addDomListener( window, 'load', map_tools.map_init() );

    // CONTROL STRUCTURE FOR FORM SUBMIT
    $('#js-get-directions').submit(function(e)
    {
      e.preventDefault();

      var form = $(this),
          input = $(this).find('input[type="text"]');

      if( input.val().length > 0 )
      {
        var encoded_string =  input.val();
            encoded_string = encoded_string.split(' ').join('+');

        map_tools.geocode_string(encoded_string , function( address_string, coords )
        {
          map_tools.reset_map_center(map, coords.geometry.location);
          map_tools.add_marker(map, coords.geometry.location, address_string,  coords);
        })
      }

    })

  })

})(jQuery, window);
