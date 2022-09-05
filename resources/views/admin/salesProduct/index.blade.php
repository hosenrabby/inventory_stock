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
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Invoice Number</th>
                                                    <th>Customer Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                    <th>Product Quantity</th>
                                                    <th>Product Rate</th>
                                                    <th>Total Price</th>
                                                    <th>Grand Total</th>
                                                    <th>Paid Amountl</th>
                                                    <th>Dues Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($showData as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data->invNumber }}</td>
                                                        <td>{{ $data->customerID }}</td>
                                                        <td>{{ $data->purchaseDate }}</td>
                                                        <td>{{ $data->productName }}</td>
                                                        <td>{{ $data->prodCode }}</td>
                                                        <td>{{ $data->prodQty }}</td>
                                                        <td>{{ $data->prodRate }}</td>
                                                        <td>{{ $data->totalPrice }}</td>
                                                        <td>{{ $data->grandTotal }}</td>
                                                        <td>{{ $data->painAmount }}</td>
                                                        <td>{{ $data->duesAmount }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">
                                                                <a href="{{ url('authorized/salesproduct/' . $data->id . '/edit') }}"
                                                                    class="btn btn-default"><i
                                                                        class="fa-solid fa-pen-to-square"></i></a>

                                                                <form method="post"
                                                                    action="{{ url('authorized/salesproduct/' . $data->id) }}">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger ml-1 delete-confirm"><i
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
