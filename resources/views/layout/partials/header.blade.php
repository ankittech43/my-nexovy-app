<?php error_reporting(0);?>
<!-- Loader -->
@if(Route::is(['map-grid','map-list']))
<div id="loader">
		<div class="loader">
			<span></span>
			<span></span>
		</div>
	</div>
	@endif
	<!-- /Loader  -->
<div class="main-wrapper">
<!-- Header -->
<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index" class="navbar-brand logo">
							<img src="{{url('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="index" class="menu-logo">
								<img src="{{url('assets/img/logo.png')}}" class="img-fluid" alt="Logo">
							</a>
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="{{ Request::is('index') ? 'active' : '' }}">
								<a href="index">Home</a>
							</li>
							<li class="has-submenu <?php if($page=="allDoctor" || $page=="DoctorList" ) { echo 'active'; } ?>">
								<a href="">Doctors <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="allDoctor") { echo 'active'; } ?>"><a href="{{url('employee/allDoctor')}}">Assign Doctors </a></li>
									<li class="<?php if($page=="DoctorList") { echo 'active'; } ?>"><a href="{{url('employee/DoctorList')}}">DoctorList</a></li>

								</ul>
							</li>
							<li class="has-submenu <?php if($page=="map-grid" || $page=="map-list" || $page=="search1" || $page=="doctor-profile" || $page=="booking" || $page=="checkout" || $page=="booking-success" || $page=="patient-dashboard" || $page=="favourites" || $page=="chat" || $page=="profile-settings" || $page=="change-password") { echo 'active'; } ?>">
								<a href="">Products <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="<?php if($page=="allProduct") { echo 'active'; } ?>"><a href="{{url('employee/allProduct')}}">Assign Product</a></li>


								</ul>
							</li>












{{--							<li class="has-submenu <?php if($page=="voice-call" || $page=="video-call" || $page=="search" || $page=="calendar" || $page=="components" || $page=="invoices1" || $page=="invoice-view" || $page=="blank-page" || $page=="login" || $page=="register1" || $page=="forgot-pswd") { echo 'active'; } ?>">--}}
{{--								<a href="">Pages <i class="fas fa-chevron-down"></i></a>--}}
{{--								<ul class="submenu">--}}
{{--									<li class="<?php if($page=="voice-call") { echo 'active'; } ?>"><a href="voice-call">Voice Call</a></li>--}}
{{--									<li class="<?php if($page=="video-call") { echo 'active'; } ?>"><a href="video-call">Video Call</a></li>--}}
{{--									<li class="<?php if($page=="search") { echo 'active'; } ?>"><a href="search">Search Doctors</a></li>--}}
{{--									<li class="<?php if($page=="calendar") { echo 'active'; } ?>"><a href="calendar">Calendar</a></li>--}}
{{--									<li class="<?php if($page=="components") { echo 'active'; } ?>"><a href="components">Components</a></li>--}}
{{--									<li class="has-submenu <?php if($page=="invoices1" || $page=="invoice-view") { echo 'active'; } ?>">--}}
{{--										<a href="invoices">Invoices</a>--}}
{{--										<ul class="submenu">--}}
{{--											<li class="<?php if($page=="invoices1") { echo 'active'; } ?>"><a href="invoices">Invoices</a></li>--}}
{{--											<li class="<?php if($page=="invoice-view") { echo 'active'; } ?>"><a href="invoice-view">Invoice View</a></li>--}}
{{--										</ul>--}}
{{--									</li>--}}
{{--									<li class="<?php if($page=="blank-page") { echo 'active'; } ?>"><a href="blank-page">Starter Page</a></li>--}}
{{--									<li class="<?php if($page=="login") { echo 'active'; } ?>"><a href="login">Login</a></li>--}}
{{--									<li class="<?php if($page=="register1") { echo 'active'; } ?>"><a href="register">Register</a></li>--}}
{{--									<li class="<?php if($page=="forgot-pswd") { echo 'active'; } ?>"><a href="forgot-password">Forgot Password</a></li>--}}
{{--								</ul>--}}
{{--							</li>--}}
{{--							<li class="has-submenu <?php if($page=="blog-list" || $page=="blog-grid" || $page=="blog-details") { echo 'active'; } ?>">--}}
{{--                            <a href="">Blog <i class="fas fa-chevron-down"></i></a>--}}
{{--                            <ul class="submenu">--}}
{{--                                <li class="<?php if($page=="blog-list") { echo 'active'; } ?>"><a href="blog-list">Blog List</a></li>--}}
{{--                                <li class="<?php if($page=="blog-grid") { echo 'active'; } ?>"><a href="blog-grid">Blog Grid</a></li>--}}
{{--                                <li class="<?php if($page=="blog-details") { echo 'active'; } ?>"><a href="blog-details">Blog Details</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

						<li>
{{--								<a href="{{route('pagee')}}" target="_blank">Admin</a>--}}
							</li>
						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="nav-item contact-item">
							<div class="header-contact-img">
								<i class="far fa-hospital"></i>
							</div>
							<div class="header-contact-detail">
								<p class="contact-header">Contact</p>
								<p class="contact-info-header"> +1 315 369 5943</p>
							</div>
							@if(Route::is(['page','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','invoice-view','doctor-register','components','calendar','map-grid','map-list','search','doctor-profile','booking','checkout','booking-success']))
							<li class="nav-item">
							<a class="nav-link header-login" href="login">login / Signup </a>
							</li>
							@endif
						</li>
						@if(Route::is(['patient-dashboard','favourites','video-call','profile-settings','change-password','voice-call']))
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>Richard Wilson</h6>
										<p class="text-muted mb-0">Patient</p>
									</div>
								</div>
								<a class="dropdown-item" href="patient-dashboard">Dashboard</a>
								<a class="dropdown-item" href="profile-settings">Profile Settings</a>
								<a class="dropdown-item" href="login">Logout</a>
							</div>
						</li>
						@endif
						@if(!Route::is(['page','blank-page','term-condition','privacy-policy','blog-details','blog-grid','blog-list','forgot-password','register','login','calendar','invoice-view','components','change-password','video-call','doctor-register','voice-call','favourites','map-grid','profile-settings','map-list','search','patient-dashboard','doctor-profile','booking','checkout','booking-success']))
						<!-- User Menu -->
						<li class="nav-item dropdown has-arrow logged-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
								<span class="user-img">
									<img class="rounded-circle" src="assets/img/doctors/doctor-thumb-02.jpg" width="31" alt="Darren Elder">
								</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<div class="user-header">
									<div class="avatar avatar-sm">
										<img src="assets/img/doctors/doctor-thumb-02.jpg" alt="User Image" class="avatar-img rounded-circle">
									</div>
									<div class="user-text">
										<h6>Darren Elder</h6>
										<p class="text-muted mb-0">Doctor</p>
									</div>
								</div>
								<a class="dropdown-item" href="doctor-dashboard">Dashboard</a>
								<a class="dropdown-item" href="doctor-profile-settings">Profile Settings</a>
								<a class="dropdown-item" href="login">Logout</a>
							</div>
						</li>
						<!-- /User Menu -->
						@endif

					</ul>
				</nav>
			</header>
			<!-- /Header -->
