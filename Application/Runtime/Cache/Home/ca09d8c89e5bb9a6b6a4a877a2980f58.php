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
            border-bottom: solid 1px #078D44;;

        }
        body>.container-fluid>div{
            background: #fffcc7;
            padding: 0px 10px 10px 10px;
            border-radius: 4px;
        }
        body>.container-fluid img{
            max-width: 100%;
        }
		input{
			width:25px;
			padding:0;
			margin:0; 
		}
		.count_btn{
		}
		.media-body{

		}
		.media-list .media{
			border-bottom:solid 1px #078D44;
			padding-bottom:5px;
			
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
            <h2>今日特惠
                <small></small>
            </h2>
        </div>

        <?php if(!$bestornew): ?><h4>正在努力准备中，稍后发布</h4>
            <?php else: ?>

            <ul class="media-list">
                <?php if(is_array($bestornew)): $i = 0; $__LIST__ = $bestornew;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="media goodList" data-fruit-cate="cate<?php echo ($vo["cid"]); ?>" data-fruitid="<?php echo ($vo["id"]); ?>">
                        <a class="pull-left" href="<?php echo U('Fruit/detail?id='.$vo[id]);?>">
                            <img class="media-object" src="/Public/upload/<?php echo ($vo["img"]); ?>" style="width: 110px; height: 110px; ">
                        </a>

                        <div class="media-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="pull-left" href="<?php echo U('Fruit/detail?id='.$vo[id]);?>">
                                        <h4 class="goodName"><?php echo ($vo["name"]); ?></h4>
                                    </a>
                                </div>

                                <div class="col-xs-12">
                                    <p class="pull-left">
									    <span class="label label-primary">
                                                            <span><?php echo ($vo["unit"]); ?></span>
                                                        </span>

														<span class="label label-warning">
															原价：
															<del>
                                                                <span><?php echo ((isset($vo["original"]) && ($vo["original"] !== ""))?($vo["original"]):"-"); ?>元</span>
                                                            </del>

                                                        </span>
                                    </p>
                                    <p>
														<span class="label label-danger">
														现价：
                                                            <span class="goodPrice"><?php echo ($vo["price"]); ?>元</span>
                                                        </span>
														
															<span class="label label-danger">
															限购：
																<span class="goodPrice"><?php echo ((isset($vo["buy_count"]) && ($vo["buy_count"] !== ""))?($vo["buy_count"]):"不限购"); ?></span>
															</span>


                                    </p>
                                </div>
                                <div class="col-xs-12 count_btn">

                                    <button type="button" class="btn btn-link btn-sm goodMinus hidden disabled">
                                        <span class="glyphicon glyphicon-minus-sign"></span>
                                    </button>
                                    <input class="goodCount hidden" value="1"/>
                                    <button type="button" class="btn btn-link btn-sm hidden goodPlus">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                    </button>

                                    <a class="btn btn-success btn-sm best-buy disabled">到店购买</a>

                                </div>

                            </div>
                        </div>

                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul><?php endif; ?>


    </div>


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
$(function(){

	$(".best-buy").click(function(e){
        return false;
		var goodsId=$(this).parents(".goodList").data("fruitid");
		var goodsCount=$(this).parents(".goodList").find(".goodCount").val();
		//alert(goodsId);
		//alert(goodsCount);
		var d={"id":goodsId,"qty":goodsCount};
		window.location.href="<?php echo U('Home/Fruit/orderpre');?>?ct="+JSON.stringify(d);


	});
		


});




</script>

</body>


</html>