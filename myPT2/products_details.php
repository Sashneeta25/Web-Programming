<?php
  include_once 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Products Details</title>
  <style>
    div {
      margin-bottom: 10px;
      text-align: center;

    }
    html {
    height:100%;
    }
    body {
    height: 959px;
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
    font-size: 22px;
  }

 

  a.one:link{font-size:30px}
 

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
  <center>
    <a class="one" href="index.php">Home</a> |
    <a class="one" href="products.php">Products</a> |
    <a class="one" href="customers.php">Customers</a> |
    <a class="one" href="staffs.php">Staffs</a> |
    <a class="one" href="orders.php">Orders</a>
    <hr>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174559_pt2 WHERE fld_product_id = :pid ORDER BY fld_product_id ASC");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    Product ID: <?php echo $readrow['fld_product_id'] ?> <br>
    Name: <?php echo $readrow['fld_product_name'] ?> <br>
    Price: RM <?php echo $readrow['fld_product_price'] ?> <br>
    Quantity: <?php echo $readrow['fld_product_quantity'] ?> <br>
    Style: <?php echo $readrow['fld_product_style'] ?> <br>
    Ships From: <?php echo $readrow['fld_product_ships_From'] ?> <br>
    Material: <?php echo $readrow['fld_product_material'] ?> <br>
    Product Type: <?php echo $readrow['fld_product_product_Type'] ?> <br>
    <img src="products/<?php echo $readrow['fld_product_image'] ?>" width="26%" height="26%">
  </center>
</body>
</html>