<?php
include_once '../config.php';
class Produit
{
	private $id_produit,$description,$prix,$quantite,$dateajout,$datemod,$id_nom,$categorie;

	public function __construct($id_produit,$description,$prix,$quantite,$dateajout,$datemod,$nom,$categorie)
			{
				date_default_timezone_get('GMT');
				$time=date("d-m-Y H:i:s");
				$this->id_produit=$id_produit;
				$this->description=$description;
				$this->prix=$prix;
				$this->quantite=$quantite;
				$this->dateajout=$time;
				$this->datemod=$time;
				$this->nom=$nom;
				$this->categorie=$categorie;
				
			}

	public function get_idproduit()
	{
		return $this->id_produit;
	}
	public function get_nom()
	{
		return $this->nom;
	}
	public function get_categorie()
	{
		return $this->categorie;;
	}
	public function get_description()
	{
		return $this->description;
	}
	public function get_prix()
	{
		return $this->prix;
	}
	public function get_quantite()
	{
		return $this->quantite;
	}
	/*public function get_date_ajout()
	{
	date_default_timezone_get('GMT');
	$time=date("d-m-Y H:i:s");
		return $time;
	}*/


	public function set_idproduit($val)
	{
		$this->id_produit=$val;
	}
		public function set_description($val)
	{
		$this->description=$val;
	}
		public function set_prix($val)
	{
		$this->prix=$val;
	}
		public function set_quantite($val)
	{
		$this->quantite=$val;
	}
		public function set_nom($val)
	{
		$this->nom=$val;
	}
		public function set_categorie($val)
	{
		$this->categorie=$val;
	}




}
class Images
{
	private $id_image,$url,$nom,$nom_2,$nom_3,$taille,$id_produit/*,$produit_id*/;
	public function __construct(/*$id_image,*/$url,$nom,$nom_2,$nom_3,$taille,$id_produit/*,$produit_id*/)
			{
				
				//$this->id_image=$id_image;
				$this->url=$url;
				$this->nom=$nom;
				$this->nom_2=$nom_2;
				$this->nom_3=$nom_3;
				$this->taille=$taille;
				$this->id_produit=$id_produit;
				//$this->produit_id=$produit_id;
				
			}


	public function get_idIm()
	{
		return $this->id_image;
	}
	public function get_url()
	{
		return $this->url;
	}
	public function get_nom()
	{
		return $this->nom;
	}
	public function get_nom2()
	{
		return $this->nom_2;
	}
	public function get_nom3()
	{
		return $this->nom_3;
	}
	public function get_taille()
	{
		return $this->taille;
	}

	public function set_nom($val)
	{
		$this->nom=$val;
	}

	
	


}
class ImagesManage
{
	/*public function transfert()
	{
        $ret        = false;
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image']['tmp_name']);
        
        if (!$ret) {	
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['image']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image']['type'];
            $img_nom  = $_FILES['image']['name'];
        }
    
	}*/
	public function upload_image_url($image)
	{
		if(isset($_POST['valider']))
{
 $url=$_POST['img_url'];

 $data = file_get_contents($url);

 	//$new = 'images/new_image.jpg';
 	$new = 'images/'.strrchr($url,"/").'.jpg';
 
  file_put_contents($new, $data);
   
  echo $url;
  echo strlen($url);
  $nom=strrchr($url,"/");
  $image->set_nom($nom);
  
  echo $nom;
  
}
	}

	public function ajouter_image($image)
	{	
		$db=config::getConnexion();
		$req="INSERT INTO image (url,nom,nom_2,nom_3,taille) VALUES (:url,:nom,:nom_2,:nom_3,:taille);";
		
		
		$sql=$db->prepare($req);
		//$sql->bindvalue(':id_image',$image->get_idproduit());
		$sql->bindvalue(':url',$image->get_url());
		$sql->bindvalue(':nom',$image->get_nom());
		$sql->bindvalue(':nom_2',$image->get_nom2());
		$sql->bindvalue(':nom_3',$image->get_nom3());
		$sql->bindvalue(':taille',$image->get_taille());
		
		$sql->execute();
		

	}
	 public function supprimerImage()
	{
		
		$db=config::getConnexion();
		$req="DELETE from images where produit_id=:id";
		$sql=$db->prepare($req);
		$sql->bindvalue(":id",$_GET['id']);
		$sql->execute();
      


	}
	

