<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  $products = $conn->query("SELECT * FROM products");
  $products->execute();

  $allProducts = $products->fetchAll(PDO::FETCH_OBJ);  // allows use of foreach 

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a  href="<?php echo ADMINURL; ?>/products-admins/create-products.php" class="btn btn-primary mb-4 text-center float-right">Create Products</a>
            
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">product</th>
                    <th scope="col">price in Ksh</th>
                    <th scope="col">expiration date</th>
                    <th scope="col">status</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($allProducts as $product) : ?>
                    <tr>
                      <th scope="row"><?php echo $product->id; ?></th>
                      <td><?php echo $product->title; ?></td> 
                      <td><?php echo $product->price; ?></td>
                      <td><?php echo $product->exp_date; ?></td>
                      <?php if($product->status == 0) : // if product is unavailable?>
                        <td><a href="<?php echo ADMINURL; ?>/products-admins/status.php?id=<?php echo $product->id; ?>&status=<?php echo $product->status; ?>" class="btn btn-danger  text-center ">unavailable</a></td>
                      <?php else : // status == 1 hence available?>
                        <td><a href="<?php echo ADMINURL; ?>/products-admins/status.php?id=<?php echo $product->id; ?>&status=<?php echo $product->status; ?>" class="btn btn-success  text-center ">available</a></td>
                      <?php endif; ?>

                      <td><a href="<?php echo ADMINURL; ?>/products-admins/delete-products.php?id=<?php echo $product->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                    </tr>
                  <?php endforeach; ?>
                
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



<?php require "../layouts/footer.php"; ?>
