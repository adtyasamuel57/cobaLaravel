@extends('layout.barsekut')
@section('content')
  <div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4" src="/gambar2/logo nami.png" alt="" width="300" height="300">
    <h1 class="display-5 fw-bold">Nami</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead mb-4">Aplikasi Pendeteksi Dini Tsunami , Cepat Deteksi Tanggap Atasi</p>
      <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
        <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3" onclick="window.location.href='/data/semua'" >Cek Status</button>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col text-center">
        <div class="h1"> INFO</div>
        <p> Nami merupakan aplikasi pendeteksi dini tsunami dengan membaca ketinggian air laut. Kecepatan surut serta aktifitas getaran bawah laut yang berpotensi akan gempa dan menimbulkan tsunami. </p>
    
      </div>
    </div>
    <div class="row">
      <div class="col text-center">
        <div class="h5"> TEAMS</div>
      </div>
    </div>
    <div class="row text-center">
      <div class="col">
      <img class="d-block mx-auto mb-4" src="/gambar2/gambar_sam.png" alt="" width="120" height="120">
       <h6> Samuel Aditya Suprijono</h6>
       <p> S1 Teknik Komputer</p>
       <p> Telkom University</p>
      </div>
      <div class="col">
        <img class="d-block mx-auto mb-4" src="/gambar2/logo nami.png" alt="" width="120" height="120">
        <h6> Alvandro Vibisono</h6>
        <p> S1 Teknik Komputer</p>
        <p> Telkom University</p>
      </div>
      <div class="col">
        <img class="d-block mx-auto mb-4" src="/gambar2/gambar_migent.png" class="rounded-circle" alt="" width="120" height="120">
        <h6> Migent Dipakresna</h6>
        <p> S1 Teknik Komputer</p>
        <p> Telkom University</p>
      </div>
    </div>
  </div>

  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
@endsection