@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Update Hapalan</h1>
</div>

<div class="col-lg-8">
    <form action="/hapalan/{{ $hapalan->id }}" method="post">
        @csrf
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal</label>
          <input type="text" class="form-control @error('tanggal') is-invalid @enderror"  id="tanggal" name="tanggal" value="{{ old('tanggal', $hapalan->tanggal) }}">
          @error('tanggal')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="surah" class="form-label">Surah</label>
          <input type="text" class="form-control  @error('surah') is-invalid @enderror" id="surah" name="surah" value="{{ old('surah', $hapalan->surah) }}">
          @error('surah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>
        <div class="mb-3">
          <label for="ayat" class="form-label">Alamat</label>
          <input type="text" class="form-control  @error('ayat') is-invalid @enderror" id="ayat" name="ayat" value="{{ old('ayat', $hapalan->ayat) }}">
          @error('ayat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>

@endsection