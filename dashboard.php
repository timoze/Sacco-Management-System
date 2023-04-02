<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/system_analytics_functions.php');
include('php_functions/functions.php');
include('./session.php');
if (!CheckSession()) {
  header("location:index.php?location=" . urlencode($_SERVER['REQUEST_URI']));
  exit();
}
$logged_inuser = $_SESSION['member_id'];
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Badili SACCO | Dashboard</title>
<!-- Bootstrap -->
<link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div role="main">
          <!-- top tiles -->
          <div class="row">
          <div class="tile_count col-md-12 col-sm-12">
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> All Members</span>
			  <?php 
          //All members count
          $total_members = mysqli_fetch_assoc(mysqli_query($connection,"SELECT count(member_id) as total_mbrs from users where status=1 "));
          $all_members = $total_members['total_mbrs'];
          ?>
              <div class="count"><?php echo htmlentities($all_members);?></div>
              <span class="count_bottom">Members</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Months's Total Contribution</span>
              <?php
                $date1 = date("Y-m-01");
                $date2 = date("Y-m-d");
                $sql8="SELECT sum(contribution_amount) as total_contribution from member_contribution where contribution_date between '$date1' and '$date2' and status='1' and payment_type=1 and member_id = '$logged_inuser' and cr_dr='D'  ";
                $query8 = $dbh -> prepare($sql8);
                $query8->execute();
                $results8=$query8->fetchAll(PDO::FETCH_OBJ);
                $thismonthscontribution = 0;
                foreach ($results8 as $row8) {
                    $thismonthscontribution += $row8->total_contribution;
                }
              ?>
              <div class="count"><?php echo number_format($thismonthscontribution,2);?></div>
              <span class="count_bottom"></i> <?php echo date('M');?>'s Contribution</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Total Contribution</span>
              <?php
                $sql7="SELECT sum(contribution_amount) as total_contribution from member_contribution where status='1' and payment_type=1 and member_id = '$logged_inuser' and cr_dr='D' ";
                $query7 = $dbh -> prepare($sql7);
                $query7->execute();
                $results7=$query7->fetchAll(PDO::FETCH_OBJ);
                $total_cont = 0;
                foreach ($results7 as $row7) {
                    $total_cont+=$row7->total_contribution;
                }
                ?>
              <div class="count"> <?php echo number_format($total_cont,2);?></div>
              <span class="count_bottom">Total Daily Contribution</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Other Payments (This month)</span>
                <?php
                  $sql6="SELECT sum(contribution_amount) as payments from member_contribution where contribution_date between '$date1' and '$date2' and status='1' and (payment_type IN ('2','3','4')) and member_id = '$logged_inuser' and cr_dr='D'  ";
                  $query6 = $dbh -> prepare($sql6);
                  $query6->execute();
                  $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                  $other_payments = 0;
                  foreach ($results6 as $row6) {
                      $other_payments +=$row6->payments;
                  }
                ?>
              <div class="count"><?php echo number_format($other_payments,2);?></div>
              <span class="count_bottom"><i class="green"></i> <?php echo date('M');?>'s Other Payments</span>
            </div>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Other Payments </span>
              <?php
                //$totalloan = getTotalPaymentsLoans($dbh);
                $sql10="SELECT sum(contribution_amount) as total_payments from member_contribution where status='1' and (payment_type IN ('2','3','4')) and member_id = '$logged_inuser' and cr_dr='D' ";
                $query10 = $dbh -> prepare($sql10);
                $query10->execute();
                $results10=$query10->fetchAll(PDO::FETCH_OBJ);
                $totalother_payments = 0;
                foreach ($results10 as $row7) {
                    $totalother_payments+=$row7->total_payments;
                }
              ?>
              <div class="count"><?php echo number_format($totalother_payments,2);?></div>
              <span class="count_bottom"></i> Total Other Payments </span>
            </div>
            <?php
            //GET LOAN BALANCE
            $outstanding_loans_array = get_outstanding_member_loans($logged_inuser );
            $total_oustanding = 0;
            for ($i=0; $i < count($outstanding_loans_array) ; $i++) {
              $bal = $outstanding_loans_array[$i][3];
              $total_oustanding += $bal;
            }
            //GET LOAN LIMIT
            $loan_limits = get_member_loanlimit($dbh, $logged_inuser);
            ?>
            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i> Total Payments</span>
              <?php
                $sql9="SELECT sum(contribution_amount) as totalcost from member_contribution where status='1' AND (payment_type NOT IN ('5','6'))  and member_id = '$logged_inuser' and cr_dr='D' ";
                $query9 = $dbh -> prepare($sql9);
                $query9->execute();
                $results9=$query9->fetchAll(PDO::FETCH_OBJ);
                $total_payments = 0;
                foreach ($results9 as $row9) {
                    $total_payments += $row9->totalcost;
                }
              ?>
              <div class="count"><?php echo number_format($total_payments,2);?></div>
              <span class="count_bottom"></i> Total Payments Made </span>
            </div>

            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Loan Limit</span>
              
              <div class="count"><?php echo number_format($loan_limits,2);?></div>
              <span class="count_bottom"></i>Available Loan Limit </span>
            </div>

            <div class="col-md-4 col-sm-4  tile_stats_count">
              <span class="count_top"><i class="fa fa-money"></i>Oustanding Loans</span>
              
              <div class="count"><?php echo number_format($total_oustanding,2);?></div>
              <span class="count_bottom"></i> Total Loan Balance </span>
            </div>

           

          </div>
        </div>
          <!-- /top tiles -->
          <div class="clearfix"></div>
            
            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monthly Contribution / Payment Trend </h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                    <div >
                      <table id="payment_trend" class="table table-striped table-bordered" style="width:100%"> 
                        <thead> 
                          <tr> 
                            <th>Item</th> 
                            <?php 

                              $montlyitem_desc = getMonthlyPayments($dbh,11,$logged_inuser,1);
                              $year_arraydesc = $montlyitem_desc[1];
                              $montly_paysdesc = $montlyitem_desc[0];
                              foreach ($year_arraydesc as $year_monthvalue) {
                                ?>
                                  <th style="text-align: center;"><?php echo $year_monthvalue;?></th>
                                <?php
                              }
                            ?>
                            <th style="text-align: center;">Total</th> 
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $totals_array = array();
                            $query_select_items = mysqli_query($connection, "SELECT id, description FROM payment_items where status='1' order by id ");
                            while ($rowitems = mysqli_fetch_assoc($query_select_items)) {
                              $item_name  = $rowitems['description'];
                              $itemid     = $rowitems['id'];
                              $montlyitem_amount_array = getMonthlyPayments($dbh,11,$logged_inuser,$itemid);
                              $year_month = $montlyitem_amount_array[1];
                              $montly_amount_array = $montlyitem_amount_array[0];
                              ?>
                              <tr class="active">
                                <th><?php echo htmlentities($item_name);?></th>
                              <?php
                              $totalamt = 0;
                              $iyear = 0;
                              foreach ($montly_amount_array as $amount_value) {
                                $totalamt += $amount_value;
                                ?>
                                  <td  style="text-align: right;"><?php  echo htmlentities(number_format($amount_value,2));?></td>
                                <?php
                                $totals_array[$year_month[$iyear]][] = $amount_value;
                                $iyear++;
                              }
                              ?>
                                  <td  style="text-align: right;"><b><?php  echo htmlentities(number_format($totalamt,2));?></b></td>
                                  </tr>
                                <?php
                            }
                          ?>
                        
                        </tbody>
                        <tfoot>
                          <tr class="active">
                              <th></b>Total</b></th>
                              <?php
                                $totaltotalamt = 0;
                                foreach ($year_arraydesc as $yearmonthval) {
                                  $total_arrayvals = $totals_array[$yearmonthval];
                                  $amounttotal = array_sum($total_arrayvals);
                                  $totaltotalamt += $amounttotal;
                                  ?>
                                    <th  style="text-align: right;"><b><?php  echo htmlentities(number_format($amounttotal,2));?></b></th>
                                  <?php
                                  
                                }
                              ?>
                                  <th  style="text-align: right;"><b><?php  echo htmlentities(number_format($totaltotalamt,2));?></b></th>
                          </tr>
                        </tfoot>
                      </table>
                      
                  
                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payments <small>Last 12 Months (Line Graph)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content" >
                    <div id="payments_div"> </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Payments Received vs Loans Issued <small>Last 12 months (Bar Graph)</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="loans_div"> </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /page content -->
      </div>
    </div>
