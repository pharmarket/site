
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- Sidebar user panel -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{asset(Auth::user()->avatar)}}" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
      <p>{{Auth::user()->fullname}}</p>

      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="treeview">
      <a href="#">
        <i class="fa fa-user"></i> <span>Utilisateur</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i>Liste</a></li>
        <li><a href="index2.html"><i class="fa fa-circle-o"></i>Ajouter</a></li>
      </ul>
    </li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-envelope"></i> <span>Contact</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li><a href="{{ route('admin.contact.index') }}"><i class="fa fa-list"></i>Liste</a></li>
      </ul>
  </li>
  <li class="treeview">
      <a href="#">
        <i class="fa fa-newspaper-o"></i> <span>Newsletter</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="active"><a href="{{ route('admin.newsletter_mail.index') }}"><i class="fa fa-list"></i>Liste mail</a></li>
        <li><a href="{{ route('admin.newsletter_mail.create') }}"><i class="fa fa-plus-circle"></i>Ajouter mail</a></li>
      </ul>
    </li>
</ul>
</section>
<!-- /.sidebar -->
