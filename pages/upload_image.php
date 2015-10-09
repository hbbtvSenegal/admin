<?php 

require 'connexion.php';
//$titre = $_POST['titre'];
//$prix = $_POST['prix'];

//fonction qui permet d'effectuer l'uploade
function upload($bdd,$index,$destination,$extension=false,$max_size=false,$size=false) 
	{	
	 //verifie si le n'est pas vide et qu'il ne renvoi pas d'erreur 	
	 if(empty($_FILES[$index]) || $_FILES[$index]['error']>0)
	   {
	   	?>
       <script type = "text/javascript">
        res = alert('Une erreur est survenue lors de l upload');
        document.location.href='ajout_article.php';
       </script>
       <?php
       	//header('location:ajout_article.php');
		return false;   
	   }
	   
	  //gestion des extensions 
	  $ext=strtolower(substr (strrchr ($_FILES[$index]["name"],"." ),1) ); 
	  
	  if( $extension != false && !in_array( $ext,$extension))
		{?>
		<script type = "text/javascript">
        res = alert('l extension n est pas compatible');
        document.location.href='ajout_article.php';
       </script><?php
       	  //header('location:ajout_article.php');
		 return  false;
		} 
	  
	   //gestion de poid du fichier uploadé
	  if($max_size !=false && $_FILES[$index]["size"] > $max_size)
		{
			?><script type = "text/javascript">
        res = alert('la taille du fichier est trop grande');
        document.location.href='ajout_article.php';
       </script><?php
       	//header('location:ajout_article.php');
		 return false; 	
		}
			
		//gestion des dimension de l'image
	  $dimension=getimagesize($_FILES[$index]["tmp_name"]);
	  if($dimension[0]>$size[0] || $dimension[1]>$size[1])
		{
			?>
		<script type = "text/javascript">
        	res = alert('les dimensions sont trop elevees ');
        	document.location.href='ajout_article.php';
       </script>
       <?php
        	//header('location:ajout_article.php');
		    return false;
		}
		
	   //le mt_rand(1,1000) permet d'eviter d'avoir de doublons d'image
	   
	   $name_file=mt_rand(0,99)."-".$_FILES[$index]["name"];
	   
	  //move_uploaded_file($_FILES[$index]['tmp_name'],$name_file);
	  
	  //insertion de l'image dans la base de donnee
	  if(move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$name_file)==true)
	    
	     {
			$req=$bdd->prepare('insert into articles(titre,img,prix) values(:titre,:image,:prix)');
			$req->execute(array( ':titre'=>$_POST['titre'],':image'=>$name_file,':prix'=>$_POST['prix'] ));	
			$req->closeCursor();
		 }
	else
			{
				?>
				<script type = "text/javascript">
       			 res = alert('erreur d insertion dans la base');
       			 document.location.href='ajout_article.php';
          		</script>
          		<?php
       			//header('location:ajout_article.php');
	
				echo $bdd;
				return false;
			}
			
	 return 1;
	}

if(!empty($_POST['submit']))
	{
		if(upload($bdd,"img","../../siteDeVente/static/image/",array("png","jpg"),1024000000,array(300,300) )==1)
		{
		?>
		<script type = "text/javascript">
        	res = alert('fichier bien uploader');
        	document.location.href='ajout_article.php';
       </script>
       <?php
       //header('location:ajout_article.php');
		}
	}
//requte d'affichage d'image
$id=2;
$req=$bdd->prepare("select * from articles where id_article=:id ");
$req->execute(array(":id"=>$id));
$donnes=$req->fetch();	

	
?>
