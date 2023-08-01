<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $select = $conn->query("SELECT * FROM categories WHERE id='$id'");
    $select->execute();

    $category = $select->fetch(PDO::FETCH_OBJ);


    if(isset($_POST['submit'])) {
      if(empty($_POST['name']) OR empty($_POST['icon'])
      OR empty($_POST['description'])) {
  
          echo "<script>alert('one or more inputs is empty');</script>";
  
      } else {
            
              $name = $_POST['name'];         //if data is correct
              $icon = $_POST['icon'];
              $description = $_POST['description'];
  
  
              $insert = $conn->prepare("UPDATE categories SET name = :name, icon = :icon,
              description = :description WHERE id='$id'");
  
              $insert->execute([
                  ":name" => $name,
                  ":icon" => $icon,
                  ":description" => $description,
              ]);

              echo "<script> window.location.href='".ADMINURL."/categories-admins/show-categories.php'; </script>";
  
          
      }
    }

  }


  

?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Category</h5>
              <form method="POST" action="update-category.php?id=<?php echo $id; ?>">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" value="<?php echo $category->name; ?>" class="form-control" placeholder="name" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="icon" id="form2Example1" value="<?php echo $category->icon; ?>" class="form-control" placeholder="icon" />      
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                  <?php echo $category->description; ?>
                  </textarea>
                </div>
                

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Update</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
