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
                    <div class="col-4">
                        <div class="form-group">
                            <form action="">
                                <div class="form-group">
                                    {{-- <label>Select Supplier Name</label> --}}
                                    <select class="form-control supplier" name="supplier" id="supplierid">
                                        <option selected>Select Supplier Name</option>
                                        @foreach ($supplier as $item)
                                        <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->supplierName }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-8 input-group input-group-rounded">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" class="datepicker form-control" name="start_date"
                                placeholder="Select Start Date">
                                </div>
                                <div class="form-group col">
                            <input type="text" class="datepicker form-control" name="end_date"
                                placeholder="Select End Date">
                                </div>
                                <div class="form-group col">
                             <button class="btn btn-primary weight" type="submit"
                                 style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-search"></i>
                             </button>
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
                                                    <th>Serial No</th>
                                                    <th>Supplier Name</th>
                                                    <th>Supplier Email</th>
                                                    <th>Supplier Phone</th>
                                                    <th>Supplier Carrent Balance</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td id="sup"></td>
                                                    <td id="supplierName"></td>
                                                    <td id="supplierEmail"></td>
                                                    <td id="supplierPhone"></td>
                                                    <td id="supplierBalance"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('.supplier').select2();

    $('#supplierid').change(function() {
    var id = $(this).find('option:selected').attr('sid');
    alert(id);
    if(id){
        alert(id);
        $.ajax({
            url:"{{ url('authorized/supplierLedgerReport') }}/"+id,
            type:"GET",
            cache:false,
            dataType:"json",
            success:function(data){
                console.log(data);

        $.each(data, function(key, value){
            // $('#sup').val(value.id);
            $('#supplierName').val(value.supplierName);
            // $('#supplierEmail').val(value.supplierEmail);
            // $('#supplierPhone').val(value.supplierPhone);
            // $('#supplierBalance').val(value.supplierCarrentBalance);
        })
            }

        })
    }
});
</script>
{{-- <script>
    $('.supplierid').change(function() {
    var id = $(this).find('option:selected').attr('id');
    alert(id);
    if(id){
        // alert(id);
        $.ajax({
            url:"{{ url('authorized/supplierLedgerReport') }}",
            type:"GET",
            cache:false,
            dataType:"json",
            success:function(data){
                console.log(data);

        $.each(data, function(key, value){
            $('#sup').val(value.id);
            $('#supplierName').val(value.supplierName);
            $('#supplierEmail').val(value.supplierEmail);
            $('#supplierPhone').val(value.supplierPhone);
            $('#supplierBalance').val(value.supplierCarrentBalance);
        })
            }

        })
    }
});
</script> --}}

@endsection
