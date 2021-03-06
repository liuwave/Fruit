<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/all.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-notify.css" />

    <style type="text/css">
        body>.container-fluid .page-header {
            padding-top:10px;
            border-bottom: solid 1px #078D44;;


        }
        body>.container-fluid>form .form-group{
            padding: 0 15px;

        }
        body>.container-fluid>form button{
            display: inline-block;
            margin: 0 0 0 40px;
        }


        body>.container-fluid>form .help-block{
            margin-left: 20px;
        }
        body>.container-fluid>form{
            margin-top: 10px;
            background: #fffcc7;
            padding: 0px 5px 15px 5px;
            border-radius: 5px;
            color: #078D44;
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



    <form class="form-horizontal" method="post"  role="form">

        <div class="page-header">
            <h1><small>登录</small> 果珍鲜 <small></small></h1>
        </div>

        <div class="form-group">
            <label for="card_num" class="col-xs-12 ">会员卡号：</label>
            <div class="col-xs-9">
                <input type="text" check-type="required" minlength="5" class="form-control" name="card_num" id="card_num" placeholder="如：8XXXX">
            </div>
        </div>


        <div class="form-group">
            <label for="password" class="col-xs-12 ">密码（初始密码为手机号码）：</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" check-type="required" minlength="6" name="password" id="password" placeholder="默认为手机号码">
            </div>
        </div>


        <div class="form-group">
            <div class=" col-xs-12">
                <button type="submit" class="btn btn-default">登录</button>

            </div>

        </div>
	 <p class="text-warning">尊敬的客户：若忘记密码，请到柜台重置。</p>
    </form>


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



<div class='notifications bottom-left'></div>



<script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap-notify.js"></script>


<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap3-validation.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/main.js"></script>


<script>
    $(function(){
        //1. 简单写法：
        $("form").validation();
        $('body>.container-fluid>form button').click(function(event){
            // 2.最后要调用 valid()方法。
            event.preventDefault();
            if ($("form").valid(this,"输入错误！")==false){
                //$("#error-text").text("error!"); 1.0.4版本已将提示直接内置掉，简化前端。
                return false;
            }else{

                $.ajax({
                    type: "POST",
                    url: "<?php echo U('/Home/User/loginCheck');?>",
                    data: $("form").serialize(),
                    success: function(msg){
                        if(msg["status"] ){
                             $('.bottom-left').notify({
								message: { text: msg["info"]+',转到 登陆前页面'}
							  }).show(); // for the ones that aren't closable and don't fade out there is a .hide() function.

                            var interval = setInterval(function(){

                                if(msg['url']!==""){
                                    location.href=msg['url'];
                                }else{
                                    location.href="<?php echo U('Home/Index/index');?>";
                                }

                                clearInterval(interval);
                            }, 3000);


                        }else{
							$('.bottom-left').notify({
								message: { text: msg["info"]}
							  }).show(); // for the ones that aren't closable and don't fade out there is a .hide() function.

                        }
                    }
                });

            }
        });
		
		
		
    });





</script>

</body>


</html>