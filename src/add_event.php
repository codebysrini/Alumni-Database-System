<?php
include('includes/header.php');
checkAuthorisation();
if($_SESSION['Is_Admin']==1)
{
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">
  
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs">
           

 <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1 name='login' id='login'>Add Event</h1>
  
              </div>
                <div class="col-md-8 col-sm-8">
               <ul class="pull-right breadcrumb">

                        <li><a href="index.php">Home</a></li>
            
            <li ><a href="events.php">Events</a></li>
  
<li class="active">Add Event</li>               
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
	$upload=addevent($_POST);
}

if($msg!="")
{?><!--To handle the events after submitting the form-->
<div><center><font color="red" size="-1"><?PHP echo $msg; ?><!--To print an error message that is raised from the form-->
</font></center></div>
<?php }?>         
 <div class="details">
           
         <div class="panel panel-default"> 
  
  
                	<div class="panel-heading">
<h3 class="panel-title">Add Event</h3></div>
  
                  <div class="panel-body">
           
          <form name="eventform" id="eventform" method="post" action=''>
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                             <label for="ename">Event Name</label>
 
<div class="input-group">
  
                            <input type="text" class="form-control" id="ename" name="ename" placeholder="Enter a Title for the event">
 
</div>             
              </div>
                       <div class="form-group">
  
                             <label for="start_date">Event Start Date</label>
 
<div class="input-group">
  <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input type="text" class="form-control" id="start_date" name="start_date" placeholder="Enter a start date">
 
</div>              

              </div>     
                  <div class="form-group">
  
                             <label for="end_date">Event End Date</label>
 
<div class="input-group">
<span class="input-group-addon"><i class="icon-calendar"></i></span>
  
                            <input type="text" class="form-control" id="end_date" name="end_date" placeholder="Enter a End date">
 
</div>             
              </div>     

                       <div class="form-group">
      
                        <label for="photodesc">Event Description</label>
 
                             <div class="input-group">
                                 <textarea class="form-control" id="eventdesc" name="eventdesc" rows="8" cols="40" placeholder="Enter Event Description"></textarea>
        
                                                     
  </div>
                           </div>

                                

  </div>
                      <div class="form-actions">
                         
  <input type="submit" class="btn green" name="submit" id="submit" value="Add Event">  
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
}else
{
header("location:index.php");
}
 ?> 
 <script>
  $(function() {
    $( "#start_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$("#end_date").datepicker({ dateFormat: 'yy-mm-dd' });
  });
  </script>
<script type= "text/javascript">
$("#eventform").validate({
  rules: {
ename:{
required:true
},
start_date:{
required:true
},
end_date:{
required:true
},
eventdesc:{
required:true
}
  },
  messages:{
  ename:"Please enter an event title",
  start_date:"Please select event start date",
  end_date:"Please select event end date",
  eventdesc:"Please enter event description"
  }
});</script>