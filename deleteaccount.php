<?php
 
   include('session.php');
   
 
    
        $actno = filter_var($_POST['actno'],FILTER_SANITIZE_NUMBER_INT);
		
		//echo "$actno";
			
		$sql1= "SELECT acno FROM accounts WHERE acno='$actno' AND deleteable='1' ";	
        $result1=mysqli_query($db,$sql1);
		$row1=mysqli_fetch_array($result1);
		$count1=mysqli_num_rows($result1);
        if($count1<1)		
		echo "<script type='text/javascript'> alert('ACCOUNT CANT BE CLOSED!'); document.location = 'DeleteAccount.html'; </script>";
	
		else
		{
		$sql= "DELETE FROM accounts WHERE acno='$actno' AND deleteable='1' ";
        $result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result);
		$count=mysqli_num_rows($result);		
	    echo "<script type='text/javascript'> alert('Account Closed'); document.location = 'DeleteAccount.html'; </script>";
		}
?>