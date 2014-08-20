<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 14-8-1
 * Time: 下午2:43
 * fruit_address
结构 fruit_auth_group
结构 fruit_auth_group_access
结构 fruit_auth_rule
结构 fruit_goods
结构 fruit_goods_category
结构 fruit_order
结构 fruit_user
结构 fruit_user_info


 */

namespace Home\Controller;
use Home\Controller;

class FruitController extends CommonController {

    public function index(){

    }
	public function best(){
		$type=I('get.type');
		$data[$type]=1;
		$r=M('Goods')->where($data)->order('begin_time desc')->select();
		if($r){
			$this->assign("bestornew",$r);
			
		}else{
			$this->assign("bestornew",false);
		}
		$this->display();	
	}
	
    public function lists(){
        $GoodsCategory=M("GoodsCategory");
        $Goods=M("Goods");

        $gCategory=$GoodsCategory->where("status=1 and pid=0")->select();
        $gList=$Goods->where("status=1")->select();
/*
        $c=array();
        foreach($gCategory as $g){
            if(!empty($g)){
                //dump($g[id]);
                $c[$g["id"]]=$g["name"];
            }
        }
        //dump($gList);
        //dump($c);
        //dump($gCategory);
  */
        $this->assign("cat",$gCategory);
        $this->assign("list",$gList);
        $this->display();

    }
    public function detail(){
        $gId=I("id");
        $GoodsCategory=M("GoodsCategory");
        $Goods=M("Goods");

        $gCategory=$GoodsCategory->where("status=1 and pid=0")->select();

        $gDetail=$Goods->where("id=".$gId)->select();
        //dump($gDetail);
        //dump(json_encode($gDetail));
        //dump($gCategory);
        $this->assign("cat",$gCategory);
        $this->assign("gDetail",$gDetail[0]);
        $this->display();

    }

    public function cart(){
        //dump(json_decode(cookie('goodsList')));
        //dump(json_encode(json_decode(cookie('goodsList'))));
		$sName=I("sName");
		$this->assign("sName",$sName);
        //$this->ajaxReturn("dddd");
        $this->display();
    }
	public function orderPre(){

        $data=htmlspecialchars_decode(I("get.ct"));





        dump($data);


		if($data){

			$odata=json_decode($data);
            dump($odata);
            if($odata->id){
                $goods=M("Goods")->where("id=".$odata->id)->find();

                $goods["qty"]=$odata->qty;
                $goods["uid"]=session(C("USER_AUTH_KEY"));

                dump($goods);

            }
		
		}
	
	
	}







} 