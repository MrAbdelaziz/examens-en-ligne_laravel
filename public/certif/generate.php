<?php
/*->  <-*/
$db=new PDO('mysql:host=127.0.0.1;dbname=emsi-xm;charset=utf8', 'root', '');
if(isset($_POST['id']) && isset($_POST['user'])){
    $exam=$_POST['id'];
    $user=$_POST['user'];
    $stmt = $db->query("SELECT * FROM examinations where exam_id='$exam' and user_id='$user' ORDER BY id DESC LIMIT 1");
    $examinationdata = $stmt->fetch();
    if($examinationdata != null){
        $stmt2 = $db->query("SELECT * FROM users where id='$user' ORDER BY id DESC LIMIT 1");
        $userdata = $stmt2->fetch();
        $stmt3 = $db->query("SELECT * FROM exams where id='$exam' ORDER BY id DESC LIMIT 1");
        $examdata = $stmt3->fetch();
        /*-> <-*/
        $examname=$examdata['title'];
        $name=$userdata['name'];
        $x=explode(' ', $examinationdata['end_date']);
        $date=$x[0];
    }else{
        $examname="";
        $name="";
        $date="";
    }
	require_once 'template.php';
}else{
    if(isset($_SERVER['HTTP_REFERER'])){
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }else{
        header('Location:../');
    }
}
/*->  <-*/
?>