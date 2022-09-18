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
                            <li class="breadcrumb-item active">Suplier Lists</li>
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
                                                    <th>Serial No</th>
                                                    <th>Supplier Name</th>
                                                    <th>Supplier Email</th>
                                                    <th>Supplier Phone</th>
                                                    <th>Supplier Address</th>
                                                    <th>Supplier Carrent Balance</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($input as $supplier)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $supplier->supplierName }}</td>
                                                        <td>{{ $supplier->supplierEmail }}</td>
                                                        <td>{{ $supplier->supplierPhone }}</td>
                                                        <td>{{ $supplier->supplierAddress }}</td>
                                                        <td>{{ $supplier->supplierCarrentBalance }} ৳</td>
                                                        <td>
                                                            <div class="d-flex justify-content-center">


                                                                <a href="{{ url('authorized/supplier/' . $supplier->id . '/edit') }}"
                                                                    class="btn btn-success">
                                                                    <i class="fa-solid fa-pen-to-square"></i> </a>


                                                                <form
                                                                    action="{{ url('authorized/supplier/' . $supplier->id) }}"
                                                                    method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger ml-1 delete-confirm"><i class="fa-solid fa-trash-can"></i></button>
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
                </section>
            </div>
        </div>
    </div>
@endsection
