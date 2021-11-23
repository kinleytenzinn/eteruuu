<html>
<?php 
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	//$email = $_POST['email'];
	$MSISDN = $_POST['MSISDN'];
	//$user_id = $_POST['user_id'];
	$USER_ID= $_POST['USER_ID'];	

	//$sql = "SELECT * FROM userr WHERE email='$email' AND password='$password'";
	//$sql = "SELECT * FROM MFS_USER_MASTER_1 WHERE MSISDN='$MSISDN' AND USER_ID='$USER_ID'";
	$sql = "SELECT * FROM MFS_USER_MASTER_1 WHERE USER_ID='$USER_ID' AND MSISDN='$MSISDN'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['user_id'] = $row['user_id']; //put user id in session
		$_SESSION['username'] = $row['username']; //put user id in session
		$_SESSION['MSISDN'] = $row['MSISDN']; //put user id in session
		$_SESSION['FIRST_NAME'] = $row['FIRST_NAME']; //put user id in session
		$_SESSION['LAST_NAME'] = $row['LAST_NAME']; //put user id in session
		//$_SESSION['PROFILE_ID'] = $row['PROFILE_ID']; //put user type in session
		//$_SESSION['USER_STATUS'] = $row['USER_STATUS']; //put user type in session
		//$_SESSION['ENTITY_TYPE'] = $row['ENTITY_TYPE']; //put user type in session
		$_SESSION['USER_ID'] = $row['USER_ID'];
		$_SESSION["testsession"] = "testsessionid";
		header("Location: welcome.php");//landing success page 
	} else {
		echo "<script>alert('Woops! Phone number or User id is Wrong.')</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="stl.css">


	<title>Reports</title>
<body>
	<h1 class="ma" style=margin-left:70px;> Tashicell eTeeru Report Login</h1>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<img src="ppp.jpg" alt="Paris" class="img">
			
			<!--<div class="input-group">
				<input type="email" placeholder="Email" name="email" value=" " required>
			</div>-->
			<div class="input-group">
				<input type="password" style="text-align:center;" placeholder="Enter your phone number" name="MSISDN" value="<?php echo $MSISDN; ?>" required>
			</div>

			<div class="input-group">
				<input type="password" style="text-align:center;" placeholder=" Enter your user id" name="USER_ID" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text"> <a href="rregister.php"></a></p>
		</form>
	</div>
	</div>
</body>
</html>
