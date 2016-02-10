<html><head>
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    var print_page = function(){
			$.ajax({
			   type:"post" ,
			   url: "virtual_page.php" ,
			   //url: "std_profile.php",
			   success:function(st){			   
				 $("#print_page").html(st);
			   }
			});   
	}
	print_page();
 });
 	function get_print() 
	{
		var id = 'print_body';
		//alert(id);
		var MyWin = window.open('','','left=0, top=0, height=1, width=1');
		window.focus();
		//alert(document.getElementById(id).innerHTML);
		var Data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><body><br/><br/>'+
		document.getElementById(id).innerHTML.toString()+	'</body></html>';
		var Css = '<style type="text/css" media="print">@page{size: auto;/* auto is the initial value */ margin: 0mm;  /* this affects the margin in the printer settings */}body{margin: 0px;/* this affects the margin on the content before sending to printer */font-size:17px;}</style>';
		MyWin.document.write(Css); 
		//alert(Data);
		//alert(Data.replace(/display:none/ig, ""));
		MyWin.document.write(Data.replace(/none/ig, ""));
		MyWin.document.close();
		MyWin.print();
		MyWin.close();	
	}
</script>
</head>
<body>
			<div id="print_page" style="width:8.27inch;height:11.69inch;"></div>
</body>
</html>