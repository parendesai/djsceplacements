<?php 
	if(isset($params[2]) && $params[2]=="add") {
		$date = date('d/m/Y');
		$slug = createSlug($_POST['title']);
		$like = getSimilarSlugsBlog($slug);
		if(count($like)>0) {$slug = $slug.'-'.(count($like)+1);}
		addBlog($_POST['user'], $_POST['company'], htmlentities($_POST['title'], ENT_QUOTES), htmlentities($_POST['blog'], ENT_QUOTES), $date, $slug);
		echo "/experiences/article/".$slug;
	}
?>