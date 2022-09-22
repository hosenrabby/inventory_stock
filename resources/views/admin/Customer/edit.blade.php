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
                            <li class="breadcrumb-item active">Customer Edit</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Customer Edit</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ url('authorized/customer/' . $customer->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <input type="text" class="form-control" name="customerName"
                                                value="{{ $customer->customerName }}">
                                        </div>
                                        <div class="form-group">
                                            <label> Customer Email</label>
                                            <input type="email" class="form-control" name="customerEmail"
                                                value="{{ $customer->customerEmail }}">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label> Customer Phone</label>
                                                <input type="number" class="form-control" name="customerPhone"
                                                    value="{{ $customer->customerPhone }}">
                                            </div>
                                            <div class="form-group col">
                                                <label>Customer Address</label>
                                                <input type="text" class="form-control" name="customerAddress"
                                                    value="{{ $customer->customerAddress }}">
                                            </div>
                                            <div class="form-group col">
                                                <label>Customer Balance</label>
                                                <input type="number" class="form-control" name="customerCurrentBalance"
                                                    value="{{ $customer->customerCurrentBalance }}">
                                            </div>
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
        </div>
    </div>
    <!-- /# row -->
@endsection
