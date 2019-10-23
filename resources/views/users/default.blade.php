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
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	@yield('css')

</head>
<body>
    @include('users.partials.header');
    @yield('content')
 
    <script src="{{ mix('/js/app.js') }}"></script>
    <script type="text/javascript" >
      $(document).ready(function () {
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
    @yield('js')
</body>
</html>