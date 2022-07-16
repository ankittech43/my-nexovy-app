@extends('layout.mainlayout_admin')
@section('content')

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">List of Products</h3>
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
									<div class="table-responsive">
										<table id="productList" class="datatable table table-hover table-center mb-0">
											<thead>
												<tr>
                                                    <th>Sr</th>
													<th>Product Name</th>
													<th>Visual Ad</th>
													<th>Description</th>
													<th>Status</th>
                                                    <th>Action</th>

												</tr>
											</thead>
											<tbody>
                                            @foreach($productList as $product)
                                            <tr>
                                                <td>#</td>
                                            <td>{{$product->SpacilityType}}</td>
                                            <td><a href="{{ url('image/product/'.$product->filemodel->file_path) }}"><i class="fe fe-eye"></i></a></td>
                                            <td>{{$product->description}}</td>
                                                <td>
                                                    <div class="status-toggle">
                                                        <input type="checkbox" id="status_{{$product->id}}" onchange="change_status()" class="check" checked>
                                                        <label for="status_{{$product->id}}" class="checktoggle">checkbox</label>
                                                    </div>
                                                </td>

                                                <td><a href="{{url('admin/assignProduct')}}/{{$product->id}}">Action</a></td>
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
