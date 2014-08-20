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
                <a href="<?php echo(U('Admin/Index/index')); ?>"> 返回首页</a></small></h4>


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









<script type="text/javascript" src="/fruit/Public/Dist/js/jquery.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/bootstrap.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/jquery-cookie.js"></script>
<script type="text/javascript" src="/fruit/Public/Dist/js/main.js"></script>




<script>

</script>

</body>


</html>