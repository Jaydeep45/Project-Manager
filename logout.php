<?php
    session_start();
    if(isset($_SESSION['user_email'])) {
        session_unset();
        session_destroy();
    }
    header('location:index.php');