<?php
    include 'config.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM public_information WHERE id='$id'";
        $query = mysqli_query($conn,$sql);
        if ($query) {
            header('location:view.php');
        }
        else {
            echo "Failed";
        }
    }

?>