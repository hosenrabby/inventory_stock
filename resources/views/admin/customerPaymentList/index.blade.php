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
                            <li class="breadcrumb-item active">Payment manage</li>
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
                                        <a
                                            href="{{ url('authorized/customerPaymentList/create') }}"class="btn btn-primary mb-3">Customer
                                            Payment</a>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Email</th>
                                                    <th>Customer Contact</th>
                                                    <th>Payment Date</th>
                                                    <th>Transaction Method</th>
                                                    <th>Note</th>
                                                    <th>Customer Prev Blnc</th>
                                                    <th>Payment Amount</th>
                                                    <th>Customer Currnt Blnc</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($spl as $customerPayment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $customerPayment->customerName }}</td>
                                                        <td>{{ $customerPayment->customerEmail }}</td>
                                                        <td>{{ $customerPayment->customerContact }}</td>
                                                        <td>{{ $customerPayment->paymentDate }}</td>
                                                        <td>{{ $customerPayment->transactionMethod }}</td>
                                                        <td>{{ $customerPayment->note }}</td>
                                                        <td>{{ $customerPayment->custoPrevBalance }}</td>
                                                        <td>{{ $customerPayment->paymentAmount }} ৳</td>
                                                        <td>{{ $customerPayment->custoCarrentBalance }}</td>

                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="" class="btn btn-success"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                                <form method="post" action="">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger ml-1 delete-confirm"><i
                                                                            class="fa-solid fa-trash-can"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
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
