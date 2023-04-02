<?php
function trend_line($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name)
{

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	?>
	
		<script type="text/javascript">
			$(function() {
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''
            };
            var xAxis = {
                categories: ['<?php print $curr_year_array_lie;?>']
            };
            var yAxis = {
            maxPadding: 0,
               title: {
                  text: '<?php print $yAxis_desc;?>'
               },
               plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
               }]
            };   
            var tooltip = {
               valueSuffix: ''
            }
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'middle',
               borderWidth: 0
            };

      var series  =  [
                    {
                      name: '<?php print $yAxis_desc;?>',
                      data: [<?php print $curr_growth_lie;?>]
                    }
            ];
            var json = {};
            json.title = title;
            json.subtitle = subtitle;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;
            
            $('#<?php print $div_name;?>').highcharts(json);
         });
		</script>
     <?php 
}

function trend_line_multiple($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name, $y_desc)
{

   //$curr_growth_lie = implode(", ", $data_array);
   $curr_year_array_lie  = implode("','", $year_arr);
   ?>
   
      <script type="text/javascript">
         $(function() {
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''
            };
            var xAxis = {
                categories: ['<?php print $curr_year_array_lie;?>']
            };
            var yAxis = {
            maxPadding: 0,
               title: {
                  text: '<?php print $y_desc;?>'
               },
               plotLines: [{
                  value: 0,
                  width: 1,
                  color: '#808080'
               }]
            };   
            var tooltip = {
               valueSuffix: ''
            }
            var legend = {
               layout: 'vertical',
               align: 'right',
               verticalAlign: 'middle',
               borderWidth: 0
            };

      var series  =  [
               <?php 
               for ($k=0; $k < count($data_array) ; $k++) { 
                     $curre = $data_array[$k];
                     $currrr = implode(",", $curre);
                     ?>
                     {
                        name: '<?php print $yAxis_desc[$k];?>',
                        data: [<?php print $currrr;?>]
                     }
                     <?php
                     if ($k<(count($data_array)-1)) {
                        print ",";
                     }
                  
               }

                ?>


                    
            ];
            var json = {};
            json.title = title;
            json.subtitle = subtitle;
            json.xAxis = xAxis;
            json.yAxis = yAxis;
            json.tooltip = tooltip;
            json.legend = legend;
            json.series = series;
            
            $('#<?php print $div_name;?>').highcharts(json);
         });
      </script>
     <?php 
}

function trend_bar($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name)
{

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'bar'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $yAxis_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               }
            };  
            var credits = {
               enabled: false
            };
            var series= [
               
               {
                  name: '<?php print $yAxis_desc;?>',
                  data: [<?php print $curr_growth_lie;?>]
               }
               
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php 
}

function trend_column($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name)
{

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'column'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $yAxis_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               }
            };  
            var credits = {
               enabled: false
            };
            var series= [
               
               {
                  name: '<?php print $yAxis_desc;?>',
                  data: [<?php print $curr_growth_lie;?>]
               }
               
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php
}

function stacked_bar($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name){

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'bar'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $yAxis_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               },
               series: {
      			stacking: 'normal'
    			}
            };  
            var credits = {
               enabled: false
            };
            var series= [

               <?php 
               for ($k=0; $k < count($data_array) ; $k++) { 
               		$curre = $data_array[$k];
               		$currrr = implode(",", $curre);
               		?>
               		{
                  		name: '<?php print $yAxis_desc[$k];?>',
                  		data: [<?php print $currrr;?>]
              	 	   }
               		<?php
               		if ($k<(count($data_array)-1)) {
               			print ",";
               		}
               	
               }

                ?>
               
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php
	
}
function stacked_column($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name,$y_desc){

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'column'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $y_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               },
               series: {
      			stacking: 'normal'
    			}
            };  
            var credits = {
               enabled: false
            };
            var series= [

               <?php 
               for ($k=0; $k < count($data_array) ; $k++) { 
               		$curre = $data_array[$k];
               		$currrr = implode(",", $curre);
               		?>
               		{
                  		name: '<?php print $yAxis_desc[$k];?>',
                  		data: [<?php print $currrr;?>]
              	 	   }
               		<?php
               		if ($k<(count($data_array)-1)) {
               			print ",";
               		}
               	
               }

                ?>
               
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php
	
}

