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
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Create Customer Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="{{ route('customer.store') }}" method="POST">
                                        @csrf()
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Customer Name</label>
                                                <input type="text"
                                                    class="form-control @error('customerName')
                                                    is-invalid
                                                @enderror"
                                                    name="customerName" placeholder="Customer Name"
                                                    value="{{ old('customerName') }}">
                                                @error('customerName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label>Customer Email</label>
                                                <input type="email"
                                                    class="form-control @error('customerEmail') is-invalid

                                                    @enderror"
                                                    name="customerEmail" placeholder="Customer Email"
                                                    value="{{ old('customerEmail') }}">
                                                @error('customerEmail')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-5">
                                                <label>Customer Phone</label>
                                                <input type="number"
                                                    class="form-control @error('customerPhone') is-invalid

                                                    @enderror"
                                                    name="customerPhone" placeholder="Customer Phone"
                                                    value="{{ old('customerPhone') }}">
                                                @error('customerPhone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-7">
                                                <label>Customer Address</label>
                                                <input type="text" class="form-control" name="customerAddress"
                                                    placeholder="Customer Address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Note</label>
                                                <input type="text" class="form-control" name="note"
                                                    placeholder="Some note About Customer">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Customer Previous Balance</label>
                                                <input type="number"
                                                    class="form-control @error('custoPrevBalance') is-invalid

                                                @enderror"
                                                    name="custoPrevBalance" placeholder="Customer Previous Balance"
                                                    value="{{ old('custoPrevBalance') }}">
                                                @error('custoPrevBalance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label>Customer Current Balance</label>
                                                <input type="number"
                                                    class="form-control @error('customerCurrentBalance') is-invalid

                                                @enderror"
                                                    name="customerCurrentBalance" placeholder="Customer Current Balance"
                                                    value="{{ old('customerCurrentBalance') }}">
                                                @error('customerCurrentBalance')
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
