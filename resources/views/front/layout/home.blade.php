 <!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" > <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" > <!--<![endif]-->
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Pharmarket - {{App::getLocale()}}</title>
	<meta name="description" content="">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/global.css') }}" media="screen" data-name="skins">
    <link rel="stylesheet" href="{{ asset('front/css/layout/wide.css') }}" data-name="layout">

    <link rel="stylesheet" href="{{ asset('front/css/fractionslider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('front/css/style-fraction.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/switcher.css') }}" media="screen" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



  @include('front.layout.menu')



  @yield('content')


  @include('front.layout.footer')

<!-- jQuery 2.1.3 -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
@yield('footer')


</body>
</html>
