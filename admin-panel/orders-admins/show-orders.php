<?php require "../layouts/header.php";   // step back?>
<?php require "../../config/config.php"; // 2 steps back?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  $orders = $conn->query("SELECT * FROM orders");
  $orders->execute();

  $allOrders = $orders->fetchAll(PDO::FETCH_OBJ);  // allows use of foreach 

?>
    <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Orders</h5>
              <table class="table mt-3">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">email</th>
                    <th scope="col">country</th>
                    <th scope="col">status</th>
                    <th scope="col">price in Ksh</th>
                    <th scope="col">date</th>
                    <th scope="col">update</th>
                    <th scope="col">delete</th>

                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allOrders as $order) : ?>
                    <tr>
                      <th scope="row"><?php echo $order->id; ?></th>
                      <td><?php echo $order->name; ?></td>
                      <td><?php echo $order->lname; ?></td>
                      <td><?php echo $order->email; ?></td>
                      <td><?php echo $order->country; ?></td>
                      <td><?php echo $order->status; ?></td>
                      <td><?php echo $order->price; ?></td>
                      <td><?php echo $order->created_at; ?></td>
                      <td>                
                          <a href="<?php echo ADMINURL; ?>/orders-admins/update-orders.php?id=<?php echo $order->id; ?>" class="btn btn-warning text-white mb-4 text-center">upate</a>
                      </td>
                      <td><a href="delete-orders.php?id=<?php echo $order->id; ?>" class="btn btn-danger  text-center ">delete </a></td>
                    
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php";   // step back?>
