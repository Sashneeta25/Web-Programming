<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM assignment2_guestbook WHERE id = :record_id");
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
  <title>Assignment 2-My Guestbook</title>
  <style>
      html {
      height:100%;
      }
      body {
      height: 946px;
      background:linear-gradient(to top, #ffccff 0%, #cc6699 100%)fixed;

      }
      form  { 
        display: table;      
      }
      p     {
       display: table-row;  
     }
      label {
       display: table-cell; 
       vertical-align: top;
     }
      input {
       display: table-cell; 
     }

    </style>
</head>
 
<body>
 
<form method="post" action="update.php">
  <p>
  <label> Name : </label>&nbsp;
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  </p>
  <br>
  <p>
  <label> Email : </label>&nbsp;
  <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  </p>
  <br>
  <p>
    <label> How did you find me? </label>&nbsp;
     <select name="howfind" required>
       <!-- <option value = "From a friend">From a friend</option>
        <option value = "I googled you">I googled you</option>
        <option value = "Just surf on in">Just surf on in</option>
        <option value = "From your Facebook">From your Facebook</option>
        <option value = "I clicked an ad">I clicked an ad</option> -->
    <option <?php if ($result["howfind"]=="From a friend") echo "selected" ?>>From a friend</option>
    <option <?php if ($result["howfind"]=="I googled you") echo "selected" ?>>I googled you</option>
    <option <?php if ($result["howfind"]=="Just surf on in") echo "selected" ?>>Just surf on in</option>
    <option <?php if ($result["howfind"]=="From your Facebook") echo "selected" ?>>From your Facebook</option>
    <option <?php if ($result["howfind"]=="I clicked an ad") echo "selected" ?>>I clicked an ad</option>
        </select>
  </p>
  <br>
  <p>
  <label>I like your:</label>
  <input type="checkbox" id="frontpage" name="frontpage" value="Front Page" <?php if ($result['frontpage']) echo "checked"; ?> label for="frontpage" > Front page</label> <br>
  <input type="checkbox" id="form" name="form" value="Form" <?php if ($result['form']) echo "checked"; ?> label for="form"> Form </label><br>
  <input type="checkbox" id="userInterface" name="userInterface" value="User interface" <?php if ($result['userInterface']) echo "checked"; ?> label for="userInterface"> User interface</label>
  </p>
  <br>
  <p>
  <label> Comments :<br> </label>&nbsp;
  <textarea name="comment" cols="40" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  </p>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>
</body>
</html>