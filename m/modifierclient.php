<?php
	include '../Core/ClientC.php';
	$ClientManage= new ClientManage();
	if ($_POST['telephone']=="")
	{
		$telephone=NULL;
	}
	else
	{
		$telephone=$_POST['telephone'];
	}
	
	
	$Client=new Client($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['MotDePasse'],$telephone,$fax,$_POST['adresse']);

	$ClientManage->modifierClient($Client,$_POST['id_client']);
	
	//header('Location: afficher.php);
    													
?>

