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
                            <li class="breadcrumb-item active">Purchase Repor</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>



                <div class="row">

                 <div class="">
                        <div class="input-group input-group-rounded">
                                <div class="col-md-5">Sample Data - Total Records - <b><span id="total_records"></span></b></div>
                                <div class="row">
                                    <div class="form-group col">
                                        <input type="text" class="form-control datepicker" name="from_date" id="from_date" placeholder="Select Start Date">
                                    </div>
                                    <div class="form-group col">
                                <input type="text" class="form-control datepicker" name="to_date" id="to_date" placeholder="Select End Date">
                                    </div>
                                    <div class="form-group col">
                                        <button class="btn btn-primary weight" type="button" name="filter" id="filter"
                                            style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-search"></i>
                                        </button>
                                        <button class="btn btn-danger weight" type="button" name="refresh" id="refresh"
                                            style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-reload"></i>
                                        </button>
                                 </div>
                            </div>
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
                                                    <th>Invoice Number</th>
                                                    <th>Purchase Date</th>
                                                    <th>Product QTY</th>
                                                    <th>Product Rate</th>
                                                    <th>Total Price</th>
                                                    <th>Grand Total</th>
                                                    <th>Paid Ammount</th>
                                                    <th>Dues Ammount</th>

                                                </tr>
                                            </thead>
                                            <tbody>

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
$(document).ready(function(){

 var date = new Date();

//  $('.input-daterange').datepicker({
//   todayBtn: 'linked',
//   format: 'yyyy-mm-dd',
//   autoclose: true
//  });

 var _token = $('input[name="_token"]').val();

 function fetch_data(from_date = '', to_date = '')
 {
  $.ajax({
   url:"{{ route('purchaseReports') }}",
   method:"POST",
   data:{from_date:from_date, to_date:to_date, _token:_token},
   dataType:"json",
   success:function(data)
   {
    var output = '';
    $('#total_records').text(data.length);
    for(var i = 0; i < data.length; i++)
    {
     output += '<tr>';
     output += '<td>' + data[i].id + '</td>';
     output += '<td>' + data[i].productName + '</td>';
     output += '<td>' + data[i].prodCode + '</td>';
     output += '<td>' + data[i].invNumber + '</td>';
     output += '<td>' + data[i].purchaseDate + '</td>';
     output += '<td>' + data[i].prodQty + '</td>';
     output += '<td>' + data[i].prodRate + '</td>';
     output += '<td>' + data[i].totalPrice + '</td>';
     output += '<td>' + data[i].grandTotal + '</td>';
     output += '<td>' + data[i].paidAmount + '</td>';
     output += '<td>' + data[i].duesAmount + '</td></tr>';
    }
    $('tbody').html(output);
   }
  })
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   fetch_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
//   fetch_data();
 });
});
</script>
@endsection
