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
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Product Stock Form</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="prodName" placeholder="Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="number" class="form-control" name="prodCode" placeholder="Product Code">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Purchase Date</label>
                                                    <input type="date" class="form-control" name="purchaseDate" placeholder="Purchase Date">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Recieve Date</label>
                                                    <input type="date" class="form-control" name="recieveDate" placeholder="Recieve Date">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Type</label>
                                                <input type="text" class="form-control" name="prodType" placeholder="Product Type">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Product QTY</label>
                                                    <input type="number" class="form-control" name="prodQty" placeholder="Product QTY">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Product Price</label>
                                                    <input type="number" class="form-control" name="prodPrice" placeholder="Product Price">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Total Price</label>
                                                    <input type="number" class="form-control" name="totalPrice" placeholder="Total Price">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Paid Ammount</label>
                                                    <input type="number" class="form-control" name="paidAmmount" placeholder="Paid Ammount">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Dues Ammount</label>
                                                    <input type="number" class="form-control" name="duesAmmount" placeholder="Dues Ammount">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label>Select Suplier</label>
                                                    <select class="form-control" name="suplierID">
                                                        <option value="" selected>Company 1</option>
                                                        <option value="">Company 2</option>
                                                        <option value="">Company 3</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Select Catagory</label>
                                                    <select class="form-control" name="suplierID">
                                                        <option value="" selected>Catagory 1</option>
                                                        <option value="">Catagory 2</option>
                                                        <option value="">Catagory 3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-outline-primary ml-2 mt-3">SUBMIT</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
                <!-- /# row -->

@endsection
