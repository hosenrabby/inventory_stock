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
                                        <li class="breadcrumb-item active">Company Edit</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Company Edit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/company/'.$input->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text" class="form-control" name="companyName" value="{{ $input->companyName }}">
                                            </div>
                                            <div class="form-group">
                                                <label>	Company Email</label>
                                                <input type="email" class="form-control" name="companyEmail" value="{{ $input->	companyEmail }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Phone</label>
                                                    <input type="number" class="form-control" name="phone" value="{{ $input->phone }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $input->address }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Logo</label>
                                                    <input type="file" class="form-control" name="logo">
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
