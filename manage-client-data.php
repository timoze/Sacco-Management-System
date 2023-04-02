<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    $output = "";

     $output .= '    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
            <thead> 
            <tr> 
                <th>#</th> 
                <th>Client Name</th>
                <th>Client Home</th>
                <th>Client Contacts</th>
                <th>National ID/<BR>Passport</th>
                <th>Client Industry</th>
                <th>Guarantor <br>Details</th>
                <th>Status</th>
                <th class="hidden-print">Action</th>
                            <th class="hidden-print"><input type="checkbox" id="check-all"  onClick="this.value=check(this.form);document.form1.go.disabled=false;" ></th>
            </tr>
            </thead>
            <tbody>';

            
            $sql="SELECT * from tblclient $search_query ";
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {
                $stat = htmlentities($row->Status); 
                if ($stat =="1") {
                    $status = '<font color=green><b>Active</b></font>';   
                }
                else
                {
                    $status = '<font color=orange><b>In-Active</b></font>';   
                }
                $i=$cnt-1;
                $edit = '<a  class="dropdown-item" href="edit-client-details.php?editid='.$row->ID.'" title="Click to Edit" style="text-decoration:none">Edit</a>';
                if ($stat=='1') {
                    $changestatus = '<a class="dropdown-item" href="client_status_change.php?client_id='.$row->ID.'&status=0" title="Click to Change Status" style="text-decoration:none">De-Activate</a>';
                }
                else{
                    $changestatus = '<a class="dropdown-item" href="client_status_change.php?client_id='.$row->ID.'&status=1" title="Click to Change Status" style="text-decoration:none">Activate</a>';
                }
                $view_details = '<a class="dropdown-item" href="view_client_invoice.php?client_id='.$row->ID.'" title="Click to View Client Payment Detail" style="text-decoration:none">View Payments</a>';
                $print = '<a class="dropdown-item" href="view_client_details.php?client_id='.$row->ID.'" title="Click to View Client Details" style="text-decoration:none">Print</a>';
                $client_passport = '<a class="dropdown-item" href="client_passport.php?client_id='.$row->ID.'" title="Click to Upload Client Passport" style="text-decoration:none">Upload Passport</a>';
                $delete = '<a class="dropdown-item" href="delete_client.php?client_id='.$row->ID.'" title="Click to Delete" style="text-decoration:none">Delete Client</a>';

                $action = '<div class="input-group-btn">
                                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cogs"></i> Action <span class="caret"></span>
                                                    </button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li>'.$edit.'</li>
                            <li>'.$changestatus.'</li>  
                            <li>'.$view_details.'</li>   
                            <li>'.$print.'</li>  
                            <li>'.$client_passport.'</li>   
                            <li>'.$delete.'</li>      
                            <li>'.$file_opening_form.'</li>   
                            <li>'.$file_label_form.'</li>                                        
                        </ul>

                </div>'; 
                

            $output .= '    <tr class="active">									      	
                    <th><?php echo htmlentities($cnt);?></th>								
                    <td><?php  echo htmlentities($row->ContactName);?></td> 
                    <td><?php  echo htmlentities($row->Family);?></td> 
                    <td>Cell No. - <?php  echo htmlentities($row->Clientphnumber);?><br>
                    </td>
                    <td><?php  echo htmlentities($row->NationalID);?></td>
                    <td><?php  echo htmlentities($row->CompanyName);?></td>
                    <td>Name. - <?php  echo htmlentities($row->Guarantor);?><br>
                    Cell - <?php  echo htmlentities($row->Guarantorphnumber);?><br>
                    ID/Passport - <?php echo htmlentities($row->GuarantorID);?></td>
                    <td  style="text-align: center;" nowrap="nowrap"><?php  echo $status;?></td>
                    <td class="hidden-print" style="text-align: center;" nowrap="nowrap"><?php  echo $action;?></td>
                    <td class="hidden-print"><input type="checkbox" id="check-all" class="delete-id" name="list<?php echo $i;?>" value="<?php echo $row->ID;?>" onClick="document.go.disabled=false"></td>
                    
                </tr>
                <input type="hidden" id="client_id<?php echo $i;?>" name="client_id<?php echo $i;?>" value="<?php echo $row->ID;?>">';
            $cnt=$cnt+1;
            }

             $output .= '  <input type="hidden" name="numbr" id="numbr" value="<?php echo $query->rowCount();?>"" >';
            
                }
            
            
           $output .= ' </tbody>
        </table>';
        ?>