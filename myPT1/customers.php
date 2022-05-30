<!DOCTYPE html>
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
      <input name="cid" type="text"> <br></br>
    </div>
    <div>
      <label>Name:</label>
      <input name="fname" type="text"> <br></br>
    </div>
      <label>Phone Number:</label>
      <input name="phone" type="text"> <br></br>
    </div>
      <button type="submit" name="create">Create</button>
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
        <td>C01</td>
        <td>Justina</td>
        <td>0162104404</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C02</td>
        <td>Sharveena</td>
        <td>0187938148</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>C03</td>
        <td>Sundhary</td>
        <td>0137706759</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>