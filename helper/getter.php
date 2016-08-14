<?php

	function getAllCompanies() {
		global $cxn;
		$qry = "SELECT * FROM `event` WHERE `deleted`='0'";
		$qry = $cxn->query($qry);
		$return = array();
		while ($row = $qry->fetch_assoc()){
	    	$return[] = $row;
	  	}
	  	return $return;
	}

	function getCompany($id=null, $slug=null) {
		global $cxn;
		if(isset($id))
			$qry = "SELECT * FROM `event` WHERE `deleted`='0' AND `id`='$id'";
		else if(isset($slug))
			$qry = "SELECT * FROM `event` WHERE `deleted`='0' AND `slug`='$slug'";
		else return -1;
		$qry = $cxn->query($qry);
		if($qry->num_rows==0) return -1;
		return $qry->fetch_assoc();
	}

	function getRequiredFields($id=null) {
		global $cxn, $priority;
		if(isset($id)){
			$q = "SELECT * FROM `companydetails` WHERE `companyid`='$id'";
		    $q = $cxn->query($q);
		    $userdetails = array();
		    while ($row = $q->fetch_assoc()){
		        $userdetails[] = $row;
		        $userdetails[count($userdetails)-1]['priority'] = $priority[$row['userdetail']];
    		}
    		usort($userdetails, function($a, $b) {
		        return $a['priority'] - $b['priority'];
		    });
		    return array_values($userdetails);
		}
		return -1;
	}

	function getUser($sap) {
		global $cxn;
		$user = "SELECT * FROM `users` WHERE `sap`='$sap'";
		$user = $cxn->query($user);
		if($user->num_rows==0) return -1;
		return $user->fetch_assoc();
	}

	function getActivatedUsers() {
		global $cxn;
		$qry = "SELECT * FROM `users` WHERE `updated`='1'";
		$qry = $cxn->query($qry);
		$users = array();
		while($row = $qry->fetch_assoc()) {
			$users[] = $row;
		}
		return $users;
	}

	function getRegistered($cid) {
		global $cxn;
		$qry = "SELECT * FROM `users` WHERE `sap`in (SELECT `sapid` FROM `companyuser` WHERE `companyid`='$cid')";
		$qry = $cxn->query($qry);
		$users = array();
		while($row = $qry->fetch_assoc()) {
			$users[] = $row;
		}
		return $users;

	}

	function getSimilarSlugs($slug) {
		global $cxn;
		$like = $slug.'%';
		$qry = "SELECT * FROM `event` WHERE `slug` LIKE '$like'";
		$qry = $cxn->query($qry);
		$like = array();
		while($row = $qry->fetch_assoc()) {
			$like[] = $row;
		}
		return $like;
	}

	function getSimilarSlugsBlog($slug) {
		global $cxn;
		$like = $slug.'%';
		$qry = "SELECT * FROM `event` WHERE `slug` LIKE '$like'";
		$qry = $cxn->query($qry);
		$like = array();
		while($row = $qry->fetch_assoc()) {
			$like[] = $row;
		}
		return $like;
	}

	function getAllUsers() {
		global $cxn;
		$users = getActivatedUsers();
		$qry = "SELECT * FROM `users` WHERE `updated`='0'";
		$qry = $cxn->query($qry);
		while($row = $qry->fetch_assoc()) {
			$users[] = $row;
		}
		return $users;
	}

	function getUpdates($cid) {
		global $cxn;
		$updates = array();
		$qry = "SELECT * FROM `updates` WHERE `cid`='$cid'";
		$qry = $cxn->query($qry);
		while($row = $qry->fetch_assoc()) {
			$updates[] = $row;
		}
		return $updates;
	}

	function getQuery($id) {
		global $cxn;
		$qry = "SELECT * FROM `queries` WHERE `id`='$id'";
		return $cxn->query($qry)->fetch_assoc();
	}

	function getMyUnansweredQueires($sap, $cid) {
		global $cxn;
		$qry = "SELECT * FROM `queries` WHERE `answered`='0' AND `sapid` = '$sap' AND `cid` = '$cid'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;
	}

	function getMyPrivateQueires($sap, $cid) {
		global $cxn;
		$qry = "SELECT * FROM `queries` WHERE `answered`='2' AND `sapid` = '$sap' AND `cid` = '$cid'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;
	}


	function getAnsweredQueries($cid) {
		global $cxn;
		$qry = "SELECT * FROM `queries` WHERE `answered`='1' AND `cid` = '$cid'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;	
	}

	function getAllUnansweredQueries($cid) {
		global $cxn;
		$qry = "SELECT * FROM `queries` WHERE `answered`='0' AND `cid` = '$cid'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;	
	}

	function getAllQueriesAdmin($cid) {
		global $cxn;
		$ret = getAnsweredQueries($cid);
		$qry = "SELECT * FROM `queries` WHERE `answered`='2' AND `cid` = '$cid'";
		$qry = $cxn->query($qry);
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;
	}

	function getAllMyQueries($sap) {
		global $cxn;
		$qry = "SELECT * FROM `queries`, `event` WHERE `queries`.`cid` = `event`.`id` AND `queries`.`sapid` ='$sap'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;

	}

	function getBlog($id=null, $slug=null) {
		global $cxn;
		if(isset($id))
			$qry = "SELECT * FROM `blog` WHERE `id`='$id'";
		else if(isset($slug))
			$qry = "SELECT * FROM `blog` WHERE `slug`='$slug'";
		else return -1;
		$qry = $cxn->query($qry);
		if($qry->num_rows==0) return -1;
		return $qry->fetch_assoc();
	}

	function getBlogCount($cid=null, $sapid=null) {
		global $cxn;
		if(isset($cid)) $qry = "SELECT COUNT(*) FROM `blog` WHERE `cid`='$cid' AND `approved`='1' ORDER BY `id` DESC ";
		else if(isset($sapid)) $qry = "SELECT COUNT(*) FROM `blog` WHERE `sapid`='$sapid' AND `approved`='1' ORDER BY `id` DESC ";
		else $qry = "SELECT COUNT(*) FROM `blog` WHERE `approved`='1' ORDER BY `id` DESC ";
		$qry = $cxn->query($qry);
		return $qry->fetch_assoc()['COUNT(*)'];
	}

	function getBlogs($page, $cid=null, $sapid=null) {
		global $cxn;
		$start = ($page-1)*3;
		$size = 3;
		if(isset($cid)) $qry = "SELECT * FROM `blog` WHERE `cid`='$cid' AND `approved`='1' ORDER BY `id` DESC LIMIT ".$start.", ".$size;
		else if(isset($sapid)) $qry = "SELECT * FROM `blog` WHERE `sapid`='$sapid' AND `approved`='1' ORDER BY `id` DESC LIMIT ".$start.", ".$size;
		else $qry = "SELECT * FROM `blog` WHERE `approved`='1' ORDER BY `id` DESC LIMIT ".$start.", ".$size;
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;

	}

	function getUnansweredBlogsCount() {
		global $cxn;
		$qry = "SELECT COUNT(*) FROM `blog` WHERE `approved`='0'";
		$qry = $cxn->query($qry);
		return $qry->fetch_assoc()['COUNT(*)'];
	}

	function getUnapprovedBlogs(){
		global $cxn;
		$qry = "SELECT * FROM `blog` WHERE `approved`='0'";
		$qry = $cxn->query($qry);
		$ret = array();
		while($row = $qry->fetch_assoc()) {
			$ret[] = $row;
		}
		return $ret;
	}

	function getUnansweredQueriesCount() {
		global $cxn;
		$qry = "SELECT COUNT(*) FROM `queries` WHERE `answered`='0'";
		$qry = $cxn->query($qry);
		return $qry->fetch_assoc()['COUNT(*)'];
	}




?>