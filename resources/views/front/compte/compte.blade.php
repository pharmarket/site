@extends('front.layout.app')
@extends('front.layout.menu')
@section('content')


							</div>
						</div>
					</div>
				</header>
			</div>
			<div class="columns-container">
				<div id="columns" class="container">

<!-- Breadcrumb -->
<div class="breadcrumb clearfix">
	<a class="home" href="http://localhost:8888/prestashop/" title="retour à Accueil"><i class="icon-home"></i></a>
			<span class="navigation-pipe">&gt;</span>
					Mon compte
			</div>
<!-- /Breadcrumb -->

										<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
					</div>
					<div class="row">
																		<div id="center_column" class="center_column col-xs-12 col-sm-12">


<h1 class="page-heading">Mon compte</h1>
	<p class="alert alert-success">
		Votre compte est maintenant créé.
	</p>
<p class="info-account">Bienvenue sur votre page d'accueil. Vous pouvez y gérer vos informations personnelles ainsi que vos commandes.</p>
<div class="row addresses-lists">
	<div class="col-xs-12 col-sm-6 col-lg-4">
		<ul class="myaccount-link-list">
                        <li><a href="http://localhost:8888/prestashop/adresse" title="Ajouter ma première adresse"><i class="icon-building"></i><span>Ajouter ma première adresse</span></a></li>
                        <li><a href="http://localhost:8888/prestashop/historique-commandes" title="Commandes"><i class="icon-list-ol"></i><span>Historique et détails de mes commandes</span></a></li>
                        <li><a href="http://localhost:8888/prestashop/avoirs" title="Avoirs"><i class="icon-file-o"></i><span>Mes avoirs</span></a></li>
            <li><a href="http://localhost:8888/prestashop/adresses" title="Adresses"><i class="icon-building"></i><span>Mes adresses</span></a></li>
            <li><a href="http://localhost:8888/prestashop/identite" title="Informations"><i class="icon-user"></i><span>Mes informations personnelles</span></a></li>
        </ul>
	</div>
</div>
<ul class="footer_links clearfix">
<li><a class="btn btn-default button button-small" href="http://localhost:8888/prestashop/" title="Accueil"><span><i class="icon-chevron-left"></i> Accueil</span></a></li>
</ul>
					</div><!-- #center_column -->
										</div><!-- .row -->
				</div><!-- #columns -->
			</div><!-- .columns-container -->
			@endsection
