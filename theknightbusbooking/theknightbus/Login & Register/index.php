<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])){
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE username ='$username' AND upassword ='$password'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	$role = $row['urole'];

	if ($result->num_rows > 0){
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		if ($role == "Admin"){
			header("Location: welcome_admin.php");
		}

		else{
			header("Location: Welcome.php");
		}
	} 
	else {
		echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Sign in | The Knight Bus Booking</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign in</p>
			<div class="input-group">
				<input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Sign in</button>
			</div>
			<p class="login-register-text;", style = "text-align:center;">Don't have an account? <a href="register.php" style = "text-decoration: none; color: #6c5ce7; font-weight: 600;">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>