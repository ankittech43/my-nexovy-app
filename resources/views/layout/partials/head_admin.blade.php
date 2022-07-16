<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        @if(!Route::is(['appointment-list','specialities','doctor-list','patient-list','reviews','transactions-list','settings','invoice-report','profile','login','register','forgot-password','lock-screen','error-404','error-500','blank-page','components','form-basic','form-inputs','form-horizontal','form-vertical','form-mask','form-validation','tables-basic','data-tables','invoice','calendar']))
        <title>Nexovy - Dashboard</title>
        @endif
        @if(Route::is(['appointment-list']))
        <title>Nexovy - Appointment List Page</title>
        @endif
        @if(Route::is(['specialities']))
        <title>Nexovy - Specialities Page</title>
		@endif
        @if(Route::is(['doctor-list']))
        <title>Nexovy - Doctor List Page</title>
        @endif
        @if(Route::is(['patient-list']))
        <title>Nexovy - Patient List Page</title>
        @endif
        @if(Route::is(['reviews']))
        <title>Nexovy - Reviews Page</title>
        @endif
        @if(Route::is(['transactions-list']))
        <title>Nexovy - Transactions List Page</title>
        @endif
        @if(Route::is(['settings']))
        <title>Nexovy - Settings Page</title>
        @endif
        @if(Route::is(['invoice-report']))
        <title>Nexovy - Invoice Report Page</title>
        @endif
        @if(Route::is(['profile']))
        <title>Nexovy - Profile</title>
        @endif
        @if(Route::is(['login']))
        <title>Nexovy - Login</title>
		@endif
        @if(Route::is(['register']))
        <title>Nexovy - Register</title>
        @endif
        @if(Route::is(['forgot-password']))
        <title>Nexovy - Forgot Password</title>
        @endif
        @if(Route::is(['lock-screen']))
        <title>Nexovy - Lock Screen</title>
        @endif
        @if(Route::is(['error-404']))
        <title>Nexovy - Error 404</title>
		@endif
        @if(Route::is(['error-500']))
        <title>Nexovy - Error 500</title>
		@endif
        @if(Route::is(['blank-page']))
        <title>Nexovy - Blank Page</title>
        @endif
        @if(Route::is(['components']))
        <title>Nexovy - Components</title>
        @endif
        @if(Route::is(['form-basic']))
        <title>Nexovy - Basic Inputs</title>
        @endif
        @if(Route::is(['form-inputs']))
        <title>Nexovy - Form Input Groups</title>
        @endif
        @if(Route::is(['form-horizontal']))
        <title>Nexovy - Horizontal Form</title>
        @endif
        @if(Route::is(['form-vertical']))
        <title>Nexovy - Vertical Form</title>
        @endif
        @if(Route::is(['form-mask']))
        <title>Nexovy - Form Mask</title>
        @endif
        @if(Route::is(['form-validation']))
        <title>Nexovy - Form Validation</title>
        @endif
        @if(Route::is(['tables-basic']))
        <title>Nexovy - Tables Basic</title>
        @endif
        @if(Route::is(['data-tables']))
        <title>Nexovy - Data Tables</title>
        @endif
        @if(Route::is(['invoice']))
        <title>Nexovy - Invoice</title>
        @endif
        @if(Route::is(['calendar']))
        <title>Nexovy - Calendar</title>
        @endif
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets_admin/img/favicon.png')}}">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/font-awesome.min.css')}}">

		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/feathericon.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/morris/morris.css')}}">
        <!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/select2.min.css')}}">
        	<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/css/bootstrap-datetimepicker.min.css')}}">

		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/plugins/fullcalendar/fullcalendar.min.css')}}">
        <!-- Datatables CSS -->
		<link rel="stylesheet" href="{{asset('assets_admin/plugins/datatables/datatables.min.css')}}">

		<!-- <link rel="stylesheet" href="assets/plugins/morris/morris.css"> -->

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets_admin/css/style.css')}}">
