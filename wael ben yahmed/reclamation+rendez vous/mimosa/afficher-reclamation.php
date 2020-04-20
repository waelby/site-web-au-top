	<?php  include 'header.php'; ?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Mimosa-Responsive eCommerce Template</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- font-awesome css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- ionicons.min css -->
        <link rel="stylesheet" href="css/ionicons.min.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- style css -->
		<link rel="stylesheet" href="style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">
		<!-- modernizr css -->
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="register">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper">
			<!-- header-area-start -->
			<header>
				
			</header>
			<form action="modifier-reclamation.php" method="post">
			<!-- header-area-end -->
			<!-- breadcrumbs-area-start -->
			<div class="breadcrumbs-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>Reclamation</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">Reclamation</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<?php
				include '../core/reclamationM.php';
				$liv=new ReclamationManage();
    			$result=$liv->afficher_reclamation_by_id_reclamation($_GET['id']);
				foreach($result as $row){
				?>
			<div class="shop-main-area">
				<!-- user-login-area-start -->

				<div class="user-login-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">
								<div class="billing-fields">
									<div class="row">
										
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
												
													<label>First Name<span>*</span></label>
													<input name="nom" type="text" value="<?php echo $row['nom']; ?>"/>
													<input name="id_client" type="hidden" value="<?php echo $_SESSION['id']; ?>"/>
													<input name="id_reclamation" type="hidden" value="<?php echo $row['id_reclamation']; ?>"/>
												
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
												
													<label>Last Name<span>*</span></label>
													<input name="prenom" type="text" value="<?php echo $row['prenom']; ?>"/>
												
											</div>
										</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Age</label>
											<input name="age" type="text" value="<?php echo $row['age']; ?>"/>
										
									</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
												
													<label>Email Address<span>*</span></label>
													<input name="email" type="text" value="<?php echo $row['email']; ?>"/>
												
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
												
													<label>Phone<span>*</span></label>
													<input name="telephone" type="text" value="<?php echo $row['telephone']; ?>"/>
												
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Date d'achat<span></span></label>
											<input name="date_achat" type="date" placeholder="Date d'achat" value="<?php echo $row['date_achat']; ?>"/>
										
									</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Profession</label>
											<input name="profession" type="text" placeholder="Profession" value="<?php echo $row['profession']; ?>"/>
										
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
											<div class="checkout-form-list">
										
											<label>Notes<span>*</span></label>
											<input name="notes" value="<?php echo $row['note']; ?>" type="text" placeholder="Notes a propos de votre commande."/>
										</div>
									</div>

										<div class="col-lg-12">
											<div class="checkout-form-list">
										
											<label>Search Adress<span></span></label>
											<input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
										</div>
									</div>
										
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Address<span>*</span></label>
											<input name="adresse1" type="text" placeholder="Street address" value="<?php echo $row['adress1']; ?>"/>
										
											
									</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Address2<span></span></label>
											
											<input name="adresse2" type="text" id="billing_address_2"  placeholder="Apartment, suite, unit etc. (optional" value="<?php echo $row['adress2']; ?>"/>
										
									</div>
									</div>
									
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
												
													<label>Postcode<span>*</span></label>
												<input name="code_postal" type="text" placeholder="Postcode" value="<?php echo $row['code_postal']; ?>"/>
												
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
											<div class="checkout-form-list">
										
											<label>Town/City<span>*</span></label>
											<input name="ville" type="text" value="<?php echo $row['ville']; ?>"/>
											
										
									</div>
									</div>

										 
										 <div class="col-lg-12">
										<div class="country-select">
										<label>Country<span>*</span></label>
										<select name="pays" class="chosen-select" id="country" tabindex="1" 
										style="width:100%;" data-placeholder="Default Sorting">
											
											<option value="Tunisia">Tunisia</option>
											
										</select>
									</div>
									</div>
									
									
									<div class="col-lg-12">
										<div class="country-select">
												<label>State<span>*</span></label>
												<select name="region" class="chosen-select" tabindex="1" id="administrative_area_level_1" style="width:100%;" data-placeholder="Default Sorting">
													<option value="<?php echo $row['region']; ?>"><?php echo $row['region']; ?></option>
													<option value="Tunis">Tunis</option>
													<option value="Ariana">Ariana</option>
													<option value="Ben Arous">Ben Arous</option>
													<option value="Manouba">Manouba</option>
													<option value="Nabeul">Nabeul</option>
													<option value="Zaghouan">Zaghouan</option>
													<option value="Bizerte">Bizerte</option>
													<option value="Beja">Beja</option>
													<option value="Kef">Kef</option>
													<option value="Siliana">Siliana</option>
													<option value="Sousse">Sousse</option>
													<option value="Monastir">Monastir</option>
													<option value="Mahdia">Mahdia</option>
													<option value="Sfax">Sfax</option>
													<option value="Kairouan">Kairouan</option>
													<option value="Kasserine">Kasserine</option>
													<option value="Sidi Bouzid">Sidi Bouzid</option>
													<option value="Gabes">Gabes</option>
													<option value="Mednine">Mednine</option>
													<option value="Tataouine">Tataouine</option>
													<option value="Gafsa">Gafsa</option>
													<option value="Tozeur">Tozeur</option>
													<option value="Kebili">Kebili</option>
													
												</select>
											</div>
										</div>
									
										
									
									
									
										<div class="col-lg-12">
										<div class="country-select">
										<label>Produit<span>*</span></label>
										<select name="produit" class="chosen-select" tabindex="1" style="width:100%;" data-placeholder="Default Sorting">
											
												<option value="<?php echo $row['nom_produit']; ?>"><?php echo $row['nom_produit']; ?></option>
											
											
										</select>
									</div>
								</div>
						
								
						</div>
						<?php } ?>

									<div class="single-register">
                                        <input class="confirmer" type="submit" value="Modifier">
                                    </div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- user-login-area-end -->
			</div>
			</form>
			<!-- shop-main-area-end -->

			<!-- newslatter-area-start -->
			<?php  include 'newsletter.php'; ?>
			<!-- newslatter-area-end -->
			
			<!-- footer-area-start -->
			<footer>
				<div class="footer-area ptb-40">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<!-- footer-logo-start -->
								<div class="footer-logo mb-3">
									<a href="#"><img src="img/logo/2.png" alt="logo" /></a>
								</div>
								<!-- footer-logo-end -->
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<!-- copy-right-area-start -->
								<div class="copy-right-area mb-3 text-center">
									<p>Copyright © 2018 <a href="#">Hastech</a> . All Right Reserved</p>
								</div>
								<!-- copy-right-area-end -->
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<!-- footer-social-icon-start -->
								<div class="footer-social-icon">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-rss"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</div>
								<!-- footer-social-icon-end -->
							</div>
						</div>
					</div>
				</div>
		   </footer>
			<!-- footer-area-end -->
	   </div>
	  <!-- page-wraper-start -->
	  
	  
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="js/bootstrap.min.js"></script>
		<!-- owl.carousel js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- jquery-ui js -->
        <script src="js/jquery-ui.min.js"></script>
		<!-- wow js -->
        <script src="js/wow.min.js"></script>
		<!-- owl.carousel.min.js -->
        <script src="js/owl.carousel.min.js"></script>
		<!-- jquery.nivo.slider.js -->
        <script src="js/jquery.nivo.slider.js"></script>
		<!-- jquery.elevateZoom-3.0.8.min.js -->
        <script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="js/jquery.parallax-1.1.3.js"></script>
		<!-- jquery.counterup.min.js -->
        <script src="js/jquery.counterup.min.js"></script>
		<!-- waypoints.min.js -->
        <script src="js/waypoints.min.js"></script>
		<!-- plugins js -->
        <script src="js/plugins.js"></script>
		<!-- main js -->
        <script src="js/main.js"></script>
    </body>
</html>
