<?php
 
include_once 'database.php';
 
if (!isset($_SESSION['loggedin']))
  header("LOCATION: login.php");

//Create
if (isset($_POST['create'])) {
 
  try {
 
    $stmt = $conn->prepare("INSERT INTO tbl_orders_a174559_pt2(fld_order_id, fld_staff_id,
      fld_customer_id) VALUES(:oid, :sid, :cid)");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $oid = uniqid('O', true);
    $sid = $_POST['sid'];
    $cid = $_POST['cid'];
     
    $stmt->execute();
    header("Location: orders.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
   
  try {
 
    $stmt = $conn->prepare("UPDATE tbl_orders_a174559_pt2 SET fld_staff_id = :sid,
      fld_customer_id = :cid WHERE fld_order_id = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
    $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
       
    $oid = $_POST['oid'];
    $sid = $_POST['sid'];
    $cid = $_POST['cid'];
     
    $stmt->execute();
  }
 
  catch(PDOException $e)
  {
     $_SESSION['error'] = "Error while Updating: " . $e->getMessage();
      header("LOCATION: {$_SERVER['REQUEST_URI']}");
      exit();
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to update this order.";
  }
  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}

//Delete
if (isset($_GET['delete'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
 
  try {
 
    $stmt = $conn->prepare("DELETE FROM tbl_orders_a174559_pt2 WHERE fld_order_id = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
       
    $oid = $_GET['delete'];
     
    $stmt->execute();
  }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while Deleting: " . $e->getMessage();
  }
}else {
    $_SESSION['error'] = "Sorry, but you don't have permission to delete order.";
  }
  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
 
//Edit
if (isset($_GET['edit'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
   
    try {
 
    $stmt = $conn->prepare("SELECT * FROM tbl_orders_a174559_pt2 WHERE fld_order_id = :oid");
   
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
       
    $oid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while Editing: " . $e->getMessage();
      header("LOCATION: {$_SERVER['PHP_SELF']}");
      exit();
  }
}else {
    $_SESSION['error'] = "Sorry, but you don't have permission to edit a order.";
    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
  }
}

?>