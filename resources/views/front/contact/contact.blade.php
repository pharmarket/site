
@extends('front.layout.app')
@section('content')

<h1 class="page-heading bottom-indent">
	Service client - Contactez-nous</h1>


	<div class="container">
				<div class="row sub_content">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="maps">
							<div id="page_maps" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: -1px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: 255px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: -257px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: -1px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: 255px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: -257px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 6px; top: -1px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 6px; top: 255px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: 6px; top: -257px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -250px; top: -1px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -250px; top: 255px;"></div><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -250px; top: -257px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: -257px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts1.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1461!3i852!2m3!1e0!2sm!3i296362408!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: -1px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts1.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1461!3i853!2m3!1e0!2sm!3i296362408!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: 6px; top: 255px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts1.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1461!3i854!2m3!1e0!2sm!3i296363133!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: -1px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts0.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1460!3i853!2m3!1e0!2sm!3i296348011!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: 255px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts0.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1460!3i854!2m3!1e0!2sm!3i296363133!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -250px; top: -257px; opacity: 1; transition: opacity 200ms ease-out; -webkit-transition: opacity 200ms ease-out;"><img src="https://mts0.googleapis.com/vt?pb=!1m4!1m3!1i11!2i1460!3i852!2m3!1e0!2sm!3i296348011!3m14!2sfr-FR!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcy50OjV8cC53OjAuMXxwLmM6Z3JleSxzLnQ6M3xzLmU6Z3xwLnY6c2ltcGxpZmllZHxwLmM6YnJvd24scy50OjJ8cy5lOmd8cC5jOnllbGxvdyxzLnQ6M3xzLmU6bC50LmZ8cC5jOiNmZjJjM2U1MCxzLnQ6MnxzLmU6bC50LmZ8cC5jOiNmZmU3NGMzYyxzLnQ6M3xzLmU6bC50LnN8cC5jOlllbGxvdyxzLnQ6NnxwLmM6Ymx1ZQ!4e0!5m1!5f2" draggable="false" style="width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=28.6585,76.847041&amp;z=11&amp;hl=fr-FR&amp;gl=US&amp;mapclient=apiv3" title="Cliquez ici pour afficher cette zone sur Google&nbsp;Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 62px; height: 26px; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/google_white2_hdpi.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 62px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 113px; bottom: 0px; width: 127px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer;">Données cartographiques</a><span style="display: none;">Données cartographiques ©2015 Google</span></div></div></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); -webkit-box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 48px; height: 148px; position: absolute; left: 5px; top: 90px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Données cartographiques</div><div style="font-size: 13px;">Données cartographiques ©2015 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Données cartographiques ©2015 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; position: absolute; -webkit-user-select: none; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a href="https://www.google.com/intl/fr-FR_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Conditions d'utilisation</a></div></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right;"><a target="_new" title="Signaler à Google une erreur dans la carte routière ou les images" href="https://www.google.com/maps/@28.6585,76.847041,11z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Signaler une erreur cartographique</a></div></div><div class="gmnoprint" draggable="false" controlwidth="20" controlheight="39" style="margin: 5px; -webkit-user-select: none; position: absolute; left: 0px; top: 0px;"><div class="gmnoprint" controlwidth="0" controlheight="0" style="opacity: 0.6; display: none; position: absolute;"><div title="Faire pivoter la carte à 90°" style="width: 22px; height: 22px; overflow: hidden; position: absolute; cursor: pointer;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6_hdpi.png" draggable="false" style="position: absolute; left: -38px; top: -360px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></div><div class="gmnoprint" controlwidth="20" controlheight="39" style="position: absolute; left: 0px; top: 0px;"><div style="width: 20px; height: 39px; overflow: hidden; position: absolute;"><img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6_hdpi.png" draggable="false" style="position: absolute; left: -39px; top: -401px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div title="Zoom avant" style="position: absolute; left: 0px; top: 2px; width: 20px; height: 17px; cursor: pointer;"></div><div title="Zoom arrière" style="position: absolute; left: 0px; top: 19px; width: 20px; height: 17px; cursor: pointer;"></div></div></div></div></div>
						</div>
					</div>
				</div>

				<div class="row sub_content">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="dividerHeading">
							<h4><span>Get in Touch</span></h4>
						</div>
						<p>Vidit nulla errem ea mea. Dolore apeirian insolens mea ut, indoctum consequuntur hasi. No aeque dictas dissenti as tusu, sumo quodsi fuisset mea in. Ea nobis populo interesset cum, ne sit quis elit officiis, min im tempor iracundia sit anet. Facer falli aliquam nec te. In eirmod utamur offendit vis, posidonium instructior sed te.</p>

						<div class="alert alert-success hidden alert-dismissable" id="contactSuccess">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Success!</strong> Your message has been sent to us.
						</div>

						<div class="alert alert-error hidden" id="contactError">
						  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						  <strong>Error!</strong> There was an error sending your message.
						</div>

						<form id="contactForm" action="" novalidate="novalidate">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6 ">
                                        <input type="text" id="name" name="name" class="form-control" maxlength="100" data-msg-required="Please enter your name." value="" placeholder="Your Name">
                                    </div>
                                    <div class="col-lg-6 ">
                                        <input type="email" id="email" name="email" class="form-control" maxlength="100" data-msg-email="Please enter a valid email address." data-msg-required="Please enter your email address." value="" placeholder="Your E-mail">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="text" id="subject" name="subject" class="form-control" maxlength="100" data-msg-required="Please enter the subject." value="" placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea id="message" class="form-control" name="message" rows="10" cols="50" data-msg-required="Please enter your message." maxlength="5000" placeholder="Message"></textarea>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" data-loading-text="Loading..." class="btn btn-default btn-lg" value="Send Message">
                                </div>
                            </div>
						</form>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="sidebar">
							<div class="widget_info">
								<div class="dividerHeading">
									<h4><span>Contact Info</span></h4>
									</div>
								<p>Lorem ipsum dolor sit amet, consectetur adip, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								<ul class="widget_info_contact">
									<li><i class="fa fa-map-marker"></i> <p><strong>Address</strong>: #2021 Lorem Ipsum</p></li>
									<li><i class="fa fa-user"></i> <p><strong>Phone</strong>:(+91) 9000-12345</p></li>
									<li><i class="fa fa-envelope"></i> <p><strong>Email</strong>: <a href="#">mail@example.com</a></p></li>
									<li><i class="fa fa-globe"></i> <p><strong>Web</strong>: <a href="#" data-placement="bottom" data-toggle="tooltip" title="" data-original-title="www.example.com">www.example.com</a></p></li>
								</ul>

							</div>

							<div class="widget_social">
								<div class="dividerHeading">
									<h4><span>Get Social</span></h4>
								</div>
								<ul class="widget_social">
									<li><a class="fb" href="#." data-placement="bottom" data-toggle="tooltip" title="Facbook"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twtr" href="#." data-placement="bottom" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a class="gmail" href="#." data-placement="bottom" data-toggle="tooltip" title="Google"><i class="fa fa-google-plus"></i></a></li>
									<li><a class="dribbble" href="#." data-placement="bottom" data-toggle="tooltip" title="Dribbble"><i class="fa fa-dribbble"></i></a></li>
									<li><a class="skype" href="#." data-placement="bottom" data-toggle="tooltip" title="Skype"><i class="fa fa-skype"></i></a></li>
									<li><a class="pinterest" href="#." data-placement="bottom" data-toggle="tooltip" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
									<li><a class="instagram" href="#." data-placement="bottom" data-toggle="tooltip" title="Instagram"><i class="fa fa-instagram"></i></a></li>
									<li><a class="youtube" href="#." data-placement="bottom" data-toggle="tooltip" title="Youtube"><i class="fa fa-youtube"></i></a></li>
									<li><a class="linkedin" href="#." data-placement="bottom" data-toggle="tooltip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
									<li><a class="flickrs" href="#." data-placement="bottom" data-toggle="tooltip" title="Flickr"><i class="fa fa-flickr"></i></a></li>
									<li><a class="rss" href="#." data-placement="bottom" data-toggle="tooltip" title="RSS"><i class="fa fa-rss"></i></a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>
			<script type="text/javascript" src="js/jquery.gmap.js"></script>
@stop
