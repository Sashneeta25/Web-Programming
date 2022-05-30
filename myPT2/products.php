<?php
  include_once 'products_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Products</title>
  <style>
    div {
      margin-bottom: 10px;
      text-align: center;
      text-align-last: center;
    }
    label {
        display: inline-block;
        width: 80px;
        text-align: justify-all;
        vertical-align: middle;
 
    }
    html {
    height:100%;
    }
    body {
    height: 959px;
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
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

  a.two:hover, a.two:active {
  background-color: pink;
  }

  table { background-color: #ffffcc; }
  tr { background-color: #ffffcc; }
  td { background-color: #ffffcc; }



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
    <form action="products.php" method="post">
      <dl>
      <div>
      <label>Product ID:</label>  
      <input name="pid" type="text" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; ?>"><br></br>
    </div>

      <div>
      <label>Name:</label>
      <input name="name" type="text" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"><br></br>
    </div>

      <div>
      <label>Price:</label>
      <input name="price" type="text" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"><br></br>
    </div>

      <div>
      <label>Quantity:</label>
      <input name="quantity" type="text" required value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"><br></br>
    </div>

      <div>
      <label>Style:</label>
      <select name="style">
        <option value="A-Line"<?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="A-Line") echo "selected"; ?>>A-Line</option>
        <option value="Asymmetrical" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Asymmetrical") echo "selected"; ?>>Asymmetrical</option>
        <option value="Beachwear" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Beachwear") echo "selected"; ?>>Beachwear</option>
        <option value="Cardigan" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Cardigan") echo "selected"; ?>>Cardigan</option>
        <option value="Casual" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Casual") echo "selected"; ?>>Casual</option>
        <option value="Chinese" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Chinese") echo "selected"; ?>>Chinese</option>
        <option value="Fashion" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Fashion") echo "selected"; ?>>Fashion</option>
        <option value="Formal" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Formal") echo "selected"; ?> >Formal</option>
        <option value="Hoodie" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Hoodie") echo "selected"; ?> >Hoodie</option>
        <option value="Indian" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Indian") echo "selected"; ?>>Indian</option>
        <option value="Innerwear" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Innerwear") echo "selected"; ?>>Innerwear</option>
        <option value="Jacket" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Jacket") echo "selected"; ?>>Jacket</option>
        <option value="Malay" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Malay") echo "selected"; ?>>Malay</option>
        <option value="Others" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Others") echo "selected"; ?>>Others</option>
        <option value="Pleated" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Pleated") echo "selected"; ?>>Pleated</option>
        <option value="Sleepwear"<?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Sleepwear") echo "selected"; ?>>Sleepwear</option>
        <option value="Smartcasual" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Smartcasual") echo "selected"; ?> >Smartcasual</option>
        <option value="Sports"<?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Sports") echo "selected"; ?>>Sports</option>
        <option value="Summer"<?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Summer") echo "selected"; ?>>Summer</option>
        <option value="Yoga" <?php if(isset($_GET['edit'])) if($editrow['fld_product_style']=="Yoga") echo "selected"; ?>>Yoga</option>
      </select> <br></br>
    </div>

    <div>
      <label>Ships From:</label>
      <select name="country">
        <option value="India" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="India") echo "selected"; ?>>India</option>
        <option value="Local(Malaysia)"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Local(Malaysia)") echo "selected"; ?>>Local(Malaysia)</option>
        <option value="Mainland China"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Mainland China") echo "selected"; ?>>Mainland China</option>
        <option value="Other Countries" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Other Countries") echo "selected"; ?>>Other Countries</option>
        <option value="Overseas" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Overseas") echo "selected"; ?>>Overseas</option>
        <option value="Singapore"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Singapore") echo "selected"; ?>>Singapore</option>
      </select> <br></br>
    </div>

      <div>
      <label>Material:</label>
      <select name="material">
        <option value="Arcyclic wool" <?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Arcyclic wool") echo "selected"; ?>>Arcyclic wool</option>
        <option value="Chiffon"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Chiffon") echo "selected"; ?>>Chiffon</option>
        <option value="Cotton"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Cotton") echo "selected"; ?>>Cotton</option>
        <option value="Crepe" <?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Crepe") echo "selected"; ?>>Crepe</option>
        <option value="Denim" <?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Denim") echo "selected"; ?>>Denim</option>
        <option value="Georgette"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Georgette") echo "selected"; ?>>Georgette</option>
        <option value="Lace"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Lace") echo "selected"; ?>>Lace</option>
        <option value="Linen"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Linen") echo "selected"; ?>>Linen</option>
        <option value="Mixed Materials(Others)"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Mixed Materials(Others)") echo "selected"; ?>>Mixed Material(Others)</option>
        <option value="Nylon"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Nylon") echo "selected"; ?>>Nylon</option>
        <option value="Polyester"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Polyester") echo "selected"; ?>>Polyester</option>
        <option value="Silk"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Silk") echo "selected"; ?>>Silk</option>
        <option value="Spandex"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Spandex") echo "selected"; ?>>Spandex</option>
        <option value="Viscose"<?php if(isset($_GET['edit'])) if($editrow['fld_product_material']=="Viscose") echo "selected"; ?>>Viscose</option>
      </select><br></br>
    </div>

      <div>
      <label>Product Type:</label>
      <select name="type">
        <option value="Dresses"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Dresses") echo "selected"; ?>>Dresses</option>
        <option value="Lingerie & Nightwear"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Lingerie & Nightwear") echo "selected"; ?>>Lingerie & Nightwear</option>
        <option value="Others"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Others") echo "selected"; ?>>Others</option>
        <option value="Outerwear"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Outerwear") echo "selected"; ?>>Outerwear</option>
        <option value="Pants & shorts"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Pants & shorts") echo "selected"; ?>>Pants & shorts</option>
        <option value="Playsuits & Jumpsuits" <?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Playsuits & Jumpsuits") echo "selected"; ?>>Playsuits & Jumpsuits</option>
        <option value="Plus size"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Plus size") echo "selected"; ?>>Plus size</option>
        <option value="Set wear"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Set wear") echo "selected"; ?>>Set wear</option>
        <option value="Skirts" <?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Skirts") echo "selected"; ?>>Skirts</option>
        <option value="Socks & tights"<?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Socks & tights") echo "selected"; ?>>Socks & tights</option>
        <option value="Sports & Beachwear" <?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Sports & Beachwear") echo "selected"; ?>>Sports & Beachwear</option>
        <option value="Tops" <?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Tops") echo "selected"; ?>>Tops</option>
        <option value="Traditional Wear" <?php if(isset($_GET['edit'])) if($editrow['fld_product_product_Type']=="Traditional Wear") echo "selected"; ?>>Traditional Wear</option>
      </select><br></br>
    </div>
      <div>
        <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </dl>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Product ID</td>
        <td>Name</td>
        <td>Price</td>
        <td>Quantity</td>
        <td>Style</td>
        <td>Ships From</td>
        <td>Material</td>
        <td>Product Type</td>
        <td></td>
      </tr>

        <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a174559_pt2 ORDER BY fld_product_id ASC");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>   
      <tr>
        <td><?php echo $readrow['fld_product_id']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_quantity']; ?></td>
        <td><?php echo $readrow['fld_product_style']; ?></td>
        <td><?php echo $readrow['fld_product_ships_From']; ?></td>
        <td><?php echo $readrow['fld_product_material']; ?></td>
        <td><?php echo $readrow['fld_product_product_Type']; ?></td>
        <td>
         <a class="two" href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>">Details</a>
          <a class="two" href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>">Edit</a>
          <a class="two" href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>   
    </table>
  </center>
</body>
</html>
