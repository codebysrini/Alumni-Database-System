<?php include "includes/header.php";
$events=getevents();
$event='';
if(count($events)>0)
{
	foreach($events as $eve)
	{
		$event.="{ id:".$eve['Event_ID'].",title:'".$eve['Event_Title']."',start:'".$eve['Event_Start_time']."',end:'".$eve['Event_End_time']."',url:'event_desc.php?event_id=".$eve['Event_ID']."',},";
	}
}
 ?>

<style>
	Body{
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}
		
	#loading {
		display: none;
		position: absolute;
		top: 10px;
		right: 10px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
</style>

  
 <div class="page-container">
  
  
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Events</h1>
          
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
            
            <li class="active">Events</li>
                 
   </ul>
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->

 
       <!-- BEGIN CONTAINER -->   

        <div class="container margin-bottom-40">
		
		<div class="row">
            <div class="col-md-12 page-404">
	<div id='calendar'></div>
	</div>
	</div>
	
		   <?php
if(isset($_SESSION['username']) && $_SESSION['Is_Admin']=='1')
{
?>  
		   		<input type="button" class="btn green" name="submit" id="submit" value="Add Event" onclick="location='add_event.php'" style="float: right">  
<?php
}
?>
</div>
</div>
<?php include "includes/footer.php" ?>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2014-11-12',
			draggable: false,
			eventLimit: true, // allow "more" link when too many events
			events: [
				<?php 
			echo $event;
			 ?>
			],
			eventClick: function(event) {
				// opens events in a popup window
				window.open(event.url,'_self');
				return false;
			},
		});
		
	});

</script>