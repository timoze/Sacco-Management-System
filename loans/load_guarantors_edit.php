<?php 
ob_start();
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
$logged_inuser = $_SESSION['member_id'];
$guarantors = $_POST['guarantors'];
$loan_id 	= $_POST['loan_id'];
$loan_guarantors = get_loan_guarantors_fromloanid($dbh, $loan_id);
$printout = "";
for ($icount = 0; $icount < $guarantors; $icount++) {
    $printout .= '<div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Guarantor '.($icount+1).' <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6">
        <select name="guarantor[]" id="guarantor'.$icount.'" placeholder="Select Guarantor..."  class="form-control " required="true">
													<option value=""></option>';
														$staus = "1";
														$sqclients="SELECT member_id from users where status=:staus and member_id!=:logged_member";
														$query_clients = $dbh -> prepare($sqclients);
														$query_clients->bindParam(':staus',$staus,PDO::PARAM_STR);
														$query_clients->bindParam(':logged_member',$logged_inuser,PDO::PARAM_STR);
														$query_clients->execute();
														$result_clients=$query_clients->fetchAll(PDO::FETCH_OBJ);
														$cnt=1;
														if($query_clients->rowCount() > 0)
														{
															foreach($result_clients as $row_clients)
															{  
																$mbrid = $row_clients->member_id;
																if ($mbrid == $loan_guarantors[$icount][0]) {
																	$selected = "selected";
																} else {
																	$selected = "";
																}
            $printout .= '		<option value="'.$row_clients->member_id.'" '.$selected.'>'. get_membername_fromid($dbh, $mbrid).'</option>';
																$cnt=$cnt+1;
															}
														}
														if ($loan_guarantors[$icount][1]) {
															$loan_g_amount = $loan_guarantors[$icount][1];
														}else{
															$loan_g_amount = 0;
														}
                                     $printout .= '		</select>  
    </div>
    <div class="col-md-3 col-sm-3">
        <input class="form-control" name="guarantoramount[]" id="guarantoramount'.$icount.'" onBlur="load_repayment_period()" placeholder="Amount" value='.$loan_g_amount.'   />
    </div>
</div>';
}
echo $printout;
?>