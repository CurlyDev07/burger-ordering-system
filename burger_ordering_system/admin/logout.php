<?php
    require_once("../core/init.php");

    unset($_SESSION['user']);

    header("Location: login.php")
?>