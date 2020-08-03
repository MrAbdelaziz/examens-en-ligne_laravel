<?php 
session_start();

if(!$_SESSION["active"]){
$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION["end_time"];
$timef=strtotime($from_time1);
$timese=strtotime($to_time1);
$diff=$timese-$timef;
if($diff==0){
$_SESSION["active"]=true;
}else{
	echo gmdate("H:i:s",$diff)."</br>";
}
}else{
	echo "00:00:00";
}
 
 ?>