<?php
ob_start();
session_start();
include('db_connect.php'); 
function escape($data, $type='')
{
	switch($type)
	{
		case 'array': foreach($data as $k=>$v)
					  {
						$data[$k] = mysql_real_escape_string($v);
					  }
					  break;
		default	: $data = mysql_real_escape_string($data);   
	}
	return $data;
}

function fetch($data)
{
	while($res = mysql_fetch_array($data))	$res1[] = $res;
	return $res1;
}

function fetch_row($data)
{
	$res = mysql_fetch_assoc($data);
	return $res;
}
function assoc($data)
{
	$res1 = array();
	while($res = mysql_fetch_assoc($data))	$res1[] = $res;
	return $res1;
}
function checkAuthorisation()//to determine whether the user is logged in or not 
{
	if(!(isset($_SESSION['username'])))
	{
		header("location:index.php");
	}
	
}
function validateUsers($details)//to validate a user while logging in
{
	$details = escape($details, 'array');
	//echo "select Username,Person_ID from person where Username='".$details['uname']."' and Password ='".md5($details['password'])."'";
	$res = mysql_query("select Username,Person_ID,Is_Alumni,Is_Faculty,Is_Admin from person where Username='".$details['uname']."' and Password ='".md5($details['password'])."'")or die(mysql_error());  
	if(mysql_num_rows($res)==1)
	{

		$data = fetch_row($res);
		$_SESSION['username']=$data['Username'];
		$_SESSION['person_id']=$data['Person_ID'];
		$_SESSION['Is_Admin']=$data['Is_Admin'];
		$_SESSION['Is_Alumni']=$data['Is_Alumni'];
		$_SESSION['Is_Faculty']=$data['Is_Faculty'];
		header("Location:index.php");
		exit;
		
	}	
	else
		return 1;
}

