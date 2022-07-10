@extends('admin.app')
@section('content')

<main id="main" class="main">
    <div class="row">

        <div class="pagetitle">
            <h1>My Category</h1>
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
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Recent Sales -->
                        <div class="col-12">
                            <div class="card recent-sales">
                                <div class="card-body">

                                    <h5 class="card-title">My Category <span>| Lara News</span></h5>
                                    @if(session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                    @if(session()->has('gagal'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('gagal') }}
                                    </div>
                                    @endif
                                    <a href="{{ url('/admin/category/create') }}" class="btn btn-primary">Tambah</a>
                                    <hr>
                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $p)
                                            <tr>
                                                <th scope="row"><a href="#">{{ $loop->iteration }}</a></th>
                                                <th scope="row"><a href="#">{{ $p->name }}</a></th>
                                                <td>
                                                    <a href="{{ url('/admin/category/'. $p->id .'/edit') }}" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                                                    <form action="/admin/category/{{ $p->id }}" method="post" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="badge bg-danger border-0" onclick="return confirm('are you sure?')"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Recent Sales -->
    </div>
</main><!-- End #main -->




@endsection