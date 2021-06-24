@extends('layout.barsekut')
@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="h1">
      Data
    </div>
  </div>
  <div class="alert alert-success" role="alert">
    Status Tsunami {{$data_sea[0]->Status}} Selamat Beraktifitas
  </div>
  <div class="row">
    <div class="col">
      <h6>Lokasi : Pangandaran</h6>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h6>Tanggal : 10/06/2021</h6>
    </div>
    <div class="row">
      <div class="col">
        <h6>Waktu : 08:30:31</h6>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1> Grafik Tinggi Laut </h1>
      </div>
      <div class="col">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Filter Grafik
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Harian</a></li>
            <li><a class="dropdown-item" href="#">Mingguan</a></li>
            <li><a class="dropdown-item" href="#">Bulanan</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row p-5">
      <canvas width="300" id="TinggiChart"></canvas>
  </div>
    <div class="row">
      <div class="col">
        <h1> Grafik Kecepatan Arus </h1>
      </div>
    </div>
    <div class="row p-5">
      <canvas width="300" id="ArusChart"></canvas>
  </div>
    <div class="row">
      <div class="col">
        <h1> Grafik Getaran </h1>
      </div>
    </div>
    <div class="row p-5">
      <canvas width="300" id="GetaranChart"></canvas>
  </div>
  </div>
  
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

  var dataFirst = {
  label: "Tinggi",
  data: ['{{$data_sea[4]->Tgel}}', '{{$data_sea[3]->Tgel}}', '{{$data_sea[2]->Tgel}}', '{{$data_sea[1]->Tgel}}','{{$data_sea[0]->Tgel}}'],
  backgroundColor:"rgba(255,0,0,1)",
  borderColor:"rgba(255,0,0,1)",
};
var speedData = {
  labels: ['{{$data_sea[4]->created_at}}', '{{$data_sea[3]->created_at}}', '{{$data_sea[2]->created_at}}', '{{$data_sea[1]->created_at}}','{{$data_sea[0]->created_at}}'],
  datasets: [dataFirst]
};
var lineChart = new Chart( document.getElementById('TinggiChart'), {
  type: 'line',
  data: speedData
});

</script>
<script>

  var dataFirst = {
  label: "Arus",
  data: ['{{$data_sea[4]->Arus}}', '{{$data_sea[3]->Arus}}', '{{$data_sea[2]->Arus}}', '{{$data_sea[1]->Arus}}','{{$data_sea[0]->Arus}}'],
  backgroundColor:"rgba(124,185,232)",
  borderColor:"rgba(124,185,232)",
};
var speedData = {
  labels:['{{$data_sea[4]->created_at}}', '{{$data_sea[3]->created_at}}', '{{$data_sea[2]->created_at}}', '{{$data_sea[1]->created_at}}','{{$data_sea[0]->created_at}}'],
  datasets: [dataFirst]
};
var lineChart = new Chart( document.getElementById('ArusChart'), {
  type: 'line',
  data: speedData
});

</script>
<script>

  var dataFirst = {
  label: "Getaran",
  data: ['{{$data_sea[4]->KG}}', '{{$data_sea[3]->KG}}', '{{$data_sea[2]->KG}}', '{{$data_sea[1]->KG}}','{{$data_sea[0]->KG}}'],
  backgroundColor:"rgb(59,122,87)",
  borderColor:"rgb(59,122,87)",
};
var speedData = {
  labels: ['{{$data_sea[4]->created_at}}', '{{$data_sea[3]->created_at}}', '{{$data_sea[2]->created_at}}', '{{$data_sea[1]->created_at}}','{{$data_sea[0]->created_at}}'],
  datasets: [dataFirst]
};
var lineChart = new Chart( document.getElementById('GetaranChart'), {
  type: 'line',
  data: speedData
});

</script>
</body>

</html>
@endsection