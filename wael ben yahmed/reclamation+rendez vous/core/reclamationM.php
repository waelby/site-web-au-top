<?php
require '../entities/reclamation.php';

class ReclamationManage
{
	public function ajouterReclamation($reclamation)
	{
		$db=config::getConnexion();
		$req="INSERT INTO `reclamation`( `nom`, `prenom`, `age`, `email`, `telephone`, `pays`, `adress1`, `adress2`, `ville`, `region`, `code_postal`, `profession`, `nom_produit`, `date_achat`, `note`,`id_client`) VALUES ( :nom, :prenom, :age, :email,:telephone,:pays,:adresse1, :adresse2, :ville,:region, :code_postal, :profession,:nom_produit,:date_achat,:note,:id_client);";
		$sql=$db->prepare($req);

		$sql->bindvalue(':nom',$reclamation->get_nom());
		$sql->bindvalue(':prenom',$reclamation->get_prenom());
		$sql->bindvalue(':age',$reclamation->get_age());
		$sql->bindvalue(':adresse1',$reclamation->get_adresse1());
		$sql->bindvalue(':adresse2',$reclamation->get_adresse2());
		$sql->bindvalue(':ville',$reclamation->get_ville());
		$sql->bindvalue(':code_postal',$reclamation->get_code_postal());
		$sql->bindvalue(':pays',$reclamation->get_pays());
		$sql->bindvalue(':region',$reclamation->get_region());
		$sql->bindvalue(':email',$reclamation->get_email());
		$sql->bindvalue(':telephone',$reclamation->get_telephone());
		$sql->bindvalue(':note',$reclamation->get_note());
		$sql->bindvalue(':profession',$reclamation->get_profession());
		$sql->bindvalue(':date_achat',$reclamation->get_date_achat());
		$sql->bindvalue(':nom_produit',$reclamation->get_nom_produit());
		$sql->bindvalue(':id_client',$reclamation->get_id_client());
		$id=$reclamation->get_id_client();
		if($sql->execute())
		{
			 header('Location: reclamation-affiche1.php');
			 exit;
		}
			
		else  {
				header('Location: reclamation-affiche1.php');
				exit;
			}	
		}
		public function afficher_reclamation($id)
	{
		$db=config::getConnexion();
		$req="SELECT * FROM reclamation where id_client=$id";
		$sql=$db->query($req);
		return $sql;
	}
	public function afficher_reclamation_by_id_reclamation($id)
	{
		$db=config::getConnexion();
		$req="SELECT * FROM reclamation where id_reclamation=$id";
		$sql=$db->query($req);
		return $sql;
	}
	function recupererreclamation($id,$id1){
		$sql="SELECT * from reclamation where id_client=$id and id_produit=$id1";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public function afficherProduitpourReclamation()
	{
		$db = config::getConnexion();
		
		$req = $db->query('SELECT * FROM produit')->fetchAll();
		
		return $req;
        
		
	}
	
	function modifierreclamation($reclamation,$id_client,$id_reclamation){
		
		
		$req="UPDATE `reclamation` SET `nom`=:nom,`prenom`=:prenom,`age`=:age,`email`=:email,`telephone`=:telephone,`pays`=:pays,`adress1`=:adresse1,`adress2`=:adresse2,`ville`=:ville,`region`=:region,`code_postal`=:code_postal,`profession`=:profession,`nom_produit`=:nom_produit,`date_achat`=:date_achat,`note`=:note WHERE id_client=$id_client and id_reclamation=$id_reclamation";
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		
        $sql=$db->prepare($req);
		$sql->bindvalue(':nom',$reclamation->get_nom());
		$sql->bindvalue(':prenom',$reclamation->get_prenom());
		$sql->bindvalue(':age',$reclamation->get_age());
		$sql->bindvalue(':adresse1',$reclamation->get_adresse1());
		$sql->bindvalue(':adresse2',$reclamation->get_adresse2());
		$sql->bindvalue(':ville',$reclamation->get_ville());
		$sql->bindvalue(':code_postal',$reclamation->get_code_postal());
		$sql->bindvalue(':pays',$reclamation->get_pays());
		$sql->bindvalue(':region',$reclamation->get_region());
		$sql->bindvalue(':email',$reclamation->get_email());
		$sql->bindvalue(':telephone',$reclamation->get_telephone());
		$sql->bindvalue(':note',$reclamation->get_note());
		$sql->bindvalue(':profession',$reclamation->get_profession());
		$sql->bindvalue(':date_achat',$reclamation->get_date_achat());
		$sql->bindvalue(':nom_produit',$reclamation->get_nom_produit());
		

		
          if( $sql->execute())
          {
          	header('Location: reclamation-affiche1.php');
          }
			else
			{
				echo "error";
			}
    }













    	public function afficher_reclamation_back()
	{
		$db=config::getConnexion();
		$req="SELECT * FROM reclamation ";
		$sql=$db->query($req);
		return $sql;
	}
	
	function supprimerreclamation($id){
    $sql="DELETE FROM reclamation where id_reclamation= :id";
    $db = config::getConnexion();
        $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
   
            if($req->execute())
            	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=reclamation-affiche1.php\">"; 
            else
            	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=reclamation-affiche1.php\">"; 
        
            //header('Location: contact-inbox.php');
        
  }
  function supprimerreclamation2($id){
    $sql="DELETE FROM reclamation where id_reclamation= :id";
    $db = config::getConnexion();
        $req=$db->prepare($sql);
    $req->bindValue(':id',$id);
   
            if($req->execute())
            	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=afficher-reclamation.php\">"; 
            else
            	 echo "<meta http-equiv=\"refresh\" content=\"0;URL=afficher-reclamation.php\">"; 
        
            //header('Location: contact-inbox.php');
        
  }
  function recupererreclamation_back($id){
		$sql="SELECT * from reclamation where id_reclamation= $id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
    
	
}	
?>