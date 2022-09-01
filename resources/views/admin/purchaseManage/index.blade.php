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
                            <li class="breadcrumb-item active">Table-Export</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <a href="{{ url('authorized/purchase-manage/create') }}"class="btn btn-default mb-3">Purchase Product</a>
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Invoice Number</th>
                                                    <th>Purchase Date</th>
                                                    <th>Catagory Name</th>
                                                    <th>Sub Catagory Name</th>
                                                    <th>Suplier Name</th>
                                                    <th>Product QTY</th>
                                                    <th>Product Rate</th>
                                                    <th>Total Price</th>
                                                    <th>Paid Ammount</th>
                                                    <th>Dues Ammount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->productID }}</td>
                                                        <td>{{ $data->prodCode }}</td>
                                                        <td>{{ $data->invNumber }}</td>
                                                        <td>{{ $data->purchaseDate }}</td>
                                                        <td>{{ $data->catagoryID }}</td>
                                                        <td>{{ $data->subCatagoryID }}</td>
                                                        <td>{{ $data->supplierID }}</td>
                                                        <td>{{ $data->prodQty }}</td>
                                                        <td>{{ $data->prodRate }}</td>
                                                        <td>{{ $data->totalPrice }}</td>
                                                        <td>{{ $data->paidAmount }}</td>
                                                        <td>{{ $data->duesAmount }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="{{ url('authorized/product-stock/' . $data->id . '/edit') }}"
                                                                    class="btn btn-default"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                                <form method="post"
                                                                    action="{{ url('authorized/product-stock/' . $data->id) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger ml-1"><i
                                                                            class="fa-solid fa-trash-can"></i></button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
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
