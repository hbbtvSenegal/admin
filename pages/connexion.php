<?php
	try
	{
			$bdd = new PDO ('mysql:host=localhost;dbname=servicesHbbTV;charset=utf8', 'root','babacar');
	}
	catch (Exception $e)
	{
	        die('Erreur : ' . $e->getMessage());
	}

?>
