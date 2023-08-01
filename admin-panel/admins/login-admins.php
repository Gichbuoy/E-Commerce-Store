<?php require "../layouts/header.php";   // step back?>
<?php require "../../config/config.php"; // 2 steps back?>
<?php

  if(isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."'; </script>";

  }

    if(isset($_POST['submit'])) {
        if(empty($_POST['email']) OR empty($_POST['password'])
        ) {

            echo "<script>alert('one or more inputs is empty')</script>";

        } else {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //query
            $login = $conn->query("SELECT * FROM admins WHERE email='$email'"); // validates correct email
            $login->execute();

            $fetch = $login->fetch(PDO::FETCH_ASSOC);  //fetch data as an associative array

            //validate email
            if($login->rowCount() > 0) {

                // validate password
                // takes pass, hash it and match it and return boolean value
                if(password_verify($password, $fetch['mypassword'])) {
    
                    $_SESSION['adminname'] = $fetch['adminname'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['admin_id'] = $fetch['id'];
            
                     echo "<script> window.location.href='".ADMINURL."'; </script>";

                }
                else {
                    echo "<script>alert('email or password is wrong')</script>";
                }

            } else {
                echo "<script>alert('email or password is wrong')</script>";

            }
        }
}

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mt-5">Login</h5>
              <form method="POST" class="p-auto" action="login-admins.php">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                   
                  </div>

                  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />
                    
                  </div>



                  <!-- Submit button -->
                  <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>

                 
                </form>

            </div>
       </div>
     </div>
<?php require "../layouts/footer.php"; ?>
