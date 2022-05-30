<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbook WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
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
 
<!DOCTYPE html>
<html>
<head>
  <title>Week 5 Deliverables</title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to top, #99ff99 0%, #ff9966 100%)fixed;
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
 
<form method="post" action="update.php">
  <p>
  <label> Name :</label> &nbsp;
  <input style="margin-left:30px" type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
</p>
  <br></br>
  <p>
  <label> Email :</label> &nbsp;
  <input style="margin-left:30px" type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
</p>
  <br></br>
  <p>
  <label> Comments :<br></label> &nbsp;
  <textarea name="comment" cols="40" rows="8" required><?php echo $result["comment"]; ?></textarea>
</p>
  <br></br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment" style="margin-left: 88px"> &nbsp;
  <input type="reset">
</form>
</body>
</html>