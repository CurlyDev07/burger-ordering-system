<?php
   require_once("../core/init.php");
   include_once("../includes/head.php");
?>


<style>
    #body{
    background-image: url("../images/Burger king.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center; 
    color: #bdbdbd;
    }
    form#form-bg {
        background-color: #001d07;
        border: 1px solid;
        border-raduis: 5px;
        border-radius: 6px;
    }
</style>

<body id="body" class="">
<div class="mt-5"> </div>

<?php
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE email='$email'";
        $result = mysqli_query($db, $sql);
        $admin = mysqli_fetch_assoc($result);
        
        $errors = [];
       // VALIDATIONS
        if (!isset($email) || empty($email)) {
            $errors[] = "Please provide your email address.";
        }elseif(mysqli_num_rows($result) == 0){
            $errors[] = "Invalid email address.";
        }// for email

        if(!isset($password) || empty($password)){
            $errors[] = "Please provide your password.";
        }elseif ($password != $admin['password']) {
            $errors[] = "Incorrect password.";
        }//for password

        if (!empty($errors)) {
            echo '<div class="col-sm-4 offset-4 mt-5 text-danger text-center">';
                foreach ($errors as $errors) {
                    echo $errors.'<br>';
                }
            echo '</div>';
        }else{
            
            $_SESSION['user'] = $admin['email'];
            header("Location: index.php");
        }
    }
?>


<div class="container-fluid pt-5 mt-5"  id="login-bg">
    <h5 class="offset-4 pb-2 mt-5">Welcome to Burger Ordering system! Please login.</h5>

    <form class="col-sm-4 offset-4 pt-3" id="form-bg" method="post" >
        <div class="form-row">
           <label for="email" class="form-control-label col-12">Email address</label>
           <div class="col form-group  mb-0 pb-1">
               <input type="text" id="email" placeholder="Email" class="form-control" name="email">
           </div>
        </div><!-- Email address -->

        <div class="form-row">
           <label for="email" class="form-control-label col-12">Password</label>
           <div class="col form-group">
                <input type="password" placeholder="Phone number" class="form-control" name="password">
           </div>
        </div><!-- Password -->

        <div class="form-row">
           <div class="col-4 form-group">
                <button type="submit" class="form-control btn btn-success" name="submit">Login</button>
           </div><!-- submit -->
           <div class="col-4 form-group ml-auto">
                <a href="../index.php">
                    <button type="button" class="form-control btn btn-danger">Back</button>
                </a>
           </div><!-- submit -->
       </div><!-- Sign Up -->
           
    </form>
</div>

<?php
    include_once("../includes/footer.php");
?>