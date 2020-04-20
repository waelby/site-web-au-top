
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
    <body class="wishlist">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper">
			<!-- header-area-start -->
			<header>
				<?php if(((count($_SESSION['panier']['id_produit'])<=0))&&(!isset($_SESSION['id'])))
						echo "<script type='text/javascript'>document.location.replace('index.php');</script>";
				?>
			</header>
			<!-- header-area-end -->
			<!-- breadcrumbs-area-start -->
			<div class="breadcrumbs-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>Comparateur</h2>
								<ul>
									<li><a href="#">Home /</a></li>
									<li class="active"><a href="#">Comparateur</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<!-- cart-main-area-start -->
				<div class="cart-main-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="wishlist-content">
									<form action="#">
										<div class="wishlist-table table-responsive">
											<table>
												<thead>
											
													<tr>
														
														<th class="product-thumbnail">Nom</th>
														<th class="product-name">Prenom</th>
														<th class="product-name">Date Achat</th>
														<th class="product-name">Nom du produit</th>
														<th class="product-name">Note</th>
														<th class="product-name">Modifier</th>
														<th class="product-name">Supprimer</th>
																						
												
													</tr>
												</thead>
												<tbody>
															

											<?php 
											include_once '../core/reclamationM.php';
											$rec=new ReclamationManage();
							    			$result=$rec->afficher_reclamation($_SESSION['id']);
											
								

											foreach ($result as $val) {?>

													<tr>
														
														
														
														<td class="product-price"><span class="amount"><?php echo $val['nom'];?></span></td>
														<td class="product-price"><span class="amount"><?php echo $val['prenom'];?></span></td>
														<td class="product-price"><span class="amount"><?php echo $val['date_achat'];?></span></td>
														<td class="product-price"><span class="amount"><?php echo $val['nom_produit'];?></span></td>
														<td class="product-price"><span class="amount"><?php echo $val['note'];?></span></td>
																<td calss="product-add-to-cart"> <a href="<?php echo "afficher-reclamation.php?id=".$val['id_reclamation']; ?>" >Afficher</a></td>
                                            												
														
                                            				<td class="product-remove"> <a href="<?php echo "supprimer-reclamation.php?suppid=".$val['id_reclamation']; ?>" >x</a></td>
                                            			

													</tr>
													
												
												 
												<?php }  ?>	
											</tbody>
									</table>
												<tfoot>
													<tr>
														<td colspan="6">
															<div class="wishlist-share">
																<h4 class="wishlist-share-title">Share on:</h4>
																<ul>
																	<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
																	<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
																	<li><a class="pinterest" href="#"><i class="fa fa-dribbble"></i></a></li>
																	<li><a class="googleplus" href="#"><i class="fa fa-google-plus"></i></a></li>
																	<li><a class="email" href="#"><i class="fa fa-instagram"></i></a></li>
																</ul>
															</div>
														</td>
													</tr>
												</tfoot>
										
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- cart-main-area-end -->
			</div>
			<!-- shop-main-area-end -->
			<!-- newslatter-area-start -->
			<div class="newslatter-area pt-80">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="bt-top ptb-80">
								<div class="newlatter-content text-center">
									<h6>Special Offers For Subscribers</h6>
									<h3>Ten Percent Member Discount</h3>
									<p>Subscribe to our newsletters now and stay up to date with new collections, the latest lookbooks and exclusive offers.</p>
									<form action="#">
										<input type="text" placeholder="Enter your email address here..."/>
										<button type="submit">Subscribe</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
