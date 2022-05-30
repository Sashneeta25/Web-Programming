<!DOCTYPE html>
<html>
<head>
  <title>Senorita Fashions-Staffs</title>
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
    <form action="customers.php" method="post">
      <dl>
      <div>
      <label>Staff ID:</label>
      <input name="cid" type="text"> <br></br>
    </div>
    <div>
      <label>Name:</label>
      <input name="fname" type="text"> <br></br>
    </div>
    </div>
      <label>Email:</label>
      <input name="email" type="email"> <br></br>
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
        <td>Staff ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
        <td>S01</td>
        <td>Sasha</td>
        <td>sasha@gmail.com</td>
         <td>0108292289</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S02</td>
        <td>Shirren</td>
        <td>lawrence@hotmail.com</td>
        <td>01131050404</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>S03</td>
        <td>Jennifer</td>
        <td>jennifer@gmail.com</td>
        <td>0197706759</td>
        <td>
          <a class="two" href="customers.php">Edit</a>
          <a class="two" href="customers.php">Delete</a>
        </td>
      </tr>
    </table>
  </center>
</body>
</html>