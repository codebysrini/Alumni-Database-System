<?php
include('includes/header.php');
checkauthorisation();
 ?>   
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">

  
        <!-- BEGIN BREADCRUMBS -->   
 
       <div class="row breadcrumbs">
           
 <div class="container">
    
            <div class="col-md-4 col-sm-4">
    
                <h1 name='login' id='login'>Home</h1>
  
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
    
   
 <div class="details">
Hello <?php echo $_SESSION['username']?> </div>
 <!--To display the name of the user who is logged in -->                 
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

  
