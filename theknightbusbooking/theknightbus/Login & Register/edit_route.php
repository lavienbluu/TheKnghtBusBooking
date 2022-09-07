<?php 
include 'config.php';

if (isset($_POST["update"]) && isset($_GET["idRoute"])){
    $idRoute = $_GET['idRoute'];
    $idBus = $_POST['idBus']; 
    $departure = $_POST['departure_time'];
    $price = $_POST['price'];
    $ETA = $_POST['ETA'];
  
    $update_sql = "UPDATE Routes SET BusID ='$idBus', DTime ='$departure', ETA ='$ETA', RoutePrice ='$price' WHERE idRoute ='$idRoute'";
  
    $result = mysqli_query($conn, $update_sql);
  
    if (!$result){
        echo "Update failed!<br/>";
        echo $mysqli->error;
    }
    else{
        header("Location: routing_info.php");
    }
}

if (isset($_GET["idRoute"])){

    $idRoute = $_GET["idRoute"];
    $query = "SELECT * FROM Routes WHERE idRoute = '$idRoute'";
    $result = mysqli_query($conn, $query);
  
    if (!$result){
        echo "Select failed!<br/>";
        echo $mysqli->error;
    } else {
        $route = $result->fetch_array();
    }
  }
?>


<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Edit Route | Admin</title>
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

        <div class = "box" style = "position: fixed; top: 55px; left: 100px; right: 100px;">
            <!--get the firstname and lastname from database-->
            <label style = "font-size: 1.4rem; font-weight: 500;">Edit Route</label>
            <form action="edit_route.php?idRoute=<?php echo "$idRoute"?>" method="POST" class="login-email">

                <!--Route Name-->
                <p style = "text-align: left; margin-left: 20px; margin-top: 20px; line-height: 1.8rem;">Route Name:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;"><?php echo $route["RouteName"];?>‎</a>

                <!--Origin-->
                <?php 
                if($route['idOStation']==1){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'. "Hogwarts".'</a>';
                }

                elseif($route['idOStation']==2){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Kings Cross Station".'‎</a>';
                }

                elseif($route['idOStation']==3){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Diagon Alley".'</a>';
                }

                elseif($route['idOStation']==4){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."The Burrow"."</a>";
                }

                elseif($route['idOStation']==5){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Number 4, Privet Drive".'‎</a>';
                }

                elseif($route['idOStation']==6){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Godrics Hollow".'‎</a>';
                }

                elseif($route['idOStation']==7){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Origin:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Hogsmeade".'‎</a>';
                }?>


                <!--Destination-->
                <?php 
                if($route['idDStation']==1){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'. "Hogwarts".'</a>';
                }

                elseif($route['idDStation']==2){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Kings Cross Station".'‎</a>';
                }

                elseif($route['idDStation']==3){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Diagon Alley".'</a>';
                }

                elseif($route['idDStation']==4){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."The Burrow"."</a>";
                }

                elseif($route['idDStation']==5){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Number 4, Privet Drive".'‎</a>';
                }

                elseif($route['idDStation']==6){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Godrics Hollow".'‎</a>';
                }

                elseif($route['idDStation']==7){
                    echo '<p style = "text-align: left; margin-left: 20px; margin-top: 3px;">Destination:‎ ‎ ‎ ‎<a style = "color: white; font-size: 0.98rem; font-weight: 200;">'."Hogsmeade".'‎</a>';
                }?>

                <!--Bus ID-->
                <div class="input-group" style = "text-align: left; margin-left: 20px; margin-top: 4px;"> 
                    <i class="fas fa-bus"> ‎ ‎ ‎</i>
                    <select name = "idBus">
                        <option value = "1" <?php if($route['busID']==1){ echo "selected";}?>>1</option>
                        <option value = "2" <?php if($route['busID']==2){ echo "selected";}?>>2</option>
                        <option value = "3" <?php if($route['busID']==3){ echo "selected";}?>>3</option>
                        <option value = "4" <?php if($route['busID']==4){ echo "selected";}?>>4</option>
                        <option value = "5" <?php if($route['busID']==5){ echo "selected";}?>>5</option>
                        <option value = "6" <?php if($route['busID']==6){ echo "selected";}?>>6</option>
                        <option value = "7" <?php if($route['busID']==7){ echo "selected";}?>>7</option>
                    </select>
                </div>

                <!--Departure time-->
                <div class="input-group" style = "text-align: left; margin-left: 20px; margin-top: 5px;"> 
                    <i class="far fa-clock"></i> ‎ ‎ ‎</i>
                    <select name = "departure_time">
                        <option value = "06:00" <?php if($route['DTime']=='06.00'){ echo "selected";}?>>06:00</option>
                        <option value = "11:30" <?php if($route['DTime']=='11.30'){ echo "selected";}?>>11:30</option>
                    </select>
                </div>
                
                <!--ETA-->
                <div class="input-group" style = "text-align: left; font-size: 0.98; margin-left: 20px;">
                        <label for="ETA">ETA: ‎ ‎ </label>
                        <input style = "font-size: 0.8rem; width: 150px; height: 20px; color: white; margin-top: 10px;" type="Time" name="ETA" placeholder="Time" required/>
                </div>

                <!--Price-->
                <div class="input-group" style = "text-align: left; font-size: 0.98; margin-left: 20px;"> 
                    <i class="fas fa-wallet"></i> ‎ ‎ Price‎ ‎ ‎ </i>
                    <input type="text" placeholder= "Price" name="price" style = "width: 100px; height: 20px; margin-top: 10px;" value="<?php echo $route['RoutePrice']; ?>" required>
                </div><br>

                <br><ul class = "nav__links" style = "width: 200px height: 20px;">
                    <li><a style = "font-size: 0.98rem"><button name = "update" href = "routing_info.php" style = "background: white; color: black; width: 150px; height: 40px; padding-top: 5px; padding-bottom: 5px; margin: 0 auto;">Update ‎ ‎ <i class="far fa-edit"></i></a></li>
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