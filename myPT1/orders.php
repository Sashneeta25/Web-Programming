<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Orders</title>
    <style>
    div {
      margin-bottom: 10px;
      text-align: center;
    }
    label {
        display: inline-block;
        width: 80px;
        text-align: justify-all;
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
    <form action="orders.php" method="post">
      <dl>
      <div>
      <label>Order ID</label>
      <input name="oid" type="text" disabled> <br></br>
    </div>
    <div>
      <label>Order Date</label>
      <input name="orderdate" type="date" disabled> <br></br>
    </div>
    <div>
      <label>Staff</label>
      <select name="sid">
        <option value="S01">Sasha</option>
        <option value="S02">Shirren</option>
        <option value="S03">Jennifer</option>
      </select> <br></br>
    </div>
    <div>
      <label>Customer</label>
      <select name="cid">
        <option value="C01">Justina</option>
        <option value="C02">Sharveena</option>
        <option value="C03">Sundhary</option>
      </select> <br></br>
    </div>
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </dl>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>
      <tr>
        <td>O5603f03a9349f0.39900158</td>
        <td>09-09-2015</td>
        <td>Jennifer</td>
        <td>Justina</td>
        <td>
          <a class="two" href="orders_details.php">Details</a>
          <a class="two" href="orders.php">Edit</a>
          <a class="two" href="orders.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>