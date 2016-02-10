<html>
<head>
<link type="text/css" href="css/hot-sneaks/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.8.3.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
<style>
	body{
		font: 62.5% "Trebuchet MS", sans-serif;
		margin: 50px;
	}
	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	</style>
<script type="text/javascript">
$(document).ready(function(){
   
   /*
	$("#dialog").dialog({			
			autoOpen: false,
			width: 400,
			buttons:[
				{
					text: "Ok",
					click: function() {
						$(this).dialog("close");
					}
				},	{
					text: "Cancel",
					click:function() {
						$(this).dialog("close");
					}
				}
			]
		});*/

	$( "#accademic_calendar tr td" ).click(function(event) {						
			var event_date = $(this).attr("id");
			//alert(event_date);
			test_click(event_date);
			event.preventDefault();
	});		
	
	var test_click = function(event_date){
	      $.ajax({
		     type:"post" ,
			 url:"ur_event.php",
			 data:"event_date="+event_date,
			 success:function(st){
			   // alert(st);
			       $("#dialog").html(st);
			    	//  $("#dialog").dialog("open");
				  	$("#dialog").dialog({ modal:true,width:400,height:350});
			 }
		  });
		  //alert(event_date);
	}
});
</script>
</head>
<body>
<div  id="content" class="box">        
<?php
    $months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");   
	//$months = array("Jun");   
	
    function get_month_num($month) 
	{
	  return date('m',strtotime($month));
	}
	
    function month_end_date($month) 
	{
      return date('t' , strtotime($month));
    }   
	
    function get_day_name($date) 
	{
      return date('D' , strtotime($date));
    }

    function first_seven_days_day_name($months) { 
	   $table = "<tr>";
	   
	   for($i=1;$i<=7;$i++) {
		$day_name =	get_day_name(date('Y-').get_month_num($months).'-'.$i);
		$table .= "<td>&nbsp;&nbsp;$day_name&nbsp;&nbsp;</td>";
	   }	
		$table .="</tr>";
		echo $table;
	}	
        
	?>	
	<!-- <input type="button" id="gen_cal" value="Generate Academic Calendar"/> -->
		<?php
	function  generate_calendar( $months ) 
	{
	   $months = trim($months) ;
	   $parse = explode("-",$months);
	   
	   $month_unit = $parse[0];
	   $year_unit = $parse[1];
	   
	 
	   
	    $yr     = date('Y');
		
		//echo $months.'   '.date('Y-m-01',strtotime($months));
	    $table  = "<span style='margin-left:50px;text-align:center;font-family:Arial;font-weight:bold;'>$months</span>";
	    $table .= "<table id='accademic_calendar' align='center' cellpadding='2' cellspacing='2' width='90%' height='50%'>";
		$table .= "<tr>";
		
		for($i=1;$i<=7;$i++) {
			$day_name =	get_day_name($year_unit.'-'.get_month_num($month_unit).'-'.$i);
			$table .= "<th  style='background-color:yellow;text-align:center;'> $day_name</th>";
	    }		
		$off_days = 0;
		$table .="</tr><tr>";
		for($i=1 ; $i <= month_end_date($months) ; $i++)
		{   
			//echo date('Y-m-d',strtotime($months."-".$i));
			$dates = $year_unit."-".date('m',strtotime($month_unit))."-".$i;
		    if($i%7!=0) 
			{			 
				 $make_date = date('Y-m',strtotime($months)).'-'.$i;
				 //echo date('D',strtotime($dates));
				 if( date('D',strtotime($dates)) !="Fri") {
				    
					$table .= "<td id='$dates' style='width:150px;height:80px;border:1px solid #ccc;text-align:center;font-family:Verdana;'><br/><br/>$i </td>";
				 }else{
				    $off_days++;
					$table .= "<td  id='$dates' style='background-color:pink;width:150px;height:80px;border:1px solid #ccc;text-align:center;font-family:Verdana;font-weight:bold;'><br/> <br/>$i</td>";
				 }
			}else {
			    //echo date('D',strtotime($dates));
			     if(date('D',strtotime($dates)) != "Fri") {
						 $make_date = date('Y-m',strtotime($months)).'-'.$i;
						 $table .= "<td id='$dates' style='width:150px;height:80px;border:1px solid #ccc;text-align:center;font-family:Verdana;'><br/><br/>$i </td></tr>"; 			
				 }else{
   				    $off_days++;
					$table .= "<td  id='$dates' style='background-color:pink;width:150px;height:80px;border:1px solid #ccc;text-align:center;font-family:Verdana;font-weight:bold;'> <br/><br/>$i</td></tr>";
				 }
			}
		}
		$table .="<tr><th colspan='7' style='background-color:#efefef;'>Total Offday: $off_days</th></tr>";
		$table .="<table>";
		echo $table;
	}
	
	
	function test($months)
	{
	  echo $months."<br/>";
	}	
	
	for($i=0 ; $i < count($months) ; $i++)  
	{
		generate_calendar($months[$i]."-".date('Y'));
		//test($months[$i]."-".date('Y'));
		echo "<br/><br/>";
	}   
?>
</div>

<div  id="dialog"  title="Add Event"> </div>

</body>
</html>