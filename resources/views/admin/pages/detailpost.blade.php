@extends('admin.app')
@section('content')

<main id="main" class="main">
    <div class="row">
    
        <div class="pagetitle">
            <h1>My Post</h1>
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
              <div class="col-lg-8">
                <div class="row">
        <!-- Recent Sales -->
        <div class="container">
            <div class="row justify-content-left mb-5">
                <div class="col-md-12">
                    <h1 class="mb-3">{{ $post->title }}</h1>  
                    <a href="/admin/post" class="btn btn-success"><i class="bi bi-arrow-left"></i><span data-feather="arrow-left"> Back to all my posts</span></a>

                    <a href="{{ url('/admin/post/'. $post->slug .'/edit') }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>

                    <form action="/admin/post/{{ $post->slug }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger border-0" onclick="return confirm('are you sure?')"><i class="bi bi-trash"></i></button>
                    </form>

                    @if($post->image)

                    <div style="max-height: 350px;overflow:hidden;">
                      <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-2">
                    </div>
                    @else

                    <img src="https://source.unsplash.com/1200x400/?{{ $post->category->slug }}" alt="{{ $post->category->name }}" class="img-fluid mt-2">
                    @endif

                    <article class="my-3 fs-5"> 
                    {!!  $post->body  !!}
                    </article> 
                </div>
            </div>
        </div>
    </div>
    </main><!-- End #main --> 
    



@endsection