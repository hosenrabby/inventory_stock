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
                                    <form class="forms-sample" action="{{ url('authorized/supplierPaymentList') }}"
                                        method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="supID" id="supID" value="0">

                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Supplier Name</label>
                                                <select class="form-control " name="supplierName" id="supplierID">

                                                    <option selected>Open this select menu</option>
                                                    @foreach ($spl as $item)
                                                        <option value="{{ $item->supplierName }}" id="{{ $item->id }}">
                                                            {{ $item->supplierName }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                            <div class="form-group col">
                                                <label>Payment Date</label>
                                                <input type="text"
                                                    class="form-control datepicker @error('paymentDate') is-invalid

                                            @enderror "
                                                    name="paymentDate" placeholder="dd-mm-yyyy"
                                                    value="{{ old('paymentDate') }}">
                                                @error('paymentDate')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Note</label>
                                            <input type="text"
                                                class="form-control @error('note') is-invalid

                                        @enderror"
                                                name="note" placeholder="Note" value="{{ old('note') }}">
                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>


                                        <div class="row">
                                            <div class="form-group col">
                                                <label>Transaction Method</label>
                                                <input type="text"
                                                    class="form-control @error('transactionMethod') is-invalid

                                            @enderror"
                                                    name="transactionMethod" placeholder="Transaction Method"
                                                    value="{{ old('transactionMethod') }}">
                                                @error('transactionMethod')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>

                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col">
                                                <label>Payment Ammount</label>
                                                <input type="number"
                                                    class="form-control @error('paymentAmount') is-invalid

                                            @enderror"
                                                    name="paymentAmount" placeholder="0.00"
                                                    value="{{ old('paymentAmount') }}">
                                                @error('paymentAmount')
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
        $("#supplierID").change(function() {
            var optID = $('#supplierID').find("option:selected").attr('id');
            $('#supID').val(optID)
            // if (optID) {
            //     $.ajax({
            //         url: "{{ url('authorized/supplierPaymentList') }}/" + optID,
            //         type: "GET",
            //         cache: false,
            //         dataType: "json",
            //         success: function(data) {
            //             console.log(data);
            //             $.each(data, function(key, value) {
            //                 $('#supplierEmail').val(value.supplierEmail);
            //                 $('#supplierContact').val(value.supplierPhone);
            //             })
            //         }
            //     });
            // }
        })
    </script>
@endsection
