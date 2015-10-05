

<?php
$data = array();
$data["name"]  = "olivier";
$data["date"]  = time();
$data["admin"] = true;
//echo "$data1";
// Affichera: 
// {"name":"olivier","date":1385132116,"admin":true}
//$vod1 = fopen("vod.json", "a+");
//fputs($vod,$data1);
//fputs($vod,"\n");
//fclose($vod);
//$vod = '{"nom":"Adriana", "naissance":"1981-06-12"}';
//$v = fopen('vod.json', 'r+');
//$vod= file_get_contents('./vod.json');
//$json_data = json_decode($vod,true);
//echo $json_data['id'];
$i=0;

$monfichier = fopen('vod.json', 'a+');
$monfichier1 = fopen('vod1.json', 'r+');


while ($i<1) {
 	
$ligne = fgets($monfichier); 
$json_data = json_decode($ligne);
if($json_data->title!="json")
	echo $json_data->title;//)
else
	fputs($monfichier1,$ligne);
$i++;

} 

fclose($monfichier);
fclose($monfichier1);

//$vod= file_get_contents('vod.json');
//$json_data = json_decode($vod,true);
//print_r($json_data['title']);

//$json_data = json_decode($json_source, true);
//foreach($json_data as $v)

//fclose($vod1);
?>