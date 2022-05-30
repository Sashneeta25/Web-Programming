<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Orders Details</title>
  <style>
    html {
    height:100%;
    }
    body {
    height: 959px;
    background: linear-gradient(to bottom, #ff0066 0%, #ffff66 100%)fixed;
    font-size: 25px;
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
    Order ID: O5603f03a9349f0.39900158<br>
    Order Date: 09-09-2015 <br>
    Staff: Jennifer <br>
    Customer: Justina <br>
    <hr>
    <form action="orders_details.php" method="post">
      Product
      <select name="pid">
        <option value="P01">Lapel Long Sleeve Solid Bow tie Slim Dress</option>
        <option value="P02">O-Neck Floral Lace Maxi Dress</option>
        <option value="P03">Long Sleeves Classic Korean Dress With Belt</option>
      </select>
      Quantity
      <input name="quantity" type="text">
      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tr>
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>
      <tr>
        <td>D5603f136f41334.84833440</td>
        <td>Long Sleeves Classic Korean Dress With Belt</td>
        <td>1</td>
        <td>
          <a class="two" href="orders_details.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>O5603f03a9349f0.39900158</td>
        <td>O-Neck Floral Lace Maxi Dress</td>
        <td>2</td>
        <td>
          <a class="two" href="orders_details.php">Delete</a>
        </td>
      </tr>
    </table>
    <hr>
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>
</body>
</html>