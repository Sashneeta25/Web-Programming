<?php
	require_once 'database.php';
	if (isset($_SESSION['loggedin']))
    	header("LOCATION: index.php");

    if (isset($_POST['userid'], $_POST['password'])) {
    $UserID = htmlspecialchars($_POST['userid']);
    $Pass = $_POST['password'];

    if (empty($UserID) || empty($Pass)) {
        $_SESSION['error'] = 'Please fill in the blanks.';
    } else {
        $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174559_pt2 WHERE (fld_staff_id = :id OR fld_staff_email = :id) LIMIT 1");
        $stmt->bindParam(':id', $UserID);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($user['fld_staff_id'])) {
            if ($user['fld_staff_password'] == $Pass) {
                unset($user['fld_staff_password']);
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;

                header("LOCATION: index.php");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid login credentials. Please try again.';
            }
        } else {
            $_SESSION['error'] = 'Account does not exist.';
        }
    }

    header("LOCATION: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Welcome To Senorita Fashions</title>
	<link rel="shortcut icon" type="image/x-icon" href="logo.png"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="login/login.css" rel="stylesheet">
</head>
<body>
	<div class="containers">
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
			<p>Welcome To Senorita Fashions<br>The Best Look Anytime, Anywhere!</p>
			<input type="email" placeholder="Email" name="userid"><br>
			<input type="password" placeholder="Password" name="password"><br>
			                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p id='error' class='text-danger text-center'>{$_SESSION['error']}</p>";
                    unset($_SESSION['error']);
                }
                ?>
			<input type="submit" value="Sign in"><br>
		</form>



		<div class="modal-body">
			<div class="list-group">
			<div href="#" class="list-group-item">
			<h4 class="list-group-item-heading">Admin Account</h4>
			<p class="list-group-item-text">
			<dl class="dl-horizontal">
			<dt>Email</dt>
			<!-- <dd>admin@SF.com.my</dd> -->
			<dd>jennifer@gmail.com</dd>
			<dt>Password</dt>
			<dd>Senorita_Fashions@@@</dd>
			</dl>
			</p>
			</div>

						<div href="#" class="list-group-item">
							<h4 class="list-group-item-heading">Normal Staff Account</h4>
							<p class="list-group-item-text">
								<dl class="dl-horizontal">
									<dt>Email</dt>
									<!-- <dd>staff@SF.com.my</dd> -->
									<dd>sasha@gmail.com</dd>
									<dt>Password</dt>
									<dd>SF123!</dd>
								</dl>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>