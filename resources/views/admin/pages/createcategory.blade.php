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
                                    <h5 class="card-title">Tambah Category</h5>

                                    <!-- General Form Elements -->
                                    <form action="{{ url('/admin/category') }}" method="POST" class="mb-5" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Nama Category</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="title" required autofocus value="{{ old('name') }}" required>
                                                @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <input type="hidden" class="form-control " id="slug" name="slug">

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