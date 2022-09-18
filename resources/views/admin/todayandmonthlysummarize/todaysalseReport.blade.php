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
                            <li class="breadcrumb-item active">Today Sales</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>SL</th>
                                                    <th>Invoice Number</th>
                                                    <th>Customer Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Product Quantity</th>
                                                    <th>Product Rate</th>
                                                    <th>Total Price</th>
                                                    <th>Grand Total</th>
                                                    <th>Paid Amount</th>
                                                    <th>Dues Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($todaysalseReport as $todaysalseReport)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="{{ url('authorized/salesinvoice/' . $todaysalseReport->invoice_id) }}"
                                                                    class="btn btn-default btn btn-success" target="_blank"><i
                                                                        class="fa-solid fa-file-invoice"></i></a>
                                                                <a href="{{ url('authorized/salesproduct-inv-del/' . $todaysalseReport->invoice_id) }}"
                                                                            class="btn btn-danger ml-1"><i
                                                                            class="fa-solid fa-trash-can"></i></a>

                                                                {{-- <form method="post"
                                                                    action="{{ url('authorized/salesproduct/' . $todaysalseReport->id) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger ml-1 delete-confirm"><i
                                                                            class="fa-solid fa-trash-can"></i></button>
                                                                </form> --}}
                                                            </div>
                                                        </td>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $todaysalseReport->invNumber }}</td>
                                                        <td>{{ $todaysalseReport->customerName }}</td>
                                                        <td>{{ $todaysalseReport->purchaseDate }}</td>
                                                        <td>{{ $todaysalseReport->productName }}</td>
                                                        <td>{{ $todaysalseReport->prodCode }}</td>
                                                        <td>{{ $todaysalseReport->prodQty }}</td>
                                                        <td>{{ $todaysalseReport->prodRate }}</td>
                                                        <td>{{ $todaysalseReport->totalPrice }}</td>
                                                        <td>{{ $todaysalseReport->grandTotal }}</td>
                                                        <td>{{ $todaysalseReport->paidAmount }}</td>
                                                        <td>{{ $todaysalseReport->duesAmount }}</td>

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
