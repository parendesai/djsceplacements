<?php 
	include 'helper/env.php';	
	include 'helper/db.php';
	$saps = array();
	for ($i=60004130002; $i < 60004130064; $i++) { 
		if($i != 60004130006 && $i != 60004130008 && $i != 60004130015){
			$saps[] = $i;
		}
	}
	$saps[] = 60004130066;
	$saps[] = 60004130071;
	$saps[] = 60004148001;
	$saps[] = 60004148002;
	$saps[] = 60004148006;
	$saps[] = 60004148007;
	$saps[] = 60004148008;
	$saps[] = 60004148010;
	$saps[] = 60004148011;
	$saps[] = 60004148013;
	$saps[] = 60004148015;
	$saps[] = 60004148016;
	$saps[] = 60004148018;
	$saps[] = 60004148022;
	$saps[] = 60004148023;
	$saps[] = 60004130006;
	$saps[] = 60004130008;
	$saps[] = 60004130015;
	for ($i=60004130064; $i < 60004130127; $i++) { 
		$saps[] = $i;
	}
	$saps[] = 60004148003; 
	$saps[] = 60004148004;
	$saps[] = 60004148005;
	$saps[] = 60004148009;
	$saps[] = 60004148012;
	$saps[] = 60004148014;
	$saps[] = 60004148017;
	$saps[] = 60004148019;
	$saps[] = 60004148020;
	$saps[] = 60004148021;
	$saps[] = 60004148024;
	$saps[] = 60004148025;

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