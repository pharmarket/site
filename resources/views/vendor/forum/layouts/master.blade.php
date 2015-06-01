<!doctype html>
<html lang="en">
<head>

    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- CSS FILES -->
      <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"/>
      <link rel="stylesheet" type="text/css" href="{{ asset('front/css/global.css') }}" media="screen" data-name="skins">
      <link rel="stylesheet" href="{{ asset('front/css/layout/wide.css') }}" data-name="layout">

      <link rel="stylesheet" href="{{ asset('front/css/fractionslider.css') }}"/>
      <link rel="stylesheet" href="{{ asset('front/css/style-fraction.css') }}"/>

      <link rel="stylesheet" type="text/css" href="{{ asset('front/css/switcher.css') }}" media="screen" />
       @yield('header')
  	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    	<!--[if lt IE 9]>
    		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <title>{!! trans('forum::base.home_title') !!}</title>
</head>
<body>
  @include('front.layout.menu')

    <div class="container">
        @include('forum::partials.alerts')

        @yield('content')
    </div>

    <script>
    $('a[data-confirm]').click(function(event) {
        if (!confirm('{!! trans('forum::base.generic_confirm') !!}')) {
            event.stopImmediatePropagation();
            event.preventDefault();
        }
    });
    $('[data-method]:not(.disabled)').click(function(event) {
        $('<form action="' + $(this).attr('href') + '" method="POST">' +
        '<input type="hidden" name="_method" value="' + $(this).data('method') + '">' +
        '<input type="hidden" name="_token" value="{!! Session::getToken() !!}"' +
        '</form>').submit();

        event.preventDefault();
    });
    </script>
</body>
</html>
