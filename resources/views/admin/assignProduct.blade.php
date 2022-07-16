@extends('layout.mainlayout_admin')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">


            <meta name="csrf-token" content="{{ csrf_token() }}">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Assign Products</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Product</a></li>
                            <li class="breadcrumb-item active">{{$product->SpacilityType}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-body">
                            <form method="post" action="{{url('admin/assignDoctorsStore')}}">
                                @csrf

                                <table id="assignProduct" class="datatable table table-hover table-center mb-0">
                                    <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Doctors Name</th>
                                        <th>Speciality</th>
                                        <th>Classification</th>
                                        <th>Area</th>
                                        <th>City</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $cnt = 1 ?>
                                    @foreach($doctorList as $doctors)
                                        <tr>
                                            <th>#
                                                                     </th>
                                            <td>{{$doctors->id}}-{{$doctors->DoctorName}}</td>
                                            <td>{{$doctors->Speciality}}</td>
                                            <td>{{$doctors->Classification}}</td>
                                            <td>{{$doctors->Area}}</td>
                                            <td> {{$doctors->City}}</td>
                                            <td>                       <?php $url = "url('admin/assignDoctorsStore'}}"; ?>
                                                <div class="checkbox"><label>
                                                        @if(in_array($doctors->id,$dataAssignProduct))
                                                            <input type="checkbox" value="{{$doctors->id}}" checked
                                                                   name="doctors[]"
                                                                   onchange="doctorsAssign(this,'{{$dataAssignProductByID[$cnt]}}','{{url('admin/changeProduct')}}')"
                                                                   name="checkbox">
                                                            <input type="hidden" name="prodAssid[]">
                                                        @else
                                                            <input type="checkbox" value="{{$doctors->id}}"
                                                                   name="doctors[]"
                                                                   onchange="doctorsAssign(this,'{{$doctors->id}}',{{$pid}},'assignDoctorsStore')"
                                                                   name="checkbox">
                                                        @endif

                                                    </label>
                                                <!-- {{$doctors->id}}---{{$usrId}}--{{$pid}} -->
                                                </div>

                                            </td>

                                            <?php $cnt++; ?>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot id="tfoot">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    </tfoot>
                                </table>
                                <input type="hidden" name="productId" value="{{$pid}}">
                                <button type="submit" class="col-2 btn btn-primary btn-block">Save Changes</button>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection
