<?php 
	if($params[3] == "closeoropen") {
		echo closeOrOpenCompany($_POST['company'], $_POST['status']);
	}

	if($params[3] == "delete") {
		echo deleteCompany($_POST['company']);
	}

	if($params[3] == "edit") {
		extract($_POST);
		echo editCompany($company, $name, htmlentities($descr, ENT_QUOTES), json_decode($fields), $mincgpa, $minssc, $minhsc);
	}

	if($params[3] == "create") {
		extract($_POST);
		$slug = createSlug($name);
	    $like = getSimilarSlugs($slug);
		if(count($like)>0) {$slug = $slug.'-'.(count($like)+1);}
		$comp = createCompany($slug, $name, htmlentities($descr, ENT_QUOTES), json_decode($fields), $mincgpa, $minssc, $minhsc);
		echo $comp['slug'];
	}

	if($params[3] == "generate") {
		$company = getCompany($_POST['company']);
		$fields = getRequiredFields($company['id']);
		
		$users = getRegistered($company['id']);
		$file = new PHPExcel();
		$file->getProperties()->setCreator($_SESSION['name'])
							->setLastModifiedBy($_SESSION['name'])
							->setTitle($company['name'].' - Responses');
		$file->setActiveSheetIndex(0)->setCellValue("A1", '#')
								->setCellValue("B1", 'SAPID');
		$k=0;
		for ($i=0; $i < count($fields); $i++,$k++) { 
			$file->getActiveSheet()->setCellValue(chr(ord("A")+($k+2)).'1', $deets[$fields[$i]['userdetail']]);
			if($fields[$i]['userdetail'] == "hsc") {
				$file->getActiveSheet()->setCellValue(chr(ord("A")+($k+3)).'1', "Diploma Percentage");
				$k++;
			}
		}
		// $c=0;
		for ($i=0; $i < count($users); $i++) { 
			if($users[$i]['cgpa']>=$_POST['mincgpa'] && $users[$i]['ssc']>=$_POST['minssc'] && $users[$i]['hsc']>=$_POST['minhsc']){	
					$file->getActiveSheet()->setCellValue("A".($i+2), $i+1)
										->setCellValue("B".($i+2), $users[$i]['sap']);
					for ($j=0,$k=0; $j < count($fields); $j++,$k++) {
						if ($fields[$j]['userdetail']=="hsc") {
						 	if ($users[$i]['sap'][7]=="0") {
						 		$file->getActiveSheet()->setCellValue(chr(ord("A")+($k+2)).($i+2), $users[$i][$fields[$j]['userdetail']]);
						 	} else {
						 		$file->getActiveSheet()->setCellValue(chr(ord("A")+($k+3)).($i+2), $users[$i][$fields[$j]['userdetail']]);
						 	}
						 	$k++; 	
						} else {
							$file->getActiveSheet()->setCellValue(chr(ord("A")+($k+2)).($i+2), $users[$i][$fields[$j]['userdetail']]);
						}
					}
					// $c++;
			}
		}
		$objWriter = PHPExcel_IOFactory::createWriter($file, 'Excel2007');
		$objWriter->save('reports/'.$company['slug'].'-responses.xlsx');
		echo '/reports/'.$company['slug'].'-responses.xlsx';
	}

	if($params[3] == "notify") {
		$users = getActivatedUsers();
		$company = getCompany(null, $_POST['company']);
		
		$subject = "Registeration Link for ".$company['name'];
		$body = "<h1>".$company['name']."</h1><br />".html_entity_decode($company['descr'])."<br /><br /><br />Register at <a href='".$_SERVER['SERVER_NAME']."/register/".$company['slug']."'>".$_SERVER['SERVER_NAME']."/register/".$company['slug']."</a>";
		$ret = array();
		for ($i=0; $i < count($users); $i++) { 
			$ret[] = sendMail($users[$i]['email'], $users[$i]['fname']." ".$users[$i]['lname'], $subject, $body);
		}
		echo json_encode($ret);
	}
?>