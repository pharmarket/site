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
            <h1><a href="{{route('home')}}"><img src="{{ asset('front/images/logo.png') }}" alt="Logo pharmarket" style="height:50px;"/></a></h1>
          </form>
          @if(Auth::check())
            <div class="navbar-form navbar-right">
              <a href="{{route('user.home')}}" style="margin-right:10px;">
                <img src="{{asset(Auth::user()->avatar)}}" width="30px;" height="30px;" />
                {{\Auth::user()->pseudo}}
              </a>
              <div class="form-group">
                <a href="{{route('user.logout')}}" class="btn btn-default form-control btn-lg">{{ Lang::get('menu.logout') }}</a>
            </div>
            </div>
          @else
            {!! Form::open(array('url' => route('user.login'), 'class'=> 'navbar-form navbar-right', 'role'=>'form', 'method'=>'POST')) !!}
              <div class="form-group">
                {!! Form::email('mail', null, ["class"=>"form-control", 'placeholder'=> Lang::get('menu.email')]); !!}
              </div>
              <div class="form-group">
                {!! Form::password('password', ["class"=>"form-control",  "value"=>old('password'), 'placeholder'=>Lang::get('menu.password')]); !!}
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-default form-control btn-lg">{{ Lang::get('user.login') }}</button>
              </div>
              <div class="form-group">
                <a href="{{route('user.suscribe')}}" class="btn btn-default form-control btn-lg">{{ Lang::get('menu.suscribe') }}</a >
              </div>
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
            <li class="active">
              <a href="{{route('home')}}">{{ Lang::get('menu.home') }}</a>
            </li>

            <li>
              <a href="{{route('produit.callCategorie')}}">{{ Lang::get('menu.catalog') }}</a>
            </li>


            <li class="dropdown">
              <a id="dLabel" role="button" data-toggle="dropdown" class="btn" data-target="#" href="#">
                {{ Lang::get('menu.products') }}
              </a>
              <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                @foreach(\App\Produit_categorie::menu() as $categorie)
                  @if($categorie->langue->label == Lang::get('menu.langactiv'))
                    <li class="dropdown-submenu">
                      <a tabindex="-1" href="#">{{ $categorie->nom }}</a>
                      <ul class="dropdown-menu">
                        @foreach($categorie->sous_categorie as $souscategorie)
                          @if($souscategorie->langue->label == Lang::get('menu.langactiv'))
                              <li><a tabindex="-1" href="{{route('produit.callCategorie', $souscategorie->id)}}">{{ $souscategorie->nom }}</a></li>
                          @endif
                        @endforeach
                      </ul>
                    </li>
                  @endif
                @endforeach
              </ul>
            </li>

            <li>
              <a href="{{URL::to('forum')}}">{{ Lang::get('menu.forum') }}</a>
            </li>
            <li>
              <a href="<?= route('contact'); ?>">{{ Lang::get('site.contact') }}</a>
            </li>
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
                <li role="presentation">
                  {{ Lang::get('menu.total')  }}: {{ Cart::total() }}{{ Lang::get('menu.devise') }}
                  </li>
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
              <?php $count = Cart::count() ?>
              @if(empty($count))
                @foreach(Config::get('app.locales') as $key => $langue)
                  <li role=><a role="menuitem" tabindex="-1" href="{{route('user.language', $key)}}">{{ $langue }}</a></li>
                @endforeach
              @endif
            </ul>
          </div>
        </div>
      </div><!--/.row -->
    </div><!--/.container -->
  </div>
</header>
<!--End Header-->
