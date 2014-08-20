<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 14-8-4
 * Time: 上午10:06
 */

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {
    protected function _initialize(){

        $menu=M('Menu')->where("status = 1")->order('sort asc')->select();
        $this->assign("menuList",$menu);

        if(!authcheck(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,session(C('USER_AUTH_KEY')),1,'','or',true,false)){
            //dump(session());
           $this->error("你没有登陆.....",U('Admin/Index/Login'));
        }

    }




} 