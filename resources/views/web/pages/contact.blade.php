@extends('web.layout.app')

@section('content')<!--title-bar start-->
    <section class="title-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="left-title-text">
                    <h3>Contact Us</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-title-text">  
                        <ul>
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--title-bar end-->

    <!--contact-us start-->
    <section class="contact-us">
        <div class="container">		
            <div class="row">					
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="contact-heading">	
                        <h1>Contact Information</h1>
                    </div>
                    <div class="contact-info">
                        <div class="row">					
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-item">
                                    <img src="template_web/images/contact/icon-1.svg" alt="">
                                    <h4>Address</h4>
                                    <p>66 Town St - Suite 522 Newyork, United States, GA 11112</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-item">
                                    <img src="template_web/images/contact/icon-2.svg" alt="">
                                    <h4>Email Address</h4>
                                    <p>Nattto@gmail.com<br>Info@natto.com</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-item">
                                    <img src="template_web/images/contact/icon-3.svg" alt="">
                                    <h4>Phone Number</h4>
                                    <p>+2 123 456 789<br>+2 987 654 3210</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="contact-item">
                                    <img src="template_web/images/contact/icon-4.svg" alt="">
                                    <h4>24 Support</h4>
                                    <p>Johndoefounder@gmail.com<br>Jassicaceo@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 col-12">
                    <div class="contact-heading">	
                        <h1>Write To Us</h1>
                    </div>
                    <div class="contact-info">
                        <form id="contact-form" action="{{route('contact')}}" method="post">
                        @csrf
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                        @endif
                            <div class="row">					
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Name*</label>
                                        <input type="text" name="name" class="video-form" id="name" placeholder="Your Name">							
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        <input type="email" name="email" class="video-form" id="email" placeholder="Your Email">							
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="content">Message*</label>
                                        <textarea class="text-area" name="content" id="content" placeholder="Type Message"></textarea>						
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <button type="submit" class="contact-btn btn-link">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>			
    <!--contact-us end-->
@endsection