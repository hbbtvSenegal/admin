<?php 

require 'connexion.php';

//fonction qui permet d'effectuer l'uploade
function upload($bdd,$index,$destination,$extension=false,$max_size=false,$size=false) 
	{	
	 //verifie si le n'est pas vide et qu'il ne renvoi pas d'erreur 	
	 if(empty($_FILES[$index]) || $_FILES[$index]['error']>0)
	   {
		echo "Une erreur est survenue lors de l'upload ";
		return false;   
	   }
	   
	  //gestion des extensions 
	  $ext=strtolower(substr (strrchr ($_FILES[$index]["name"],"." ),1) ); 
	  
	  if( $extension != false && !in_array( $ext,$extension))
		{
		 echo "l'extension n'est pas compatible";
		 return  false;
		} 
	  
	   //gestion de poid du fichier uploadé
	  if($max_size !=false && $_FILES[$index]["size"] > $max_size)
		{
		 echo "le poid du fichier est trop grand ";
		 return false; 	
		}
			
		//gestion des dimension de l'image
	  $dimension=getimagesize($_FILES[$index]["tmp_name"]);
	  if($dimension[0]>$size[0] || $dimension[1]>$size[1])
		{
		 echo "les dimensions sont trop elevees ";
		 return false;
		}
		
	   //le mt_rand(1,1000) permet d'eviter d'avoir de doublons d'image
	   
	   $name_file=mt_rand(0,99)."-".$_FILES[$index]["name"];
	   
	  //move_uploaded_file($_FILES[$index]['tmp_name'],$name_file);
	  
	  //insertion de l'image dans la base de donnee
	  if(move_uploaded_file($_FILES[$index]['tmp_name'],$destination.$name_file)==true)
	    
	     {
			$req=$bdd->prepare('insert into articles(img) values(:image)');
			$req->execute(array( ':image'=>$name_file ));	
			$req->closeCursor();
		 }
	else
			{
			?><script type = "text/javascript">
       			 res = alert('erreur d insertion dans la base');
          		</script><?php
       			require("ajout_article.php");
		
				echo $bdd;
				return false;
			}
			
	 return 1;
	}

if(!empty($_POST['submit']))
	{
		if(upload($bdd,"img","/home/khalifa/Bureau/",array("png","jpg"),102400,array(300,300) )==1)
		{
		  echo "fichier bien uploader ";
		}
	}
//requte d'affichage d'image
$id=2;
$req=$bdd->prepare("select * from articles where id_article=:id ");
$req->execute(array(":id"=>$id));
$donnes=$req->fetch();	

	
?>

<form method="POST" action="#" enctype="multipart/form-data">
	<div>
		<label for="img">Votre image :</label><input type="file" name="img" id="image" /><br />
		<input type="Submit" value="Envoyer" name="submit" />
	</div>

</form>

<p>
	<img src="img_uploaded/<?php echo $donnes['img'];?>" alt="<?php echo substr($donnes['img'],3);?>" />
</p>
