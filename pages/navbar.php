
</head>
  <body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php if($isAdmin && isset($params[0]) && $params[0]=="admin") { ?>
        <a class="navbar-brand" id="hamburger"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></a>
      <?php } ?>
      <a class="navbar-brand" href="/">Placements</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-left">
        <li <?php if(isset($params[0])&&$params[0]=='queries') { ?>class="active"<?php }?>><a href="/queries">Queries</a></li>
        <li><a href="/blog" target="blank">Experiences</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <?php if($isUser) { ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['name']; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/edit">Edit Details</a></li>
              <li><a href="/change-password">Change Password</a></li>
              <?php if($isAdmin) { ?>
                <li><a href="/admin">Admin Dashboard</a></li>
              <?php }?>
              <li role="separator" class="divider"></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
          
        <?php } else { ?>
          <li><a href="/login">Login</a></li>
        <?php  } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="row padded">