<?php
if($_REQUEST['location'] != '') {
    $redirect = $_REQUEST['location'];
}
header("location:../index.php?location=" .$redirect);
exit();
//header("Location:../index.php");
?>