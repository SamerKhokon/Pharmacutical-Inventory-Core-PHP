<?php include("../../db.php");  
       /**************************************
	     DB Connection check
	   **************************************
	   if($con) echo 1;else echo 0;
	   ***************************************/
	   session_start();
	   $company_id = $_SESSION["COMPANY_ID"];
	   $str = "SELECT t1.`product_id` as product_id,
	   t2.`product_name` as product_name,
	   t2.`product_code` as product_code,
	   t2.`product_pack_size` as product_pack_size,
	   t2.`product_unit` as product_unit,
	   t2.`unit_price` as unit_price,
	   t2.`generic_name_id` as generic_name_id,
	   t3.`generic_name` as generic_name,
	   t4.`depot_name` as depot_name,
	   t4.`depot_flag` as depot_code,
	   t1.`current_stock` as current_stock 
	   FROM `inv_depot_product_stock` t1
	   	left join product_info t2
			on t2.product_id=t1.product_id
		left join generic_name_info t3
			on t3.generic_name_id=t2.generic_name_id
		left join inv_depot_info t4
			on t4.depot_id=t1.depot_id		 
	   where t1.`active_flag`='Y' and t1.`company_id`=$company_id 
	   ";
	   $sql = mysql_query($str);
	   
?>
 <script type="text/javascript" charset="utf-8">
                $(document).ready(function() {
                    $('#example').dataTable( {
                        "sPaginationType": "full_numbers"
                    } );
               $(".various1").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
		$(".various2").fancybox({
				'titlePosition'		: 'inside',
				'transitionIn'		: 'none',
				'transitionOut'		: 'none'
			});
	} );
</script>
<div style="display: none;">
		<div id="inline1" class="pop_div">
                
		</div>
	</div>
    <div style="display: none;">
		<div id="inline2" class="pop_div">
                
		</div>
	</div>
  
<div id="demo">
<h1 class="t_head"><span style="margin:0px 0px 0px 0px;">Report Product Stock</span></h1>
      <div class="color_di">
         <input type="text" disabled="disabled" class="yellow" /> Yellow 
         <input type="text" disabled="disabled" class="red" /> Red 
         <input type="text" disabled="disabled" class="green" /> Green
         <input type="text" disabled="disabled" class="blu" /> Blue
      </div>

		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>Depot</th>
                    <th>Product Name</th>
					<th>Product Code</th>
					<th>Generic</th>
					<th>Pack Size</th>
					<th>Unit Name</th>
					<th>Unit Price</th>					
					<th>Current Stock</th>
				</tr>
			</thead>
			<tbody>		
			
		<?php  
		    while($res = mysql_fetch_assoc($sql) ) 
			{			 
				  $product_id = $res['product_id'];
				  $product_name = $res['product_name'];
				  $product_code = $res['product_code'];								  
				  $pack_size = $res['product_pack_size'];
				  $unit_name = $res['product_unit'];
				  $unit_price = $res['unit_price'];
                  $generic_name_id = $res['generic_name_id'];
				  $generic_name = $res['generic_name'];
				  //$generic_name = get_generic_name($generic_name_id , $company_id);				  
				  $depot_name = $res['depot_name'];
				  $depot_code = $res['depot_code'];
				  $depot = $depot_name.'('.$depot_code.')';
				  $current_stock = $res['current_stock'];
				 
				    

		?>
				 <tr class="gradeA">
				   <td align="center"><?php echo $depot;?></td>				   
				   <td align="center"><?php echo $product_name;?></td>	
                   <td align="center"><?php echo $product_code;?></td>
				   <td align="center"><?php echo $generic_name;?></td>				   
				   <td align="center"><?php echo $pack_size;?></td>
				   <td align="center"><?php echo $unit_name;?></td>
				   <td align="center"><?php echo $unit_price;?></td>
				   <?php  if($current_stock<=10) { ?>
							<td align="center" bgcolor="red"><?php echo $current_stock;?></td>
				   <?php }else if($current_stock >10 && $current_stock<=50){?>
							<td align="center" bgcolor="yellow"><?php echo $current_stock;?></td>
				   <?php }else{ ?>
							<td align="center" ><?php echo $current_stock;?></td>				   
				   <?php } ?>
				 </tr>		 
	<?php   } ?>				 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>									
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</tfoot>
		</table>
</div>
<?php  
     function get_generic_name($generic_name_id , $company_id){
		$str = "SELECT generic_name FROM `generic_name_info` WHERE 
		generic_name_id=$generic_name_id AND company_id=$company_id";
		$sql = mysql_query($str);				
		$res = mysql_fetch_row($sql);
		return $res[0];
	 }

?>