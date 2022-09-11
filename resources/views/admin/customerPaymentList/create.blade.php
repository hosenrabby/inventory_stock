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
                            <li class="breadcrumb-item active">Customer Payment</li>
                        </ol>
                    </div>
                </div>
                <!-- /# column -->
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-title">
                                <h4>Customer Payment List</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form class="forms-sample" action="{{ url('authorized/customerPaymentList') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Customer Name</label>
                                            <select class="form-control @error('customerID') is-invalid

                                            @enderror" name="customerID"  id="customerID" value="{{ old('customerID') }}">
                                            @error('customerID')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>

                                            </span>

                                            @enderror
                                                <option selected>Open this select menu</option>
                                                @foreach ($spl as $item)
                                                    <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->customerName }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Customer Email</label>
                                            <input type="text"
                                                class="form-control @error('customerEmail') is-invalid

                                                @enderror"
                                                name="customerEmail"  id="customerEmail" value="" placeholder="customer Email"
                                                value="{{ old('customerEmail') }}">
                                            @error('customerEmail')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Customer Contact</label>
                                            <input type="text"
                                                class="form-control @error('customerContact') is-invalid

                                                @enderror"
                                                name="customerContact" id="customerContact" placeholder="customer Contact"
                                                value="{{ old('customerContact') }}">
                                            @error('customerContact')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Date</label>
                                            <input type="text" class="form-control @error('paymentDate') is-invalid

                                            @enderror " name="paymentDate"
                                                placeholder="Payment Date" value="{{ old('paymentDate') }}">
                                                @error('paymentDate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>

                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Transaction Method</label>
                                            <input type="text" class="form-control @error('transactionMethod') is-invalid

                                            @enderror" name="transactionMethod"
                                                placeholder="Transaction Method" value="{{ old('transactionMethod') }}">
                                                @error('transactionMethod')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>

                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Payment Ammount</label>
                                            <input type="number" class="form-control @error('paymentAmount') is-invalid

                                            @enderror" name="paymentAmount"
                                                placeholder="Payment Ammount" value="{{ old('paymentAmount') }}">
                                                @error('paymentAmount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>

                                                </span>

                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Note</label>
                                            <input type="text" class="form-control @error('note') is-invalid

                                            @enderror" name="note" placeholder="Note" value="{{ old('note') }}">
                                            @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>

                                            </span>

                                            @enderror
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




        $("#customerID").change(function() {
        var optID = $('#customerID').find("option:selected").attr('sid');

             if (optID) {
                 $.ajax({
                     url: "{{ url('authorized/customerPaymentList') }}/"+optID,
                     type: "GET",
                     cache: false,
                    dataType: "json",
                        success: function(data) {
                            console.log(data);
                                $.each(data, function(key, value) {
                                    $('#customerEmail').val(value.customerEmail);
                                    $('#customerContact').val(value.customerPhone);
                                })
                             }
                         });
                     }
                })


</script>
@endsection
