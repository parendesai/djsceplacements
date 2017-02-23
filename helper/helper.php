<?php 
	$deets = array('fname'=>"First Name",'lname'=>"Last Name",'email'=>"Email",'phone'=>"Phone Number",'ssc'=>"10th Standard", 'hsc'=>"12th Standard/ Diploma",'cgpa'=>"CGPA",'address'=>"Address", 'internships'=>"Internships", 'gender'=>"Gender", 'preflang'=>"Preferred Language", 'hscYear'=>"Year of Passing 12th/Diploma",'sscYear'=>"Year of Passing 10th", 'curBacklog'=>"Current Backlog",'pastBacklog'=>'History of Backlog', 'beper'=>"BE Percentage", "dob"=>'Date of Birth', 'mname'=>"Father's Name", 'qname'=>"Mother's Name", "sscName"=>'10th Institute Name', 'hscName'=>'12th/Diploma Institute Name', "addressa"=>"Address (Area)","addressc"=>"Address (City)", "addressp"=>"Pin Code", 'sscBoard'=>'10th Board', 'hscBoard'=>'12th/Diploma Board');	
	$priority = array('fname'=>0,'lname'=>1, 'mname'=>2, 'qname'=>3,'email'=>4,'phone'=>5,'cgpa'=>6,'beper'=>7,'curBacklog'=>8,'pastBacklog'=>9,'hsc'=>10,'hscName'=>11,'hscBoard'=>12,'hscYear'=>13,'ssc'=>14,'sscName'=>15,'sscBoard'=>16,'sscYear'=>17,'gender'=>18,"dob"=>19,'preflang'=>20,'address'=>21,'addressa'=>22,'addressc'=>23,'addressp'=>24,'internships'=>25);
	include 'env.php';
	include 'db.php';
	include 'getter.php';
	include 'setter.php';

	function convertCGPAtoPercentage($cgpa) {
		if($cgpa >= 7) $percentage = 7.4*$cgpa;
		else $percentage = 7.1*$cgpa;
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