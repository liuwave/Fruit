<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <META http-equiv=Content-Type content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
      <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap.css" />
      <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-theme.css" />

   
    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
   

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	<ul class="nav nav-tabs" role="tablist">
	  <li role="presentation" class="active"><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
	  <li role="presentation"><a href="<?php echo U('Admin/Goods/index');?>">商品管理</a></li>
	  <li role="presentation"><a href="<?php echo U('Admin/User/index');?>">会员管理</a></li>
	</ul>	
  

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">












          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
    <script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="/fruit/Public/Dist/js/jquery-cookie.js"></script>

  </body>
</html>