	/*function transfert(){
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['image']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image']['type'];
            $img_nom  = $_FILES['image']['name'];
            $img_size  = $_FILES['image']['size'];
        
        //$img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            $db=config::getConnexion();
            date_default_timezone_get('GMT');
				$time=date("d-m-Y H:i:s");
            $prod=new Produit($_POST['idproduit'],$_POST['description'],$_POST['prix'],$_POST['quantite'],$time,$time);
            $produit_id=$prod->get_idproduit();
        $req = "INSERT INTO images (url,nom,taille,produit_id) VALUES (:url,:nom,:taille,:produit_id) "; // N'oublions pas d'échapper le contenu binaire
        $sql=$db->prepare($req);
        $sql->bindvalue(":url",$img_type);
        $sql->bindvalue(":nom",$img_nom);
        $sql->bindvalue(":taille",$img_size);
        $sql->bindvalue(":produit_id",$produit_id);
        $sql->execute();
        
        }
    }*/
   function transfert2(){
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image']['tmp_name']);
        $ret2        = is_uploaded_file($_FILES['image2']['tmp_name']);
        $ret3       = is_uploaded_file($_FILES['image3']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['image']['size'];
            $img_taille2 = $_FILES['image2']['size'];
            $img_taille3 = $_FILES['image3']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image']['type'];
            $img_nom  = $_FILES['image']['name'];
            $img_size  = $_FILES['image']['size'];

            $img_type2 = $_FILES['image2']['type'];
            $img_nom2  = $_FILES['image2']['name'];
            $img_size2  = $_FILES['image2']['size'];

            $img_type3 = $_FILES['image3']['type'];
            $img_nom3  = $_FILES['image3']['name'];
            $img_size3  = $_FILES['image3']['size'];
        
        //$img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            $db=config::getConnexion();
            date_default_timezone_get('GMT');
				$time=date("d-m-Y H:i:s");
            $prod=new Produit($_POST['idproduit'],$_POST['description'],$_POST['prix'],$_POST['quantite'],$time,$time,$_POST['nom'],$_POST['categorie']);
            $produit_id=$prod->get_idproduit();
        $req = "INSERT INTO images (url,nom,nom_2,nom_3,taille,produit_id) VALUES (:url,:nom,:nom_2,:nom_3,:taille,:produit_id) "; // N'oublions pas d'échapper le contenu binaire
        $sql=$db->prepare($req);
        $sql->bindvalue(":url",$img_type);
        $sql->bindvalue(":nom",$img_nom);
        $sql->bindvalue(":nom_2",$img_nom2);
        $sql->bindvalue(":nom_3",$img_nom3);
        $sql->bindvalue(":taille",$img_size);
        $sql->bindvalue(":produit_id",$produit_id);
        $sql->execute();
        
        }
    }
   /* function transfert3(){
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image3']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['image3']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image3']['type'];
            $img_nom  = $_FILES['image3']['name'];
            $img_size  = $_FILES['image3']['size'];
        
        //$img_blob = file_get_contents ($_FILES['fic']['tmp_name']);
            $db=config::getConnexion();
            date_default_timezone_get('GMT');
				$time=date("d-m-Y H:i:s");
            $prod=new Produit($_POST['idproduit'],$_POST['description'],$_POST['prix'],$_POST['quantite'],$time,$time);
            $produit_id=$prod->get_idproduit();
        $req = "INSERT INTO images (url,nom,taille,produit_id) VALUES (:url,:nom,:taille,:produit_id) "; // N'oublions pas d'échapper le contenu binaire
        $sql=$db->prepare($req);
        $sql->bindvalue(":url",$img_type);
        $sql->bindvalue(":nom",$img_nom);
        $sql->bindvalue(":taille",$img_size);
        $sql->bindvalue(":produit_id",$produit_id);
        $sql->execute();
        
        }
    }*/
    	public function afficherImage($id)
	{
		$db=config::getConnexion();
		$req="SELECT * from images where produit_id=$id";
		$sql=$db->query($req);
		
		
		return $sql;
	}



}

