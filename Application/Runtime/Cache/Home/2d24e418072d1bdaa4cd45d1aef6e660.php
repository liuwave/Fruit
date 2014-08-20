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
            <button type="button" class="btn btn-link btn-lg back dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu">

                    <li><a href="<?php echo U('Home/User/jifen');?>">积分查询</a></li>



            </ul>
        </div>
		




    </div>

</div>

<div class="container-fluid">

    <div>
        <div class="page-header">

            <h2>
                <?php if(isset($message)) {?>

                <p class="success"><?php echo($message); ?></p>
                <?php }else{?>

                <p class="error"><?php echo($error); ?></p>
                <?php }?>


                <small>客官请稍等...
                <a id="href" href="<?php echo($jumpUrl); ?>" > 跳转前一页</a>
                等待时间：
                <b id="wait">
                    <?php echo($waitSecond+2); ?>
                </b>


                或者直接
                <a href="<?php echo(U('Home/Index/index')); ?>"> 返回首页</a></small></h2>


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




<div class="footer ">

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