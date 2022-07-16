<?php $page = "allProduct"; ?>
@extends('layout.mainlayout')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">{{count($productList)}} matches found  {{--for : Dentist In Bangalore--}}</h2>
                </div>
                <div class="col-md-4 col-12 d-md-block d-none">
                    <div class="sort-by">
                        <span class="sort-title">Sort by</span>
                        <span class="sortby-fliter">
									<select class="select">
										<option>Select</option>
										{{--@foreach($doctorArea as $area)
                                        <option class="sorting">{{$area->Area}}</option>
										@endforeach--}}
									</select>
								</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3 theiaStickySidebar">

                    <!-- Search Filter -->
                    <div class="card search-filter">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Search Filter</h4>
                        </div>
                        <div class="card-body">
                            <div class="filter-widget">
                                <div class="cal-icon">
                                    <input type="text" class="form-control datetimepicker" placeholder="Select Date">
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Gender</h4>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type" checked>
                                        <span class="checkmark"></span> Male Doctor
                                    </label>
                                </div>
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="gender_type">
                                        <span class="checkmark"></span> Female Doctor
                                    </label>
                                </div>
                            </div>
                            <div class="filter-widget">
                                <h4>Select Specialist</h4>
{{--                              @foreach($doctorSpeciality as $specility)--}}
                                <div>
                                    <label class="custom_check">
                                        <input type="checkbox" name="select_specialist">
                                        <span class="checkmark"></span> Amn
                                    </label>
                                </div>
{{--                                <div>--}}
{{--                                    <label class="custom_check">--}}
{{--                                        <input type="checkbox" name="select_specialist">--}}
{{--                                        <span class="checkmark"></span> Dentist--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                @endforeach--}}

                            </div>
                            <div class="btn-search">
                                <button type="button" class="btn btn-block">Search</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Search Filter -->

                </div>

                <div class="col-md-12 col-lg-8 col-xl-9">

                @foreach($productList as $list)
                    <!-- Doctor Widget -->
                        <div class="card">
                            <div class="card-body">
                                <div class="doctor-widget">
                                    <div class="doc-info-left">
                                        <div class="doctor-img">
                                            <a href="doctor-profile">
                                                <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}"
                                                     class="img-fluid" alt="User Image">
                                            </a>
                                        </div>
                                        <div class="doc-info-cont">
                                            <h4 class="doc-name"><a href="doctor-profile"> {{$list->product['SpacilityType']}}</a></h4>
                                            <p class="doc-speciality">{{--{{$list->doctors['Qualification']}} - {{$list->doctors['Speciality']}}--}}</p>
                                            <h5 class="doc-department"><img
                                                    src="{{asset('assets/img/specialities/specialities-05.png')}}"
                                                    class="img-fluid" alt="Speciality">{{--{{$list->SpacilityType}}--}}</h5>

                                            <div class="clinic-details">
                                                <p class="doc-location">{{--<i class="fas fa-map-marker-alt"></i>--}} {{$list->product['description']}}</p>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="doc-info-right">

                                        <div class="clinic-booking">
                                            <a class="view-pro-btn" href="doctor-profile">View Details</a>
                                            <a class="apt-btn" href="{{url('Productbooking')}}">Book Doctors</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="load-more text-center">
                        <a class="btn btn-primary btn-sm" href="javascript:void(0);">Load More</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
