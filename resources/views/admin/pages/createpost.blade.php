@extends('admin.app')
@section('content')

<main id="main" class="main">
  <div class="row">

    <div class="pagetitle">
      <h1>Create</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin">Home</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-10">
          <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Post</h5>

                  <!-- General Form Elements -->
                  <form action="{{ url('/admin/post') }}" method="POST" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" required autofocus value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <input type="hidden" class="form-control " id="slug" name="slug">

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-10">
                        <select name="category_id" class="form-select ">
                          @foreach($category as $ctg)
                          @if( old('category_id') == $ctg->id )
                          <option value="{{ $ctg->id }}" selected>{{ $ctg->name }}</option>
                          @else
                          <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                          @endif
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label">Body</label>

                      <div class="col-sm-10">
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor input="body"></trix-editor>
                        @error('body')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputText" class="col-sm-2 col-form-label"></label>
                      <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary" name="save">Create Post</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
</main><!-- End #main -->

<script>
  //  const title = document.querySelector('#title');
  // const slug = document.querySelector('#slug');


  // title.addEvenListener('change', function() {
  //   fetch('http://aplikasi_1.test/admin/post/checkSlug?title=' + title.value)
  //   .then(response => response.json())
  //   .then(data => slug.value = data.slug)
  // }); --}}
  document.addEvenListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection