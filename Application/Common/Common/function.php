<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-7
 * Time: 下午8:23
 */
function authcheck($rule,$uid,$type=1,$mode='url',$relation='or',$t,$f='没有权限'){
    //判断当前用户UID是否在定义的超级管理员参数里
    //dump(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME);

    if(in_array(strtoupper(MODULE_NAME),C('NOT_AUTH_MODULE_WITH_USER')) && $uid){
        return $t;
    }


    if(in_array(strtoupper(MODULE_NAME."/".CONTROLLER_NAME),C('NOT_AUTH_MODULE_CONTROLLER'))){
        return $t;
    }

    if(!$uid){
        $uid=0;
    }
    if(in_array($uid,C('ADMINISTRATOR'))){
        return $t;    //如果是，则直接返回真值，不需要进行权限验证
    }else{
        //如果不是，则进行权限验证；
        $auth=new \Think\Auth();
        return $auth->check($rule,$uid,$type,$mode,$relation)?$t:$f;
    }
}


function check_verify($code, $id = '')
{
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}