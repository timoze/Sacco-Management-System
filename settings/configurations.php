<?php
ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
//include('../php_functions/functions.php');
include('../session.php');
function audit_trail($dbh, $description, $member_id)
{
    // $username = get_membername_fromid($dbh, $member_id);
    $trail_date = date("Y-m-d H:i:s", time());
    //session_start();
    //$username = $_SESSION["username"];
    // $username = isset($_SESSION["username"]) ? $_SESSION["username"] : $username;
    $ip_addr = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
    $status = 1;
    //$query = mysqli_query($dbh, "INSERT into audit_trail (trail_date, trail_desc, user_id, ip_addr trail_status) VALUES ('".$trail_date."','".$description."','".$member_id."','".$ip_addr."', '1')");
    $sql="insert into audit_trail(trail_date, trail_desc, user_id, ip_addr, trail_status)values(:date,:desc,:usrid,:ipadr,:status)";
    $query=$dbh->prepare($sql);
    $query->bindParam(':usrid', $member_id, PDO::PARAM_STR);
    $query->bindParam(':date', $trail_date, PDO::PARAM_STR);
    $query->bindParam(':desc', $description, PDO::PARAM_STR);
    $query->bindParam(':ipadr', $ip_addr, PDO::PARAM_STR);
    $query->bindParam(':status', $status, PDO::PARAM_STR);
    $query->execute();
}
if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else
{
    $logged_inuser = $_SESSION['member_id'];
   // print $logged_inuser;
    $op = $_REQUEST['op'];
    //$eid=$_GET['editid'];
      if (isset($_POST['submit'])) {
        //$clientmsaid=$_SESSION['clientmsaid'];
            $member_id          =   1;
           // $mem_no           =   $_POST['mem_no'];
            $interest_rate      =   $_POST['interest_rate'];
            $loan_formula       =   $_POST['loan_formula'];
            $loan_grace_period  =   $_POST['loan_grace_period'];
            $guarantors         =   $_POST['guarantors'];
            $adjust_loan_period =   $_POST['adjust_loan_period'];
            $mail_host          =   $_POST['mail_host'];
            $mail_username      =   $_POST['mail_username'];
            $mail_port          =   $_POST['mail_port'];

              $sql="UPDATE config set 
                            interest_rate=:interest_rate,
                            loan_formula=:loan_formula,
                            loan_grace_period=:loan_grace_period,
                            guarantors=:guarantors,
                            mail_host=:mail_host,
                            mail_username=:mail_username,
                            mail_port=:mail_port,
                            adjust_loan_period=:adjust_loan_period
              where id=:eid ";
              $query=$dbh->prepare($sql);        
              //$query->bindParam(':mem_no', $mem_no, PDO::PARAM_STR);
              $query->bindParam(':interest_rate', $interest_rate, PDO::PARAM_STR);
              $query->bindParam(':loan_formula', $loan_formula, PDO::PARAM_STR);
              $query->bindParam(':loan_grace_period', $loan_grace_period, PDO::PARAM_STR);
              $query->bindParam(':guarantors', $guarantors, PDO::PARAM_STR);
              $query->bindParam(':adjust_loan_period', $adjust_loan_period, PDO::PARAM_STR);
              $query->bindParam(':mail_host', $mail_host, PDO::PARAM_STR);
              $query->bindParam(':mail_username', $mail_username, PDO::PARAM_STR);
              $query->bindParam(':mail_port', $mail_port, PDO::PARAM_STR);
              $query->bindParam(':eid', $member_id, PDO::PARAM_STR);
              $query->execute();
              //$LastInsertId=$dbh->lastInsertId();
              $count = $query->rowCount();
              if ($count>0) {
                $audit_description = "Updated Configuration Details";
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='configurations.php?op=ok'</script>";
              } else {
                  echo "<script>window.location.href ='configurations.php?op=no'</script>";
              }
         // }
      } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Badili Sacco | Update Configurations Details</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form method="post" onsubmit="return ValidateForm()" novalidate>
                                    <?php
                                        $eid = '1';
										$sql="SELECT * from config where id=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
                                                    <span class="section">Configurations</span>
                                                    <?php
                                                    if ($op=="ok") {
                                                        ?>
                                                        <div class="alert alert-success" role="alert">
                                                        Company Details Updated Successfully.
                                                        </div>
                                                    <?php
                                                    } elseif ($op == "no") {
                                                        ?>
                                                        <div class="alert alert-danger" role="alert">
                                                            No changes Made / Error Occurred on Update try again!.
                                                        </div>
                                                    <?php
                                                    }
                                                ?>
                                                <span class="section">Loans</span>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Loan Formula<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select name="loan_formula" id="loan_formula"  placeholder="Select Loan Formula ..."  class="form-control " required='true'>
                                                            <option value="1" <?php if('1'==$row->loan_formula) echo "selected";?>>Reducing Balance</option>
                                                            <option value="2" <?php if('2'==$row->loan_formula) echo "selected";?>>Flat Rate</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Interest Rate <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="interest_rate" id="interest_rate" value="<?php echo $row->interest_rate ;?>" required='required' placeholder="Interest Rate"></div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Loan Grace Period<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="loan_grace_period" id="loan_grace_period" value="<?php echo $row->loan_grace_period ;?>" required='required' placeholder="Grace Period"></div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Max Guarantors <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="guarantors" id="guarantors" value="<?php echo $row->guarantors ;?>" required='required' placeholder="Loan Guarantors"></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Adjust Repayment Period? <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select name="adjust_loan_period" id="adjust_loan_period"  placeholder="Select Adjust Period ..."  class="form-control " required='true'>
                                                            <option value="0" <?php if('0'==$row->adjust_loan_period) echo "selected";?>>No</option>
                                                            <option value="1" <?php if('1'==$row->adjust_loan_period) echo "selected";?>>Yes</option>
                                                        </select>
                                                    
                                                    </div>
                                                </div>
                                                <span class="section">Mail</span>                                                

                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mail Host<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control email" type="email" name="mail_hosts" id="mail_hosts" value="<?php echo $row->mail_host ;?>" required  disabled='true'/>
                                                        <input class="form-control email" type="hidden" name="mail_host" id="mail_host" value="<?php echo $row->mail_host ;?>" /></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mail Username<span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control email" type="email" name="mail_usernames" id="mail_usernames" value="<?php echo $row->mail_username ;?>" required  disabled='true'/>
                                                        <input class="form-control" type="hidden" name="mail_username" id="mail_username" value="<?php echo $row->mail_username ;?>" /></div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mail Port <span class="required">*</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <input class="form-control number" type="number"  name="mail_ports" id="mail_ports" value="<?php echo $row->mail_port ;?>" required='required' placeholder="Mail Port" disabled='true'>
                                                        <input class="form-control" type="hidden"  name="mail_port" id="mail_port" value="<?php echo $row->mail_port ;?>"></div>
                                                </div>

                                                
                                                <div class="ln_solid">
                                                    <div class="form-group">
                                                        <div class="col-md-6 offset-md-3">
                                                            <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()">Update</button>
                                                            <button type='reset' class="btn btn-success">Reset</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        function ValidateForm() {
            var interest_rate = document.getElementById("interest_rate").value;
            if (interest_rate=="") {
                alert("Fill in the Interest Rate");
                return false;
            }
            var loan_formula = document.getElementById("loan_formula").value;
            if (loan_formula=="") {
                alert("Select the Loan Formula.");
                return false;
            }
            var loan_grace_period = document.getElementById("loan_grace_period").value;
            if (loan_grace_period=="") {
                alert("Fill in the loan grace period.");
                return false;
            }
            var guarantors = document.getElementById("guarantors").value;
            if (guarantors=="") {
                alert("Fill in the loan Guarantors.");
                return false;
            }
            var mail_host = document.getElementById("mail_host").value;
            if (mail_host=="") {
                alert("Fill in the Mail Host");
                return false;
            }
            var mail_username = document.getElementById("mail_username").value;
            if (mail_username=="") {
                alert("Fill in the Mail Username.");
                return false;
            }
            var mail_port = document.getElementById("mail_port").value;
            if (mail_port=="") {
                alert("Fill in the Mail Port.");
                return false;
            }
            
            return true;
        }
        function refreshmain_window()
        {
            window.onunload = function()
            {
                window.opener.location.reload();
            };
        }
    </script>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

 
  
</body>
</html>
<?php
}
 ?>
