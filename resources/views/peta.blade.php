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
          center: [108.6568, -7.6969],
          maxZoom: 16,
          minZoom: 9,
          zoom: 9.68
        });
            
      </script>
  </div>
</div>

</body>

</html>
@endsection