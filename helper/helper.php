<?php 
	$deets = array('fname'=>"First Name",'lname'=>"Last Name",'email'=>"Email",'phone'=>"Phone Number",'ssc'=>"10th Standard", 'hsc'=>"12th Standard/ Diploma",'cgpa'=>"CGPA",'address'=>"Address",'internships'=>"Internships", 'gender'=>"Gender", 'preflang'=>"Preferred Language", 'hscYear'=>"Year of Passing 12th/Diploma",'sscYear'=>"Year of Passing 10th",'curBacklog'=>"Current Backlog",'pastBacklog'=>'History of Backlog', 'beper'=>"BE Percentage", "dob"=>'Date of Birth');
	$priority = array('fname'=>0,'lname'=>1,'email'=>2,'phone'=>3,'cgpa'=>4,'beper'=>5,'curBacklog'=>6,'pastBacklog'=>7,'hsc'=>8,'hscYear'=>9,'ssc'=>10,'sscYear'=>11,'gender'=>12,"dob"=>13,'preflang'=>14,'address'=>15,'internships'=>16);
	include 'env.php';
	include 'db.php';
	include 'getter.php';
	include 'setter.php';

	function convertCGPAtoPercentage($cgpa) {
		if($cgpa >= 7) $percentage = 7.4*$cgpa;
		else $percentage = 7.2*$cgpa;
		return $percentage+12;
	}

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