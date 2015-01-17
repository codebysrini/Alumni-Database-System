<?php include "includes/functions.php" ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>UNCC Alumni Association | Homepage</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

   <!-- BEGIN GLOBAL MANDATORY STYLES -->          
   <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
   <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   
   <!-- BEGIN PAGE LEVEL PLUGIN STYLES --> 
   <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />              
   <link rel="stylesheet" href="assets/plugins/revolution_slider/css/rs-style.css" media="screen">
   <link rel="stylesheet" href="assets/plugins/revolution_slider/rs-plugin/css/settings.css" media="screen"> 
   <link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />                
   <!-- END PAGE LEVEL PLUGIN STYLES -->

   <!-- BEGIN THEME STYLES --> 
   <link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/themes/green.css" rel="stylesheet" type="text/css" id="style_color"/>
   <link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>

   <link href="css/fullcalendar.css" rel="stylesheet" type="text/css"/>
   <link href="css/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
   <link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->

   <link rel="shortcut icon" href="favicon.ico" />
</head>
<style>
.error{
		 border-color:#F00;
}
label.error{
        color:#F00;
    }
</style>
<!-- END HEAD -->

<!-- BEGIN BODY -->
<body>
	

    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-default navbar-static-top" id="header">
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
					<img src="assets/img/logo.png" id="logoimg" alt="">
				</a>
				<!-- END LOGO -->
			</div>
		
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="navbar-collapse collapse">
	          <?php $pname=basename($_SERVER['PHP_SELF']); ?>
 <ul class="nav navbar-nav">
 	 <li  <?php if($pname=="index.php") echo "class='active'"; ?>>

                            <a href="index.php">

                            Home                         </a>
   </li>
 		<?php
if(isset($_SESSION['username']))
{
?>   
   <li class="dropdown"  <?php if($pname=="view_profile.php" || $pname=="edit_profile.php" || $pname=="find_profile.php") echo "class='active'"; ?>>
                        <a class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">
                            Profile
                            <i class="icon-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="view_profile.php">View Profile</a></li>
                            <li><a href="edit_profile.php">Edit Profile</a></li>
							<li><a href="find_profile.php">Find A Profile</a></li>
                        </ul>
                    </li>
				<?php
}?>		
   
                 <li  <?php if($pname=="gallery.php") echo "class='active'"; ?>>

                            <a href="gallery.php">

                            Gallery                         </a>
   </li>
   <li  <?php if($pname=="events.php") echo "class='active'" ?>>
                        <a href="events.php">
                        	Events
                        </a>
                     
					</li>
   <?php
if(isset($_SESSION['username']))
{
if( $_SESSION['Is_Alumni']==1 || $_SESSION['Is_Admin']==1)
{
?>   
<li  <?php if($pname=="donate.php") echo "class='active'" ?>>
                        <a href="donate.php">
						<?php
						if( $_SESSION['Is_Admin']==1)
{?>
                        	Donations<?php }else {?>Donate<?php }?>
							
                        </a>
                     
					</li>
					<?php }?>
					 <li>

                            <a href="logout.php">

                            Logout                        </a>
   </li>
<?php }else{?>   	<li  <?php if($pname=="login.php") echo "class='active'" ?>><a href="login.php">Login</a></li>
<li><a href="register.php"><b>Sign Up!</b></a></li>
<?php }?>

					<li class="menu-search">
                        <span class="sep"></span>
                        <i class="icon-search search-btn"></i>

                        <div class="search-box">
                            <form action="#">
                                <div class="input-group input-large">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn theme-btn">Go</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
					</li>
				</ul>    
		
			</div>
			<!-- BEGIN TOP NAVIGATION MENU -->
		</div>
    </div>
    <!-- END HEADER -->