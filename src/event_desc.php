<?php
include('includes/header.php');
if($_GET['event_id'])
{
$details=eventdetails($_GET['event_id']);
if(isset($_SESSION['person_id'])&&$_SESSION['Is_Alumni']==1)
{
$id=eventflag($_GET['event_id']);
}

 ?>     <!-- BEGIN PAGE CONTAINER -->  
   
 <div class="page-container">
  
  
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Event Description</h1>
          
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

                        <li><a href="home.php">Home</a></li>
                        <li><a href="events.php">Events</a></li>
   
            <li class="active">Event Description</li>
                 
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
	$valid=registerevent($_GET['event_id']);
	$msg=($valid ==0)?"you are inactive please contact administrator":"Invalid Username/Password";
}

if($msg!="")
{?><!--To handle the events after submitting the form-->
<div><center><font color="red" size="-1"><?PHP echo $msg; ?><!--To print an error message that is raised from the form-->
</font></center></div>
<?php }?>         
 <div class="details">
           
         <div class="panel panel-default"> 
  
  
                	<div class="panel-heading">
<h3 class="panel-title">Event Details</h3></div>
  
                  <div class="panel-body">
           
          <form name="loginform" id="loginform" method="post" action='#'>
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                             <label for="uname">Event</label>
 
<div class="input-group">
  
<?php  echo $details['Event_Title'] ?>
 
</div>             
              </div>
                         

                       <div class="form-group">
      
                        <label for="password">Details</label>
 
                             <div class="input-group">
                                 
<?php echo $details['Event_description'] ?>
        
                                                     
  </div>
                           </div>


                       <div class="form-group">
      
                        <label for="password">Starts from</label>
 
                             <div class="input-group">
                                 
<?php echo date('m/d/y',strtotime($details['Event_Start_time'])) ?>
        
                                                     
  </div>
                           </div>
                       <div class="form-group">
      
                        <label for="password">Ends on</label>
 
                             <div class="input-group">
                                 
<?php echo date('m/d/y',strtotime($details['Event_End_time'])) ?>
        
                                                     
  </div>
                           </div>          
                

  </div>
                      <div class="form-actions">
       <?php
if(isset($_SESSION['person_id'])&&$_SESSION['Is_Alumni']==1)
{
	   if($id==0)
{	if(date('m/d/y',strtotime($details['Event_End_time']))>=date('m/d/y'))
{ 
  ?>
  <input type="submit" class="btn green" name="submit" id="submit" value="Register">  
  <?php
  }else{
  ?>
    <input type="submit" class="btn grey" name="submit" id="submit" value="Event Expired" disabled>  
<?php
  }
}else{
?>
  <input type="submit" class="btn grey" name="submit" id="submit" value="Already Registered" disabled>  
<?php
}}elseif(isset($_SESSION['person_id'])&&$_SESSION['Is_Admin']==1)
{
  ?>
    <input type="button" class="btn green" name="edit" id="edit" value="Edit" onclick="location='event_edit.php?event_id=<?php echo $_GET['event_id']; ?>'">  
  <?php }?>
  <input type="button" name="cancel" id="cancel" class="btn btn-default" value="Back" onclick="location='events.php'" /> 

                          
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
}
else{
header("location:index.php");
}
 ?>

  