<script>
		$(function() {
		     var product_start_datePickerOptions = { dateFormat:"dd-mm-yy" , changeYear:true,changeMonth:true };
			$( "#product_start_date" ).datepicker(product_start_datePickerOptions);
		   
			$( "#product_end_date" ).datepicker(product_start_datePickerOptions);
		});
		</script>
		<?php include("db.php");   
		$company_id = $_SESSION["COMPANY_ID"];
		    function product_dropdown($company_id){
		      global $option1;
			  $option1="";
			   $str = "SELECT product_id,product_code,product_name FROM `product_info` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option1 .=  "<option value='".$res[0] . "'>".$res[2] ."(".  $res[1]. ")</option>";
			  }
			  return $option1;
		   }
			function product_packsize($company_id){
		      global $option2;
			  $option2="";
			   $str = "SELECT `product_pack_size_id`,`product_pack_size` FROM `product_pack_size` WHERE company_id=$company_id";
			  $sql = mysql_query($str);
			  while($res = mysql_fetch_array($sql) ) {
				$option2 .=  "<option value='".$res[0]  . "'>".$res[1] ."</option>";
			  }
			  return $option2;
		   }		   
		?>
		<div id="content">
				<span action="" class="register">
					<!-- <h1>Form Design</h1> -->
					<fieldset class="row1">
						<legend>Product Offer Info</legend>
						<p>
							<label>Offer Title<font color="#FF0000">*</font></label>							
							<input type="text"  id="product_offer" class="long"/>
							
							<label>Product  <font color="#FF0000">*</font></label>							
						    <select  id="product_id" class="long" >
							   <option value="">select product</option> 
							  <?php  echo product_dropdown($company_id);  ?>
							</select>
						</p>
                    </fieldset>  
							<input type="hidden" id="offer_flag_container" value=""/>					
                    <fieldset class="row1">    
                        <legend>Product Offer Type</legend>
						<p>
							<input type="radio" name="offer_flag" id="offer_flag_PP" value="PP" />
                            <label style="width:120px">Buy Product Qty <font color="#FF0000">*</font></label>							
							<input type="text"  id="buy_qty_amount_PP" />
							<label style="width:100px">Pack Size  <font color="#FF0000">*</font></label>							
						    <select  id="b_pack_size_PP"  >
							   <option value="">select pack size</option> 
							  <?php  echo product_packsize($company_id);  ?>
							</select>
							<label style="width:120px;">Get Product Qty <font color="#FF0000">*</font></label>							
							<input type="text"  id="get_product_qty_PP" />
							
							<label style="width:100px;">Pack Size  <font color="#FF0000">*</font></label>							
						    <select  id="get_pack_size_PP"  >
							   <option value="">select pack size</option> 
							  <?php  echo product_packsize($company_id);  ?>
							</select>							
						 </p>		
						 <p>
							<input type="radio" name="offer_flag" id="offer_flag_PD" value="PD" />
                            <label style="width:120px">Buy Product Qty <font color="#FF0000">*</font></label>							
							<input type="text"  id="b_product_qty_PD" />
							
							<label style="width:100px">Pack Size <font color="#FF0000">*</font></label>							
						    <select  id="b_pack_size_PD"  >
							   <option value="">select pack size</option> 
							  <?php  echo product_packsize($company_id);  ?>
							</select>
							
							<label style="width:120px;">Get Discount Of <font color="#FF0000">*</font></label>							
							<input type="text"  id="get_discount_of_PD" />
							
							<label style="width:50px;">TK</label>							
						 </p>
						 <p>
							<input type="radio" name="offer_flag" id="offer_flag_AP" value="AP" />
                            <label style="width:120px">Buy Product of <font color="#FF0000">*</font></label>							
							<input type="text"  id="buy_product_of_AP" />

							
							<label style="width:100px">TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get <font color="#FF0000">*</font></label>						<input type="text"  id="product_offer" />&nbsp;	
						    <select  id="product_batch_id_AP"  >
							   <option value="">select pack size</option> 
							  <?php  echo product_packsize($company_id); ?>
							</select>
                            <label style="width:25px;">Product</label>
						 </p>
						 <p>
							<input type="radio" name="offer_flag" id="offer_flag_AP" value="AP" />
                            <label style="width:120px">Buy Product of <font color="#FF0000">*</font></label>							
							<input type="text"  id="buy_product_of_AP" />
							
							<label style="width:100px">TK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Get <font color="#FF0000">*</font></label>						<input type="text"  id="product_offer" />&nbsp;	
						    <label style="width:80px;">TK Discount</label>
						 </p>
					</fieldset>
					<fieldset class="row1">
						<legend>Offer Duration
						</legend>
						<p>
							<label>Offere Start Date <font color="#FF0000">*</font>	</label>
							<input type="text" id="product_start_date"class="long"/>						   
						</p>
						<p>
							<label>Offer End Date <font color="#FF0000">*</font>
							</label>
							<input type="text" id="product_end_date"  class="long"/>
						</p>
						<p class="btm_save_reset">
							
							<input type="button" style="width:70px;" class="btn_save"  id="product_offer_save"  value="Save"/>
                             &nbsp;<input type="button" style="width:70px;" class="btn_reset"  id="btn_reset"  value="Reset"/>
						</p>

					</fieldset>
				</span>		

				<script type="text/javascript">
				$(document).ready(function(){
				  
					$("input[name='offer_flag']").click(function(){
					    var sel_id = $(this).attr("id");
					    var sel      = $(this).val() ; 
						$("#offer_flag_container").val(sel);
						//alert(sel_id);
					});
					
					$("#product_offer_save").click(function(){
						   /*******************************************************
						      one
						   **********************************************************/
							var buy_qty_amount_PP = $("#buy_qty_amount_PP").val();
							var b_pack_size_PP = $("#b_pack_size_PP").val();
							var get_product_qty_PP = $("#get_product_qty_PP").val();
							var get_pack_size_PP = $("#get_pack_size_PP").val();	

							/*************************************************************************
							 two
							*************************************************************************/
							var b_product_qty_PD = $("#b_product_qty_PD").val();
							var b_pack_size_PD = $("#b_pack_size_PD").val();
							var get_discount_of_PD = $("#get_discount_of_PD").val();
							var buy_product_of_AP = $("#buy_product_of_AP").val();
							var product_batch_id_AP = $("#product_batch_id_AP").val();													
							
							/*****************************************************************************
							   basic portion
							*******************************************************************************/		
						   var  offer_flag_parse    = $("#offer_flag_container").val();
						   
							var product_offer          = $("#product_offer").val(); 
							var  product_batch_id   =$("#product_id").val();
							var product_start_date =$("#product_start_date").val();
							var product_end_date =$("#product_end_date").val();
						
						
						var  dataStr = "buy_qty_amount_PP="+buy_qty_amount_PP+"&b_pack_size_PP="+b_pack_size_PP
							+"&get_product_qty_PP="+get_product_qty_PP+"&get_pack_size_PP="+get_pack_size_PP+							
							"&b_product_qty_PD="+b_product_qty_PD+"&b_pack_size_PD="+b_pack_size_PD+
							"&get_discount_of_PD="+get_discount_of_PD+"&buy_product_of_AP="+buy_product_of_AP+
							"&product_batch_id_AP="+product_batch_id_AP+"&product_offer="+product_offer+"&product_batch_id="+product_batch_id+
						"&product_start_date="+product_start_date+"&product_end_date="+product_end_date+"&offer_flag="+offer_flag_parse;
						
						
						if(product_offer=="")
						{
						  alert("Enter product offer");
						  $("#product_offer").focus();
						  return false;
						}
						else if(product_batch_id=="")
						{
						  alert("Select product");						  
						  return false;
						}else{	
						        //  alert(dataStr);
                                				
								$.ajax({
								    type:"post" ,
									url:"includes/add_product_offer_by_ajax.php" ,
									data:dataStr ,
									cache:false ,
									success:function(st) {
										alert(st);
										//$("#offer_flag_container").val("");
										location.reload();
									}
								});
						}	
					});						
				});	
				</script>				
				 <div id="product_offer_table"></div>
                 <br /><br />
		</div>
		<!-- end content -->