<!--Start Header-->
  <header id="header">
      <!-- LOGO bar -->
      <div id="logo-bar" class="clearfix">
          <!-- Container -->
          <div class="container">
              <div class="row">
                  <!-- Logo / Mobile Menu -->
                  <div class="col-xs-12">
                      <div id="logo">
                          <h1><a href="index.html"><img src="{{ asset('front/images/Logo-pharmarket.jpg') }}" alt="Logo pharmarket" style="height:50px;"/></a></h1>
                      </div>
                      <form class="navbar-form navbar-right">
              <div class="form-group">
                <input placeholder="{{ Lang::get('menu.email') }}" class="form-control" type="text">
              </div>
              <div class="form-group">
                <input placeholder="{{ Lang::get('menu.password') }}" class="form-control" type="password">
              </div>
              <button type="submit" class="btn btn-success">{{ Lang::get('menu.submit') }}</button>
            </form>
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
                          <li class="active"><a href="/">{{ Lang::get('menu.home') }}</a>
                          </li>

                          <li><a href="#">{{ Lang::get('menu.catalog') }}</a>
                              <ul class="dropdown-menu">
                                  <li><a href="category">{{ Lang::get('menu.category') }}</a></li>
                                  <li><a href="category/new">{{ Lang::get('menu.new') }}</a></li>
                                  <li><a href="category/top">{{ Lang::get('menu.top') }}</a></li>
                              </ul>
                          </li>
                          <li><a href="forum">{{ Lang::get('menu.forum') }}</a>

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
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= url(sprintf($changeLocaleUrl, 'fr')) ?>">{{ Lang::get('menu.french') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= url(sprintf($changeLocaleUrl, 'en')) ?>">{{ Lang::get('menu.english') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= url(sprintf($changeLocaleUrl,'es')) ?>">{{ Lang::get('menu.spanish') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="<?= url(sprintf($changeLocaleUrl, 'de')) ?>">{{ Lang::get('menu.deutschland') }}</a></li>
                        </ul>
                      </div>
                  </div>
              </div><!--/.row -->
          </div><!--/.container -->
      </div>
  </header>
<!--End Header-->
