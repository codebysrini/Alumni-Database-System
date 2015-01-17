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
                    <h1 name='login' id='login'>Upload Photo</h1>
  
              </div>
                <div class="col-md-8 col-sm-8">
               <ul class="pull-right breadcrumb">

                        <li><a href="index.php">Home</a></li>
            
            <li ><a href="gallery.php">Gallery</a></li>
  
<li class="active">Photo Upload</li>               
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
	$upload=uploadphoto($_POST,$_FILES);
}

if($msg!="")
{?><!--To handle the events after submitting the form-->
<div><center><font color="red" size="-1"><?PHP echo $msg; ?><!--To print an error message that is raised from the form-->
</font></center></div>
<?php }?>         
 <div class="details">
           
         <div class="panel panel-default"> 
  
  
                	<div class="panel-heading">
<h3 class="panel-title">Upload Photo</h3></div>
  
                  <div class="panel-body">
           
          <form name="uploadform" enctype="multipart/form-data" id="uploadform" method="post" action=''>
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                             <label for="photo">Photo</label>
 
<div class="input-group">
    <span class="input-group-addon"><i class="icon-file"></i></span>

                            <input type="file" class="form-control" id="photo" name="photo" accept="image/jpg,image/png,image/jpeg,image/gif">
 
</div>             
              </div>
                         

                       <div class="form-group">
      
                        <label for="photodesc">Photo Description</label>
 
                             <div class="input-group">
                                 <textarea class="form-control" id="photodesc" name="photodesc" rows="8" cols="40"></textarea>
        
                                                     
  </div>
                           </div>

                                 
                

  </div>
                      <div class="form-actions">
                         
  <input type="submit" class="btn green" name="submit" id="submit" value="Upload">  
<input type="button" name="cancel" id="cancel" class="btn btn-default" value="Back" onclick="location='Gallery.php'" /> 
                          
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
$( "#uploadform" ).validate({
  rules: {
photodesc:{
required:true
},
photo:{
required:true
}
  },
  messages:{
  photodesc:'Please enter Description for photo',
  photo: 'Please choose a photo'
  }
});</script>