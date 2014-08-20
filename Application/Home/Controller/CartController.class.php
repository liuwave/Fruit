<?php
namespace Home\Controller;
use Home\Controller;

class CartController extends CommonController {
    protected $cart;
    protected $user_id;
    protected $condition;
	 protected function _initialize() {
        parent::_initialize ();
        $this->cart = new \Org\Util\Cart ();

        $this->user_id = 1;
        $this->condition ['user_id'] = $this->user_id;
    }
	 /*
	 *@param id [string]
	 *@return array
	*/
	
	protected function _get_detail($id){
	     if (!id) {      
            return FALSE;
        }          
        $id=trim ( preg_replace ( '/(^[0]+)/i', '',$id ) );
		//dump($id);
		$good=M("Goods")->field("id,name,price,unit,img")->where("status = 1 and id=".$id)->find();
		dump($good);
		 if(!$good){
		 return false;
		 }
		 return $good;

}
   

	
	
    public function index() {
        $cartdata = $this->cart->contents ();
        //$this->display();
        $this->assign ( 'cartdata', $cartdata );
		dump($cartdata);
		dump(!$cartdata);
        //parent::display ();
    }

    // 添加物品
    public function insert() {
		
		
        $cartItems=htmlspecialchars_decode(I("ct"));
        if(!$cartItems){
            $this->ajaxReturn(false);
        }
        $oCartItems=json_decode($cartItems);
		$list=array();
        if(isset($oCartItems->id)){
			
            $temp=$this->_get_detail($oCartItems->id);
			if($temp){
				$temp['qty']=$oCartItems->qty;
				$temp['options']=C('FRUIT_MD5_OPTION');
				$list=$temp;
			}
			
        }else{
            foreach($oCartItems as $val){
                //dump($val);
                $temp=$this->_get_detail($val->id);
				if($temp){
					$temp['qty']=$val->qty;
					$temp['options']=C('FRUIT_MD5_OPTION');
					$list[]=$temp;
					dump(md5($val->id));
				}
            }
        }
		dump($list);
		
        $status = $this->cart->insert($list);
		//$this->ajaxReturn($status);
		//dump($status);
        //$this->assign ( 'status', $status );
        //$this->display ();
    }

    // 更新物品
    public function update() {
		$cartItems=htmlspecialchars_decode(I("ct"));
        if(!$cartItems){
            $this->ajaxReturn(false);
        }
        $oCartItems=json_decode($cartItems);
		$list=array();
        if(isset($oCartItems->id)){
			
			$list=array('rowid'=>md5($oCartItems->id.implode(C('FRUIT_MD5_OPTION'))),'qty'=>$oCartItems->qty);
        }else{
            foreach($oCartItems as $val){
              $list[]=array('rowid'=>md5($val->id.implode(C('FRUIT_MD5_OPTION'))),'qty'=>$val->qty);
			  dump(md5($val->id.C('FRUIT_MD5_OPTION')),$val->id,C('FRUIT_MD5_OPTION'));
            }
        }
		dump ($list);
		
		
		
        $status = $this->cart->update ($list);
        $this->assign ( 'status', $status );
        //$this->display ();
    }

    // 清空物品
    public function clear() {
        $this->cart->destroy ();
        $this->redirect ( 'Cart/index');
    }

    // 物品存入数据库
    public function savetodb() {
        $cartdata = $this->cart->contents ();
        $cartContentString = serialize ( $cartdata );

        $cartdb = M ( 'cart' );
        $data = $cartdb->where ( $this->condition )->select ();
        if ($data) {
            // 要修改的数据对象属性赋值
            $data ['cartdata'] = $cartContentString;
            $data ['updatetime'] = time ();
            $status = $cartdb->where ( $this->condition )->save ( $data );
        } else {
            // 要修改的数据对象属性赋值
            $data ['user_id'] = $this->user_id;
            $data ['cartdata'] = $cartContentString;
            $data ['updatetime'] = time ();
            $status = $cartdb->add ( $data );
        }

        $this->assign ( 'status', $status );
        $this->display ();
    }

    // 从数据库读取物品
    public function readfromdb() {
        $cartdb = M ( 'cart' );
        $data = $cartdb->where ( $this->condition )->find ();
        if ($data) {
            $cartArray = unserialize ( $data ['cartdata']);
        }
        $this->assign ( 'cartArray', $cartArray );
        $this->display ();
    }

    // 清空数据库购物车
    public function clearfromdb() {
        $cartdb = M ( 'cart' );
        $data = $cartdb->where ( $this->condition )->find ();

        if ($data) {
            $data ['cartdata'] = '';
            $cartdb->where ( $this->condition )->save ( $data );
        }
    }
	
		protected function savetocookie(){
			$cartdata = $this->cart->contents ();
			$cartContentString = serialize ( $cartdata );
			dump(unserialize($cartContentString));
			cookie("cartdata",$cartContentString);
			dump(unserialize(cookie("cartdata")));
		
		}

	
}