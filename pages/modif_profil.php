<?php 
require ("connexion.php");

//$code=$_GET["code"];

$req=$bdd->prepare("UPDATE admin SET login = :login,password = :password,nom = :nom,prenom = :prenom,date_naiss = :date_naiss,lieu = :lieu  WHERE id =:id");
$req->execute(array( "login"=>$_POST["login"],"password"=>$_POST["password"],"nom" => $_POST["nom"],"prenom"=>$_POST["prenom"],"date_naiss"=>$_POST["date_naiss"],"lieu" => $_POST["lieu"],"id"=>$_POST["id"] ));
if($req){
	?><script type = "text/javascript">
       	res = alert('Votre profil a été bien modifié');
     </script><?php
	header('location:accueil.php');
	exit();
}
$req->closeCursor();
?>