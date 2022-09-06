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
                                   <div class="row">
                                       <div class="form-group col">
                                           <input type="text" class="datepicker form-control " name="start_date"
                                       placeholder="Select Start Date">
                                       </div>
                                       <div class="form-group col">
                                   <input type="text" class="datepicker form-control " name="end_date"
                                       placeholder="Select End Date">
                                       </div>
                                       <div class="form-group col">
                                    <button class="btn btn-primary weight" type="submit"
                                        style="padding-bottom: 5px;border-radius: 0px;"><i class="ti-search"></i>
                                    </button>
                                    </div>
                                   </div>
                               </form>
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
                                        <table id="" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Product Name</th>
                                                    <th>Product Code</th>
                                                     <th>Product Rate</th>
                                                    <th>Stock Balance</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                    <tr>
                                                        <td>1</td>
                                                        <td>Food</td>
                                                        <td>33</td>
                                                        <td>666</td>
                                                        <td>500</td>

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
                    <!-- /# row -->
                </section>
            </div>
        </div>
    </div>
@endsection
