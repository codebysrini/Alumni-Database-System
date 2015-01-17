<?php
include('includes/header.php');
$details=getpersondetails();
$dept=getdepartments();
$sprt=getsport();
$com=getcom();
/*echo "<pre>";
print_r($details);
exit;*/

 ?>     <!-- BEGIN PAGE CONTAINER -->  
   <style>
   #myimg {
background: #eee;
border: 1px solid #777;
}
   </style>
 <div class="page-container">
    
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Edit Profile</h1>
          
      </div>
                <?php if(isset($_SESSION['message']))
{
 ?>
 <div style="color: green;width: 60%; margin: 0px auto;" ><?php  echo $_SESSION['message'];
unset($_SESSION['message']);
 ?></div>
 <?php }?>   
 <div class="col-md-8 col-sm-8">
 
                   <ul class="pull-right breadcrumb">

                        <li><a href="index.php">Home</a></li>
            
            <li class="active">Edit Profile</li>
                 
   </ul>
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->
<?php
$msg="";
if(isset($_POST['submit']))
{
	$upload=editprofile($_POST);
}
?>
 
       <!-- BEGIN CONTAINER -->   

		<div class="container min-hight portfolio-page margin-bottom-30">
				<!-- BEGIN PORTFOLIO ITEM -->
				<div class="row">
					<!-- BEGIN CAROUSEL -->            
					<div class="col-md-5 front-carousel">
						<div>
						<br>
						<br>
						<br>
							<!-- Carousel items -->
							<div class="carousel-inner">
								<div>
								<figure id="myimg">
									<img src="<?php if($details[0]['Photo']!='') echo 'photos/profile/'.$details[0]['Photo']; else echo 'noimage.jpg'; ?>" alt="" height="284" width="255">
								</figure>
								</div>
							</div>
						</div>                
					</div>
					<!-- END CAROUSEL -->                             

					<!-- BEGIN PORTFOLIO DESCRIPTION -->            
					<div class="col-md-7">
						<h2>Profile</h2>
						          <form name="editform" enctype="multipart/form-data" id="editform" method="post" action="" onsubmit="return checkuname();">

						<div class="form-body">
  
                         <div class="form-group">
  
                            <label for="uname">UserName</label>
 
<div class="input-group" id="hashdiv">
  
<span class="input-group-addon"><i class="icon-user"></i></span>
 
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username" value="<?php echo $details[0]['Username'] ?>" onkeyup="checkdata();" autocomplete='off'>
 
</div>             
              </div>
                         
  <div class="form-group">
               
               <label >Email Address</label>
   
                           <div class="input-group">
  
                              <span class="input-group-addon"><i class="icon-envelope"></i></span>
 
                               <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $details[0]['Email_address'] ?>">
  
                            </div>
                           </div>
    
                          <div class="form-group">
  
                             <label for="photo">Profile Photo</label>
 
<div class="input-group">
    <span class="input-group-addon"><i class="icon-file"></i></span>

                            <input type="file" class="form-control" id="photo" name="photo" accept="image/jpg,image/png,image/jpeg,image/gif">
 
</div>             
              </div>

	<input type="hidden" name="prof" id="prof" value="<?php echo $details[0]['Photo'] ?>">
	<div class="form-group">
               
               <label >First Name</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $details[0]['First_Name'] ?>">
  
                            
                           </div>
<div class="form-group">
               
               <label >Middle Name</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $details[0]['Middle_Name'] ?>">
  
                            
                           </div>
<div class="form-group">
               
               <label >Last Name</label>
   
                         
  
                              
 
                             <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $details[0]['Last_Name'] ?>">
  
                           
                           </div>
<div class="form-group">
               
               <label >Address Line 1</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="addrline1" id="addrline1" placeholder="Address Line 1" value="<?php echo $details[0]['Address_Line1'] ?>">
  
                             
                           </div>
<div class="form-group">
               
               <label >Address Line 2</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="addrline2" id="addrline2" placeholder="Address Line 2" value="<?php echo $details[0]['Address_Line2'] ?>">
  
                           
                           </div>
						   
<div class="form-group">
               
               <label >City</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $details[0]['City'] ?>">
  
                          
                           </div>

<div class="form-group">
               
               <label >State</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php echo $details[0]['State'] ?>">
  
                            
                           </div>
<div class="form-group">
               
               <label >ZIP</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="zip" id="zip" placeholder="ZIP" value="<?php echo $details[0]['ZIP'] ?>">
  
                           
                           </div>
<div class="form-group">
               
               <label >Mobile Number</label>
   
                        
  
                              
 
                             <input type="text" class="form-control" name="mnumber" id="mnumber" placeholder="Mobile Number" value="<?php echo $details[0]['Mobile_number'] ?>">
  
                           
                           </div>

	 
