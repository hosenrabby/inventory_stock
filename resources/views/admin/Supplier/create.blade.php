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
                                        <div class="row">
                                            <div class="form-group col">

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
                                            <div class="form-group col">
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
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-5">
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
                                            <div class="form-group col-7">
                                                <label>Supplier Address</label>
                                                <input type="text" class="form-control" name="supplierAddress"
                                                    placeholder="Supplier Address">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Note</label>
                                                <input type="text" class="form-control" name="note"
                                                    placeholder="Some note About Supplier">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Supplier Previous Balance</label>
                                                <input type="number" class="form-control @error('supplierPrevBalance') is-invalid

                                                @enderror" name="supplierPrevBalance"
                                                    placeholder="Supplier Previous Balance" value="{{ old('supplierPrevBalance') }}">
                                                    @error('supplierPrevBalance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>


                                                    @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label>Supplier Carrent Balance</label>
                                                <input type="number" class="form-control @error('supplierCarrentBalance') is-invalid

                                                @enderror" name="supplierCarrentBalance"
                                                    placeholder="Supplier Carrent Balance" value="{{ old('supplierCarrentBalance') }}">
                                                    @error('supplierCarrentBalance')
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
        </div>
    </div>
    <!-- /# row -->
@endsection
