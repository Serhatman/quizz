<?php 
session_start();
include 'db_connect.php';


if (isset($_POST['username']) && !empty($_POST['username'] ))
{
    $isSuccess;
    if(isset($_POST['username']) && !empty($_POST['username'])) {
        
        try {
            // Test si le username existe
            $userStmnt = $db->prepare('SELECT * FROM user WHERE username = ?');
            $userStmnt->execute([
                $_POST['username']
            ]);

            $user = $userStmnt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Une erreur est survenue : " . $e->getMessage();
        }
    }};
        if(empty($user)) {

            try {
            // SI l'utilisateur n'existe pas 
            // On le crée
                $msgStmnt = $db->prepare('INSERT INTO user(username) VALUES (?)');
                $isSuccess = $msgStmnt->execute([
                    $_POST['username'],
                ]);
            } catch (PDOException $e) {
                echo "Une erreur est survenue lors de l'insertion de l'utilisateur : " . $e->getMessage();
            }
        }

        $_SESSION['username'] = $_POST['username'];

        header('Location:../categories.php');
        ?>