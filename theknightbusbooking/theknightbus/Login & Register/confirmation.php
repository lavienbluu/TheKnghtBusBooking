<?php 
include 'config.php';

?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Confirm | Admin</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "confirmation.css">
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

        <div class = "box" style = "positon: relative; margin-top: 20px;">
        
            <table style = "margin: 0 auto;">
                <col width = "7%"> <!--Ticket id-->
                <col width = "7%"> <!--Name-->
                <col width = "15%"> <!--Departure Date-->
                <col width = "7%"> <!--Bus id-->
                <col width = "7%"> <!--Bed id-->
                <col width = "7%"> <!-- Route id-->
                <col width = "5%"> <!--Price-->
                <col width = "18%"> <!--Booking Status-->
                <col width = "3%"> <!--Check-->
                <col width = "3%"> <!--Delete-->

                <tr style = "background: #6c5ce7; font-weight: 400;">
                    <th>Ticket ID</th>
                    <th>User ID</th>
                    <th>Departure Date</th>
                    <th>Bus ID</th>
                    <th>Bed ID</th>
                    <th>Route ID</th>
                    <th>Price</th>
                    <th>Booking Status</th>
                    <th>Delete</th>
                    <th>Check</th>
                
                </tr>

                <!--get information from database-->
                <?php
                $ticket = "SELECT * FROM Ticket";
                $result = mysqli_query($conn,$ticket);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){?>
                        <tr style = "background-color: white; color: black; font-size: 0.98rem; font-weight: 100;">
                        <?php
                        echo "<td>".$row["idTicket"]."</td>";
                        echo "<td>".$row["idUser"]."</td>";
                        echo "<td>".$row["DepartureDate"]."</td>";
                        echo "<td>".$row["Bus"]."</td>";
                        echo "<td>".$row["idBed"]."</td>";
                        echo "<td>".$row["idRoute"]."</td>";
                        echo "<td>".$row["TotalPrice"]."</td>";
                        echo "<td>".$row["BookingStatus"]."</td>";
                        echo '<td><a href = "delete_ticket.php?idTicket='.$row['idTicket'].'">';
                        echo '<img src= "delete.png" width="24" height="24">';
                        echo '</a></td>';
                        echo '<td><a href = "update_status.php?idTicket='.$row['idTicket'].'">';
                        echo '<img src= "update.png" width="24" height="24">';
                        echo '</a></td>';
                        echo "</tr>";
                    }
                } 
                ?>
                
            </table>
        </div>
        
        <!--Footer: Contact us-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> ‎ ‎ ‎ ‎The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>

    </body>
        

        


</html>