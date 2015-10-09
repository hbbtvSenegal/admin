<?php 
require ("connexion.php");
?>


<script type="text/javascript">

        var supp=confirm('veuillez confimer');
        if(supp==true)
            {
              <?php
              
              $code=$_GET["code"];
              $req=$bdd->prepare("DELETE  FROM vod where video = :code");
              $req->execute(array( "code" => $code ));

              ?>

              alert("fichier supprimer avec succes ");  
              document.location.href='liste.php';
            }
        else
           {
            document.location.href='liste.php';
           }   

</script>


<?php

$requ1 = $bdd->prepare('SELECT count(*) FROM vod ');
$requ1->execute();
$nb = $requ1->fetchAll();

/**$monfichier = fopen('vod.json', 'a+');
$requ3=$bdd->prepare("SELECT id,title,src,description,video FROM vod ");
$requ3->execute();
		fseek($monfichier, 0);
while($reponse=$requ3->fetch())
   {
      $id=$reponse["id"];
        $title=$reponse["title"];
        $src=$reponse["src"];
        $description=$reponse["description"];
        $video=$reponse["video"];

        $data = array();
        $data["id"] = $id;
        $data["title"]  = $title;
        $data["src"]  = $src;
        $data["description"] = $description;
        $data["video"] = $video;
        $data1 = json_encode( $data );
		fputs($monfichier,$data1);
        //fputs($monfichier,"\n");

    }
    fclose($monfichier);**/
	header('location:liste.php');
	exit();

   $req->closeCursor();
?>
