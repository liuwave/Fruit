<?php
namespace Admin\Controller;
use Admin\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }
    public function  loginout(){
        //dump(session());
        session(C('USER_AUTH_KEY'),null);
        session(null);
        $this->success("退出成功，转到首页",U('Home/Index/index'));


    }

    public  function login(){
        //dump(session());

        if(session(C('USER_AUTH_KEY'))){
            $this->success("已登录",U('Admin/index/index'));
        }else{

            $this->display();
        }



    }

    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->entry();
    }

    public  function loginCheck(){


        if(session(C('USER_AUTH_KEY'))){
            $this->success("已登录");
        }
        $data=I("post.");
        //dump($data);
        if(!check_verify($data["verify_code"])){
            $this->error("验证码错误");

        }else{

            unset($data["verify_code"]);

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
                $this->error("登陆错误");

            }

        }
    }

}