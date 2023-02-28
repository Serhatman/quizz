<?php
include "process/db_connect.php";
include "process/menu.php";
//include "process/menu.php";
session_start();

if(!isset($_SESSION['username'])){
header('location:index.php');
}

$score=0;
echo $score . '<br>';
echo $_POST['possibilité'] . '<br>';
if(isset($_POST['possibilité'])){
    foreach($_POST['possibilité'] as $cle->$val){
        $req = "SELECT reponse FROM questions WHERE id_questions = :id";
        $res = mysql_query($id,$req);
        
        var_dump($score);
        if(mysql_num_rows($res)==$id['reponse']){
        $score++; }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>score</title>
<link rel="stylesheet" href="assets/style.css">
</head>
<body>
<section class="score">
    <h1>Le score de <span style="color: crimson;"><?=$_SESSION['username']?></span> </h1>
<p class='note'> Ton score est de <span><?=$score?></span>/5</p>

</section>
</body>
</html>
