<?php
  include_once 'customers_crud.php';
?><!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Customers</title>
  <style>
    div {
      margin-bottom: 10px;
      text-align: center;
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
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%) fixed;
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
    <form action="customers.php" method="post">
      <dl>
      <div>
      <label>Customer ID:</label>
      <input name="cid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_id']; ?>"> <br></br>
    </div>
    <div>
      <label>Name:</label>
      <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>"> <br></br>
    </div>
      <label>Phone Number:</label>
      <input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>"> <br></br>
    </div>
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_id']; ?>">
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
        <td>Customer ID</td>
        <td>Name</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
       <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a174559_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_customer_id']; ?></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>
        <td>
          <a class="two" href="customers.php?edit=<?php echo $readrow['fld_customer_id']; ?>">Edit</a>
          <a class="two" href="customers.php?delete=<?php echo $readrow['fld_customer_id']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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