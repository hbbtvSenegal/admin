<?php 
require ("connexion.php");

$req=$bdd->prepare("UPDATE vod SET title = :title,video = :video,description = :description WHERE id =:id");
$req->execute(array( "title"=>$_POST["title"],"video"=>$_POST["video"],"description" => $_POST["description"],"id"=>$_POST["id"] ));
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


if($req){
	header('location:liste.php');
	exit();
}
$req->closeCursor();
?>