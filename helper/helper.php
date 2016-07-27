<?php 
	$deets = array('fname'=>"First Name",'lname'=>"Last Name",'email'=>"Email",'phone'=>"Phone Number",'ssc'=>"10th Standard", 'hsc'=>"12th Standard/ Diploma",'cgpa'=>"CGPA",'address'=>"Address",'internships'=>"Internships", 'gender'=>"Gender", 'preflang'=>"Preferred Language");
	$priority = array('fname'=>0,'lname'=>1,'email'=>2,'phone'=>3,'ssc'=>4, 'hsc'=>5,'cgpa'=>6,'gender'=>7, 'preflang'=>8,'address'=>9,'internships'=>10);
	include 'env.php';
	include 'db.php';
	include 'getter.php';
	include 'setter.php';

	function createSlug($name) {
		$lettersNumbersSpacesHyphens = '/[^\-\s\pN\pL]+/u';
	    $spacesDuplicateHypens = '/[\-\s]+/';
	    $slug = preg_replace($lettersNumbersSpacesHyphens, '', $name);
	    $slug = preg_replace($spacesDuplicateHypens, '-', $slug);
	    $slug = trim($slug, '-');
	    $slug = mb_strtolower($slug, 'UTF-8');
	    return $slug;
	}

	function isRegistered($sap,$cid) {
		global $cxn;
		$reg = "SELECT * FROM `companyuser` WHERE `sapid`='$sap' AND `companyid`='$cid'";
		$reg = $cxn->query($reg);
		if($reg->num_rows == 0) {
			return 0;
		} else {
			return 1;
		}
	}
		
?>