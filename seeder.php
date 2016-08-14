<?php 
	include 'helper/env.php';	
	include 'helper/db.php';
	$saps = array();
	for ($i=60002130001; $i <= 60002130126; $i++) { 
		if($!=60002130060)
			$saps[] = $i;		
	}
	for ($i=60002148001; $i <= 60002148025; $i++) { 
		$saps[] = $i;		
	}
	
	// print_r($saps);
	for ($i=0; $i < count($saps); $i++) { 
		$sap = $saps[$i];
		$pass = md5($sap);
		$qry = "INSERT INTO `users` (`id`, `sap`, `password`, `fname`, `lname`, `ssc`, `hsc`, `cgpa`, `address`, `internships`, `email`, `phone`, `updated`, `admin`) VALUES (NULL, '$sap', '$pass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0', '0')";
		$qry = $cxn->query($qry);
		print_r($sap);
		echo "     ";
		print_r($qry);
		echo "<br />";
	}

	print_r("done");
?>