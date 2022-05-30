<?php
 
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
  header("LOCATION: login.php");
$extention = ['jpg', 'jpeg','gif'];
function uploadPhoto($file, $id)
{
  global $extention;
  $target_dir = "products/";
  $imageFileType = strtolower(pathinfo(basename($file["name"]), PATHINFO_EXTENSION));
  
  $newfilename = "{$id}.{$imageFileType}";

  if ($file['error'] == 4)
    return 4;
    // Check if image file is a actual image or fake image
  if (!getimagesize($file['tmp_name']))
    return 0;
    // Check file size
  if ($file["size"] > 10000000)
    return 1;
    // Allow certain file formats
  if (!in_array($imageFileType, $extention))
    return 2;

  if (!move_uploaded_file($file["tmp_name"], $target_dir.$newfilename))
    return 3;

  return array('status' => 200, 'name' => $newfilename, 'ext' => $imageFileType);
}
 
 
//Create
if (isset($_POST['create'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
    $uploadStatus = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);
    if (isset($uploadStatus['status'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a174559_pt2(fld_product_id,
        fld_product_name, fld_product_price, fld_product_quantity, fld_product_style,
        fld_product_ships_From, fld_product_material,fld_product_product_Type,fld_product_image)VALUES(:pid, :name, :price, :quantity,
        :style, :ship, :material, :type, :image)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':style', $style, PDO::PARAM_STR);
      $stmt->bindParam(':ship', $ships_From, PDO::PARAM_STR);
      $stmt->bindParam(':material', $material, PDO::PARAM_STR);
      $stmt->bindParam(':type', $product_type, PDO::PARAM_STR);
      $stmt->bindParam(':image', $uploadStatus['name']);

       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity =  $_POST['quantity'];
    $style = $_POST['style'];
    $ships_From = $_POST['country'];
    $material = $_POST['material'];
    $product_type = $_POST['type'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while Creating: " . $e->getMessage();
  }
}else {
      if ($uploadStatus == 0)
        $_SESSION['error'] = "Please make sure the file uploaded is an image.";
      elseif ($uploadStatus == 1)
        $_SESSION['error'] = "Sorry, only file below 10MB are allowed.";
      elseif ($uploadStatus == 2)
        $_SESSION['error'] = "Sorry, only ".join(", ",$extention)." files are allowed.";
      elseif ($uploadStatus == 3)
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
      elseif ($uploadStatus == 4)
        $_SESSION['error'] = 'Please upload an image.';
      elseif ($uploadStatus == 5)
        $_SESSION['error'] = 'File already exists. Please rename your file before upload.';
      else
        $_SESSION['error'] = "An unknown error has been occurred.";
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to create a new product.";
  }
  header("LOCATION: {$_SERVER['REQUEST_URI']}");
  exit();
}
 
//Update
if (isset($_POST['update'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a174559_pt2 SET
        fld_product_name = :name, fld_product_price = :price, fld_product_quantity = :quantity,
        fld_product_style = :style, fld_product_ships_From = :ship, fld_product_material = :material, fld_product_product_Type = :type
        WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_STR);
      $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
      $stmt->bindParam(':style', $style, PDO::PARAM_STR);
      $stmt->bindParam(':ship', $ships_From, PDO::PARAM_STR);
      $stmt->bindParam(':material', $material, PDO::PARAM_STR);
      $stmt->bindParam(':type', $product_type, PDO::PARAM_STR);
     // $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity =  $_POST['quantity'];
    $style = $_POST['style'];
    $ships_From = $_POST['country'];
    $material = $_POST['material'];
    $product_type = $_POST['type'];
    //$oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
   $flag  = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);

      if (isset($flag['status'])){
        $stmt = $conn->prepare("UPDATE tbl_products_a174559_pt2 SET fld_product_image = :image WHERE fld_product_id = :pid LIMIT 1");
        $stmt->bindParam(':image', $flag['name']);
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
        //kt product.php line 138
        if(pathinfo(basename($_POST['filename']), PATHINFO_EXTENSION)!=$flag['ext'])
          unlink("products/{$_POST['filename']}");
      } elseif ($flag != 4) {
        if ($flag == 0)
          $_SESSION['error'] = "Please make sure the file uploaded is an image.";
        elseif ($flag == 1)
          $_SESSION['error'] = "Sorry, only file below 10MB are allowed.";
        elseif ($flag == 2)
          $_SESSION['error'] = "Sorry, only ".join(", ",$extention)." files are allowed.";
        elseif ($flag == 3)
          $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        else
          $_SESSION['error'] = "An unknown error has been occurred.";
      }
      clearstatcache(); //just incase cache isnt cleared
    }
    catch(Exception $e){
      $_SESSION['error'] = "Error while Updating: " . $e->getMessage();
    }
  }
  else {
    $_SESSION['error'] = "Sorry, but you don't have permission to update this product.";
    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
  }

  if (isset($_SESSION['error']))
    header("LOCATION: {$_SERVER['REQUEST_URI']}");
  else
    header("Location: {$_SERVER['PHP_SELF']}");
  exit();
}

//Delete
if (isset($_GET['delete'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
 
  try {
      $pid = $_GET['delete'];
      $query = $conn->query("SELECT fld_product_image FROM tbl_products_a174559_pt2 WHERE fld_product_id = '{$pid}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
     
    if (isset($query['fld_product_image'])) {
      // Delete Query
        $stmt = $conn->prepare("DELETE FROM tbl_products_a174559_pt2 WHERE fld_product_id = :pid");
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
      // Delete Image
        unlink("products/{$query['fld_product_image']}");
      }
    }
    catch(PDOException $e)
    {
      $_SESSION['error'] = "Error while Deleting: " . $e->getMessage();
    }
  } else {
    $_SESSION['error'] = "Sorry, but you don't have permission to delete this product.";
  }
  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
 
//Edit
if (isset($_GET['edit'])) {
  if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'Admin') {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174559_pt2 WHERE fld_product_id = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      $_SESSION['error'] = "Error while Editing: " . $e->getMessage();
  }
}
 else {
    $_SESSION['error'] = "Sorry, but you don't have permission to edit a product.";
  }
  if (isset($_SESSION['error'])) {
    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
  }
}

$num = $conn->query("SELECT MAX(fld_product_id) AS pid FROM tbl_products_a174559_pt2")->fetch()['pid'];
if ($num){
  $num = ltrim($num, 'P')+1;
  $num = 'P'.str_pad($num,2,"0",STR_PAD_LEFT);
  
}
else{
  $num = 'P'.str_pad(1,2,"0",STR_PAD_LEFT);
}

?>
