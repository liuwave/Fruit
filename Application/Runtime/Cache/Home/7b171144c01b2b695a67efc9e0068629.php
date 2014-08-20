<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/main.css" />
</head>
<body>
<div class="panel panel-default" id="page-lists">
    <div class="panel-heading">
        <div class="row">
            <span class="col-xs-2">
                 <button type="button" class="btn btn-link btn-block ">
                     <span class="glyphicon glyphicon-arrow-left"></span>
                 </button>
            </span>

            <span class="col-xs-10">商品列表</span>

        </div>
        <!--<h3 class="panel-title">Panel title</h3>

        <p>
            <button type="button" class="btn btn-link btn-xs">
                <span class="glyphicon glyphicon-arrow-left"></span>
            </button>
            <span>Panel title</span>
        </p>
        -->


    </div>
    <div class="panel-body">
        <div class="container-fluid">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="listsTab" role="tablist">
                <li class="active"><a href="#home" role="tab" data-toggle="tab"> 所有</a></li>

                <?php if(is_array($cat)): foreach($cat as $key=>$vo): ?><li><a href="#cate<?php echo ($vo["id"]); ?>" role="tab" data-toggle="tab"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <div class="panel panel-default" >
                        <div class="panel-body">
                            <ul class="media-list">
                                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="media goodList" id="dou<?php echo ($vo["id"]); ?>" data-fruit-cate="cate<?php echo ($vo["cid"]); ?>" data-fruit-check="<?php echo ($vo["check_code"]); ?>" >
                                            <a class="pull-left" href="<?php echo U('Fruit/detail?id='.$vo[id]);?>">
                                                <img class="media-object" src="/fruit/Public/<?php echo ($vo["img"]); ?>" style="width: 80px; height: 80px; ">
                                            </a>
                                            <div class="media-body">
                                                <div  class="row">
                                                    <div class="col-xs-12">
                                                        <a class="pull-left" href="<?php echo U('Fruit/detail?id='.$vo[id]);?>">
                                                            <span class="goodName"><?php echo ($vo["name"]); ?></span>
                                                        </a>
                                                    </div>

                                                    <div class="col-xs-12">
                                                        <p class="pull-left">
                                                        <span class="label label-primary">
                                                            <span class="goodPrice"><?php echo ($vo["price"]); ?></span>/
                                                            <span class="goodUnit"><?php echo ($vo["unit"]); ?></span>
                                                        </span>
                                                            <span class="label label-info">月售<?php echo ($vo["buy_count"]); ?>单</span>
                                                            <span class="label label-info">库存<?php echo ($vo["stock"]); ?></span>

                                                        </p>
                                                    </div>
                                                    <div class="col-xs-12">
                                                        <p class="pull-right">
                                                            <button type="button" class="btn btn-link btn-sm goodMinus disabled">
                                                                <span class="glyphicon glyphicon-minus-sign"></span>
                                                            </button>
                                                            <input class="goodCount" value="1"/>
                                                            <button type="button" class="btn btn-link btn-sm goodPlus">
                                                                <span class="glyphicon glyphicon-plus-sign"></span>
                                                            </button>

                                                            <a class="btn btn-info btn-sm" id="btn-add-to-cart">加入购物车</a>
                                                            <a class="btn btn-success btn-sm" id="btn-buy-now">立即购买</a>


                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </li><?php endforeach; endif; else: echo "" ;endif; ?>

                            </ul>
                        </div>

                    </div>

                </div>

                <?php if(is_array($cat)): foreach($cat as $key=>$cateVo): ?><div class="tab-pane" id="cate<?php echo ($cateVo["id"]); ?>">
                        <ul class="media-list">
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["cid"] == $cateVo["id"] ): ?><li class="media goodList" id="dou<?php echo ($vo["id"]); ?>" data-fruit-cate="cate<?php echo ($vo["cid"]); ?>"  data-fruit-check="<?php echo ($vo["check_code"]); ?>" >
                                        <a class="pull-left" href="#">
                                            <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 64px; height: 64px; " src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIj48L3JlY3Q+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                                        </a>
                                        <div class="media-body">
                                            <div  class="row">
                                                <div class="col-xs-6">
                                                    <p class="pull-left"><h4 class="goodName"><?php echo ($vo["name"]); ?></h4></p>
                                                </div>
                                                <div class="col-xs-6">
                                                    <p class="pull-right">
                                                        <button type="button" class="btn btn-link btn-sm goodMinus disabled">
                                                            <span class="glyphicon glyphicon-minus-sign"></span>
                                                        </button>
                                                        <input class="goodCount" value="1"/>
                                                        <button type="button" class="btn btn-link btn-sm goodPlus">
                                                            <span class="glyphicon glyphicon-plus-sign"></span>
                                                        </button>

                                                    </p>
                                                </div>

                                                <div class="col-xs-12">
                                                    <p class="pull-left">
                                                        <span class="label label-primary">
                                                            <span class="goodPrice"><?php echo ($vo["price"]); ?></span>/
                                                            <span class="goodUnit"><?php echo ($vo["unit"]); ?></span>
                                                        </span>
                                                        <span class="label label-info">月售<?php echo ($vo["buy_count"]); ?>单</span>
                                                        <span class="label label-info">库存<?php echo ($vo["stock"]); ?></span>

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                    </div><?php endforeach; endif; ?>

            </div>



        </div>


    </div>

