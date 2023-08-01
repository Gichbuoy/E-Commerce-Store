<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

  // if session is not set...prevent user from accesing page
  if(!isset($_SESSION['adminname'])) {

    echo "<script> window.location.href='".ADMINURL."/admins/login-admins.php'; </script>"; // redirect to login page

  }

  //fetching categories
  $categories = $conn->query("SELECT * FROM categories");
  $categories->execute();

  $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);  // allows use of foreach 


  if(isset($_POST['submit'])) {

    if(empty($_POST['title']) OR empty($_POST['price'])
    OR empty($_POST['description']) OR empty($_POST['category_id'])
    OR empty($_POST['exp_date'])) {

        echo "<script>alert('one or more inputs is empty');</script>";

    } else {
          
            $title = $_POST['title'];         //if data is correct
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $exp_date = $_POST['exp_date'];
            $image = $_FILES['image']['name'];

            $dir = "img_product/" . basename($image); // concatenate with basename, which is the $image
            
            $insert = $conn->prepare("INSERT INTO products(title, price, description, category_id, exp_date, image)
            VALUES(:title, :price, :description, :category_id, :exp_date, :image)"); // handlers

            $insert->execute([
                ":title" => $title,
                ":price" => $price,
                ":description" => $description,
                ":category_id" => $category_id,
                ":exp_date" => $exp_date,
                ":image" => $image

            ]);

            if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
              echo "<script> window.location.href='".ADMINURL."/products-admins/show-products.php'; </script>";

            }
    }
  }

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Products</h5>
              <form method="POST" action="create-products.php" enctype="multipart/form-data"> <!--enctype allows uploading of images-->
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <label>Title</label>

                  <input type="text" name="title" id="form2Example1" class="form-control" placeholder="title" />
                </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Price</label>

                    <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea name="description" placeholder="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                      <option>--select category--</option>
                      <?php foreach($allCategories as $category) : ?>
                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                      <?php endforeach; ?>
                    </select>
                </div>

              <div class="form-group">
                  <label for="exampleFormControlSelect1">Select Expiration Date</label>
                  <select name="exp_date" class="form-control" id="exampleFormControlSelect1">
                    <option>--select expiration date--</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>

                  </select>
              </div>

                <div class="form-outline mb-4 mt-4">
                    <label>Image</label>

                    <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
                </div>

               
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
<?php require "../layouts/footer.php"; ?>
