<?php 
require_once 'Classes/PHPExcel.php';
if($isAdmin){
	if($params[2] == "companies" && $params[3] == "closeoropen") {
		echo closeOrOpenCompany($_GET['company'], $_GET['status']);
	}

	if($params[2] == "companies" && $params[3] == "delete") {
		echo deleteCompany($_GET['company']);
	}

	if($params[2] == "companies" && $params[3] == "edit") {
		extract($_POST);
		echo editCompany($company, $name, htmlentities($descr, ENT_QUOTES), json_decode($fields), $mincgpa, $minssc, $minhsc);
	}

	if($params[2] == "company" && $params[3] == "create") {
		extract($_POST);
		$slug = createSlug($name);
	    $like = getSimilarSlugs($slug);
		if(count($like)>0) {$slug = $slug.'-'.(count($like)+1);}
		$comp = createCompany($slug, $name, htmlentities($descr, ENT_QUOTES), json_decode($fields), $mincgpa, $minssc, $minhsc);
		echo $comp['slug'];
	}

	if($params[2] == "company" && $params[3] == "generate") {
		$company = getCompany($_GET['company']);
		$fields = getRequiredFields($company['id']);
		
		$users = getRegistered($company['id']);
		$file = new PHPExcel();
		$file->getProperties()->setCreator($_SESSION['name'])
							->setLastModifiedBy($_SESSION['name'])
							->setTitle($company['name'].' - Responses');
		$file->setActiveSheetIndex(0)->setCellValue("A1", '#')
								->setCellValue("B1", 'SAPID');
		for ($i=0; $i < count($fields); $i++) { 
			$file->getActiveSheet()->setCellValue(chr(ord("A")+($i+2)).'1', $deets[$fields[$i]['userdetail']]);
		}
		$c=0;
		for ($i=0; $i < count($users); $i++) { 
			if($users[$i]['cgpa']>=$_GET['mincgpa'] && $users[$i]['ssc']>=$_GET['minssc'] && $users[$i]['hsc']>=$_GET['minhsc']){	
					$file->getActiveSheet()->setCellValue("A".($c+2), $c+1)
										->setCellValue("B".($c+2), $users[$i]['sap']);
					for ($j=0; $j < count($fields); $j++) { 
						$file->getActiveSheet()->setCellValue(chr(ord("A")+($j+2)).($c+2), $users[$i][$fields[$j]['userdetail']]);		
					}
					$c++;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($file, 'Excel2007');
		$objWriter->save('reports/'.$company['slug'].'-responses.xlsx');
		echo '/reports/'.$company['slug'].'-responses.xlsx';
	}

	if($params[2] == "company" && $params[3] == "notify") {
		$users = getActivatedUsers();
		$company = getCompany(null, $_GET['company']);
		
		$subject = "Registeration Link for ".$company['name'];
		$body = "<h1>".$company['name']."</h1><br />".html_entity_decode($company['descr'])."<br /><br /><br />Register at <a href='".$_SERVER['SERVER_NAME']."/register/".$company['slug']."'>".$_SERVER['SERVER_NAME']."/register/".$company['slug']."</a>";
		$ret = array();
		for ($i=0; $i < count($users); $i++) { 
			$ret[] = sendMail($users[$i]['email'], $users[$i]['fname']." ".$users[$i]['lname'], $subject, $body);
		}
		echo json_encode($ret);
	}

	if($params[2] == "users" && $params[3]=="makeadmin") {
		echo changeAdmin($_POST['sap']);
	}

	if($params[2] == "send" && $params[3]=="mail") {
		extract($_POST);
		$to = json_decode($to);
		$ret = array();
		for ($i=0; $i < count($to); $i++) {
			$user = getUser($to[$i]); 
			$ret[] = sendMail($user['email'], $user['fname']." ".$user['lname'], $subject, $message);
		}
		echo $ret;
	}

	if($params[2] == "mail" && $params[3]=="registered") {
		extract($_POST);
		$users = getRegistered($company);
		$ret = array();
		for ($i=0; $i < count($users); $i++) {
			$ret[] = sendMail($users[$i]['email'], $users[$i]['fname']." ".$users[$i]['lname'], $subject, $message);
		}
		print_r($ret);
	}




}
?>