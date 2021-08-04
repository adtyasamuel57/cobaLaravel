@extends('layout.barsekut')
@section('content')
<div class="container mt-5">
  <div class="row">
    <div class="h1">
      Data
    </div>
  </div>
  <!-- Ini buat beda warna status -->
  @if($data_api =="Aman")
  <div class="alert alert-success" role="alert">
    Status Tsunami {{$data_api}} Selamat Beraktifitas
  </div>
  @elseif($data_api =="awas")
  <div class="alert alert-warning" role="alert">
    Status Tsunami {{$data_api}} Kemasi Barang anda dan segera hubungi petugas berwenang
  </div>
  @elseif($data_api =="Bahaya")
  <div class="alert alert-danger" role="alert">
    Status Tsunami {{$data_api}} SEGERA LAKUKAN EVAKUASI SECEPATNYA!
  </div>
  @endif
  <!-- Ini buat beda warna nilai -->
  <div class="row text-center">
      <div class="col">
        @if($datapi_tinggi =="dangkal")
        <div class="badge bg-success">
        <h6> Tinggi Gelombang {{$datapi_tinggi}} dengan ketinggian {{$nilai_tinggi}} Meter <h6>
        </div>
        @elseif($datapi_tinggi =="sedang")
        <div class="badge bg-warning text-dark">
        <h6>Tinggi Gelombang {{$datapi_tinggi}} dengan ketinggian {{$nilai_tinggi}} Meter <h6>
        </div>
        @elseif($datapi_tinggi =="tinggi")
        <div class="badge bg-danger">
        <h6>Tinggi Gelombang {{$datapi_tinggi}} dengan ketinggian {{$nilai_tinggi}} Meter <h6>
        </div>
        @endif
      </div>
      <!-- arus -->
      <div class="col">
        @if($datapi_arus =="lambat")
        <div class="badge bg-success">
        <h6> Kecepatan arus {{$datapi_arus}} dengan kecepatan {{$nilai_arus}} m/s <h6>
        </div>
        @elseif($datapi_arus =="sedang")
        <div class="badge bg-warning text-dark">
        <h6> Kecepatan arus {{$datapi_arus}} dengan kecepatan {{$nilai_arus}} m/s <h6>
        </div>
        @elseif($datapi_arus =="kuat")
        <div class="badge bg-danger">
        <h6> Kecepatan arus {{$datapi_arus}} dengan kecepatan {{$nilai_arus}} m/s <h6>
        </div>
        @endif
      </div>
      <div class="col">
        @if($datapi_getar =="putih")
        <div class="badge bg-light text-dark">
        <h6> Kuat getaran {{$datapi_getar}} dengan skala {{$nilai_getar}} GAL <h6>
        </div>
        @elseif($datapi_getar =="hijau")
        <div class="badge bg-success">
        <h6> Kuat getaran {{$datapi_getar}} dengan skala {{$nilai_getar}} GAL <h6>
        </div>
        @elseif($datapi_getar =="kuning")
        <div class="badge bg-warning text-dark">
        <h6> Kuat getaran {{$datapi_getar}} dengan skala {{$nilai_getar}} GAL <h6>
        </div>
        @elseif($datapi_getar =="jingga")
        <div class="badge bg-warning text-dark">
        <h6> Kuat getaran {{$datapi_getar}} dengan skala {{$nilai_getar}} GAL <h6>
        </div>
        @elseif($datapi_getar =="merah")
        <div class="badge bg-danger">
        <h6> Kuat getaran {{$datapi_getar}} dengan skala {{$nilai_getar}} GAL <h6>
        </div>
        @endif
      </div>
  </div>
  <div class="row"> </div>
  <div class="row">
    <div class="col">
      <h6>Lokasi : Pangandaran</h6>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <h6>Tanggal : {{$data_time}} </h6>
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
            <li><a class="dropdown-item" href="/data/harian">Harian</a></li>
            <li><a class="dropdown-item" href="/data/bulanan">Bulanan</a></li>
            <li><a class="dropdown-item" href="/data/semua">Semua</a></li>
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
    data: [<?=$data_gelombang?>],
    backgroundColor: "rgba(255,0,0,1)",
    borderColor: "rgba(255,0,0,1)",
  };
  var speedData = {
    labels: [<?=$data_waktu?>],
    datasets: [dataFirst]
  };
  var lineChart = new Chart(document.getElementById('TinggiChart'), {
    type: 'line',
    data: speedData
  });
</script>
<script>
  var dataFirst = {
    label: "Arus",
    data:[<?=$data_arus?>],
    backgroundColor: "rgba(124,185,232)",
    borderColor: "rgba(124,185,232)",
  };
  var speedData = {
    labels: [<?=$data_waktu?>],
    datasets: [dataFirst]
  };
  var lineChart = new Chart(document.getElementById('ArusChart'), {
    type: 'line',
    data: speedData
  });
</script>
<script>
  var dataFirst = {
    label: "Getaran",
    data: [<?=$data_getar?>],
    backgroundColor: "rgb(59,122,87)",
    borderColor: "rgb(59,122,87)",
  };
  var speedData = {
    labels: [<?=$data_waktu?>],
    datasets: [dataFirst]
  };
  var lineChart = new Chart(document.getElementById('GetaranChart'), {
    type: 'line',
    data: speedData
  });
</script>
</body>

</html>
@endsection