class ProduitManage
{
	public function ajouter_produit($produit)
	{	
		$db=config::getConnexion();
		$req="INSERT INTO produit (produit_id, produit_nom, produit_description, produit_prix,produit_qte,produit_date_ajout,produit_date_modification) VALUES (:id_produit,:nom,:description,:prix,:quantite,:dateajout,:datemod);";
		date_default_timezone_get('GMT');
		$time=date("d-m-Y H:i:s");
		$sql=$db->prepare($req);
		$sql->bindvalue(':id_produit',$produit->get_idproduit());
		//$sql->bindvalue(':categorie',$produit->get_categorie());
		$sql->bindvalue(':nom',$produit->get_nom());
		$sql->bindvalue(':description',$produit->get_description());
		$sql->bindvalue(':prix',$produit->get_prix());
		$sql->bindvalue(':quantite',$produit->get_quantite());
		$sql->bindvalue(':dateajout',$time);
		$sql->bindvalue(':datemod',$time);
		$sql->execute();
		/*if($sql->execute())
        {
        	
           //echo "<meta http-equiv=\"refresh\" content=\"0;URL=affichage-produit.php\">";
        	echo "ok";
         }
        	else
        {
        	echo "non";
           //echo "<meta http-equiv=\"refresh\" content=\"0;URL=affichage-produit.php\">";
        }*/
		

	}
	public function afficherProduit()
	{
		$db=config::getConnexion();
		$req="SELECT * from produit";
		$sql=$db->query($req);
		
		return $sql;
	}
	public function supprimerProduit()
	{
		
		$db=config::getConnexion();
		$req="DELETE from produit where produit_id=:id";
		$sql=$db->prepare($req);
		$sql->bindvalue(":id",$_GET['id']);
		if($sql->execute())
        {
        	
            echo "<p style='text-align: center;'><img src='http://pluspng.com/img-png/success-png-success-icon-image-23194-400.png' width='319' height='319' /></p>";
             echo "<h2 style='text-align: center;'><span style='color: #3BB54A;'><strong>Supprimer avec succes</strong></span></h2>";
             header("Refresh:2;url=affichage-produit.php");
             exit;
         }
        	else
        {
            echo "<p style='text-align: center;'><img src='https://cdn1.iconfinder.com/data/icons/smallicons-controls/32/614338-.svg-512.png' width='319' height='319' /></p>";
            echo "<h2 style='text-align: center;'><span style='color: #E2574C;'><strong>Erreur de suppression !</strong></span></h2>";
            header("Refresh:2;url=affichage-produit.php");
            	
            exit;
        }


	}
	function recupererProduit($idp){
		$sql="SELECT * from produit where produit_id=$idp";
		$db=config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public function modifierProduit($produit)
	{
		$db=config::getConnexion();
		date_default_timezone_get('GMT');
		$time=date("d-m-Y H:i:s");
	
		$req = "UPDATE produit SET produit_description=:description, produit_prix=:prix, produit_qte=:quantite, produit_date_modification=:datemod WHERE produit_id=:idProduit";

	$sql= $db->prepare($req);
 		$sql->bindvalue(':idProduit',$produit->get_idproduit());
		$sql->bindvalue(':description',$produit->get_description());
		$sql->bindvalue(':prix',$produit->get_prix());
		$sql->bindvalue(':quantite',$produit->get_quantite());
		$sql->bindvalue(':datemod',$time);

 	
	
 	
 	if($sql->execute())
        {
        	
            echo "<p style='text-align: center;'><img src='success.png' width='319' height='319' /></p>";
             echo "<h2 style='text-align: center;'><span style='color: #3BB54A;'><strong>Modifier avec succes</strong></span></h2>";
             header("Refresh:2;url=affichage-produit.php");
             exit;
         }
        	else
        {
            echo "<p style='text-align: center;'><img src='erreur.png' width='319' height='319' /></p>";
            echo "<h2 style='text-align: center;'><span style='color: #E2574C;'><strong>Erreur de modification !</strong></span></h2>";
            header("Refresh:2;url=affichage-produit.php");
            	
            exit;
        }
 		
 	

 	

	
	 
 
}




}




?>