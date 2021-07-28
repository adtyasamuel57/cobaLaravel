@extends('layout.barsekut')
@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="h1">
      Peta
      <h6>Latitude = -7.6999 </h6>
      <h6>Longitude = 108.6200 </h6>
    </div>
  
    <div id='map' style='width: 1920px; height: 1080px;'></div>
      <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiYWR0eWFzYW11ZWwiLCJhIjoiY2txd2MyMTUxMGVvcjMxcnpidnFsYmJlNiJ9.y8z4MaypTyChPJMnWcUXAQ';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/streets-v11',
          center: [108.6200, -7.6999],
          maxZoom: 16,
          minZoom: 9,
          zoom: 14
        });
        map.on('load', function () {
// Load an image from an external URL.
map.loadImage(
'https://th.bing.com/th/id/R.bec044300062f7987a97cb0f3e8e4827?rik=9gHxYQAworke5w&riu=http%3a%2f%2fimage.flaticon.com%2ficons%2fpng%2f512%2f0%2f619.png&ehk=I22HXK0YVoFCobMMPoqJd8w7atxNkd0BFFLFMCNCQ3E%3d&risl=&pid=ImgRaw',
function (error, image) {
if (error) throw error;
 
// Add the image to the map style.
map.addImage('cat', image);
 
// Add a data source containing one point feature.
map.addSource('point', {
'type': 'geojson',
'data': {
'type': 'FeatureCollection',
'features': [
{
'type': 'Feature',

'geometry': {
'type': 'Point',
'coordinates': [108.6200, -7.6999]
}
}
]
}
});
 
// Add a layer to use the image to represent the data.
map.addLayer({
'id': 'points',
'type': 'symbol',
'source': 'point', // reference the data source
'layout': {
'icon-image': 'cat', // reference the image
'icon-size': 0.15
}
});
}
);
});

    var m = marker.getLatLng();
    coordinates.innerHTML = 'Latitude: ' + m.lat + '<br />Longitude: ' + m.lng;

                                  
                      
      </script>
  </div>
</div>

</body>

</html>
@endsection