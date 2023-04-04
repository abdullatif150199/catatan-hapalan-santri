@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">{{ auth()->user()->level }} {{ auth()->user()->nama }}</h1>
</div>
<div>
  
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


  <a href="/ustadCreate" class="text-decoration-none btn btn-primary mb-3">Tambah Data ustad</a>
  <div class="row">
      <div class="col-lg-9">
        <h5 class="text-center">Daftar Nama ustad</h5>
          <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($users as $user)  
                  <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $user->nama }}</td>
                      <td>{{ $user->alamat}}</td>
                      <td>{{ $user->kelas}}</td>
                      <td>
                          {{-- <a href="/ustad/{{ $user->id }}" class="badge bg-info text-decoration-none"><span>Hapalan</span></a> --}}
                          <a href="/ustad/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                          <form action="/ustad/{{ $user->id}}" method="post" class="d-inline">
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
