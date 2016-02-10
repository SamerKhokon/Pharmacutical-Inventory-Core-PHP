<?php 	 include("../db.php");
			session_start();
			$company_id  					= $_SESSION["COMPANY_ID"];
			$generic_name_id        	= trim($_POST["generic_name"]);
			$product_code           		= trim($_POST["product_code"]);	
            $product_name           	= trim($_POST["product_name"]);			
			$product_unit_id        		= trim($_POST["product_unit"]);
			$product_pack_size_id   = trim($_POST["product_pack_size_id"]);
			$product_pack_size        = get_product_pack_size($product_pack_size_id,$company_id);			
			$product_unit_price     	= trim($_POST["product_unit_price"]);
			$product_unit           	    = get_product_unit($product_unit_id,$company_id);			
			$product_description    	= trim($_POST["product_description"]);
			$entry_by               			= $_SESSION["LOGIN_USERID"];
			$entry_date    		    		= date("Y-m-d");
			$chk_data 						= $entry_by.'_'.time().'_'.date('Ymd');					
			
			if(  is_exist($product_name) == 0 ) 
			{
					$str = "INSERT INTO `decent_pharma_db`.`product_info`(`generic_name_id`, `product_code`, `product_name`, `product_pack_size_id`, 
					`product_pack_size`, `product_unit_id`, `product_unit`, `unit_price`, `description`, `entry_by`, `entry_date`, `company_id`, `active_flag`, `chk_data`)
					VALUES('$generic_name_id', '$product_code', '$product_name', '$product_pack_size_id', '$product_pack_size', '$product_unit_id', 
					'$product_unit', 	$product_unit_price, 	'$product_description', 	$entry_by, 	now(), $company_id,'Y', '$chk_data')";
					//echo "<br />";				
				
					$sql = mysql_query($str);
					if($sql)
					{
						$sql_last_id = "select product_id from product_info where chk_data='$chk_data'";
						$res_last_id = mysql_query($sql_last_id);
						$row_last_id = mysql_fetch_array($res_last_id);
						$product_id = $row_last_id[0];
						
						//retriving depot_id//
						$sql_depot = "select depot_id, depot_flag from inv_depot_info where active_flag='Y'";
						//echo "<br>";
						$res_depot = mysql_query($sql_depot);
						while($row_depot = mysql_fetch_array($res_depot))
						{
							$depot_id = $row_depot[0];
							$depot_type = $row_depot[1];
							//inserting product's curent stock as 0 for every depot //
							$sql_stock = "insert into inv_depot_product_stock(depot_id, depot_type, product_id, current_stock, entry_by, entry_date, company_id, active_flag) values($depot_id, '$depot_type', $product_id, 0, $entry_by, now(), $company_id, 'Y')";
							//echo "<br>";
							mysql_query($sql_stock);
						}
						echo "Data saved successfully";
					}else{
						echo "Error";
					}	
			}
			else
			{
			   echo "Data already exist!";
			}		
?>		
<?php 
			/*************************************************
			  Functions
			**************************************************/			
	     	function is_exist($product_name) 
			{
				 $str = "select count(*) from product_info where  product_name='$product_name'";
				 $sql = mysql_query($str);
				 $res = mysql_fetch_row($sql);
				 return $res[0];
			}	
			
			function get_product_unit($product_unit_id,$company_id)
			{				
				$str = "SELECT product_unit FROM `product_unit_info` WHERE 
				`product_unit_id`=$product_unit_id AND 
				`company_id`=$company_id";
				$sql = mysql_query($str);				
				$res = mysql_fetch_row($sql);
				return $res[0];
			}																					
			
			function get_product_pack_size($pack_size_id,$company_id) 
			{	
				$str = "SELECT product_pack_size FROM `product_pack_size` WHERE 
				`product_pack_size_id`=$pack_size_id AND 
				`company_id`=$company_id";
				$sql = mysql_query($str);				
				$res = mysql_fetch_row($sql);
				return $res[0];
			}																		
?>