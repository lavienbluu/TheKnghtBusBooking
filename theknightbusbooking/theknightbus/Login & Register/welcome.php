<?php 
include 'config.php';
?>


<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Home | The Knight Bus Booking</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "welcome_style.css">
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
                    <li><a href = "welcome.php" style = "text-decoration: none; position: relative; left: 155px;">Home</a></li>
                    <li><a href = "Booking.php" style = "position: relative; left: 155px">Booking</a></li>
                    <li><a href = "history.php" style = "position: relative; left: 155px">Booking History</a></li>
                    <li><a href = "profile.php" style = "position: relative; left: 155px">Your Profile</a></li>
            </nav>
            <a class = "cta" href = "logout.php"><button style = "text-decoration: none; position: relative; left: 100px">Log out</button></a>
        </header>
        

        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> ‎ ‎ ‎ ‎The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>

    </body>
        <div class = "content" style = "position: sticky;">
            <h1 style = "font-size: 2.2rem; position: relative; bottom: 45px;">BOOK YOUR MAGICAL TRIP</h1>
            <h2 style = "font-weight: 400; font-size: 1.5rem; position: relative; bottom: 45px;">- NO MUGGLE -</h2>
            <br></br>
            <div>
                <a class = "cta" href = "Booking.php"><button type = "button" style = "position: relative; bottom: 45px; text-decoration: none; width: 150px; text-align: center; margin: 0 auto;">Book Now</button></a>
            </div>
            <!-- <div class = "popup" onclick = "myFunction()">Bus Map
                <span class = "popuptext" id = "myPopup"><img src = "bus_map.png"/></span>
            </div> -->
        </div>
</html>