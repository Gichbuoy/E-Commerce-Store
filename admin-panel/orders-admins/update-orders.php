<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    // $select = $conn->query("SELECT * FROM orders WHERE id='$id'");
    // $select->execute();

    // $order = $select->fetch(PDO::FETCH_OBJ);


    if(isset($_POST['submit'])) {
      if(empty($_POST['status'])) {
  
          echo "<script>alert('one or more inputs is empty');</script>";
  
      } else {
            
              $status = $_POST['status'];         //if data is correct
              
  
              $update = $conn->prepare("UPDATE orders SET status = :status WHERE id='$id'");
  
              $update->execute([
                  ":status" => $status,
              ]);

              echo "<script> window.location.href='".ADMINURL."/orders-admins/show-orders.php'; </script>";
  
          
      }
    }

  }


  

?>

<div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Order Status</h5>
              <form method="POST" action="update-orders.php?id=<?php echo $id; ?>">
                <!-- Email input -->
                <div class="form-group mt-3">
                  <select name="status" class="form-control" id="exampleFormControlSelect1">
                    <option>--select order status--</option>
                    <option value="in progress">in progress</option>
                    <option value="delivered">delivered</option>

                  </select>
                </div>
            
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>

