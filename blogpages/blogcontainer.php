

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php if(isset($params[1]) && $params[1]=="page") {
              $count = getBlogCount();
              if($params[2]>ceil($count/3) && $params[2]>1) header("Location: /experiences/page/".max(ceil($count/3),1));
              $blogs = getBlogs($params[2]);
              $page=$params[2];
              $url = "/page/";
              include 'blogpages/pages.php';
          }
          else if(isset($params[1]) && $params[1]=="article") {
              include 'blogpages/article.php';
          } else if(isset($params[1]) && $params[1]=="company") {
              if(!isset($params[3])) header("Location: /experiences/company/".$params[2]."/1");
              $company = getCompany(null, $params[2]);
              $count = getBlogCount($company['id']);
              if($params[3]>ceil($count/3) && $params[3]>1) header("Location: /experiences/company/".$params[2].'/'.max(ceil($count/3),1));
              $page=$params[3];
              $blogs = getBlogs($params[3], $company['id']);
              $url = "/company/".$params[2].'/';
              include 'blogpages/pages.php';
          } else if(isset($params[1]) && $params[1]=="user") {
            if(!isset($params[3])) header("Location: /experiences/user/".$params[2]."/1");
            $count = getBlogCount(null, $params[2]);
            if($params[3]>ceil($count/3) && $params[3]>1) header("Location: /experiences/user/".$params[2].'/'.max(ceil($count/3),1));
            $page=$params[3];
            $blogs = getBlogs($params[3], null, $params[2]);
            $url = "/user/".$params[2].'/';
            include 'blogpages/pages.php';
          } else {
            include 'errorpages/404.php';
          }
          if(isset($params[1]) && ($params[1]=="page" || $params[1]=="company" || $params[1]=="user")) { ?>
            <div class="center-block">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li <?php if($page==1) { ?>class="disabled"<?php } ?>>
                    <a <?php if($page!=1) { ?>href="/blog<?php echo $url.($page-1);?>"<?php } ?> aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php for($i=1;$i<=ceil($count/3.0);$i++){ ?>
                      <li <?php if($page==$i) { ?>class="active"<?php } ?>><a <?php if($page==$i) { ?> href="/blog<?php echo $url;?><?php echo $i;?>"<?php } ?>><?php echo $i;?></a></li>
                  <?php } ?>
                  <li <?php if($page==ceil($count/3)||ceil($count/3)==0) { ?>class="disabled"<?php } ?>>
                    <a <?php if($page!=ceil($count/3)&&ceil($count/3!=0)) { ?>href="/blog<?php echo $url.($page+1);?>"<?php } ?> aria-label="Previous">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          <?php } ?>
          

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <?php if($isUser) { ?>
            <div class="sidebar-module sidebar-module-inset">
              <h4>Add an experience</h4>
              <p>To all the seniors of DJSCE, leave something invaluable for your fellow Batchmates and Juniors,  Share your Placement experience.</p>
              <a href="/experiences/add" class="btn btn-default center-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
            </div> 
            <?php }?>
          <div class="sidebar-module">

            <h4>Archives</h4>
            <?php $companies = getAllCompanies();?>
            <ol class="list-unstyled">
              <?php for($i=0;$i<count($companies);$i++) { ?>
                  <li><a href="/experiences/company/<?php echo $companies[$i]['slug']?>"><?php echo $companies[$i]['name'];?></a></li>
              <?php  } ?>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->