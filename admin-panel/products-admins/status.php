<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

    if(isset($_GET['id']) AND isset($_GET['status'])) {

        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status == 0) { // when admin clicks on status button, the product becomes available
            $update = $conn->prepare("UPDATE products SET status = 1 WHERE id='$id'");
            $update->execute();
        }
        else { // when admin clicks on status button, product becomes unavailable
            $update = $conn->prepare("UPDATE products SET status = 0 WHERE id='$id'");
            $update->execute();
        }

        echo "<script> window.location.href='".ADMINURL."/products-admins/show-products.php'; </script>";

    }