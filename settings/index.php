<?php
ob_start();
if($_REQUEST['location'] != '') {
    $redirect = $_REQUEST['location'];
}
header("location:../index.php?location=" .$redirect);
exit();
?>