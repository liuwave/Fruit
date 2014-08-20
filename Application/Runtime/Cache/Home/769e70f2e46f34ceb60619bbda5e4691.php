<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/all.css" />
    <style type="text/css">
        #main-menu img{
            border: none;
            float: left;
            height: 50px;

        }
        #main-menu {
            margin: auto;
        }
        #main-menu .btn{
            margin: auto;
            margin-top: 10px;
            padding: 0;
            width: 100%;
            height: 52px;
            background: #fffcc7;

        }
        #main-menu span{
            font-size: 16px;
            margin-top: 16px;
            display: block;
            color: #078D44;
        }

        #carousel-index {
            margin:10px 0 5px 0;
        }
        #carousel-index .carousel-inner>.item>img{
            margin: auto;

        }
		#carousel-index .carousel-caption >a,#carousel-index .carousel-caption >a:hover{
			text-decoration:none;
			color:white;

		
		
		
		}
		#carousel-index {
			background:rgba(0, 0, 0, 0.6)!important;
			filter:Alpha(opacity=60); background:#000; 
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
<div id="carousel-index" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-index" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-index" data-slide-to="1" class=""></li>
        <li data-target="#carousel-index" data-slide-to="2" class="">
        </li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
			<a href="<?php echo U('Home/Article/show?id=3');?>">
				<img src="/Public/upload/image/ky/gzx_xs.jpg" class="img-responsive" alt="">
			</a>
			
            <div class="carousel-caption">
			
			<a href="<?php echo U('Home/Article/show?id=3');?>">
				<h5>果珍鲜水果超市8.16号盛大开业
				</h5>
				<p>
				<small>
				Vip贵宾招募、开业特价酬宾进行中

				</small>
				</p>
			</a>
            </div>

        </div>
        <div class="item">
			<a href="<?php echo U('Home/Fruit/best?type=is_best');?>">
            <img src="/Public/upload/image/ky/ky.jpg"  class="img-responsive" alt="">
			</a>
            <div class="carousel-caption">
			<a href="<?php echo U('Home/Fruit/best?type=is_best');?>">
				<h5>果珍鲜水果超市开业特价酬宾进行中</h5>
				<p><small>
				特价水果天天有，龙泉水蜜桃、宁夏西瓜、越南火龙果......
				
				</small>
				</p>
			</a>
            </div>

        </div>
        <div class="item">
			<a href="<?php echo U('Home/Article/show?id=3');?>">
            <img src="/Public/upload/image/ky/vip.jpg"  class="img-responsive" alt="">
			</a>
            <div class="carousel-caption">
			<a href="<?php echo U('Home/Article/show?id=3');?>">
				<h5>果珍鲜水果超市Vip贵宾招募</h5>
				<p><small>
					会员充值进行时，你充我送无上限，充得多送得多，积分还能抵现！
				
				</small>
				</p>
			</a>
            </div>

        </div>

    </div>
    <a class="left carousel-control" href="#carousel-index" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-index" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>





<div class="row" id="main-menu">

    <?php if(is_array($menuList)): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6 ">
            <a href="<?php echo U($vo['url']);?>" class="btn  btn-block">
                <img src="/Public/upload/image/menu_<?php echo ($vo['id'] % 6); ?>.png" alt="<?php echo ($vo["title"]); ?>" class=" ">
                <span><?php echo ($vo["title"]); ?></span>
            </a>

        </div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
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