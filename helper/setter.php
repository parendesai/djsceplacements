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

	function editUser($sap, $phone, $email, $fname, $lname, $ssc, $hsc, $cgpa, $address, $internships, $gender, $lang) {
		global $cxn;
		$qry = "UPDATE `users` SET `phone` = '$phone', `email`='$email', `fname`='$fname', `lname`='$lname', `ssc`='$ssc', `hsc`='$hsc', `cgpa`='$cgpa', `address`='$address', `internships`='$internships',`updated`='1',`gender`='$gender', `preflang`='$lang' WHERE `sap` = '$sap'";
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
		return $qry;
	}

	function changeAdmin($sap) {
		global $cxn;
		$user = getUser($sap);
		$a = ($user['admin']+1)%2;
		$qry = "UPDATE `users` SET `admin` = '$a' WHERE `sap`='$sap'";
		$qry = $cxn->query($qry);
		return "done";
	}

?>