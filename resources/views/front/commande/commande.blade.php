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
					Votre panier
			</div>
<!-- /Breadcrumb -->

										<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
					</div>
					<div class="row">
																		<div id="center_column" class="center_column col-xs-12 col-sm-12">


<h1 id="cart_title" class="page-heading">Récapitulatif de la commande
			<span class="heading-counter">Votre panier contient
			<span id="summary_products_quantity">1 produit</span>
		</span>
	</h1>






<!-- Steps -->
<ul class="step clearfix" id="order_step">
	<li class="step_current  first">
					<span><em>01.</em> Récapitulatif</span>
			</li>
	<li class="step_todo second">
					<span><em>02.</em> Connexion</span>
			</li>
	<li class="step_todo third">
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




	<p id="emptyCartWarning" class="alert alert-warning unvisible">Votre panier est vide</p>
			<div class="cart_last_product">
			<div class="cart_last_product_header">
				<div class="left">Dernier produit ajouté</div>
			</div>
			<a class="cart_last_product_img" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
				<img src="Commande%20-%20mirage_fichiers/robe-imprimee_002.jpg" alt="Robe imprimée">
			</a>
			<div class="cart_last_product_content">
				<p class="product-name">
					<a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">
						Robe imprimée
					</a>
				</p>
									<small>
						<a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">
							Taille : S, Couleur : Orange
						</a>
					</small>
							</div>
		</div>


	<div id="order-detail-content" class="table_block table-responsive">
		<table id="cart_summary" class="table table-bordered stock-management-on">
			<thead>
				<tr>
					<th class="cart_product first_item">Produit</th>
					<th class="cart_description item">Description</th>
																	<th class="cart_avail item text-center">Disponibilité</th>
										<th class="cart_unit item text-right">Prix unitaire</th>
					<th class="cart_quantity item text-center">Quantité</th>
					<th class="cart_delete last_item">&nbsp;</th>
					<th class="cart_total item text-right">Total</th>
				</tr>
			</thead>
			<tfoot>




															<tr class="cart_total_price">
							<td rowspan="3" colspan="2" id="cart_voucher" class="cart_voucher">
															</td>
							<td colspan="3" class="text-right">Total produits TTC :</td>
							<td colspan="2" class="price" id="total_product">31,20 €</td>
						</tr>
													<tr style="display: none;">
					<td colspan="3" class="text-right">
													Total papiers cadeaux TTC :											</td>
					<td colspan="2" class="price-discount price" id="total_wrapping">
																					0,00 €
																		</td>
				</tr>
									<tr class="cart_total_delivery unvisible">
						<td colspan="3" class="text-right">Frais de port</td>
						<td colspan="2" class="price" id="total_shipping">Livraison gratuite !</td>
					</tr>
								<tr class="cart_total_voucher unvisible">
					<td colspan="3" class="text-right">
																					Total bons d'achats (TTC)
																		</td>
					<td colspan="2" class="price-discount price" id="total_discount">
																									0,00 €
					</td>
				</tr>
								<tr class="cart_total_price">
					<td colspan="3" class="total_price_container text-right">
						<span>Total</span>
					</td>
											<td colspan="2" class="price" id="total_price_container">
							<span id="total_price">31,20 €</span>
						</td>
									</tr>
			</tfoot>
			<tbody>

					<tr id="product_3_13_0_0" class="cart_item last_item first_item address_0 odd">
	<td class="cart_product">
		<a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange"><img src="Commande%20-%20mirage_fichiers/robe-imprimee_002.jpg" alt="Robe imprimée" height="98" width="98"></a>
	</td>
	<td class="cart_description">
						<p class="product-name"><a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">Robe imprimée</a></p>
			<small class="cart_ref">Référence: demo_3</small>		<small><a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">Taille: S, Couleur: Orange</a></small>	</td>
			<td class="cart_avail"><span class="label label-success">En stock</span></td>
		<td class="cart_unit" data-title="Prix unitaire">
		<ul class="price text-right" id="product_price_3_13_0">
			            						<li class="price">31,20 €</li>
													</ul>
	</td>

	<td class="cart_quantity text-center">

				<input value="1" name="quantity_3_13_0_0_hidden" type="hidden">
				<input size="2" autocomplete="off" class="cart_quantity_input form-control grey" value="1" name="quantity_3_13_0_0" type="text">
				<div class="cart_quantity_button clearfix">
									<a rel="nofollow" class="cart_quantity_down btn btn-default button-minus" id="cart_quantity_down_3_13_0_0" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=3&amp;ipa=13&amp;id_address_delivery=0&amp;op=down&amp;token=1f7065c610135e396ad8a05ee4174399" title="Soustraire">
				<span><i class="icon-minus"></i></span>
				</a>
				                	<a rel="nofollow" class="cart_quantity_up btn btn-default button-plus" id="cart_quantity_up_3_13_0_0" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=3&amp;ipa=13&amp;id_address_delivery=0&amp;token=1f7065c610135e396ad8a05ee4174399" title="Ajouter"><span><i class="icon-plus"></i></span></a>
				</div>
						</td>
			<td class="cart_delete text-center" data-title="Delete">
					<div>
				<a rel="nofollow" title="Supprimer" class="cart_quantity_delete" id="3_13_0_0" href="http://localhost:8888/prestashop/panier?delete=1&amp;id_product=3&amp;ipa=13&amp;id_address_delivery=0&amp;token=1f7065c610135e396ad8a05ee4174399"><i class="icon-trash"></i></a>
			</div>
				</td>
		<td class="cart_total" data-title="Total">
		<span class="price" id="total_product_price_3_13_0">
												31,20 €									</span>
	</td>

</tr>


																				</tbody>
					</table>
	</div> <!-- end order-detail-content -->





		<div id="HOOK_SHOPPING_CART"></div>
	<p class="cart_navigation clearfix">
					<a style="" href="http://localhost:8888/prestashop/commande?step=1" class="button btn btn-default standard-checkout button-medium" title="Commander">
				<span>Commander<i class="icon-chevron-right right"></i></span>
			</a>
				<a href="http://localhost:8888/prestashop/" class="button-exclusive btn btn-default" title="Continuer mes achats">
			<i class="icon-chevron-left"></i>Continuer mes achats
		</a>
	</p>

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
