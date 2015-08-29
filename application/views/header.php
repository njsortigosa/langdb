<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?=$this->config->item('sitename');?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- The fav icon -->
<link rel="shortcut icon" href="<?=base_url();?>media/img/favicon.png">
<script src="<?=base_url();?>media/js/jquery-1.11.1.min.js"></script>
<script src="<?=base_url();?>media/js/jquery-ui.min.js"></script>
<script src="<?=base_url();?>media/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>media/js/jquery.fancybox.js" ></script>
<script src="<?=base_url();?>media/js/jquery.tinymce/tinymce.min.js" ></script>
<script src="<?=base_url();?>media/js/jquery.tipsy.js" ></script>
<script src="<?=base_url();?>media/js/main.js" ></script>

<link href="<?=base_url();?>media/css/bootstrap.min.css" rel="stylesheet">
<link href="<?=base_url();?>media/css/main.css" rel="stylesheet">
<link href="<?=base_url();?>media/css/jquery.fancybox.css" rel="stylesheet"  />
<link href="<?=base_url();?>media/css/jquery-ui.min.css" rel="stylesheet"  />
<link href="<?=base_url();?>media/css/tipsy.css" rel="stylesheet">
</head>
<body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WVSU LangDB</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="<?=($this->uri->segment(2,0)=='' || $this->uri->segment(2,0)=='0')?'active':'';?>"><a href="<?=base_url();?>">Home</a></li>
            <li class="<?=($this->uri->segment(2,0)=='about' && $this->uri->segment(2,0)!='')?'active':'';?>"><a href="<?=base_url();?>main/about">About</a></li>
            <li class="<?=($this->uri->segment(2,0)=='contact' && $this->uri->segment(2,0)!='')?'active':'';?>"><a href="<?=base_url();?>main/contact">Contact</a></li>
            <?php if(isValidUser()){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Contents <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?=base_url();?>main/texts">Texts</a></li>
                <li><a href="<?=base_url();?>main/words">Words</a></li>
                <li><a href="<?=base_url();?>main/psos">Parts of Speech</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Admin</li>
                <li><a href="<?=base_url();?>main/languages">Languages</a></li>
                <li><a href="<?=base_url();?>main/genres">Genres</a></li>
                <li><a href="<?=base_url();?>main/domains">Domains</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
            
            <?php if(!isValidUser() && ($this->uri->segment(2,0)!="login" || $this->uri->segment(2,0)=="0")){ ?>
            <form class="navbar-form navbar-right" method="post" action="<?=base_url();?>auth/login">
                <input type="text" name="username" class="form-control" placeholder="Username" />
                <input type="password" name="password" class="form-control" placeholder="Password" />
            <input type="submit" class="btn btn-primary" value="Sign In" />
          </form>
            <?php } ?>
            <?php if(isValidUser()){ ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?=getUserProperty('username');?> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <!--
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li> -->
                <li><a href="<?=base_url();?>auth/change_password">Change Password</a></li>
                <li><a href="<?=base_url();?>auth/logout">Sign Out</a></li>
              </ul>
            </li>
          </ul> 
            <?php } ?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    
    <div class="container">