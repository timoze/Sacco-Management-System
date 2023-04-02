<?php
    if($_POST['location'] != '') {
        $redirect = $_POST['location'];
    }
    header("location:../index.php?location=" .$redirect);
    exit();
?>