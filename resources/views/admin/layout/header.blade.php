
<!-- Logo -->
<a href="{{ ucfirst(route('accueil')) }}" class="logo"><b>Pharmarket</b></a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
          <span class="hidden-xs">{{Auth::user()->pseudo}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image" />
            <p>
              {{Auth::user()->pseudo}}
              <small>Membre depuis le  {{Auth::user()->createddate}}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-right">
              <a href="{{route('user.logout')}}" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
