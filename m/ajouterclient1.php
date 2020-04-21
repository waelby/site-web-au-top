<!DOCTYPE html>
<?php include 'header.php'; ?>
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
      
        <script type="text/javascript">
        function confirm()
        {
       var mdp=document.getElementById("motDePasse").value;
  var mdpC=document.getElementById("ConfirmPass").value;
  if(mdpC!=mdp)
  {
    alert("veuillez saisir le meme mot de passe!");
  }
}
/*function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
function verifNom(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifPrenom(champ)
{
   if(champ.value.length < 2 || champ.value.length > 25)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}
function verifPass(champ)
{
   if(champ.value.length < 6 || champ.value.length > 20)
   {
      surligne(champ, true);
      return false;
   }
   else
   {
      surligne(champ, false);
      return true;
   }
}*/
/*function verif()
{
  var v=0;
  if(window.document.client.prenom.value.length<2|| window.document.client.prenom.value.length > 20)
  {
    document.client.prenom.style.borderColor="red";
    v=1;

  }
  else {document.client.prenom.style.borderColor="white"}
    if(window.document.client.nom.value.length<2|| window.document.client.nom.value.length > 20)
  {
    document.client.prenom.style.borderColor="red";
    v=1;
  }
  else {document.client.prenom.style.borderColor="white"}
    if(!/^[a-zA-Z]+$/.test(window.document.client.nom.value))
  {
    document.client.nom.style.borderColor="red";
    v=1;

  }
  else {document.client.prenom.style.borderColor="white"}
      if(!/^[a-zA-Z]+$/.test(window.document.client.prenom.value))
  {
    document.client.prenom.style.borderColor="red";
    v=1;
  }
  else {document.client.prenom.style.borderColor="white"}
      else {document.client.prenom.style.borderColor="white"}
      if(!/^[0-9]+$/.test(window.document.client.telephone.value))
  {
    document.client.telephone.style.borderColor="red";
    v=1;
  }
  else {document.client.telephone.style.borderColor="white"}
      if(!/^[0-9]+$/.test(window.document.client.fax.value))
  {
    document.client.fax.style.borderColor="red";
    v=1;
  }
  else {document.client.fax.style.borderColor="white"}
  if(window.document.client.ConfirmPass.value.!=window.document.client.motDePasse.value)
  {
    document.client.ConfirmPass.style.borderColor="red";
    v=1;

  }
  else {document.client.fax.style.borderColor="white"}
  if(v==1)
  {
    return false;
  }
  else return true;
}*/
/*function queDesLettres(champ) {
  if(!/^[a-zA-Z]+$/.test(champ.value)) {
    alert("C'est pas que des lettres !");
  champ.focus();
    return false;
  }
  return true;
}

function queDesChiffres(champ) {
  if(!/^[0-9]+$/.test(champ.value)) {
    alert("C'est pas que des chiffres !");
    champ.focus();
    return false;
  }
  return true;
}*/






        </script>
    </head>
    <body class="Client">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
    <!-- page-wraper-start -->
    <div id="page-wraper">
      <!-- header-area-start -->
      <header>
        
        
      
    

        <!-- header-top-area-start -->
      
              
        <!-- mobile-menu-area-end -->
      </header>
      <!-- header-area-end -->
      <!-- breadcrumbs-area-start -->
      <div class="breadcrumbs-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="breadcrumb-content text-center">
                <h2>register</h2>
                <ul>
                  <li><a href="#">Home /</a></li>
                  <li class="active"><a href="#">register</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- breadcrumbs-area-end -->
      <!-- shop-main-area-start -->
      <form class="form-horizontal" role="form" action="ajoutClient.php" method="POST" name="client" onsubmit="return verif(this)">
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
                        
                          
                            
                          <label>Nom<span id="span_nom">*</span></label>
                          <input type="text" id="nom" name="nom">
                        
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                        
                          <label>Prenom<span id="span_prenom">*</span></label>
                          <input type="text" id="prenom" name="prenom">
                        
                      </div>
                    </div>
                  
                  
                  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                        
                          <label>Adresse Email<span id="span_id">*</span></label>
                          <input type="email" id="email_id" name="email">
                      
                      </div>
                    </div>
                  
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                    
                      <label>Mot de passe<span id="mdp_span">*</span></label>
                      <input type="password" name="motDePasse" id="mdp" placeholder="Entrer votre mot de passe" >
                    
                      </div>
                        </div>
                         
                  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                    
                      <label>Confirmer mot de passe<span id="mdpC_span">*</span></label>
                      <input type="password" name="ConfirmPass" id="ConfirmPass" placeholder="Confirmez">
                     <span id='message'></span>
                                     </div>
                                     </div> 
                  
              
                    
                  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                        
                          <label>Telephone<span>*</span></label>
                          <input type="text" name="telephone" >
                        
                      </div>
                    </div>
                  
                
                
                    
                  
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                      <div class="checkout-form-list">
                        
                  
                      <label>Adresse<span>*</span></label>
                      <input type="text" placeholder="adresse" name="adresse">
                    </div>
                  </div>    
                  
                   
                
                     
                
                  
                  
                  <div class="single-register">
                    <input type="submit" onclick="verif()" value="Enregistrer"><a>dsfg</a>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="verif_inscrit.js"></script>
    </body>
</html>
