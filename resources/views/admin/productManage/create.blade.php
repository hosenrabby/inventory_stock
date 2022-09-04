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
                                        <li class="breadcrumb-item active">Stock Product</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Product Stock Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/product-stock') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control @error('productName') is-invalid

                                                @enderror" name="productName" placeholder="Product Name" value="{{ old('productName') }}">
                                                @error('productName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>

                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="number" class="form-control @error('prodCode') is-invalid

                                                @enderror" name="prodCode" placeholder="Product Code" value="{{ old('prodCode') }}">
                                                @error('prodCode')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>

                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Select Catagory</label>
                                                    <select class="form-control" name="catagoryID">
                                                        <option value="" selected>Select Catagory</option>
                                                        @foreach ($catagory as $catagory)
                                                            <option value="{{ $catagory->id }}">{{ $catagory->categoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Select Sub Catagory</label>
                                                    <select class="form-control" name="subcatagoryID">
                                                        <option value="1" selected>Select Sub Catagory</option>
                                                        @foreach ($subcatagory as $subcatagory)
                                                            <option value="{{ $subcatagory->id }}">{{ $subcatagory->subCategoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Product Rate</label>
                                                    <input type="number" class="form-control @error('prodRate') is-invalid

                                                    @enderror" name="prodRate" placeholder="Product Rate" value="{{ old('prodRate') }}">
                                                    @error('prodRate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>


                                                    @enderror
                                                </div>
                                                <div class="form-group col">
                                                    <label>Stock Balance</label>
                                                    <input type="number" class="form-control @error('stockBalance') is-invalid

                                                    @enderror" name="stockBalance" placeholder="Stock Balance" value="{{ old('stockBalance') }}">
                                                    @error('stockBalance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>

                                                    @enderror
                                                </div>
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
