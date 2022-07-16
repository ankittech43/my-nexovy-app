@extends('layout.mainlayout_admin')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Add Products</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif
                            <!-- Profile Settings Form -->
                            <form action="{{url('admin/addProduct')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row form-row">


                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Product Image</label>
                                            <input type="File" class="form-control" value="" id="add_on_file" name="add_on_file">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Speciality Type</label>
                                            <input type="text" name="speciality" id="speciality" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea rows="5" cols="5" class="form-control" name="description" placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                                </div>
                            </form>
                            <!-- /Profile Settings Form -->

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection
