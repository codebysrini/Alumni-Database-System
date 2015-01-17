<?php
include('includes/header.php');
$dept=getdepartments();
$sprt=getsport();
$com=getcom();
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">
  
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs">
           

 <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1 name='login' id='login'>Register</h1>
  
              </div>
                <div class="col-md-8 col-sm-8">
               
                </div>
            </div>
  
      </div>
        <!-- END BREADCRUMBS -->

        <!-- BEGIN CONTAINER -->   
        <div class="container margin-bottom-40">
  
        <div class="row">
            <div class="col-md-12 page-404">
   
<?php
$msg="";
if(isset($_POST['submit']))
{
	$valid=createUsers($_POST);
	$msg=($valid ==1)?"Registered Successfully!!!":"Unable to register please try again.";
}
if($msg!="")
{?>
<div><center><font color="green" size="-1"><?PHP echo $msg;
 ?></font></center></div>
<?php }?>               
 <div class="details">
           
         <div class="panel panel-default"> 
  
  

                	<div class="panel-heading">
<h3 class="panel-title">Register</h3></div>
  
                  <div class="panel-body">
           
          <form name="registerform" id="registerform" method="post" action="" onsubmit="return checkuname();">
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                            <label for="uname">UserName</label>
 
<div class="input-group" id="hashdiv">
  
<span class="input-group-addon"><i class="icon-user"></i></span>
 
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username" onkeyup="checkdata();" autocomplete='off'>
 
</div>             
              </div>
                         
  <div class="form-group">
               
               <label >Email Address</label>
   
                           <div class="input-group">
  
                              <span class="input-group-addon"><i class="icon-envelope"></i></span>
 
                               <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
  
                            </div>
                           </div>
    
                       <div class="form-group">
      
                        <label for="password">Password</label>
 
                                                          
<input type="password" class="form-control" id="password" name="password" placeholder="Password">
        
                                                    
                     </div>

                                 
                

<div class="form-group">
      
                        <label for="password">Re-enter Password</label>
 
                                                          
<input type="password" class="form-control" id="repassword" name="repassword" placeholder="Retype Password"
equalto="#password">
        
                                                    
                     </div>

	
	<div class="form-group">
               
               <label >First Name</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
  
                            
                           </div>
<div class="form-group">
               
               <label >Middle Name</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name">
  
                            
                           </div>
<div class="form-group">
               
               <label >Last Name</label>
   
                         
  
                              
 
                             <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
  
                           
                           </div>
<div class="form-group">
               
               <label >Address Line 1</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="addrline1" id="addrline1" placeholder="Address Line 1">
  
                             
                           </div>
<div class="form-group">
               
               <label >Address Line 2</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="addrline2" id="addrline2" placeholder="Address Line 2">
  
                           
                           </div>
						   
<div class="form-group">
               
               <label >City</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="city" id="city" placeholder="City">
  
                          
                           </div>

<div class="form-group">
               
               <label >State</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="state" id="state" placeholder="State">
  
                            
                           </div>
<div class="form-group">
               
               <label >ZIP</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="zip" id="zip" placeholder="ZIP">
  
                           
                           </div>
<div class="form-group">
               
               <label >Mobile Number</label>
   
                        
  
                              
 
                             <input type="text" class="form-control" name="mnumber" id="mnumber" placeholder="Mobile Number">
  
                           
                           </div>

	 
<div class="type">
               
               <label >Type</label><br>
			   
                           <div class="input-group">
  
                              
 
                             <input type="radio"   class="type1" name="type" id ="btn" value = "alumni">Alumni
							 <input type="radio" class="type1" name="type" id = "btn" value = "faculty">Faculty
							 <input type="radio" class="type1" name="type" id = "btn" value = "admin">Admin
  
                           </div>  
                          </div>
