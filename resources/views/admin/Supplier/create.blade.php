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
                                            <label>Supplier Phone</label>
                                            <input type="text"
                                                class="form-control @error('supplierPhone') is-invalid

                                                @enderror"
                                                name="supplierPhone" placeholder="Supplier Phone"
                                                value="{{ old('supplierPhone') }}">
                                            @error('supplierPhone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Address</label>
                                            <input type="text" class="form-control" name="supplierAddress"
                                                placeholder="Supplier Address">
                                        </div>
                                        <div class="form-group">
                                            <label>Supplier Carrent Balance</label>
                                            <input type="number" class="form-control" name="supplierCarrentBalance"
                                                placeholder="Supplier Carrent Balance">
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
