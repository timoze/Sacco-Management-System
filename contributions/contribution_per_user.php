<?php
    $disp_title = "";
    //$search_query = " WHERE status=1 and cr_dr='D'  ";
    if ($date1 && $date2) {
        $date_1 = date("Y-m-d", strtotime($date1));
        $date_2 = date("Y-m-d", strtotime($date2));
      //  $search_query .= " and contribution_date between '$date_1' and '$date_2' ";
        $disp_title .= "Date From: " .$date1. " To: ".$date2. "<br>";
    }
    if ($user_id) {
       // $search_query .= " and member_id = '$user_id' ";
        $disp_title .= "Member : " .get_membername_fromid($dbh,$user_id) . "<br>";
    }
   // print $search_query;
    $print_item = "";
$print_item .=   ' <div class="row">
                          <div class="col-sm-12">
                          <div class="x_panel">
                            <div class="x_content">
                            <div class="card-box table-responsive">
                            <caption style="caption-side: top-right">Contribution Report Per Member <BR> '.$disp_title.'</caption>
                            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%"> 
                              <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Contribution Date</th>
                                    <th>Payment For</th>
                                    <th>Txn No.</th>
                                    <th>Amount</th>
                                    <th>Registered</br>By</th> 
                                    <th>Date Registered</th> 
                                </tr>
                              </thead>
                              <tbody>';
                              $staus = "1";
                              /*$sql="SELECT * from  audit_trail ";
                              $query = $dbh -> prepare($sql);
                              $query->bindParam(':staus',$staus,PDO::PARAM_STR);
                              $query->execute();
                              $results=$query->fetchAll(PDO::FETCH_OBJ);
                              */
                                $query_select = mysqli_query($connection, "SELECT * FROM member_contribution $search_query ORDER BY  member_id desc ");
                                $cnt=0;
                                $data_array = array();
                                $user_array = array();
                                while ($row = mysqli_fetch_assoc($query_select)) {
                                    $id                   =   $row["id"];
                                    $membid               =   $row["member_id"];
                                    $payment_type         =   $row["payment_type"];
                                    $contribution_date    =   date("d-m-Y", strtotime($row["contribution_date"]));
                                    $contribution_amount  =   $row["contribution_amount"];
                                    $txn_id               =   $row["txn_id"];
                                    $date_registered      =   $row["date_created"];
                                    $created_by           =   $row["created_by"];
                                    $status               =   $row["status"];
                                    $datecreated = date("d-m-Y H:i:s", strtotime($date_registered));
                                    //if ($status==1) 
                                    {
                                        $data_array[$membid][] = array($id, $membid, $payment_type, $contribution_date, $contribution_amount, $txn_id, $datecreated, $created_by, $status);
                                        $user_array[$cnt] = $membid;
                                        $cnt++;
                                    }
                                }
                                //print_r($user_array);
                                $user_array_f = array_unique($user_array);
                                $user_array_f = array_values($user_array_f);
                               // print_r($data_array[1]);
                                $data_count = 0;
                                $member_cont_array = "";
                                for ($ik=0; $ik < count($user_array_f) ; $ik++) { 
                                    $memberid = $user_array_f[$ik];
                                    $member_cont_array = $data_array[$memberid];
                                   // print_r($member_cont_array) . print "<br>";
                                   $print_item .=   '  <tr class="active">
                                            <td></td>
                                            <td><b>'. get_membername_fromid($dbh,$memberid).'</b></td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr> ';
                                    $total_per_user = array();
                                    $count_mcont = 0;
                                    //for ($count_mcont=0; $count_mcont < count($data_array[$memberid]); $count_mcont++){
                                    foreach ($member_cont_array as $contvalue) {
                                       // print_r($contvalue) . print "<br>" ;
                                       $print_item .=   '
                                            <tr class="active">
                                                <th>'. ($count_mcont+1).'</th>
                                                <td nowrap="nowrap">'. ($contvalue[3]).'</td>
                                                <td >'. (get_payment_type_from_id($dbh, $contvalue[2])).'</td>
                                                <td >'. ($contvalue[5]).'</td>
                                                <td style="text-align: right;" >'. number_format($contvalue[4],2).'</td>
                                                <td >'. get_membername_fromid($dbh,$contvalue[7]).'</td>
                                                <td >'. ($contvalue[6]).'</td>
                                            </tr>';
                                        $count_mcont++;
                                        $total_per_user[] = $contvalue[4];
                                        $data_count++;
                                    }
                $print_item .=   ' </tbody> 
                                    <tfoot>   
                                        <tr id='.($ik+1).' >
                                            <th></th>
                                            <th></th>
                                            <th>&nbsp;</th>
                                            <th>Total : </th>
                                            <th style="text-align: right;">'.number_format(array_sum($total_per_user),2).'</th>
                                            <th>&nbsp;</th>
                                            <th>&nbsp;</th>
                                        </tr>';
                                }
                $print_item .=   '  </tfoot> 
                            </table> 
						</div>
                    </div>
                  </div>
                </div>
              </div>
                </div>
            </div>';
            print $print_item;
