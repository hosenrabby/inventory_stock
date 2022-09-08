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
                            <li class="breadcrumb-item active">Supplier Payment</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Supplier Payment List</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="forms-sample" action="{{ url('authorized/supplier') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <div class="form-group">

                                            <label>Supplier Name</label>
                                            <input type="text"
                                                class="form-control @error('supplierName')
                                                is-invalid

                                                @enderror"
                                                name="supplierName" placeholder="Supplier Name"
                                                value="{{ old('supplierName') }}">
                                            @error('supplierName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Email</label>
                                            <input type="text"
                                                class="form-control @error('supplierEmail') is-invalid

                                                @enderror"
                                                name="supplierEmail" placeholder="Supplier Email"
                                                value="{{ old('supplierEmail') }}">
                                            @error('supplierEmail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Contaec</label>
                                            <input type="text"
                                                class="form-control @error('supplierContact') is-invalid

                                                @enderror"
                                                name="supplierContact" placeholder="Supplier Contact"
                                                value="{{ old('supplierContact') }}">
                                            @error('supplierContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Date</label>
                                            <input type="text" class="form-control" name="paymentDate"
                                                placeholder="Payment Date">
                                        </div>
                                        <div class="form-group">
                                            <label>Transaction Method</label>
                                            <input type="text" class="form-control" name="transactionMethod"
                                                placeholder="Transaction Method">
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Ammount</label>
                                            <input type="number" class="form-control" name="paymentAmount"
                                                placeholder="Payment Ammount">
                                        </div>
                                        <div class="form-group">
                                            <label>Note</label>
                                            <input type="text" class="form-control" name="paymentAmount"
                                                placeholder="Payment Ammount">
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
        </div>
    </div>
    <!-- /# row -->
@endsection
