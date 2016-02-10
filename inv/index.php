<?php  session_start();
             if(isset($_SESSION['LOGIN_USER'])) {
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> :: Decent Pharmacutical Ltd.  Sales and Distributor management ::</title>
    <link rel="stylesheet" href="../css/default.css">
    <link href="../css/css.css" rel="stylesheet" type="text/css" />
    <link href="../css/button.css" rel="stylesheet" type="text/css" />
    	
		<!--[if IE 6]>
		<link rel="stylesheet" href="ie6.css" type="text/css">
		<![endif]-->
	
  <link href="../media/css/demo_page.css" rel="stylesheet" type="text/css" />
  <link href="../media/css/demo_table.css" rel="stylesheet" type="text/css" />
  
      <link rel='stylesheet' href='../css/popbox.css' type='text/css' media='screen' charset='utf-8'>   
	<script type="text/javascript" language="javascript" src="../media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
    <script type='text/javascript' charset='utf-8' src='../js/popbox.js'></script>
            <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable({  "sPaginationType": "full_numbers"    } );
                } );
            </script>
            <script type='text/javascript' charset='utf-8'>			 
				$(document).ready(function(){		  
				  $('.popbox').popbox();
				  var refreshId = setInterval(function(){ 
				      $("#currentTime").load("../time.php",function(){});
				  },1000);
				});
			</script>
</head>
<body>

<div id="headerwrap">
	<div id="header" class="header">		
        <div style=" margin:0px 0px 0px 1080px;">   
        </div>
	</div>
       <!-- top menu -->
	   <?php include("top_menu.php"); ?>	
</div>
<div id="middlewrap">
	<div id="middle">	
			<!-- left menu -->	
		<?php include("left_menu.php"); ?>		
        <?php      
					if(isset($_GET["page"]) &&  file_exists("includes/".$_GET["page"].".php") )   {
					   require_once("includes/".$_GET["page"].".php");
		            }else{
					    require_once("includes/blank.php");
					}             
					
		?> 
		

	</div>
	<!-- end middle -->	
</div>
<!-- middlewrap -->
	<?php include("footer.php"); ?>
</body>
</html>
<?php  }else{    
 ?>
              <script type='text/javascript'>location.href="../logout.php";</script> 
<?php  }?>