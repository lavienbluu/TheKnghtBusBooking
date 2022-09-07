<?php 
include 'config.php';

session_start();

$username = $_SESSION['username'];
$get = "SELECT * FROM user WHERE username ='$username'" or die(mysql_error());
$result_get = mysqli_query($conn, $get);
$row = mysqli_fetch_array($result_get);
$userID = $row["idUser"];

$rid = $_SESSION['r'];
$tp = $_SESSION["totalPrice"];
$DepartureD = $_SESSION["date"];
$buid = $_SESSION['bu'];
$bdid = $_SESSION["bd"];
if(isset($_POST['BottleColor'])){
    $bottle = $_POST['BottleColor'];
}
else{
    $bottle = "None";
}

if(isset($_POST['ToothpasteColor'])){
    $toothpasteColor = $_POST['ToothpasteColor'];
}
else{
    $toothpasteColor = "None";
}

$num = "SELECT MAX(idTicket) AS ticket_num FROM Ticket";
$get_num = mysqli_query($conn, $num);
$row = mysqli_fetch_array($get_num);

$ticketID = $row["ticket_num"]+1;

$nums = "SELECT MAX(idPayment) AS payment_num FROM Payment";
$get_nums = mysqli_query($conn, $nums);
$rows = mysqli_fetch_array($get_nums);

$paymentID = $rows["payment_num"]+1;

$BookingStatus = "Wait for payment Confirmation";
$BedStatus = 0;

if(isset($_POST["pay"])) {
    $bank = $_POST["BankName"];
    $aN = $_POST["accountName"];
    $aID = $_POST["accountID"];
    $aCVV = $_POST["accountCVV"];

    $sql = "INSERT INTO Ticket (idTicket,idUser,DepartureDate,Bus,idBed,idRoute,HotWaterBottle,Toothpaste,TotalPrice,BookingStatus,BedStatus)
    VALUES ('$ticketID','$userID','$DepartureD','$buid','$bdid','$rid','$bottle','$toothpasteColor','$tp','$BookingStatus','$BedStatus')";
    $result = mysqli_query($conn, $sql);
    if ($result){
        $sqli = "INSERT INTO Payment (idPayment,ticketID,userID,AccountName,AccountID,AccountBank,AccountCVV)
        VALUES ('$paymentID','$ticketID','$userID','$aN','$aID', '$bank','$aCVV')";
        $resulti = mysqli_query($conn, $sqli);
        header("Location: welcome.php");
    }
    else{
        header("Location: Booking.php");
    }
}
?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Payment | The Knight Bus Booking</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "booking.css">
        <script src="https://kit.fontawesome.com/e3dc0a7e48.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <!--Header-->
        <header style = "position: sticky; top: 0;">
            <lable><a style = "font-size: 2rem; font-weight: 800; position: relative; right: 80px; margin-bottom: 40px;">THE KNIGHT BUS BOOKING</a></lable>
            <nav>
                <ul class = "nav__links">
                    <li><a href = "welcome.php" style = "text-decoration: none; position: relative; left: 155px;">Home</a></li>
                    <li><a href = "Booking.php" style = "position: relative; left: 155px">Booking</a></li>
                    <li><a href = "history.php" style = "position: relative; left: 155px">Booking History</a></li>
                    <li><a href = "profile.php" style = "position: relative; left: 155px">Your Profile</a></li>
            </nav>
            <a class = "cta" href = "logout.php"><button style = "text-decoration: none; position: relative; left: 100px">Log out</button></a>
        </header>

        <!--Container-->
        <div class="container" style = "position: fixed; margin-top: 42px; right: 100px; left: 100px; background: rgba(0,0,0,0.4); width: 400px; height: auto; color: white; padding-top: 10px; padding-bottom: 10px;">

            <!--Payment-->
            <div class="row">
                <h1 style = "font-size: 1.1rem; font-weight: 500; text-align: center; padding-top: 20px;">Payment</h1><br>
                <form action = "" method="POST" class = "input-group">
                    <input type="hidden" name="BottleColor" value="<?php if(isset($_POST['BottleColor'])){ $bottle = $_POST['BottleColor'];} else{$bottle = "None";} echo $bottle ?>">
                    <input type="hidden" name="ToothpasteColor" value="<?php if(isset($_POST['ToothpasteColor'])){$toothpasteColor = $_POST['ToothpasteColor'];} else {$toothpasteColor = "None";} echo $toothpasteColor ?>">

                    <p>
                        <!--choose your bank where your account belongs to-->
                        <label style = "margin-left: 20px;">Bank </label><br>
                        <select name="BankName" id="BankName"required style = "width: 300px; margin-left: 20px; margin-bottom: 18px;">
                            <option value="">--Select Bank--</option>
                            <option value="hogwarts">Hogwarts</option>
                            <option value="gringotts">Gringotts</option>
                        </select>
                    </p>

                    <!--account name-->
                    <p>
                        <label style = "margin-left: 20px;">Account Name  </label><br>
                        <input name = "accountName" type="text" placeholder="Account Name" style = "font-size: 0.98rem; color: white; width: 300px; height: 25px; margin-left: 20px; margin-bottom: 18px;" required>
                    </p>

                    <p>
                        <label style = "margin-left: 20px;">Bank No. </label><br>
                        <input name = "accountID" type="text" placeholder="Bank No." style = "font-size: 0.98rem; color: white; width: 300px; height: 30px; margin-left: 20px; margin-bottom: 18px;" required>
                    </p>

                    <p>
                        <label style = "margin-left: 20px;">Personal CVV: </label><br>
                        <input name = "accountCVV" type="text" placeholder="Personal CVV" style = "font-size: 0.98rem; color: white; width: 300px; height: 30px; margin-left: 20px; margin-bottom: 18px;" required>
                    </p><br>

                    <!--submit button-->
                        <button type="submit" name="pay" style="text-align: center; width: 150px; margin: 0 auto; margin-bottom: 15px;">Pay</button>
                </form>
            </div>
        </div>

        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>

    </body>
</html>