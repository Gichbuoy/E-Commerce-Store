<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php

    //categories
    $categories = $conn->query("SELECT * FROM categories");
    $categories->execute();

    $allCategories = $categories->fetchAll(PDO::FETCH_OBJ);


    //most wanted products
    $mostProducts = $conn->query("SELECT * FROM products WHERE status = 1"); //only grab available products
    $mostProducts->execute();

    $allmostProducts = $mostProducts->fetchAll(PDO::FETCH_OBJ);


    //veggies
    $veggies = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 1"); //id for categories shoul match category_id for products
    $veggies->execute();

    $allveggies = $veggies->fetchAll(PDO::FETCH_OBJ);


    //meat
    $meats = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 2"); //id for categories shoul match category_id for products
    $meats->execute();

    $allMeats = $meats->fetchAll(PDO::FETCH_OBJ);

    //FISH
    $fishes = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 3"); //id for categories shoul match category_id for products
    $fishes->execute();

    $allFishes = $fishes->fetchAll(PDO::FETCH_OBJ);

    //FRUITS
    $fruits = $conn->query("SELECT * FROM products WHERE status = 1 AND category_id = 4"); //id for categories shoul match category_id for products
    $fruits->execute();

    $allFruits = $fruits->fetchAll(PDO::FETCH_OBJ);



?>

    <div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Shopping Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-categories owl-carousel mt-5">
                        <?php foreach($allCategories as $category) : ?>
                            <div class="item">
                                <a href="shop.php">
                                    <div class="media d-flex align-items-center justify-content-center">
                                        <span class="d-flex mr-2"><i class="sb-<?php echo $category->icon; ?>"></i></span>
                                        <div class="media-body">
                                            <h5><?php echo $category->name; ?></h5>
                                            <p><?php echo $category->description; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
    
                    </div>
                </div>
            </div>
        </div>

        <section id="most-wanted">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Most Wanted</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allmostProducts as $allmostProducts) : ?>
                                <div class="item">
                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $allmostProducts->exp_date; ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $allmostProducts->image; ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.php"><?php echo $allmostProducts->title; ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <!-- <span class="discount">ksh. 600.000</span> -->
                                                <span class="reguler">ksh. <?php echo $allmostProducts->price; ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $allmostProducts->id; ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                        
                                </div>
                            <?php endforeach; ?>
                    
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <section id="meats">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Meats</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allMeats as $meat) : ?>
                                <div class="item">
                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $meat->exp_date; ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/meats.jpg ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.html"><?php echo $meat->title; ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="discount">ksh. 12000.00</span>
                                                <span class="reguler">ksh. <?php echo $meat->price; ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $meat->id; ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fishes" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Fishes</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allFishes as $fish) : ?>
                                <div class="item">
                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $fish->exp_date; ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $fish->image; ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.html"><?php echo $fish->title; ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="discount">ksh 1200.000</span>
                                                <span class="reguler">ksh. <?php echo $fish->price; ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $fish->id; ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fruits">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Fruits</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allFruits as $fruit) : ?>
                                <div class="item">
                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $fruit->exp_date; ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $fruit->image; ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.html"><?php echo $fruit->title; ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="discount">ksh 500.000</span>
                                                <span class="reguler">ksh. <?php echo $fruit->price; ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $fruit->id; ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="vegetables" class="gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Vegetables</h2>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($allveggies as $allveggy) : ?>
                                <div class="item">
                                    <div class="card card-product">
                                        <div class="card-ribbon">
                                            <div class="card-ribbon-container right">
                                                <span class="ribbon ribbon-primary">SPECIAL</span>
                                            </div>
                                        </div>
                                        <div class="card-badge">
                                            <div class="card-badge-container left">
                                                <span class="badge badge-default">
                                                    Until <?php echo $allveggy->exp_date ?>
                                                </span>
                                                <span class="badge badge-primary">
                                                    20% OFF
                                                </span>
                                            </div>
                                            <img src="<?php echo IMGURLPRODUCT; ?>/<?php echo $allveggy->image; ?>" alt="Card image 2" class="card-img-top">
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="detail-product.php"><?php echo $allveggy->title; ?></a>
                                            </h4>
                                            <div class="card-price">
                                                <span class="discount">ksh 400</span>
                                                <span class="reguler">ksh. <?php echo $allveggy->price; ?></span>
                                            </div>
                                            <a href="<?php echo APPURL; ?>/products/detail-product.php?id=<?php echo $allveggy->id; ?>" class="btn btn-block btn-primary">
                                                Add to Cart
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php require "includes/footer.php"; ?>