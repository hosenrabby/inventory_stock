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
                                        <form action="{{ url('authorized/purchase_manage') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="rowlenth" id="rowlenth" value="1">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Invoice Number</label>
                                                        <input type="number" class="form-control" name="invNumber" placeholder="Invoice Number">
                                                    </div>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Select Supplier</label>
                                                    <select class="form-control" name="subcatagoryID">
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
                                                        <option value="1" selected>Select Sub Catagory</option>
                                                        @foreach ($subCatagory as $subCatagory)
                                                            <option value="{{ $subCatagory->id }}">{{ $subCatagory->subCategoryName }}</option>
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
                                                        <button type="button" class="btn btn-outline-dark addRow" style="margin-top: 34px"><i class="fa-solid fa-plus"></i></button>
                                                        <button type="button" class="btn btn-outline-danger" id="delRow" style="margin-top: 34px"><i class="fa-solid fa-minus"></i></button>
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control" name="prodName" id="prodName" placeholder="Product Name">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Code</label>
                                                        <input type="number" class="form-control" name="prodCode" id="prodCode" placeholder="Product Code">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product QTY</label>
                                                        <input type="number" class="form-control" name="prodQty" id="prodQTY" placeholder="Product QTY">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Product Rate</label>
                                                        <input type="number" class="form-control" name="prodRate" id="prodRate" placeholder="Product Rate">
                                                    </div>
                                                    <div class="form-group col">
                                                        <label>Total Price</label>
                                                        <input type="number" class="form-control" name="totalPrice" id="totalPrice" placeholder="Total Price">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col"></div>
                                                <div class="form-group col">
                                                    <label>Grand Total</label>
                                                    <input type="number" class="form-control" name="paidAmount" id="grandTot" placeholder="Grand Total">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Paid Amount</label>
                                                    <input type="number" class="form-control" name="paidAmount" id="paidAmount" placeholder="Paid Amount">
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

                {{-- <script type="text/javascript">
                    $(document).ready(
                        $("#addRow").click(function({
                            alert('kaj korse');
                        }))
                    )
                </script> --}}
@endsection
