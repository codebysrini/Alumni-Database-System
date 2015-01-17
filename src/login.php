<?php
include('includes/header.php');
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">
  
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs">
           

 <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1 name='login' id='login'>Login</h1>
  
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
    

<?php
$msg="";
if(isset($_POST['submit']))
{
	$valid=validateUsers($_POST);
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
<h3 class="panel-title">Login</h3></div>
  
                  <div class="panel-body">
           
          <form name="loginform" id="loginform" method="post" action='#'>
    
                    <div class="form-body">
  
                         <div class="form-group">
  
                             <label for="uname">UserName</label>
 
<div class="input-group">
  
<span class="input-group-addon"><i class="icon-user"></i></span>
 
                            <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Username">
 
</div>             
              </div>
                         

                       <div class="form-group">
      
                        <label for="password">Password</label>
 
                             <div class="input-group">
                                 
<input type="password" class="form-control" id="password" name="password" placeholder="Password" >
        
                                                     
  </div>
                           </div>

                                 
                

  </div>
                      <div class="form-actions">
                         
  <input type="submit" class="btn green" name="submit" id="submit" value="Login">  
<input type="button" name="signup" id="signup" class="btn btn-default" value="Sign Up!" onclick="location='register.php'" /> 
                          
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
$( "#loginform" ).validate({
  rules: {
password:{
required:true
},
uname:{
required:true
}
  },
  messages:{
  uname:"Please Enter UserName",
  password:"Please Enter Password"
  }
});</script>