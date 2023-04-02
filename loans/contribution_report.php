
<?php
session_start();
//error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');
if (!CheckSession()) {
  header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
  exit();
} else{

    $logged_inuser = $_SESSION['member_id'];
    
    $date1 = $_REQUEST['date_from'];
    $date2 = $_REQUEST['date_to'];
    $user_id = $_REQUEST['user_id'];
    if (!$user_id) {
      $user_id = $logged_inuser;
    }
    $report_type = $_REQUEST['report_type'];


    $search_query = " where status=1 ";
    $disp_title = "";
    if ($user_id) {
      $search_query .= " AND user_id = ".$user_id." ";
      $disp_title .= "<b> Member : </b>". get_membername_fromid($dbh,$user_id) ."<br>";
    }
    if ($date1 && $date2) {
      $date1final  = date("Y-m-d H:i:s", strtotime($date1));
      $date2final  = date("Y-m-d 23:59:59", strtotime($date2));
      $search_query .= " AND trail_date between '".$date1final."' and '".$date2final."'  ";
      $disp_title .= "<b>Date From :</b>" .$date1. "<b>   To : </b>". $date2;
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

    <title>Badili Sacco | Contribution Report</title>

     <!-- Bootstrap -->
     <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Datatables -->
        
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
   
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                
                                <div class="x_content">
                                    <form method="post" novalidate>

                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Date</label>
                                            <div class="col-md-3 col-sm-3">
                                              From: <input class="form-control datepick" name="date_from" id="date_from" value="<?php echo date('01-01-Y');?>" required="required" />
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                              To: <input class="form-control datepick2" name="date_to" id="date_to" value="<?php echo date('d-m-Y');?>" required="required" />
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Member / User</label>
                                          <div class="col-md-6 col-sm-6">
                                            <select name="user_id" id="user_id" placeholder="Select User ..." class="form-control" required='true'>
                                            <option value="">All Members</option>
                                              <?php
                                                $staus = "1";
                                                $sqdepts="SELECT member_id from users where status=:staus";
                                                $query_depts = $dbh -> prepare($sqdepts);
                                                $query_depts->bindParam(':staus',$staus,PDO::PARAM_STR);
                                                $query_depts->execute();
                                                $result_depts=$query_depts->fetchAll(PDO::FETCH_OBJ);
                                                $cnt=1;
                                                if($query_depts->rowCount() > 0)
                                                {
                                                  foreach($result_depts as $row_depts)
                                                  {  
                                                    $mbr_id = $row_depts->member_id;
                                                    $mbr_name = get_membername_fromid($dbh,$mbr_id);
                                                    ?>
                                                        <option value="<?php  echo $mbr_id;?>"><?php  echo $mbr_name;?></option>
                                                    <?php 
                                                    $cnt=$cnt+1;
                                                  }
                                                } 
                                              ?>
                                            </select> 
                                            
                                          </div>
                                          
                                        </div>
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align">Report Type: </label>
                                            <div class="col-md-6 col-sm-6"> 
                                                <select name="report_type" id="report_type" placeholder="Select a Report Type ..." class="form-control" required='true'>
                                                    <option value="1">Contribution Per Member</option>
                                                    <option value="2">Contribution Per Month</option>
                                                    
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="field item form-group">
                                          <label class="col-form-label col-md-3 col-sm-3  label-align"></label>
                                            <div class="col-md-6 col-sm-6"> 
                                                <button type='submit' name="submit"  class="btn btn-primary">View Report</button>
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                      include('./contribution_per_user.php');
                    ?>
                </div>
            </div>
            <!-- /page content -->
                    
                </div>
            </div>
            <!-- /page content -->
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


<script type="text/javascript">
        function controlPopup(date_from,date_to, user_id, report_type ) {


            alert(report_type);


            


            //var xPos = (screen.width/2) - (windowWidth/2);
            //var yPos = (screen.height/2) - (windowHeight/2);
            //window.open(url,description,"width="+ windowWidth+",height="+windowHeight +",left="+xPos+",top="+yPos);



            return true;
        }
    </script>

  
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery-3.5.0.min.js"></script>
    <script src="../vendors/jquery/dist/jquery-ui.js"></script>
    <link href="../vendors/jquery/dist/jquery-ui.css" rel='stylesheet' type='text/css' />

    
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    
   

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script  type="text/javascript">
        $( function() {
            $(".datepick" ).datepicker({ dateFormat: 'dd-mm-yy'
            });
            $(".datepick2" ).datepicker({ dateFormat: 'dd-mm-yy'
            });
          });
	</script>

</body>

</html>
<?php
  }
 ?>
