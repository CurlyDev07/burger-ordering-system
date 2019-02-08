<?php
  require_once("../core/init.php");
  include_once("../includes/head.php");

    if (isset($_GET['id'])) {
        $transaction_id = $_GET['id'];
       
        // DELETE TRANSACTION
        $transaction_delete_q = "DELETE FROM transactions WHERE transaction_id='$transaction_id'";
        $transaction_delete_r = mysqli_query($db, $transaction_delete_q);
              
        // DELETE ORDER
        $order_delete_q = "DELETE FROM orders WHERE order_id='$transaction_id'";
        $order_delete_r = mysqli_query($db, $order_delete_q);
       
        header("Location: index.php");
    }


?>