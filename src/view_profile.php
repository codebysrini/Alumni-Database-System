<?php
include('includes/header.php');
checkAuthorisation();
if(!isset($_GET['id']))
{
$details=getpersondetails();
$comments=getcomments($_SESSION['person_id']);
}else
{
$details=getperdetails($_GET['id']);
$comments=getcomments($_GET['id']);
}
/*echo "<pre>";
print_r($comments);
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
     
               <h1>View Profile</h1>
          
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
            
            <li class="active">Profile</li>
                 
   </ul>
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->
<?php
$msg="";
if(isset($_POST['submit']))
{
	$upload=addcomment($_POST);
}
?>
  
 
       <!-- BEGIN CONTAINER -->   

		<div class="container min-hight portfolio-page margin-bottom-30">
				<!-- BEGIN PORTFOLIO ITEM -->
				<div class="row">
					<!-- BEGIN CAROUSEL -->            
					<div class="col-md-5 front-carousel">
					<br>
						<br>
						<br>
						<div>
							<!-- Carousel items -->
							<div class="carousel-inner">
								<div>
									<img src="<?php if($details[0]['Photo']!='') echo 'photos/profile/'.$details[0]['Photo']; else echo 'noimage.jpg'; ?>" alt="" height="284" width="255" id="img">
								</div>
							</div>
						</div>                
					</div>
					<!-- END CAROUSEL -->                             

					<!-- BEGIN PORTFOLIO DESCRIPTION -->            
					<div class="col-md-7">
						<h2>Profile</h2>
						<div class="form-body">
  
                         <div class="form-group">
  
                            <label for="uname">UserName</label>
 
<div class="input-group">
  
<span class="input-group-addon"><i class="icon-user"></i></span>
 
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username" value="<?php echo $details[0]['Username'] ?>" readonly>
 
</div>             
              </div>
                         
  <div class="form-group">
               
               <label >Email Address</label>
   
                           <div class="input-group">
  
                              <span class="input-group-addon"><i class="icon-envelope"></i></span>
 
                               <input type="text" class="form-control" name="email" id="email" placeholder="Email Address" value="<?php echo $details[0]['Email_address'] ?>" readonly>
  
                            </div>
                           </div>
    
                       

	
	<div class="form-group">
               
               <label >First Name</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" value="<?php echo $details[0]['First_Name'] ?>" readonly>
  
                            
                           </div>
<div class="form-group">
               
               <label >Middle Name</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle Name" value="<?php echo $details[0]['Middle_Name'] ?>" readonly>
  
                            
                           </div>
<div class="form-group">
               
               <label >Last Name</label>
   
                         
  
                              
 
                             <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" value="<?php echo $details[0]['Last_Name'] ?>" readonly>
  
                           
                           </div>
<div class="form-group">
               
               <label >Address Line 1</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="addrline1" id="addrline1" placeholder="Address Line 1" value="<?php echo $details[0]['Address_Line1'] ?>" readonly>
  
                             
                           </div>
<div class="form-group">
               
               <label >Address Line 2</label>
   
                          
  
                              
 
                             <input type="text" class="form-control" name="addrline2" id="addrline2" placeholder="Address Line 2" value="<?php echo $details[0]['Address_Line2'] ?>" readonly>
  
                           
                           </div>
						   
<div class="form-group">
               
               <label >City</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="city" id="city" placeholder="City" value="<?php echo $details[0]['City'] ?>" readonly>
  
                          
                           </div>

<div class="form-group">
               
               <label >State</label>
   
                           
                              
 
                             <input type="text" class="form-control" name="state" id="state" placeholder="State" value="<?php echo $details[0]['State'] ?>" readonly>
  
                            
                           </div>
<div class="form-group">
               
               <label >ZIP</label>
   
                           
  
                              
 
                             <input type="text" class="form-control" name="zip" id="zip" placeholder="ZIP" value="<?php echo $details[0]['ZIP'] ?>" readonly>
  
                           
                           </div>
<div class="form-group">
               
               <label >Mobile Number</label>
   
                        
  
                              
 
                             <input type="text" class="form-control" name="mnumber" id="mnumber" placeholder="Mobile Number" value="<?php echo $details[0]['Mobile_number'] ?>" readonly>
  
                           
                           </div>

	 
<?php if($_SESSION['Is_Alumni']==1 || $details[0]['Is_Alumni']==1){ ?>
<div class="desc" id = "alumni">
                                 <label>Academic Degree</label><br>
                                <input type="text" class="form-control" name="degree"  placeholder="Academic Degree" value="<?php echo $details[1]['Academic_Degree'] ?>" readonly >
								<br>
								<label>Major Department</label><br>
								<input type="text" class="form-control" name="majdept"  placeholder="Major Department" value="<?php echo $details[1]['major'] ?>" readonly >
								<br>
								<label>Minor Department</label><br>
								<input type="text" class="form-control" name="mindept"  placeholder="Minor Department" value="<?php echo $details[1]['minor'] ?>" readonly >
								<br>
								<label>Major Advisor</label><br>
								<input type="text" class="form-control" name="advisor"  placeholder="Major Advisor" value="<?php echo $details[1]['Major_Advisor'] ?>" readonly >
								<br>
								<label>Graduation Year</label><br>
								<input type="text" class="form-control" name="gradyear"  placeholder="Graduation Year" value="<?php if($details[1]['Graduation_year']!='0000') echo $details[1]['Graduation_year'] ?>" readonly >
								<br>
								<label>Committee</label><br>
								<input type="text" class="form-control" name="majdept"  placeholder="Major Department" value="<?php echo $details[1]['Role_Description'] ?>" readonly >
								<br>
								<label>Sport</label><br>
								<input type="text" class="form-control" name="mindept"  placeholder="Minor Department" value="<?php echo $details[1]['Sport_Name'] ?>" readonly >
								<br>
								<label>Linkedin</label><br>
								<input type="text" class="form-control" name="linkedin"  placeholder="Linkedin" value="<?php echo $details[1]['Linked_in_URL'] ?>" readonly >
								<br>
								<label>Facebook</label><br>
								<input type="text" class="form-control" name="facebook"  placeholder="Facebook" value="<?php echo $details[1]['Facebook_URL'] ?>" readonly >
								<br>
								<label>Twitter</label><br>
								<input type="text" class="form-control" name="twitter"  placeholder="Twitter" value="<?php echo $details[1]['Twitter_URL'] ?>" readonly >
								<br>
							</div>
							<?php }else if($_SESSION['Is_Faculty']==1){?>
							
<div class="desc" id = "faculty">

<label>Department</label><br>
								<input type="text" class="form-control" name="majdept"  placeholder="Major Department" value="<?php echo $details[1]['Department_Name'] ?>" readonly >
								<br>
								 <label>Designation</label><br>
                                <input type="text" class="form-control" name="facultydesig"  placeholder="Designation" value="<?php echo $details[1]['Designation'] ?>" readonly >
								<br>
                                 <label>Office Address</label><br>
                                <input type="text" class="form-control" name="facultyaddr"  placeholder="Office Address" value="<?php echo $details[1]['Office_Address'] ?>" readonly >
								<br>
								<label>Personal Website</label><br>
								<input type="text" class="form-control" name="facultysite"  placeholder="Personal Website" value="<?php echo $details[1]['Personal_Website'] ?>" readonly >
								<br>
								
							</div>
 							<?php }else if($_SESSION['Is_Admin']==1){?>
<div class="desc" id = "admin">
                                 <label>Designation</label><br>
                                <input type="text" class="form-control" name="admindesig"  placeholder="Designation" value="<?php echo $details[1]['Designation'] ?>" readonly >
								<br>
								<label>Office Address</label><br>
								<input type="text" class="form-control" name="adminaddr"  placeholder="Office Address" value="<?php echo $details[1]['Office_Address'] ?>" readonly >
								<br>
								
							</div> 
							<?php } ?>
</div>
						<br>
						<?php if(!isset($_GET['id']))
{?>
						<a href="edit_profile.php" class="btn theme-btn">Edit Profile</a>
						<?php }
						if($comments!=0)
						{
						$count=1;
						foreach($comments as $c)
						{
						?>
						<div class="media">
						<?php if($count==1){ ?>
						<h3>Comments</h3>
						<?php }?>
						<a href="#" class="pull-left">
						<img src="<?php if($c['Photo']!='') echo 'photos/profile/'.$c['Photo']; else echo 'noimage.jpg'; ?>" alt="" class="media-object" height='50'>
						</a>
						<div class="media-body">
							<p class="media-heading"><?php echo $c['First_Name'].' '.$c['Last_Name'] ?><span class="pull-right"><?php echo date('M d,Y',strtotime($c['Timestamp'])) ?></span></p>
							<h5><?php echo $c['Comment_Desciption'] ?> </h5>
						</div>
					</div>
					<?php $count++; }} ?>
					<br>
					<br>
					<?php if(isset($_GET['id']) && $_SESSION['Is_Faculty']==1)
{?>
  <input type="button" class="btn green" name="submit" id="submit" value="Comment" onclick="showdiv()">  
						<?php }?>
						<br>
						<br>
						<div class="post-comment" id="showdiv" style="display:none;">
						<h3>Leave a Comment</h3>
						<form role="form" name="postcomment" id="postcomment" method="post">
							<input type="hidden" name="alumni_id" value="<?php echo $_GET['id']?>">
							<div class="form-group">
								<label>Message</label>
								<textarea class="form-control" rows="8" name="message" id="message"></textarea>
							</div>
							<p><input class="btn btn-default theme-btn" type="submit" id="submit" name="submit" value="Post a Comment">
						                      <input type="button" class="btn default" value="Back" onclick="location='view_profile.php?id=<?php echo $_GET['id']?>'">  </p>
						</form>
					</div>
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
<script type="text/javascript">
function showdiv()
{
	$('#showdiv').show();
}
</script>
  