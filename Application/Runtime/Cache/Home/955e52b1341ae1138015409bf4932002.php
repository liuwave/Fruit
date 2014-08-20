<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/all.css" />
    <style>
        #carousel-detail {
            margin:10px 0 5px 0;
        }
        #carousel-index .carousel-inner>.item>img{
            margin: auto;

        }
        body>.container-fluid .page-header {
            padding-top:10px;
            border-bottom: solid 1px #078D44;;

        }
        body>.container-fluid>div{
            background: #fffcc7;
            padding: 0px 10px 10px 10px;
            border-radius: 4px;
        }
        body>.container-fluid #carousel-detail{
            margin-bottom: 20px;
        }

        body>.container-fluid #carousel-detail img{
            height: 180px;
            margin: auto;
            max-width: 100%;

        }

        body>.container-fluid .list-group .list-group-item{
            background: #fffcc7;
            border-color: #078D44;
            color: #078D44;
        }
        body>.container-fluid .modal-detail .modal-header{
            border-color: #078D44;

        }
        body>.container-fluid .modal-detail .modal-content{
            margin-top: 50px;
            background: #fffcc7;
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





<div class="container-fluid" id="page-detail" data-fruitid="<?php echo ($gDetail["id"]); ?>">
    <div>
        <div class="page-header">
            <h2><?php echo ($gDetail["name"]); ?>
                <small></small>
            </h2>
        </div>
        <div id="carousel-detail" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

                <li data-target="#carousel-detail" data-slide-to="0" class="active"> </li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?php echo ($gDetail["img"]); ?>" class="img-responsive" alt="">
                    <div class="carousel-caption">

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

        <div class="list-group">


            <li class="list-group-item">
                        <span class="label label-lg label-warning">
                        原价<del>
                            <span><?php echo ($gDetail["original"]); ?>元</span>/
                            <span class="goodUnit"><?php echo ($gDetail["unit"]); ?></span></del>

                        </span>

            </li>
            <li class="list-group-item">
                       <span class="label label-danger">
                          现价：
                          <span class="goodPrice"><?php echo ($gDetail["price"]); ?></span>/
                          <span class="goodUnit"><?php echo ($gDetail["unit"]); ?></span>
                      </span>
            </li>

            <li class="list-group-item">
                <span class="label label-info">月售<?php echo ($gDetail["buy_count"]); ?>单</span>
                <span class="label label-info">库存<?php echo ($gDetail["stock"]); ?></span>
                <span class="label label-danger">
				限购：
				<span class="goodPrice"><?php echo ((isset($gDetail["buy_count"]) && ($gDetail["buy_count"] !== ""))?($gDetail["buy_count"]):"不限购"); ?></span>
				</span>

            </li>


            <li class="list-group-item hidden">
                <span>数量：</span>
                <button type="button" class="btn btn-link btn-sm goodMinus">
                    <span class="glyphicon glyphicon-minus-sign"></span>
                </button>
                <input class="goodCount" value="1"/>
                <button type="button" class="btn btn-link btn-sm goodPlus">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                </button>
            </li>
            <a class="btn btn-block list-group-item" data-toggle="modal" data-target=".modal-detail">
                商品详情
            </a>
            <li class=" list-group-item">
                <a href="#copyright" class="btn  btn-block " >
                    到店购买
                </a>


            </li>

        </div>


    </div>




    <div class="modal modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <?php echo ($gDetail["name"]); ?>
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <?php echo ($gDetail["content"]); ?>
                    <div class="padding-pack"></div>
                </div>


            </div>
        </div>

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



<!--

<div class="footer">

    <div class="btn-group btn-group-justified">

          <a href="<?php echo U('Fruit/lists');?>" class="btn btn-block bottomMenu" id="btn-menu-list">
              <span class="glyphicon glyphicon-list "></span>
          </a>
          <a class="btn btn-block bottomMenu" id="btn-menu-home">
              <span class="glyphicon glyphicon-home "></span>
          </a>
          <a class="btn btn-block bottomMenu" id="btn-menu-user">
               <span class="glyphicon glyphicon-user "></span>
          </a>


        <a href="<?php echo U('Fruit/cart');?>" class="btn btn-block  bottomMenu  " id="btn-menu-cart">
            <span class="glyphicon glyphicon-shopping-cart "></span>
            <span class="badge " id="cartCount">0</span>

        </a>

          <a class="btn btn-block bottomMenu " id="btn-menu-search">
              <span class="glyphicon glyphicon-search "></span>
          </a>

    </div>


</div>

<script>
    var storageName="<?php echo ($storageName); ?>";


</script>

-->




<script type="text/javascript" src="/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/Dist/js/jquery-cookie.js"></script>
<!--
<script type="text/javascript" src="/Public/Dist/js/main.js"></script>
-->
<script>
    /*
    $(function () {


		$("#page-detail-go #btn-buy-now").click(function (e) {
            return false;
			var goodsId = $("#page-detail").attr("data-id");
			
			var countSpan =$("#page-detail").find(".goodCount");

			var counts = parseInt(countSpan.val());
			var d={};
            //d={goodsId:{"ct":counts}};
			d[goodsId]={"ct":counts};

			window.location.href="<?php echo U('Fruit/orderPre');?>?odata="+JSON.stringify(d);
		});


        $(".footer .btn").removeClass("menu-active");

        $("#page-detail>.panel-heading>.row>span").eq(1).html("<?php echo ($gDetail["name"]); ?>");



    });
    */
</script>

</body>


</html>