function trend_column_comparison($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name, $y_desc){

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'column'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $y_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               }
               
            };  
            var credits = {
               enabled: false
            };
            var series= [

               <?php 
               for ($k=0; $k < count($data_array) ; $k++) { 
               		$curre = $data_array[$k];
               		$currrr = implode(",", $curre);
               		?>
               		{
                  		name: '<?php print $yAxis_desc[$k];?>',
                  		data: [<?php print $currrr;?>]
              	 	   }
               		<?php
               		if ($k<(count($data_array)-1)) {
               			print ",";
               		}
               	
               }

                ?>
               
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php
	
}

function trend_bar_comparison($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name, $y_desc){

	$curr_growth_lie = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
		<script type="text/javascript">
         $(document).ready(function() {  
            var chart = {
               type: 'bar'
            };
            var title = {
               text: '<?php print $sub_title;?>'   
            };
            var subtitle = {
               text: ''  
            };
            var xAxis = {
            	
            	
               categories: ['<?php print $curr_year_array_lie;?>'],
               crosshair: true
            };
            var yAxis = {
               min: 0,
               title: {
                  text: '<?php print $y_desc;?>'         
               }      
            };
            var tooltip = {
               headerFormat: '<span style = "font-size:10px">{point.key}</span><table>',
               pointFormat: '<tr><td style = "color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style = "padding:0"><b>{point.y:,.0f} </b></td></tr>',
               footerFormat: '</table>',
               shared: true,
               useHTML: true
            };
            var plotOptions = {
               column: {
                  pointPadding: 0.2,
                  borderWidth: 0
               }
               
            };  
            var credits = {
               enabled: false
            };
            var series= [

               <?php 
               for ($k=0; $k < count($data_array) ; $k++) { 
               		$curre = $data_array[$k];
               		$currrr = implode(",", $curre);
               		?>
               		{
                  		name: '<?php print $yAxis_desc[$k];?>',
                  		data: [<?php print $currrr;?>]
              	 	   }
               		<?php
               		if ($k<(count($data_array)-1)) {
               			print ",";
               		}
               	
               }
               ?>
               
            ];     
         
            var json = {};   
            json.chart = chart; 
            json.title = title;   
            json.subtitle = subtitle; 
            json.tooltip = tooltip;
            json.xAxis = xAxis;
            json.yAxis = yAxis;  
            json.series = series;
            json.plotOptions = plotOptions;  
            json.credits = credits;
            $('#<?php print $div_name;?>').highcharts(json);
  
         });
      </script>
     <?php
}

