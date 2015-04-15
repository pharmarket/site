
@extends('front.layout.app')
@section('content')

<h1 class="page-heading bottom-indent">
	Service client - Contactez-nous</h1>


	<form action="/prestashop/nous-contacter" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
			<h3 class="page-subheading">Envoyez un message</h3>
			<div class="clearfix">
				<div class="col-xs-12 col-md-3">
					<div class="form-group selector1">
						<label for="id_contact">Objet</label>
											<select id="id_contact" class="form-control" name="id_contact">
							<option value="0">Choisissez</option>
															<option value="2">Service client</option>
															<option value="1">Webmaster</option>
													</select>
					</div>
						<p id="desc_contact0" class="desc_contact">&nbsp;</p>
													<p id="desc_contact2" class="desc_contact contact-title unvisible">
								<i class="icon-comment-alt"></i>Pour toute question sur un produit ou une commande
							</p>
													<p id="desc_contact1" class="desc_contact contact-title unvisible">
								<i class="icon-comment-alt"></i>En cas de problème technique sur ce site
							</p>
																<p class="form-group">
						<label for="email">Adresse e-mail</label>
													<input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="" />
											</p>
																		<div class="form-group selector1">
								<label>R&eacute;f&eacute;rence de commande</label>
																	<input class="form-control grey" type="text" name="id_order" id="id_order" value="" />
															</div>
																												<p class="form-group">
							<label for="fileUpload">Joindre un fichier</label>
							<input type="hidden" name="MAX_FILE_SIZE" value="33554432" />
							<input type="file" name="fileUpload" id="fileUpload" class="form-control" />
						</p>
									</div>
				<div class="col-xs-12 col-md-9">
					<div class="form-group">
						<label for="message">Message</label>
						<textarea class="form-control" id="message" name="message"></textarea>
					</div>
				</div>
			</div>
			<div class="submit">
				<button type="submit" name="submitMessage" id="submitMessage" class="button btn btn-default button-medium"><span>Envoyer<i class="icon-chevron-right right"></i></span></button>
			</div>
		</fieldset>
	</form>

@stop
