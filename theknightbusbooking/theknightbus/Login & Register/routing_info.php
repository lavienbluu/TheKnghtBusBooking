<?php 
include 'config.php';
?>


<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Route Info | Admin</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "routing_info.css">
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
                <col width = "5%"> <!--ID-->
                <col width = "18%"> <!--Name-->
                <col width = "12%"> <!--Origin-->
                <col width = "12%"> <!--Destination-->
                <col width = "6%"> <!--Bus ID-->
                <col width = "10%"> <!--Departure Time-->
                <col width = "7%"> <!--ETA-->
                <col width = "8%"> <!--Route Price-->
                <col width = "5%"> <!--Edit-->
                <col width = "5%"> <!--Delete-->

                    <!--column name-->
                <tr style = "background: #6c5ce7; font-weight: 400;">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Origin</th>
                    <th>Destination</th>
                    <th>Bus ID</th>
                    <th>Departure Time</th>
                    <th>ETA</th>
                    <th>Price</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                
                <!--get information from database-->
                <?php
                $route = "SELECT * FROM Routes";
                $result = mysqli_query($conn,$route);

                if($result){
                    while($row = mysqli_fetch_assoc($result)){?>
                        <tr style = "background-color: white; color: black; font-size: 0.98rem; font-weight: 100;">
                        <?php 
                        echo "<td>".$row["idRoute"]."</td>";
                        echo "<td>".$row["RouteName"]."</td>";

                        if($row['idOStation']==1){
                             echo "<td>"."Hogwarts"."</td>";
                        }
                        elseif($row['idOStation']==2){
                            echo "<td>"."Kings Cross Station"."</td>";
                        }
                        elseif($row['idOStation']==3){
                            echo "<td>"."Diagon Alley"."</td>";
                        }
                        elseif($row['idOStation']==4){
                            echo "<td>"."The Burrow"."</td>";
                        }
                        elseif($row['idOStation']==5){
                            echo "<td>"."Number 4, Privet Drive"."</td>";
                        }
                        elseif($row['idOStation']==6){
                            echo "<td>"."Godrics Hollow"."</td>";
                        }
                        elseif($row['idOStation']==7){
                            echo "<td>"."Hogsmeade"."</td>";
                        }

                        if($row['idDStation']==1){
                            echo "<td>"."Hogwarts"."</td>";
                        }
                        elseif($row['idDStation']==2){
                            echo "<td>"."Kings Cross Station"."</td>";
                        }
                        elseif($row['idDStation']==3){
                            echo "<td>"."Diagon Alley"."</td>";
                        }
                        elseif($row['idDStation']==4){
                            echo "<td>"."The Burrow"."</td>";
                        }
                        elseif($row['idDStation']==5){
                            echo "<td>"."Number 4, Privet Drive"."</td>";
                        }
                        elseif($row['idDStation']==6){
                            echo "<td>"."Godrics Hollow"."</td>";
                        }
                        elseif($row['idDStation']==7){
                            echo "<td>"."Hogsmeade"."</td>";
                        }
                       
                        echo "<td>".$row["busID"]."</td>";
                        echo "<td>".$row["DTime"]."</td>";
                        echo "<td>".$row["ETA"]."</td>";
                        echo "<td>".$row["RoutePrice"]." sickles"."</td>";
                        echo '<td><a href = "delete_route.php?idRoute='.$row['idRoute']. '">';
                        echo '<img src= "delete.png" width="24" height="24">';
                        echo '</a></td>';
                        echo '<td><a href = "edit_route.php?idRoute='.$row['idRoute']. '">';
                        echo '<img src= "edit.png" width="24" height="24">';
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