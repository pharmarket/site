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
  <!--Start Header-->
  <header id="header">
        <!-- LOGO bar -->
        <div id="logo-bar" class="clearfix">
              <!-- Container -->
              <div class="container">
                    <div class="row">
                        <!-- Logo / Mobile Menu -->
                          <div class="col-xs-12">
                                      <form id="logo">
                                                        <h1><a href="{{route('home')}}"><img src="{{ asset('front/images/Logo-pharmarket.jpg') }}" alt="Logo pharmarket" style="height:50px;"/></a></h1>
                                      </form>
                                      @if(Auth::check())
                                                        <div class="navbar-form navbar-right">
                                                                          <a href="{{route('user.account')}}" style="margin-right:10px;">
                                                                                            <img src="{{asset(Auth::user()->avatar)}}" width="30px;" height="30px;" />
                                                                                            {{\Auth::user()->pseudo}}
                                                                          </a>
                                                                          <a href="{{route('user.logout')}}" class="btn btn-success">{{ Lang::get('menu.logout') }}</a>
                                                        </div>
                                      @else
                                                        {!! Form::open(array('url' => route('user.login'), 'class'=> 'navbar-form navbar-right', 'role'=>'form', 'method'=>'POST')) !!}
                                                                          <div class="form-group">
                                                                                            {!! Form::email('mail', null, ["class"=>"form-control", 'placeholder'=> Lang::get('menu.email')]); !!}
                                                                          </div>
                                                                          <div class="form-group">
                                                                                            {!! Form::password('password', ["class"=>"form-control",  "value"=>old('password'), 'placeholder'=>Lang::get('menu.password')]); !!}
                                                                          </div>
                                                                          <button type="submit" class="btn btn-success">{{ Lang::get('user.login') }}</button>
                                                                          <a href="{{route('user.suscribe')}}" class="btn btn-success">{{ Lang::get('menu.suscribe') }}</a >
                                                        {!! Form::close() !!}
                                      @endif
                          </div>
                    </div>
              </div>
              <!-- Container / End -->
        </div>
        <!--LOGO bar / End-->

        <!-- Navigation
    ================================================== -->
        <div class="navbar navbar-default navbar-static-top" role="navigation">
              <div class="container">
                    <div class="row">
                          <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                </button>
                          </div>
                          <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                      <li >
                                            <a href="{{route('home')}}">{{ Lang::get('menu.home') }}</a>
                                      </li>

                                      <li><a href="#">{{ Lang::get('menu.catalog') }}</a>
                                            <ul class="dropdown-menu">
                                                  <li><a href="category">{{ Lang::get('menu.category') }}</a></li>
                                                  <li><a href="category/new">{{ Lang::get('menu.new') }}</a></li>
                                                  <li><a href="category/top">{{ Lang::get('menu.top') }}</a></li>
                                            </ul>
                                      </li>
                                      <li class="active" >
                                            <a href="forum">{{ Lang::get('menu.forum') }}</a>
                                      </li>
                                      <li><a href="<?= route('contact'); ?>">{{ Lang::get('menu.contact') }}</a></li>
                                </ul>
                                <div class="dropdown" id="dropdown_panier" style="float:right;">
                                      <button class="btn btn-default dropdown-toggle" style="height:43px;" type="button" id="select_panier" data-toggle="dropdown" aria-expanded="true">
                                            {{ Lang::get('menu.basket') }} ({{ Cart::count() }} {{Lang::choice('menu.product', Cart::count())}} )
                                            @if(Cart::count() > 0) <span class="caret"></span> @endif
                                      </button>
                                      @if(Cart::count() > 0)
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="select_panier" style="padding:20px;width:200px;">
                                                  @foreach(Cart::content() as $row)
                                                        <li role="presentation">
                                                              <strong>{{$row->qty }} * {{$row->name }}: {{$row->subtotal }}{{ Lang::get('menu.devise') }}
                                                              <a href="{{ route('basket.destroy', $row->rowid) }}" style="border:none;display:inline;background: none;"><i class="fa fa-times"></i></a>
                                                        </li>
                                                  @endforeach
                                                  <li role="presentation">{{ Lang::get('menu.total')  }}: {{ Cart::total() }}{{ Lang::get('menu.devise') }}</li>
                                                  <li>
                                                        <a href="{{ route('basket.index') }}"><button style="width:100%;">{{ Lang::get('menu.purchase')  }}</button></a>
                                                  </li>
                                            </ul>
                                      @endif
                                </div>
                                <div class="dropdown" style="float:right;">
                                      <button class="btn btn-default dropdown-toggle" style="height:43px;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                            {{ Lang::get('menu.langactiv') }}
                                            <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                      @foreach(Config::get('app.locales') as $key => $langue)
                                            <li role=><a role="menuitem" tabindex="-1" href="{{route('user.language', $key)}}">{{ $langue }}</a></li>
                                      @endforeach
                                      </ul>
                                </div>
                          </div>
                    </div><!--/.row -->
              </div><!--/.container -->
        </div>
  </header>
  <!--End Header-->

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
