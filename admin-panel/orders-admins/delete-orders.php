<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

    // if session is not set...prevent user from accesing page
    if(!isset($_SESSION['adminname'])) {

        echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];


        $delete = $conn->query("DELETE FROM orders WHERE id='$id'");
        $delete->execute();

        echo "<script> window.location.href='".ADMINURL."/orders-admins/show-orders.php'; </script>";

    }