<?php if($_SESSION['Is_Alumni']==1){ ?>
<div class="desc" id = "alumni">
                                 <label>Academic Degree</label><br>
                                <input type="text" class="form-control" name="degree"  placeholder="Academic Degree" value="<?php echo $details[1]['Academic_Degree'] ?>">
								<br>
								<label>Major Department</label><br>
								<select  class="form-control" name="majdept"  placeholder="Major Department" >
								<option value='0'>Major Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>" <?php if($details[1]['Major_Department_ID']==$d['Department_ID']) echo "selected='selected'" ?>><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
								<br>
								<label>Minor Department</label><br>
								<select  class="form-control" name="mindept"  placeholder="Minor Department" >
								<option value='0'>Minor Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>" <?php if($details[1]['Minor_department_ID']==$d['Department_ID']) echo "selected='selected'" ?>><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
								<br>
								<label>Major Advisor</label><br>
								<input type="text" class="form-control" name="advisor"  placeholder="Major Advisor" value="<?php echo $details[1]['Major_Advisor'] ?>">
								<br>
								<label>Graduation Year</label><br>
								<input type="text" class="form-control" name="gradyear"  placeholder="Graduation Year" value="<?php if($details[1]['Graduation_year']!='0000') echo $details[1]['Graduation_year'] ?>">
								<br>
								<label>Committee</label><br>
								<select  class="form-control" name="comtid"  placeholder="Committee" >
								<?php foreach($com as $c){?>
                                 <option value="<?php echo $c['Committee_ID']?>" <?php if($details[1]['Committee_ID']==$c['Committee_ID']) echo "selected='selected'" ?>><?php echo $c['Role_Description']?></option>
								 <?php } ?>
                              </select>
							  <br>
								<label>Sport</label><br>
								<select  class="form-control" name="sprtid"  placeholder="Sport" >
								<?php foreach($sprt as $s){?>
                                 <option value="<?php echo $s['Sport_Club_ID']?>" <?php if($details[1]['Sport_Club_ID']==$s['Sport_Club_ID']) echo "selected='selected'" ?>><?php echo $s['Sport_Name']?></option>
								 <?php } ?>
                              </select>
							  <br>
								<label>Linkedin</label><br>
								<input type="text" class="form-control" name="linkedin"  placeholder="Linkedin" value="<?php echo $details[1]['Linked_in_URL'] ?>">
								<br>
								<label>Facebook</label><br>
								<input type="text" class="form-control" name="facebook"  placeholder="Facebook" value="<?php echo $details[1]['Facebook_URL'] ?>">
								<br>
								<label>Twitter</label><br>
								<input type="text" class="form-control" name="twitter"  placeholder="Twitter" value="<?php echo $details[1]['Twitter_URL'] ?>">
								<br>
							</div>
							<?php }else if($_SESSION['Is_Faculty']==1){?>
							
<div class="desc" id = "faculty">
<br>
								<label>Department</label><br>
								<select  class="form-control" name="facdept"  placeholder="Department" >
								<option value='0'>Department</option>
								<?php foreach($dept as $d){?>
                                 <option value="<?php echo $d['Department_ID']?>" <?php if($details[1]['Department_ID']==$d['Department_ID']) echo "selected='selected'" ?>><?php echo $d['Department_Name']?></option>
								 <?php } ?>
                              </select>
							  <br>
								 <label>Designation</label><br>
                                <input type="text" class="form-control" name="facultydesig"  placeholder="Designation" value="<?php echo $details[1]['Designation'] ?>">
								<br>
                                 <label>Office Address</label><br>
                                <input type="text" class="form-control" name="facultyaddr"  placeholder="Office Address" value="<?php echo $details[1]['Office_Address'] ?>">
								<br>
								<label>Personal Website</label><br>
								<input type="text" class="form-control" name="facultysite"  placeholder="Personal Website" value="<?php echo $details[1]['Personal_Website'] ?>">
								<br>
								
							</div>
 							<?php }else if($_SESSION['Is_Admin']==1){?>
<div class="desc" id = "admin">
                                 <label>Designation</label><br>
                                <input type="text" class="form-control" name="admindesig"  placeholder="Designation" value="<?php echo $details[1]['Designation'] ?>">
								<br>
								<label>Office Address</label><br>
								<input type="text" class="form-control" name="adminaddr"  placeholder="Office Address" value="<?php echo $details[1]['Office_Address'] ?>">
								<br>
								
							</div> 
							<?php } ?>
</div>
						<br>
						
					 <div class="form-actions">
					  
  <input type="submit" name="submit" id="submit" value="Save changes" class="btn green">

                      <input type="button" class="btn default" value="Back" onclick="location='index.php'">  
					  </div>
					  </form>
					</div>
					<!-- END PORTFOLIO DESCRIPTION -->            
				</div>
				<!-- END PORTFOLIO ITEM --> 
			</div>
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->  

<?php
include('includes/footer.php');
 ?>
<script type= "text/javascript">
$( "#editform" ).validate({
  rules: {
    email: {
      required: true,
      email: true
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
  firstname:"Enter your First Name",
  lastname:"Enter your Last Name",
  majdept:"Enter your Major Department"
  }
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
  