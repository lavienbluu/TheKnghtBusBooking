<?php 
include 'config.php';

error_reporting(0);
session_start();

?>

<!DOCTYPE html>
    <head>
        <meta charset = "utf-8">
        <meta http-equiv = "X-UA-Compatible" content= "IE=edge">
        <title>Booking | The Knight Bus Booking</title>
        <meta name = "description" content = "">
        <meta name = "viewport" content = "width=device-width, initial-scale=1">
        <!--link to CSS file-->
        <link rel = "stylesheet" href = "booking.css">
        <!--used for adding icon-->
        <script src="https://kit.fontawesome.com/e3dc0a7e48.js" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
            * {
                box-sizing: border-box;
            }

            /* Button used to open the contact form - fixed at the bottom of the page */
            .open-button {
                background-color: #555;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                opacity: 0.8;
                position: fixed;
                bottom: 375px;
                right: 650px;
                width: 280px;
            }

            /* The popup form - hidden by default */
            .form-popup {
                display: none;
                position: fixed;
                bottom: 60px;
                right: 480px;
                /* border: 3px solid #f1f1f1; */
                z-index: 9;
            }

            /* Add styles to the form container */
            .form-container {
                max-width: 1000px;
                border-radius: 25px;
                padding: 10px;
                background-color: #17101E;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
                background-color: #04aa6d;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom: 10px;
                opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
                background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover,
            .open-button:hover {
                opacity: 1;
            }
        </style>
    </head>

    <script>
            function openForm() {
                document.getElementById("myForm").style.display = "block";
            }

            function closeForm() {
                document.getElementById("myForm").style.display = "none";
            }
    </script>


    <!--Navigation Bar-->
    <body>
        <header style = "position: sticky; top: 0;">
            <lable><a style = "font-size: 2rem; font-weight: 800; position: relative; right: 80px;">THE KNIGHT BUS BOOKING</a></lable>
            <nav>
                <ul class = "nav__links">
                    <li><a href = "welcome.php" style = "text-decoration: none; position: relative; left: 155px;">Home</a></li>
                    <li><a href = "Booking.php" style = "position: relative; left: 155px">Booking</a></li>
                    <li><a href = "history.php" style = "position: relative; left: 155px">Booking History</a></li>
                    <li><a href = "profile.php" style = "position: relative; left: 155px">Your Profile</a></li>
            </nav>
            <a class = "cta" href = "logout.php"><button style = "text-decoration: none; position: relative; left: 100px">Log out</button></a>
        </header>

        <div class="grid-container" style = "position: fixed; background: rgba(0,0,0,0.4); height: 480px;">
            <!--Booking Part-->
            <div style = "background: transparent; line-height: 2.1rem;">
                <form action="booking_info.php" method="POST" class = "login-email">
                    <div class="input-group;">
                        <label for="InputOrigin" style="font-size: 1.1rem; text-align: center; margin: 0 auto; color: white;">Origin</label><br>
                        <select name="origin" id="origin" style = "width: 250px;" required>
                            <option value="">--Select Origin Station--</option>
                            <option value="Hogwarts">Hogwarts</option>
                            <option value="Kings Cross Station">Kings Cross Station</option>
                            <option value="Diagon Alley">Diagon Alley</option>
                            <option value="The Burrow">The Burrow</option>
                            <option value="Number 4, Privet Drive">Number 4, Privet Drive</option>
                            <option value="Godrics Hollow">Godrics Hollow</option>
                            <option value="Hogsmeade">Hogsmeade</option>
                        </select>
                    </div>
                
                    <!--choose the destination-->
                    <div class="input-group">
                        <label for="InputDes" style="font-size: 1.1rem; color: white;">Destination</label><br>
                        <select name="destination" id="Destination" style = "width: 250px;" required>
                            <option value="">--Select Destination Station--</option>
                            <option value="Hogwarts">Hogwarts</option>
                            <option value="Kings Cross Station">Kings Cross Station</option>
                            <option value="Diagon Alley">Diagon Alley</option>
                            <option value="The Burrow">The Burrow</option>
                            <option value="Number 4, Privet Drive">Number 4, Privet Drive</option>
                            <option value="Godrics Hollow">Godrics Hollow</option>
                            <option value="Hogsmeade">Hogsmeade</option>
                        </select>
                    </div>
                    
                    <!--choose the date-->
                    <div class="input-group">
                        <label for="InputDate" style="font-size: 1.1rem; text-align: center; width: 500px; margin: 0 auto; color: white;">Date</label><br>
                        <input style = "width: 250px; font-size: 0.8rem; color: black" type="Date" name="InputDate" placeholder="Enter date" required/>
                    </div>

                    <!--choose the time-->
                    <div class="input-group" style = "margin-top: 6px; line-height: 1.7rem;">
                        <label for="InputTime" style="font-size: 1.1rem; text-align: center; margin: 0 auto; color: white;">Time</label><br>
                        <!-- <input style = "font-size: 0.8rem; width: 250px; color: black" type="Time" name="InputTime" placeholder="Time" required/> -->
                        <select name="InputTime" id="Time" required>
                            <option value="">--Select Time--</option>
                            <optgroup label="Clockwise">
                                <option value="06:00">06:00</option>
                            </optgroup>
                            <optgroup label="Anticlockwise">
                                <option value="11:30">11:30</option>
                            </optgroup>
                        </select>
                    </div>

                    <!-- choose the bed -->
                    <div class="input-group" style = "margin-top: 6px;">
                        <label for="InputBedNo" style="font-size: 1.1rem; text-align: center; margin: 0 auto; color: white;">Bed No.</label>
                        <select name="BedNo" id="BedNo" required>
                            <option value="">--Select Bed Number--</option>
                            <optgroup label="1st Floor">
                                <option value="A1">A1</option>
                                <option value="A2">A2</option>
                                <option value="A3">A3</option>
                                <option value="A4">A4</option>
                            </optgroup>
                            <optgroup label="2nd Floor">
                                <option value="B1">B1</option>
                                <option value="B2">B2</option>
                                <option value="B3">B3</option>
                                <option value="B4">B4</option>
                                <option value="B5">B5</option>
                            </optgroup>
                            <optgroup label="3rd Floor">
                                <option value="C1">C1</option>
                                <option value="C2">C2</option>
                                <option value="C3">C3</option>
                                <option value="C4">C4</option>
                                <option value="C5">C5</option>
                            </optgroup>
                        </select>
                    </div>

                    <!--submit button-->
                    <div class = "input-group" style = "padding-top: 30px;">
                        <button name = "submit" type="submit" style="margin-bottom: 40px; text-align: center; width: 180px; margin: 0 auto; position: relative; right: 39px;">Submit</button>
                    </div>
                </form>
            </div>

            <div class="bus-container" style = "background: transparent; margin: 0 auto; color: white; text-align: center; margin-right: 90px;">
                <label style = "font-size: 1.2rem; font-weight: 400;"><br>Bed Mapping</label><br>
                <label style = "font-size: 1rem; font-weight: 200;">You are allowed to book only 1 bed</label>
            
                <div class="contain" style = "margin: 0 auto;">
                    <div class="row" style = "display: flex; color: white; margin-top: 25px;">
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">C1</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">C2</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">C3</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">C4</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">C5</div>
                </div>

                    <div class="row" style = "display: flex; color: white;">
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">B1</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">B2</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">B3</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">B4</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">B5</div>
                    </div>

                    <div class="row" style = "display: flex; color: white;">
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">A1</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">A2</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">A3</div>
                        <div class="seat" style = "background-color: #444451;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">A4</div>
                        <div class="seat cabin" style = "background-color: mediumpurple;  height: 40px; width: 43px; margin: 3px; font-size: 0.8rem; border-top-left-radius: 10px; border-top-right-radius: 10px; text-align: center;">X</div>
                    </div>
                </div> 
            </div> 

            <!-- Route Information Button
            <button class="open-button" onclick="openForm()">Route</button>
            <div class="form-popup" id="myForm">
                <form class="form-container">
                    <h1 style="color:white; text-align:center;">Route</h1>
                    <img src="route.png" style="border-radius: 10%" width="900px" height="600px"/>

                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                </form>
            </div> -->
        </div>
        
        <!--Footer-->
        <footer class="footer" style = "background-color: #17101E"><br>
            <p style = "font-size: 0.95rem; font-weight: 400;">
            Send an owl mail for more information</p>
            <p style = "font-weight: 250; font-size: 0.95rem;"><i class="fas fa-map-marker-alt"></i> The Cupboard under the stairs, Number 4, Privet Drive, Little Whinging, Surrey</p>         
        </footer>

    </body>
</html>