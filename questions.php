<?php include "process/db_connect.php";
    include "process/menu.php";
    session_start();

    if(!isset($_SESSION['username'])){
      header('location:index.php');
    }

    if(!isset($_POST['categories'])){
        header('location:categories.php');
    } else{
      $cate= $_POST['categories'];
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  <div class="ques">
      <form action="score.php" method="post">
        
          <?php
          $req = "SELECT questions.question, categories.categories, questions.id_question FROM questions JOIN categories ON categories.id = questions.idCategories WHERE categories.categories = :cate ORDER BY rand() LIMIT 5";
          $stmt = $db->prepare($req);
          $stmt->bindValue(":cate", $cate);
          $stmt->execute();
          echo "<ol>";
          while($ligne = $stmt->fetch(PDO::FETCH_ASSOC)) {
          $id= $ligne['id_question']?>
          
          <h3 class="question"><li><?= $ligne['question'] ?></li></h3>

          <?php
          $req2 = "SELECT * FROM questions  WHERE id_question = :id";
          $stmt2 = $db->prepare($req2);
          $stmt2->bindValue(":id", $id);
          $stmt2->execute();
          while($ligne2 = $stmt2->fetch(PDO::FETCH_ASSOC)){
          ?>  
          <input type="radio" name="possibilité<?php echo $ligne['id_question']; ?>" value="<?php echo $ligne2['possibilité1'] ?>" required><?php echo $ligne2['possibilité1'] ?><br>
          <input type="radio" name="possibilité<?php echo $ligne['id_question']; ?>" value="<?php echo $ligne2['possibilité2'] ?>" required><?php echo $ligne2['possibilité2'] ?><br>
          <input type="radio" name="possibilité<?php echo $ligne['id_question']; ?>" value="<?php echo $ligne2['possibilité3'] ?>" required><?php echo $ligne2['possibilité3'] ?><br>
          <input type="radio" name="possibilité<?php echo $ligne['id_question']; ?>" value="<?php echo $ligne2['possibilité4'] ?>" required><?php echo $ligne2['possibilité4'] ?><br>
          
        <?php } }?>
          <input type="submit" class="style_btn" value="Soumettre">
      </form>
  </div>
</body>
</html>