function createUsers($details)
{
	$details = escape($details, 'array');
	$alumni_flag = 'N';
	$faculty_flag = 'N';
	$admin_flag = 'N';
	
	if ($details['mindept'] == '0'){
	   $mindept_temp = 'NULL';
	   
	 }
	 else{
	   $mindept_temp = $details['mindept'];
	 }
	if ($details['type'] == 'alumni'){
	   $alumni_flag = '1';
	   }
	if ($details['type'] == 'faculty'){
	   $faculty_flag = '1';
	   }
	if ($details['type'] == 'admin'){
	   $admin_flag = '1';
	   }
	//*** Start Transaction ***//
	mysql_query("BEGIN");
	$res=mysql_query("insert into person (username,email_address,password,first_name,middle_name,last_name,address_line1,address_line2,city,state,zip,mobile_number,is_alumni,is_faculty,is_admin) 
	values ('".$details['uname']."', '".$details['email']."','".md5($details['password'])."','".$details['firstname']."','".$details['middlename']."','".$details['lastname']."','".$details['addrline1']."','".$details['addrline2']."','".$details['city']."','".$details['state']."','".$details['zip']."','".$details['mnumber']."','".$alumni_flag."','".$faculty_flag."','".$admin_flag."')") ;
	$person_id = mysql_insert_id();
	if ($details['type'] == 'alumni'){
	$res1=mysql_query("insert into alumni (person_id,academic_degree,major_department_id,minor_department_id,major_advisor,graduation_year,linked_in_url,facebook_url,twitter_url) 
	values ('".$person_id."', '".$details['degree']."','".$details['majdept']."',".$mindept_temp.",'".$details['advisor']."','".$details['gradyear']."','".$details['linkedin']."','".$details['facebook']."','".$details['twitter']."')") ;
	}
	if ($details['type'] == 'faculty'){
	$res1=mysql_query("insert into faculty (person_id,department_id,designation,office_address,personal_website)
	values ('".$person_id."', '".$details['facdept']."','".$details['facultydesig']."','".$details['facultyaddr']."','".$details['facultysite']."')");
	}
	if ($details['type'] == 'admin'){
	$res1=mysql_query("insert into alumni_admin (person_id,designation,office_address)
	values ('".$person_id."', '".$details['admindesig']."','".$details['adminaddr']."')");
	}
	if(($res) and ($res1))
	{
	//**Commit **//
	mysql_query("COMMIT");
	return 1;
	}
	else{
	// ** Rollback transaction **//
	mysql_query("ROLLBACK");
	return 0;
	}
	
}

function fetchphotos()
{

	$photos=mysql_query("select * from gallery");
	$photos=assoc($photos);
	return $photos;
}

function uploadphoto($details,$files)
{
	$details = escape($details, 'array');
	$location="photos/gallery";	
	$tmp=$_FILES['photo']['tmp_name'];
	$name=mt_rand();
	$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
	move_uploaded_file($tmp,$location."/".$name.'.'.$ext);
	$res=mysql_query("insert into gallery (User_ID,Photo_Name,Photo_Description) values ('".$_SESSION['person_id']."', '".$name.'.'.$ext."','".$details['photodesc']."')")or die(mysql_error());
	$_SESSION['message']="Photo is added to gallery Successfully!!!!!";
	header('location:gallery.php');
}

function getevents()
{

	$events=mysql_query("select * from event");
	$events=assoc($events);
	return $events;
}

function addevent($details)
{
	$details = escape($details, 'array');
	$res=mysql_query("insert into event (Event_Description,Event_Start_time,Event_End_Time,Event_Title,Person_ID) values ('".$details['eventdesc']."', '".$details['start_date']."','".$details['end_date']."','".$details['ename']."','".$_SESSION['person_id']."')")or die(mysql_error());
	$_SESSION['message']="Event is added Successfully!!!!!";
	header('location:events.php');
}

function eventdetails($details)
{
    $res=mysql_query("select * from event where Event_ID=".$details);
	return fetch_row($res);
}

function eventflag($details)
{
	$res=mysql_query("select * from alumni_event where Event_ID=".$details." and Student_ID=".$_SESSION['person_id']);
	if(mysql_num_rows($res)==1)
	{
		return 1;
		
	}else return 0;
}

function editevent($details,$id)
{
	$details = escape($details, 'array');
	$res=mysql_query("update event set Event_Description='".$details['eventdesc']."', Event_Start_time='".$details['start_date']."',Event_End_Time='".$details['end_date']."',Event_Title='".$details['ename']."',Person_ID='".$_SESSION['person_id']."' where Event_ID=".$id)or die(mysql_error());
	$_SESSION['message']="Event is Edited Successfully!!!!!";
	header('location:events.php');
}

function registerevent($eventid)
{
	$res=mysql_query("insert into alumni_event(Event_ID,Student_ID) values ('".$eventid."','".$_SESSION['person_id']."')")or die(mysql_error());
	$_SESSION['message']="You have registered Successfully!!!!!";
	header('location:event_desc.php?event_id='.$eventid);
}

function getpersondetails()
{
	$res=mysql_query('select * from person where Person_ID='.$_SESSION['person_id']);
	$result[]=array();
	$result[0]=fetch_row($res);
	if($_SESSION['Is_Admin']==1)
	{
			$res=mysql_query('select * from alumni_admin where Person_ID='.$_SESSION['person_id']);

	}else if($_SESSION['Is_Alumni']==1)
	{
			$res=mysql_query('select * from alumni_info as ai where ai.person_id ='.$_SESSION['person_id']);

	}else if($_SESSION['Is_Faculty']==1)
	{
			$res=mysql_query('select p.*,d.Department_Name from faculty as p join department as d on p.Department_ID=d.Department_ID where Person_ID='.$_SESSION['person_id']);

	}
		$result[1]=fetch_row($res);
		return $result;
}

function getdepartments()
{
		$res=mysql_query('select * from department');
		if(mysql_num_rows($res)>0)
		{
		$dept=assoc($res);
		return $dept;
		}
}
function getsport()
{
		$res=mysql_query('select * from sport_club');
		if(mysql_num_rows($res)>0)
		{
		$dept=assoc($res);
		return $dept;
		}
}
function getcom()
{
		$res=mysql_query('select * from committee');
		if(mysql_num_rows($res)>0)
		{
		$dept=assoc($res);
		return $dept;
		}
}

function editprofile($details)
{
	$details = escape($details, 'array');
	if($_FILES['photo']['tmp_name']!='')
	{
		$location="photos/profile";	
		$tmp=$_FILES['photo']['tmp_name'];
		$name=mt_rand();
		$ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		move_uploaded_file($tmp,$location."/".$name.'.'.$ext);
		$photo=$name.'.'.$ext;
	}else
	{
		$photo=$_POST['prof'];
	}
	if ($details['mindept'] == '0')
	{
	 	 $mindept_temp = 'NULL';
	}else
	{
		$mindept_temp = $details['mindept'];
	}
	$res=mysql_query("update person  set username='".$details['uname']."', email_address='".$details['email']."',first_name='".$details['firstname']."',middle_name='".$details['middlename']."',last_name='".$details['lastname']."',address_line1='".$details['addrline1']."',address_line2='".$details['addrline2']."',city='".$details['city']."',state='".$details['state']."',zip='".$details['zip']."',mobile_number='".$details['mnumber']."',Photo='".$photo."' where Person_ID=".$_SESSION['person_id']) or die(mysql_error());
	if ($_SESSION['Is_Alumni'] == '1'){
	$res=mysql_query("update alumni set academic_degree='".$details['degree']."',major_department_id='".$details['majdept']."',minor_department_id=".$mindept_temp.",major_advisor='".$details['advisor']."',graduation_year='".$details['gradyear']."',linked_in_url='".$details['linkedin']."',facebook_url='".$details['facebook']."',twitter_url='".$details['twitter']."' where Person_ID=".$_SESSION['person_id']) or die(mysql_error());
	}
	if ($_SESSION['Is_Faculty'] == '1'){
	$res=mysql_query("update faculty set department_id='".$details['facdept']."',designation='".$details['facultydesig']."',office_address='".$details['facultyaddr']."',personal_website='".$details['facultysite']."' where Person_ID=".$_SESSION['person_id']) or die(mysql_error());
	}
	if ($_SESSION['Is_Admin'] == '1'){
	$res=mysql_query("update alumni_admin set designation='".$details['admindesig']."',office_address='".$details['adminaddr']."' where Person_ID=".$_SESSION['person_id']) or die(mysql_error());
	}
	$_SESSION['message']="Profile changes saved Successfully!!!!!";
	header('location:edit_profile.php');
}

function donate($details)
{
	$details = escape($details, 'array'); 
	if($details['donateto']=='other')
	$donateto=$details['other'];
	else
	$donateto=$details['donateto'];
	$res=mysql_query("insert into fundraising (person_ID,contribution_year,contribution_amount,contribution_purpose) values (".$_SESSION['person_id'].",'".date('y')."','".$details['amt']."','".$donateto."')") or die(mysql_error());
	$res=mysql_query('select Fundraising_contribution from alumni where person_ID='.$_SESSION['person_id']);
	if(mysql_num_rows($res)>0)
	{
		$fund=fetch_row($res);
	}
	$fund=$fund['Fundraising_contribution']+$details['amt'];
	$res=mysql_query("update alumni set Fundraising_contribution=".$fund);
	$_SESSION['message']="Hurray you made a donation to college!!!!!!";
	header('location:donate.php');
}

function getdetails()
{
	$res=mysql_query("select p.*,ai.* from alumni_info as ai join person as p on p.Person_ID=ai.Person_ID and p.Person_ID!=".$_SESSION['person_id']);
	if(mysql_num_rows($res)>0)
	{
		$details=assoc($res);
		return $details;
	}
	else return 0;
}

function getperdetails($id)
{
$res=mysql_query('select * from person where Person_ID='.$id);
	$result[]=array();
	$result[0]=fetch_row($res);
	$res=mysql_query('select * from alumni_info as ai where ai.person_id ='.$id);
	$result[1]=fetch_row($res);
	return $result;
}

function getdonations($no)
{
	if($no==1)
	{
		$res=mysql_query('select p.Username,f.* from fundraising as f,person as p where p.Person_ID='.$_SESSION['person_id'].' and p.Person_ID=f.Person_ID');
	}else
	{
		$res=mysql_query('select p.Username,f.* from fundraising as f, person as p where p.Person_ID=f.Person_ID');
	}
	if(mysql_num_rows($res)>0)
	{
	$details=assoc($res);
		return $details;
		}
	else return 0;
}

function getcomments($id)
{
	$res=mysql_query('select p.*,pe.Photo,pe.First_Name,pe.Last_Name from personal_comments p join person pe on pe.Person_ID=p.Faculty_Person_ID where p.Alumni_Person_ID='.$id);
	if(mysql_num_rows($res)>0)
	{
	$details=assoc($res);
		return $details;
		}
	else return 0;
}

function addcomment($details)
{
	$details = escape($details, 'array'); 
	$res=mysql_query('insert into personal_comments (Alumni_Person_ID,Faculty_Person_ID,Comment_Desciption) values("'.$details['alumni_id'].'","'.$_SESSION['person_id'].'","'.$details['message'].'")')or die(mysql_error());
	$_SESSION['message']="Commented Successfully!!!!!!";
    header('location:view_profile.php?id='.$details['alumni_id']);

}
?>