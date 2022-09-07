<?php 
include 'config.php';

session_start();

$bedid = $_POST['BedNo'];
$origin = $_POST["origin"];
$destination = $_POST["destination"];
$DDate = $_POST["InputDate"];
$InputTime = $_POST["InputTime"];

$get = "SELECT Bed.*, BedType.*, Floors.* FROM Bed, BedType, Floors WHERE Bed.idBedType = BedType.idBedType AND Bed.idFloor = Floors.idFloor AND Bed.idBed = '$bedid' " or die(mysql_error());
$result_get = mysqli_query($conn, $get);
$rows = mysqli_fetch_array($result_get);

$gets = "SELECT Routes.*, o.*, d.*, Bus.* FROM Routes, Station AS o, Station AS d, Bus WHERE Routes.busID = Bus.idBus AND Routes.idOStation = (SELECT idStation FROM Station AS o WHERE StationName = '$origin') AND Routes.idDStation = (SELECT idStation FROM Station AS d WHERE StationName = '$destination') AND Routes.DTime = '$InputTime'" or die(mysql_error());
$result_gets = mysqli_query($conn, $gets);
$rowss = mysqli_fetch_array($result_gets);

$totalP = $rowss["RoutePrice"]+$rows["FloorPrice"];
$bid = $rowss["idBus"];
$routeid = $rowss["idRoute"];

$_SESSION["totalPrice"] = $totalP; //Total Price
$_SESSION['bu'] = $rowss["idBus"]; //Bus ID
$_SESSION["bd"] = $bedid; //Bed ID
$_SESSION["date"] = $DDate; //Departure date
$_SESSION['r'] = $routeid; //Route ID

if(isset($_POST['confirm'])){
    $bottle = $_POST['BottleColor'];
    $tooth = $_POST['ToothpasteColor'];

    $_SESSION['btc'] = $bottle;
    $_SESSION['tthp'] = $tooth;
}
?>


<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Booking Information | The Knight Bus Booking</title>
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
        <div class="container" style = "position: fixed; right: 100px; left: 100px; top: 120px; padding-top: 25px; padding-bottom: 20px;background: rgba(0,0,0,0.4); width: 400px; height: auto; color: white;">

            <!--Booking Information-->
            <div class="row">
                <h1 style = "font-size: 1.1rem; font-weight: 500; text-align: center;">Your Booking Information</h1>
                <form action="payment.php" method="POST" class = "input-group">
                    <!-- <input type="hidden" name=> -->

                        <!--C1-->
                    <?php if ($_POST["BedNo"] == "C1"):?>
                        
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                        
                        <!--C1: hot water bottle-->
                        <div class="input-group;">
                            <p for="" style = "margin-left: 20px; line-height: 1.8rem;"><label>Hot water bottle: ‎ ‎ </label>
                            <select name="BottleColor" id="BottleColor" required>
                                <option value="">--Select Color--</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                                <option value="Purple">Purple</option>
                            </select></p>
                        </div>

                        <!--C1: toothpaste-->
                        <div class="input-group;">
                            <p><label for="" style = "margin-left: 20px; line-height: 1.8rem;">Toothpaste: ‎ ‎ </label>
                            <select name="ToothpasteColor" id="ToothpasteColor" required>
                                <option value="">--Select Color--</option>
                                <option value="Yellow">Yellow</option>
                                <option value="Blue">Blue</option>
                                <option value="Green">Green</option>
                                <option value="Purple">Purple</option>
                            </select></p>
                        </div>

                        <!--C2-->
                    <?php elseif ($_POST["BedNo"] == "C2"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                        
                        <!--C2: hot water bottle-->
                        <p><label style = "margin-left: 20px;">Hot water bottle: ‎ ‎ </label>
                        <select name="BottleColor" id="BottleColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C2: hot water toothpaste-->
                        <p><label style = "margin-left: 20px;">Toothpaste: ‎ ‎ </label>
                        <select name="ToothpasteColor" id="ToothpasteColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C3-->
                    <?php elseif ($_POST["BedNo"] == "C3"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                    
                        <!--C3: hot water bottle-->
                        <p><label style = "margin-left: 20px;">Hot water bottle: ‎ ‎ </label>
                        <select name="BottleColor" id="BottleColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C3: toothpaste -->
                        <p><label style = "margin-left: 20px;">Toothpaste: ‎ ‎ </label>
                        <select name="ToothpasteColor" id="ToothpasteColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C4-->
                    <?php elseif ($_POST["BedNo"] == "C4"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                        
                        <!--C4: hot water bottle-->
                        <p><label style = "margin-left: 20px;">Hot water bottle: ‎ ‎ </label>
                        <select name="BottleColor" id="BottleColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C4: toothpaste-->
                        <p><label style = "margin-left: 20px;">Toothpaste: ‎ ‎ </label>
                        <select name="ToothpasteColor" id="ToothpasteColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C5-->
                    <?php elseif ($_POST["BedNo"] == "C5"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--C5: hot water bottle-->
                        <p><label style = "margin-left: 20px;">Hot water bottle: ‎ ‎ </label>
                        <select name="BottleColor" id="BottleColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--C5: toothpaste-->
                        <p><label style = "margin-left: 20px;">Toothpaste: ‎ ‎ </label>
                        <select name="ToothpasteColor" id="ToothpasteColor" required>
                            <option value="">--Select Color--</option>
                            <option value="Yellow">Yellow</option>
                            <option value="Blue">Blue</option>
                            <option value="Green">Green</option>
                            <option value="Purple">Purple</option>
                        </select></p>

                        <!--B1-->
                    <?php elseif ($_POST["BedNo"] == "B1"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                    
                        <!--B2-->
                    <?php elseif ($_POST["BedNo"] == "B2"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--B3-->
                    <?php elseif ($_POST["BedNo"] == "B3"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--B4-->
                    <?php elseif ($_POST["BedNo"] == "B4"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--B5-->
                    <?php elseif ($_POST["BedNo"] == "B5"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?>‎</a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">‎Time:‎ ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;">‎<?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: ‎ ‎ <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--A1-->
                    <?php elseif ($_POST["BedNo"] == "A1"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Time: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--A2-->
                    <?php elseif ($_POST["BedNo"] == "A2"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Time: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--A3-->
                    <?php elseif ($_POST["BedNo"] == "A3"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Time: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>

                        <!--A4-->
                    <?php elseif ($_POST["BedNo"] == "A4"):?>
                        <p style = "margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Date:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputDate"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Time: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["InputTime"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Origin:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["origin"];?></a>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Destination:<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["destination"]; ?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed No:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $_POST["BedNo"];?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Bed Type:  <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["BedTypeName"]?></a></p>
                        <p style = "margin-left: 20px; line-height: 1.8rem;">Floor: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $rows["idFloor"]?></a></p>
                    <?php endif ?>

                    <!--Total Price-->
                    <br>
                    <p style = "margin-left: 20px;">Total Price: <a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $totalP?> Sickles</a></p>

                    <!--Confirm button-->
                    <div class = "input-group" style = "padding-top: 30px;">
                        <button name = "confirm" type="confirm" style="margin-bottom: 50px; text-align: center; width: 180px; margin: 0 auto; position: relative;">Confirm</button>
                    </div>
                </form>
            </div>

        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>
    </body>
</html>
