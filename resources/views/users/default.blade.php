<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
  	<link rel="stylesheet" href="css/flaticon.css"/>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <style>
    .icon-rotates {
  -moz-transition: all 1s linear;
  -webkit-transition: all 1s linear;
  transition: all 1s linear;
}

.icon-rotates.rotate {
  -moz-transition: rotate(180deg);
  -webkit-transition: rotate(180deg);
  transition: rotate(180deg);
}


.dropdown.open .icon-rotates {
  -webkit-transform: rotate(180deg);
  transform: rotate(180deg);
}
.ftco-footer {
      font-size: 14px;
      padding: 7em 0;
      color: #000000; }
      .ftco-footer .ftco-footer-logo {
        text-transform: uppercase;
        letter-spacing: .1em; }
      .ftco-footer .ftco-footer-widget h2 {
        font-weight: normal;
        margin-bottom: 20px;
        font-size: 16px;
        font-weight: 500; }
      .ftco-footer .ftco-footer-widget ul li {
        font-size: 14px;
        margin-bottom: 0px; }
        .ftco-footer .ftco-footer-widget ul li a {
          color: #000000; }
      .ftco-footer .ftco-footer-widget .btn-primary {
        border: 2px solid #fff !important; }
        .ftco-footer .ftco-footer-widget .btn-primary:hover {
          border: 2px solid #fff !important; }
    
    .ftco-footer-social li {
      list-style: none;
      margin: 0 10px 0 0;
      display: inline-block; }
      .ftco-footer-social li a {
        height: 50px;
        width: 50px;
        display: block;
        float: left;
        background: rgba(0, 0, 0, 0.02);
        border-radius: 50%;
        position: relative; }
        .ftco-footer-social li a span {
          position: absolute;
          font-size: 26px;
          top: 50%;
          left: 50%;
          -webkit-transform: translate(-50%, -50%);
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
          color: #000000; }
        .ftco-footer-social li a:hover {
          color: #000000; }

          .shopping-card {
	display: inline-block;
	position: relative;
}

.shopping-card span {
	position: absolute;
	top: -4px;
	left: 100%;
	height: 16px;
	min-width: 16px;
	color: #fff;
	font-size: 13px;
	background: #f51167;
	text-align: center;
	border-radius: 30px;
	padding: 0 2px;
	margin-left: -7px;
}
      </style>
    @yield('css')
</head>
<body>
    @include('users.partials.header');


    @yield('content')


   {{--  <footer class="ftco-footer ftco-section" style="background-color:#f8f9fa">
        @include('users.partials.footer');
    </footer> --}}
 
    <script src="{{ mix('/js/app.js') }}"></script>

    <script type="text/javascript" >
      $(document).ready(function () {
        /* $('.dropdown-toggle').dropdown() */
        console.log('ready')
     $('.multi-level-dropdown .dropdown-submenu > a').on("mouseenter", function(e) {
         var submenu = $(this);
         $('.multi-level-dropdown .dropdown-submenu .dropdown-menu').removeClass('show');
         submenu.next('.dropdown-menu').addClass('show');
         e.stopPropagation();
       });
     
       $('.multi-level-dropdown .dropdown').on("hidden.bs.dropdown", function() {
         // hide any open menus when parent closes
         $('.multi-level-dropdown .dropdown-menu.show').removeClass('show');
       });
     });

     
         </script>
         <script>
         /*  $(function () {
            $('#myList a:last-child').tab('show')
          }) */
        </script>

    @yield('js')
</body>
</html>