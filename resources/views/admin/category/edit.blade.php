@extends('layout.master')
@section('content')
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-12 p-l-0 m-l-0">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Category_Edit_page</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Category Edit Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ route('category.update', ['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf()
                                            @method('PUT')
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" name="categoryName" placeholder="Category Name" value="{{ $category->categoryName }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Category Code</label>
                                                <input type="number" class="form-control" name="categoryCode" placeholder="Category Code" value="{{ $category->categoryCode }}">
                                            </div>

                                            <button type="submit" class="btn btn-outline-primary ml-2 mt-3">UPDATE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
                <!-- /# row -->

@endsection
