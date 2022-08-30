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
                                        <li class="breadcrumb-item active">Supplier</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Supplier Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form class="forms-sample" action="{{ url('authorized/supplier') }}" method="POST">
                                            {!! csrf_field() !!}
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <input type="text" class="form-control" name="supplierName" placeholder="Supplier Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Email</label>
                                                <input type="email" class="form-control" name="supplierEmail" placeholder="Supplier Email">
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Phone</label>
                                                <input type="number" class="form-control" name="supplierPhone" placeholder="Supplier Phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Supplier Address</label>
                                                <input type="text" class="form-control" name="supplierAddress" placeholder="Supplier Address">
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
