@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Selamat datang {{ auth()->user()->level }} {{ auth()->user()->nama }}</h1>
</div>
<div>
  
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif


  <a href="/dashboardCreate" class="text-decoration-none btn btn-primary mb-3">Tambah Data Santri</a>
  <div class="row">
      <div class="col-lg-9">
        <h5 class="text-center">Daftar Nama Santri</h5>
          <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Kelas</th>
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
                          <a href="/dashboard/{{ $user->id }}" class="badge bg-info text-decoration-none"><span>Hapalan</span></a>
                          <a href="/dashboard/{{ $user->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                          <form action="/dashboard/{{ $user->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><span data-feather="x-circle"></span></button>
                          </form>
                      </td>
                  </tr> 
                  @endforeach
              </tbody>
            </table>
            <div class="d-flex justify-content-center">
              {{ $users->links() }}
            </div>
      </div>
  </div>
</div>
@endsection
