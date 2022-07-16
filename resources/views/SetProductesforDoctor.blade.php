<?php $page="setProduct";?>
@extends('layout.mainlayout')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-12 col-12">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                    <h2 class="breadcrumb-title">Booking</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="booking-doc-info">
                                <a href="doctor-profile" class="booking-doc-img">
                                    <img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="User Image">
                                </a>
                                <div class="booking-info">
                                    <h4><a href="doctor-profile">Dr. {{$doctors->doctors['DoctorName']}}</a></h4>
                                    <p class="doc-speciality">{{$doctors->doctors['Qualification']}} - {{$doctors->doctors['Speciality']}}</p>
                                    <h5 class="doc-department"><img
                                            src="{{asset('assets/img/specialities/specialities-05.png')}}"
                                            class="img-fluid" alt="Speciality">{{$doctors->SpacilityType}}</h5>
                                  {{--  <div class="rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="d-inline-block average-rating">35</span>
                                    </div>--}}
                                    <p class="text-muted mb-0"><i class="fas fa-map-marker-alt"></i> {{$doctors->doctors['Area']}}, {{$doctors->doctors['City']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 col-md-12">

                            <div class="row blog-grid-row">
                                @foreach($product as $product)
                                <div class="col-md-6 col-sm-12">

                                    <!-- Blog Post -->
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="blog-details"><img class="img-fluid" src="{{asset('assets/img/blog/blog-01.jpg')}}" alt="Post Image"></a>
                                        </div>
                                        <div class="blog-content">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <a href="doctor-profile"><img src="{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}" alt="Post Author"> <span>{{$product->product['SpacilityType']}}</span></a>
                                                    </div>
                                                </li>
                                                <li><i class="far fa-clock"></i> 4 Dec 2019</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="blog-details">{{$product->product['SpacilityType']}}</a></h3>
                                            <p class="mb-0">{{$product->product['description']}}</p>
                                        </div>
                                    </div>
                                    <!-- /Blog Post -->

                                </div>
                                @endforeach
                                {{--<div class="col-md-6 col-sm-12">

                                    <!-- Blog Post -->
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="blog-details"><img class="img-fluid" src="{{asset('assets/img/blog/blog-02.jpg')}}" alt="Post Image"></a>
                                        </div>
                                        <div class="blog-content">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <a href="doctor-profile"><img src="{{asset('assets/img/doctors/doctor-thumb-02.jpg')}}" alt="Post Author"> <span>Dr. Darren Elder</span></a>
                                                    </div>
                                                </li>
                                                <li><i class="far fa-clock"></i> 3 Dec 2019</li>
                                            </ul>
                                            <h3 class="blog-title"><a href="blog-details">What are the benefits of Online Doctor Booking?</a></h3>
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                                        </div>
                                    </div>
                                    <!-- /Blog Post -->

                                </div>--}}

                            </div>

                            <!-- Blog Pagination -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="blog-pagination">
                                        <nav>
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" tabindex="-1"><i class="fas fa-angle-double-left"></i></a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!-- /Blog Pagination -->

                        </div>

                        <!-- Blog Sidebar -->
                        <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                            <!-- Search -->
                            <div class="card search-widget">
                                <div class="card-body">
                                    <form class="search-form">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search..." class="form-control">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /Search -->

                            <!-- Latest Posts -->
                            <div class="card post-widget">
                                <div class="card-header">
                                    <h4 class="card-title">Latest Posts</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="latest-posts">
                                        <li>
                                            <div class="post-thumb">
                                                <a href="blog-details">
                                                    <img class="img-fluid" src="assets/img/blog/blog-thumb-01.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="blog-details">Doccure – Making your clinic painless visit?</a>
                                                </h4>
                                                <p>4 Dec 2019</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post-thumb">
                                                <a href="blog-details">
                                                    <img class="img-fluid" src="assets/img/blog/blog-thumb-02.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="blog-details">What are the benefits of Online Doctor Booking?</a>
                                                </h4>
                                                <p>3 Dec 2019</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post-thumb">
                                                <a href="blog-details">
                                                    <img class="img-fluid" src="assets/img/blog/blog-thumb-03.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="blog-details">Benefits of consulting with an Online Doctor</a>
                                                </h4>
                                                <p>3 Dec 2019</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post-thumb">
                                                <a href="blog-details">
                                                    <img class="img-fluid" src="assets/img/blog/blog-thumb-04.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="blog-details">5 Great reasons to use an Online Doctor</a>
                                                </h4>
                                                <p>2 Dec 2019</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="post-thumb">
                                                <a href="blog-details">
                                                    <img class="img-fluid" src="assets/img/blog/blog-thumb-05.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="post-info">
                                                <h4>
                                                    <a href="blog-details">Online Doctor Appointment Scheduling</a>
                                                </h4>
                                                <p>1 Dec 2019</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Latest Posts -->

                            <!-- Categories -->
                            <div class="card category-widget">
                                <div class="card-header">
                                    <h4 class="card-title">Blog Categories</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="categories">
                                        <li><a href="#">Cardiology <span>(62)</span></a></li>
                                        <li><a href="#">Health Care <span>(27)</span></a></li>
                                        <li><a href="#">Nutritions <span>(41)</span></a></li>
                                        <li><a href="#">Health Tips <span>(16)</span></a></li>
                                        <li><a href="#">Medical Research <span>(55)</span></a></li>
                                        <li><a href="#">Health Treatment <span>(07)</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Categories -->



                        </div>
                        <!-- /Blog Sidebar -->

                    </div>
                    <!-- Submit Section -->
                    <div class="submit-section proceed-btn text-right">
                        <a href="checkout" class="btn btn-primary submit-btn">Proceed to Pay</a>
                    </div>
                    <!-- /Submit Section -->

                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
    </div>
@endsection
