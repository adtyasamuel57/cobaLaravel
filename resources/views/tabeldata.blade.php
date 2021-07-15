@extends('layout.barsekut')
@section('content')


<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Arus</th>
            <th scope="col">Kuat Getaran</th>
            <th scope="col">Tinggi Gelombang</th>
            <th scope="col">Tanggal</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach($sea as $sea)
        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$sea->Arus}}</td>
            <td>{{$sea->KG}}</td>
            <td>{{$sea->Tgel}}</td>
            <td>{{$sea->created_at}}</td>
            
        </tr>
    @endforeach
    </tbody>
</table>

@endsection