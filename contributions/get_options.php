<?php
include('../includes/dbconnection.php');
    
    //query to fetch data
    $staus = "1";
    $sql_services="SELECT description, id from payment_items where status=:staus";
    $query_services = $dbh -> prepare($sql_services);
    $query_services->bindParam(':staus',$staus,PDO::PARAM_STR);
    $query_services->execute();
    $result_services=$query_services->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    $options = array();
    if($query_services->rowCount() > 0)
    {
        foreach($result_services as $row_services)
        {  
            $options[] = array("value" => $row_services->id, "text" => $row_services->description);
            $cnt=$cnt+1;
        }
    } 

    //returning options as json
    echo json_encode($options);
?>
