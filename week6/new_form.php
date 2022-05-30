<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
session_start();
include "db.php";

      date_default_timezone_set("Asia/Kuala_Lumpur");


      $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
      $email =filter_var($_POST['email'], FILTER_SANITIZE_STRING);
      $postdate = date("Y-m-d",time());
      $posttime = date("H:i:s",time());
      $comment =filter_var($_POST['comment'], FILTER_SANITIZE_STRING);

      $_SESSION["name"] = $name;
      $_SESSION["email"] = $email;
      $_SESSION["comment"] = $comment;

      if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo"{$email} is an invalid email address.<br /><br />";
        die();
      } else{
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO week6_guestbook(user, email, postdate, posttime,
        comment) VALUES (:user, :email, :pdate, :ptime, :comment)");
     
      // Bind the parameters
      $stmt->bindParam(':user', $name, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
      $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
       
     
      $stmt->execute();

      session_unset();

      $_SESSION['new_id'] = $conn->lastInsertId();
 
      header("Location:list.php");
      echo "New record created successfully";
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
 
}
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Week 6 Deliverables</title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to bottom, #00cc99 0%, #ccff99 100%)fixed;
  }

    p{
      display: table-row;
    }

    label{
      display: table-cell;
      vertical-align: top;
    }

    input{
      display: table-cell;
    }

  </style>
</head>
 
<body>
 
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
  <p>
  <label>Name :</label> &nbsp;
  <input type="text" name="name" size="40" value="<?php if(isset($_SESSION['name'])) echo $_SESSION['name']?>" required style="margin-left: 30px">
  </p>
  <br>
  <p>
  <label>Email :</label> &nbsp;
  <input type="text" name="email" size="25" value="<?php if(isset($_SESSION['email']))echo $_SESSION['email'] ?>" required style="margin-left: 30px">
  </p>
  <br>
  <p>
  <label>Comments :<br></label> &nbsp;
  <textarea name="comment" cols="40" rows="8" required><?php if(isset($_SESSION["comment"])) echo $_SESSION["comment"] ?></textarea>
  </p>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment" style="margin-left: 88px"> &nbsp;
  <input type="reset">
</form>
</body>
</html>