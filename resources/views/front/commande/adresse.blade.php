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
					Adresses
			</div>
<!-- /Breadcrumb -->

										<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
					</div>
					<div class="row">
																		<div id="center_column" class="center_column col-xs-12 col-sm-12">
					<h1 class="page-heading">Adresses</h1>




<!-- Steps -->
<ul class="step clearfix" id="order_step">
	<li class="step_done first">
				<a href="http://localhost:8888/prestashop/commande">
			<em>01.</em> Récapitulatif
		</a>
			</li>
	<li class="step_done step_done_last second">
				<a href="http://localhost:8888/prestashop/commande?step=1">
			<em>02.</em> Connexion
		</a>
			</li>
	<li class="step_current third">
					<span><em>03.</em> Adresse</span>
			</li>
	<li class="step_todo four">
					<span><em>04.</em> Livraison</span>
			</li>
	<li id="step_end" class="step_todo last">
		<span><em>05.</em> Paiement</span>
	</li>
</ul>
<!-- /Steps -->



		<form action="http://localhost:8888/prestashop/commande" method="post">
<div class="addresses clearfix">
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="address_delivery select form-group selector1">
				<label for="id_address_delivery">Choisissez une adresse de livraison :</label>
				<div style="width: 267px;" id="uniform-id_address_delivery" class="selector"><span style="width: 257px; -moz-user-select: none;">
							Mon adresse
						</span><select name="id_address_delivery" id="id_address_delivery" class="address_select form-control">
											<option value="5" selected="selected">
							Mon adresse
						</option>
									</select></div><span class="waitimage"></span>
			</div>
			<p class="checkbox addressesAreEquals">
				<div id="uniform-addressesAreEquals" class="checker"><span class="checked"><input name="same" id="addressesAreEquals" value="1" checked="checked" type="checkbox"></span></div>
				<label for="addressesAreEquals">Utiliser la même adresse pour la facturation</label>
			</p>
		</div>
		<div class="col-xs-12 col-sm-6">
			<div id="address_invoice_form" class="select form-group selector1" style="display: none;">
									<a href="http://localhost:8888/prestashop/adresse?back=order.php%3Fstep%3D1&amp;select_address=1" title="Ajouter" class="button button-small btn btn-default">
						<span>
							Ajouter une nouvelle adresse
							<i class="icon-chevron-right right"></i>
						</span>
					</a>
							</div>
		</div>
	</div> <!-- end row -->
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<ul class="address item box" id="address_delivery"><li class="address_title"><h3 class="page-subheading">Votre adresse de livraison</h3></li><li class="address_firstname address_lastname">Test test</li><li class="address_address1">dfs</li><li class="address_address2">dfs</li><li class="address_postcode address_city">99100 pfmf</li><li class="address_country_name">France</li><li class="address_phone">01001010000</li><li class="address_update"><a class="button button-small btn btn-default" href="http://localhost:8888/prestashop/adresse?back=order.php%3Fstep%3D1&amp;id_address=5" title="Mettre à jour"><span>Mettre à jour<i class="icon-chevron-right right"></i></span></a></li></ul>
		</div>
		<div class="col-xs-12 col-sm-6">
			<ul class="address alternate_item box" id="address_invoice"><li class="address_title"><h3 class="page-subheading">Votre adresse de facturation</h3></li><li class="address_firstname address_lastname">Test test</li><li class="address_address1">dfs</li><li class="address_address2">dfs</li><li class="address_postcode address_city">99100 pfmf</li><li class="address_country_name">France</li><li class="address_phone">01001010000</li><li class="address_update"><a class="button button-small btn btn-default" href="http://localhost:8888/prestashop/adresse?back=order.php%3Fstep%3D1&amp;id_address=5" title="Mettre à jour"><span>Mettre à jour<i class="icon-chevron-right right"></i></span></a></li></ul>
		</div>
	</div> <!-- end row -->
	<p class="address_add submit">
		<a href="http://localhost:8888/prestashop/adresse?back=order.php%3Fstep%3D1" title="Ajouter" class="button button-small btn btn-default">
			<span>Ajouter une nouvelle adresse<i class="icon-chevron-right right"></i></span>
		</a>
	</p>
			<div id="ordermsg" class="form-group">
			<label>Si vous voulez nous laisser un message à propos de votre commande, merci de bien vouloir le renseigner dans le champ ci-contre</label>
			<textarea class="form-control" cols="60" rows="6" name="message"></textarea>
		</div>
	</div> <!-- end addresses -->
			<p class="cart_navigation clearfix">
				<input class="hidden" name="step" value="2" type="hidden">
				<input name="back" value="" type="hidden">
				<a href="http://localhost:8888/prestashop/commande" title="Précédent" class="button-exclusive btn btn-default">
					<i class="icon-chevron-left"></i>
					Continuer mes achats
				</a>
				<button type="submit" name="processAddress" class="button btn btn-default button-medium">
					<span>Commander<i class="icon-chevron-right right"></i></span>
				</button>
			</p>
		</form>
					</div><!-- #center_column -->
										</div><!-- .row -->
				</div><!-- #columns -->
			</div><!-- .columns-container -->



				@stop
