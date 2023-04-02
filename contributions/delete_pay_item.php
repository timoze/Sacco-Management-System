<?php
    ob_start();
    session_start();
   // error_reporting(0);
    include('../includes/dbconnection.php');
    include('../php_functions/functions.php');
    include('../session.php');
    $logged_inuser = $_SESSION['member_id'];
    if (isset($_SESSION['member_id'])) {
        $contribution_id        =   $_POST['contribution_id'];
        $item_id                =   $_POST['item_id'];
        $item_amount            =   $_POST['item_amount'];
        $selected_pay_item      =   $_POST['selected_pay_item'];
        $rowId                  =   $_POST['rowId'];
        $memberid               =   $_POST['memberid'];
        $total_amount_initial   =   $_POST['total_amount_initial'];
        $status = 9;
        //get the new amount
        $new_amount = $total_amount_initial - $item_amount;
        //DELETE FROM CONTRIBUTION TABLE
        $sql="UPDATE member_contribution SET status=:status where contrib_id=:eid and id=:itemid";
        $query=$dbh->prepare($sql);
        $query->bindParam(':eid', $contribution_id, PDO::PARAM_STR);
        $query->bindParam(':itemid', $item_id, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_STR);
        $query->execute();
        //REDUCE THE DELETED FROM CONTRIBUTION TABLE
        $sql2="UPDATE member_contribution_main SET contribution_amount=:amount where id=:eid ";
        $query2=$dbh->prepare($sql2);
        $query2->bindParam(':eid', $contribution_id, PDO::PARAM_STR);
        $query2->bindParam(':amount', $new_amount, PDO::PARAM_STR);
        $query2->execute();
       // mysqli_query($connection, "UPDATE member_contribution_main set contribution_amount = '$new_amount' where id='$item_id' ");
        
        //$txn_id = get_txnid_fromcontribution_id($dbh, $contribution_id);
        $fnames = get_membername_fromid($dbh, $memberid);
        $audit_description = "Deleted Contribution Item for (" . $fnames .") ";
        audit_trail($dbh, $audit_description, $logged_inuser);

        echo $rowId;
} else {
    echo "";
}
?>