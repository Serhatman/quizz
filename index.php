<?php session_start()
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz-v3.0</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
   <?php include "process/db_connect.php";
         include "process/menu.php"?>

    <section class="pseudo">
        <form action="process/ajout-user.php" method="post">
            <label>Entrez votre nom d'utilisateur</label>
            <input type="text" name= 'username' placeholder="ex: Serhat">
            <button class="style-btn" name="button">Soumettre</button>
        </form>
    </section>
</body>
</html>