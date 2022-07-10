@extends('auth.app')
@section('konten')

<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

        <div class="d-flex justify-content-center py-4">
          <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
            <span class="d-none d-lg-block">Lara News</span>
          </a>
        </div><!-- End Logo -->

        <div class="card mb-3">

          <div class="card-body">

            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
              <p class="text-center small">Enter your personal details to create account</p>
            </div>

            <form class="row g-3  " action="{{ url('/register') }}" method="post">
              @csrf
              <div class="col-12">
                <label for="yourName" class="form-label">Your Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="yourEmail" class="form-label">Your Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <label for="yourUsername" class="form-label">Username</label>
                <div class="input-group ">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="yourUsername" required value="{{ old('username') }}">
                  @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-12">
                <label for="yourPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
              </div>
              <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="{{ url('/login') }}">Log in</a></p>
              </div>
            </form>

          </div>
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>

      </div>
    </div>
  </div>

</section>

@endsection