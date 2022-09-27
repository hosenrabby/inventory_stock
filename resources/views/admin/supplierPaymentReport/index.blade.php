<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
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
                                        <table id="supplierReport" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Supplier Name</th>
                                                    <th>Payment Date</th>
                                                    <th>Transaction Method</th>
                                                    <th>Supplier Prev Balance</th>
                                                    <th>Payment Amount</th>
                                                    <th>Supplier Carrnt Balance</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($supplier as $supplierreport)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $supplierreport->supplierName }}</td>
                                                        <td>{{ $supplierreport->paymentDate }}</td>
                                                        <td>{{ $supplierreport->transactionMethod }}</td>
                                                        <td>{{ $supplierreport->supplierPrevBalance }}</td>
                                                        <td>{{ $supplierreport->paymentAmount }}</td>
                                                        <td>{{ $supplierreport->supplierCarrentBalance }}</td>
                                                        <td>{{ $supplierreport->note }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                {{-- <tr style="text-align: right">
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th style="display: none"></th>
                                                    <th>Total:</th>
                                                    <th></th>
                                                </tr> --}}
                                                <tr>
                                                    <th colspan="6" style="text-align: right">Total:</th>
                                                    <th colspan="2"></th>
                                                </tr>
                                            </tfoot>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#supplierReport').DataTable({

                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };

                    // Total over all pages
                    total = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Total over this page
                    pageTotal = api
                        .column(8, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(8).footer()).html('৳' + pageTotal + ' (Total ৳' + total + ')');
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'print',
                    footer: true
                }]
            });
        });
    </script>
@endsection
