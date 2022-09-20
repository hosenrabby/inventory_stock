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
                                <div class="form-group ml-5">
                                    <div class="row">
                                        <select class="form-control col category_records" name="category" id="categoryid" style="width:150px">
                                            <option value="Select Category" selected>Select Category</option>
                                            @foreach ($stock as $item)
                                                <option value="{{ $item->id }}" sid="{{ $item->id }}">{{ $item->categoryName }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control ml-3 col select2 subcategory_records" name="subCategoryName" id="subCategoryName" style="width:150px">
                                            <option value="Select SubCategory" selected>Select SubCategory</option>
                                            {{-- @foreach ($data as $item) --}}
                                                <option value="" id=""></option>
                                            {{-- @endforeach --}}
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
                                                <a class="btn btn-success mb-3" target="blank" id="printBtn" href="{{ url('authorized/stockLedgerInvoice/') }}" role="button"><i class="fa fa-print"></i> Print</a>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                     <th>Product Rate</th>
                                                    <th>Stock Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($product as $item)
                                                <tr>
                                                    <td >{{ $loop->iteration }}</td>
                                                    <td >{{ $item->productName }}</td>
                                                    <td >{{ $item->prodCode }}</td>
                                                    <td >{{ $item->prodRate }}</td>
                                                    <td >{{ $item->stockBalance }}</td>
                                                </tr>
                                                @endforeach

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
    // $('.select2').select2();

    $('#categoryid').change(function(){
        var id=$(this).find('option:selected').attr('sid');
        var newurl=$('#printBtn').attr('href')+'/'+id;
                    $('#printBtn').attr("href", newurl);
        if(id){
            $.ajax({
                url:"{{ url('authorized/category-product-search') }}/"+id,
                type:'GET',
                cache:false,
                dataType:"json",
                success:function(data) {
                    var output = '';
                    $('.category_records').text(data.length);
                    for(var i = 0; i < data.length; i++)
                    {
                    output += '<tr>';
                    output += '<td>' + data[i].id + '</td>';
                    output += '<td>' + data[i].productName + '</td>';
                    output += '<td>' + data[i].prodCode + '</td>';
                    output += '<td>' + data[i].prodRate + '</td>';
                    output += '<td>' + data[i].stockBalance + '</tr>';
                    }
                    $('tbody').html(output);


                }

            })
        }
    })

    $('#categoryid').change(function(){
        var catID = $(this).find("option:selected").attr('sid');
        if (catID) {
                $.ajax({
                    url: "{{ url('/authorized/subcategory-product-search') }}/"+catID,
                    type: "GET",
                    cache: false,
                    dataType: "json",
                    success: function(data) {
                        var output = '<option value="">Select Sub Catagory</option>';
                        for(var i = 0; i < data.length; i++)
                        {
                        output += '<option value="'+data[i].subCategoryName+'" id="'+data[i].id+'">'+data[i].subCategoryName+'</option>';
                        }
                        $('#subCategoryName').html(output);
                    }
                });
            }
        })

        $('#subCategoryName').change(function(){
        var id=$(this).find('option:selected').attr('id');
        $('#printBtn').attr('href' , 'http://localhost/inventory_stock/authorized/stockLedgerSubcat'+'/'+id);
        // $('#printBtn').attr('href');
                    // alert(oldurl);
        if(id){
            $.ajax({
                url:"{{ url('authorized/subcategorydata-product-search') }}/"+id,
                type:'GET',
                cache:false,
                dataType:"json",
                success:function(data) {
                    var output = '';
                    $('.subcategory_records').text(data.length);
                    for(var i = 0; i < data.length; i++)
                    {
                    output += '<tr>';
                    output += '<td>' + data[i].id + '</td>';
                    output += '<td>' + data[i].productName + '</td>';
                    output += '<td>' + data[i].prodCode + '</td>';
                    output += '<td>' + data[i].prodRate + '</td>';
                    output += '<td>' + data[i].stockBalance + '</tr>';
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
