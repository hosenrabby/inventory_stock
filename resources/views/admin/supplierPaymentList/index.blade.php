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
                                            href="{{ url('authorized/supplierPaymentList/create') }}"class="btn btn-primary mb-3">Supplier
                                            Payment</a>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Supplier Name</th>
                                                    <th>Supplier Email</th>
                                                    <th>Supplier Contact</th>
                                                    <th>Payment Date</th>
                                                    <th>Transaction Method</th>
                                                    <th>Note</th>
                                                    <th>Supplier Prev Balance</th>
                                                    <th>Payment Amount</th>
                                                    <th>Supplier Carrnt Balance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($spl as $supplierPayment)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $supplierPayment->supplierName }}</td>
                                                        <td>{{ $supplierPayment->supplierEmail }}</td>
                                                        <td>{{ $supplierPayment->supplierContact }}</td>
                                                        <td>{{ $supplierPayment->paymentDate }}</td>
                                                        <td>{{ $supplierPayment->transactionMethod }}</td>
                                                        <td>{{ $supplierPayment->note }}</td>
                                                        <td>{{ $supplierPayment->supplierPrevBalance }}</td>
                                                        <td>{{ $supplierPayment->paymentAmount }}</td>
                                                        <td>{{ $supplierPayment->supplierCarrentBalance }}</td>

                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="" class="btn btn-default"><i
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

