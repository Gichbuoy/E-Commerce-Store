# Food Ordering Ecommerce Store with PayPal Payment and Admin Panel
This **E-Commerce Store** is a dynamic web application.
 The application is developed using PHP for server-side scripting, MySQL for database management, Bootstrap for front-end design, and PDO (PHP Data Objects) for database connectivity.

[![Netlify Status](https://api.netlify.com/api/v1/badges/74de2307-6c91-46cc-b2f6-b1afcae8b07d/deploy-status)](https://app.netlify.com/sites/groceries-store-bs4/deploys)

## Demo
[See DEMO](https://groceries.teguhrianto.my.id)

## Features
* User Registration and Authentication
* Browse and Search Food Items
* Add Food Items to Cart
* View Cart and Proceed to Checkout
* PayPal Payment Integration for Secure Transactions
* Admin Panel to Manage Food Items, Orders, and Users


## Requirements
* PHP 7 or higher
* MySQL database
* Web server (e.g., Apache, Nginx)
* Xampp
*PayPal Developer Account for Sandbox/Production API credentials


## Ideas and Suggestions
Please kindly mail me at [lexizgichbuoy@gmail.com](mailto:lexizgichbuoy@gmail.com])


## Installation
Clone the repository to your web server's root directory:
```
git clone https://github.com/Gichbuoy/E-commerce-Store.git
```

1. Create a new MySQL database for the application and import the database.sql file to set up the required tables.

2. Update the database credentials in [config.php](https://github.com/Gichbuoy/E-Commerce-Store/config/config.php)
```
<?php
define('DB_HOST', 'your-database-host');
define('DB_NAME', 'your-database-name');
define('DB_USER', 'your-database-username');
define('DB_PASSWORD', 'your-database-password');
?>
```

Set up your PayPal API credentials with your own sandbox Business account app client ID in [charge.php](https://github.com/Gichbuoy/E-Commerce-Store/products/charge.php)
```
<div class="container">
                <script src="Your paypal API credentials "</script>
            </div>
```

Start your web server and access the application in your web browser.

## Directory Structure
```
food-ordering-ecommerce/
│   index.php
│   config.php
│   paypal_config.php
│   database.sql
│
├───admin
│       index.php
│       add_food.php
│       edit_food.php
│       manage_orders.php
│       manage_users.php
│       config.php
│
├───assets
│   ├───css
│   ├───js
│   └───images
│
├───includes
│       functions.php
│       db_connect.php
│
└───vendor
```

## Contributing
Pull requests are welcome. For major changes or feature requests, please open an issue first to discuss what you would like to change.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments

Thanks to the PHP, MySQL, Bootstrap, and PDO communities for their excellent tools and libraries.

