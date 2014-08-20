<?php
namespace Home\Controller;
use Home\Controller;
class UserController extends CommonController {
    public  function _initialize(){
        parent::_initialize();
    }

    public function index(){
		if(!session(C('USER_AUTH_KEY'))){
            $this->error("未登录，请登陆！",'Home/User/login');
        }else{
            $r=M("User")->where("id=".session(C('USER_AUTH_KEY')))->find();

            $this->assign("jifen",$r);

            $this->display();
		}


	}
    public function  jifen(){

        $this->display();
    }
    public function  jifenshow(){
		if(!session(C('USER_AUTH_KEY'))){
            $this->error("未登录，请登陆！",'Home/User/login');
        }else{
            $r=M("User")->where("id=".session(C('USER_AUTH_KEY')))->find();

            $this->assign("jifen",$r);
                $this->display();
		}
    }

    public function  loginout(){
        //dump(session());
        session(C('USER_AUTH_KEY'),null);
        session(null);
        $this->success("退出成功，转到首页",U('Home/Index/index'));


    }

    public  function login(){

        if(session(C('USER_AUTH_KEY'))){

            $this->success("已登录");
        }else{
            $this->display();
        }


    }


    public  function reg(){
        if(session(C('USER_AUTH_KEY'))){

            $this->success("已登录");
        }else{
            $this->display();
        }


    }



    public  function loginCheck(){


        if(session(C('USER_AUTH_KEY'))){
            $this->success("已登录");
        }



        $data=I("post.");
        $data["password"]=md5( $data["password"]);
        $phoneP = '/^1[\d]{10}$/i';
        $nameP='/^[a-z\d_]{5,20}$/i';


        if(filter_var($data["card_num"], FILTER_VALIDATE_EMAIL)){
            $data["email"]=$data["card_num"];
            unset($data["card_num"]);
        }else if(preg_match($phoneP,$data["card_num"])==1){
            $data["phone"]=$data["card_num"];
            unset($data["card_num"]);
        }

        //dump($data);
        $User=M("User")->where($data)->find();
        if($User){
            session(C('USER_AUTH_KEY'),$User["id"]);
            $this->success("登陆成功！");

        }else{
            $this->error("密码或会员卡号错误！或联系柜台给予激活。");

        }

    }
    public  function regCheck(){
        $data=I('post.');
        if($data["password"]==$data["password2"]){
            $data["password"]=md5( $data["password"]);
        }
        unset($data["password2"]);
        $User=M('User')->data($data)->add();
        ///dump($User);
        if($User){

            session(C('USER_AUTH_KEY'),$User["id"]);
            $this->success("注册成功！");
        }else{
            $this->error("注册失败，请稍后再试！");
        }


    }


    public  function valid(){
       $typeName=I('get.type');
        $typeValue=I('post.param');

        if(M('User')->where($typeName."='".$typeValue."'")->find()){

            $this->error("已经被注册");

        }else{
            $this->success("可以使用！");
        }

    }


    public function change(){
	
	
		$data=I('post.');
		//dump($data);
	    //dump(session(C('USER_AUTH_KEY')));

			$data["id"]=session(C('USER_AUTH_KEY'));
			if($data["password"]!=$data["password2"]){
				$this->error("两次输入的密码不一致");
			}elseif($data["password"]==$data["oldpassword"]){

                $this->error("新密码和旧密码相同");
            }
            else{
				$User=M("User");
				$olddata["id"]=$data["id"];
				$olddata["password"]=md5($data["oldpassword"]);
                dump($olddata);

				if($User->where($olddata)->find()){
					$User->password=md5($data["password"]);
					$d=$User->where("id=".$data["id"])->save();
					if($d){
						$this->success("修改成功，转到之前页面");
					}else{
						$this->error("修改不成功");
					}
					
				}else{
					$this->error("密码错误");
				}
			
			}


    }
  
	
}