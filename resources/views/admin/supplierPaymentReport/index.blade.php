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
                                        {{-- <a
                                            href="{{ url('authorized/supplierreportList/create') }}"class="btn btn-primary mb-3">Supplier
                                            Payment</a> --}}
                                        <table id="supplierReport" class="table table-striped table-bordered">
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($supplier as $supplierreport)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $supplierreport->supplierName }}</td>
                                                        <td>{{ $supplierreport->supplierEmail }}</td>
                                                        <td>{{ $supplierreport->supplierContact }}</td>
                                                        <td>{{ $supplierreport->paymentDate }}</td>
                                                        <td>{{ $supplierreport->transactionMethod }}</td>
                                                        <td>{{ $supplierreport->note }}</td>
                                                        <td>{{ $supplierreport->supplierPrevBalance }}</td>
                                                        <td>{{ $supplierreport->paymentAmount }}</td>
                                                        <td>{{ $supplierreport->supplierCarrentBalance }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td style="display: none"></td>
                                                    <td colspan="9">Total:</td>
                                                    <td colspan="1">{{ $balance }}</td>
                                                </tr>
                                            </tbody>
                                            <tfoot style="display: none">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="9"></td>
                                                    <td colspan="1"></td>
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
    $('#supplierReport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>
@endsection
