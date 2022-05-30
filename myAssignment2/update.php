<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE assignment2_guestbook SET user = :name, email = :email, howfind = :howfind, frontpage = :frontpage, form = :form, userInterface = :userInterface, comment = :comment WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':howfind', $howfind, PDO::PARAM_STR);
    $stmt->bindParam(':frontpage', $frontpage, PDO::PARAM_STR);
    $stmt->bindParam(':form', $form, PDO::PARAM_STR);
    $stmt->bindParam(':userInterface', $userInterface, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
       
    $name = $_POST['name'];
    $email = $_POST['email'];
    $howfind = $_POST['howfind'];
    $frontpage = (isset($_POST['frontpage']) ? 1 : 0);
    $form = (isset($_POST['form']) ? 1 : 0);
    $userInterface = (isset($_POST['userInterface']) ? 1 : 0);
    $comment = $_POST['comment'];
    $id = $_POST['id'];
 
    $stmt->execute();
     
    header("Location:list.php");
    }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
?>