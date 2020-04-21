<?php

include  '../core/ClientC.php';

$mdp=$_POST['motDePasse'];
$nmdp=md5($mdp);
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $confirmationMail = '';

    for ($i = 0; $i < 10; $i++) {
        $confirmationMail .= $characters[rand(0, $charactersLength - 1)];
    }

$cl1=new Client($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['motDePasse'],$_POST['pays'],$_POST['cite'],$_POST['zip'],$_POST['telephone'],$_POST['fax'],$_POST['adresse'],$_POST['adresse2']);

//var_dump($emp1);
$cl=new ClientManage();
echo $confirmationMail;
$cl->ajouterClient($cl1,$confirmationMail);
$header='Content-type: text/html; charset=iso-8859-1 From :contact.zaytatn@gmail.com';
   
      $message='<html>
                  <body>



                    <div id="contenu" align="Center">
                      <header>
        
      </header>

                        <img src="https://i.imgur.com/0xAWO1X.png" width="250" height="250">
                        <br>
                        <font color =#FF866A size=5px> Pour confirmer votre compte Veuillez Cliquez Sur ce lien </font>
                        <br>
                        <br>
                        <br>
                        <br>
                        <font color =#E9383F size= 2px><a href="http://127.0.0.1/code/mimosa/confirmation.php?id='.$cl->recupererClientMail($_POST['email']).'&code='.$confirmationMail.'"> Confirmer Mon Compte </a></font>
                    </div>
                  </body>
                </html>';

     if( mail($_POST['email'],"Confimation de votre Compte",$message,$header))
      {
      echo "bravo";
    echo "<meta http-equiv='refresh' content='0;url=login-client-inter.php'>";
  }
    else
      echo"non";


?>