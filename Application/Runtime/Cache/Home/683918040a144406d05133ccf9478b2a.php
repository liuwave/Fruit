<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/all.css" />
    <style type="text/css">
        body>.container-fluid .page-header {
            padding-top:10px;
            border-bottom: solid 1px #078D44;


        }

        body>.container-fluid>div{
            background: #fffcc7;
            padding: 0px 15px;
            border-radius: 4px;
            min-height: 300px;
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
                <img src="/Public/upload/image/logo.png"/>
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

            <h4>
                <?php if(isset($message)) {?>

                <p class="success"><?php echo($message); ?></p>
                <?php }else{?>

                <p class="error"><?php echo($error); ?></p>
                <?php }?>


                <small>客官请稍等...
                <a id="href" href="<?php echo($jumpUrl); ?>" > 跳转前一页</a>
                等待时间：
                <b id="wait">
                    <?php echo($waitSecond); ?>
                </b>


                或者直接
                <a href="<?php echo(U('Home/Index/index')); ?>"> 返回首页</a></small></h4>


        </div>



    </div>




</div>

<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>

<div class="copyright " id="copyright">

<div class="copyright " id="copyright">
    <p>
        成都市阳光街209号1栋1层(中海社区综合市场入口处)
    </p>
    <p>
        果珍鲜出品
        ©copyright
    </p>



</div>
</div>







<script type="text/javascript" src="/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/Public/Dist/js/main.js"></script>




<script>

</script>

</body>


</html>