<?php
    $db = mysqli_connect('localhost', 'root', '', 'simple_ordering_system');
    if (!$db) {
        echo "Unable to connect.";
    }
    session_start();
?>