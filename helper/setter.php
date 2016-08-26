<?php 
	function createCompany($slug, $name, $descr, $details, $mincgpa, $minssc, $minhsc) {
		global $cxn;
		$qry = "INSERT INTO `event` (`id`, `slug`, `name`, `open`, `deleted`, `descr`, `mincgpa`, `minssc`, `minhsc`) VALUES (NULL, '$slug', '$name', 'open', '0', '$descr', '$mincgpa', '$minssc', '$minhsc')";
		$qry = $cxn->query($qry);
		$comp = getCompany(null, $slug);
		$id = $comp['id'];
		for($i =0; $i < count($details); $i++) {
			$in = $details[$i];
			$qry = "INSERT INTO `companydetails` (`id`,`companyid`,`userdetail`) VALUES (NULL, '$id', '$in')";
			$qry = $cxn->query($qry);
		}
		return $comp;
	}

	function deleteCompany($id) {
		global $cxn;
		$qry = "UPDATE `event` SET `deleted` = '1' WHERE `id` = '$id'";
		$qry = $cxn->query($qry);
		return 1;
	}

	function editCompany($slug, $name, $descr, $fields, $mincgpa, $minssc, $minhsc) {
		global $cxn;
		$qry = "UPDATE `event` SET `name` = '$name', `descr`='$descr' , `mincgpa`='$mincgpa', `minssc`='$minssc', `minhsc`='$minhsc' WHERE `slug` = '$slug'";
		$company = getCompany(null, $slug);
		$id = $company['id'];
		$qry = $cxn->query($qry);
		$qry = "DELETE FROM `companydetails` WHERE `companyid`='$id'";
		$qry = $cxn->query($qry);
		$fields = $fields;
		for($i =0; $i < count($fields); $i++) {
			$in = $fields[$i];
			$qry = "INSERT INTO `companydetails` (`id`,`companyid`,`userdetail`) VALUES (NULL, '$id', '$in')";
			$qry = $cxn->query($qry);
		}
		return 1;
	}

	function closeOrOpenCompany($id, $status) {
		global $cxn;
		if($status=="open") {$set = "close";} else{$set="open";}
		$qry = "UPDATE `event` SET `open` = '$set' WHERE `id` = '$id'";
		$qry = $cxn->query($qry);
		return $set;
	}

	function editUser($sap, $phone, $email, $fname, $lname, $ssc, $hsc, $cgpa, $address, $internships, $gender, $lang, $sscYear, $hscYear, $curBacklog, $pastBacklog, $dob) {
		global $cxn;
		$beper = convertCGPAtoPercentage($cgpa);
		$qry = "UPDATE `users` SET `phone` = '$phone', `email`='$email', `fname`='$fname', `lname`='$lname', `ssc`='$ssc', `hsc`='$hsc', `cgpa`='$cgpa', `address`='$address', `internships`='$internships',`updated`='1',`gender`='$gender', `preflang`='$lang',`sscYear`='$sscYear', `hscYear`='$hscYear', `curBacklog`='$curBacklog', `pastBacklog`='$pastBacklog', `beper`='$beper', `dob`='$dob' WHERE `sap` = '$sap'";
		$qry = $cxn->query($qry);
		$user = getUser($sap);
		if(isset($_SESSION['usap'])) { 
			unset($_SESSION['usap']);
			$_SESSION['sap'] = $sap;
			$_SESSION['name'] = $user['fname']." ".$user['lname'];
			if($user['admin'] == 1){
				$_SESSION['admin']=1;
			}
		}
		return $user;
	}

	function changePassword($sap, $password, $newpassword) {
		global $cxn;
		$user = getUser($sap);
		if(md5($password) == $user['password']) {
			$q = $qry = "UPDATE `users` SET `password` = '$newpassword' WHERE `sap` = '$sap'";
			$q = $cxn->query($q);
			return "true";
		} else {
			return "false";	
		}
	}

	function registerUser($cid, $sap, $status) {
		global $cxn;
		if($status=="insert") {
			$qry = "INSERT INTO `companyuser` (`companyid`, `sapid`) VALUES ('$cid', '$sap');";
		} else {
			$qry = "DELETE FROM `companyuser` WHERE `companyid` = '$cid' AND `sapid` = '$sap'";
		}
		$q = $cxn->query($qry);
		return $q;
	}

	function changeAdmin($sap) {
		global $cxn;
		$user = getUser($sap);
		$a = ($user['admin']+1)%2;
		$qry = "UPDATE `users` SET `admin` = '$a' WHERE `sap`='$sap'";
		$qry = $cxn->query($qry);
		return "done";
	}

	function resetPassword($sap) {
		global $cxn;
		$pass = md5($sap);
		$qry = "UPDATE `users` SET `password` = '$pass' WHERE `sap`='$sap'";
		// return $qry;
		$qry = $cxn->query($qry);
		return "done";
	}

	function addUser($sap) {
		global $cxn;
		$pass = md5($sap);
		$qry = "INSERT INTO `users` (`id`, `sap`, `password`, `fname`, `lname`, `ssc`, `hsc`, `cgpa`, `address`, `internships`, `email`, `phone`, `updated`, `admin`) VALUES (NULL, '$sap', '$pass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '0', '0')";
		$qry = $cxn->query($qry);
		return "done";
	}

	function addUpdate($cid, $descr, $date) {
		global $cxn;
		$qry = "INSERT INTO `updates` (`id`, `cid`, `date`, `updts`) VALUES (NULL, '$cid', '$date', '$descr')";
		$qry = $cxn->query($qry);
		return $qry;
	}

	function deleteUpdate($id) {
		global $cxn;
		$qry = "DELETE FROM `updates` WHERE `id`='$id'";
		$qry = $cxn->query($qry);
		return $qry;
	}

	function editUpdate($id, $descr) {
		global $cxn;
		$qry = "UPDATE `updates` SET `updts`='$descr' WHERE `id`='$id'";
		$qry = $cxn->query($qry);
		return $qry;
	}

	function addQuery($sap, $cid, $querytext) {
		global $cxn;
		$qry = "INSERT INTO `queries` (`id`, `answered`, `cid`, `sapid`, `answer`, `querytext`) VALUES (NULL, '0', '$cid', '$sap', NULL, '$querytext')";
		return $cxn->query($qry);
	}

	function editQuery($id, $querytext, $answer, $answered) {
		global $cxn;
		$qry = "UPDATE `queries` SET `querytext`='$querytext', `answer`='$answer', `answered`='$answered' WHERE `id`='$id'";
		return $cxn->query($qry);
	}

	function deleteQuery($id) {
		global $cxn;
		$qry = "DELETE FROM `queries` WHERE `id`='$id'";
		$qry = $cxn->query($qry);
		return $qry;
	}

	function addBlog($user, $company, $title, $blog, $date, $slug) {
		global $cxn;
		$qry = "INSERT INTO `blog` (`id`, `slug`, `cid`, `sapid`, `title`, `date`, `blog`, `approved`) VALUES (NULL, '$slug', '$company', '$user', '$title', '$date', '$blog', '0')";
		$qry = $cxn->query($qry);
		return $qry;

	}

	function approveBlog($id) {
		global $cxn;
		$qry = "UPDATE `blog` SET `approved`='1' WHERE `id`='$id'";
		return $cxn->query($qry);
	}

	function disapproveBlog($id) {
		global $cxn;
		$qry = "UPDATE `blog` SET `approved`='2' WHERE `id`='$id'";
		return $cxn->query($qry);
	}


?>