@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambah Hapalan</h1>
</div>

<div class="col-lg-8">
    <form action="/hapalan" method="post">
        @csrf
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="text" class="form-control @error('tanggal') is-invalid @enderror"  id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
          @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="surah" class="form-label">Surah</label>
          <input type="text" class="form-control  @error('surah') is-invalid @enderror" id="surah" name="surah" value="{{ old('surah') }}">
          @error('surah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="ayat" class="form-label">Ayat</label>
          <input type="text" class="form-control  @error('ayat') is-invalid @enderror" id="ayat" name="ayat" value="{{ old('ayat') }}">
          @error('ayat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>

        <div class="mb-3 d-none">
          <input type="text" class="form-control" name="id" value="{{ $id }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Tambah Hapalan</button>
      </form>
</div>

@endsection