function combination_chart($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name, $data_arra2)
{
	$data_for_column = implode(", ", $data_arra2);
	$number_for_spline = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	//$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
	<script type="text/javascript">
	Highcharts.chart('<?php print $div_name;?>', {
    title: {
        text: '<?php print $sub_title;?>'
    },
    xAxis: {
        categories: ['<?php print $curr_year_array_lie;?>']
    },
    series: [{
        type: 'column',
        name: '<?php print $yAxis_desc[0];?>',
        data: [<?php print $data_for_column;?>]
    }, {
        type: 'spline',
        name: '<?php print $yAxis_desc[1];?>',
        data: [<?php print $number_for_spline;?>],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
	</script>
     <?php
}
function combination_multiple_column_chart($sub_title, $year_arr, $yAxis_desc, $data_array, $div_name, $data_arra2 , $yAxisSpline)
{
	//$data_for_column = implode(", ", $data_arra2);
	$number_for_spline = implode(", ", $data_array);
	$curr_year_array_lie  = implode("','", $year_arr);
	//$curr_year_arraylie  = implode(",", $year_arr);
	?>
	
	<script type="text/javascript">
	Highcharts.chart('<?php print $div_name;?>', {
    title: {
        text: '<?php print $sub_title;?>'
    },
    xAxis: {
        categories: ['<?php print $curr_year_array_lie;?>']
    },
    series: [
   			 <?php 
               for ($k=0; $k < count($data_arra2) ; $k++) { 
               		$curre = $data_arra2[$k];
               		$currrr = implode(",", $curre);
               		?>
               		{
                  		type: 'column',
       					   name: '<?php print $yAxis_desc[$k];?>',
        				      data: [<?php print $currrr;?>]
              	 	    }
               		<?php
               		
               			print ",";
               		
               	
               }

                ?>
             {
        type: 'line',
        name: '<?php print $yAxisSpline;?>',
        data: [<?php print $number_for_spline;?>],
        marker: {
            lineWidth: 2,
            lineColor: Highcharts.getOptions().colors[3],
            fillColor: 'white'
        }
    }]
});
	</script>
     <?php
}
function trend_pie($name_array, $data_array , $div_name)
{

	?>
	
		<script type="text/javascript">
			$(function() {
            $('#<?php print $div_name;?>').highcharts({
    		  chart: {
    		    plotBackgroundColor: null,
    		    plotBorderWidth: null,
    		    plotShadow: false,
             margin: [0, 0, 0, 0],
             spacingTop: 0,
             spacingBottom: 0,
             spacingLeft: 0,
             spacingRight: 0
    		  },
    		  title: {
    		    text: '' 
    		  },
    		  tooltip: {
    		    pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
    		  },
    		  plotOptions: {
    		    pie: {
               size:'50%',
    		      allowPointSelect: true,
    		      cursor: 'pointer',
    		      
    		      dataLabels: {
    		        enabled: true,
    		        color: '#000000',
    		        
    		        format: '{point.name}: {point.percentage:.0f} %'
                 
                 
    		      }
    		    }
    		  },
    		  series: [{
    		  type: 'pie',
    		  name: 'Percentage',
    		  data: [
    		  		<?php 
               		for ($k=0; $k < count($data_array) ; $k++) { 
               				//$curre = $data_array[$k];
               				//$currrr = implode(",", $curre);
               				?>
               				{
                  				y: <?php print $data_array[$k];?>,
                  				name: '<?php print $name_array[$k];?>'
              	 			}
               				<?php
               				if ($k<(count($data_array)-1)) {
               					print ",";
               				}
               	
               		}
               		?>
    		              
    		    	       
        		]
      		}]
      
    		});
         });
		</script>
     <?php 
}

function trend_pie_donut($name_array, $data_array , $div_name)
{

   ?>
   
      <script type="text/javascript">
         $(function() {
            $('#<?php print $div_name;?>').highcharts({
           chart: {
             plotBackgroundColor: null,
             plotBorderWidth: null,
             plotShadow: false,
             margin: [0, 0, 0, 0],
             spacingTop: 0,
             spacingBottom: 0,
             spacingLeft: 0,
             spacingRight: 0
           },
           title: {
             text: '' 
           },
           tooltip: {
             pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
           },
           plotOptions: {
             pie: {
               size:'50%',
               allowPointSelect: true,
               innerSize: '40%',
               cursor: 'pointer',
               dataLabels: {
                 enabled: true,
                 color: '#000000',
                 format: '{point.name}: {point.percentage:.0f} %',
               },
               // showInLegend: true
             }
           },
           series: [{
           type: 'pie',
           name: 'Percentage',
           data: [
               <?php 
                     for ($k=0; $k < count($data_array) ; $k++) { 
                           //$curre = $data_array[$k];
                           //$currrr = implode(",", $curre);
                           ?>
                           {
                              y: <?php print $data_array[$k];?>,
                              name: '<?php print $name_array[$k];?>'
                        }
                           <?php
                           if ($k<(count($data_array)-1)) {
                              print ",";
                           }
                     }
                     ?>
            ]
            }]
      
         });
         });
      </script>
     <?php 
}
