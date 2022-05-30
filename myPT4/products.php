<?php
include_once 'products_crud.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Senorita Fashions-Products</title>
	<?php include_once 'nav_bar.php';?>
	<style type="text/css"></style>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
	<style type="text/css">
		tr .btn{
			width: 100%;
			margin: 5px 0;
		}
		input[type="file"] {
			display: none;
		}
		td img {cursor: pointer;}
		body {
            height: 959px;
            background: linear-gradient(to top, #ff0066 0%, #ffff66 100%)fixed;
            padding-bottom: 20px;
        }

	</style>
</head>
<body>
	<div class="container-fluid">
		<?php if($_SESSION['user']['fld_staff_role'] == 'Admin'){ ?>
			<div class="container">
				<div class="row" id="form">
					<div class="page-header">
						<h2>Create New Product</h2>
					</div>
					<?php
						if (isset($_SESSION['error'])) {
							echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
							unset($_SESSION['error']);
						}
					?>
					<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data" style="backdrop-filter: blur(10px);">
						<div class="col-md-8">
							<div class="form-group">
								<label for="pid" class="col-sm-3 control-label">ID</label>
								<div class="col-sm-9">
									<input name="pid"class="form-control" type="text" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_id']; else echo $num?>" readonly> 
								</div>
							</div>

							<div class="form-group">
								<label for="productname" class="col-sm-3 control-label">Name</label>
								<div class="col-sm-9">
									<input name="name" class="form-control" type="text" placeholder="Product Name" id="productname" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name'];?>" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="productprice" class="col-sm-3 control-label">Price</label>
								<div class="col-sm-9">
									<input name="price" class="form-control" type="number" min="0" step="0.01" placeholder="Product Price" id="productprice" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="productq" class="col-sm-3 control-label">Quantity</label>
								<div class="col-sm-9">
									<input type="number" placeholder="Product Quantity" class="form-control" name="quantity" id="productq" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>" required> 
								</div>
							</div>

							<div class="form-group">
          						<label for="productstyle" class="col-sm-3 control-label">Style</label>
          						<div class="col-sm-9">
     								 <select name="style" class="form-control" id="productstyle" required>
        								<option value="">Please select</option>
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
      								</select> 
    							</div>
 							 </div>

    						<div class="form-group">
         						<label for="productshipsfrom" class="col-sm-3 control-label">Ships From</label>
          						<div class="col-sm-9">
      								<select name="country" class="form-control" id="productshipsfrom" required>
        								<option value="">Please select</option>
        								<option value="India" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="India") echo "selected"; ?>>India</option>
        								<option value="Local(Malaysia)"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Local(Malaysia)") echo "selected"; ?>>Local(Malaysia)</option>
       									<option value="Mainland China"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Mainland China") echo "selected"; ?>>Mainland China</option>
        								<option value="Other Countries" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Other Countries") echo "selected"; ?>>Other Countries</option>
        								<option value="Overseas" <?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Overseas") echo "selected"; ?>>Overseas</option>
        								<option value="Singapore"<?php if(isset($_GET['edit'])) if($editrow['fld_product_ships_From']=="Singapore") echo "selected"; ?>>Singapore</option>
      								</select> 
    							</div>
  							</div>

      <div class="form-group">
          <label for="productmaterial" class="col-sm-3 control-label">Material</label>
          <div class="col-sm-9">
      <select name="material" class="form-control" id="productmaterial" required>
        <option value="">Please select</option>
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
      </select>
    </div>
  </div>

      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Product Type</label>
          <div class="col-sm-9">
      <select name="type" class="form-control" id="producttype" required>
        <option value="">Please select</option>
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
      </select>
    </div>
  </div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-9">
									<?php 
										if (isset($_GET['edit'])) { ?>
											<input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_id']; ?>">
											<button class="btn btn-default" type="submit" name="update">
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
											<?php 
										}else{ ?>
											<button class="btn btn-default" type="submit" name="create">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
											<?php 
										} ?>
									<button class="btn btn-default"  type="reset">
									<span class="glyphicon glyphicon-erase" aria-hidden="true"></span>Clear</button>
								</div>
							</div>

						</div>
						<div class="col-md-4" style="height: 100%">
							<div class="thumbnail dark-1">
								<img src="products/<?php echo(isset($_GET['edit']) ? $editrow['fld_product_image'] : '') ?>"
									 onerror="this.onerror=null;this.src='products/NoImage.jpg';" id="productPhoto"
									 alt="Product Image" style="width: 100%;height: 225px;">
								<div class="caption text-center">
									<h3 id="productImageTitle" style="word-break: break-all;">Product Image</h3>
									<p>
										<label class="btn btn-primary">
											<input type="file" accept="image/*" name="fileToUpload" id="inputImage"
												   onchange="loadFile(event);"/>
											<input type="hidden" name="filename" value="<?php echo $editrow['fld_product_image']; ?>">
											<span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Browse
										</label>
										<!-- <?php
										?> -->
									</p>
								</div>
							</div>
						</div>

					</form>	
					<!-- <?php 
					?> -->
				</div>
			</div>
		<?php } ?>

		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="page-header">
					<h2>Products List</h2>
				</div>
				<table id="productlist" class="table-dark table-striped table-bordered hover" id="table">
					<thead>
					<tr>
						<th>Product ID</th>
						<th>Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Style</th>
						<!-- <th>Description</th> -->
						<th>Ships From</th>
						<th>Material</th>
						<th>Product Type</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
					<?php
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT * FROM tbl_products_a174559_pt2");
						$stmt->execute();
						$result = $stmt->fetchAll();
					}
					catch(PDOException $e){
						echo "Error: " . $e->getMessage();
					}
					foreach($result as $readrow) {
						?>   
						<tr>
							<td><?php echo $readrow['fld_product_id'];?></td>
							<td><?php echo $readrow['fld_product_name']; ?></td>
							<td><?php echo 'RM'.$readrow['fld_product_price']; ?></td>
							<td><?php echo $readrow['fld_product_quantity']; ?></td>
							<td><?php echo $readrow['fld_product_style']; ?></td>
							<!-- <td><?php //echo $readrow['fld_product_description']; ?></td> -->
							<td><?php echo $readrow['fld_product_ships_From']; ?></td>
							<td><?php echo $readrow['fld_product_material']; ?></td>
							<td><?php echo $readrow['fld_product_product_Type']; ?></td>
							

							<td>
								<a href="products_details.php?pid=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
								<?php
									if($_SESSION['user']['fld_staff_role'] == 'Admin'){ ?>
										<a href="products.php?edit=<?php echo $readrow['fld_product_id']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
										<a href="products.php?delete=<?php echo $readrow['fld_product_id']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
								<?php } ?>
							</td>
						</tr>

						<?php
					}
					$conn = null;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="application/javascript">
	var loadFile = function (event) {
		var reader = new FileReader();
		reader.onload = function () {
			var output = document.getElementById('productPhoto');
			output.src = reader.result;
		};
		reader.readAsDataURL(event.target.files[0]);
		document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
	};

	$(document).ready(function () {
		$("#productlist").DataTable({
		"lengthMenu": [[5, 20, 50, -1], [5, 20, 50, "All"]]
	});
	});
</script>
</body>
</html>