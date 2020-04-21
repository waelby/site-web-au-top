<?php
include_once "../config.php";
class Client
{
private $id_client,$nom,$prenom,$email,$motDePasse,$telephone,$adresse;

function __construct($id_client,$nom,$prenom,$email,$motDePasse,$telephone,$adresse)
    {
		$this->id_client=$id_client;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->motDePasse=$motDePasse;  
        $this->telephone=$telephone;
        $this->adresse=$adresse;
        
    }
 public function get_id_client() 
    {
        return $this->id_client;}

    public function get_nom() 
    {
        return $this->nom;
    }   
    public function get_prenom() 
    {
        return $this->prenom;
    }   
     public function get_email() 
    {
        return $this->email;
    }   
     public function get_motDePasse() 
    {
        return $this->motDePasse;
    } 
  
     public function get_telephone() 
    {
        return $this->telephone;
    }   
     
     public function get_adresse() 
    {
        return $this->adresse;
    } 
     public function set_id_client($id_client) 
    {
         $this->id_client=$id_client;
    }  
        
    public function set_nom($nom) 
    {
         $this->nom=$nom;
    }   
    public function set_prenom($prenom) 
    {
         $this->prenom=$prenom;
    }  
    public function set_email($email)  
    {
    	$this->email=$email;
    }
    public function set_motDePasse($motDePasse) 
    {
    	$this->motDePasse=$motDePasse;
    }
   
  	
    public function set_telephone($telephone) 
    {
    	$this->telephone=$telephone;
    }
     
     public function set_adresse($adresse) 
     {
     $this->adresse=$adresse;
     }
     
}




?>