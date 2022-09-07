<?php 

include 'config.php';

error_reporting(0);
session_start();

//check connection
/*if(!$conn){
	die("Connection failed!" .mysqli_connect_error());
}
else{
	die("Connected successfully!");
}*/

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {

	//Get information from what users fill in the registration process
	$num = "SELECT MAX(idUser) AS user_num FROM user";
	$get_num = mysqli_query($conn, $num);
	$row = mysqli_fetch_array($get_num);
	$id = $row["user_num"]+1;
	$username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
    $firstname = $_POST["FName"];
    $lastname = $_POST["LName"];
    $address = $_POST["address"];
    $DOB = $_POST["birthdate"];
    $gender = $_POST["gender"];
	$role = "";

	if ($password == $cpassword) {
		$sql = "SELECT * FROM user WHERE username = '$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO user (idUser, username, upassword, cpassword, email, FName, LName, uaddress, gender, DOB, urole)
			VALUES  ('$id','$username','$password','$cpassword','$email', '$firstname', '$lastname', '$address', '$gender', '$DOB', '$role')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$firstname = "";
				$lastname = "";
				$address = "";

			} 
			else {
				echo "<script>alert('Woops! Something Went Wrong.')</script>";
			}
		} 
		else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} 
	else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
$_POST = array();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Register | The Knight Bus Booking</title>
</head>

<style>
	div.b {
		line-height: 1.6;
	}
</style>

<body>
	<div class="container" style = "margin-top: 80px; margin-bottom: 80px;"> <!--fill the personal information-->
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group"> <!--username-->
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>

			<div class="input-group"> <!--password-->
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>

            <div class="input-group"> <!--confirm password-->
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			
			<div class="input-group"> <!--email-->
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="input-group"> <!--First Name-->
				<input type="text" placeholder="Firstname" name="FName" value="<?php echo $firstname; ?>" required>
			</div>

			<div class="input-group"> <!--Last Name-->
				<input type="text" placeholder="Lastname" name="LName" value="<?php echo $lastname; ?>" required>
			</div>

			<div class="input-group"> <!--Address-->
				<input type="text" placeholder="Address" name="address" value="<?php echo $address; ?>" required>
			</div>
			
			<div class="input-group", style = "line-height: 1.5; color: #828282"> <!--Date of Birth-->
				<label> ‎ ‎ ‎ ‎ ‎ Birth Date</label>
				<input style = "color: #828282; border: 2px solid #e7e7e7; margin-top: 10px;" type ="date" name="birthdate">
			</div>
			
			<div class="input-group" style = "line-height: 5; color: #828282;"> <!--Gender-->
				<label for="gender"> ‎ ‎ ‎ ‎ ‎ ‎Gender ‎ ‎‎</label>
					<select name="gender" id="gender" style = "color: #828282; border: 2px solid #e7e7e7; text-align: center;">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
			</div>

			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text", style = "text-align:center;">Have an account? <a href="index.php">Sign in Here</a>.</p>
		</form>
	</div>
</body>
</html>