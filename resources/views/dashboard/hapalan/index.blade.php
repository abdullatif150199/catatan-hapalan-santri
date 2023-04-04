@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Daftar Setoran Hapalan {{ $user->nama }}</h1>
</div>
<div>
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

  <a href="/hapalanCreate/{{ $user->id }}" class="text-decoration-none btn btn-primary mb-3">Tambah Hapalan</a>

  <div class="row">
      <div class="col-lg-9">
          <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Surah</th>
                  <th scope="col">Batas Ayat</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($hapalans as $hapalan)  
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $hapalan->tanggal }}</td>
                      <td>{{ $hapalan->surah}}</td>
                      <td>{{ $hapalan->ayat}}</td>
                      <td>
                          <a href="/hapalan/{{ $hapalan->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                          <form action="/hapalan/{{ $hapalan->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span></button>
                          </form>
                      </td>
                  </tr> 
                  @endforeach
              </tbody>
            </table>
      </div>
  </div>
</div>

@endsection
