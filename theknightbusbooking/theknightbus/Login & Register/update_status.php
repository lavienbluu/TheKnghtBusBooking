<?php 
include 'config.php';

if(isset($_POST["update"]) && isset($_GET["idTicket"])){
    $idTicket = $_GET["idTicket"];
    $status = $_POST["status"];

    $update_status = "UPDATE Ticket SET BookingStatus = '$status' WHERE idTicket = '$idTicket'";
    $resultt = mysqli_query($conn,$update_status);

    if($resultt){
        header("Location: confirmation.php");
    }
    else{
        echo "Confirm failed!";
        echo $mysqli -> error;
    }
}

if (isset($_GET["idTicket"])){

    $idTicket = $_GET["idTicket"];
    $query = "SELECT * FROM Ticket WHERE idTicket = '$idTicket'";
    $result = mysqli_query($conn, $query);
  
    if (!$result){
        echo "Select failed!<br/>";
        echo $mysqli->error;
    } else {
        $ticket = $result->fetch_array();
    }
  }
?>


<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Update Status | Admin</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "profile.css">
        <script src="https://kit.fontawesome.com/e3dc0a7e48.js" crossorigin="anonymous"></script>

        <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: lightgray;
            color: black;
            text-align: center;
        }
        </style>

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

        <div class = "box" style = "position: fixed; top: 95px; left: 100px; right: 100px;">
            <!--get the firstname and lastname from database-->
            <label style = "font-size: 1.4rem; font-weight: 500;">Update Payment Status</label>
            <form action="update_status.php?idTicket=<?php echo "$idTicket"?>" method="POST" class="login-email">

                <!--Ticket ID-->
                <p style = "text-align: left; margin-left: 20px; margin-top: 20px;">Ticket ID:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["idTicket"];?>‎</a>

                <!--User ID-->
                <p style = "text-align: left; margin-left: 20px;">User ID:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["idUser"];?>‎</a>

                <!--Departure date-->
                <p style = "text-align: left; margin-left: 20px;">Departure Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["DepartureDate"];?>‎</a>
                
                <!--Bus ID-->
                <p style = "text-align: left; margin-left: 20px;">Bus ID:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["Bus"];?>‎</a>

                <!--Bed ID-->
                <p style = "text-align: left; margin-left: 20px;">Bed ID:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["idBed"];?>‎</a>

                <!--Route ID-->
                <p style = "text-align: left; margin-left: 20px;">Route ID:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["idRoute"];?>‎</a>

                <!--Price-->
                <p style = "text-align: left; margin-left: 20px;">Total Price:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $ticket["TotalPrice"]." Sickles";?>‎</a>

                <!--Booking Status-->
                <div class="input-group" style = "text-align: left; margin-left: 20px;"> 
                    <label for="status">Booking Status: ‎ ‎ </label>
                    <select name = "status">
                        <option value = "Wait for payment confirmation" <?php if($ticket['BookingStatus']=="Wait for payment confirmation"){ echo "selected";}?>>Waiting</option>
                        <option value = "Your payment is confirmed" <?php if($ticket['BookingStatus']=="Your payment is confirmed"){ echo "selected";}?>>Confirmed</option>
                    </select>
                </div>

                <br><ul class = "nav__links" style = "width: 200px height: 20px;">
                    <li><a style = "font-size: 0.98rem"><button name = "update" href = "#" style = "background: white; color: black; width: 150px; height: 40px; padding-top: 5px; padding-bottom: 5px; margin: 0 auto;">Update ‎ ‎ <i class="far fa-edit"></i></a></li>
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