</div>

<div class="copy-right container-fluid">
    <div class="btn-group btn-group-justified">

         <span class="btn btn-link btn-block  ">
           联系我们
         </span>
         <span class="btn btn-link btn-block  ">
           关于我们
         </span>
         <span class="btn btn-link btn-block  ">
           公司新闻
         </span>
         <span class="btn btn-link btn-block  ">
           店铺列表
         </span>
    </div>

</div>

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

<script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/main.js"></script>

<script>
    $(function(){
        $('#listsTab a:first').tab('show');
        $(".footer #btn-menu-list").addClass("menu-active");
		
		$("#page-lists #btn-buy-now").click(function (e) {
			var goodsId = $(this).parents(".goodList").attr("id");
			var countSpan = $(this).parents(".goodList").find(".goodCount");
			var counts = parseInt(countSpan.val());
			var d={};
			goodsId=goodsId.replace("dou","");
			d[goodsId]={"ct":counts};
            window.location.href="<?php echo U('Fruit/orderPre');?>?odata="+JSON.stringify(d);
		});
        $("#page-lists #btn-add-to-cart").click(function (e) {

            var goodsId = $(this).parents(".goodList").attr("id");
            var countSpan = $(this).parents(".goodList").find(".goodCount");
            var counts = parseInt(countSpan.val());
            var d={};


            $.ajax({
                url:"<?php echo U('Fruit/cart');?>",
                type:"post",
                data:""

            }).done(function(data){
                  console.log(data);
            });




            var goodName = $("#" + goodsId).find(".goodName").html();
            var goodPrice = $("#" + goodsId).find(".goodPrice").html();
            var goodUnit = $("#" + goodsId).find(".goodUnit").html();
            var goodImg=$("#" + goodsId).find("img").attr("src");
            var goodCheckCode=$("#" + goodsId).attr("data-fruit-check");
            var goodCate=$("#" + goodsId).attr("data-fruit-cate");

            var goodUrl=$("#" + goodsId+" > a").attr("href");
            var c={};
            if (!localStorage.getItem(storageName)) {
                c[goodsId]={
                    gName: goodName,
                    gPrice: goodPrice,
                    gCount: counts,
                    gUnit:goodUnit,
                    gCheckCode:goodCheckCode,
                    gImg:goodImg,
                    gCate:goodCate,
                    gIsChecked:true,
                    gUrl:goodUrl
                };

            }else{
                c=JSON.parse(localStorage.getItem(storageName));
                if(!c[goodsId]){
                    c[goodsId]={
                        gName: goodName,
                        gPrice: goodPrice,
                        gCount: counts,
                        gUnit:goodUnit,
                        gCheckCode:goodCheckCode,
                        gImg:goodImg,
                        gCate:goodCate,
                        gIsChecked:true,
                        gUrl:goodUrl
                    };
                }else{
                    c[goodsId].gCount=counts+c[goodsId].gCount;
                }

            }
            localStorage.setItem(storageName,JSON.stringify(c));
            $(".footer #btn-menu-cart").popover({
                container:"body",
                content:"已加入购物车",
                trigger:"click manual",
                placement:"top"
            });

            var dtd = $.Deferred();
            var wait = function(dtd){
                var tasks = function(){
                    dtd.resolve();
                };
                setTimeout(tasks,500);
                return dtd;
            };


            $(".footer #btn-menu-cart").popover("show");

            $.when(wait(dtd))
                    .done(function(){
                        $(".footer #btn-menu-cart").popover("destroy");
                    });




            console.log("trigger");
            fruitFreshCookie();


        });

        fruitFreshCookie();
        //$('#shopcart-popup').removeClass("hidden").slideToggle("fast");
    });
</script>

</body>


</html>