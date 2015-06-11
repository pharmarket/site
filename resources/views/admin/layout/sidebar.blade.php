
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
        <li class="active"><a href="{{ route('admin.user.index') }}"><i class="fa fa-list"></i>Liste</a></li>
        <li><a href="{{ route('admin.user.create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
        <li><a href="{{ route('user.getImportCSV') }}"><i class="fa fa-plus-circle"></i>Import CSV</a></li>
        <li><a href="{{ route('user.getExportCSV') }}"><i class="fa fa-download"></i>Export CSV</a></li>
    </ul>
  </li>
  <li class="treeview">
      <a href="#">
          <i class="fa fa-leanpub"></i> <span>Fournisseur</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.fournisseur.index') }}"><i class="fa fa-list"></i>Liste fournisseur</a></li>
          <li><a href="{{ route('admin.fournisseur.create') }}"><i class="fa fa-plus-circle"></i>Ajouter fournisseur</a></li>
          <li><a href="{{ route('fournisseur.getExportCSV') }}"><i class="fa fa-download"></i>Export CSV</a></li>

      </ul>
  </li>

  <li class="treeview">
      <a href="#">

          <i class="fa fa-barcode"></i> <span>Commande</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.commande.index') }}"><i class="fa fa-list"></i>Liste</a></li>
          <li><a href="{{ route('commande.getExportCSV') }}"><i class="fa fa-download"></i>Export CSV</a></li>
      </ul>
  </li>


  <li class="treeview">
      <a href="#">
          <i class="fa fa-money"></i> <span>Achat</span> <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.vente.index') }}"><i class="fa fa-list"></i>Liste</a></li>
          <li><a href="{{ route('admin.vente.create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
          <li><a href="{{ URL::to('admin/exemplaire/create') }}"><i class="fa fa-plus-circle"></i>Ajouter exemplaire</a></li>
          <li><a href="{{ route('vente.getImportCSV') }}"><i class="fa fa-plus-circle"></i>Import CSV</a></li>
          <li><a href="{{ route('vente.getExportCSV') }}"><i class="fa fa-download"></i>Export CSV</a></li>
      </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-cubes"></i> <span>Gestion Produit</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li>
        <a href="#">
          <i class="fa fa-cubes"></i> <span>Produits</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ URL::to('admin/produit') }}"><i class="fa fa-list"></i>Liste produits</a></li>
          <li><a href="{{ URL::to('admin/produit/create') }}"><i class="fa fa-plus-circle"></i>Ajouter produit</a></li>
          <li><a href="{{ URL::to('admin/exemplaire') }}"><i class="fa fa-dashcube"></i>Exemplaires</a></li>
          <li><a href="{{ URL::to('admin/exemplaire/create') }}"><i class="fa fa-plus-circle"></i>Ajouter exemplaire</a></li>
          <li><a href="{{ URL::to('admin/produit/importCSV') }}"><i class="fa fa-plus-circle"></i>Import CSV</a></li>
          <li><a href="{{ URL::to('admin/produit/exportCSV') }}"><i class="fa fa-download"></i>Export CSV</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Catégorie</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ URL::to('admin/categorie') }}"><i class="fa fa-list"></i>Liste</a></li>
          <li><a href="{{ URL::to('admin/categorie/create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Posologie</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.posologie.index') }}"><i class="fa fa-list"></i>Liste</a></li>
          <li><a href="{{ route('admin.posologie.create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
          <li >
            <a href="#">
              <i class="fa fa-newspaper-o"></i> <span>Posologie Sexe</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li class="active"><a href="{{ route('admin.posologie_sex.index') }}"><i class="fa fa-list"></i>Liste</a></li>
              <li><a href="{{ route('admin.posologie_sex.create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-leanpub"></i> <span>Gestion des Pages</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
      <li >
          <a href="#">
              <i class="fa fa-tags"></i> <span>CGU</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class="active"><a href="{{ route('admin.cgu.index') }}"><i class="fa fa-list"></i>Liste</a></li>
          </ul>
      </li>

      <li>
          <a href="#">
              <i class="fa fa-shopping-cart"></i> <span>CGV</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
              <li class="active"><a href="{{ route('admin.cgv.index') }}"><i class="fa fa-list"></i>Liste</a></li>
          </ul>
      </li>




    <li class="treeview">
        <a href="#">
            <i class="fa fa-comments-o"></i> <span>Commentaire</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{ route('admin.commentaire.index') }}"><i class="fa fa-list"></i>Liste</a></li>
        </ul>
    </li>

    <li>
        <a href="#">
            <i class="fa fa-question-circle"></i> <span>FAQ</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="active"><a href="{{ route('admin.faq.index') }}"><i class="fa fa-list"></i>Liste</a></li>
            <li><a href="{{ route('admin.faq.create') }}"><i class="fa fa-plus-circle"></i>Ajouter</a></li>
        </ul>
    </li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-envelope"></i> <span>Demande de Contact</span> <i class="fa fa-angle-left pull-right"></i>
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
      <li>
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Inscrits</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('admin.newsletter_mail.index') }}"><i class="fa fa-list"></i>Liste d'email</a></li>
          <li><a href="{{ route('admin.newsletter_mail.create') }}"><i class="fa fa-plus-circle"></i>Ajouter un email</a></li>
        </ul>
      </li>
      <li class="active"><a href="{{ route('admin.newsletter.index') }}"><i class="fa fa-list"></i>Liste newsletter</a></li>
      <li><a href="{{ route('admin.newsletter.create') }}"><i class="fa fa-plus-circle"></i>Ajouter newsletter</a></li>
      <li><a href="{{ route('admin.newsletter.history') }}"><i class="fa fa-database"></i>Historique newsletter</a></li>
    </ul>
  </li>






</ul>
</section>
<!-- /.sidebar -->
