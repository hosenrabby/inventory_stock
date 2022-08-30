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
                                        <li class="breadcrumb-item active">Product Manage Edit</li>
                                    </ol>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Product Manage Edit</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="{{ url('authorized/product-stock/'.$findData->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" class="form-control" name="prodName" value="{{ $findData->prodName }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Product Code</label>
                                                <input type="number" class="form-control" name="prodCode" value="{{ $findData->prodCode }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Purchase Date</label>
                                                    <input type="date" class="form-control" name="purchaseDate" value="{{ $findData->purchaseDate }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Recieve Date</label>
                                                    <input type="date" class="form-control" name="recieveDate" value="{{ $findData->recieveDate }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Type</label>
                                                <input type="text" class="form-control" name="prodType" value="{{ $findData->recieveDate }}">
                                            </div>
                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Product QTY</label>
                                                    <input type="number" class="form-control" name="prodQty" value="{{ $findData->prodQty }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Product Price</label>
                                                    <input type="number" class="form-control" name="prodPrice" value="{{ $findData->prodPrice }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Total Price</label>
                                                    <input type="number" class="form-control" name="totalPrice" value="{{ $findData->totalPrice }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col">
                                                    <label>Paid Ammount</label>
                                                    <input type="number" class="form-control" name="paidAmmount" value="{{ $findData->paidAmmount }}">
                                                </div>
                                                <div class="form-group col">
                                                    <label>Dues Ammount</label>
                                                    <input type="number" class="form-control" name="duesAmmount" value="{{ $findData->duesAmmount }}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label>Select Suplier</label>
                                                    <select class="form-control" name="suplierID">
                                                        @foreach ($selectedData as $data)
                                                        <option value="{{ $data->suplierID }}"
                                                            @if ($findData->suplierID == $data->suplierID) selected @endif>ekhane suplier table data asbe
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label>Select Catagory</label>
                                                    <select class="form-control" name="suplierID">
                                                        @foreach ($selectedData as $data)
                                                        <option value="{{ $data->catagoryID }}"
                                                            @if ($findData->catagoryID == $data->catagoryID) selected @endif>ekhane catagory table data asbe
                                                            </option>
                                                        @endforeach
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
