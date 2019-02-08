<?php
    require_once("core/init.php");
    $page_title = 'Hompage';
    require_once("includes/head.php");
    require_once("includes/navigation.php");

        $ingredient_type_q = "SELECT ingredient_type FROM ingredients WHERE ingredient_type !=''";
        $ingredient_type_r = mysqli_query($db, $ingredient_type_q);
?>   
<?php
        
    $date = date("M d, Y"); // get the date
    $time = date("H: i :s");
    $date_time = $time." - ".$date;

    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $bread = $_POST['bread'];
        $sauce = $_POST['sauce'];
        $sandwich_type = $_POST['sandwich-type'];
        $cheese = $_POST['cheese'];
        $veggies = $_POST['veggies'];

        $transaction_q = "INSERT INTO transactions (customer_fullname) VALUES ('$fullname')";
        $transaction_r = mysqli_query($db, $transaction_q);
        if ($transaction_r) {
            // echo 'success transaction_r';
            echo mysqli_error($db);
        }else{
            // echo 'failed transaction_r';
            echo mysqli_error($db);
        }

        
        $order_q = "INSERT INTO orders (bread, sauce, sandwich_type, cheese, veggies) VALUES ('$bread', '$sauce', '$sandwich_type', '$cheese', '$veggies')";
        $order_r = mysqli_query($db, $order_q);

        if ($order_r) {
            // echo 'success order_r';
            echo mysqli_error($db);
        }else{
            // echo 'failed order_r';
            echo mysqli_error($db);
        }
    }


?>
<body onload="startTime()" id="body" class="" >
<div class="container">
    <form action="index.php?transaction=''"  method="post">
        
        <div class="row">
            <div class="col-sm-12 mb-2">
                <div class="input-group col-sm-4 ml-auto">
                    <label class="mr-2 text-light">Date time </label>
                    <label class="mr-1" id="time"></label>
                    <label> - <?php echo $date; ?></label>
                </div>
            </div><!-- DATE -->

            <div class="col-sm-12 mb-5">
                <div class="input-group col-sm-4 ml-auto">
                    <div class="input-group-prepend">
                        <label class="m-0" for="fullname">
                            <span class="input-group-text">Full name</span>
                        </label>
                    </div>
                    <input type="tel" class="form-control" id="fullname" name="fullname"  required pattern=".{2,}" title='Full name (Format: Jonh Doe)' >
                </div>
            </div><!-- Full name -->
           
            <div class="col-sm-12">
                <div class="row">
                    <?php while ($ingredient_type = mysqli_fetch_assoc($ingredient_type_r)) { ?>
                        <div class="col"> 
                            <h5 class="text-capitalize text-light"><?php echo $ingredient_type['ingredient_type']; ?></h5>
                            <div class="form-group">
                                <?php
                                    $ingredient_name_q = "SELECT * FROM ingredients WHERE ingredient_parent_name='".$ingredient_type['ingredient_type']."'";
                                    $ingredient_name_r= mysqli_query($db, $ingredient_name_q);
                                    while ($ingredient_name = mysqli_fetch_assoc($ingredient_name_r)) { 
                                ?>
                                    <div class="custom-control custom-radio mr-2">
                                        <input type="radio" class="custom-control-input"
                                            name="<?php echo $ingredient_type['ingredient_type'] ?>"
                                            id="<?php echo $ingredient_name['ingredient_name'] ?>"
                                            value="<?php echo $ingredient_name['ingredient_name'] ?>"
                                            checked>
                                        <label class="custom-control-label" for="<?php echo $ingredient_name['ingredient_name'] ?>">
                                            <?php echo $ingredient_name['ingredient_name'] ?>
                                        </label>
                                    </div><!-- radio btn -->
                                <?php } ?><!-- ingredient_name loop-->
                            </div><!-- form-group -->
                        </div><!-- col-4-->
                    <?php } ?><!-- ingredient_type loop-->
                </div><!-- row -->
              
            </div><!--products -->

            <div class="col-sm-6 offset-sm-3 mb-3 <?php echo isset($_POST['submit'])? 'd-none' : 'd-inline-block' ?>">
                <div class="row container">
                    <div class="col-sm-6 offset-3">
                        <input type="submit" class="form-control btn btn-success" value="Order" name="submit">
                    </div>
                 </div>
            </div><!-- Process Order -->

            <div class="col-sm-6 offset-sm-3 mb-3 <?php echo isset($_POST['submit'])? 'd-inline-block' : 'd-none' ?>">
                <div class="row container">
                    <div class="col-sm-6 offset-3">
                        <a href="index.php">
                            <input type="button" class="form-control btn btn-success" value="Order Again" name="order_again">
                        </a>
                    </div>
                 </div>
            </div><!-- Order Again -->

            <div class="col-sm-6 offset-sm-3 <?php echo !isset($_POST['submit'])? 'd-none' : 'd-inline-block' ?>">
                <div class="row container p-2" id="order_information">
                    <div class="col-sm-12">
                        <h4 class="text-center mb-4 text-light">Order Information</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="row" id="order_info_header">
                            <div class="col-sm-4 text-left">
                                <label class="mr-2 text-light"><b>Customer Name: </b></label>
                                <label><?php echo $fullname; ?></label>
                            </div>
                            <div class="col-sm-6 ml-auto text-right">
                                <label class="mr-2 text-light"><b> Order Date/time </b></label>
                                <label class="mr-1" id=""></label>
                                <label><?php echo $date_time; ?></label>
                            </div>
                        </div>
                    </div><!-- Order Date/time -->
                    <div class="col-sm-12 my-4">
                        <div class="row">
                            <div class="col-sm-10 ml-3">
                                <label class="mr-2 text-light"><b>Bread: </b></label>
                                <label>
                                    <?php echo isset($_POST['submit'])? $bread : '' ?>
                                </label>
                            </div>
                            <div class="col-sm-10 ml-3">
                                <label class="mr-2 text-light"><b>Sauce: </b></label>
                                <label>
                                    <?php echo isset($_POST['submit'])? $sauce : '' ?>
                                </label>
                            </div>
                            <div class="col-sm-10 ml-3">
                                <label class="mr-2 text-light"><b>Sandwich Type: </b></label>
                                <label>
                                    <?php echo isset($_POST['submit'])? $sandwich_type : '' ?>
                                </label>
                            </div>
                            <div class="col-sm-10 ml-3">
                                <label class="mr-2 text-light"><b>Cheese: </b></label>
                                <label>
                                    <?php echo isset($_POST['submit'])? $cheese : '' ?>
                                </label>
                            </div>
                            <div class="col-sm-10 ml-3">
                                <label class="mr-2 text-light"><b>Veggies: </b></label>
                                <label>
                                    <?php echo isset($_POST['submit'])? $veggies : '' ?>
                                </label>
                            </div>
                        </div>
                    </div><!-- order item details -->
                </div><!-- row -->
            </div><!-- Order Information -->
          
        </div><!-- row -->
    </form><!-- form> -->
