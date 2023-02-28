<?php
session_start();

include "process/db_connect.php";

// On récupère tout le contenu de la table 
$search = 'SELECT categories FROM categories';
$categoriesStatement = $db->prepare($search);
$categoriesStatement->execute();
$categories = $categoriesStatement->fetchAll();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php include "process/menu.php"?>
<div class="cate form">

<form action='questions.php' method="POST">
    <h2>Categories :</h2>
        <select name="categories" id="categories">
        <option value="">--choisissez une catégorie</option>
        <?php foreach($categories as $categorie) {?>
            <option value="<?php echo $categorie['categories'] ?>"><?php echo $categorie['categories'];?>
            </option>
        <?php }?>
        </select>
        <input class="style_btn" type="submit" value="Soumettre">
</form>

</div>

</body>
</html>