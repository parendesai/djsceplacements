<?php 
  if (isset($params[1])) {
    $blog = getBlog(null,$params[2]);
    if($blog == -1) {
      $notfound = 2;  
    } else  if ($blog['approved']==1) {
        $show=1;
    }
  } else {
    $notfound = 1;
  }
?>
<?php if(isset($notfound)) { ?>
    Article Not Found
<?php } else {
  if($blog['approved']!=1) {
    if($isUser && $blog['sapid']==$_SESSION['sap']){
      $show = 2; ?>
      Article Not Approved
    <?php } else { ?>
      Article Not Found
    <?php } 
  } 
  if(isset($show)) {
    include 'post.php';
  }
} ?>