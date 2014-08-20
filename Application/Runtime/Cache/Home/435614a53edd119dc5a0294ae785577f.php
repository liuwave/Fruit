<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Dist/css/all.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Dist/css/bootstrap-notify.css" />
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
                <img src="/Public/dist/img/logo.png"/>
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



    <form class="form-horizontal" method="post"  role="form">

        <div class="page-header">
            <h1><small>加入</small>果珍鲜 <small>开启生态之旅</small></h1>
        </div>

        <div class="form-group">
            <label for="name" class="col-xs-12 ">用户名：</label>
            <div class="col-xs-9">
                <input type="text" check-type="required" minlength="5"  class="form-control" name="name" id="name" placeholder="用户名：英文字母、数字及下划线构成，5-20字符">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-xs-12 ">手机号码：</label>
            <div class="col-xs-9">
                <input type="tel" check-type="number" minlength="11" class="form-control" name="phone" id="phone" placeholder="如：1811112222">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-xs-12 ">邮箱：</label>
            <div class="col-xs-9">
                <input type="email" check-type="mail" class="form-control" name="email" id="email" placeholder="如：example@example.com">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-xs-12 ">密码：</label>
            <div class="col-xs-9">
                <input type="password" check-type="required" mixlength="6" class="form-control" name="password" id="password" placeholder="密码：任意字符 6-20位">
            </div>
        </div>
        <div class="form-group">
            <label for="password2" class="col-xs-12 ">重复密码：</label>
            <div class="col-xs-9">
                <input type="password" check-type="required" mixlength="6" class="form-control" name="password2" id="password2" placeholder="重复密码">
            </div>
        </div>

        <div class="form-group">
            <div class=" col-xs-6">
                <button type="submit" class="btn btn-default">注册</button>

            </div>
            <div class="col-xs-6">
                已有账号？直接
                <a href="<?php echo U('Home/User/login');?>"  class="btn btn-default">登录</a>
            </div>
        </div>

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






<script type="text/javascript" src="/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/Public/Dist/js/bootstrap-notify.js"></script>

<script type="text/javascript" src="/Public/Dist/js/bootstrap3-validation.js"></script>

<script type="text/javascript" src="/Public/Dist/js/main.js"></script>


<script>
    $(function(){
        //1. 简单写法：
        $("form").validation();



        $("form").validation(function(obj,params){


               if (obj.id=='email'||obj.id=='phone'|| obj.id=='name' ){

                 $.post("<?php echo U('/Home/User/valid');?>?type="+obj.id,{param :$(obj).val()},function(data){
                   params.err = !data.status;
                   params.msg = data.info;
                 });
                }else if(obj.id=='password2'){
                   if($('#password').val()!==$('#password2').val()){
                       params.err=true;
                       params.msg="两次输入密码不一致；"
                   }

               }

                }
               ,{reqmark:true} //这个参数是设必填不要显示有星号，默认是有星号的
             );



        $('body>.container-fluid>form button').click(function(event){
            // 2.最后要调用 valid()方法。
 
            event.preventDefault();
            if ($("form").valid(this,"输入错误！")==false){
                //$("#error-text").text("error!"); 1.0.4版本已将提示直接内置掉，简化前端。

                return false;
            }else{

                $.ajax({
                    type: "POST",
                    url: "<?php echo U('/Home/User/regCheck');?>",
                    data: $("form").serialize(),
                    success: function(msg){
                        if(msg["status"] ){
                             $('.bottom-left').notify({
								message: { text: msg["info"]+',转到 注册前页面'}
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