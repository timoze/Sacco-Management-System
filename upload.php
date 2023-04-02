<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['clientmsaid']==0)) {
  header('location:logout.php');
  } else{
	// upload file using move_uploaded_file function in php

    $client_id = $_POST['client_id'];
	
	if (!empty($_FILES['file']['name'])) {

		$fileName = $_FILES['file']['name'];
		
		$fileExt = explode('.', $fileName);
		$fileActExt = strtolower(end($fileExt));
		$allowImg = array('png','jpeg','jpg');
		$fileNew = rand() . "." . $fileActExt;  // rand function create the rand number 
		$filePath = 'uploads/'.$fileNew; 

        $new_fname = explode('.', $fileNew);
		$new_fname = $new_fname[0];

		if (in_array($fileActExt, $allowImg)) {
		    if ($_FILES['file']['size'] > 0  && $_FILES['file']['error']==0) {  
			if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
		    	    echo '<img src="'.$filePath.'" style="width:320px;height:300px;"/>';
                    $sql="update tblclient set file_name=:fname,path=:fpath where ID=:eid";
                    $query=$dbh->prepare($sql);
                    $query->bindParam(':fname',$new_fname,PDO::PARAM_STR);
                    $query->bindParam(':fpath',$filePath,PDO::PARAM_STR);
                    $query->bindParam(':eid',$client_id,PDO::PARAM_STR);
                    $query->execute();
			}else{
			    echo "File is not uploaded try again";
			}	
		    }else{
		    	    echo "Unable to upload physical file";
		    }
		}else{	
		    echo "This type of image is not allow";
		}
	}
}
?>