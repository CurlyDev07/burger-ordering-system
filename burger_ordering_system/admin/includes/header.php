
<style>
.bg-dark {
    background-color: #2b060d!important;
}

</style>


<div class="navbar navbar-expand navbar-dark bg-dark">
    <a href="index.php" class="navbar-brand">Burger Ordering System</a>
    <span class="navbar-text mx-auto">
       <?php echo isset($page_title)? $page_title:'' ?>
    </span>
    <div class="nav navbar-nav">
        <div class="dropdown">
            <a href="#" class="nav-link nav-item dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
            <div class="dropdown-menu">
                <a href="create_account.php" class="dropdown-item">Create new admin</a>
                <a href="logout.php" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</div>