<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <link rel="icon" href="vue/Amoeba/khronos.ico" />
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>KHRONOS</title>
        <meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="Amoeba/css/isotope.css" media="screen" />	
		<link rel="stylesheet" href="vue/Amoeba/js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="vue/Amoeba/css/bootstrap.css">
		<link rel="stylesheet" href="vue/Amoeba/css/bootstrap-theme.css">
        <link rel="stylesheet" href="vue/Amoeba/css/style.css">
		<!-- skin -->
		<link rel="stylesheet" href="vue/Amoeba/skin/default.css">
    </head>	 
    <body>
		<section id="header" class="appear"></section>
		<div class="navbar navbar-fixed-top" role="navigation" data-0="line-height:100px; height:100px; background-color:rgba(0,0,0,0.3);" data-300="line-height:60px; height:60px; background-color:rgba(0,0,0,1);">
			 <div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="fa fa-bars color-white"></span>
					</button>
					<h1><a class="navbar-brand" href="index.php?page=accueil" data-0="line-height:90px;" data-300="line-height:50px;">
					KHRONOS</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li><a href="#section-about">L'équipe</a></li>
						<li><a href="#section-works">Nos services</a></li>
						<li class=""><a href="index.php?page=mail">Mail</a></li>
						<li><a href="index.php?page=connexion">Se connecter</a></li>
						<li class=""><a href="index.php?page=inscription">S'Inscrire</a></li>
						<li><a href="#section-contact">Nous contacter</a></li>
				</ul>
				</div><!--/.navbar-collapse -->
			</div>
			<?php if(isset ($alerte)) {echo $alerte;} ?>
		</div>
		<section class="featured">
			<div class="container"> 
				<div class="row mar-bot40">
					<div class="col-md-6 col-md-offset-3">	
						<div class="align-center">
							<img src="vue/Amoeba/Logo.png" width=80% height=80%/>
							<p>
							Si vous avez du contenu éphémère,
							</p>
							<p>
							Notre site est fait pour vous.
							</p>	
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- services -->
		<section id="section-services" class="section pad-bot30 bg-white">
                        <div class="container">
                                <div class="row mar-bot40">
                                        <div class="col-md-offset-3 col-md-6">
                                                <div class="section-header">
                                                        <h2 class="section-heading animated" data-animation="bounceInUp">Nos offres</h2>
                                                        <p></p>
                                                </div>
                                        </div>
                                </div>
				<div class="row mar-bot40">
					<div class="col-lg-2">
						
					</div>
					<div class="col-lg-4">
						<div class="align-center">
							<i class="fa fa-clock-o fa-5x mar-bot20"></i>
							<h4 class="text-bold">Membre</h4>
							<ul class="fa-ul">
						</div>
						<div class="mar-left30 align-left">
							<li>Durée de disponibilité entre 1h, 3j et 7j</li>
							<li>Un seul site par utilisateur</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="align-center">
							<i class="fa fa-clock-o fa-5x mar-bot20"></i>
							<h4 class="text-bold">Premium</h4>
							<ul class="fa-ul">
						</div>
						<div class="mar-left25 align-left">
							<li>Définissez votre durée de disponibilité à partir de 1h</li>
							<li>Possibilité d'avoir plusieurs sites</li>
							<li>Une boite mail personnelle</li>
							</ul>
						</div>
					</div>
				</div>	
			</div>
		</section>	
		<!-- spacer section:testimonial -->
		<section id="testimonials" class="section" data-stellar-background-ratio="0.5">
		<div class="container">
			<div class="row">				
					<div class="col-lg-12">
							<div class="align-center">
										<div class="testimonial pad-top40 pad-bot40 clearfix">
											<h5>
												KHRONOS vous propose trois services :
											</h5>
											<h5>
												Un site Web éphémère
											</h5>
											<h5>
												Un stockage temporaire de fichier
											</h5>
											<h5>
												Une boite mail anonyme et sans identification
											</h5>
											<br/>
										</div>
								</div>
							</div>
					</div>
			</div>	
		</div>	
		</section>
		<!-- about -->
		<section id="section-about" class="section appear clearfix">
		<div class="container">

				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Notre équipe</h2>
							<p></p>
						</div>
					</div>
				</div>
					<div class="row align-center mar-bot40">
						<div class="col-lg-4">
							<div class="team-member">
								<figure class="member-photo"><img src="vue/Amoeba/img/team/Alex.png" alt="" /></figure>
								<div class="team-detail">
									<h4>Alexandre Gérard</h4>
									<span>Chef de projet</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="team-member">
								<figure class="member-photo"><img src="vue/Amoeba/img/team/Julie.png" alt="" /></figure>
								<div class="team-detail">
									<h4>Julie Pradelli</h4>
									<span>Développeur</span>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="team-member">
								<figure class="member-photo"><img src="vue/Amoeba/img/team/bastian.png" alt="" /></figure>
								<div class="team-detail">
								<h4>Bastian Bel-Ange</h4>
									<span>Développeur</span>
								</div>
							</div>
						</div>
					</div>			
		</div>
		</section>
		<!-- /about -->
		<!-- spacer section:stats -->
		<section id="parallax1" class="section pad-top40 pad-bot40" data-stellar-background-ratio="0.5">
			<div class="container">
            <div class="align-center pad-top40 pad-bot40">
                <blockquote class="bigquote color-white"></blockquote>
				<p class="color-white"></p>
            </div>
			</div>	
		</section>
		<!-- section works -->
		<section id="section-works" class="section appear clearfix">
			<div class="container">	
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Nos services</h2>
							<p></p>	
						</div>
					</div>
				</div>
                        <div class="row">
                          <nav id="filter" class="col-md-12 text-center">
                            <ul>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".webdesign" >Hébergement</a></li>
                              <li><a href="#"  class="btn-theme btn-small" data-filter=".photography">Transfert de fichiers</a></li>
                            </ul>
                          </nav>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="portfolio-items isotopeWrapper clearfix" id="3">
                                <article class="col-md-4 isotopeItem webdesign">
							<div class="portfolio-item">
							<img src="vue/Amoeba/img/portfolio/hebergement.jpg" alt="" />
								 <div class="portfolio-desc align-center">
									<div class="folio-info">
										<h5><a href="index.php?page=inscription">Basique</a></h5>
										<a href="vue/Amoeba/img/portfolio/hebergement.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
									 </div>										   
								 </div>
							</div>
                                </article>
                                <article class="col-md-4 isotopeItem photography">
							<div class="portfolio-item">
							<img src="vue/Amoeba/img/portfolio/cloud.jpg" alt="" />
								 <div class="portfolio-desc align-center">
									<div class="folio-info">
										<h5><a href="index.php?page=inscription">Owncloud</a></h5>
										<a href="vue/Amoeba/img/portfolio/cloud.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
									 </div>										   
								 </div>
							</div>
                                </article>
                                <article class="col-md-4 isotopeItem webdesign">
							<div class="portfolio-item">
							<img src="vue/Amoeba/img/portfolio/hebergement.jpg" alt="" />
				 				<div class="portfolio-desc align-center">
									<div class="folio-info">
										<h5><a href="index.php">Premium</a></h5>
										<a href="vue/Amoeba/img/portfolio/hebergement.jpg" class="fancybox"><i class="fa fa-plus fa-2x"></i></a>
									 </div>										   
								 </div>
							</div>
                                </article>
                          </div>         
                         </div>
			</div>
		     </div>
		   </div>
		</section>
		<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">	
            <div class="align-center pad-top40 pad-bot40">
                <blockquote class="bigquote color-white"></blockquote>
				<p class="color-white"></p>
            </div>
		</section>
		<!-- contact -->
		<section id="section-contact" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">Contactez-nous</h2>
							<p></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="cform" id="contact-form">
							<div id="sendmessage">
								 Votre message a été envoyé. Merci!
							</div>
							<form action="vue/Amoeba/contact/contact.php" method="post" role="form" class="contactForm">
							  <div class="form-group">
								<label for="name">Identifiant</label>
								<input type="text" name="name" class="form-control" id="name" placeholder="Votre identifiant" data-rule="maxlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="email">Votre mail</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Votre mail" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="subject">Sujet</label>
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" data-rule="maxlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							  </div>
							  <div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"></textarea>
								<div class="validation"></div>
							  </div>
							  
							  <button type="submit" class="btn btn-theme pull-left">ENVOYER</button>
							</form>
						</div>
					</div>
					<!-- ./span12 -->
				</div>	
			</div>
		</section>
		<!-- map 
		<section id="section-map" class="clearfix">
			<div id="map"></div>
		</section>-->
	<section id="footer" class="section footer">
		<div class="container">
			<div class="row animated opacity mar-bot20" data-andown="fadeIn" data-animation="animation">
				<div class="col-sm-12 align-center">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>				
				</div>
			</div>
			<div class="row align-center copyright">
					<div class="col-sm-12"><p>Copyright &copy; 2014 Amoeba - by <a href="http://bootstraptaste.com">Bootstrap Themes</a></p></div>
                    <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Amoeba
                    -->
			</div>
		</div>
	</section>
	<a href="#header" class="scrollup"><i class="fa fa-chevron-up"></i></a>	
	<script src="vue/Amoeba/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
	<script src="vue/Amoeba/js/jquery.js"></script>
	<script src="vue/Amoeba/js/jquery.easing.1.3.js"></script>
    <script src="vue/Amoeba/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASm3CwaK9qtcZEWYa-iQwHaGi3gcosAJc&sensor=false"></script>
	<script src="vue/Amoeba/js/jquery.isotope.min.js"></script>
	<script src="vue/Amoeba/js/jquery.nicescroll.min.js"></script>
	<script src="vue/Amoeba/js/fancybox/jquery.fancybox.pack.js"></script>
	<script src="vue/Amoeba/js/skrollr.min.js"></script>		
	<script src="vue/Amoeba/js/jquery.scrollTo-1.4.3.1-min.js"></script>
	<script src="vue/Amoeba/js/jquery.localscroll-1.2.7-min.js"></script>
	<script src="vue/Amoeba/js/stellar.js"></script>
	<script src="vue/Amoeba/js/jquery.appear.js"></script>
	<script src="vue/Amoeba/js/validate.js"></script>
    <script src="vue/Amoeba/js/main.js"></script>
        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.6700, -73.9400), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [	{		featureType:"all",		elementType:"all",		stylers:[		{			invert_lightness:true		},		{			saturation:10		},		{			lightness:30		},		{			gamma:0.5		},		{			hue:"#1C705B"		}		]	}	]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);
            }
        </script>
	</body>
</html>
