<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/all.css" />
    <style type="text/css">
        body>.container-fluid .page-header {
            padding-top:10px;
            border-bottom: solid 1px #078D44;;


        }
        body>.container-fluid>div{
            background: #fffcc7;
            padding: 0px 15px 15px 15px;
            border-radius: 4px;
        }
        body>.container-fluid img{
            max-width: 100%;
        }

    </style>


</head>
<body>

<div class="header">
    <div class="header-inner row">
        <a href="<?php echo U('Home/Index/index');?>" class="btn btn-link btn-lg pull-left back col-xs-3">
            <span class="glyphicon glyphicon-home"></span>
        </a>
        <div class="btn-group  col-xs-4">

            <a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown" id="logo-block">
                <img src="/fruit/Public/dist/img/logo.png"/>
                <div class="clearfix"></div>
                <span class="caret "></span>
            </a>
            <ul class="dropdown-menu" role="menu">


                <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U($vo['url']);?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>

        </div>
		<a href="#" class="btn btn-link btn-lg pull-left back col-xs-1">
            <span class="glyphicon glyphicon-shopping-cart"></span>
        </a>

        

        <div class="btn-group col-xs-3">
            <button type="button" class="btn btn-link btn-lg back dropdown-toggle
			<?php if(!session(C('USER_AUTH_KEY'))): ?>unlogin<?php endif; ?>
			" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">
					<?php if(session(C('USER_AUTH_KEY'))): ?><li><a href="<?php echo U('Home/User/jifenshow');?>">积分查询</a></li>
					<li><a href="<?php echo U('Home/User/index');?>">个人中心</a></li>
					 <li class="divider"></li>
					 <li><a href="<?php echo U('Home/User/loginout');?>">退出</a></li>

					<?php else: ?>
					<li><a href="<?php echo U('Home/User/login');?>">登陆</a></li><?php endif; ?>

                    



            </ul>
        </div>
		




    </div>

</div>
<div class="container-fluid">
    <div>
        <div class="page-header">
            <h2><small>会员号为</small><?php echo ($jifen["card_num"]); ?><small>的客户,</small>
                <p>

                    <small>
                        查询结果如下：
                    </small>
                </p>

            </h2>
        </div>

        <p class="lead">

            <h2>
        <p>
            <small>积分：</small><?php echo ($jifen["jifen"]); ?>，
        </p>
        <p>
            <small>余额：</small><?php echo ($jifen["cash"]); ?>；
        </p>


            </h2>
        <br>


        </p>
        <p class="text-warning">尊敬的客户：由于网络原因，积分及余额更新会有延时，结果以柜台查询为准。</p>
    </div>




</div>


<div class="copyright ">

    <p>
        果珍鲜出品
        ©copyright
        <a class="  ">
            联系我们
        </a>
    </p>


</div>







<script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/main.js"></script>




<script>

</script>

</body>


</html>