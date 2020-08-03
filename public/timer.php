<?php
session_start();
if(isset($_GET['id'])){
//pour checking
$_SESSION["active"]=false;

$pdo = new PDO('mysql:host=localhost;dbname=xm_emsi', 'root','');
$stmt = $pdo->prepare("SELECT duration FROM exams where id=:ids");
$stmt->bindParam(':ids',$_GET['id']);
$stmt->execute();
while ($row=$stmt->fetchAll()) {
	$duration=$row[0]["duration"];
}
//date('H:i:s', mktime(0,$duration,0));
$_SESSION["duration"]=$duration;
$_SESSION["start_time"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s',strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
$_SESSION["end_time"]=$end_time;
	}
	?>