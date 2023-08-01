<?php

    session_start();
    session_unset();   // unset variables for this session
    session_destroy(); //destroy session

    echo "<script> window.location.href='http://localhost/Freshcery'; </script>";
