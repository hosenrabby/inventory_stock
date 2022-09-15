@extends('layout.master')
@section('content')
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <!-- /# column -->
                    <div class="col-lg-12 p-l-0 title-margin-left">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active">Sales Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>



                <div class="row">
                    <div class="input-group">
                        <form action="{{ url('authorized/salesReports-search') }}" method="POST">
                            @csrf
                            <div class="row ml-4">
                                <div class="input-group">
                                    <input type="text" class="datepicker form-control " name="start_date"
                                        placeholder="Select End Date">
                                    <input type="text" class="datepicker form-control " name="end_date"
                                        placeholder="Select End Date">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success weight" type="submit"
                                            style="padding-bottom: 5px;border-radius: 0px;"><i
                                                class="ti-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">

                                        <table id="" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Invoic Number</th>
                                                    <th>Customer Name</th>
                                                    <th>Invoice Date</th>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Total Price</th>
                                                    <th>Grand Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($searchData as $searchData)
                                                    <tr>
                                                        <td>{{ $searchData->invNumber }}</td>
                                                        <td>{{ $searchData->customerName }}</td>
                                                        <td>{{ $searchData->purchaseDate }}</td>
                                                        <td>{{ $searchData->productName }}</td>
                                                        <td>{{ $searchData->prodQty }}</td>
                                                        <td>{{ $searchData->totalPrice }}</td>
                                                        <td>{{ $searchData->grandTotal }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.customer').select2();
    </script>
@endsection
