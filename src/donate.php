<?php
include('includes/header.php');
checkAuthorisation();
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">
  
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs">
           

 <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1 name='login' id='login'>Donate</h1>
  
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
            
  
<li class="active">Donate</li>               
   </ul>
        
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
	$upload=donate($_POST);
}

if($msg!="")
{?><!--To handle the events after submitting the form-->
<div><center><font color="red" size="-1"><?PHP echo $msg; ?><!--To print an error message that is raised from the form-->
</font></center></div>
<?php }
if($_SESSION['Is_Alumni']==1)
{
$details=getdonations(1);
?>         
 <div class="details">
           
         <div class="panel panel-default"> 
  
  
                	<div class="panel-heading">
<h3 class="panel-title">Donate</h3></div>
  
                  <div class="panel-body">
           
          <form name="donateform" id="donateform" method="post" action=''>
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                             <label for="donateto">Donate To</label>
 
<div class="input-group">
  <select  class="form-control" name="donateto" id="donateto"  placeholder="Major Department" onchange="showdiv()">
								<option value='sports'>Sports</option>
								<option value='events'>Events</option>
								<option value='college of engineering'>College of Engineering</option>
								<option value='college of science'>College of Science</option>
								<option value='college of education'>College of Education</option>
								<option value='college of business'>College of Business</option>
								<option value='university'>University</option>
								<option value='other'>Other</option>
                              </select>
</div>             
              </div>
			    <div class="form-group" id="otherfield" style="display:none;">
  
                             <label for="other">Please Specify</label>
 
<div class="input-group">

                            <input type="type" class="form-control" id="other" name="other">
 
</div>             
              </div>
                       <div class="form-group">
      
                        <label for="photodesc">Amount</label>
 
                             <div class="input-group">
                                <input type="text" class="form-control" name="amt" id="amt"  placeholder="Enter the Amount">        
                                                     
  </div>
                           </div>

                                

  </div>
                      <div class="form-actions">
                         
  <input type="submit" class="btn green" name="submit" id="submit" value="Donate!">  
                          
                        </div>                
        
                     </form>
                   </div>
                </div>
                  
 </div>
 <?php }else $details=getdonations(0);?>
 <br>
 
 <br>
 <div class="table-responsive col-md-12 col-sm-12">
                        <table class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                              


<th class="th-sno">No.</th>

<th>Username</th>

<th>Purpose</th>

<th>Amount</th>

<th width="17%">Year</th>

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
                                        <td><?php echo $d['Username'];?></td>
                                        <td><?php echo $d['contribution_purpose']?></td>
                                         <td><?php echo $d['contribution_amount']?></td>
                                       <td><?php echo $d['contribution_year']?></td>
									</tr>
									<?php 
									$count++;
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
        </div>
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->  

    
<?php
include('includes/footer.php');
 ?> 
<script type= "text/javascript">
function showdiv(){
$('#otherfield').hide();
$('#otherfield').disabled=true;
if($('#donateto').val()=='other')
{
$('#otherfield').disabled=false;
	$('#otherfield').show();
}else
{
$('#otherfield').hide();
$('#otherfield').disabled=true;

}
}

</script>
<script type= "text/javascript">
$("#donateform").validate({
  rules: {
donateto:{
required:true
},
other:{
required:true
},
amt:{
required:true,
number:true
}
  },
  messages:{
donateto:'Please select an option',
other:'Please specify other',
amt:'Please enter the amount in numbers'
}
});</script>