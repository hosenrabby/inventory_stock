@extends('layout.master')
@section('content')
<div class="content-wrap">
        <div class="main" onload="max_id_increment()">
            <div class="container-fluid">
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-12 p-l-0 m-l-0">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Sales Product</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Sales Product Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/sales-form-insert') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="rowlen" id="rowlen" value="1">
                                            <input type="hidden" name="invoice_id" id="invoice_id" value="1"/>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Invoice Number</label>
                                                        <input type="number" class="form-control" name="invNumber" placeholder="Invoice Number">
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Select Customer</label>
                                                    <select class="form-control" name="customerID">
                                                        <option value="1" selected>Select Customer</option>
                                                        @foreach ($customer as $customers)
                                                            <option value="{{ $customers->id }}">{{ $customers->customerName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Purchase Date</label>
                                                    <input type="date" class="form-control" name="purchaseDate" placeholder="Purchase Date">
                                                </div>
                                            </div>
                                            <div class="extra-row" id="" >
                                                <div class="row mt-3" id="RowAppend">
                                                    <div class="col-1">
                                                        <button type="button" class="btn btn-sm btn-outline-dark" id="RowAdd" onclick="row_Append()" style="margin-top: 34px"><i class="fa-solid fa-plus"></i></button>
                                                        {{-- <button type="button" class="btn btn-sm btn-outline-danger" id="RowDeletesd" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button> --}}
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Name</label>
                                                        {{-- <input type="text" class="form-control" name="productName" id="productName" placeholder="Product Name"> --}}
                                                        <select class="form-control" name="productID[]" id="productName1" onchange="salesAdd(1)">
                                                            <option value="1" selected>Select Product</option>
                                                            @foreach ($productName as $products)
                                                                <option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                        <div class="form-group col">
                                                            <label>Product Code</label>
                                                            <input type="number" class="form-control" name="prodCode[]" id="productCode1" placeholder="Product Code">

                                                        </div>
                                                    <div class="form-group col">
                                                        <label>Product QTY</label>
                                                        <input type="number" class="form-control" name="prodQty[]" id="productQty1" onkeyup="parchaseeCal(1)" placeholder="Product QTY">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Rate</label>
                                                        <input type="number" class="form-control" name="prodRate[]" id="productRate1" onkeyup="parchaseeCal(1)" placeholder="Product Rate">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Total Price</label>
                                                        <input type="number" class="form-control totalCount" name="totalPrice[]" id="totalePrice1" placeholder="Total Price">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="form-group col">
                                                    <label>Grand Total</label>
                                                    <input type="number" class="form-control" name="grandTotal" id="grandeTotal" onkeyup="parchaseeCal()" placeholder="Grand Total">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Paid Amount</label>
                                                    <input type="number" class="form-control" name="paidAmount" id="paiddAmount" onkeyup="parchaseeCal()" placeholder="Paid Amount">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Dues Amunt</label>
                                                    <input type="number" class="form-control" name="duesAmount" id="duessAmount" placeholder="Dues Amount">
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
        </div>
                <!-- /# row -->
@endsection

@section('script')


<script type="text/javascript">

    function row_Append(){
        var i=1;
        var rowlength=parseInt($('#rowlen').val());
        i+=rowlength;
        var row='<div class="row mt-3" id="DelRow'+i+'">'
            row+='<div class="col-1">'
            row+='<button type="button" class="btn btn-sm btn-outline-danger" id="minus" onclick="row_Remove('+i+')"  style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>'
            row+='</div>'
            row+='<div class="form-group col">'
            row+='<label>Product Name</label>'
            row+='<select class="form-control" name="productID[]" id="productName'+i+'" onchange="salesAdd('+i+')">'
            row+='<option value="1" selected>Select Product</option>'
            row+='@foreach ($productName as $products)'
            row+='<option value="{{ $products->id }}" id="{{ $products->id }}">{{ $products->productName }}</option>'
            row+='@endforeach'
            row+='</select>'
            row+='</div>'
            row+='<div class="form-group col">'
            row+='<label>Product Code</label>'
            row+='<input type="number" class="form-control" name="prodCode[]" id="productCode'+i+'" placeholder="Product Code">'
            row+='</div>'
            row+='<div class="form-group col">'
            row+='<label>Product QTY</label>'
            row+='<input type="number" class="form-control" name="prodQty[]" id="productQty'+i+'" onkeyup="parchaseeCal('+i+')" placeholder="Product QTY">'
            row+='</div>'
            row+='<div class="form-group col">'
            row+='<label>Product Rate</label>'
            row+='<input type="number" class="form-control" name="prodRate[]" id="productRate'+i+'" onkeyup="parchaseeCal('+i+')" placeholder="Product Rate">'
            row+='</div>'
            row+='<div class="form-group col">'
            row+='<label>Total Price</label>'
            row+='<input type="number" class="form-control totalCount" name="totalPrice[]_" id="totalePrice'+i+'" placeholder="Total Price">'
            row+='</div>'
            row+='</div>'

        $('#RowAppend').append(row);
        $('#rowlen').val(i);
        i++;

    }

    function row_Remove(id){
        $('#DelRow'+id).remove();
    }


    function salesAdd(id){
        var optID = $('#productName'+id).find("option:selected").attr('id');
            if (optID) {
                $.ajax({
                    url: "{{ url('/authorized/salesproduct-data') }}/"+optID,
                    type: "GET",
                    cache: false,
                    dataType: "json",
                        success: function(data) {
                            console.log(data);
                                $.each(data, function(key, value) {
                                    $('#productCode'+id).val(value.prodCode);
                                    $('#productRate'+id).val(value.prodRate);
                                })
                            }
                        });
                    }
                }

    function max_id(){
        var id=$('#invoice_id').val();
        // alert(id)
            $.ajax({
                url:"{{ url('authorized/salesproduct-data2') }}/"+id,
                type:"GET",
                cache:false,
                dataType:"json",
                success:function(data){
                    console.log(data);
                    $.each(data, function(key, value){
                        $('#invoice_id').val(value.invoice_id);
                        var newVlu = $('#invoice_id').val();
                        if (newVlu < 1) {
                            newVlu = 1;
                        } else
                        newVlu = parseInt(newVlu) + 1;
                        $('#invoice_id').val(newVlu);
                    })
                }
            });
        }

    function parchaseeCal(id){
        var productQty = $('#productQty'+id).val();
        var productRate = $('#productRate'+id).val();
        var totalP = (productQty*productRate);
            $('#totalePrice'+id).val(totalP);

            var allTotalP = 0;
            $('.totalCount').each(function(){
                var get_valu = $(this).val();
                if($.isNumeric(get_valu)){
                    allTotalP += parseInt(get_valu);
                }
            });
            $('#grandeTotal').val(allTotalP);

            var grandValu = $('#grandeTotal').val();
            var paidAmount = $('#paiddAmount').val();

            if(grandValu != paidAmount){
                var duesA = grandValu - paidAmount;
                $('#duessAmount').val(duesA);
            } else{
                $('#duessAmount').val(0);
            }
    }



</script>
@endsection

