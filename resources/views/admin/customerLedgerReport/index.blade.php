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
                            <li class="breadcrumb-item active">Customer Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <form action="">
                                <div class="form-group">
                                    <select class="form-control customer" name="customer" id="customerid">
                                        @foreach ($customer as $item)
                                            <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->customerName }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
<<<<<<< HEAD


                    <div class="col-8 input-group input-group-rounded">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" class="datepicker form-control" name="start_date" placeholder="Select Start Date">
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="datepicker form-control" name="end_date" placeholder="Select End Date">
                                </div>
                                <div class="form-group col">
                                    <button class="btn btn-primary weight" type="submit" style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-search"></i>
                                    </button>
                             </div>
                            </div>
                        </form>
                    </div>
=======
>>>>>>> 596b0a6ab422fa89cd32b3d2298b7b673bce14d0
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
                                                    <th>Customer Name</th>
                                                    <th>Customer Email</th>
                                                    <th>Customer Phone</th>
                                                    <th>Customer Carrent Balance</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td id="custid"></td>
                                                    <td id="customerName"></td>
                                                    <td id="customerEmail"></td>
                                                    <td id="customerPhone"></td>
                                                    <td id="customerBalance"></td>

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
    $('.customer').select2();

    $('#customerid').change(function(){
        var id=$(this).find('option:selected').attr('sid');
        // alert(id);
        if(id){
            $.ajax({
                url:"{{ url('authorized/customerLedgerReport') }}/"+id,
                type:"GET",
                cache:false,
                dataType:"json",

                success:function(data){
                    console.log(data);

                    $.each(data, function(key, value){
                        $('#custid').html(value.id);
                        $('#customerName').html(value.customerName);
                        $('#customerEmail').html(value.customerEmail);
                        $('#customerPhone').html(value.customerPhone);
                        $('#customerBalance').html(value.customerBalance);
                    })
                }
            })
        }
    })


</script>

@endsection
