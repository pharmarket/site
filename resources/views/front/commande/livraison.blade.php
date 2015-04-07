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
					Transport :
			</div>
<!-- /Breadcrumb -->

										<div id="slider_row" class="row">
						<div id="top_column" class="center_column col-xs-12 col-sm-12"></div>
					</div>
					<div class="row">
																		<div id="center_column" class="center_column col-xs-12 col-sm-12">
				<div id="carrier_area">
		<h1 class="page-heading">Transport :</h1>




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
	<li class="step_done step_done_last third">
				<a href="http://localhost:8888/prestashop/commande?step=1">
			<em>03.</em> Adresse
		</a>
			</li>
	<li class="step_current four">
					<span><em>04.</em> Livraison</span>
			</li>
	<li id="step_end" class="step_todo last">
		<span><em>05.</em> Paiement</span>
	</li>
</ul>
<!-- /Steps -->



		<form id="form" action="http://localhost:8888/prestashop/commande" method="post" name="carrier_area">
<div class="order_carrier_content box">
			<div id="HOOK_BEFORECARRIER">

					</div>
					<div class="delivery_options_address">
															<p class="carrier_title">
															Choisissez une option de livraison pour l'adresse : Mon adresse
													</p>
						<div class="delivery_options">
															<div class="delivery_option item">
									<div>
										<table class="resume table table-bordered">
											<tbody><tr>
												<td class="delivery_option_radio">
													<div id="uniform-delivery_option_5_0" class="radio"><span class="checked"><input id="delivery_option_5_0" class="delivery_option_radio" name="delivery_option[5]" data-key="1," data-id_address="5" value="1," checked="checked" type="radio"></span></div>
												</td>
												<td class="delivery_option_logo">
																																																				</td>
												<td>
																																										<strong>mirage</strong>
																																											<br>Délai de livraison :&nbsp;Retrait en magasin
																																																					<br>
																																													<span class="best_grade best_grade_price best_grade_speed">Le meilleur prix et la livraison la plus rapide</span>
																																																						</td>
												<td class="delivery_option_price">
													<div class="delivery_option_price">
																													gratuit
																											</div>
												</td>
											</tr>
										</tbody></table>
										</div></div> <!-- end delivery_option -->								<div class="delivery_option alternate_item">
									<div>
										<table class="resume table table-bordered">
											<tbody><tr>
												<td class="delivery_option_radio">
													<div id="uniform-delivery_option_5_1" class="radio"><span><input id="delivery_option_5_1" class="delivery_option_radio" name="delivery_option[5]" data-key="2," data-id_address="5" value="2," type="radio"></span></div>
												</td>
												<td class="delivery_option_logo">
																																										<img src="livraison%20-%20mirage_fichiers/2.jpg" alt="My carrier">
																																							</td>
												<td>
																																										<strong>My carrier</strong>
																																											<br>Délai de livraison :&nbsp;Livraison le lendemain&nbsp;!
																																																					<br>
																																							</td>
												<td class="delivery_option_price">
													<div class="delivery_option_price">
																																																														2,40 € TTC
																																																										</div>
												</td>
											</tr>
										</tbody></table>
										</div></div> <!-- end delivery_option --></div> <!-- end delivery_options --><div class="hook_extracarrier" id="HOOK_EXTRACARRIER_5"></div></div> <!-- end delivery_options_address --><div id="extra_carrier" style="display: none;"></div>																										<p class="carrier_title">Conditions générales de vente</p>
				<p class="checkbox">
					<div id="uniform-cgv" class="checker"><span><input name="cgv" id="cgv" value="1" type="checkbox"></span></div>
					<label for="cgv">J'ai lu les conditions générales de vente et j'y adhère sans réserve.</label>
					<a href="http://localhost:8888/prestashop/content/3-conditions-utilisation?content_only=1" class="iframe" rel="nofollow">(Lire les Conditions générales de vente)</a>
				</p>
					</div> <!-- end delivery_options_address -->
						<p class="cart_navigation clearfix">
					<input name="step" value="3" type="hidden">
					<input name="back" value="" type="hidden">
																		<a href="http://localhost:8888/prestashop/commande?step=1" title="Précédent" class="button-exclusive btn btn-default">
								<i class="icon-chevron-left"></i>
								Continuer mes achats
							</a>
																						<button style="" type="submit" name="processCarrier" class="button btn btn-default standard-checkout button-medium">
							<span>
								Commander
								<i class="icon-chevron-right right"></i>
							</span>
						</button>
									</p>
			</form>
	</div> <!-- end carrier_area -->
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
