<?php
     $fichier = $_FILES['nom_du_fichier'];
    $dir = "/home/khalifa/Bureau/";
    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'swf' , 'flv' ,
 'avi' , 'mov' , 'mpg' , 'mpeg' , 'xvid' , 'divx' , 'mkv','mp4');
    $maxsize=FALSE;// taille maximale
    $max_width = 0;
    $max_height = 0;
    //$id=0;
    
    //Test1: fichier correctement uploadé
    if(!isset($fichier) OR $fichier['error'] > 0) 
        {
            echo $fichier['size'];
            echo $fichier['error'];
            //echo "Test1: fichier correctement uploadé";
            return FALSE;
        }
    
    //Test2: taille limite
    if($maxsize !== FALSE AND $fichier['size'] > $maxsize) 
        {
            ?><script type = "text/javascript">
                 res = alert('taille limite');
                </script><?php
                require("ajout.php");
            return FALSE;
        }
    //Test3: limite des dimensions de l'image
    if($max_width != 0 && $max_height = 0)
    {
        
        $img_size = getimagesize($fichier['name']);
        $img_width = $img_size[0];
        $img_height = $img_size[1];
        
        if( $img_width > $max_width && $img_height > $max_height )
        {   
            ?><script type = "text/javascript">
                 res = alert('taille des dimensions');
                </script><?php
                require("ajout.php");
            return FALSE;
        }
    }
    
    //on recupère l'extension
    $ext = substr(strrchr($fichier['name'],'.'),1);
    
    //on check si elle fait partie des extensions valides
    if (!in_array($ext, $extensions_valides)) return FALSE;
    
    //on recupere le nom de fichier
    //$filename = strstr($fichier['name'],'.', true); // php3+
    $filename = substr($fichier['name'], 0, strpos($fichier['name'], '.'));
    $filename = strtr($filename, 
' ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
'_AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
    
    $destination = $dir."/".$filename.".".$ext;
    
   //Déplacement du fichier temporaire uploadé vers son emplacement definitif.
    if(move_uploaded_file($fichier['tmp_name'],$destination)){
        //echo "ok";
        //echo $fichier['name'];
    	$title = $_POST["title"];
		$video = $fichier['name'];
		$src = $_POST["src"];
		$description = $_POST["description"];
        ?><script type = "text/javascript">
                 res = alert("le fichier a été bien enregisté");
                </script><?php
                require("ajout.php");
		//print_r($_FILES);

            require("connexion.php");
        $requ = $bdd->prepare("INSERT INTO vod VALUES (?, ?, ?, ?,?)");
        $requ->execute(array("",$title, $src,$description,$video));

        $req1=$bdd->prepare("SELECT id FROM vod  where title=:title and video=:video and src=:src and description=:description");
        $req1->execute(array("title"=>$title,"video"=>$video,"src"=>$src,"description"=>$description));
        if($reponse1=$req1->fetch())
     {
        $id=$reponse1["id"];
    }


            //$id++;
            $data = array();
            $data["id"] = $id;
            $data["title"]  = $title;
            $data["src"]  = $src;
            $data["description"] = $description;
            $data["video"] = $video;
            $data1 = json_encode( $data );

            $vod = fopen("vod.json", "a+");
            fputs($vod,$data1);
            fputs($vod,"\n");
            fclose($vod);

		
        }



    else{
        ?><script type = "text/javascript">
                 res = alert"Erreur lors de l'enregistrement du fichier");
                </script><?php
                require("ajout.php");
        }
?>




