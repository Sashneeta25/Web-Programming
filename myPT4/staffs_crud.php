<?php
 
include_once 'database.php';
if (!isset($_SESSION['loggedin']))
  header("LOCATION: login.php");

//CREATE

if (isset($_POST['create'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
    try {
 
        $stmt = $conn->prepare("INSERT INTO tbl_staffs_a174559_pt2(fld_staff_id, fld_staff_name,fld_staff_phone,fld_staff_email,fld_staff_password, fld_staff_role) VALUES(:sid, :name,:phone,:email , :pass, :role)");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    
    
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
   
         
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while creating: " . $e->getMessage();
  }
} else {
    $_SESSION['error'] = "Sorry, but you don't have permission to create a new staff.";
  }

  header("LOCATION: {$_SERVER['REQUEST_URI']}");
  exit();
}
 
//UPDATE
if (isset($_POST['update'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_staffs_a174559_pt2 SET
      fld_staff_id = :sid, 
      fld_staff_name = :name,
      fld_staff_phone = :phone,
      fld_staff_email = :email,
      fld_staff_password = :pass,
      fld_staff_role = :role
      WHERE fld_staff_id = :oldsid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':oldsid', $oldsid, PDO::PARAM_STR);
       
    $sid = $_POST['sid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    $oldsid = $_POST['oldsid'];
         
    $stmt->execute();
}
    catch(PDOException $e){
      $_SESSION['error'] = "Error while updating: " . $e->getMessage();
      header("LOCATION: {$_SERVER['REQUEST_URI']}");
      exit();
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to update staff.";
  }

  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
 
//DELETE
if (isset($_GET['delete'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_staffs_a174559_pt2 where fld_staff_id = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['delete'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error: " . $e->getMessage();
  }
} else {
    $_SESSION['error'] = "Sorry, but you don't have permission to delete staff.";
  }

  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
 
//EDIT
if (isset($_GET['edit'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
   
  try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174559_pt2 where fld_staff_id = :sid");
   
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
       
    $sid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error: " . $e->getMessage();
      header("LOCATION: {$_SERVER['PHP_SELF']}");
      exit();
  }
}
 else {
    $_SESSION['error'] = "Sorry, but you don't have permission to edit a staff.";
    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
  }
}

$num = $conn->query("SELECT MAX(fld_staff_id) AS pid FROM tbl_staffs_a174559_pt2")->fetch()['pid'];

if ($num){
  $num = ltrim($num, 'S')+1;
  $num = 'S'.str_pad($num,2,"0",STR_PAD_LEFT);
}
else{
  $num = 'S'.str_pad(1,2,"0",STR_PAD_LEFT);
}

?>