<!-- jQuery -->
<script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
    <script src="./vendors/highcharts/code/highcharts.js" type="text/javascript"></script>
<?php
            //$datas = array_pop($total_array);
            //$new_year_arr = array_merge($year_array,$future_year_array);
            //$new_data_arr = array_merge($total_array, $total_future_growth);
         // print_r($new_data_arr);
                //combination_chart("Growth Rate",$year_array , array("Clients","Growth Rate(%)"), $growth_rate_array, "valuediv", $total_array );
               // trend_column("Growth Rate",$year_array , "Growth Rate(%)", $growth_rate_array, "valuedivcli");
              //  trend_bar("Growth Rate",$year_array , "Growth Rate(%)", $growth_rate_array, "valuedivclient");
             // $monthpay = getMonthlyPayments(12, $dbh);
              $monthpay = getMonthlyPayments($dbh,12,$logged_inuser,1);
              $year_array = $monthpay[1];
              $montly_pays = $monthpay[0];
              $monthloans = getMonthlyLoans(12, $dbh);
              $year_arrayloans = $monthloans[1];
              $montly_loans = $monthloans[0];
              $totals = getTotalPaymentsLoans($dbh);
              $total_payments = $totals[0];
              $total_loans = $totals[1];
              //print_r($monthpay);
               trend_line("Payments Trend",$year_array , "Amount", $montly_pays, "payments_div");
               // trend_line("Loans Trend",$year_arrayloans , "Amount", $montly_loans, "loans_div");
              // trend_line($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name)
              //  trend_line("Collection Growth",$year_array , "Amount", $total_collection_peryear, "collection_cont");
                trend_column_comparison("Payments Received", $year_array , array("Payments") , array($montly_pays), "loans_div" , "Amount");
             //   trend_line_multiple("Payments Received vs Loans Issued Out", $year_array, array("Payments", "Loans") , array($montly_pays,$montly_loans), "payments_div", "Amount");
                trend_pie(array("Payments", "Loans"), $totals, "payments_pie");
                 //trend_column_comparison("Billing, Collection Realization Comparison", $year_array , array("Billing Realization", "Collection Realization") , array($total_billing_realization_array,$total_collection_realization_array), "realiza" , "Rates (%)");
               // trend_column("Client Growth Prediction",$future_year_array , "Clients", $total_future_growth, "lineFuture1");
                //trend_bar("Client Growth Prediction",$future_year_array , "Clients", $total_future_growth, "lineFuture2");
               // combination_chart("Client Growth Prediction",$future_year_array , array("Clients","Clients"), $total_future_growth, "lineFuture", $total_future_growth);
                //trend_bar("Client Growth", array_reverse($new_year_arr) , "Clients", array_reverse($new_data_arr), "contair");
                //trend_bar_comparison("Client Growth Prediction",$future_year_array , array("Clients", "dataT"), array($total_future_growth, $growth_rate_array), "lineFuture", "data");
              // function trend($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name)
            ?>
  </body>
</html>