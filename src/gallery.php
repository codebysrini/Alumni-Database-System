<?php
include('includes/header.php');
$photos=fetchphotos();
/*echo "<pre>";
print_r($photos);
exit;*/
 ?>     <!-- BEGIN PAGE CONTAINER -->  
   
 <div class="page-container">
  
  
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Gallery</h1>
          
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
            
            <li class="active">Gallery</li>
                 
   </ul>
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->

 
       <!-- BEGIN CONTAINER -->   

        <div class="container min-hight gallery-page margin-bottom-40">
   
       <div class="row">
     
<?php
if(count($photos)>0)
{
foreach($photos as $p)
{
 ?>
       <div class="col-md-3 col-sm-4 gallery-item">
    
          <a data-rel="fancybox-button" title="<?php echo $p['Photo_Description'] ?>" href="photos/gallery/<?php echo $p['Photo_Name'] ?>" class="fancybox-button">
        
        <img alt="" src="photos/gallery/<?php echo $p['Photo_Name'] ?>" class="img-responsive">
            
    <div class="zoomix"><i class="icon-search"></i></div>
             
 </a> 
          
  </div>
       
<?php
}
}else
echo "No photos uploaded yet......";
 ?>
           </div>
		   <?php
if(isset($_SESSION['username']))
{
?>  
		   		<input type="button" class="btn green" name="submit" id="submit" value="Upload Photo" onclick="location='uploadphoto.php'" style="float: right">  
<?php
}
?>
             </div>
			 
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->  

<?php
include('includes/footer.php');
 ?>

  