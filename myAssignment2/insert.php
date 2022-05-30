<?php
 
if (isset($_POST['add_form'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO assignment2_guestbook(user, email, howfind, frontpage, form, userInterface, postdate, posttime,comment) VALUES (:user, :email, :howfind, :frontpage, :form, :userInterface, :pdate, :ptime, :comment)");
     
      // Bind the parameters
      $stmt->bindParam(':user', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':howfind', $howfind, PDO::PARAM_STR);
      $stmt->bindParam(':frontpage', $frontpage, PDO::PARAM_STR);
      $stmt->bindParam(':form', $form, PDO::PARAM_STR);
      $stmt->bindParam(':userInterface', $userInterface, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
      $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      date_default_timezone_set("Asia/Kuala_Lumpur");
       
      $name = $_POST['name'];
      $email = $_POST['email'];
      $howfind = $_POST['howfind'];
      $frontpage = (isset($_POST['frontpage']) ? 1 : 0);
      $form = (isset($_POST['form']) ? 1 : 0);
      $userInterface = (isset($_POST['userInterface']) ? 1 : 0);
      $postdate = date("Y-m-d", time());
      $posttime = date("H:i:s", time());
      $comment = $_POST['comment'];
     
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