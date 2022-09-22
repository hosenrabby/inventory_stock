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
                            <li class="breadcrumb-item active">SubCategory_Category</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Create SubCategory Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('subcategory.store') }}" method="POST">
                                        @csrf()
                                        <div class="form-group">
                                            <label>Category Name</label>

                                            <select class="form-control @error('category_id') is-invalid

                                            @enderror" name="category_id">
                                                <option selected>Open this select menu</option>
                                                @foreach ($subcategories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->categoryName }}</option>
                                                @endforeach

                                            </select>
                                            @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>

                                            </span>

                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label>subCategory Name</label>
                                            <input type="text"
                                                class="form-control @error('subCategoryName') is-invalid

                                                @enderror"
                                                name="subCategoryName" placeholder="SubCategory Name"
                                                value="{{ old('subCategoryName') }}">
                                            @error('subCategoryName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>


                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>subCategory Code</label>
                                            <input type="number"
                                                class="form-control @error('subCategoryCode') is-invalid

                                                @enderror"
                                                name="subCategoryCode" placeholder="000abc"
                                                value="{{ old('subCategoryCode') }}">
                                            @error('subCategoryCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
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
