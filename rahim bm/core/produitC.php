<?php
 include_once '../entities/produit.php';
class ProduitManage
{
	public function ajouter_produit($produit)
	{	
		$db=config::getConnexion();
		$req="INSERT INTO produit (produit_id, produit_marque, produit_categorie, produit_nom, produit_description, produit_prix,produit_qte) VALUES (:id_produit,:produit_marque,:produit_categorie,:produit_nom,:description,:prix,:quantite);";

	    
		
		$sql=$db->prepare($req);
		$id_produit=ProduitManage::creerIdProduit();
		$sql->bindvalue(':id_produit',$id_produit);
        $sql->bindvalue(':produit_marque',$produit->get_marque());
		$sql->bindvalue(':produit_categorie',$produit->get_categorie());
		$sql->bindvalue(':produit_nom',$produit->get_nom());
		$sql->bindvalue(':description',$produit->get_description());
        $sql->bindvalue(':prix',$produit->get_prix());
		$sql->bindvalue(':quantite',$produit->get_quantite());
		
		//$sql->execute();
		if($sql->execute())
        {
        	
           return $id_produit;
         }
        	else
        {
           //echo "<meta http-equiv=\"refresh\" content=\"0;URL=ajout-produit.php\">";
        }
		

	}
	public function afficherProduit()
	{
		$db=config::getConnexion();
		$req="SELECT * from produit p,images i where p.produit_id=i.produit_id and i.type='principal'";
		$sql=$db->query($req);
		
		return $sql;
	}
	public function rechercherProduit($val)
	{
		$db=config::getConnexion();
		$req="SELECT * from produit where  produit_nom like '%$val%' or produit_id like '%$val%'";

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
		$sql="SELECT * from produit p where p.produit_id=$idp";
		$db=config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function recupererProduitBest($idp){
		$sql="SELECT * from produit p,images i where p.produit_id=$idp AND p.produit_id=i.produit_id";
		$db=config::getConnexion();
		try{
		$liste=$db->query($sql);
		$result=$liste->fetch();
		return $result;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public function modifierProduit($produit,$id)
	{
		$db=config::getConnexion();
		
	
		$req = "UPDATE produit SET produit_marque=:produit_marque,produit_categorie=:produit_categorie, produit_nom=:produit_nom,produit_description=:description,produit_prix=:prix, produit_qte=:quantite WHERE produit_id=:idProduit";

	$sql= $db->prepare($req);
 		$sql->bindvalue(':idProduit',$id);
        $sql->bindvalue(':produit_marque',$produit->get_marque());
 		$sql->bindvalue(':produit_categorie',$produit->get_categorie());
 		$sql->bindvalue(':produit_nom',$produit->get_nom());
        $sql->bindvalue(':description',$produit->get_description());
		$sql->bindvalue(':prix',$produit->get_prix());
		$sql->bindvalue(':quantite',$produit->get_quantite());
		
 	if($sql->execute())
        {
        	
            //echo "<p style='text-align: center;'><img src='success.png' width='319' height='319' /></p>";
             //echo "<h2 style='text-align: center;'><span style='color: #3BB54A;'><strong>Modifier avec succes</strong></span></h2>";
             //header("Refresh:2;url=affichage-produit.php");
             //exit;
         }
        	else
        {
            echo "<p style='text-align: center;'><img src='erreur.png' width='319' height='319' /></p>";
            echo "<h2 style='text-align: center;'><span style='color: #E2574C;'><strong>Erreur de modification !</strong></span></h2>";
            header("Refresh:2;url=affichage-produit.php");
            	
            exit;
        }
}
public function afficherProduitCategorie($cat,$page)
	{
		$db=config::getConnexion();
		$sel=($page-1)*10;
		$req="SELECT * from produit p,images i where p.produit_id=i.produit_id and i.type='principal' and p.produit_categorie LIKE '$cat' and p.produit_qte>0 LIMIT $sel,10";
		$sql=$db->query($req);
		
		return $sql;
	}
    function getNbPages($cat)
    {
    	$conn=Config::getConnexion();
        $sql="SELECT * from produit where produit_categorie LIKE '$cat'";
        $query = $conn->prepare($sql);
        $query->execute();
        return ceil($query->rowCount()/10);
    }
	function recupererProduit2($idp){
		$sql="SELECT * from produit p,images i where p.produit_id=$idp and i.produit_id=$idp and i.type='principal'";
		$db=config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
/*public function afficherComparateur()
	{
		$db=config::getConnexion();
		$req="SELECT produit_id from comparateur";
		$sql=$db->query($req);
		
		return $sql;
	}*/
	public function afficherProduitCmp($val)
	{
		$db=config::getConnexion();
		$req="SELECT * from produit p,images i where p.produit_id=$val and i.type='principal' and i.produit_id=$val and p.produit_qte>0";
		try{
		$sql=$db->query($req);
		}
		catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		return $sql;
	}
	function creerIdProduit()
    {
        $conn=Config::getConnexion();
        $sql="SELECT max(produit_id) max from produit";
        $result = $conn->query($sql);
        $value = $result->fetch();
        return $value['max']+1;
    }
	public function afficherProduitFiltre($min,$max,$cat)
	{
		$db=config::getConnexion();
		$req="SELECT * from produit p,images i where p.produit_id=i.produit_id and i.type='principal' and p.produit_categorie LIKE '$cat' and p.produit_qte>0 and p.produit_prix between $min and $max";
		$sql=$db->query($req);
		
		return $sql;
	}
	public function recupererFiltre($filtre)
	{
		$db=config::getConnexion();
		$req="SELECT * from filtre where id_filtre=$filtre";
		$sql=$db->query($req);
		
		return $sql;
	}
	public function getRating($id)
	{
		$db=config::getConnexion();
		$req="SELECT round(avg(rate)) r1 from rating where produit_id=$id";
		$sql=$db->query($req);
		return $sql;
	}
	public function addRating($id,$rate,$id_client)
	{
		if (!ProduitManage::verifRating($id,$rate,$id_client))
		{
			$db=config::getConnexion();
			$req="INSERT INTO rating (produit_id,rate,id_client) VALUES (:id_produit,:rate,:id_client)";
			$sql=$db->prepare($req);
			$sql->bindvalue(':id_produit',$id);
			$sql->bindvalue(':id_client',$id_client);
	        $sql->bindvalue(':rate',$rate);
			if($sql->execute())
	        {
	        	
	           //echo "<meta http-equiv=\"refresh\" content=\"0;URL=affichage-produit.php\">";
	         }
	        	else
	        {
	           //echo "<meta http-equiv=\"refresh\" content=\"0;URL=affichage-produit.php\">";
	        }
		}
		else
		{
			ProduitManage::updateRating($id,$rate,$id_client);
		}
		
	}
	public function verifRating($id,$rate,$id_client)
	{
		$db=Config::getConnexion();
        $sql="SELECT * from rating where produit_id=$id AND id_client=$id_client";
        $req=$db->prepare($sql);
        try
        {  
        
            $req->execute();
            
            if ($req->rowCount()>0)
                return true;
            else
                return false;
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
	}
	public function updateRating($id,$rate,$id_client)
	{
		$db=config::getConnexion();
	
		$req = "UPDATE rating SET rate=:rate WHERE produit_id=:idProduit AND id_client=:id_client";

		$sql= $db->prepare($req);
 		$sql->bindvalue(':idProduit',$id);
        $sql->bindvalue(':rate',$rate);
 		$sql->bindvalue(':id_client',$id_client);
 		if($sql->execute())
        {
        	
            return true;
        }
	}
	public function getMinMaxPrice()
	{
		$db=config::getConnexion();
		$req="SELECT min(produit_prix) min,max(produit_prix) max from produit";
		$sql=$db->query($req);
		return $sql;
	}

	public function rechercherMarque($cat)
	{
		$db=config::getConnexion();
		$req="SELECT DISTINCT produit_marque from produit where produit_categorie LIKE '$cat'";
		$sql=$db->query($req);
		return $sql;
	}
	public function afficherMarque($cat,$marque)
	{
		$db=config::getConnexion();
		$req="SELECT * from produit p,images i where p.produit_marque='$marque' and p.produit_categorie LIKE '$cat' and i.produit_id=p.produit_id and i.type='principal'";
		$sql=$db->query($req);
		return $sql;
	}
	/*public function rechercherForme($cat)
	{
		$db=config::getConnexion();
		$req="SELECT DISTINCT produit_forme from produit where produit_categorie LIKE '$cat'";
		$sql=$db->query($req);
		return $sql;
	}
	public function afficherForme($cat,$forme)
	{
		$db=config::getConnexion();
		$req="SELECT * from produit p,images i where p.produit_forme='$forme' and p.produit_categorie LIKE '$cat' and i.produit_id=p.produit_id and i.type='principal'";
		$sql=$db->query($req);
		return $sql;
	}*/



}




?>