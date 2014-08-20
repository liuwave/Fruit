<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">

<head>
    <META http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/fruit/Public/Dist/css/bootstrap-theme.css" />
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }


    </style>

</head>
<body>

<div class="container">

    <form class="form-signin" action="<?php echo U('Admin/Index/login');?>" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>

        <input type="email" name="email" class="form-control" placeholder="邮箱地址" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="密码" required>
        <img src="<?php echo U('Admin/Index/verify');?>" id="verify_code"/>
        <input type="text" name="verify_code" class="form-control" placeholder="输入验证码" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
    </form>

</div>




<script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>


<script>
$(function(){
   $('#verify_code').click(function(e){

      $(this).attr("src","<?php echo U('Admin/Index/verify');?>") ;
   });

});


</script>

</body>


</html>