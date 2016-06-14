<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<!-- BASICS -->
        <link rel="icon" href="vue/Amoeba/sablier.ico" />
	<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $pseudo." - KHRONOS"; ?></title>
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
					<h1><a class="navbar-brand" href="index.php?page=accueil_utilisateur" data-0="line-height:90px;" data-300="line-height:50px;">
					KHRONOS</a></h1>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav" data-0="margin-top:20px;" data-300="margin-top:5px;">
						<li class="active"><a href="index.php?page=hebergement">Hébergement</a></li>
						<li><a href="index.php?page=sftp">Transfert de fichiers</a></li>
						<li><a href="index.php?page=gerer_compte">Gérer mon compte</a></li>
						<li><a href="index.php?page=devenir_premium">Devenir premium</a></li>
						<li><a href="index.php?page=deconnexion">Se déconnecter</a></li>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
		<section id="parallax2" class="section parallax" data-stellar-background-ratio="0.5">	
            <div class="align-center pad-top40 pad-bot40">
                <blockquote class="bigquote color-white"></blockquote>
				<p class="color-white"></p>
            </div>
		</section>
		<section id="section-contact" class="section appear clearfix">
			<div class="container">
				
				<div class="row mar-bot40">
					<div class="col-md-offset-3 col-md-6">
						<div class="section-header">
							<h2 class="section-heading animated" data-animation="bounceInUp">DEVENIR PREMIUM</h2>
							<p></p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="cform" id="contact-form">
							<form action="index.php?page=devenir_premium" method="post" role="form">
								<input type="hidden"  name="validation"  value="1">
							<br><br><br>
							  <button type="submit" class="btn btn-theme pull-right">TENTER SA CHANCE</button><br><br><br>
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
