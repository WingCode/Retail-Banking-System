<?php


include("config.php");
session_start();

$email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
$password=mysql_real_escape_string(md5($_POST["password"]));	
$sql= " SELECT NAME,TYPE FROM users WHERE EMAIL='$email' AND PASSWORD='$password' ";
$result=mysqli_query($db,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$name=$row['NAME'];
$type=$row['TYPE'];

//echo "$email $password   $type    $name";
$count=mysqli_num_rows($result);

if($count==1)
{   	
     $_SESSION['login_user'] = $name;
	 $_SESSION['type']= $type;
	 
	 if($type==0)
	 { echo "<script type='text/javascript'> document.location = 'index_user.html'; </script>";
      }
	
	else if($type==1)
	{ echo "<script type='text/javascript'> document.location = 'index_banker.html'; </script>";
     }
}

else
{ 
echo "<script type='text/javascript'> document.location = 'index.html'; </script>";
}

?>
