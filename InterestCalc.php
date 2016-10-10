<?php
 
   include('session.php');
   
 
    {
        
		$principal = filter_var($_POST['principal'],FILTER_SANITIZE_NUMBER_INT);
        $interest=filter_var($_POST['interest'],FILTER_SANITIZE_NUMBER_FLOAT);
		$days=$_POST['days'];
		$typ=1;
    $dd =1+(($interest/$typ)/100);
    $ci = $principal*pow($dd,$typ*$days);
    $amt = round($ci)*100/100;
    $ci = round($ci-$principal)*100/100;
	
	echo "<script type='text/javascript'> alert ('<?php echo $ci; ?>'); document.location = 'interestcalc.html'; </script>";
		
		
		
		
		
        
    }

?>