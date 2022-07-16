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
                        <h3 class="page-title">List of Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Employee</a></li>
                            <li class="breadcrumb-item active">Doctors</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
{{--            <div class="card col-md-6">--}}
{{--                <div class="card-header "></div>--}}
{{--            </div>--}}
            <div class="row">

                @foreach ($doctorsList as $key=> $item)
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header ">
                                <h4 class="card-title">{{ $item->DoctorName }}</h4>
                                <div class="input-group">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<input id="checkbox-{{$item->id}}"
                                                                   @if(in_array($item->id,$employeeAssignDoctors)) checked
                                                                   onchange="updatetoData(event,'{{array_search($item->id,$employeeAssignDoctors)}}','{{url('admin/empupdatedoc')}}')"
                                                                   @else onchange="addtoData(event,'{{$item->id}}','{{$id}}','{{url('admin/empassigndoc')}}')"
                                                                   @endif
                                                                   value="{{$item->id}}"
                                                                   type="checkbox">
														</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex">
                                        <div class="avatar avatar-xxl">
                                            <img class="avatar-img rounded-circle" alt="User Image"
                                                 src="{{ asset('assets_admin/img/profiles/avatar-02.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8 d-flex">
                                        <ul class="mb-0">

                                            <li>Speciality <span class="ml-4">{{$item->Speciality}}</span></li>
                                            <li>Qualification <span class="ml-4">{{$item->Qualification}}</span></li>
                                            <li>Classification <span class="ml-4">{{$item->Classification}}</span></li>
                                            <li>Area <span class="ml-4">{{$item->Area}}, {{$item->City}}</span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->
@endsection
