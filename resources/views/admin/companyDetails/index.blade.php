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
                                {{-- <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Company Name</th>
                                            <th>Company Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($input as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->companyName }}</td>
                                            <td>{{ $company->companyEmail }}</td>
                                            <td>{{ $company->phone }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>{{ $company->logo }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">





                                                <form action="{{ url('authorized/supplier/' . $supplier->id . '/edit') }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Edit</button>
                                                </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table> --}}



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

                                        <th>COMPANY LOGO</th>

                                        <td class="text-center">{{ $company->logo }}</td>

                                        </tr>
                                        @endforeach

                                 </tbody>

                                <tfoot>

                                          <td>
                                                <div class="d-flex justify-content-left">

                                                    <a href="{{ url('authorized/company/' . $company->id) . '/edit' }}" class="btn btn-success">Edit</a>
                                                </div>
                                         </td>


                                    <tr>

                                        <td class="table-primary" colspan="2">THINKS UPDATE YOUR COMPANY INFORMATION</td>

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
