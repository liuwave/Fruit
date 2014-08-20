<?php
namespace Home\Controller;
use Home\Controller;
class ArticleController extends CommonController {
    public  function _initialize(){
        parent::_initialize();
    }

    public function index(){

        $this->display();


	}
    public function cate(){
        $data=I("get.");
        if($data["cid"]){
            $alist=M('Article')->where($data)->select();
            $acate=M('Article')->where("id = ".$data["cid"])->find();
        }
        $this->assign("articleList",$alist);
        $this->assign("categoryList",$acate);
        $this->display();

    }
    public  function  show(){
        $data=I("get.");
        if($data["id"]){
            $a=M("Article")->where("status = 1 and id=".$data["id"])->find();
			if($a){
				$this->assign("article",$a);
				$this->display();
			}else{
				$this->error("没有找到");
			}
            
        }
        
    }

  
	
}