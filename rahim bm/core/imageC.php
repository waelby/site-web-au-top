<?php



 include_once    '../entities/image.php';
 //require '../light/ajout-produit.html';
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

	/*public function ajouter_image($image)
	{	
		$db=config::getConnexion();
		$req="INSERT INTO image (url,nom,taille) VALUES (:url,:nom,:taille);";
		
		
		$sql=$db->prepare($req);
		//$sql->bindvalue(':id_image',$image->get_idproduit());
		$sql->bindvalue(':url',$image->get_url());
		$sql->bindvalue(':nom',$image->get_nom());
		$sql->bindvalue(':taille',$image->get_taille());
		
		$sql->execute();
		
	}*/
	 public function supprimerImage()
	{
		
		$db=config::getConnexion();
		$req="DELETE from images where produit_id=:id";
		$sql=$db->prepare($req);
		$sql->bindvalue(":id",$_GET['id']);
		$sql->execute();
      


	}
	
public function upload_update($val)
    {
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['imageM']['tmp_name']);
      /*  $ret2        = is_uploaded_file($_FILES['image2']['tmp_name']);
        $ret3       = is_uploaded_file($_FILES['image3']['tmp_name']);*/
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            // Le fichier a bien été reçu
            $img_taille = $_FILES['imageM']['size'];
            /*$img_taille2 = $_FILES['image2']['size'];
            $img_taille3 = $_FILES['image3']['size'];*/
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['imageM']['type'];
            $img_nom  = $_FILES['imageM']['name'];
            $img_size  = $_FILES['imageM']['size'];

           /* $img_type2 = $_FILES['image2']['type'];
            $img_nom2  = $_FILES['image2']['name'];
            $img_size2  = $_FILES['image2']['size'];

            $img_type3 = $_FILES['image3']['type'];
            $img_nom3  = $_FILES['image3']['name'];
            $img_size3  = $_FILES['image3']['size'];*/

             

            $data = file_get_contents($_FILES['imageM']['tmp_name']);
            /*$data2 = file_get_contents($_FILES['image2']['tmp_name']);
            $data3= file_get_contents($_FILES['image3']['tmp_name']);*/
            //$next=ImagesManage::recupNext();
            //$new = 'C:/wamp64/www/mimosa/mimosa/img/tsawer/'."image_".$val.strrchr($img_nom,".");
            $new = '../mimosa/img/product/'.$val.strrchr($img_nom,".");
            /*$new2 = 'C:/wamp64/www/mimosa/mimosa/img/tsawer/'.$img_nom2;
            $new3 = 'C:/wamp64/www/mimosa/mimosa/img/tsawer/'.$img_nom3;*/
            
            file_put_contents($new, $data);
            /*file_put_contents($new2, $data2);
            file_put_contents($new3, $data3);*/


    }
}
    public function getIdUpload($id)
    {
        $sql="SELECT id_image from images where produit_id=$id";
        $db=config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function upload_image($val)
    {
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
            $img_taille = $_FILES['image']['size'];
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image']['type'];
            $img_nom  = $_FILES['image']['name'];
            $img_size  = $_FILES['image']['size'];
            $data = file_get_contents($_FILES['image']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            file_put_contents($new, $data);
    }
}
    public function upload_imageM($val)
    {
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['imageM']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            $img_taille = $_FILES['imageM']['size'];
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['imageM']['type'];
            $img_nom  = $_FILES['imageM']['name'];
            $img_size  = $_FILES['imageM']['size'];
            $data = file_get_contents($_FILES['imageM']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            file_put_contents($new, $data);
    }
}
    public function upload_image2M($val)
    {
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image2M']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            $img_taille = $_FILES['image2M']['size'];
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image2M']['type'];
            $img_nom  = $_FILES['image2M']['name'];
            $img_size  = $_FILES['image2M']['size'];
            $data = file_get_contents($_FILES['image2M']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            file_put_contents($new, $data);
    }
}
    public function upload_image3M($val)
    {
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image3M']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            $img_taille = $_FILES['image3M']['size'];
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image3M']['type'];
            $img_nom  = $_FILES['image3M']['name'];
            $img_size  = $_FILES['image3M']['size'];
            $data = file_get_contents($_FILES['image3M']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            file_put_contents($new, $data);
    }
}
 public function upload_image2($val)
    {
        $ret        = false;
       // $img_blob   = '';
        $img_taille = 0;
        $img_type   = '';
        $img_nom    = '';
     
        $taille_max = 250000;
        $ret        = is_uploaded_file($_FILES['image2']['tmp_name']);
        
        if (!$ret) {
            echo "Problème de transfert";
            return false;
        } else {
            $img_taille = $_FILES['image2']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image2']['type'];
            $img_nom  = $_FILES['image2']['name'];
            $img_size  = $_FILES['image2']['size'];

             

            $data = file_get_contents($_FILES['image2']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            
            file_put_contents($new, $data);


    }
}
 public function upload_image3($val)
    {
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
            $img_taille = $_FILES['image3']['size'];
            
            if ($img_taille > $taille_max) {
                echo "Trop gros !";
                return false;
            }

            $img_type = $_FILES['image3']['type'];
            $img_nom  = $_FILES['image3']['name'];
            $img_size  = $_FILES['image3']['size'];

            $data = file_get_contents($_FILES['image3']['tmp_name']);
            $new = '../mimosa/img/product/'."image_".$val.strrchr($img_nom,".");
            
            file_put_contents($new, $data);


    }
}
    function ajouter_image($img_type,$img_nom,$img_size,$val,$type,$id){
            $db=config::getConnexion();
            date_default_timezone_get('GMT');
			$time=date("d-m-Y H:i:s");
            //$prod=new Produit($_POST['idproduit'],$_POST['description'],$_POST['prix'],$_POST['quantite'],$time,$time,$_POST['nom'],$_POST['categorie'],$_POST['marque'],$_POST['forme'],$_POST['couleur']);
            $produit_id=$id;
        $req = "INSERT INTO images (url,nom,taille,produit_id,type) VALUES (:url,:nom,:taille,:produit_id,:type) "; // N'oublions pas d'échapper le contenu binaire
        $sql=$db->prepare($req);
        $sql->bindvalue(":url",$img_type);
        $sql->bindvalue(":nom","image_".$val.strrchr($val,"."));
        $sql->bindvalue(":taille",$img_size);
        $sql->bindvalue(":produit_id",$produit_id);
        $sql->bindvalue(":type",$type);
        $sql->execute();
      
        
        }
         function supprimer_image($id){
            $db=config::getConnexion();
            $produit_id=$id;
                $req = "DELETE FROM images where id_image=$id "; // N'oublions pas d'échapper le contenu binaire
               $sql=$db->prepare($req);
               $sql->execute();
      
        
        }
        
        function modifier_image($img_type,$img_nom,$img_size,$val,$type,$id){
            $db=config::getConnexion();
            date_default_timezone_get('GMT');
            $time=date("d-m-Y H:i:s");
            //$prod=new Produit($_POST['idproduit'],$_POST['description'],$_POST['prix'],$_POST['quantite'],$time,$time,$_POST['nom'],$_POST['categorie'],$_POST['marque'],$_POST['forme'],$_POST['couleur']);
            $produit_id=$id;
        $req = "UPDATE images set url=:url,nom=:nom,taille=:taille,type=:type where produit_id=$id"; // N'oublions pas d'échapper le contenu binaire
        $sql=$db->prepare($req);
        $sql->bindvalue(":url",$img_type);
        $sql->bindvalue(":nom","image_".$val.strrchr($val,"."));
        $sql->bindvalue(":taille",$img_size);
        $sql->bindvalue(":produit_id",$produit_id);
        $sql->bindvalue(":type",$type);
    $sql->execute();

      
        
        }
    	public function afficherImage($id)
	{
		$db=config::getConnexion();
		$req="SELECT * from images where produit_id=$id";
		$sql=$db->query($req);
		
		return $sql;
	}
	public function recupNext()
	{
		$db=config::getConnexion();
		$sql = "SHOW TABLE STATUS WHERE name='images'"; 
		$result=$db->query($sql);
		$next_inc_value = $result->fetch();
		return $next_inc_value['Auto_increment'];
	}

/*public function modifierImage()
{
            
    $db=config::getConnexion();
        

    
        $req = "UPDATE images SET url=:url,nom=:nom,taille=:taille WHERE produit_id=:idProduit";

    $sql= $db->prepare($req);
        $sql->bindvalue(':idProduit',$produit->get_idproduit());
        $sql->bindvalue(':produit_categorie',$produit->get_categorie());
        $sql->bindvalue(':produit_nom',$produit->get_nom());
        $sql->bindvalue(':description',$produit->get_description());
        $sql->bindvalue(':prix',$produit->get_prix());
        $sql->bindvalue(':quantite',$produit->get_quantite());
        $sql->bindvalue(':datemod',$time);

    
    
    
    if($sql->execute())
        echo "ok";
    else echo "noo";
}*/

}






?>