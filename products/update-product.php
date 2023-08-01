<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    // when there is no session, redirect user to index page
    if(!isset($_SESSION['username'])) {
        echo "<script> window.location.href='".APPURL."'; </script>";

    }
    //updated the database when user updates the cart
    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $pro_qty = $_POST['pro_qty'];
        $subtotal = $_POST['subtotal'];

        $update = $conn->prepare("UPDATE cart SET pro_qty = '$pro_qty', pro_subtotal = '$subtotal'
        WHERE id='$id'");
        $update->execute();
    }


// update query

?>


<?php require "../includes/footer.php"; ?>