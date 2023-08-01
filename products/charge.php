<?php

    if(!isset($_SERVER['HTTP_REFERER'])){
            // redirect user to prevent un authorized access to this config file
            header('location: http://localhost/Freshcery/index.php');
            exit;
        }
?>

<?php require "../includes/header.php"; ?>
<?php

    // when there is no session, redirect user to index page
    if(!isset($_SESSION['username'])) {
        echo "<script> window.location.href='".APPURL."'; </script>";

    }
?>

        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?php echo APPURL; ?>/assets/img/bg-header.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Pay with Paypal Page
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>

            <!-- Replace "test" with your own sandbox Business account app client ID -->
            <div class="container">
                <script src="https://www.paypal.com/sdk/js?client-id=ASv5OHo2R-RTc1uFbnneXeXxx3ruM1-qkcfw1jAjXlL8Ny2mF1vJpDSm-agZEqaZdN3EcnUOdrp5n73l&currency=USD"></script>
            </div>
            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
                <div class="container">
                <script>
                    paypal.Buttons({
                    // Sets up the transaction when a payment button is clicked
                    createOrder: (data, actions) => {
                        return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $_SESSION['total_price']; ?>' // Can also reference a variable or function
                            }
                        }]
                        });
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {
                        return actions.order.capture().then(function(orderData) {
                            
                        window.location.href='success.php';
                        });
                    }
                    }).render('#paypal-button-container');
                </script>
                </div>

                </div>
            </div>
        </div>

<?php require "../includes/footer.php"; ?>


    

