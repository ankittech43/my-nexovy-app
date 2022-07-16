@extends('layout.mainlayout_admin')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Product</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:(0);">Employee</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row">
                @foreach ($productList as $item)
                    <div class="col-md-6 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header">
                                <h4 class="card-title">{{ $item->SpacilityType }}</h4>
                                <div class="input-group">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<input id="checkbox-{{$item->id}}"
                                                                   @if(in_array($item->id,$employeeAssignProduct)) checked
                                                                   onchange="updatetoData(event,'{{array_search($item->id,$employeeAssignProduct)}}','{{url('admin/empupdateprod')}}')"
                                                                   @else onchange="addtoData(event,'{{$item->id}}','{{$id}}','{{url('admin/empassignproduct')}}')"
                                                                   @endif value="{{$item->id}}"
                                                                   type="checkbox">
														</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 d-flex">

                                        @if($item->filemodel->file_path=="")
                                            <div class="avatar avatar-xxl">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('assets_admin/img/profiles/avatar-02.jpg') }}">
                                            </div>
                                        @else
                                            <div class="avatar avatar-xxl">
                                                <img class="avatar-img rounded-circle" alt="User Image"
                                                     src="{{ asset('image/product/'.$item->filemodel->file_path) }}">
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-md-8 d-flex">
                                        {{$item->description}}
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