<div class="desc" id = "alumni">
                                 <br>
                                 <label>Academic Degree</label><br>
                                <input type="text" class="form-control" name="degree"  placeholder="Academic Degree" >
								<br>
								<label>Major Department</label><br>
								<select  class="form-control" name="majdept"  placeholder="Major Department" >
								<option value='0'>Major Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
								<br>
								<label>Minor Department</label><br>
								<select  class="form-control" name="mindept"  placeholder="Minor Department" >
								<option value='0'>Minor Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
								<br>
								<label>Major Advisor</label><br>
								<input type="text" class="form-control" name="advisor"  placeholder="Major Advisor" >
								<br>
								<label>Graduation Year</label><br>
								<input type="text" class="form-control" name="gradyear"  placeholder="Graduation Year" >
								<br>
								<label>Committee</label><br>
								<select  class="form-control" name="comtid"  placeholder="Committee" >
								<?php foreach($com as $c){?>
                                 <option value="<?php echo $c['Committee_ID']?>"><?php echo $c['Role_Description']?></option>
								 <?php } ?>
                              </select>
							  <br>
								<label>Sport</label><br>
								<select  class="form-control" name="sprtid"  placeholder="Sport" >
								<?php foreach($sprt as $s){?>
                                 <option value="<?php echo $s['Sport_Club_ID']?>"><?php echo $s['Sport_Name']?></option>
								 <?php } ?>
                              </select>
							  <br>
								<label>Linkedin</label><br>
								<input type="text" class="form-control" name="linkedin"  placeholder="Linkedin" >
								<br>
								<label>Facebook</label><br>
								<input type="text" class="form-control" name="facebook"  placeholder="Facebook" >
								<br>
								<label>Twitter</label><br>
								<input type="text" class="form-control" name="twitter"  placeholder="Twitter" >
								<br>
							</div>
							
<div class="desc" id = "faculty">
<br>
								<label>Department</label><br>
								<select  class="form-control" name="facdept"  placeholder="Department" >
								<option value='0'>Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
                                 <br>
								 <label>Designation</label><br>
                                <input type="text" class="form-control" name="facultydesig"  placeholder="Designation" >
								<br>
                                 <label>Office Address</label><br>
                                <input type="text" class="form-control" name="facultyaddr"  placeholder="Office Address" >
								<br>
								<label>Personal Website</label><br>
								<input type="text" class="form-control" name="facultysite"  placeholder="Personal Website" >
								<br>
								
							</div>
 
<div class="desc" id = "admin">
                                 <br>
                                 <label>Designation</label><br>
                                <input type="text" class="form-control" name="admindesig"  placeholder="Designation" >
								<br>
								<label>Office Address</label><br>
								<input type="text" class="form-control" name="adminaddr"  placeholder="Office Address" >
								<br>
								
							</div> 
</div>
					 <div class="form-actions">
					  
                         
  <input type="submit" name="submit" id="submit" value="Register" class="btn green">
     
                      <input type="button" class="btn default" value="Login" onclick="location='index.php'">  
                          
                        </div>                
        
                     </form>
                   </div>
                </div>
                  
 </div>
            </div>
          </div>
        </div>
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->
<?php
include('includes/footer.php');
 ?> 
<script type= "text/javascript">
$( "#registerform" ).validate({
  rules: {
    email: {
      required: true,
      email: true
    },
password:{
required:true
},
uname:{
required:true
},
firstname:{
 required:true 
},
lastname:{
 required:true
},
majdept:{
required:true
}
},
  messages:{
  email:"Enter valid id",
  password:"Enter Password",
  firstname:"Enter your First Name",
  lastname:"Enter your Last Name",
  majdept:"Enter your Major Department"
  }
});


</script>
<script>
$(document).ready(function(){
$(".desc").hide();
$(".type1").click(function(){
  var test = $(this).val();
  $(".desc").hide();
  $("#" + test).show();
});
});
function checkdata()
{	
var tag=$('#uname').val();
	if(tag.length>1)
	{
	$.ajax({
	type: "POST",
	url: "checkdata.php",
	data: {'data':tag}
	}).done(function( result ) {
		if(result==0)
		{
			$("#checkimg3").remove();
				$("#checkimg2").remove();
			$('#hashdiv').append("<div id='checkimg2' class='chkdata'><img src='Ricon.png' height='20' width='20'/>Username already Exists</div>");	
		}else
		{
			$("#checkimg3").remove();
				$("#checkimg2").remove();
			$('#hashdiv').append("<div id='checkimg3' class='chkdata'><img src='Aicon.png' height='20' width='20'/>UserName Available </div>");	
		}
	});
	}else
	{
		
		$("#checkimg3").remove();
		$("#checkimg2").remove();	
	}
	}
	function checkuname()
	{
	if($('#checkimg2').length!=0)
	{
	$('#uname').focus();
		submited=false;
		return false;	
	}
	return true;
	}
</script>