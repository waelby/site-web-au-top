<?php
include_once'../config.php';
class Reclamation
{
	private $nom,$prenom,$age,$email,$telephone,$pays,$adresse1,$adresse2,$ville,$region,$code_postal,$profession,$nom_produit,$date_achat,$note,$id_client;
	public function __construct($nom,$prenom,$age,$email,$telephone,$pays,$adresse1,$adresse2,$ville,$region,$code_postal,$profession,$nom_produit,$date_achat,$note,$id_client)
	{

		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->age=$age;
		$this->profession=$profession;
		$this->adresse1=$adresse1;
		$this->adresse2=$adresse2;
		$this->ville=$ville;
		$this->code_postal=$code_postal;
		$this->pays=$pays;
		$this->region=$region;
		$this->email=$email;
		$this->telephone=$telephone;
		$this->note=$note;
		$this->date_achat=$date_achat;
		$this->nom_produit=$nom_produit;
		$this->id_client=$id_client;
	}
	
	public function get_nom(){return $this->nom;}
	public function get_prenom(){return $this->prenom;}
	public function get_age(){return $this->age;}
	public function get_adresse1(){return $this->adresse1;}
	public function get_profession(){return $this->profession;}
	public function get_adresse2(){return $this->adresse2;}
	public function get_ville(){return $this->ville;}
	public function get_code_postal(){return $this->code_postal;}
	public function get_pays(){return $this->pays;}
	public function get_region(){return $this->region;}
	public function get_email(){return $this->email;}
	public function get_telephone(){return $this->telephone;}
	public function get_note(){return $this->note;}
	public function get_date_achat(){return $this->date_achat;}
	public function get_nom_produit(){return $this->nom_produit;}
	public function get_id_client(){return $this->id_client;}


	
}
?>