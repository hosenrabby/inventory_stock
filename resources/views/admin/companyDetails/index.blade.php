@extends('layout.master')
@section('content')
<div class="content-wrap">
<div class="main">
    <div class="container-fluid">
        <div class="row">
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
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

                                            <th class="table-dark text-center" colspan="2">COMPANY INFORMATIONS</th>

                                        </tr>

                                    </thead>


                                    <tbody>
                                         @foreach ($input as $company)



                                     <tr>

                                        <th>COMPANY NAME</th>

                                        <td class="text-center">{{ $company->companyName }}</td>

                                     </tr>



                                     <tr>

                                        <th>COMPANY E-mail</th>

                                        <td class="text-center">{{ $company->companyEmail }}</td>

                                     </tr>


                                     <tr>

                                        <th>Phone</th>

                                        <td class="text-center">{{ $company->phone }}</td>

                                     </tr>
                                     <tr>

                                        <th>COMPANY ADDRESS</th>

                                        <td class="text-center">{{ $company->address }}</td>

                                     </tr>

                                     <tr>

                                        <th class="pt-5">COMPANY LOGO</th>

                                        <td class="text-center"><img src="{{ asset('public/'.$company->logo) }}" alt="" width="150" height="150"></td>

                                        </tr>


                                 </tbody>

                                <tfoot>

                                          <td>
                                                <div class="d-flex justify-content-left">

                                                    <a href="{{ url('authorized/company/' . $company->id) . '/edit' }}" class="btn btn-default "><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                         </td>
                                         @endforeach

                                    <tr>

                                        <td class="table-primary text-center" colspan="2">THINKS UPDATE YOUR COMPANY INFORMATION</td>

                                    </tr>

                                </tfoot>

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
