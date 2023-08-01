<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

    // if session is not set...prevent user from accesing page
    if(!isset($_SESSION['adminname'])) {

        echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

    }

    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $select = $conn->query("SELECT * FROM products WHERE  id='$id'");
        $select->execute();

        $data = $select->fetch(PDO::FETCH_OBJ);

        unlink("img_product/".$data->image); // deletes image from directory when admin deletes the product

        $delete = $conn->query("DELETE FROM products WHERE id='$id'");
        $delete->execute();

        echo "<script> window.location.href='".ADMINURL."/products-admins/show-products.php'; </script>";

    }