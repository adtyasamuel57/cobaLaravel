@extends('layout.barsekut')
@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="h1">
      Peta
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
            
      </script>
  </div>
</div>

</body>

</html>
@endsection