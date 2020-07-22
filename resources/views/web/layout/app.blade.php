
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from gambolthemes.net/natto-new-demo/index.html by HTTrack Website Copier/3.x XR&CO'2014, Tue, 03 Mar 2020 07:31:29 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Favicon -->
	<link href="{{url('template_web/images/fav.png')}}" rel="shortcut icon" type="image/x-icon"/>

    <title> @yield('title') </title>

    <!-- Bootstrap core CSS-->
    <link href="{{url('template_web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/style.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/responsive.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/mega.menu.css')}}" rel="stylesheet">
    <link href="{{url('template_web/css/owlslider.css')}}" rel="stylesheet">
    <link href="{{url('template_web/css/thumbnail.slider.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/datepicker.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/bootstrap-select.css')}}" rel="stylesheet">
	<link href="{{url('template_web/css/bootstrap-rating.css')}}" rel="stylesheet">

	<!-- Owl Carousel for this template-->
	<link href="{{url('template_web/vendor/OwlCarousel/assets/owl.carousel.css')}}" rel="stylesheet">
	{{-- <link href="{{url(template_web/vendor/OwlCarousel/assets/owl.theme.default.min.css)}}" rel="stylesheet"> --}}

    <!-- Fontawesome styles for this template-->
    <link href="{{url('template_web/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    @yield('css')

</head>

<body oncontextmenu="return false;">

    @include('web.layout.topbar')

    @yield('content')

    @include('web.layout.footer')

    <!--Bootstrap core JavaScript-->
    <script src="{{url('template_web/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('template_web/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!--Core plugin JavaScript-->
    <script src="{{url('template_web/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
	<!--Assect scripts for this page-->
	<script src="{{url('template_web/vendor/OwlCarousel/owl.carousel.js')}}"></script>
	<script src="{{url('template_web/js/owlslider.js')}}"></script>
	<script src="{{url('template_web/js/custom.js')}}"></script>
	<script src="{{url('template_web/js/thumbnail.slider.js')}}"></script>
	<script src="{{url('template_web/js/bootstrap-datepicker.js')}}"></script>
	<script src="{{url('template_web/js/bootstrap-select.js')}}"></script>
    @yield('script')

	<script>
    $('.ratings').rating(function(vote, event){
        let request = {
            rating: vote,
            product_id: $('#product_id').val()
        }
    });
	</script>
  </body>
</html>
