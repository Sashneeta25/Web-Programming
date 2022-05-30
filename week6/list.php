<?php
 
 session_start();
 
  if (isset($_SESSION['new_id']))
    $myid = $_SESSION['new_id'];
  else
    $myid = "";

include "db.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $conn->prepare("SELECT * FROM week6_guestbook");
    $stmt->execute();
 
    $result = $stmt->fetchAll();
 
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 
$conn = null;
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

  a:link, a:visited {
    color: black;
    text-align: center;
    text-decoration: underline;
    display: inline-block;
  }

  a:hover, a:active {
  background-color: #ffff66;
  }

  </style>
</head>
<body>
 
<ol>
<?php
foreach($result as $row) {
  echo "<li>";
  echo "Name : ".$row["user"]."<br>";
  echo "Email : ".$row["email"]."<br>";
  echo "Date : ".$row["postdate"]."<br>";
  echo "Time : ".$row["posttime"]."<br>";
  echo "Comments : ".$row["comment"]."<br>";

  if ($row['id'] == $myid && $row['picture'] == "") {
    echo '<form action="upload.php" method="post" enctype="multipart/form-data">';
    echo "<input type='hidden' name='id' value='".$row['id']."' />";
    echo "<input type='file' name='fileToUpload' id='fileToUpload' required>";
    echo "<input type='submit' value='Upload Image' name='submit'>";
    echo "</form>";
  }

  if($row['picture'] != ""){
    //echo "Successfully Uploaded!";
    echo '<img src="'.$row['picture'].'"><br />';
  }
  echo "Action : <a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  echo "</li>";
  echo "<hr>";
}
?>
</ol>
 
</body>
</html>