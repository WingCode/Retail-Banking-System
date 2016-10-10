<?php
 
   include('session.php');
   
 
    {
        $firstname = mysql_real_escape_string(strtoupper($_POST['firstname']));
		$lastname = mysql_real_escape_string(strtoupper($_POST['lastname']));
		$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
		$mobilenumber =filter_var($_POST['mobilenumber'],FILTER_SANITIZE_NUMBER_INT);
		$principal = filter_var($_POST['principal'],FILTER_SANITIZE_NUMBER_INT);
        $interest=filter_var($_POST['interest'],FILTER_SANITIZE_NUMBER_FLOAT);
		$bday=$_POST['bday'];
		
		
		$now = time();
        $num = date("w");
        if ($num == 0)
        { $sub = 6; }
        else { $sub = ($num-1); }
        $WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    
        $todayh = getdate($WeekMon); 
 
        $d = $todayh['mday'];
        $m = $todayh['mon'];
		if($m<10)
		{$m='0'.$m;}
		if($d<10)
		{$d='0'.$d;}	
        $y = $todayh['year'];

		$createddate=$y.'-'.$m.'-'.$d;
		$acno=$y.$m.$d+mt_rand(1, 2147483647);
		$deleteable=0;
		//echo "$firstname $lastname $email $mobilenumber $principal $bday $interest $createddate $acno $deleteable";
		
		if($createddate<$bday)
			echo "<script type='text/javascript'> alert('Enter VALID BIRTH DATE!!'); document.location = 'AddAccount.html'; </script>";
		else{
		$sql1= " SELECT firstname,lastname FROM accounts WHERE firstname='$firstname' AND lastname='$lastname' ";
        $result1=mysqli_query($db,$sql1);
		$row1=mysqli_fetch_array($result1);
		$count1=mysqli_num_rows($result1);
        if($count1>0)		
		echo "<script type='text/javascript'> alert('DUPLICATE ENTRY!!'); document.location = 'AddAccount.html'; </script>";
	

        else{
			
			
		$sql= " INSERT INTO accounts VALUES('$firstname','$lastname','$email','$mobilenumber','$principal','$interest','$bday','$createddate','$acno','$deleteable') ";
        $result=mysqli_query($db,$sql);
		
		if($result == FAlSE)
			echo "<script type='text/javascript'> alert('UNSUCESSFUL ENTRY!!'); document.location = 'AddAccount.html'; </script>";
		
		else
			echo "<script type='text/javascript'> alert('Account Created'); document.location = 'AddAccount.html'; </script>";
		}
		
		}
		
		
		
        
    }

?>