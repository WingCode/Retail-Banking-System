<?php
 
   include('session.php');
   
 
    
        $loanno = filter_var($_POST['loanno'],FILTER_SANITIZE_NUMBER_INT);
		
		//echo "$actno";
			
		$sql1= "SELECT accountnumber FROM loans WHERE accountnumber='$loanno' AND deleteable='1' ";	
        $result1=mysqli_query($db,$sql1);
		$row1=mysqli_fetch_array($result1);
		$count1=mysqli_num_rows($result1);
        if($count1<1)		
		echo "<script type='text/javascript'> alert('LOAN CANT BE CLOSED!'); document.location = 'DeleteLoan.html'; </script>";
	
		else
		{
		$sql= "DELETE FROM loans WHERE accountnumber='$loanno' AND deleteable='1' ";
        $result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);		
	    echo "<script type='text/javascript'> alert('Loan Closed'); document.location = 'DeleteLoan.html'; </script>";
		}
?>