@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-4 col-sm-6">
        <main class="form-signin w-100 m-auto">
          
          @if(session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
            <form action="/register" method="post">
              @csrf
              <div class="form-floating ">
                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama"  placeholder="nama" required value="{{ old('nama') }}">
                <label for="nama">Nama</label>
                @error('nama')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                <label for="floatingInput">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="password" class="form-control @error('password2') is-invalid @enderror" id="floatingPassword" placeholder="Password" name="password2">
                <label for="floatingPassword">Konfirmasi Password</label>
                @error('password2')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/" class="text-decoration-none">Login</a></small>
          </main>
    </div>
 </div>
@endsection