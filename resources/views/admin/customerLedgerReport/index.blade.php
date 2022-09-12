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
                            <li class="breadcrumb-item active">Customer Ledger Report</li>
                        </ol>
                    </div>
                    <!-- /# column -->
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <form action="">
                                <div class="input-group input-group-rounded">
                                    <input type="text" placeholder="Search Round" name="Search" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary weight" type="submit"
                                            style="padding-bottom: 5px;border-radius: 0px;"><i
                                                class="ti-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="col-8 input-group input-group-rounded">
                        <form action="#" method="POST">
                            <div class="row">
                                <div class="form-group col">
                                    <input type="text" class="datepicker form-control" name="start_date" placeholder="Select Start Date">
                                </div>
                                <div class="form-group col">
                                    <input type="text" class="datepicker form-control" name="end_date" placeholder="Select End Date">
                                </div>
                                <div class="form-group col">
                                    <button class="btn btn-primary weight" type="submit" style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-search"></i>
                                    </button>
                             </div>
                            </div>
                        </form>
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
                                                    <th>Serial No</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Email</th>
                                                    <th>Customer Phone</th>
                                                    <th>Customer Carrent Balance</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1</td>
                                                    <td>Hasanul Banna</td>
                                                    <td>hasanulbanna@gmail.com</td>
                                                    <td>01955800663</td>
                                                    <td>2000</td>

                                                </tr>


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
