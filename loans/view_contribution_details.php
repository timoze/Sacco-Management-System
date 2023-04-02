<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
	header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
  } else{
  	$com_nam = $company_name;
  	?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Santalink | Client Details </title>
	<!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<!-- //js-->

		<style type="text/css">
			@media print {
  				
  				#other{
  				  display: none;
  				}
  				
			}
		</style>
</head> 
<body class="nav-md">
	<div class="container body">
		<div class="main_container">       
			<?php
				$member_id=intval($_GET['contribution_id']);


				$sql_member="SELECT * from  users WHERE member_id=:mbrid";
				$query_member = $dbh -> prepare($sql_member);
				$query_member->bindParam(':mbrid',$member_id,PDO::PARAM_STR);
				$query_member->execute();
				$results_member=$query_member->fetchAll(PDO::FETCH_OBJ);
												
				foreach ($results_member as $row) 
				{
					$member_id = $row->member_id;
                    $member_no = $row->member_no;
                    $first_name = $row->first_name;
                    $last_name = $row->last_name;
                    $user_names = $first_name." ".$last_name;
                    $id_no = $row->id_no;
                    $physical_address = $row->physical_address;
                    $email = $row->email;
                    $phone_no = $row->phone_no;
                    $user_department = $row->user_department;
                    $password = $row->password;
                    $password_expiry = $row->password_expiry;
                    $date_registered = $row->date_registered;
                    $status = $row->status;
                    $path = "../".$row->profile_image;

                    $datereg = date("d-m-Y H:i:s",strtotime($date_registered));
				}

			?>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="x_panel">
						<div class="x_content">
							<span class="section"><?php print $com_nam;?></span>
							<table class="table table-bordered" width="100%" border="1"> 
								<tr>
									<th colspan="3" style="text-align: center;">Member Details</th>	
								</tr>

                                <tr> 
									
									<th>Member Number: </th> 
									<td><?php  echo htmlentities($member_no);?></td>
									<td rowspan="5"><img src="<?php echo $path;?>" width="250px" height="230px"></td>
								</tr>

								<tr> 
									
									<th>Member Name</th> 
									<td><?php  echo htmlentities($user_names);?></td>
									
								</tr>
                                <tr>
									<th>ID / Passport No.</th> 
									<td><?php  echo htmlentities($id_no);?></td>
								</tr> 
								<tr> 
									<th>Role</th> 
									<td><?php  echo htmlentities(get_user_department($dbh, $user_department));?></td>
								</tr>
								
								<tr>
									<th>Phone Number</th> 
									<td><?php echo  htmlentities($phone_no);?></td> 
								</tr> 
                                <tr> 
									<th>Email</th> 
									<td colspan="2"><?php  echo htmlentities($email);?></td>
								</tr>
								<tr> 
									<th>Physical Address</th> 
									<td colspan="2"><?php echo htmlentities($physical_address);?></td>
								</tr> 
                                
								<tr>
									<th>Date Registered</th> 
									<td colspan="2"><?php echo  htmlentities($datereg);?></td> 
									
								</tr> 
								
							</table>
							<div id="other" class="ln_solid">
								<div class="form-group">
									<div class="col-md-6 offset-md-3">
										<button type='button' name="print"  OnClick="window.print();" class="btn btn-primary">Print</button>
										<button type='button' onclick="window.close();" class="btn btn-success">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>
    
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
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
</body>
</html>
<?php }  ?>