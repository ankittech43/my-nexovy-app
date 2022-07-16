<!-- Sidebar -->
<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title">
								<span>Main</span>
							</li>
							<li class="{{ Request::is('admin/index_admin') ? 'active' : '' }}">
								<a href="index_admin"><i class="fe fe-home"></i> <span>Dashboard</span></a>
							</li>
							<!-- <li class="{{ Request::is('admin/appointment-list') ? 'active' : '' }}">
								<a href="appointment-list"><i class="fe fe-layout"></i> <span>Appointments</span></a>
							</li>
							<li  class="{{ Request::is('admin/specialities') ? 'active' : '' }}">
								<a href="specialities"><i class="fe fe-users"></i> <span>Specialities</span></a>
							</li> -->
{{--							<li  class="{{ Request::is('admin/doctor-list') ? 'active' : '' }}"> --}}
{{--								<a href="doctor-list"><i class="fe fe-user-plus"></i> <span>Doctors</span></a>--}}
{{--							</li>--}}
{{--                            --}}
                            <!-- <li class="{{ Request::is('admin/appointment-list') ? 'active' : '' }}">
                                <a href="appointment-list"><i class="fe fe-layout"></i> <span>Add product</span></a>
                            </li> -->

                            <li class="submenu">
                                <a href="#"><i class="fe fe-user-plus"></i> <span>Product</span>     <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a class="{{ Request::is('admin/productCreate') ? 'active' : '' }}" href="{{ url('admin/productCreate') }}">Add Product</a></li>
                                    <li><a class="{{ Request::is('admin/productList') ? 'active' : '' }}" href="{{ url('admin/productList') }}">Product List</a></li>
                                </ul>
                            </li>


{{--							<li class="{{ Request::is('admin/users') ? 'active' : '' }}">--}}
{{--								<a href="{{url('admin/viewEmployee')}}"><i class="fe fe-user-plus"></i> <span>Employees</span></a>--}}
{{--							</li>--}}

                            <li class="submenu">
                                <a href="#"><i class="fe fe-user-plus"></i> <span>Employees</span>     <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a class="{{ Request::is('admin/addEmployee') ? 'active' : '' }}" href="{{ url('admin/addEmployee') }}">Add Employees</a></li>
                                    <li><a class="{{ Request::is('admin/viewEmployee') ? 'active' : '' }}" href="{{ url('admin/viewEmployee') }}">Employees List</a></li>
                                </ul>
                            </li>

							<li class="submenu">
                                <a href="#"><i class="fe fe-user-plus"></i> <span>Doctors</span>     <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    <li><a class="{{ Request::is('admin/addDoctors') ? 'active' : '' }}" href="{{ url('admin/addDoctors') }}">Add Doctors</a></li>
                                    <li><a class="{{ Request::is('admin/doctor-list') ? 'active' : '' }}" href="{{ url('admin/doctor-list') }}">Doctors List</a></li>
                                </ul>
                            </li>

							<!-- <li  class="{{ Request::is('admin/patient-list') ? 'active' : '' }}">
								<a href="patient-list"><i class="fe fe-user"></i> <span>Patients</span></a>
							</li> -->
							<!-- <li  class="{{ Request::is('admin/reviews') ? 'active' : '' }}">
								<a href="reviews"><i class="fe fe-star-o"></i> <span>Reviews</span></a>
							</li>
							<li  class="{{ Request::is('admin/transactions-list') ? 'active' : '' }}">
								<a href="transactions-list"><i class="fe fe-activity"></i> <span>Transactions</span></a>
							</li> -->
							<!-- <li   class="{{ Request::is('admin/settings') ? 'active' : '' }}">
								<a href="settings"><i class="fe fe-vector"></i> <span>Settings</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/invoice-report') ? 'active' : '' }}" href="{{ url('admin/invoice-report') }}">Invoice Reports</a></li>
								</ul>
							</li> -->
							<!-- <li class="menu-title">
								<span>Pages</span>
							</li>
							<li  class="{{ Request::is('admin/profile') ? 'active' : '' }}">
								<a href="profile"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-document"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a  class="{{ Request::is('admin/login') ? 'active' : '' }}" href="{{ url('admin/login') }}"> Login </a></li>
									<li><a  class="{{ Request::is('admin/register') ? 'active' : '' }}" href="{{ url('admin/register') }}"> Register </a></li>
									<li><a  class="{{ Request::is('admin/forgot-password') ? 'active' : '' }}" href="{{ url('admin/forgot-password') }}"> Forgot Password </a></li>
									<li><a  class="{{ Request::is('admin/lock-screen') ? 'active' : '' }}" href="{{ url('admin/lock-screen') }}"> Lock Screen </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/error-404') ? 'active' : '' }}" href="{{ url('admin/error-404') }}">404 Error </a></li>
									<li><a class="{{ Request::is('admin/error-500') ? 'active' : '' }}" href="{{ url('admin/error-500') }}">500 Error </a></li>
								</ul>
							</li>
							<li  class="{{ Request::is('admin/blank-page','admin/calendar') ? 'active' : '' }}">
								<a href="blank-page"><i class="fe fe-file"></i> <span>Blank Page</span></a>
							</li>
							<li class="menu-title">
								<span>UI Interface</span>
							</li>
							<li class="{{ Request::is('admin/components') ? 'active' : '' }}">
								<a href="components"><i class="fe fe-vector"></i> <span>Components</span></a>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/form-basic-inputs') ? 'active' : '' }}" href="{{ url('admin/form-basic-inputs') }}">Basic Inputs </a></li>
									<li><a class="{{ Request::is('admin/form-input-groups') ? 'active' : '' }}" href="{{ url('admin/form-input-groups') }}">Input Groups </a></li>
                                    <li><a class="{{ Request::is('admin/form-horizontal') ? 'active' : '' }}" href="{{ url('admin/form-horizontal') }}">Horizontal Form</a></li>
									<li><a class="{{ Request::is('admin/form-vertical') ? 'active' : '' }}" href="{{ url('admin/form-vertical') }}"> Vertical Form </a></li>
									<li><a class="{{ Request::is('admin/form-mask') ? 'active' : '' }}" href="{{ url('admin/form-mask') }}"> Form Mask </a></li>
									<li><a class="{{ Request::is('admin/form-validation') ? 'active' : '' }}" href="{{ url('admin/form-validation') }}"> Form Validation </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li><a class="{{ Request::is('admin/tables-basic') ? 'active' : '' }}" href="{{ url('admin/tables-basic') }}">Basic Tables </a></li>
									<li><a class="{{ Request::is('admin/data-tables') ? 'active' : '' }}" href="{{ url('admin/data-tables') }}">Data Table </a></li>
								</ul>
							</li>
							<li class="submenu">
								<a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">
									<li class="submenu">
										<a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
										<ul style="display: none;">
											<li><a href="javascript:void(0);"><span>Level 2</span></a></li>
											<li class="submenu">
												<a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
												<ul style="display: none;">
													<li><a href="javascript:void(0);">Level 3</a></li>
													<li><a href="javascript:void(0);">Level 3</a></li>
												</ul>
											</li>
											<li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0);"> <span>Level 1</span></a>
									</li>
								</ul>
							</li> -->
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
