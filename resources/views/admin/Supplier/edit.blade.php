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
                                        <li class="breadcrumb-item active">Supplier Edit</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Supplier Edit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/supplier/'.$supplier->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <input type="text" class="form-control" name="supplierName" value="{{ $supplier->supplierName }}">
                                            </div>
                                            <div class="form-group">
                                                <label>	Supplier Email</label>
                                                <input type="email" class="form-control" name="supplierEmail" value="{{ $supplier->	supplierEmail }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label> Supplier Phone</label>
                                                    <input type="number" class="form-control" name="supplierPhone" value="{{ $supplier->supplierPhone }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Supplier Address</label>
                                                    <input type="text" class="form-control" name="supplierAddress" value="{{ $supplier->supplierAddress }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Supplier Carrent Balance</label>
                                                    <input type="number" class="form-control" name="supplierCarrentBalance" value="{{ $supplier->supplierCarrentBalance }}">
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