</div><!-- container -->

<?php
   $get_data = file_get_contents("json_files/data.json");
   $data = json_decode($get_data, true);// returns the whole json object

    foreach($data as $key => $value){
        foreach($value as $key2 => $subvalue){
            
            // CHECK IF THE ingredient type is already exists or not
            $select_ingredient_type = "SELECT * FROM ingredients WHERE ingredient_type='$key2'";//select * ingredient type
            $ingredient_type_result = mysqli_query($db, $select_ingredient_type);//run ingredient type query
            $ingredient_type_row = mysqli_num_rows($ingredient_type_result);//fetch ingredient_type_result
            if ($ingredient_type_row > 0) {
            //    if already exists do nothing
            }else{
                // if not insert data from jason file
                $ingredient_type = "INSERT INTO ingredients (ingredient_type) VALUES ('$key2')";
                $ingredient_type_result = mysqli_query($db, $ingredient_type);
            }

            foreach ($subvalue as $ingredients) {

                // CHECK IF THE ingredient_name is already exists or not
                $select_ingredients_name = "SELECT * FROM ingredients WHERE ingredient_name='$ingredients'";
                $ingredients_name_result = mysqli_query($db, $select_ingredients_name);
                $ingredients_name_row = mysqli_num_rows($ingredients_name_result);
                    if ($ingredients_name_row > 0) {
                        //   if already exists do nothing
                    }else{
                        // if not insert data from jason file
                        $ingredients_name = "INSERT INTO ingredients (ingredient_name, ingredient_parent_name) VALUES ('$ingredients', '$key2')";
                        $ingredient_name_result = mysqli_query($db, $ingredients_name);
                    }
            }
            echo "<br>";
        }
    }
?>



<script>
    let today = new Date();// get date today
    let h = today.getHours();//get hours
    let m = today.getMinutes();// get minutes
    let s = today.getSeconds();// get seconds
    h = checkTime(h);
    m = checkTime(m); 
    s = checkTime(s);

    var order_time = document.getElementById('order_time').innerHTML =
    h + " : " + m + " : " + s;

function startTime() {
    var today = new Date();// get date today
    var month = today.getMonth();// get month
    var day = today.getDate();// get date
    var year = today.getFullYear()// get year
    var h = today.getHours();//get hours
    var m = today.getMinutes();// get minutes
    var s = today.getSeconds();// get seconds

    // wrapp in checktime function that adds a leading zero if the minute and seconds is lessthan to 10
    h = checkTime(h);
    m = checkTime(m); 
    s = checkTime(s);
    var time = document.getElementById('time').innerHTML =
    h + " : " + m + " : " + s;
    var t = setTimeout(startTime, 500);
}// onload
function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    };  // add zero in front of numbers < 10
    
    return i;
}

</script>
<?php
    require_once("includes/footer.php");
?>

