<?php 
include 'config.php';

if(isset($_GET['idTicket'])){
    $idTicket = $_GET['idTicket'];
    $query = "DELETE FROM Ticket WHERE idTicket = '$idTicket'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        echo "<script>alert('Delete failed !')</script>";
        echo mysqli_error($conn);
    }
    else{
        echo "<script>alert('Delete successfully !')</script>";
        header("Location: confirmation.php");
    }
}

?>