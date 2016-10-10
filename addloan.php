<?php
 
   include('session.php');
   
 
    {
        
		$accountnumber =filter_var($_POST['accountnumber'],FILTER_SANITIZE_NUMBER_INT);
		$principal = filter_var($_POST['principal'],FILTER_SANITIZE_NUMBER_INT);
        $interest=filter_var($_POST['interest'],FILTER_SANITIZE_NUMBER_FLOAT);
		$duedate=$_POST['duedate'];
		
		
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
		if($createddate>$duedate)
			echo "<script type='text/javascript'> alert('Enter VALID DUE DATE!!'); document.location = 'AddLoan.html'; </script>";
		
		$sql1= " SELECT loannumber FROM loans WHERE loannumber='$accountnumber' ";
        $result1=mysqli_query($db,$sql1);
		$row1=mysqli_fetch_array($result1);
		$count1=mysqli_num_rows($result1);
        if($count1>0)		
		echo "<script type='text/javascript'> alert('DUPLICATE ENTRY!!'); document.location = 'AddLoan.html'; </script>";
	

        else{
			
			
		$sql= " INSERT INTO loans VALUES('$accountnumber','$principal','$interest','$duedate','$createddate','$deleteable') ";
        $result=mysqli_query($db,$sql);
		
		if($result == FAlSE)
			echo "<script type='text/javascript'> alert('UNSUCESSFUL ENTRY!!'); document.location = 'AddLoan.html'; </script>";
		
		else
			echo "<script type='text/javascript'> alert('Loan Created'); document.location = 'AddLoan.html'; </script>";
		}
		
		
		
		
		
        
    }

?>