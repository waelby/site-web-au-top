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
    <body class="shop">
    	<div class="container" style="width:800px;">
   
  </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
		<!-- page-wraper-start -->
		<div id="page-wraper">
			<!-- header-area-start -->
			<header>
				<?php  include 'header.php'; ?>
			</header>
			<!-- header-area-end -->
			<!-- breadcrumbs-area-start -->
			<?php  
			include_once '../core/produitC.php';
         	include_once '../core/imageC.php';
				if (isset($_GET['rate'])&&isset($_SESSION['id']))
				{
					$prodC1=new ProduitManage();
					$rate=$prodC1->addRating($_GET['id'],$_GET['rate']+1,$_SESSION['id']);
				}
				if(isset($_GET['page']))
				{
					$page=$_GET['page'];
				}
				else
				{
					$page=1;
				}
				if(isset($_GET['categorie']))
				{
					$categorie=$_GET['categorie'];
				}
				else
				{
					$categorie="%%";
				}
			?>
			<div class="breadcrumbs-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-content text-center">
								<h2>Magasin</h2>
								<ul>
									<li><a href="index.php">Accueil /</a></li>
									<li class="active"><a>Magasin</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- breadcrumbs-area-end -->
			<!-- shop-main-area-start -->
			<div class="shop-main-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<!-- page-bar-start -->
							<div class="page-bar">
								<div class="shop-tab">
									<!-- tab-menu-start -->
									<div class="tab-menu-3">
										<ul>
											<li class="active"><a href="#th" data-toggle="tab"><i class="fa fa-list"></i></a></li>
											<li><a href="#list"  data-toggle="tab"><i class="fa fa-th"></i></a></li>
										</ul>
									</div>
									<!-- tab-menu-end -->
									
									<div class="toolbar-sorter-2">
										
                                     	<a href="comparer.php">
                                        <input style="
									    background: #ee3333;
									    border-color: #ee3333;
									    color: #fff;
									" type="button" value="Aller au comparateur"></a>
									</div>
									<!-- toolbar-sorter-2-end -->
								</div>
							</div>
							<!-- page-bar-end -->
						</div>
					</div>
					<div class="row">
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-right">
							<!-- shop-right-area-start -->
							<div class="shop-right-area mb-40-2 mb-30">
								<!-- tab-area-start -->
								<div class="tab-content">
									<div class="tab-pane active" id="th">
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
											<?php

                                        
                                       // include_once 'header.php';
                                        
                                        $pro= new ProduitManage();
                                        if(isset($_GET['marque']))
                                        {
                                        	$result=$pro->afficherMarque($categorie,$_GET['marque']);
                                        }
                                        else if(isset($_GET['forme']))
                                        {
                                        	$result=$pro->afficherForme($categorie,$_GET['forme']);
                                        }
                                        else if (isset($_GET['filtre'])||isset($_POST['minPriceSel'])) {
                                        	if (isset($_GET['filtre'])) {
                                        $filtre=$pro->recupererFiltre($_GET['filtre']);


//                                        $results=$pro->afficherProduitCategorie($categorie);
                                        foreach ($filtre as $fil) {
                                       $min=$fil['min'];
                                       $max=$fil['max'];

                                       
                                        
                                        
									}}
									else
									{
										$min=$_POST['minPriceSel'];
										$max=$_POST['maxPriceSel'];
									}
                                    ?>
                                     <?php

                                        $result=$pro->afficherProduitFiltre($min,$max,$categorie);
                                        	
                                        }
                                        else {
                                        if(isset($_POST['rech'])&&$_POST['rech']!="")
                                        {
                                            $result=$pro->rechercherProduit($_POST['rech']);
                                        }
                                        else
                                        $result=$pro->afficherProduitCategorie($categorie,$page);
                                        
                                        }
                                        
                                        

                                    ?>
                                     <?php

                                    foreach ($result as $row) 
                                    {
                                    	?>
                                    	
										<div class="product-wrapper product-wrapper-3 mb-40">
											<div class="product-img">
												<a href="<?php echo "detailsProduit.php?id=".$row['produit_id'] ?>">
													<img src="<?php echo  "img/product/".$row['nom'] ?>" alt="product" class="primary"/>
													<img src="<?php echo  "img/product/".$row['nom'] ?>" alt="product" class="secondary"/>
												</a>
												<div class="product-icon">
													<a href="ajouterPanier.php?id_produit=<?php echo $row['produit_id'] ?>" data-toggle="tooltip" title="Ajouter au panier"><i class="icon ion-bag"></i></a>
													 <a href="comparateur.php?id=<?php echo $row['produit_id'] ?>" data-toggle="tooltip" title="Comparer ce produit"><i class="icon ion-android-options"></i></a>
													<a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
												</div>
											</div>
											<div class="product-content">
												<div class="manufacture-product">
													<a href="#"><?php echo $row['produit_categorie']?></a>
													<?php $prodC=new ProduitManage();
													$rate=$prodC->getRating($row['produit_id']);
													foreach ($rate as $rate1) {
														$moy=$rate1['r1'];
													}
													 ?>
													<div class="rating">
														<ul>
															<?php for ($i=0;$i<$moy;$i++) {?>
															<li><a href="<?php echo "listeProduits.php?categorie=".$row['produit_categorie']."&id=".$row['produit_id']."&rate=".$i."&page=".$page ?>"><i class="fa fa-star"></i></a></li>
															<?php } for ($i=$moy;$i<5;$i++) {?>
															<li><a href="<?php echo "listeProduits.php?categorie=".$row['produit_categorie']."&id=".$row['produit_id']."&rate=".$i ?>"><i class="fa fa-star-o"></i></a></li>
															<?php }?>
														</ul>
													</div>
													<div class="price">
													<ul>
													<li align="right" class="new-price rating"  align="right" style="color: black;font-size: 150%;"><?php echo $row['produit_prix'] ; echo "  DT"?></li>
													</ul>
									

								</div>
												</div>
												<h2><a href="<?php echo "detailsProduit.php?id=".$row['produit_id'] ?>"><?php echo $row['produit_nom'] ?></a></h2>
												<div class="price">
													<ul>
														<li class="new-price"><?php echo $row['produit_marque'];?></li><br>
														<li class="new-price"><?php echo "En Stock";?></li>
													</ul>
												</div>
											</div>
											<div>
												
											</div>
										</div>
										<?php } ?>

										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
										<!-- product-wrapper-start -->
										
										<!-- product-wrapper-end -->
									</div>
									<div class="tab-pane fade" id="list">

										<div class="row">
											<?php

                                        
                                       // include_once 'header.php';
                                        
                                        $pro= new ProduitManage();
                                       if(isset($_GET['marque']))
                                        {
                                        	$result=$pro->afficherMarque($categorie,$_GET['marque']);
                                        }
                                        else if(isset($_GET['forme']))
                                        {
                                        	$result=$pro->afficherForme($categorie,$_GET['forme']);
                                        }
                                        else if (isset($_GET['filtre'])||isset($_POST['minPriceSel'])) 
                                        {
                                        	if (isset($_GET['filtre'])) 
                                        	{
	                                        	$filtre=$pro->recupererFiltre($_GET['filtre']);
		                                        foreach ($filtre as $fil) 
		                                        {
			                                        $min=$fil['min'];
			                                        $max=$fil['max'];
												}
											}

									else
									{
										$min=$_POST['minPriceSel'];
										$max=$_POST['maxPriceSel'];
									}
                                    ?>
                                     <?php

                                        $result=$pro->afficherProduitFiltre($min,$max,$categorie);
                                        	
                                        }

                                        else {
                                        if(isset($_POST['rech'])&&$_POST['rech']!="")
                                        {
                                            $result=$pro->rechercherProduit($_POST['rech']);
                                        }
                                        
                                        else
                                        $result=$pro->afficherProduitCategorie($categorie,$page);

                                        
                                        }

                                        
                                        

                                    ?>
                                     <?php

                                    foreach ($result as $row) 
                                    {
                                    	?>
												<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												<div class="product-wrapper mb-40">
													<div class="product-img">
														<a href="<?php echo "detailsProduit.php?id=".$row['produit_id'] ?>">

													<img src="<?php echo  "img/product/".$row['nom'] ?>" alt="product" class="primary"/>
													<img src="<?php echo  "img/product/".$row['nom'] ?>" alt="product" class="secondary"/>
														</a>
														<div class="product-icon">
															<a href="ajouterPanier.php?id_produit=<?php echo $row['produit_id'] ?>" data-toggle="tooltip" title="Ajouter au panier"><i class="icon ion-bag"></i></a>
															 <a href="comparateur.php?id=<?php echo $row['produit_id'] ?>" data-toggle="tooltip" title="Comparer ce produit"><i class="icon ion-android-options"></i></a>
															<a href="#" data-toggle="modal" data-target="#mymodal" title="Quick View"><i class="icon ion-android-open"></i></a>
														</div>
													</div>
													<div class="product-content pt-20">
														<div class="manufacture-product">
															<a href="#"><?php echo $row['produit_categorie']?></a>
															<?php $prodC=new ProduitManage();
													$rate=$prodC->getRating($row['produit_id']);
													foreach ($rate as $rate1) {
														$moy=$rate1['r1'];
													}
													 ?>
															<div class="rating">
																<ul>
														<?php for ($i=0;$i<$moy;$i++) {?>
															<li><a href="<?php echo "listeProduits.php?categorie=".$row['produit_categorie']."&id=".$row['produit_id']."&rate=".$i."&page=".$page ?>"><i class="fa fa-star"></i></a></li>
															<?php } for ($i=$moy;$i<5;$i++) {?>
															<li><a href="<?php echo "listeProduits.php?categorie=".$row['produit_categorie']."&id=".$row['produit_id']."&rate=".$i."&page=".$page ?>"><i class="fa fa-star-o"></i></a></li>
															<?php }?>
													</ul>
															</div>
														</div>
														<h2><a href="<?php echo "detailsProduit.php?id=".$row['produit_id'] ?>"><?php echo $row['produit_nom']?></a></h2>
														<div class="rating">
															<ul>
																<li class="new-price"><?php echo $row['produit_marque']?></li>
																<li class="new-price rating"  align="right" style="color: black;font-size: 120%;"><?php echo $row['produit_prix']."  DT"?></li>
															</ul>
														</div>
													</div>

												
												</div>
												<!-- product-wrapper-end -->
											</div>
											<?php } ?>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
											<div class="col-lg-4 col-md-4 hidden-sm col-xs-12">
												<!-- product-wrapper-start -->
												
												<!-- product-wrapper-end -->
											</div>
										</div>
									</div>
								</div>
								<!-- tab-area-end -->
								<!-- pagination-area-start -->
								<div class="pagination-area">
									<div class="pagination-number">
										<ul>
										<?php 
											$prodC3=new ProduitManage();
											$nbPage=$prodC3->getNbPages($_GET['categorie']); 
											if ($nbPage==1){
										?>
											<li class="active"><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page=1' ?>">1</a></li>
										<?php } 
											if ($nbPage>1 && $page>1){
										?>
											<li><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page='.($page-1) ?>"><i class="fa fa-angle-left"></i></a></li>
											<li><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page=1' ?>">1</a></li>
											<li class="active"><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page='.$page ?>"><?php echo $page ?></a></li>
										<?php } 
											if ($nbPage>1 && $page==1){
										?>
											<li class="active"><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page='.$page ?>"><?php echo $page ?></a></li>
										<?php }
											if ($nbPage>1 && $page<$nbPage){
										?>
											<li><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page='.$nbPage ?>"><?php echo $nbPage ?></a></li>
											<li><a href="<?php echo 'listeProduits.php?categorie='.$categorie.'&page='.($page+1) ?>"><i class="fa fa-angle-right"></i></a></li>
										<?php } 
											?>
										</ul>
									</div>
									<div class="product-count">
									</div>
								</div>
								<!-- pagination-area-end -->
							</div>
							<!-- shop-right-area-end -->
						</div>
						<form method="post" action="<?php echo "listeProduits.php?categorie=optique&page=1"?>">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<!-- shop-left-area-start -->
							<div class="shop-left-area">
								<!-- single-shop-start -->
								<div class="single-shop mb-40">
									<div class="Categories-title">
										<h3>Catégories</h3>
									</div>
									<div class="Categories-list">
										<ul>
											<li><a href="listeProduits.php?categorie=optique">Montures optiques</a></li>
											<li><a href="listeProduits.php?categorie=solaire">Montures solaires</a></li>
											<li><a href="listeProduits.php">Tout afficher</a></li>
										</ul>
									</div>
								</div>
								<!-- single-shop-end -->
								<!-- single-shop-start -->
								<?php
													$prodC2=new ProduitManage();
													$rate=$prodC2->getMinMaxPrice();
													foreach ($rate as $rate1) {
														$min=$rate1['min'];
														$max=$rate1['max'];
													}
													 ?>
									<input type="hidden" id="maxPrice" value="<?php echo $max ?>">
									<input type="hidden" id="minPriceSel" name="minPriceSel">
									<input type="hidden" id="maxPriceSel" name="maxPriceSel">
								<div class="single-shop mb-40">
									<div class="Categories-title">
										<h3>Price Filter</h3>
									</div>
									<div id="slider-range"></div>
									<input type="text" name="text" id="amount" disabled="true" />
								</div>
								<!-- single-shop-end -->
								<!-- single-shop-start -->
								<div class="single-shop mb-40">
									
									<div class="Categories-title">

										<h3>Marque</h3>
									</div>
									<?php
													
													$marque=$prodC2->rechercherMarque($_GET['categorie']);
													foreach ($marque as $m) {
														
													
													 ?>
									<div class="Categories-list">
										<ul>
											<li><a href="<?php echo "listeProduits.php?categorie=".$categorie."&page=".$page."&marque=".$m['produit_marque']?>"><?php echo $m['produit_marque']?></a></li>
											
										</ul>
									</div>
									<?php } ?>
								</div>
								<!-- single-shop-end -->
								<!-- single-shop-start -->
								<div class="single-shop mb-40">
									<div class="Categories-title">
										<h3>Forme</h3>
									</div>
									<?php
													
													$forme=$prodC2->rechercherForme($_GET['categorie']);
													foreach ($forme as $f) {
														
													
													 ?>
									<div class="Categories-list">
										<ul>
											<li><a href="<?php echo "listeProduits.php?categorie=".$categorie."&page=".$page."&forme=".$f['produit_forme']?>"><?php echo $f['produit_forme']?></a></li>
										</ul>
									</div>
									<?php } ?>

								</div>
								<!-- single-shop-end -->
								<!-- single-shop-start -->
							
								<!-- single-shop-end -->
							</div>
							<!-- shop-left-area-end -->
							<div class="buttons-cart mb-30 mt-3">
									<ul>
										<li><button type="submit">Rechercher</button></li>
									</ul>
								</div>
						</div>
					</form>
					</div>	
				</div>
			</div>
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
			<!-- modal-area-start -->
			<div class="modal-area">
				<!-- single-modal-start -->
				
				<!-- single-modal-end -->
			</div>
			<!-- modal-area-end -->
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
