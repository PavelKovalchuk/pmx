function initMap() {
  var map_canvas = document.getElementById('map');
  var lati = $('#map').attr('data-lat'),
  longi = $('#map').attr('data-long'),
  long = +longi - 0.001;
  var zoomAttr = $('#map').attr('data-zoom');
  var markerPos = {lat: +lati, lng: +longi};
  var mapOptions = {
      center: new google.maps.LatLng(lati, long),
      zoom: +zoomAttr,
      zoomControl: true,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.SMALL,
      },
      disableDoubleClickZoom: true,
      mapTypeControl: false,
      scaleControl: false,
      scrollwheel: true,
      panControl: false,
      streetViewControl: false,
      draggable : true,
      overviewMapControl: false,
      overviewMapControlOptions: {
          opened: false,
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      styles: [{ featureType: 'all'} ],
  }

  var map = new google.maps.Map(map_canvas, mapOptions);

  var marker = new google.maps.Marker({
    position: markerPos,
    title: 'proMX GmbH',
    map: map
  });

  var getCenter = map.getCenter();
  google.maps.event.addDomListener(window, 'resize', function() {
    map.setCenter(getCenter);
 });
}

google.maps.event.addDomListener(window, 'load', initMap);
