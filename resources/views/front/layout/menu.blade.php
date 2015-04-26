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
                          <h1><a href="index.html"><img src="front/images/Logo-pharmarket.jpg" alt="Logo pharmarket" style="height:50px;"/></a></h1>
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

                          <li><a href="contact">{{ Lang::get('menu.contact') }}</a></li>

                      </ul>
                      <div class="dropdown" style="float:right; height:43px;">
                        <button class="btn btn-default dropdown-toggle" style="height:43px;" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                          {{ Lang::get('menu.langactiv') }}
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="lang/fr">{{ Lang::get('menu.french') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="lang/en">{{ Lang::get('menu.english') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="lang/es">{{ Lang::get('menu.spanish') }}</a></li>
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="lang/de">{{ Lang::get('menu.deutschland') }}</a></li>
                        </ul>
                      </div>
                  </div>
              </div><!--/.row -->
          </div><!--/.container -->
      </div>
  </header>
<!--End Header-->
