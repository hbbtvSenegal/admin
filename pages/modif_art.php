<?php 
require ("connexion.php");

$req=$bdd->prepare("UPDATE articles SET titre = :titre,lien = :lien,prix = :prix WHERE id_article =:id");
$req->execute(array( "titre"=>$_POST["titre"],"lien"=>$_POST["lien"],"prix" => $_POST["prix"],"id"=>$_POST["id"] ));
if($req){
	header('location:liste_article.php');
	exit();
}

$req->closeCursor();
?>