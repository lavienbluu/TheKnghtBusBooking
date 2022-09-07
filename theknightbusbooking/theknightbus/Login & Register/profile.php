<?php 
include 'config.php';

session_start();

$username = $_SESSION['username'];
$password = $_SESSION['password'];

$get = "SELECT * FROM user WHERE username ='$username' AND upassword ='$password'" or die(mysql_error());
$result_get = mysqli_query($conn, $get);
$rows = mysqli_fetch_array($result_get);
?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Profile | The Knight Bus Booking</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "profile.css">
        <script src="https://kit.fontawesome.com/e3dc0a7e48.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header style = "position: sticky; top: 0;">
            <lable><a style = "font-size: 2rem; font-weight: 800; position: relative; right: 80px">THE KNIGHT BUS BOOKING</a></lable>
            <nav>
                <ul class = "nav__links">
                    <li><a href = "welcome.php" style = "text-decoration: none; position: relative; left: 155px;">Home</a></li>
                    <li><a href = "Booking.php" style = "position: relative; left: 155px">Booking</a></li>
                    <li><a href = "history.php" style = "position: relative; left: 155px">Booking History</a></li>
                    <li><a href = "profile.php" style = "position: relative; left: 155px">Your Profile</a></li>
            </nav>
            <a class = "cta" href = "logout.php"><button style = "text-decoration: none; position: relative; left: 100px">Log out</button></a>
        </header>
    
        <!-- Profile Card-->
        <div class = "box" style = "position: fixed; right: 100px; left: 100px; top: 67px;">
            <?php if($rows["gender"]=="Male"):?>
                <input type = "image" img src = "wizard.png" alt = "wizard" width = "90" height = "90" class = "box-image"/>

            <?php elseif($rows["gender"]=="Female"):?>
                <input type = "image" img src = "witch.png" alt = "witch" width = "90" height = "90" style = "position: relative; right: 5px;" class = "box-image">

            <?php endif?>

            <!--get username of logged in user from database-->                
            <h1 style = "line-height: 2.5rem; font-size: 1.5rem; text-weight: 400px;">
                <?php echo $rows["username"] ;?>
            </h1>

            <!--get the role from database-->
            <p style = "font-size: 1.2rem; line-height: 1.2rem; font-weight: 400px;"><?php if($rows["gender"]=="Male"){?> Wizard<br><br></p><?php } ?>
            <p style = "font-size: 1.2rem; line-height: 1.2rem; font-weight: 400px;"><?php if($rows["gender"]=="Female"){?> Witch<br><br></p><?php } ?>
                    
            <!--get the firstname and lastname from database-->
            <p style = "font-size: 1rem; line-height: 2rem"><i class="far fa-user"></i>‎ ‎ ‎ <?php echo $rows["FName"]." ".$rows["LName"]?></p>
            <p style = "font-size: 1rem; line-height: 2rem;"><i class="far fa-envelope"></i> ‎ ‎ <?php echo $rows["email"]?></p>
            <p style = "font-size: 1rem; line-height: 2rem;"><i class="fas fa-map-marker-alt"></i> ‎ ‎ <?php echo $rows["uaddress"]?></p>
            <p style = "font-size: 1rem; line-height: 2rem;"><i class="fas fa-birthday-cake"></i> ‎ ‎ <?php echo $rows["DOB"]?></p><br>

            <ul class = "nav__links" style = "width: 200px; height: 20px; margin: 0 auto; position: relative; right: 20px; margin-bottom: 10px;">
                <li><a href = "edit_profile.php" style = "font-size: 1rem; line-height: 2rem;"><button name = "update" href = "profile.php" style = "background: white; color: black; width: 200px; height: 40px; padding: 0px; margin: 0 auto;">Edit Profile ‎ ‎ <i class="far fa-edit"></i></a></li><br>
        </div>

        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> ‎ ‎ ‎ ‎The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>
    </body>
</html>