<?php
    require_once("../core/init.php");
    $page_title= "Admin area";
    include_once("../includes/head.php");
    include_once("includes/header.php");

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}

    $transaction_q = "SELECT * FROM transactions";
    $transaction_r = mysqli_query($db, $transaction_q);
?>

<style>
    #body{
    background-image: url("../images/Burger king.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    color: #bdbdbd;
}
</style>
<body  id="body" class="" >
<div class="container mt-2">
    <div class="col-sm-10 offset-sm-1 text-center">
        <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>Transaction ID#</th>
            <th>Customer name</th>
            <th>Transaction Date</th>
            <th>&nbsp;</th>
        </tr>
        <?php  while ($transaction = mysqli_fetch_assoc($transaction_r)) { ?>
        <tr>
            <td class="align-middle py-1"><?php echo $transaction['transaction_id'] ?></td>
            <td class="align-middle py-1"><?php echo $transaction['customer_fullname'] ?></td>
            <td class="align-middle py-1"><?php echo $transaction['transaction_date'] ?></td>
            <td class="align-middle py-1">
                <a href="<?php echo 'orders.php?id='.$transaction['transaction_id']; ?>">
                    <button type="button" class="btn btn-success d-inline">Details</button>
                </a>
                <a href="<?php echo 'delete_transaction.php?id='.$transaction['transaction_id']; ?>">
                    <button type="button" class="btn btn-danger d-inline">Delete</button>
                </a>
            </td>
        </tr>
        <?php }  ?>
        </table>


    </div>
</div><!-- container -->
<?php
    include_once("../includes/footer.php");
?>

