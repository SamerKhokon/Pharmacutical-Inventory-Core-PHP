<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>:: Decent Pharma Ltd.| Sales and Distributor management ::</title>
    <link rel="stylesheet" href="css/default.css">
    <link href="css/css.css" rel="stylesheet" type="text/css" />

    
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    
	
<!--[if IE 6]>
<link rel="stylesheet" href="ie6.css" type="text/css">
<![endif]-->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
  


</head>
<body>

<div id="headerwrap">
	<div id="header" class="header">
		
     
	</div>

		

		
		<!-- Blue Menu -->
		<ul id="menu" class="blue">
			
		</ul>
		

	
</div>
<div id="middlewrap">
	<div id="middle1">
	  <div id="sidebar1" class="">
			
		</div>
		<div id="content1">
        
       <section>				
                <div id="container_demo" style="margin:20px 0px 0px 0px;" >
                  
                    <div id="wrapper">
                      
                           <form id="login" action="none">
                          
                                <h1>Decent Pharma</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > User ID </label>
                                    <input id="user_name" name="user_name" required="required" type="text" placeholder="User ID"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Password" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
                                    
								</p>
                               
                                <p class="change_link"> 
                                <a href="#toregister" class="to_register" id="sign_in_button">Login</a>
                                   <!-- <input type="button" class="login_btm" id="sign_in_button"  value="Login" /> -->
								</p>
                             
                               <!-- <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>-->
                            </form>
                        

                        
						
                    </div>
                </div>  
            </section>
        
		<script type="text/javascript">
		$(document).ready(function(){
		 
		   $("#user_name").focus();
		  $("#user_name").keypress(function(ex){
		     if(ex.which == 13) {
			   var username = $("#user_name").val();
			    if(username=="") {
				   alert("Enter username");
				   $("#user_name").focus();
				   return false;
				}else{
				   $("#password").focus();
				}
			 }
		  });
		  
		  $("#password").keypress(function(ex){
		     if(ex.which == 13) {
			   var password = $("#password").val();
			    if(password=="") {
				   alert("Enter password");
				   $("#password").focus();
				   return false;
				}else{
				   $("#sign_in_button").focus();
				}
			 }
		  });
		  
		  $("#sign_in_button").click(function(){
				var username = $("#user_name").val();
				var password = $("#password").val();
				var dataStr = "username="+username+"&password="+password;
				
				if(username=="") {
					   alert("Enter username");
					   $("#user_name").focus();
					   return false;
				}
				else  if(password=="") 
				{
					 alert("Enter password");
					 $("#password").focus();
					 return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"login_check.php" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){					      
						  if(st==1) {
						    location.href = "./";
						  }else{
						     alert("Please check your username or password");
							 $("#password").focus();
						  }
					   }
					});	
				}
		    });		  
		});	
		</script>
        
<br /><br />

		</div>
	</div>
</div>

<div id="footerwrap">
	<div id="footer">
		<h2>  Powered by <a href="">Semicon Pvt. Ltd.</a></h2>

	</div>
</div>
</body></html>