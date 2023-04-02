<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	if (isset($_POST['submit']))  
	{
		$eid=$_GET['editid'];
		
		$cname=$_POST['cname'];
		$comname=$_POST['comname'];
		$address=$_POST['address'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		//$zcode=$_POST['zcode'];
		$wphnumber=$_POST['wphnumber'];
		$guarantor_cell=$_POST['guarantor_cell'];
		//$ophnumber=$_POST['ophnumber'];
		$email=$_POST['email'];
		// $websiteadd=$_POST['websiteadd'];
		$notes=$_POST['notes'];
		
		$guarantor=$_POST['guarantor'];
		$guarantor_id=$_POST['guarantor_id'];
		$national_id = $_POST['national_id'];
		
		$sql="update tblclient set ContactName=:cname,CompanyName=:comname,Address=:address,City=:city,Family=:state,Clientphnumber=:wphnumber,Guarantorphnumber=:guarantor_cell,Email=:email,Notes=:notes, Guarantor=:guarantor,GuarantorID=:gurantorid,NationalID=:national_id where ID=:eid";
		$query=$dbh->prepare($sql);
		//$query->bindParam(':acctid',$acctid,PDO::PARAM_STR);
		//$query->bindParam(':accttype',$accttype,PDO::PARAM_STR);
		$query->bindParam(':cname',$cname,PDO::PARAM_STR);
		$query->bindParam(':comname',$comname,PDO::PARAM_STR);
		$query->bindParam(':address',$address,PDO::PARAM_STR);
		$query->bindParam(':city',$city,PDO::PARAM_STR);
		$query->bindParam(':state',$state,PDO::PARAM_STR);
		//$query->bindParam(':zcode',$zcode,PDO::PARAM_STR);
		$query->bindParam(':wphnumber',$wphnumber,PDO::PARAM_STR);
		$query->bindParam(':guarantor_cell',$guarantor_cell,PDO::PARAM_STR);
		$query->bindParam(':email',$email,PDO::PARAM_STR);
		//$query->bindParam(':websiteadd',$websiteadd,PDO::PARAM_STR);
		$query->bindParam(':notes',$notes,PDO::PARAM_STR);
		
		$query->bindParam(':national_id',$national_id,PDO::PARAM_STR);
		$query->bindParam(':guarantor',$guarantor,PDO::PARAM_STR);
		$query->bindParam(':gurantorid',$guarantor_id,PDO::PARAM_STR);
		$query->bindParam(':eid',$eid,PDO::PARAM_STR);
		$query->execute();
		echo '<script>alert("Client detail has been updated")</script>';
		echo "<script type='text/javascript'> document.location ='edit-client-details.php?editid=$eid'; </script>";
	} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Santalink | Update Client Details</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form method="post" novalidate>
                                        
										<?php
										$eid=$_GET['editid'];
										$sql="SELECT * from tblclient where ID=:eid";
										$query = $dbh -> prepare($sql);
										$query->bindParam(':eid',$eid,PDO::PARAM_STR);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {
                                                ?>
												<span class="section">Update Client Information</span>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Contact Name<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="cname" value="<?php  echo $row->ContactName;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Home<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="state" value="<?php  echo $row->Family;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Type of Business (Industry)<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="comname" value="<?php  echo $row->CompanyName;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Address<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<textarea required="required" name='address' rows="4" cols="3">
														<?php  echo $row->Address;?></textarea>
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">City / County<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="city" value="<?php  echo $row->City;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Client ID / Passport<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="national_id" value="<?php  echo $row->NationalID;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Client Phone Number <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="wphnumber" required='required' value="<?php  echo $row->Clientphnumber;?>"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Email Address<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="email" class='email' value="<?php  echo $row->Email;?>" required="required" type="email" /></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Guarantor<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="guarantor" value="<?php echo $row->Guarantor;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Guarantor ID / Passport No.<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" name="guarantor_id" placeholder="Guarantor ID / Passport Number" value="<?php echo $row->GuarantorID;?>" required="required" />
													</div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Guarantor Phone Number <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input class="form-control" type="number" class='number' name="guarantor_cell" value="<?php echo $row->Guarantorphnumber;?>" required='required' placeholder="Guarantor Cell Phone Number"></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Collateral / Security<span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<textarea required="required" name='notes' placeholder="Notes" rows="4" cols="3"><?php  echo $row->Notes;?></textarea></div>
												</div>
												<div class="field item form-group">
													<label class="col-form-label col-md-3 col-sm-3  label-align">Creation Date <span class="required">*</span></label>
													<div class="col-md-6 col-sm-6">
														<input type="text" name="" value="<?php  echo $row->CreationDate;?>" class="form-control" readonly='true' />

													</div>
												</div>
												<?php
												$cnt=$cnt+1;
                                            }
                                        }
										?>
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' name="submit" class="btn btn-primary">Update</button>
                                                    <button type='button' onclick="window.open('', '_self', ''); window.close();" class="btn btn-success">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="./vendors/validator/multifield.js"></script>
    <script src="./vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="./vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>

</body>

</html>
<?php
  }
 ?>
