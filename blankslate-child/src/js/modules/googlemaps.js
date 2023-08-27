export default function gMapsService() {
  console.log("GMaps render!");
  (function ($) {
    console.log("GMaps render!");
    var map;
    /*
     *  render_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function render_map($el) {
      // var
      var $markers = $el.find(".marker");

      // create map
      map = new google.maps.Map($el[0], {
        zoom: 10, // Default zoom level
        disableDefaultUI: true, // Disable all default UI controls
        styles: [
          {
            elementType: "geometry",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            elementType: "labels.icon",
            stylers: [{ visibility: "off" }],
          },
          {
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            elementType: "labels.text.stroke",
            stylers: [{ color: "#f5f5f5" }],
          },
          {
            featureType: "administrative.land_parcel",
            elementType: "labels.text.fill",
            stylers: [{ color: "#bdbdbd" }],
          },
          {
            featureType: "poi",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "poi",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "poi.park",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "poi.park",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "road",
            elementType: "geometry",
            stylers: [{ color: "#ffffff" }],
          },
          {
            featureType: "road.arterial",
            elementType: "labels.text.fill",
            stylers: [{ color: "#757575" }],
          },
          {
            featureType: "road.highway",
            elementType: "geometry",
            stylers: [{ color: "#dadada" }],
          },
          {
            featureType: "road.highway",
            elementType: "labels.text.fill",
            stylers: [{ color: "#616161" }],
          },
          {
            featureType: "road.local",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
          {
            featureType: "transit.line",
            elementType: "geometry",
            stylers: [{ color: "#e5e5e5" }],
          },
          {
            featureType: "transit.station",
            elementType: "geometry",
            stylers: [{ color: "#eeeeee" }],
          },
          {
            featureType: "water",
            elementType: "geometry",
            stylers: [{ color: "#c9c9c9" }],
          },
          {
            featureType: "water",
            elementType: "labels.text.fill",
            stylers: [{ color: "#9e9e9e" }],
          },
        ],
      });

      // add a markers reference
      map.markers = [];

      // add markers
      $markers.each(function () {
        add_marker($(this), map);
      });

      // center map
      center_map(map);
    }

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker($marker, map) {
      // var
      var latlng = new google.maps.LatLng(
        $marker.attr("data-lat"),
        $marker.attr("data-lng")
      );

      const iconBase =
        "/wp-content/themes/blankslate-child/assets/";
      var title = $marker.attr("data-title"); // Get the title attribute
      // create marker

      var icon = {
        url: iconBase + "push_pin.png",
        scaledSize: new google.maps.Size(13, 22), // size
    };
      var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        title: title, // Set the title of the marker
        animation: google.maps.Animation.DROP,
        icon: icon
      });

      // add to array
      map.markers.push(marker);
      console.log($marker.html());
      // if marker contains HTML, add it to an infoWindow
      // create an info window with title as content
      var infowindow = new google.maps.InfoWindow({
        content: title,
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, "click", function () {
        infowindow.open(map, marker);

        // Close the info window after 3 seconds
        setTimeout(function () {
          infowindow.close();
        }, 3000);
      });
    }

    // Select all partner divs
    const partnerDivs = document.querySelectorAll(".partner-card");

    // Add click event listeners to the partner divs
    partnerDivs.forEach((partnerDiv) => {
      partnerDiv.addEventListener("click", function () {
        const lat = parseFloat(partnerDiv.getAttribute("data-lat"));
        const lng = parseFloat(partnerDiv.getAttribute("data-lng"));
        const title = partnerDiv.getAttribute("data-title");
        console.log(title);
        // Focus the map on the clicked partner's location
        map.panTo({ lat, lng });
        const markerToOpen = findMarkerByCoordinates(map.markers, lat, lng);
        var infowindow = new google.maps.InfoWindow({
          content: title,
        });
        infowindow.open(map, markerToOpen);
      });
    });

    // Function to find a marker based on its coordinates
    function findMarkerByCoordinates(markers, lat, lng) {
      return markers.find(
        (marker) =>
          marker.getPosition().lat() === lat &&
          marker.getPosition().lng() === lng
      );
    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map(map) {
      // vars
      var bounds = new google.maps.LatLngBounds();

      // loop through all markers and create bounds
      $.each(map.markers, function (i, marker) {
        var latlng = new google.maps.LatLng(
          marker.position.lat(),
          marker.position.lng()
        );

        bounds.extend(latlng);
      });

      // only 1 marker?
      if (map.markers.length == 1) {
        // set center of map
        map.setCenter(bounds.getCenter());
        map.setZoom(16);
      } else {
        // fit to bounds
        map.fitBounds(bounds);
      }
    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */

    $(document).ready(function () {
      console.log($(".acf-map"));
      $(".acf-map").each(function () {
        render_map($(this));
      });
    });

    // Attach the ajaxComplete event handler
    $(document).ajaxComplete(function () {
      // Call the reinitializeMap function after any AJAX request completes
      console.log($(".acf-map"));
      $(".acf-map").each(function () {
        render_map($(this));
      });

      // Select all partner divs
      const partnerDivs = document.querySelectorAll(".partner-card");

      // Add click event listeners to the partner divs
      partnerDivs.forEach((partnerDiv) => {
        partnerDiv.addEventListener("click", function () {
          const lat = parseFloat(partnerDiv.getAttribute("data-lat"));
          const lng = parseFloat(partnerDiv.getAttribute("data-lng"));
          const title = partnerDiv.getAttribute("data-title");
          console.log(title);
          // Focus the map on the clicked partner's location
          map.panTo({ lat, lng });
          const markerToOpen = findMarkerByCoordinates(map.markers, lat, lng);
          var infowindow = new google.maps.InfoWindow({
            content: title,
          });
          infowindow.open(map, markerToOpen);
        });
      });
    });
  })(jQuery);
}
