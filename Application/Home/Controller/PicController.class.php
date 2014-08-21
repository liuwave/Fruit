<?php
namespace Home\Controller;
use Home\Controller;
class PicController extends CommonController {
    public  function _initialize(){
        parent::_initialize();
    }

    public function index(){

        $this->display();
	}
  
	
}