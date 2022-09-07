<?php 
include 'config.php';

error_reporting(0);
session_start();

/*get the logged in user information*/
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// $get = "SELECT * FROM user WHERE username ='$username'" or die(mysql_error());
// $result_get = mysqli_query($conn, $get);
// $rows = mysqli_fetch_array($result_get);

$email = $_POST['email'];
$firstname = $_POST['FName'];
$lastname = $_POST['LName'];
$address = $_POST['address'];
$DOB = $_POST['birthdate'];

/*check and update the user profile*/
if (isset($_POST['update'])){
    
    if (!$result_get -> num_rows > 0){

        $update = "UPDATE user SET email = '$email', FName = '$firstname', LName = '$lastname', uaddress = '$address', DOB = '$DOB' WHERE username = '$username'";
        
        $result = mysqli_query($conn, $update);

        if ($result){
            echo "<script>alert('Your profile is successfully updated!')</script>";
            header("Location: profile_admin.php");
        }
        
        else{
            echo "<script>alert('Sorry, something went wrong.')</script>";
            header("Location: edit_admin.php");
        }
    }
}
$_POST = array();

?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Edit Profile | Admin</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel = "stylesheet" href = "profile.css">
        <script src="https://kit.fontawesome.com/e3dc0a7e48.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header style = "position: sticky; top: 0;">
            <lable><a style = "font-size: 2rem; font-weight: 800; position: relative; right: 80px">THE KNIGHT BUS BOOKING</a></lable>
            <nav>
                <ul class = "nav__links">
                    <li><a href = "welcome_admin.php" style = "text-decoration: none; position: relative; left: 155px;">Home</a></li>
                    <li><a href = "routing_info.php" style = "position: relative; left: 155px">Route Info</a></li>
                    <li><a href = "confirmation.php" style = "position: relative; left: 155px">Confirmation</a></li>
                    <li><a href = "profile_admin.php" style = "position: relative; left: 155px">Your Profile</a></li>
            </nav>
            <a class = "cta" href = "logout.php"><button style = "text-decoration: none; position: relative; left: 100px">Log out</button></a>
        </header>
    
        <!-- Profile Card-->
        <div class = "box" style = "position: fixed; top: 55px; left: 100px; right: 100px;">
            <!--get the firstname and lastname from database-->
            <label style = "font-size: 1.5rem; font-weight: 400;">Edit Profile</label>
            <form action="edit_admin.php" method="POST" class="login-email">
                <br>
                <div class="input-group"> <!--First Name-->
                    <i class="far fa-user"> ‎ ‎ ‎</i>
                    <input type="text" placeholder= "Firstname" name="FName" style = "width: 300px; height: 25px;" value="<?php echo $firstname; ?>" required>
                </div><br>

                <div class="input-group"> <!--Last Name-->
                    <i class="far fa-user"> ‎ ‎ ‎</i>
                    <input type="text" placeholder= "Lastname" name="LName" style = "width: 300px; height: 25px;" value="<?php echo $lastname; ?>" required>
                </div><br>

                <div class="input-group"> <!--Email-->
                    <i class="far fa-envelope"> ‎ ‎ ‎</i>
                    <input type="text" placeholder= "Email" name="email" style = "width: 300px; height: 25px;" value="<?php echo $email; ?>" required>
                </div><br>

                <div class="input-group"> <!--Address-->
                    <i class="fas fa-map-marker-alt"> ‎ ‎ ‎</i>
                    <input type="text" placeholder= "Address" name="address" style = "line-height: 2.5; width: 300px; height: 25px;" value="<?php echo $address; ?>" required>
                </div>

                <div class="input-group"> <!--Date of Birth-->
                    <i class="fas fa-birthday-cake"> ‎ ‎ ‎</i>
                    <input style = "border: 2px solid #e7e7e7; margin-top: 24px; width: 300px; height: 25px; color: #828282;" type ="date" name="birthdate"><br>
                </div>

                <br><ul class = "nav__links" style = "width: 200px height: 20px;">
                    <li><a style = "font-size: 0.98rem"><button name = "update" href = "profile_admin.php" style = "background: white; color: black; width: 150px; height: 40px; padding-top: 5px; padding-bottom: 5px; margin: 0 auto;">Update ‎ ‎ <i class="far fa-edit"></i></a></li>
                </ul>
            </form>
        </div>

        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> ‎ ‎ ‎ ‎The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>
    </body>
</html>