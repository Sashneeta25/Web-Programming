<?php
include_once 'database.php';
?>
<link rel="shortcut icon" type="image/x-icon" href="logo.png"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="style.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Senorita Fashions</a>
    </div>
    <div class="navbar-brand" id="roles"><?php echo $_SESSION['user']['fld_staff_role'].' : '.$_SESSION['user']['fld_staff_name']?></div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="products.php">Products</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="staffs.php">Staffs</a></li>
        <li><a href="orders.php">Orders</a></li>
        <li><a href="logout.php" data-toggle="navbar-right" id="out"><span class="glyphicon glyphicon-log-out"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  $(function(){
    $("#out").tooltip({
        placement: "bottom",
        title: "Log Out"
    });
});
</script>