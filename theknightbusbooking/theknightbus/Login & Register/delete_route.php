<?php 
include 'config.php';

if(isset($_GET['idRoute'])){
    $idRoute = $_GET['idRoute'];
    $query = "DELETE FROM Routes WHERE idRoute = '$idRoute'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        echo "<script>alert('Delete failed !')</script>";
        echo mysqli_error($conn);
    }
    else{
        echo "<script>alert('Delete successfully !')</script>";
        header("Location: routing_info.php");
    }
}

?>