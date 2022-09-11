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
                                        @foreach ($supplier as $item)
                                            <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->supplierName }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </form>
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
                                                    <td id="sup" value=""></td>
                                                    <td id="supplierName" value="data"></td>
                                                    <td id="supplierEmail" value=""></td>
                                                    <td id="supplierPhone" value=""></td>
                                                    <td id="supplierBalance" value=""></td>
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
    if(id){
        $.ajax({
            url:"{{ url('authorized/supplierLedgerReport') }}/"+id,
            type:"GET",
            cache:false,
            dataType:"json",
            success:function(data){
                console.log(data);

        $.each(data, function(key, value){
            $('#sup').html(value.id);
            $('#supplierName').html(value.supplierName);
            $('#supplierEmail').html(value.supplierEmail);
            $('#supplierPhone').html(value.supplierPhone);
            $('#supplierBalance').html(value.supplierCarrentBalance);
        })
            }

        })
    }
});
</script>

@endsection
