<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  $admins = $conn->query("SELECT * FROM admins");
  $admins->execute();

  $allAdmins = $admins->fetchAll(PDO::FETCH_OBJ);  // allows use of foreach 

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">adminname</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allAdmins as $admin) : ?>
                    <tr>
                      <th scope="row"><?php echo $admin->id; ?></th>
                      <td><?php echo $admin->adminname; ?></td>
                      <td><?php echo $admin->email; ?></td>
                    
                    </tr>
                  <?php endforeach; ?>
    
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php"; ?>
