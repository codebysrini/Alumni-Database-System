<?php  
include('includes/functions.php'); 
if(isset($_POST['data']))
{
$tag=$_POST['data'];
$query=mysql_query("select * from person where Username='".$tag."'");
		if(mysql_num_rows($query)>0)
		{
if(isset($_SESSION['username'])&&$_SESSION['username']==$tag){
echo 1;exit;}else{
			echo 0; exit;}
		}else
		{
			echo 1; exit;
		}
		}
		else
		{
			$query=mysql_query("select p.Person_ID,p.Username,p.First_Name,p.Last_Name,a.Graduation_year,p.Photo from person as p join alumni as a on p.Person_ID=a.Person_ID where p.Is_Alumni=1 and p.Person_ID!=".$_SESSION['person_id']." and ".$_POST['searchwith']." like '%".$_POST['searchfor']."%'");
			if(mysql_num_rows($query)>0)
		{
			$details=assoc($query);
			/* echo "<pre>";
			print_r($details);
			exit; */
			$row='';
			$count=1;
						   foreach($details as $d)
						   {
                         $row.='<tr><td>'.$count.'</td><td><div class="user-image">';
						 if($d['Photo']!='') $photo='photos/profile/'.$d['Photo']; else $photo='noimage.jpg';
						 $row.='<a href="view_profile.php?id='.$d['Person_ID'].'"><img src="'.$photo.'" alt="profile pic" class="myimg" width="80" height="85" /></div></td><td>'.$d['Username'].'</td><td>'.$d['First_Name'].' '.$d['Last_Name'].'</td><td>'.$d['Graduation_year'].'</td></tr>';
							$count++;
							}
									}
									else
									{
									$row='<tr><td colspan="5" align="center"><h4>No records found.</h4></td></tr>';
									
									}
			echo $row;
			exit;
		}
		?>