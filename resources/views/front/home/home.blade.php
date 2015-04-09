
@extends('front.layout.app')


@section('content')


<div class="row">
	<div id="center_column" class="center_column col-xs-12 col-sm-12">
		<ul id="home-page-tabs" class="nav nav-tabs clearfix">
			<li class="active"><a data-toggle="tab" href="#homefeatured" class="homefeatured">Populaire</a></li><li><a data-toggle="tab" href="#blockbestsellers" class="blockbestsellers">Meilleures Ventes</a></li><li><a data-toggle="tab" href="#blockspecials" class="blockspecials">Promotions</a></li>

		</ul>
		<div class="tab-content">



			<!-- Products list -->
			<ul id="homefeatured" class="product_list grid row homefeatured tab-pane active">



				<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
					<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
						<div class="left-block">
							<div class="product-image-container">
								<a class="product_img_link" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="T-shirt délavé à manches courtes" itemprop="url">
									<img class="replace-2x img-responsive" src="mirage_fichiers/t-shirt-delave-manches-courtes.jpg" alt="T-shirt délavé à manches courtes" title="T-shirt délavé à manches courtes" itemprop="image" height="250" width="250">
								</a>
								<div class="quick-view-wrapper-mobile">
									<a class="quick-view-mobile" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" rel="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
										<i class="icon-eye-open"></i>
									</a>
								</div>
								<a class="quick-view" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" rel="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
									<span>Aperçu rapide</span>
								</a>
								<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
									<span itemprop="price" class="price product-price">
										19,81 €									</span>
										<meta itemprop="priceCurrency" content="EUR">
										<link itemprop="availability" href="http://schema.org/InStock">En stock

									</div>
									<a class="new-box" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
										<span class="new-label">Nouveau</span>
									</a>
								</div>


							</div>
							<div class="right-block">
								<h5 itemprop="name">
									<a class="product-name" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="T-shirt délavé à manches courtes" itemprop="url">
										T-shirt délavé à manches courtes
									</a>
								</h5>

								<p class="product-desc" itemprop="description">
									T-shirt délavé à manches courtes et col rond. Matière douce et
									extensible pour un confort inégalé. Pour un look estival, portez-le avec
									un chapeau de paille&nbsp;!
								</p>
								<div class="content_price">
									<span class="price product-price">
										19,81 €							</span>


									</div>
									<div style="display: none;" class="button-container">
										<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=1&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="1" data-minimal_quantity="1">
											<span>Ajouter au panier</span>
										</a>
										<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="Afficher">
											<span>Détails</span>
										</a>
									</div>
									<div class="product-flags">
									</div>
									<span class="availability">
										<span class="available-now">
											En stock									</span>
										</span>
									</div>
								</div><!-- .product-container> -->
							</li>



							<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-item-of-mobile-line">
								<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
									<div class="left-block">
										<div class="product-image-container">
											<a class="product_img_link" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Chemisier" itemprop="url">
												<img class="replace-2x img-responsive" src="mirage_fichiers/chemisier.jpg" alt="Chemisier" title="Chemisier" itemprop="image" height="250" width="250">
											</a>
											<div class="quick-view-wrapper-mobile">
												<a class="quick-view-mobile" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" rel="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
													<i class="icon-eye-open"></i>
												</a>
											</div>
											<a class="quick-view" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" rel="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
												<span>Aperçu rapide</span>
											</a>
											<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
												<span itemprop="price" class="price product-price">
													32,40 €									</span>
													<meta itemprop="priceCurrency" content="EUR">
													<link itemprop="availability" href="http://schema.org/InStock">En stock

												</div>
												<a class="new-box" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
													<span class="new-label">Nouveau</span>
												</a>
											</div>


										</div>
										<div class="right-block">
											<h5 itemprop="name">
												<a class="product-name" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Chemisier" itemprop="url">
													Chemisier
												</a>
											</h5>

											<p class="product-desc" itemprop="description">
												Chemisier à manches courtes drapées, pour un style féminin et élégant.
											</p>
											<div class="content_price">
												<span class="price product-price">
													32,40 €							</span>


												</div>
												<div style="display: none;" class="button-container">
													<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=2&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="2" data-minimal_quantity="1">
														<span>Ajouter au panier</span>
													</a>
													<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Afficher">
														<span>Détails</span>
													</a>
												</div>
												<div class="product-flags">
												</div>
												<span class="availability">
													<span class="available-now">
														En stock									</span>
													</span>
												</div>
											</div><!-- .product-container> -->
										</li>



										<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-item-of-tablet-line first-item-of-mobile-line">
											<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
												<div class="left-block">
													<div class="product-image-container">
														<a class="product_img_link" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Robe imprimée" itemprop="url">
															<img class="replace-2x img-responsive" src="mirage_fichiers/robe-imprimee_002.jpg" alt="Robe imprimée" title="Robe imprimée" itemprop="image" height="250" width="250">
														</a>
														<div class="quick-view-wrapper-mobile">
															<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
																<i class="icon-eye-open"></i>
															</a>
														</div>
														<a class="quick-view" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
															<span>Aperçu rapide</span>
														</a>
														<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
															<span itemprop="price" class="price product-price">
																31,20 €									</span>
																<meta itemprop="priceCurrency" content="EUR">
																<link itemprop="availability" href="http://schema.org/InStock">En stock

															</div>
															<a class="new-box" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
																<span class="new-label">Nouveau</span>
															</a>
														</div>


													</div>
													<div class="right-block">
														<h5 itemprop="name">
															<a class="product-name" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Robe imprimée" itemprop="url">
																Robe imprimée
															</a>
														</h5>

														<p class="product-desc" itemprop="description">
															Robe imprimée 100&nbsp;% coton. Haut rayé noir et blanc et bas composé d'une jupe patineuse taille haute.
														</p>
														<div class="content_price">
															<span class="price product-price">
																31,20 €							</span>


															</div>
															<div style="display: none;" class="button-container">
																<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=3&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="3" data-minimal_quantity="1">
																	<span>Ajouter au panier</span>
																</a>
																<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Afficher">
																	<span>Détails</span>
																</a>
															</div>
															<div class="product-flags">
															</div>
															<span class="availability">
																<span class="available-now">
																	En stock									</span>
																</span>
															</div>
														</div><!-- .product-container> -->
													</li>



													<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-in-line first-item-of-tablet-line last-item-of-mobile-line">
														<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
															<div class="left-block">
																<div class="product-image-container">
																	<a class="product_img_link" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html" title="Robe imprimée" itemprop="url">
																		<img class="replace-2x img-responsive" src="mirage_fichiers/robe-imprimee.jpg" alt="Robe imprimée" title="Robe imprimée" itemprop="image" height="250" width="250">
																	</a>
																	<div class="quick-view-wrapper-mobile">
																		<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html">
																			<i class="icon-eye-open"></i>
																		</a>
																	</div>
																	<a class="quick-view" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html">
																		<span>Aperçu rapide</span>
																	</a>
																	<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																		<span itemprop="price" class="price product-price">
																			61,19 €									</span>
																			<meta itemprop="priceCurrency" content="EUR">
																			<link itemprop="availability" href="http://schema.org/InStock">En stock

																		</div>
																		<a class="new-box" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html">
																			<span class="new-label">Nouveau</span>
																		</a>
																	</div>


																</div>
																<div class="right-block">
																	<h5 itemprop="name">
																		<a class="product-name" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html" title="Robe imprimée" itemprop="url">
																			Robe imprimée
																		</a>
																	</h5>

																	<p class="product-desc" itemprop="description">
																		Robe de soirée imprimée à manches droites et volants, avec fine ceinture noire à la taille.
																	</p>
																	<div class="content_price">
																		<span class="price product-price">
																			61,19 €							</span>


																		</div>
																		<div style="display: none;" class="button-container">
																			<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=4&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="4" data-minimal_quantity="1">
																				<span>Ajouter au panier</span>
																			</a>
																			<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-soiree/4-robe-imprimee.html" title="Afficher">
																				<span>Détails</span>
																			</a>
																		</div>
																		<div class="product-flags">
																		</div>
																		<span class="availability">
																			<span class="available-now">
																				En stock									</span>
																			</span>
																		</div>
																	</div><!-- .product-container> -->
																</li>



																<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 first-in-line last-line first-item-of-mobile-line">
																	<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																		<div class="left-block">
																			<div class="product-image-container">
																				<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																					<img class="replace-2x img-responsive" src="mirage_fichiers/robe-ete-imprimee.jpg" alt="Robe d'été imprimée" title="Robe d'été imprimée" itemprop="image" height="250" width="250">
																				</a>
																				<div class="quick-view-wrapper-mobile">
																					<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																						<i class="icon-eye-open"></i>
																					</a>
																				</div>
																				<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																					<span>Aperçu rapide</span>
																				</a>
																				<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																					<span itemprop="price" class="price product-price">
																						34,78 €									</span>
																						<meta itemprop="priceCurrency" content="EUR">

																						<span class="old-price product-price">
																							36,61 €
																						</span>
																						<span class="price-percent-reduction">-5%</span>
																						<link itemprop="availability" href="http://schema.org/InStock">En stock

																					</div>
																					<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																						<span class="new-label">Nouveau</span>
																					</a>
																				</div>


																			</div>
																			<div class="right-block">
																				<h5 itemprop="name">
																					<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																						Robe d'été imprimée
																					</a>
																				</h5>

																				<p class="product-desc" itemprop="description">
																					Longue robe imprimée à fines bretelles réglables. Décolleté en V et armature sous la poitrine. Volants au bas de la robe.
																				</p>
																				<div class="content_price">
																					<span class="price product-price">
																						34,78 €							</span>

																						<span class="old-price product-price">
																							36,61 €
																						</span>

																						<span class="price-percent-reduction">-5%</span>


																					</div>
																					<div style="display: none;" class="button-container">
																						<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=5&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="5" data-minimal_quantity="1">
																							<span>Ajouter au panier</span>
																						</a>
																						<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Afficher">
																							<span>Détails</span>
																						</a>
																					</div>
																					<div class="product-flags">
																						<span class="discount">Prix réduit !</span>
																					</div>
																					<span class="availability">
																						<span class="available-now">
																							En stock									</span>
																						</span>
																					</div>
																				</div><!-- .product-container> -->
																			</li>



																			<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-line last-item-of-tablet-line last-item-of-mobile-line">
																				<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																					<div class="left-block">
																						<div class="product-image-container">
																							<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																								<img class="replace-2x img-responsive" src="mirage_fichiers/robe-ete-imprimee_002.jpg" alt="Robe d'été imprimée" title="Robe d'été imprimée" itemprop="image" height="250" width="250">
																							</a>
																							<div class="quick-view-wrapper-mobile">
																								<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																									<i class="icon-eye-open"></i>
																								</a>
																							</div>
																							<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																								<span>Aperçu rapide</span>
																							</a>
																							<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																								<span itemprop="price" class="price product-price">
																									36,60 €									</span>
																									<meta itemprop="priceCurrency" content="EUR">
																									<link itemprop="availability" href="http://schema.org/InStock">En stock

																								</div>
																								<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																									<span class="new-label">Nouveau</span>
																								</a>
																							</div>


																						</div>
																						<div class="right-block">
																							<h5 itemprop="name">
																								<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																									Robe d'été imprimée
																								</a>
																							</h5>

																							<p class="product-desc" itemprop="description">
																								Robe en mousseline sans manches, longueur genoux. Décolleté en V avec élastique sous la poitrine.
																							</p>
																							<div class="content_price">
																								<span class="price product-price">
																									36,60 €							</span>


																								</div>
																								<div style="display: none;" class="button-container">
																									<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=6&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="6" data-minimal_quantity="1">
																										<span>Ajouter au panier</span>
																									</a>
																									<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Afficher">
																										<span>Détails</span>
																									</a>
																								</div>
																								<div class="product-flags">
																								</div>
																								<span class="availability">
																									<span class="available-now">
																										En stock									</span>
																									</span>
																								</div>
																							</div><!-- .product-container> -->
																						</li>



																						<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-line first-item-of-tablet-line first-item-of-mobile-line last-mobile-line">
																							<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																								<div class="left-block">
																									<div class="product-image-container">
																										<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																											<img class="replace-2x img-responsive" src="mirage_fichiers/robe-mousseline-imprimee.jpg" alt="Robe en mousseline imprimée" title="Robe en mousseline imprimée" itemprop="image" height="250" width="250">
																										</a>
																										<div class="quick-view-wrapper-mobile">
																											<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																												<i class="icon-eye-open"></i>
																											</a>
																										</div>
																										<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																											<span>Aperçu rapide</span>
																										</a>
																										<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																											<span itemprop="price" class="price product-price">
																												19,68 €									</span>
																												<meta itemprop="priceCurrency" content="EUR">

																												<span class="old-price product-price">
																													24,60 €
																												</span>
																												<span class="price-percent-reduction">-20%</span>
																												<link itemprop="availability" href="http://schema.org/InStock">En stock

																											</div>
																											<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																												<span class="new-label">Nouveau</span>
																											</a>
																										</div>


																									</div>
																									<div class="right-block">
																										<h5 itemprop="name">
																											<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																												Robe en mousseline imprimée
																											</a>
																										</h5>

																										<p class="product-desc" itemprop="description">
																											Robe en mousseline imprimée à bretelles, longueur genoux. Profond décolleté en V.
																										</p>
																										<div class="content_price">
																											<span class="price product-price">
																												19,68 €							</span>

																												<span class="old-price product-price">
																													24,60 €
																												</span>

																												<span class="price-percent-reduction">-20%</span>


																											</div>
																											<div style="display: none;" class="button-container">
																												<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=7&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="7" data-minimal_quantity="1">
																													<span>Ajouter au panier</span>
																												</a>
																												<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Afficher">
																													<span>Détails</span>
																												</a>
																											</div>
																											<div class="product-flags">
																												<span class="discount">Prix réduit !</span>
																											</div>
																											<span class="availability">
																												<span class="available-now">
																													En stock									</span>
																												</span>
																											</div>
																										</div><!-- .product-container> -->
																									</li>
																								</ul>









																								<!-- Products list -->
																								<ul id="blockbestsellers" class="product_list grid row blockbestsellers tab-pane">



																									<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
																										<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																											<div class="left-block">
																												<div class="product-image-container">
																													<a class="product_img_link" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Chemisier" itemprop="url">
																														<img class="replace-2x img-responsive" src="mirage_fichiers/chemisier.jpg" alt="Chemisier" title="Chemisier" itemprop="image" height="250" width="250">
																													</a>
																													<div class="quick-view-wrapper-mobile">
																														<a class="quick-view-mobile" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" rel="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
																															<i class="icon-eye-open"></i>
																														</a>
																													</div>
																													<a class="quick-view" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" rel="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
																														<span>Aperçu rapide</span>
																													</a>
																													<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																														<span itemprop="price" class="price product-price">
																															32,40 €									</span>
																															<meta itemprop="priceCurrency" content="EUR">
																															<link itemprop="availability" href="http://schema.org/InStock">En stock

																														</div>
																														<a class="new-box" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html">
																															<span class="new-label">Nouveau</span>
																														</a>
																													</div>


																												</div>
																												<div class="right-block">
																													<h5 itemprop="name">
																														<a class="product-name" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Chemisier" itemprop="url">
																															Chemisier
																														</a>
																													</h5>

																													<p class="product-desc" itemprop="description">
																														Chemisier à manches courtes drapées, pour un style féminin et élégant.
																													</p>
																													<div class="content_price">
																														<span class="price product-price">
																															32,40 €							</span>


																														</div>
																														<div style="display: none;" class="button-container">
																															<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=2&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="2" data-minimal_quantity="1">
																																<span>Ajouter au panier</span>
																															</a>
																															<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/chemisiers/2-chemisier.html" title="Afficher">
																																<span>Détails</span>
																															</a>
																														</div>
																														<div class="product-flags">
																														</div>
																														<span class="availability">
																															<span class="available-now">
																																En stock									</span>
																															</span>
																														</div>
																													</div><!-- .product-container> -->
																												</li>



																												<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-item-of-mobile-line">
																													<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																														<div class="left-block">
																															<div class="product-image-container">
																																<a class="product_img_link" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="T-shirt délavé à manches courtes" itemprop="url">
																																	<img class="replace-2x img-responsive" src="mirage_fichiers/t-shirt-delave-manches-courtes.jpg" alt="T-shirt délavé à manches courtes" title="T-shirt délavé à manches courtes" itemprop="image" height="250" width="250">
																																</a>
																																<div class="quick-view-wrapper-mobile">
																																	<a class="quick-view-mobile" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" rel="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
																																		<i class="icon-eye-open"></i>
																																	</a>
																																</div>
																																<a class="quick-view" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" rel="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
																																	<span>Aperçu rapide</span>
																																</a>
																																<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																	<span itemprop="price" class="price product-price">
																																		19,81 €									</span>
																																		<meta itemprop="priceCurrency" content="EUR">
																																		<link itemprop="availability" href="http://schema.org/InStock">En stock

																																	</div>
																																	<a class="new-box" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html">
																																		<span class="new-label">Nouveau</span>
																																	</a>
																																</div>


																															</div>
																															<div class="right-block">
																																<h5 itemprop="name">
																																	<a class="product-name" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="T-shirt délavé à manches courtes" itemprop="url">
																																		T-shirt délavé à manches courtes
																																	</a>
																																</h5>

																																<p class="product-desc" itemprop="description">
																																	T-shirt délavé à manches courtes et col rond. Matière douce et
																																	extensible pour un confort inégalé. Pour un look estival, portez-le avec
																																	un chapeau de paille&nbsp;!
																																</p>
																																<div class="content_price">
																																	<span class="price product-price">
																																		19,81 €							</span>


																																	</div>
																																	<div style="display: none;" class="button-container">
																																		<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=1&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="1" data-minimal_quantity="1">
																																			<span>Ajouter au panier</span>
																																		</a>
																																		<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/t-shirts/1-t-shirt-delave-manches-courtes.html" title="Afficher">
																																			<span>Détails</span>
																																		</a>
																																	</div>
																																	<div class="product-flags">
																																	</div>
																																	<span class="availability">
																																		<span class="available-now">
																																			En stock									</span>
																																		</span>
																																	</div>
																																</div><!-- .product-container> -->
																															</li>



																															<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-item-of-tablet-line first-item-of-mobile-line">
																																<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																	<div class="left-block">
																																		<div class="product-image-container">
																																			<a class="product_img_link" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Robe imprimée" itemprop="url">
																																				<img class="replace-2x img-responsive" src="mirage_fichiers/robe-imprimee_002.jpg" alt="Robe imprimée" title="Robe imprimée" itemprop="image" height="250" width="250">
																																			</a>
																																			<div class="quick-view-wrapper-mobile">
																																				<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
																																					<i class="icon-eye-open"></i>
																																				</a>
																																			</div>
																																			<a class="quick-view" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" rel="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
																																				<span>Aperçu rapide</span>
																																			</a>
																																			<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																				<span itemprop="price" class="price product-price">
																																					31,20 €									</span>
																																					<meta itemprop="priceCurrency" content="EUR">
																																					<link itemprop="availability" href="http://schema.org/InStock">En stock

																																				</div>
																																				<a class="new-box" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html">
																																					<span class="new-label">Nouveau</span>
																																				</a>
																																			</div>


																																		</div>
																																		<div class="right-block">
																																			<h5 itemprop="name">
																																				<a class="product-name" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Robe imprimée" itemprop="url">
																																					Robe imprimée
																																				</a>
																																			</h5>

																																			<p class="product-desc" itemprop="description">
																																				Robe imprimée 100&nbsp;% coton. Haut rayé noir et blanc et bas composé d'une jupe patineuse taille haute.
																																			</p>
																																			<div class="content_price">
																																				<span class="price product-price">
																																					31,20 €							</span>


																																				</div>
																																				<div style="display: none;" class="button-container">
																																					<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=3&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="3" data-minimal_quantity="1">
																																						<span>Ajouter au panier</span>
																																					</a>
																																					<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-decontractees/3-robe-imprimee.html" title="Afficher">
																																						<span>Détails</span>
																																					</a>
																																				</div>
																																				<div class="product-flags">
																																				</div>
																																				<span class="availability">
																																					<span class="available-now">
																																						En stock									</span>
																																					</span>
																																				</div>
																																			</div><!-- .product-container> -->
																																		</li>



																																		<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-in-line first-item-of-tablet-line last-item-of-mobile-line">
																																			<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																				<div class="left-block">
																																					<div class="product-image-container">
																																						<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																							<img class="replace-2x img-responsive" src="mirage_fichiers/robe-ete-imprimee_002.jpg" alt="Robe d'été imprimée" title="Robe d'été imprimée" itemprop="image" height="250" width="250">
																																						</a>
																																						<div class="quick-view-wrapper-mobile">
																																							<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																																								<i class="icon-eye-open"></i>
																																							</a>
																																						</div>
																																						<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																																							<span>Aperçu rapide</span>
																																						</a>
																																						<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																							<span itemprop="price" class="price product-price">
																																								36,60 €									</span>
																																								<meta itemprop="priceCurrency" content="EUR">
																																								<link itemprop="availability" href="http://schema.org/InStock">En stock

																																							</div>
																																							<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html">
																																								<span class="new-label">Nouveau</span>
																																							</a>
																																						</div>


																																					</div>
																																					<div class="right-block">
																																						<h5 itemprop="name">
																																							<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																								Robe d'été imprimée
																																							</a>
																																						</h5>

																																						<p class="product-desc" itemprop="description">
																																							Robe en mousseline sans manches, longueur genoux. Décolleté en V avec élastique sous la poitrine.
																																						</p>
																																						<div class="content_price">
																																							<span class="price product-price">
																																								36,60 €							</span>


																																							</div>
																																							<div style="display: none;" class="button-container">
																																								<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=6&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="6" data-minimal_quantity="1">
																																									<span>Ajouter au panier</span>
																																								</a>
																																								<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/6-robe-ete-imprimee.html" title="Afficher">
																																									<span>Détails</span>
																																								</a>
																																							</div>
																																							<div class="product-flags">
																																							</div>
																																							<span class="availability">
																																								<span class="available-now">
																																									En stock									</span>
																																								</span>
																																							</div>
																																						</div><!-- .product-container> -->
																																					</li>



																																					<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 first-in-line last-line first-item-of-mobile-line last-mobile-line">
																																						<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																							<div class="left-block">
																																								<div class="product-image-container">
																																									<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																																										<img class="replace-2x img-responsive" src="mirage_fichiers/robe-mousseline-imprimee.jpg" alt="Robe en mousseline imprimée" title="Robe en mousseline imprimée" itemprop="image" height="250" width="250">
																																									</a>
																																									<div class="quick-view-wrapper-mobile">
																																										<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																																											<i class="icon-eye-open"></i>
																																										</a>
																																									</div>
																																									<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																																										<span>Aperçu rapide</span>
																																									</a>
																																									<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																										<span itemprop="price" class="price product-price">
																																											19,68 €									</span>
																																											<meta itemprop="priceCurrency" content="EUR">

																																											<span class="old-price product-price">
																																												24,60 €
																																											</span>
																																											<span class="price-percent-reduction">-20%</span>
																																											<link itemprop="availability" href="http://schema.org/InStock">En stock

																																										</div>
																																										<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																																											<span class="new-label">Nouveau</span>
																																										</a>
																																									</div>


																																								</div>
																																								<div class="right-block">
																																									<h5 itemprop="name">
																																										<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																																											Robe en mousseline imprimée
																																										</a>
																																									</h5>

																																									<p class="product-desc" itemprop="description">
																																										Robe en mousseline imprimée à bretelles, longueur genoux. Profond décolleté en V.
																																									</p>
																																									<div class="content_price">
																																										<span class="price product-price">
																																											19,68 €							</span>

																																											<span class="old-price product-price">
																																												24,60 €
																																											</span>

																																											<span class="price-percent-reduction">-20%</span>


																																										</div>
																																										<div style="display: none;" class="button-container">
																																											<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=7&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="7" data-minimal_quantity="1">
																																												<span>Ajouter au panier</span>
																																											</a>
																																											<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Afficher">
																																												<span>Détails</span>
																																											</a>
																																										</div>
																																										<div class="product-flags">
																																											<span class="discount">Prix réduit !</span>
																																										</div>
																																										<span class="availability">
																																											<span class="available-now">
																																												En stock									</span>
																																											</span>
																																										</div>
																																									</div><!-- .product-container> -->
																																								</li>



																																								<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-line last-item-of-tablet-line last-item-of-mobile-line last-mobile-line">
																																									<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																										<div class="left-block">
																																											<div class="product-image-container">
																																												<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																													<img class="replace-2x img-responsive" src="mirage_fichiers/robe-ete-imprimee.jpg" alt="Robe d'été imprimée" title="Robe d'été imprimée" itemprop="image" height="250" width="250">
																																												</a>
																																												<div class="quick-view-wrapper-mobile">
																																													<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																																														<i class="icon-eye-open"></i>
																																													</a>
																																												</div>
																																												<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																																													<span>Aperçu rapide</span>
																																												</a>
																																												<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																													<span itemprop="price" class="price product-price">
																																														34,78 €									</span>
																																														<meta itemprop="priceCurrency" content="EUR">

																																														<span class="old-price product-price">
																																															36,61 €
																																														</span>
																																														<span class="price-percent-reduction">-5%</span>
																																														<link itemprop="availability" href="http://schema.org/InStock">En stock

																																													</div>
																																													<a class="new-box" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																																														<span class="new-label">Nouveau</span>
																																													</a>
																																												</div>


																																											</div>
																																											<div class="right-block">
																																												<h5 itemprop="name">
																																													<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																														Robe d'été imprimée
																																													</a>
																																												</h5>

																																												<p class="product-desc" itemprop="description">
																																													Longue robe imprimée à fines bretelles réglables. Décolleté en V et armature sous la poitrine. Volants au bas de la robe.
																																												</p>
																																												<div class="content_price">
																																													<span class="price product-price">
																																														34,78 €							</span>

																																														<span class="old-price product-price">
																																															36,61 €
																																														</span>

																																														<span class="price-percent-reduction">-5%</span>


																																													</div>
																																													<div style="display: none;" class="button-container">
																																														<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=5&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="5" data-minimal_quantity="1">
																																															<span>Ajouter au panier</span>
																																														</a>
																																														<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Afficher">
																																															<span>Détails</span>
																																														</a>
																																													</div>
																																													<div class="product-flags">
																																														<span class="discount">Prix réduit !</span>
																																													</div>
																																													<span class="availability">
																																														<span class="available-now">
																																															En stock									</span>
																																														</span>
																																													</div>
																																												</div><!-- .product-container> -->
																																											</li>
																																										</ul>









																																										<!-- Products list -->
																																										<ul id="blockspecials" class="product_list grid row blockspecials tab-pane">



																																											<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 first-in-line last-line first-item-of-tablet-line first-item-of-mobile-line last-mobile-line">
																																												<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																													<div class="left-block">
																																														<div class="product-image-container">
																																															<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																																<img class="replace-2x img-responsive" src="mirage_fichiers/robe-ete-imprimee.jpg" alt="Robe d'été imprimée" title="Robe d'été imprimée" itemprop="image" height="250" width="250">
																																															</a>
																																															<div class="quick-view-wrapper-mobile">
																																																<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																																																	<i class="icon-eye-open"></i>
																																																</a>
																																															</div>
																																															<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html">
																																																<span>Aperçu rapide</span>
																																															</a>
																																															<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																																<span itemprop="price" class="price product-price">
																																																	34,78 €									</span>
																																																	<meta itemprop="priceCurrency" content="EUR">

																																																	<span class="old-price product-price">
																																																		36,61 €
																																																	</span>
																																																	<span class="price-percent-reduction">-5%</span>
																																																	<link itemprop="availability" href="http://schema.org/InStock">Disponible

																																																</div>
																																															</div>


																																														</div>
																																														<div class="right-block">
																																															<h5 itemprop="name">
																																																<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Robe d'été imprimée" itemprop="url">
																																																	Robe d'été imprimée
																																																</a>
																																															</h5>

																																															<p class="product-desc" itemprop="description">
																																																Longue robe imprimée à fines bretelles réglables. Décolleté en V et armature sous la poitrine. Volants au bas de la robe.
																																															</p>
																																															<div class="content_price">
																																																<span class="price product-price">
																																																	34,78 €							</span>

																																																	<span class="old-price product-price">
																																																		36,61 €
																																																	</span>

																																																	<span class="price-percent-reduction">-5%</span>


																																																</div>
																																																<div style="display: none;" class="button-container">
																																																	<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=5&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="5" data-minimal_quantity="1">
																																																		<span>Ajouter au panier</span>
																																																	</a>
																																																	<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/5-robe-ete-imprimee.html" title="Afficher">
																																																		<span>Détails</span>
																																																	</a>
																																																</div>
																																																<div class="product-flags">
																																																	<span class="discount">Prix réduit !</span>
																																																</div>
																																																<span class="availability">
																																																	<span class="available-now">
																																																		Disponible									</span>
																																																	</span>
																																																</div>
																																															</div><!-- .product-container> -->
																																														</li>



																																														<li class="ajax_block_product col-xs-12 col-sm-4 col-md-3 last-line last-item-of-mobile-line last-mobile-line">
																																															<div class="product-container" itemscope="" itemtype="http://schema.org/Product">
																																																<div class="left-block">
																																																	<div class="product-image-container">
																																																		<a class="product_img_link" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																																																			<img class="replace-2x img-responsive" src="mirage_fichiers/robe-mousseline-imprimee.jpg" alt="Robe en mousseline imprimée" title="Robe en mousseline imprimée" itemprop="image" height="250" width="250">
																																																		</a>
																																																		<div class="quick-view-wrapper-mobile">
																																																			<a class="quick-view-mobile" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																																																				<i class="icon-eye-open"></i>
																																																			</a>
																																																		</div>
																																																		<a class="quick-view" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" rel="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html">
																																																			<span>Aperçu rapide</span>
																																																		</a>
																																																		<div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
																																																			<span itemprop="price" class="price product-price">
																																																				19,68 €									</span>
																																																				<meta itemprop="priceCurrency" content="EUR">

																																																				<span class="old-price product-price">
																																																					24,60 €
																																																				</span>
																																																				<span class="price-percent-reduction">-20%</span>
																																																				<link itemprop="availability" href="http://schema.org/InStock">Disponible

																																																			</div>
																																																		</div>


																																																	</div>
																																																	<div class="right-block">
																																																		<h5 itemprop="name">
																																																			<a class="product-name" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Robe en mousseline imprimée" itemprop="url">
																																																				Robe en mousseline imprimée
																																																			</a>
																																																		</h5>

																																																		<p class="product-desc" itemprop="description">
																																																			Robe en mousseline imprimée à bretelles, longueur genoux. Profond décolleté en V.
																																																		</p>
																																																		<div class="content_price">
																																																			<span class="price product-price">
																																																				19,68 €							</span>

																																																				<span class="old-price product-price">
																																																					24,60 €
																																																				</span>

																																																				<span class="price-percent-reduction">-20%</span>


																																																			</div>
																																																			<div style="display: none;" class="button-container">
																																																				<a class="button ajax_add_to_cart_button btn btn-default" href="http://localhost:8888/prestashop/panier?add=1&amp;id_product=7&amp;token=c205de65ddcd1e67a4aad110be2047bc" rel="nofollow" title="Ajouter au panier" data-id-product="7" data-minimal_quantity="1">
																																																					<span>Ajouter au panier</span>
																																																				</a>
																																																				<a class="button lnk_view btn btn-default" href="http://localhost:8888/prestashop/robes-ete/7-robe-mousseline-imprimee.html" title="Afficher">
																																																					<span>Détails</span>
																																																				</a>
																																																			</div>
																																																			<div class="product-flags">
																																																				<span class="discount">Prix réduit !</span>
																																																			</div>
																																																			<span class="availability">
																																																				<span class="available-now">
																																																					Disponible									</span>
																																																				</span>
																																																			</div>
																																																		</div><!-- .product-container> -->
																																																	</li>
																																																</ul>





																																															</div>

																																															@endsection
