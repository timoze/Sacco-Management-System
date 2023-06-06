<?php
ob_start();
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
include('../php_functions/functions.php');
include('../session.php');

if (!CheckSession()) {
    header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
} else{
    $logged_inuser = $_SESSION['member_id'];
    $op = $_REQUEST['op'];
    //$eid=$_GET['editid'];
      if (isset($_POST['submit'])) {
        //$clientmsaid=$_SESSION['clientmsaid'];
            //$member_id          =   1;
           // $mem_no           =   $_POST['mem_no'];
            $menus              =   $_POST['menus'];
            $menuitems          =   $_POST['menu_items'];
            $count = 0;

            for ($i=0; $i < count($menus); $i++) { 
                $menu_id = $menus[$i];

                $menusacces = $menuitems[$menu_id];
                $menu_access = implode(',',$menusacces);

                $sql="UPDATE menu_sub set accessed_by=:accessed_by where sub_id=:eid ";

                $query=$dbh->prepare($sql);        
                //$query->bindParam(':mem_no', $mem_no, PDO::PARAM_STR);
                $query->bindParam(':accessed_by', $menu_access, PDO::PARAM_STR);
             
                $query->bindParam(':eid', $menu_id, PDO::PARAM_STR);
                $query->execute(); 

                $count += $query->rowCount();


            }
            
              if ($count>0) {
                $audit_description = "Updated Menu Acess";
                 audit_trail($dbh, $audit_description, $logged_inuser);
                 // echo '<script>alert("Client has been added.")</script>';
                  echo "<script>window.location.href ='menu_access.php?op=ok'</script>";
              } else {
                  echo "<script>window.location.href ='menu_access.php?op=no'</script>";
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
    <title>Badili Sacco | Update Company Details</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendor/jquery_date_picker/css/jquery-ui.css" rel="stylesheet">
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
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box ">
                                                <form method="post" onsubmit="return ValidateForm()" novalidate>
                                                <table class="table table-striped table-bordered" style="width:100%">
                                                    <span class="section">Menu Access</span>
                                                    <?php

                                                        if ($op=="ok") {
                                                            ?>
                                                            <div class="alert alert-success" role="alert">
                                                                Menu Access Configurations Updated Successfully.
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
                                                                       
                                                <?php
                                                    $eid = 1;

                                                    // get groups array

                                                    $sqlgroups="SELECT dept_id, department_name, department_shortname from user_department where status=:eid ";
                                                    $querygroups = $dbh -> prepare($sqlgroups);
                                                    $querygroups->bindParam(':eid',$eid,PDO::PARAM_STR);
                                                    //$querygroups->bindParam(':menuid',$menu_id,PDO::PARAM_STR);
                                                    $querygroups->execute();
                                                    $resultsgroups=$querygroups->fetchAll(PDO::FETCH_OBJ);

                                                    $dept_array = array();
                                                    $ij = 0;

                                                    if ($querygroups->rowCount() > 0) {
                                                        foreach ($resultsgroups as $rowgroup) {
                                                            $dept_id = $rowgroup->dept_id;
                                                            $dept_name= $rowgroup->department_name;
                                                            $dept_shortname = $rowgroup->department_shortname;

                                                            $dept_array[$ij] = array($dept_id,$dept_name,$dept_shortname);
                                                            $ij++;
                                                        }
                                                    }
                                                    ?>

                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <?php
                                                                    for ($iii=0; $iii < count($dept_array) ; $iii++) { 

                                                                    
                                                                        ?>
                                                                            <th style="text-align: center;"><?php echo $dept_array[$iii][1];?></th>
                                                                        <?php
                                                                        
                                                                    }                                           
                                                                ?>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                        <?php


                                                    $sqlm="SELECT menu_id, description from menu where status=:eid ";
                                                    $querym = $dbh -> prepare($sqlm);
                                                    $querym->bindParam(':eid',$eid,PDO::PARAM_STR);
                                                    //$querym->bindParam(':menuid',$menu_id,PDO::PARAM_STR);
                                                    $querym->execute();
                                                    $resultsm=$querym->fetchAll(PDO::FETCH_OBJ);

                                                        if ($querym->rowCount() > 0) {
                                                            foreach ($resultsm as $rowm) {
                                                                $menu_id = $rowm->menu_id;
                                                                $main_dec = $rowm->description;

                                                                ?>

                                                                    <tr>
                                                                        <th colspan="<?php echo (count($dept_array)+1);?>"> <?php echo $rowm->description;?> </th>

                                                                       
                                                                    </tr>
                                                                <?php




                                                                $sql="SELECT sub_id, description, accessed_by from menu_sub where status=:eid and menu_id=:menuid";
                                                                $query = $dbh -> prepare($sql);
                                                                $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                                                $query->bindParam(':menuid', $menu_id, PDO::PARAM_STR);
                                                                $query->execute();
                                                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                                                $cnt=1;
                                                                if ($query->rowCount() > 0) {
                                                                    foreach ($results as $row) {

                                                                        $accessed_by = $row->accessed_by;
                                                                        $accesedbyarr = explode(',' , $accessed_by);
                                                                       // print_r($accesedbyarr);
                                                                        ?>

                                                                            <tr>
                                                                                <td> <?php echo $row->description;?> <input type="hidden" name="menus[]" id="menus<?php echo $row->sub_id;?>" value="<?php echo $row->sub_id;?>" > </td>

                                                                                <?php
                                                                                    for ($iii=0; $iii < count($dept_array) ; $iii++) { 

                                                                                        if (in_array($dept_array[$iii][0],$accesedbyarr)) {
                                                                                            $value = '1';
                                                                                            $checked = "checked";
                                                                                        }else{
                                                                                            $value = '0';
                                                                                            $checked = "";
                                                                                        }

                                                                                        ?>
                                                                                            <td style="text-align: center;">
                                                                                                <input type="checkbox" name="menu_items[<?php echo $row->sub_id;?>][]" value="<?php echo $dept_array[$iii][0];?>" <?php echo $checked;?>> 
                                                                                                
                                                                                            </td>
                                                                                        <?php
                                                                                        
                                                                                    }                                          

                                                                            
                                                                                ?>

                                                                                
                                                                                
                                                                            </tr>
                                                                            
                                                                        
                                                    
                                                
                                                                
                                                                <?php
                                                                }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                                    </table>
                                                            
                                                                <br>

                                                                <div class="ln_solid">
                                                                    <div class="form-group">
                                                                        <div class="col-md-6 offset-md-3">
                                                                            <button type='submit' name="submit" class="btn btn-primary" onclick="refreshmain_window()">Update</button>
                                                                            <button type='reset' class="btn btn-success">Reset</button>
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
        function ValidateForm() {
            var company_name = document.getElementById("company_name").value;
            if (company_name=="") {
                alert("Fill in the Company Name");
                return false;
            }
            var company_tel = document.getElementById("company_tel").value;
            if (company_tel=="") {
                alert("Fill in the Telephone number.");
                return false;
            }
            var company_email = document.getElementById("company_email").value;
            if (company_email=="") {
                alert("Fill in the Email Address.");
                return false;
            }
            var address = document.getElementById("address").value;
            if (address=="") {
                alert("Fill in the postal address.");
                return false;
            }
            var postal_code = document.getElementById("postal_code").value;
            if (postal_code=="") {
                alert("Fill in the Postal Code");
                return false;
            }
            var town = document.getElementById("town").value;
            if (town=="") {
                alert("Fill in the Company Town.");
                return false;
            }
            var company_pin = document.getElementById("company_pin").value;
            if (company_pin=="") {
                alert("Fill in the Company PIN.");
                return false;
            }
            var physical_address = document.getElementById("physical_address").value;
            if (physical_address=="") {
                alert("Fill in the Company Physical Address.");
                return false;
            }
            var registration_date = document.getElementById("registration_date").value;
            if (registration_date=="") {
                alert("Fill in the Company Registration Date.");
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
     <!-- <script>
      // Get all the checkboxes
      const checkboxes = document.querySelectorAll('input[type="checkbox"]');
      
      // Add event listener to each checkbox
      checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
          // Update the checkbox value to 1 if it is checked, and 0 otherwise
          checkbox.value = checkbox.checked ? 1 : 0;
        });
      });
    </script> -->
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

    <script src="../vendor/chosen/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../vendor/jquery_date_picker/js/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
          
            $(function() {
                $( "#registration_date" ).datepicker({
                    dateFormat: 'dd-mm-yy'
                });
            });
        })
    </script>
</body>
</html>
<?php
}
 ?>
