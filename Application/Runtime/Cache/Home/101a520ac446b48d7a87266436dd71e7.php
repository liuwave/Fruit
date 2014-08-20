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
            padding: 0px 15px 15px 15px;
            border-radius: 4px;
        }
        body>.container-fluid img{
            max-width: 100%;
        }
		  body>.container-fluid .nav>li>a{
		  padding:10px;
	
		  }
		  body>.container-fluid .tab-content{
			padding-top:20px;
		  }
		   body>.container-fluid  form button{
            display: inline-block;
            margin: 0 0 0 40px;
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
            <h2><small>会员号为</small><?php echo ($jifen["card_num"]); ?><small>的客户</small>
            </h2>
        </div>
		
		
		
		<ul class="nav nav-tabs" id="user-menu" role="tablist">
		
		  <li  class="active"><a href="#basic" role="tab" data-toggle="tab">基本</a></li>
		  <li ><a href="#order" role="tab" class="hidden" data-toggle="tab">订单</a></li>
		  <li><a href="#changepsword" role="tab"  data-toggle="tab">更改密码</a></li>
		  <li  class="dropdown">
			<a class="dropdown-toggle hidden" data-toggle="dropdown" href="#" >
			  更多 <span class="caret"></span>
			</a>
			<ul class="dropdown-menu" role="menu">
			 <li><a href="#changepsword" role="tab" data-toggle="tab">test</a></li>
			</ul>
		  </li>
		</ul>

<!-- Tab panes -->
<div class="tab-content">

		<div id="basic" class="tab-pane active">
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
		
		</div>
		
		
		<div id="order" class="tab-pane">

		
		
		</div>
		
		
		<div id="changepsword" class="tab-pane">
		<form class="form-horizontal" method="post" action="<?php echo U('Home/User/change');?>"  role="form">
		<input type="text" value="<?php echo ($jifen["id"]); ?>" name="id" class="hidden">
        <div class="form-group">
            <label for="oldpassword" class="col-xs-12 ">密码（初始密码为手机号码）：</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" check-type="required" minlength="6" name="oldpassword" id="oldpassword" placeholder="默认为手机号码">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-xs-12 ">新密码：</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" check-type="required" minlength="6" name="password" id="password" placeholder="输入新密码">
            </div>
        </div>
		<div class="form-group">
            <label for="password2" class="col-xs-12 ">重复新密码：</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" check-type="required" minlength="6" name="password2" id="password2" placeholder="重复输入新密码！">
            </div>
        </div>

        <div class="form-group">
            <div class=" col-xs-6">
                <button type="submit" class="btn btn-default">更改</button>
            </div>
        </div>
	<p class="text-warning">尊敬的客户：若忘记密码，请到柜台重置。</p>
    </form>


		
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







<script type="text/javascript" src="/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/Public/Dist/js/main.js"></script>

<script type="text/javascript" src="/Public/Dist/js/bootstrap3-validation.js"></script>



<script>
$(function(){
	$("form").validation();
	
	 $("form").validation(function(obj,params){


               if (obj.id=='password2'){
				if($('#password').val()!==$('#password2').val()){
                       params.err=true;
                       params.msg="两次输入密码不一致；"
                   }
                }

                }
               ,{reqmark:true} //这个参数是设必填不要显示有星号，默认是有星号的
             );
	
	
    $(' body>.container-fluid  form button').click(function(event){
            // 2.最后要调用 valid()方法。
            //
            if ($("form").valid(this,"输入错误！")==false){
                //$("#error-text").text("error!"); 1.0.4版本已将提示直接内置掉，简化前端。
                event.preventDefault();
            }
	});
	
	$('#user-menu a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


});

</script>

</body>


</html>