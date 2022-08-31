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
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-centre">
                                    <thead>
                                        <tr>
                                            <th>Serial No</th>
                                            <th>Category Name</th>
                                            <th>SubCategory Name</th>
                                            <th>SubCategory Code</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subcategory as $categories)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $categories->categoryName }}</td>
                                            <td>{{ $categories->subCategoryName }}</td>
                                            <td>{{ $categories->subCategoryCode }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ url('authorized/subcategory/' . $categories->id) }}" class="btn btn-success">Edit</a>
                                                <form action="" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
