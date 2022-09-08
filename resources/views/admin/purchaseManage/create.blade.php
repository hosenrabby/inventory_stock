@extends('layout.master')
@section('content')
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-12 p-l-0 m-l-0">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Stock Product</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Product Stock Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/purchase-form-insert') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="rowlenth" id="rowlenth" value="1">
                                            <input type="hidden" name="pid" id="invoice_id" value="1">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Invoice Number</label>
                                                        <input type="number" class="form-control" name="invNumber" placeholder="Invoice Number">
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Select Supplier</label>
                                                    <select class="form-control" name="supplierID">
                                                        <option value="1" selected>Select Supplier</option>
                                                        @foreach ($supplier as $supplier)
                                                            <option value="{{ $supplier->id }}">{{ $supplier->supplierName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Select Catagory</label>
                                                    <select class="form-control" name="catagoryID">
                                                        <option value="" selected>Select Catagory</option>
                                                        @foreach ($catagory as $catagory)
                                                            <option value="{{ $catagory->id }}">{{ $catagory->categoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Select Sub Catagory</label>
                                                    <select class="form-control" name="subcatagoryID">
                                                        <option value="0" selected>Select Sub Catagory</option>
                                                        @foreach ($subCatagory as $subCatagory)
                                                            <option value="{{ $subCatagory->id }}" id="{{ $subCatagory->id }}">{{ $subCatagory->subCategoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Purchase Date</label>
                                                    <input type="date" class="form-control" name="purchaseDate" placeholder="Purchase Date">
                                                </div>
                                            </div>
                                            <div class="extra-row" id="appendRow">
                                                <div class="row mt-3">
                                                    <div class="col-1">
                                                        <button type="button" class="btn btn-sm btn-outline-dark addRow" style="margin-top: 34px"><i class="fa-solid fa-plus"></i></button>
                                                        <button type="button" class="btn btn-sm btn-outline-danger" id="delRow" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Name</label>
                                                        <select class="form-control" name="productID[]" id="prodName1" onchange="prodAdd(1)">
                                                            <option value="1" id="1" selected>select product</option>
                                                            @foreach ($product as $products)
                                                                <option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Code</label>
                                                        <input type="number" class="form-control" name="prodCode[]" id="prodCode1" placeholder="Product Code">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product QTY</label>
                                                        <input type="number" class="form-control" name="prodQty[]" id="prodQTY1" onkeyup="parchaseCal(1)" placeholder="Product QTY">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Rate</label>
                                                        <input type="number" class="form-control" name="prodRate[]" id="prodRate1" onkeyup="parchaseCal(1)" placeholder="Product Rate">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Total Price</label>
                                                        <input type="number" class="form-control totCount" name="totalPrice[]" id="totalPrice1" placeholder="Total Price">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="form-group col">
                                                    <label>Grand Total</label>
                                                    <input type="number" class="form-control" name="grandTotal" id="grandTot" onkeyup="parchaseCal()" placeholder="Grand Total">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Paid Amount</label>
                                                    <input type="number" class="form-control" name="paidAmount" id="paidAmount" onkeyup="parchaseCal()" placeholder="Paid Amount">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Dues Amunt</label>
                                                    <input type="number" class="form-control" name="duesAmount" id="duesAmount" placeholder="Dues Amount">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
                <!-- /# row -->

@endsection
@section('script')

    <script type="text/javascript">
//==========================================
//       Purchase Form Append
//==========================================


    $('.addRow').click(function(){
        // alert('Hello world');
        var i=1;
        var rowlen=parseInt($('#rowlenth').val());
        i+=rowlen;
        var row = '<div class="row mt-3" id="deleteRow'+i+'">'
            row+= '<div class="col-1">'
            row+= '<button type="button" class="btn btn-sm btn-outline-danger" id="delRow'+i+'" onclick="rowDelete('+i+')" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Name</label>'
            row+= '<select class="form-control select2" name="prodName[]" id="prodName'+i+'" onchange="prodAdd('+i+')">'
            row+= '<option value="1" selected>select product</option>'
            row+= '@foreach ($product as $products)'
            row+= '<option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>'
            row+= '@endforeach'
            row+= '</select>'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Code</label>'
            row+= '<input type="number" class="form-control" name="prodCode[]" id="prodCode'+i+'" placeholder="Product Code">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product QTY</label>'
            row+= '<input type="number" class="form-control" name="prodQty[]" id="prodQTY'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product QTY">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Product Rate</label>'
            row+= '<input type="number" class="form-control" name="prodRate[]" id="prodRate'+i+'" onkeyup="parchaseCal('+i+')" placeholder="Product Rate">'
            row+= '</div>'
            row+= '<div class="form-group col">'
            row+= '<label>Total Price</label>'
            row+= '<input type="number" class="form-control totCount" name="totalPrice[]" id="totalPrice'+i+'" placeholder="Total Price">'
            row+= '</div>'
            row+= '</div>';


            $('#appendRow').append(row);
            $('#rowlenth').val(i);
            i++;

    })

    function rowDelete(id){
        $('#deleteRow'+id).remove()
    }

    function prodAdd(id){
        var optID = $('#prodName'+id).find("option:selected").attr('id');
            if (optID) {
                $.ajax({
                    url: "{{ url('/authorized/purchase-data') }}/"+optID,
                    type: "GET",
                    cache: false,
                    dataType: "json",
                        success: function(data) {
                            console.log(data);
                                $.each(data, function(key, value) {
                                    $('#prodCode'+id).val(value.prodCode);
                                    $('#prodRate'+id).val(value.prodRate);
                                })
                            }
                        });
                    }
                }

    function max_id(){
        var id=$('#invoice_id').val();
            $.ajax({
                url:"{{ url('authorized/purchase-data2') }}/"+id,
                type:"GET",
                cache:false,
                dataType:"json",
                success:function(data){
                    console.log(data);

                    $.each(data, function(key, value){
                        $('#invoice_id').val(value.pid);
                        newVlu = $('#invoice_id').val();
                        newVlu = parseInt(newVlu) + 1;
                        $('#invoice_id').val(newVlu);
                    })
                }
            });
        }


    function parchaseCal(id){
        var prodQty = $('#prodQTY'+id).val();
        var prodRate = $('#prodRate'+id).val();
        var total = (prodQty*prodRate);
            $('#totalPrice'+id).val(total);

            var allTotal = 0;
            $('.totCount').each(function(){
                var get_value = $(this).val();
                if($.isNumeric(get_value)){
                    allTotal += parseInt(get_value);
                }
            });
            $('#grandTot').val(allTotal);

            var grandVal = $('#grandTot').val();
            var paidA = $('#paidAmount').val();

            if(grandVal != paidA){
                var dues = grandVal - paidA;
                $('#duesAmount').val(dues);
            } else{
                $('#duesAmount').val(0);
            }
    }



    // $('.select2').select2();
    </script>
@endsection
