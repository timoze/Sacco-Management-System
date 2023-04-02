<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  ?>
<!Doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Client Photo</title>

  <!-- Bootstrap -->
  <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
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
</head>
<?php
    $client_id = $_GET['client_id'];
    $sql_client="SELECT * from  tblclient WHERE ID=:client_id";
	$query_client = $dbh -> prepare($sql_client);
	$query_client->bindParam(':client_id',$client_id,PDO::PARAM_STR);
	$query_client->execute();
	$results_client=$query_client->fetchAll(PDO::FETCH_OBJ);
									
	foreach ($results_client as $rowclient) 
	{
        $path = $rowclient->path;
    }
?>
  <body style="margin-top:50px;background:#f2f2f2">
    <div class="container">
      <h2 style="text-align:center;">Upload Client Profile Photo</h2>
      <div class="row">
        <div class="col-md-4"></div>  
            <div class="card col-md-4" id="preview">
                <div class="card-body" id="imageView">     
                    <img src="<?php echo $path;?>" style="width:320px;height:300px;"/>  
                </div>
        </div>    
      </div>
        <div class="row">
         <div class="col-md-4"></div>  
          <div class="col-md-4" style="margin-top:20px;margin-bottom:20px;">

          <div class="alert alert-success alert-dismissible success" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="success-message">File uploaded successfully</span>  
          </div>
          <div class="alert alert-danger alert-dismissible danger" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <span class="danger-message">This type of image is not allow</span>  
          </div>

          <form id="submitForm">
            <div class="form-group">
              <label for="file">Select File</label>
              <input type="file" class="form-control" name="file" id="image" required="required">
            </div>
            <input type="hidden" name="client_id" value="<?php echo $client_id;?>">
            <div class="form-group">
              <button type="submit" class="btn btn-success btn btn-block">Upload</button>
            </div>  
          </form>
        </div>
      </div>
    </div>
    <!---jQuery ajax file upload --->
<script type="text/javascript">
  $(document).ready(function(){
      $("#submitForm").on("submit", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
          url  : "upload.php",
          type : "POST",
          cache:false,
          data :formData,
          contentType : false, // you can also use multipart/form-data replace of false
          processData: false,
          success:function(response){
            $("#preview").show();
            $("#imageView").html(response);
            $("#image").val('');
          }
        });
      });
  });
</script>
  </body>
  
</html>
<?php } ?>
