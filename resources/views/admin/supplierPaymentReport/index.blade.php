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
                            <li class="breadcrumb-item active">Supplier Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="input-group input-group-rounded">
                        <form action="#" method="POST">
                            <div class="form-group ml-5">
                                <div class="row">
                                    <select class="form-control col select2 supplier_rec" name="supplier" id="supplier"
                                        style="width:220px">
                                        <option value="" selected>Select Supplier to see Data</option>
                                        @foreach ($supplier as $item)
                                            <option value="{{ $item->id }}">{{ $item->supplierName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="form-group col">
                            <button class="btn btn-danger weight" type="button" name="refresh" id="refresh"
                                style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-reload"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="" class="table table-striped table-bordered ">
                                            <thead>
                                                <a class="btn btn-success mb-3" target="blank" id="printBtn"
                                                    href="{{ url('authorized/supplierLedger-data') }}" role="button"><i
                                                        class="fa fa-print"></i>
                                                    Print</a>
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Payment Date</th>
                                                    <th>Transaction Method</th>
                                                    <th>Supplier Prev Balance</th>
                                                    <th>Payment Amount</th>
                                                    <th>Dues Amount</th>
                                                    <th>Supplier Carrnt Balance</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @if ($supplierData != '')
                                                    @foreach ($supplierData as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->supplierName }}</td>
                                                            <td>{{ $item->paymentDate }}</td>
                                                            <td>{{ $item->transactionMethod }}</td>
                                                            <td>{{ $item->supplierPrevBalance }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif --}}
                                            </tbody>
                                        </table>
                                        {{ csrf_field() }}
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
        $('.select2').select2();

        $('#supplier').change(function() {
            var value = $(this).find('option:selected').val();
            var newurl = $('#printBtn').attr('href') + '/' + value;
            $('#printBtn').attr("href", newurl);
            if (value) {
                $.ajax({
                    url: "{{ url('authorized/supplierLedger-search') }}/" + value,
                    type: 'GET',
                    cache: false,
                    dataType: "json",
                    success: function(data) {
                        var output = '';
                        for (var i = 0; i < data.length; i++) {
                            output += "<tr>";
                            output += "<td>" + data[i].supplierName + "</td>";
                            output += "<td>" + data[i].paymentDate + "</td>";
                            output += "<td>" + data[i].transactionMethod + "</td>";
                            output += "<td>" + data[i].supplierPrevBalance + "</td>";
                            output += "<td>" + data[i].paymentAmount + "</td>";
                            output += "<td><a class='text-info' target='blank' href='purchaseinvoice/" +
                                data[i].pID +
                                "'>Inv no(" + data[i].invNumber + ")</a> " + data[i]
                                .duesAmount + "</td>";
                            output += "<td>" + data[i].supplierCarrentBalance + "</td>";
                            output += "<td>" + data[i].note + "</tr>";
                            // output += '</tr>';
                        }
                        $('tbody').html(output);


                    }

                })
            }
        })

        $('#refresh').click(function() {
            location.reload();
        });
    </script>
@endsection
