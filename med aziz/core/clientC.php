<?php

include "../entities/Client.php";
class ClientManage
{
public function ajouterClient($client,$confirmationMail) 
    {
        $db=config::getConnexion();
    $req="INSERT INTO `client` ( `id_client`,`nom`, `prenom`, `email`, `MotDePasse`,`telephone`,`adresse`,`confirmationMail`,`status`) VALUES (:id_client,:nom, :prenom, :email, :motDePasse, :telephone, :adresse, confirmationMail, 0);";

        $sql=$db->prepare($req);
        $sql->bindValue(':id_client',$client->get_id_client());
        $sql->bindValue(':nom',$client->get_nom());
        $sql->bindValue(':prenom',$client->get_prenom());
        $sql->bindValue(':email',$client->get_email());
        $sql->bindValue(':motDePasse',$client->get_motDePasse());     
        $sql->bindValue(':telephone',$client->get_telephone());
        $sql->bindValue(':adresse',$client->get_adresse());
        
     $sql->bindValue(':confirmationMail',$confirmationMail);
       if($sql->execute())
       {
        echo "<meta http-equiv='refresh' content='0;url=login-client-inter.php'>";

       }
        
        else
            {echo "noo";}
    } 

   public function afficherClients()
    {
        $db=config::getConnexion();
       $result ="SELECT * FROM client;";
        $sql=$db->query($result);
        return $sql;
    

    }
        public function supprimerClient()
    {
         $db=config::getConnexion();
        $sql=$db->prepare("DELETE FROM client WHERE id_client= :id_client");
        $sql->bindValue(':id_client',$_GET ['id_client']);
        $sql->execute();

    }

         public function modifierClient($Client,$id_client)
    {
        $sql="UPDATE `client` SET `nom`=:nom,`prenom`=:prenom,`email`=:email,`MotDePasse`=:motDePasse,`telephone`=:telephone,`adresse`=:adresse WHERE id_client= $id_client";
       
       
        $db =config::getConnexion();
       $req=$db->prepare($sql);

        
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        //try{        
     
   
      /* $req->bindValue(':idd',$idd);
        $req->bindValue(':id',$idd);
        $req->bindValue(':idd',18);*/
       // $req->bindValue(':id',$Client->get_id());
        $req->bindValue(':nom',$Client->get_nom());
        $req->bindValue(':prenom',$Client->get_prenom());
        $req->bindValue(':email',$Client->get_email());
       $req->bindValue(':motDePasse',$Client->get_motDePasse());
       $req->bindValue(':telephone',$Client->get_telephone());     
       $req->bindValue(':adresse',$Client->get_adresse());
     
 
     


     if ($req->execute())
        
        {
            echo "<meta http-equiv='refresh' content='0;url=afficherProfil.php?id=".$id_client."'>";
        }
        else 
        {
           echo "<meta http-equiv='refresh' content='0;url=afficherProfil.php?id=".$id_client."'>";
        }
            
           // header('Location: index.php');
       // }
        /*catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }*/
        
    
    }
   
function recupererClient($id)
    {
        $db = config::getConnexion();
        $sql="SELECT * from client where id_client=$id_client";
        
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function recupererClientMail($email)
    {
        $db = config::getConnexion();
        $sql="SELECT * from client where email='$email'";
        
        try{
        $liste=$db->query($sql);
        $result=$liste->fetch();
        return $result['id_client'];
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
      function VerifierEmailConfirmation($id_client,$code)
    {
        $db = config::getConnexion();

      $q = $db->prepare("SELECT * FROM Client where id_client=:id_client AND confirmationMail=:code");
      $q->bindParam(":id_client",$id);
      $q->bindParam(":code",$code);
      $q->execute();
      return $q;
      
    }
       function UpdateConfirmation($id_client)
    {
      $db = config::getConnexion();
      $q=$db->prepare("UPDATE Client set status=1 where id_client=:id_client");
      $q->bindParam(":id_client",$id_client);
      if($q->execute())
      {
      header('Location: ../mimosa/login-client-inter.php');
      exit;
    }
    else
    { 
        echo "erreur";
    }
  }
   public function modifierPass($mdp,$id_client)
    {
        $sql="UPDATE `client` SET `MotDePasse`='$mdp' WHERE id_client= $id_client";
       
       
        $db =config::getConnexion();
       $req=$db->prepare($sql);

       if ($req->execute())
        
        {
            echo "<meta http-equiv='refresh' content='0;url=login-client-inter.php'>";
        }
        else 
        {
          echo "erreur";
        }
            
           // header('Location: index.php');
       // }
        /*catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }*/
        
    
    }
    
}
?>