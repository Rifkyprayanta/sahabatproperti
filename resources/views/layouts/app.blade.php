<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Selio - Real Estate HTML Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color.css') }}">
</head>

<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


    <div class="wrapper">

        <header>

        @include('layouts.header')
            
        @include('layouts.navbar')

        </header><!--header end-->

        @include('layouts.signin_popup')
        
        @include('layouts.signup_popup')
        
        @include('layouts.heroes')

        @include('layouts.intro')

        @include('layouts.listproperty')

        <div class="alert alert-success" role="alert">
            <strong>Added to Favourites</strong> You can check your favourite items here <a href="#" class="alert-link">Favourite Items</a>.
            <a href="#" title="" class="close-alert"><i class="la la-close"></i></a>
        </div>

        @include('layouts.service')

        @include('layouts.city')

        <!-- <section id="map-container" class="fullwidth-home-map">
            <h3 class="vis-hid">Visible Heading</h3>
            <div id="map" data-map-zoom="9"></div>
        </section> -->

        @include('layouts.blogfront')

        <a href="#" title="">    
            <section class="cta section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="cta-text">
                                <h2>Discover a home you'll love to stay</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </a>

       

        @include('layouts.footer')

        


    </div><!--wrapper end-->






    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDVwc4veKudU0qjYrLrrQXacCkDkcy3AeQ"></script>
    <script src="{{ asset('assets/js/map-cluster/infobox.min.js') }}"></script>
    <script src="{{ asset('assets/js/map-cluster/markerclusterer.js') }}"></script>
    <script src="{{ asset('assets/js/map-cluster/maps.js') }}"></script>



</body>

</html>