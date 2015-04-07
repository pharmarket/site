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
							<!-- Footer -->
				<div class="footer-container">
					<footer id="footer" class="container">
						<div class="row"><!-- Block Newsletter module-->
<div id="newsletter_block_left" class="block">
	<h4>Lettre d'informations</h4>
	<div class="block_content">
		<form action="//localhost:8888/prestashop/" method="post">
			<div class="form-group">
				<input class="inputNew form-control grey newsletter-input" id="newsletter-input" name="email" size="18" value="Saisissez votre adresse e-mail" type="text">
                <button type="submit" name="submitNewsletter" class="btn btn-default button button-small">
                    <span>ok</span>
                </button>
				<input name="action" value="0" type="hidden">
			</div>
		</form>
	</div>
</div>
<!-- /Block Newsletter module-->
<section id="social_block" class="pull-right">
	<ul>
					<li class="facebook">
				<a target="_blank" class="_blank" href="http://www.facebook.com/prestashop">
					<span>Facebook</span>
				</a>
			</li>
							<li class="twitter">
				<a target="_blank" class="_blank" href="http://www.twitter.com/prestashop">
					<span>Twitter</span>
				</a>
			</li>
							<li class="rss">
				<a target="_blank" class="_blank" href="http://www.prestashop.com/blog/en/">
					<span>RSS</span>
				</a>
			</li>
		                        	<li class="google-plus">
        		<a target="_blank" class="_blank" href="https://www.google.com/+prestashop">
        			<span>Google Plus</span>
        		</a>
        	</li>
                                	</ul>
    <h4>Nous suivre</h4>
</section>
<div class="clearfix"></div>
<!-- Block categories module -->
<section class="blockcategories_footer footer-block col-xs-12 col-sm-2">
	<h4>Catégories</h4>
	<div style="" class="category_footer toggle-footer">
		<div class="list">
			<ul style="display: block;" class="tree dynamized">

<li class="last">
	<span class="grower CLOSE"> </span><a href="http://localhost:8888/prestashop/3-femmes" title="Vous trouverez ici toutes les collections mode pour femmes.
 Cette catégorie regroupe tous les basiques de votre garde-robe et bien plus encore&nbsp;:
 chaussures, accessoires, T-shirts imprimés, robes élégantes et jeans pour femmes&nbsp;!">
		Femmes
	</a>
			<ul style="display: none;">

<li>
	<span class="grower CLOSE"> </span><a href="http://localhost:8888/prestashop/4-tops" title="Choisissez parmi une large sélection de T-shirts à manches courtes, longues ou 3/4, de tops, de débardeurs, de chemisiers et bien plus encore.
 Trouvez la coupe qui vous va le mieux&nbsp;!">
		Tops
	</a>
			<ul style="display: none;">

<li>
	<a href="http://localhost:8888/prestashop/5-t-shirts" title="Les must have de votre garde-robe&nbsp;: découvrez les divers modèles ainsi que les différentes
 coupes et couleurs de notre collection&nbsp;!">
		T-shirts
	</a>
	</li>


<li class="last">
	<a href="http://localhost:8888/prestashop/7-chemisiers" title="Coordonnez vos accessoires à vos chemisiers préférés, pour un look parfait.">
		Chemisiers
	</a>
	</li>

									</ul>
	</li>


<li class="last">
	<span class="grower CLOSE"> </span><a href="http://localhost:8888/prestashop/8-robes" title="Trouvez votre nouvelle pièce préférée parmi une large sélection de robes décontractées, d'été et de soirée&nbsp;!
 Nous avons des robes pour tous les styles et toutes les occasions.">
		Robes
	</a>
			<ul style="display: none;">

<li>
	<a href="http://localhost:8888/prestashop/9-robes-decontractees" title="Vous cherchez une robe pour la vie de tous les jours&nbsp;? Découvrez
 notre sélection de robes et trouvez celle qui vous convient.">
		Robes décontractées
	</a>
	</li>


<li>
	<a href="http://localhost:8888/prestashop/10-robes-soiree" title="Trouvez la robe parfaite pour une soirée inoubliable&nbsp;!">
		Robes de soirée
	</a>
	</li>


<li class="last">
	<a href="http://localhost:8888/prestashop/11-robes-ete" title="Courte, longue, en soie ou imprimée, trouvez votre robe d'été idéale&nbsp;!">
		Robes d'été
	</a>
	</li>

									</ul>
	</li>

									</ul>
	</li>


										</ul>
		</div>
	</div> <!-- .category_footer -->
</section>
<!-- /Block categories module -->
