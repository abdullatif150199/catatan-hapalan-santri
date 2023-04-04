@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Selamat Datang  {{ auth()->user()->nama }}</h1>
   </div>


  <div class="row">
    <div class="col-lg-9">
      <h5 class="text-center">Berikut Adalah History Hapalan Anda</h5>
        <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Surah</th>
                <th scope="col">Batas Ayat</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($hapalans as $hapalan)  
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hapalan->tanggal }}</td>
                    <td>{{ $hapalan->surah}}</td>
                    <td>{{ $hapalan->ayat}}</td>
                </tr> 
                @endforeach
            </tbody>
          </table>
      </div>
  </div>

@endsection