<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" class="no-js" > <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" > <!--<![endif]-->
<head>
 <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <title>Pharmarket - {{App::getLocale()}}</title>

  <link rel="icon" type="image/png" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css" />

  <link rel="icon" type="image/png" href="{{ asset('front/images/logoapply.png') }}" />
   <!-- CSS FILES -->
   <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc2/css/bootstrap-glyphicons.css"/>
   <link rel="stylesheet" type="text/css" href="{{ asset('front/css/global.css') }}" media="screen" data-name="skins">
   <link rel="stylesheet" href="{{ asset('front/css/layout/wide.css') }}" data-name="layout">

   <link rel="stylesheet" href="{{ asset('front/css/fractionslider.css') }}"/>
   <link rel="stylesheet" href="{{ asset('front/css/style-fraction.css') }}"/>
   <link rel="stylesheet" href={{ asset('front/css/front.css')}}/>

   <link rel="stylesheet" type="text/css" href="{{ asset('front/css/switcher.css') }}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/menu.css') }}" media="screen" />
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63542056-3', 'auto');
  ga('send', 'pageview');

</script>
    @yield('header')
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
</head>
<body>



 @include('front.layout.menu')
 @include('front.layout.breadcrum')


 @yield('content')


 @include('front.layout.footer')

<!-- jQuery 2.1.3 -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
@yield('footer')


</body>
</html>
