<?php
     require_once("../core/init.php");
     $page_title= "Orders";
     include_once("../includes/head.php");
     include_once("includes/header.php");

    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
    }

    if (isset($_GET['id'])) {
        $transaction_id = $_GET['id'];
    }else{
        header("Location: index.php");
    }

    $order_q = "SELECT * FROM orders WHERE order_id='$transaction_id'";
    $order_r = mysqli_query($db, $order_q);
?>

<style>
    #body{
    background-image: url("../images/Burger king.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    color: #bdbdbd;
    }
    #ingrediens_input{
        background-color: #e6e6e6;
        color: black;
    }

</style>
<body id="body" class="" >
<div class="container-fluid mt-5">
    <div class="col-sm-12 text-center">
        <table class="table table-bordered table-condensed table-striped justify-content-center">
            <tr>
                <th>order #</th>
                <th>Bread</th>
                <th>Sauce</th>
                <th>Sandwich type</th>
                <th>Cheese</th>
                <th>Veggies</th>
                <?php
                    if (!isset($_POST['edit'])) {
                        echo '<td class="">Action</td>';
                    }
                ?>
            </tr>
            <?php  while ($order = mysqli_fetch_assoc($order_r)) { ?>
            <tr>
                <td class="align-middle py-1"><?php echo $order['order_id'] ?></td>
                <td class="align-middle py-1"><?php echo $order['bread'] ?></td>
                <td class="align-middle py-1"><?php echo $order['sauce'] ?></td>
                <td class="align-middle py-1"><?php echo $order['sandwich_type'] ?></td>
                <td class="align-middle py-1"><?php echo $order['cheese'] ?></td>
                <td class="align-middle py-1"><?php echo $order['veggies'] ?></td>

                <td class="align-middle py-1 <?php echo isset($_POST['edit'])? 'd-none' : 'd-block' ?>">
                    <form method="post" class="d-inline">
                        <button type="submit" class="btn btn-success" name="edit">Edit</button>
                    </form><!-- Edit-->
                    <a href="index.php">
                        <button type="button" class="btn btn-danger">Back</button>
                    </a><!-- Back-->
                </td>
            </tr>
        </table><!-- table -->
    </div><!-- col-sm-10 -->
    
    <form class="col-sm-8 offset-sm-2 border  mt-5 pt-2 <?php echo isset($_POST['edit'])? 'd-inline-block':'d-none'; ?>"
        action="<?php echo 'update_orders.php?id='.$order['order_id'];?>" 
        method="post" >
        <div class="row">
        <div class="col-sm-4 form-group d-inline">
                <label for="bread">Bread</label>
                <select id="bread" name="bread" class="form-control" id="ingrediens_input">
                    <?php 
                        $bread_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='bread'";
                        $bread_r = mysqli_query($db, $bread_q);
                        while ($bread = mysqli_fetch_assoc($bread_r)) {
                    ?>    
                        <option value="<?php echo $bread['ingredient_name'] ?>"> <?php echo $bread['ingredient_name'] ?></option>
                    <?php } ?>
                </select>
            </div><!-- Bread -->

            <div class="col-sm-4 form-group d-inline">
                <label for="bread">Sauce</label>
                <select id="sauce" name="sauce" class="form-control" id="ingrediens_input">
                    <?php 
                        $bread_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='sauce'";
                        $bread_r = mysqli_query($db, $bread_q);
                        while ($bread = mysqli_fetch_assoc($bread_r)) {
                    ?>    
                        <option value="<?php echo $bread['ingredient_name'] ?>"> <?php echo $bread['ingredient_name'] ?></option>
                    <?php } ?>
                </select>
            </div><!-- Sauce -->

            <div class="col-sm-4 form-group d-inline">
                <label for="sandwich_type">Sandwich type</label>
                <select id="sandwich_type" name="sandwich_type" class="form-control" id="ingrediens_input">
                    <?php 
                        $bread_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='sandwich-type'";
                        $bread_r = mysqli_query($db, $bread_q);
                        while ($bread = mysqli_fetch_assoc($bread_r)) {
                    ?>    
                        <option value="<?php echo $bread['ingredient_name'] ?>"> <?php echo $bread['ingredient_name'] ?></option>
                    <?php } ?>
                </select>
            </div><!-- sandwich_type -->

            <div class="col form-group d-inline">
                <label for="cheese">Cheese</label>
                 <select id="cheese" name="cheese" class="form-control" id="ingrediens_input">
                    <?php 
                        $bread_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='cheese'";
                        $bread_r = mysqli_query($db, $bread_q);
                        while ($bread = mysqli_fetch_assoc($bread_r)) {
                    ?>    
                        <option value="<?php echo $bread['ingredient_name'] ?>"> <?php echo $bread['ingredient_name'] ?></option>
                    <?php } ?>
                </select>
            </div><!-- Cheese -->

            <div class="col form-group d-inline">
                <label for="veggies">Veggies</label>
                <select id="veggies" name="veggies" class="form-control" id="ingrediens_input">
                    <?php 
                        $bread_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='veggies'";
                        $bread_r = mysqli_query($db, $bread_q);
                        while ($bread = mysqli_fetch_assoc($bread_r)) {
                    ?>    
                        <option value="<?php echo $bread['ingredient_name'] ?>"> <?php echo $bread['ingredient_name'] ?></option>
                    <?php } ?>
                </select>
            </div><!-- Veggies -->
                   
            <div class="col-12 form-group">
                <div class="row">
                     <div class="col-sm-4 mr-auto">
                        <input type="submit" value="Update" class="form-control btn btn-success">
                    </div><!-- submit -->
                    <div class="col-sm-4 ml-auto">
                        <a href="<?php echo 'orders.php?id='.$transaction_id ?>">
                            <input type="button" value="Cancel" class="form-control btn btn-danger">
                        </a>
                    </div><!-- cancel -->
                </div>
            </div>
        </div><!-- row -->
    </form><!-- form -->
    <?php }  ?>
</div><!-- container -->

<?php
    include_once("../includes/footer.php");
?>