<?php
include('includes/functions.php');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> 
<![endif]-->
<!--[if IE 9]> 
<html lang="en" class="ie9"> 
<![endif]-->
<!--[if !IE]><!--> <html lang="en">
 <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    
<meta charset="utf-8" />
    
<title>Alumni</title>
  
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   
 <meta content="" name="description" />
   
 <meta content="" name="author" />

  
 <!-- BEGIN GLOBAL MANDATORY STYLES -->   
       
   <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  
 <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  
 <!-- END GLOBAL MANDATORY STYLES -->
   
   <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
  
 <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
               
   <!-- END PAGE LEVEL PLUGIN STYLES -->

   <!-- BEGIN THEME STYLES -->
 
   <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
  
 <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
  
 <link href="assets/css/themes/blue.css" rel="stylesheet" type="text/css" id="style_color"/>

   <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
 
  <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->

 
  <link rel="shortcut icon" href="favicon.ico" />


   
</head>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
 
   <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
      
  <div class="color-mode-icons icon-color"></div>
       


 <div class="color-mode-icons icon-color-close"></div>
       
 <div class="color-mode">
            
<p>THEME COLOR</p>
            
<ul class="inline">
            
    <li class="color-blue current color-default" data-style="blue"></li>
          
      <li class="color-red" data-style="red"></li>
               
 <li class="color-green" data-style="green"></li>
               
 <li class="color-orange" data-style="orange"></li>
            </ul>
    
        <label>
                <span>Header</span>
               
 <select class="header-option form-control input-small">
           
         <option value="default" selected>Default</option>
                
    <option value="fixed">Fixed</option>
                </select>
       
     </label>
        </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER -->  
 

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top">
      
  <div class="container">
     
       <div class="navbar-header">
  
              <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    
            <button class="navbar-toggle btn navbar-btn" data-toggle="collapse" data-target=".navbar-collapse">

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>
    
            <!-- END RESPONSIVE MENU TOGGLER -->
                
<!-- BEGIN LOGO (you can use logo image instead of text)-->
  
              <a class="navbar-brand logo-v1" href="index.php">
 
                    <img src="assets/img/logo.png" id="img1" alt="">
      
            </a>
                <!-- END LOGO -->
     
       </div>
        
            <!-- BEGIN TOP NAVIGATION MENU -->
 
           <div class="navbar-collapse collapse">
      
<?php
if(isset($_SESSION['username']))
{
?>             
 <ul class="nav navbar-nav">
   <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Profile
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="view.php">View Profile</a></li>
                            <li><a href="edit_profile.php">Edit Profile</a></li>
                        </ul>
                    </li>
					 <li>

                            <a href="home.php">

                            Home                         </a>
   </li>
   
                 <li>

                            <a href="gallery.php">

                            Gallery                         </a>
   </li>
 <li>

                            <a href="logout.php">

                            Logout                        </a>
   </li>
</ul> 
<?php
}
?>
        </div>
           
 <!-- BEGIN TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER -->

 