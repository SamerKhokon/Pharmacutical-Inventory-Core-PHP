<?php     require_once("ndb.php");

            $str = "SELECT stu_id,name,father_name,mother_name,pre_address,par_address,
					sex,age,adm_date,dob,adm_class,adm_class_roll,section,ovr_roll,
					father_work_phone,mother_work_phone,st_status,branch_id,nationality,
					religion,quota FROM std_profile where id=1";
					
			$sql = mysql_query($str);		
			
			while($res =  mysql_fetch_assoc($sql) ) 
			{
			     $std_id 						= $res["stu_id"];
				 $fullname 					= $res["name"];
				 $father 						= $res["father_name"];
				 $mother 						= $res["mother_name"];
				 $present_addr 				= $res["pre_address"];
				 $parmanent_addr 		= $res["par_address"];
				 $gender 						= $res["sex"];
				 $age 							= $res["age"];
				 $adm_date                 = $res["adm_date"];
				 $adm_class               = $res["adm_class"];
				 $dob                          = $res["dob"];
				 $section                     = $res["section"];
				 $father_work_phone   = $res["father_work_phone"];
				 $mother_work_phone = $res["mother_work_phone"];
				 $status                       = $res["st_status"];
				 $nationality                 = $res["nationality"]; 
				 $religion 					   = $res["religion"];
				 $section_roll               = $res["adm_class_roll"];
				 $class_roll                  = $res["ovr_roll"];
				 $quota                        = $res["quota"];
			}		
?>



<div id="print_body">

   <!--  company address & and basic information  -->
	<table align="center" width="100%">
			<tr>
				 <td width="30%">&nbsp;</td>
				 <td style="text-align:center;font-family:Arial;font-size:19px;">ABC Group</td>
				 <td width="30%">&nbsp;</td>
			</tr>
			
			<tr>
				 <td width="30%">&nbsp;</td>
				 <td style="text-align:center;font-family:Arial;font-size:13px;">Road#21 , House#121 , Mohakhali DOHS , Dhaka-1212</td>
				 <td width="30%">&nbsp;</td>
			</tr>
			
			 <tr>
				 <td width="30%">&nbsp;</td>
				 <td style="text-align:center;font-family:Arial;font-size:13px;">Mobile: 880114646464 , Phone:4546464646</td>
				 <td width="30%">&nbsp;</td>
			</tr>	 
			
			 <tr>
				 <td width="30%">&nbsp;</td>
				 <td  style="text-align:center;font-family:Arial;font-size:13px;">Emai:info@abc.com , website: www.abc.com</td>
				 <td width="30%">&nbsp;</td>
			</tr>	 	 	
	</table>	      
	
	 <!-- <hr style="border:1px solid #000;color:#000;"/>  -->
			
    <br/>
  
    <!--   banner title -->
	<table align="center" width="100%" >
		<tr>
			 <td width="25%">&nbsp;</td>
			 <td colspan="3" width="50%"  style="font-family:Arial;font-size:18px;text-align:center;background:#ccc;color:#fff;">Employee Personal Information</td>
			 <td width="25%">&nbsp;</td>
		</tr>
	</table>

	
	<!--  employee information -->
	<table align="center" width="40%" style="margin-left:30%;">	
	    <tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td >&nbsp;</td>
							<td >&nbsp;</td>
		</tr>
		
		<tr>
		   <td  width="10%">
		   <img src="Blank-Facebok-Profile.jpg" style="padding-left:50px;" width="100" height="100"/></td>
		   <td colspan="6">&nbsp;</td>
		</tr>		
		
	    <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
		</tr>		

		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">ID:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $std_id;?></td> 
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Status:</td> 
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($status); ?></td>
		 </tr>

		
		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Fullname:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($fullname);?></td> 
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Date of Birth:</td> 
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $dob; ?></td>
		 </tr>
		 
		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Father:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($father);?></td> 
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Mother:</td>      
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($mother); ?></td> 
		</tr>		
		
		
		<tr>
			 <td   style="font-family:Arial;font-size:13px;font-weight:bold;">Class:</td>   				
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $adm_class;?></td> 
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Section:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $section; ?></td> 				
		</tr>	

		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Class Roll:</td>   				
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $class_roll;?></td> 
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Section Roll:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $section_roll; ?></td> 				
		</tr>	
	
		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Nationality:</td>          
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($nationality);?></td>		
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>		
			 <td >&nbsp;</td><td >&nbsp;</td>			 
		</tr>	
		
		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Father Phone:</td>  
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $father_work_phone;?></td>  
			 <td >&nbsp;</td> <td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Mother Phone:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo $mother_work_phone;?></td>
		</tr>		
		
		<tr><td colspan="7">&nbsp;</td></tr>		
		
		<tr>
			 <td style="font-family:Arial;font-size:13px;font-weight:bold;">Admission Date:</td>
			 <td style="font-family:Arial;font-size:13px;"><?php echo $adm_date;?></td>
			 <td >&nbsp;</td> <td >&nbsp;</td>
			 <td >&nbsp;</td> <td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
		</tr>	
		
		<tr>
			 <td  style="font-family:Arial;font-size:13px;font-weight:bold;">Qouta:</td>
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($quota); ?></td>        
			 <td>&nbsp;</td><td>&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td >&nbsp;</td><td >&nbsp;</td>
			 <td   style="font-family:Arial;font-size:13px;font-weight:bold;">Nationality:</td>      
			 <td  style="font-family:Arial;font-size:13px;"><?php echo ucfirst($nationality);?></td>
		</tr>		
		
	</table>
</div>	