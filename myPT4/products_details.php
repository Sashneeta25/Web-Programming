<?php
  include_once 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Senorita Fashions-Products Details</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
  <link rel="shortcut icon" type="image/x-icon" href="logo.png"/>
  <style>
   
    html {
    height:100%;
    }
    body {
    height: 959px;
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
  }

  </style>
</head>
<body>
  <?php include_once 'nav_bar.php'; ?>

    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174559_pt2 WHERE fld_product_id = :pid");
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

    <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
      <?php if(file_exists('products/'. $readrow['fld_product_image'])){
          echo '<img style="width:100%" src="products/'.$readrow['fld_product_image'].'" class="img-responsive">';
        }
        else{
          echo '<img src="products/NoImage.jpg"'.' class="img-responsive">';
        }?>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['fld_product_id'] ?></td>
        </tr>
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['fld_product_name'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['fld_product_price'] ?></td>
        </tr>
        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $readrow['fld_product_quantity'] ?></td>
        </tr>
        <tr>
          <td><strong>Style</strong></td>
          <td><?php echo $readrow['fld_product_style'] ?></td>
        </tr>
        <tr>
          <td><strong>Ships From</strong></td>
          <td><?php echo $readrow['fld_product_ships_From'] ?></td>
        </tr>
        <tr>
          <td><strong>Material</strong></td>
          <td><?php echo $readrow['fld_product_material'] ?></td>
        </tr>
        <tr>
          <td><strong>Product Type</strong></td>
          <td><?php echo $readrow['fld_product_product_Type'] ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 
</body>
</html>
