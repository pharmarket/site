<div id="layer_cart">
  <div class="clearfix">
    <div class="layer_cart_product col-xs-12 col-md-6">
      <span class="cross" title="Fermer la fenêtre"></span>
      <h2>
        <i class="icon-check"></i>Produit ajouté au panier avec succès
      </h2>
      <div class="product-image-container layer_cart_img">
      </div>
      <div class="layer_cart_product_info">
        <span id="layer_cart_product_title" class="product-name"></span>
        <span id="layer_cart_product_attributes"></span>
        <div>
          <strong class="dark">Quantité</strong>
          <span id="layer_cart_product_quantity"></span>
        </div>
        <div>
          <strong class="dark">Total</strong>
          <span id="layer_cart_product_price"></span>
        </div>
      </div>
    </div>
    <div class="layer_cart_cart col-xs-12 col-md-6">
      <h2>
        <!-- Plural Case [both cases are needed because page may be updated in Javascript] -->
        <span class="ajax_cart_product_txt_s  unvisible">
          Il y a <span class="ajax_cart_quantity">0</span> produits dans votre panier.
        </span>
        <!-- Singular Case [both cases are needed because page may be updated in Javascript] -->
        <span class="ajax_cart_product_txt ">
          Il y a 1 produit dans votre panier.
        </span>
      </h2>

      <div class="layer_cart_row">
        <strong class="dark">
          Total produits
                                        TTC
                                  </strong>
        <span class="ajax_block_products_total">
                    </span>
      </div>

              <div class="layer_cart_row">
        <strong class="dark unvisible">
          Frais de port&nbsp;TTC					</strong>
        <span class="ajax_cart_shipping_cost unvisible">
                         À définir											</span>
      </div>
              <div class="layer_cart_row">
        <strong class="dark">
          Total
                                        TTC
                                  </strong>
        <span class="ajax_block_cart_total">
                    </span>
      </div>
      <div class="button-container">
        <span class="continue btn btn-default button exclusive-medium" title="Continuer mes achats">
          <span>
            <i class="icon-chevron-left left"></i>Continuer mes achats
          </span>
        </span>
        <a class="btn btn-default button button-medium" href="http://localhost:8888/prestashop/commande" title="Commander" rel="nofollow">
          <span>
            Commander<i class="icon-chevron-right right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <div class="crossseling"></div>
</div> <!-- #layer_cart -->
<div class="layer_cart_overlay"></div>

<!-- /MODULE Block cart -->
