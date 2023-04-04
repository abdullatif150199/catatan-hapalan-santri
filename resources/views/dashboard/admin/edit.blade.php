@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Data Santri</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/{{ $user->id }}" method="post">
      {{-- @method('put') --}}
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror"  id="nama" name="nama" value="{{ old('nama', $user->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
          @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Ayat</label>
          <input type="text" class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
          @error('alamat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="kelas" class="form-label">Kelas</label>
          <input type="text" class="form-control  @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $user->kelas) }}">
          @error('kelas')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Data Santri</button>
      </form>
    
</div>

@endsection