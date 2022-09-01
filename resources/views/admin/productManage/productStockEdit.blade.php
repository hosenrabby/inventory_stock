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
                            <li class="breadcrumb-item active">Product Manage Edit</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Product Manage Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ url('authorized/product-stock/' . $findData->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="productName"
                                                value="{{ $findData->productName }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input type="number" class="form-control" name="prodCode"
                                                value="{{ $findData->prodCode }}">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label>Select Catagory</label>
                                                <select class="form-control" name="catagoryID">
                                                    <option value="">Select Catagory</option>
                                                    @foreach ($catagory as $catagory)
                                                        <option value="{{ $catagory->catagoryID }}"
                                                            @if ($findData->catagoryID == $catagory->id) selected @endif>
                                                            {{ $catagory->categoryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label>Select Sub Catagory</label>
                                                <select class="form-control" name="subcatagoryID">
                                                    <option value="">Select Sub Catagory</option>
                                                    @foreach ($subcatagory as $subcatagory)
                                                        <option value="{{ $subcatagory->subCatagoryID }}"
                                                            @if ($findData->subCatagoryID == $subcatagory->subCatagoryID) selected @endif>
                                                            {{ $subcatagory->subCategoryName }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Product Rate</label>
                                                <input type="number" class="form-control" name="prodRate"
                                                    placeholder="Product Rate" value="{{ $findData->prodRate }}">
                                            </div>
                                            <div class="form-group col">
                                                <label>Stock Balance</label>
                                                <input type="number" class="form-control" name="stockBalance"
                                                    placeholder="Stock Balance" value="{{ $findData->stockBalance }}">
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
