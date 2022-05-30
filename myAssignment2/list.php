<?php
 
include "db.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $conn->prepare("SELECT * FROM assignment2_guestbook");
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
  <title>Assignment 2-My Guestbook</title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 946px;
    background:linear-gradient(to top, #ffccff 0%, #cc6699 100%)fixed;
  }

  a:link, a:visited {
    color: black;
    text-align: center;
    text-decoration: underline;
    display: inline-block;
  }

  a:hover, a:active {
  background-color: #cc99ff
  }

  </style>
</head>
<body>
 
<ol>
<?php
foreach($result as $row) {
  $fav = Array();

  if ($row['frontpage'])
    array_push($fav, "Front page", ","," ");
  if ($row['form'])
    array_push($fav, "Form", ","," ");
  if ($row['userInterface'])
    array_push($fav, "User interface");
  echo "<li>";
  echo "Name : ".$row["user"]."<br>";
  echo "Email : ".$row["email"]."<br>";
  echo "How did you find me : ".$row["howfind"]."<br>";
  echo "I like your: ";
  echo join($fav);
  echo "<br>Date : ".$row["postdate"]."<br>";
  echo "Time : ".$row["posttime"]."<br>";
  echo "Comments : ".$row["comment"]."<br>";
  echo "Action : <a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  echo "</li>";
  echo "<hr>";
}
?>
</ol>
 
</body>
</html>