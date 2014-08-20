<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends CommonController {
    public  function _initialize(){
        parent::_initialize();
    }

    public function index(){
        $userInfo=M("UserInfo");
        $this->assign("urlx",U("Index/checkorder"));

        $this->display();
	}
  
	
}