<?php 
  $admin = !isset($params[1]); 
  $create = isset($params[1]) && isset($params[2]) && $params[1]=="company" && $params[2]=='create';
  $view = isset($params[1]) && isset($params[2]) && $params[1]=="company" && $params[2]=='view';
  $stud = isset($params[1]) && isset($params[2]) && $params[1]=="view" && $params[2]=='all';
  $indiv = isset($params[1]) && isset($params[2]) && $params[1]=="view" && $params[2]=='company';
  $email = isset($params[1]) && isset($params[2]) && $params[1]=="send" && $params[2]=='email';
  $update = isset($params[1]) && isset($params[2]) && $params[1]=="view" && $params[2]=='updates';
  $query = isset($params[1]) && isset($params[2]) && $params[1]=="view" && $params[2]=='queries';
  $blogs = isset($params[1]) && isset($params[2]) && $params[1]=="view" && $params[2]=='blogs';
  $blogCount = getUnansweredBlogsCount();
  $queryCount = getUnansweredQueriesCount();
?>
    <div class="container-fluid">
      <div class="row">
      <div class="backdrop" id="sidebar">
        <div class="col-sm-3 col-md-2 sidebar" >
          <ul class="nav nav-sidebar">
            <li <?php if($admin)echo 'class="active"'; ?>><a href="/admin/">Overview <span class="sr-only">(current)</span></a></li>
            <li <?php if($create)echo 'class="active"'; ?>><a href="/admin/company/create/">Add New Company</a></li>
            <li <?php if($view)echo 'class="active"'; ?>><a href="/admin/company/view/">View All Companies</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li <?php if($update)echo 'class="active"'; ?>><a href="/admin/view/updates">View Updates</a></li>
            <li <?php if($query)echo 'class="active"'; ?>><a href="/admin/view/queries">View Queries <span class="badge pull-right"><?php echo $queryCount;?></a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li <?php if($blogs)echo 'class="active"'; ?>><a href="/admin/view/blogs">Blogs <span class="badge pull-right" id="blog-count"><?php echo $blogCount;?></span></a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li <?php if($email)echo 'class="active"'; ?>><a href="/admin/send/email/">Send Email</a></li>
            <li <?php if($stud)echo 'class="active"'; ?>><a href="/admin/view/all/">View All Students</a></li>
          </ul>
        </div>
      </div>
        <div class="main">
          <h1 class="page-header">Dashboard</h1>

          <?php if($admin) {
            include "adminpages/companies.php";
          } else if($create) {
            include "adminpages/createcompany.php";
          } else if ($view) {
            include "adminpages/compover.php";
          } else if ($stud) {
            include 'adminpages/viewall.php';
          } else if ($indiv) {
            include "adminpages/viewregister.php";
          } else if ($email) {
            include "adminpages/sendmail.php";
          } else if ($update) {
            include "adminpages/updates.php";
          } else if ($query) {
            include 'adminpages/queries.php';
          } else if ($blogs) {
            include 'adminpages/blog.php';
          }
          ?>
        </div>
      </div>
    </div>

   