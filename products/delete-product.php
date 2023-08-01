<?php

    if(!isset($_SERVER['HTTP_REFERER'])){
            // redirect user to prevent un authorized access to this config file
            header('location: http://localhost/Freshcery/index.php');
            exit;
        }
?>

<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

    // when there is no session, redirect user to index page
    if(!isset($_SESSION['username'])) {
        echo "<script> window.location.href='".APPURL."'; </script>";

    }

    //updated the database when user deletes an item from the cart
    if(isset($_POST['delete'])) {
        $id = $_POST['id'];

        $delete = $conn->prepare("DELETE FROM cart WHERE id='$id'");
        $delete->execute();
    }



// detele query
?>


<?php require "../includes/footer.php"; ?>