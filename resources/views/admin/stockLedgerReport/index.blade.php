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
                            <li class="breadcrumb-item active">Stock Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>



                <div class="row">

                    <div class="">
                           <div class="input-group input-group-rounded">
                               <form action="#" method="POST">
                                <div class="form-group">
                                    <select class="form-control stock" name="customer" id="stockid">
                                        @foreach ($stock as $item)
                                            <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->productName }}</option>
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
                                                    <th>SL</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                     <th>Product Rate</th>
                                                    <th>Stock Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td id="stid"></td>
                                                        <td id="productName"></td>
                                                        <td id="prodCode"></td>
                                                        <td id="prodRate"></td>
                                                        <td id="stockBalance"></td>
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
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
    $('.stock').select2();

    $('#stockid').change(function(){
        var id=$(this).find('option:selected').attr('sid');
        if(id){
            $.ajax({
                url:"{{ url('authorized/stockLedgerReport') }}/"+id,
                type:'GET',
                cache:false,
                dataType:"json",
                success:function(data) {
                    console.log(data);
                    $.each(data, function(key, value){
                        $('#stid').html(value.id);
                        $('#productName').html(value.productName);
                        $('#prodCode').html(value.prodCode);
                        $('#prodRate').html(value.prodRate);
                        $('#stockBalance').html(value.stockBalance);
                    })
                }
            })
        }
    })
</script>
@endsection
