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
                                        <input type="hidden" name="maxID" id="maxID" value="0">
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
                                                    name="supplierEmail" placeholder="example@gmail.com"
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
                                                    name="supplierPhone" placeholder="01XXXXXXXXX"
                                                    value="{{ old('supplierPhone') }}">
                                                @error('supplierPhone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-7">
                                                <label>Supplier Address</label>
                                                <input type="text"
                                                    class="form-control @error('supplierAddress') is-invalid

                                                @enderror"
                                                    name="supplierAddress" placeholder="Supplier Address"
                                                    value="{{ old('supplierAddress') }}">
                                                @error('supplierAddress')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Note</label>
                                                <input type="text" class="form-control" name="note"
                                                    placeholder="Some note about supplier">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Supplier Previous Balance</label>
                                                <input type="number"
                                                    class="form-control @error('supplierPrevBalance') is-invalid

                                                @enderror"
                                                    name="supplierPrevBalance" placeholder="0.00"
                                                    value="{{ old('supplierPrevBalance') }}">
                                                @error('supplierPrevBalance')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label>Supplier Carrent Balance</label>
                                                <input type="number"
                                                    class="form-control @error('supplierCarrentBalance') is-invalid

                                                @enderror"
                                                    name="supplierCarrentBalance" placeholder="0.00"
                                                    value="{{ old('supplierCarrentBalance') }}">
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
@section('script')
    <script type="text/javascript">
        function max_id() {
            $.ajax({
                url: "{{ url('authorized/supplier-id') }}",
                type: "GET",
                cache: false,
                dataType: "json",
                success: function(data) {
                    console.log(data);

                    $.each(data, function(key, value) {
                        $('#maxID').val(value.id);
                        var newVlu = $('#maxID').val();
                        if (newVlu < 1) {
                            newVlu = 1;
                        } else
                            newVlu = parseInt(newVlu) + 1;
                        $('#maxID').val(newVlu);
                    })
                }
            });
        }
    </script>
@endsection
