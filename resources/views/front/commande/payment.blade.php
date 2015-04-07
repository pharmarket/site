
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
					Votre méthode de paiement
			</div>
<!-- /Breadcrumb -->

										<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
					</div>
					<div class="row">
																		<div id="center_column" class="center_column col-xs-12 col-sm-12">






		<h1 class="page-heading">Choisissez votre méthode de paiement
					<span class="heading-counter">Votre panier contient
				<span id="summary_products_quantity">1 produit</span>
			</span>
			</h1>





<!-- Steps -->
<ul class="step clearfix" id="order_step">
	<li class="step_done first">
				<a href="http://localhost:8888/prestashop/commande">
			<em>01.</em> Récapitulatif
		</a>
			</li>
	<li class="step_done second">
				<a href="http://localhost:8888/prestashop/commande?step=1">
			<em>02.</em> Connexion
		</a>
			</li>
	<li class="step_done third">
				<a href="http://localhost:8888/prestashop/commande?step=1">
			<em>03.</em> Adresse
		</a>
			</li>
	<li class="step_done step_done_last four">
				<a href="http://localhost:8888/prestashop/commande?step=2">
			<em>04.</em> Livraison
		</a>
			</li>
	<li id="step_end" class="step_current last">
		<span><em>05.</em> Paiement</span>
	</li>
</ul>
<!-- /Steps -->



		<div class="paiement_block">
			<div id="HOOK_TOP_PAYMENT"></div>
															<div id="order-detail-content" class="table_block table-responsive">
							<table id="cart_summary" class="table table-bordered">
								<thead>
									<tr>
										<th class="cart_product first_item">Produit</th>
										<th class="cart_description item">Description</th>
																					<th class="cart_availability item text-center">Disponibilité</th>
																				<th class="cart_unit item text-right">Prix unitaire</th>
										<th class="cart_quantity item text-center">Quantité</th>
										<th class="cart_total last_item text-right">Total</th>
									</tr>
								</thead>
								<tfoot>
																														<tr class="cart_total_price">
												<td colspan="4" class="text-right">Total produits TTC :</td>
												<td colspan="2" class="price" id="total_product">31,20 €</td>
											</tr>
																												<tr class="cart_total_voucher" style="display:none">
										<td colspan="4" class="text-right">
																																				Total papiers cadeaux TTC :																																	</td>
										<td colspan="2" class="price-discount price" id="total_wrapping">
																																				0,00 €
																																	</td>
									</tr>
																			<tr class="cart_total_delivery">
											<td colspan="4" class="text-right">Frais de port</td>
											<td colspan="2" class="price" id="total_shipping">Livraison gratuite !</td>
										</tr>
																		<tr class="cart_total_voucher" style="display:none">
										<td colspan="4" class="text-right">
																																				Total bons d'achats (TTC)																																	</td>
										<td colspan="2" class="price-discount price" id="total_discount">
																																				0,00 €
																																	</td>
									</tr>
																													<tr class="cart_total_price">
											<td colspan="4" class="total_price_container text-right"><span>Total</span></td>
											<td colspan="2" class="price" id="total_price_container">
												<span id="total_price" data-selenium-total-price="31.2">31,20 €</span>
											</td>
										</tr>
																	</tfoot>

								<tbody>


										<tr id="product_3_13_0_5" class="cart_item address_5 odd">
	<td class="cart_product">
		<a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange"><img src="payment%20-%20mirage_fichiers/robe-imprimee_002.jpg" alt="Robe imprimée" height="98" width="98"></a>
	</td>
	<td class="cart_description">
						<p class="product-name"><a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">Robe imprimée</a></p>
			<small class="cart_ref">Référence: demo_3</small>		<small><a href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html#/taille-s/couleur-orange">Taille: S, Couleur: Orange</a></small>	</td>
			<td class="cart_avail"><span class="label label-success">En stock</span></td>
		<td class="cart_unit" data-title="Prix unitaire">
		<ul class="price text-right" id="product_price_3_13_5">
			            						<li class="price">31,20 €</li>
													</ul>
	</td>

	<td class="cart_quantity text-center">
					<span>
									1
							</span>
			</td>
		<td class="cart_total" data-title="Total">
		<span class="price" id="total_product_price_3_13_5">
												31,20 €									</span>
	</td>

</tr>



																																													</tbody>

															</table>
						</div> <!-- end order-detail-content -->
															<div id="HOOK_PAYMENT">
						<div class="row">
	<div class="col-xs-12">
		<p class="payment_module">
			<a class="bankwire" href="http://localhost:8888/prestashop/module/bankwire/payment" title="Payer par virement bancaire">
				Payer par virement bancaire <span>(le traitement de la commande sera plus long)</span>
			</a>
		</p>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
        <p class="payment_module">
            <a class="cheque" href="http://localhost:8888/prestashop/module/cheque/payment" title="Payer par chèque">
                Payer par chèque <span>(le traitement de la commande sera plus long)</span>
            </a>
        </p>
    </div>
</div>

					</div>
																		<p class="cart_navigation clearfix">
						<a href="http://localhost:8888/prestashop/commande?step=2" title="Précédent" class="button-exclusive btn btn-default">
							<i class="icon-chevron-left"></i>
							Continuer mes achats
						</a>
					</p>
							</div> <!-- end HOOK_TOP_PAYMENT -->
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
@endsection
