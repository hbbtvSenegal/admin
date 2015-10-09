<?php 
require ("connexion.php");


		    	$code=$_GET["code"];
				$req=$bdd->prepare("DELETE  FROM articles where id_article = :code");
				$req->execute(array( "code" => $code ));
			    if($req){

						header('location:liste_article.php');
						exit();
					}
				$req->closeCursor();
		   	
	



