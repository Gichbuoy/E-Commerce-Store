<?php

    session_start();
    session_unset();   // unset variables for this session
    session_destroy(); //destroy session

    // redirect user to /admins/login.php
    echo "<script> window.location.href='http://localhost/Freshcery/admin-panel//admins/login-admins.php'; </script>";
