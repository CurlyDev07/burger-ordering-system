<?php
    require_once("../core/init.php");
    include_once("../includes/head.php");

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    }

    if (isset($_GET['id'])) {
        $transaction_id = $_GET['id'];
    }else{
        header("Location: index.php");
    }
    // UPDATE ORDER
    $bread = isset($_POST['bread'])? $_POST['bread'] :'' ;
    $sauce = isset($_POST['sauce'])? $_POST['sauce'] :'' ;
    $sandwich_type = isset($_POST['sandwich_type'])? $_POST['sandwich_type'] :'' ;
    $cheese = isset($_POST['cheese'])? $_POST['cheese'] :'' ;
    $veggies = isset($_POST['veggies'])? $_POST['veggies'] :'' ;

    $update_order_q = "UPDATE orders SET bread='$bread',sauce='$sauce',sandwich_type='$sandwich_type',cheese='$cheese',veggies='$veggies'
                        WHERE order_id='$transaction_id'";
    echo $update_order_q;
    $update_order_r = mysqli_query($db, $update_order_q);
    if ($update_order_r) {
        echo 'update success';
        header("Location: orders.php?id=".$transaction_id);
    }

    echo $bread;
    echo $sauce;
    echo $sandwich_type;
    echo $cheese;
    echo $veggies;

?>