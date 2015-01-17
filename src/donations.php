<?php
include('includes/header.php');
checkAuthorisation();
$details=getdetails();
/* echo "<pre>";
print_r($details);
exit; */
 ?>     <!-- BEGIN PAGE CONTAINER -->  
      <style>
   .myimg {
background: #eee;
border: 1px solid #777;
}
   </style>
 <div class="page-container">
  
  
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Find A profile</h1>
          
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
            
            <li class="active">Find A Profile</li>
                 
   </ul>
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->

 
       <!-- BEGIN CONTAINER -->   

        <div class="container min-hight gallery-page margin-bottom-40">
   
       <div class="row">
     <br>
	 <br>
	  <form name="donateform" id="donateform" method="post" action=''>
    
  
                             <label for="searchwith">Search</label>
 
  <select  name="searchwith" id="searchwith"  placeholder="Major Department" class="form-control">
								<option value='p.Username'>Username</option>
								<option value='p.First_Name'>First Name</option>
								<option value='p.Last_Name'>Last Name</option>
								<option value='a.Graduation_year'>Graduation Year</option>
                              </select>
							  <br>
                             <label for="photo">Please Specify</label>
<br>
                            <input type="type" id="searchfor" name="searchfor" class="form-control">      
<br>							
  <input type="button" class="btn green" name="submit" id="submit" value="Search">  
                  <br>
<br>				  
			  </form>
  <div class="table-responsive col-md-12 col-sm-12">
                        <table class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                              


<th class="th-sno">No.</th>


<th>Profile</th>

<th>Username</th>

<th>Name</th>

<th width="17%">Graduated year</th>

<!--<th width="19%">Campaigns Blocked</th>-->

<!--<th>Actions</th>-->

                              </tr>
                           </thead>
                           <tbody id='tab'>
						   <?php $count=1;
						   if($details!=0)
						   {
						   foreach($details as $d)
						   {
						   ?>
                           <tr>
                                        <td><?php echo $count;?></td>
                                        <td><div class="user-image">
                                        <a href="view_profile.php?id=<?php echo $d['Person_ID'];?>"><img src="<?php if($d['Photo']!='') echo 'photos/profile/'.$d['Photo']; else echo 'noimage.jpg'; ?>" alt="profile pic" class="myimg" width="80" height="85" />
                                       </a> </div></td>
                                        <td><?php echo $d['Username'];?></td>
                                        <td><?php echo $d['First_Name'].' '.$d['Last_Name']?></td>
                                        <td><?php echo $d['Graduation_year']?></td>
									</tr>
									<?php 
									}
									}
									else
									{
									?>
																	  <tr><td colspan="5" align="center"><h4>No records found.</h4></td></tr>
									
									<?php }?>
                           </tbody>
                        </table>
                     </div>
           </div>
		 
             </div>
			 
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->  

<?php
include('includes/footer.php');
 ?>
<script type="text/javascript">
$('#submit').click(function(){
	var searchfor=$('#searchfor').val();
	var searchwith=$('#searchwith').val();
	//alert(searchfor);
	$.ajax({
	type: "post",
	url: "checkdata.php",
	data: {'searchfor':searchfor,'searchwith':searchwith}
	}).done(function( result ) {
		$('#tab').html(result);
		});

});
</script>
  