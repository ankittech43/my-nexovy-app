@extends('layout.mainlayout_admin')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">View Employee</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
{{--									<li class="breadcrumb-item active">Product</li>--}}

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
										<table id="productList" class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
                                                    <th>Sr</th>
													<th> Name</th>
													{{-- <th>Visual Ad</th> --}}

													<th>Email</th>
                                                    {{-- <th>Description</th> --}}
                                                    <th colspan="2">Action</th>
                                                    <th >Status</th>


												</tr>
											</thead>
											<tbody>
                                                <?php $c=1?>
                                          @foreach($userLists as $user)
                                            <tr>
                                                <td>#</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            {{-- <td>{{$user->description}}</td> --}}
                                            {{-- <td>{{$product->isActive}}</td> --}}
                                            <td>
												<a href="{{url('admin/EmployeeassignProduct')}}/{{$user->id}}">Add Product</a>
											</td>
											<td>
												<a href="{{url('admin/EmployeeassignDoctors')}}/{{$user->id}}">Add Doctors</a>
											</td>

                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_{{$user->id}}" onchange="change_status()" class="check" checked>
                                                        <label for="status_{{$user->id}}" class="checktoggle">checkbox</label>
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
