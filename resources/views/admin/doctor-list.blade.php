@extends('layout.mainlayout_admin')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Doctors</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                            <li class="breadcrumb-item active">Doctor</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="doctorList" class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Doctor Name</th>
                                            <th>Speciality</th>
                                            <th>Classification</th>
                                            <th>Area</th>
                                            <th>City</th>
                                            <th>Account Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorList as $doctor)
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        {{-- <a href="profile" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="{{asset('assets_admin/img/doctors/doctor-thumb-01.jpg')}}" alt="User Image"></a> --}}
                                                        <a href="profile">{{ $doctor->DoctorName }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $doctor->Speciality }}</td>
                                                <td>{{ $doctor->Classification }}</td>
                                                <td>{{ $doctor->Area }}</td>
                                                <td>{{ $doctor->City }}</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_{{$doctor->id}}" onchange="change_status()" class="check" checked>
                                                        <label for="status_{{$doctor->id}}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
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
