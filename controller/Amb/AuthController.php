<?php
namespace Controller\Shop;

use Library\Controller;
use Model\Entity\User;

class AuthController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction() {
    	$this->redirect('/shop/auth/signin');
    }


    function signupAction(){
      return [
          'title'=> "Registro Usuarios",
          'post'=> 'doSignup',
      ];
    }

    function signinAction(){
      return [
          'title'=> "Ingreso de Usuarios",
          'post'=> 'doSignin',
      ];
    }

    function doSignupAction(){
        $auth = $this->post('auth');
        $email = str_replace("'","\'", $auth['email']);
        $exists = $this->userExists($email);

        if(!empty($exists)) {
            $_SESSION['message']="Usurio o password invalidos";
            $this->redirect('/auth/signup');
        }
        $exists = [
            'email'=>$email,
            'password'=>sha1($auth['password']),
            'is_admin'=>0,
            'vcard'=>null,
            'address'=>null,
        ];
        $user = new User;
        $user->create($exists);
        $exists['id']=$user->getLastId();
        $_SESSION['user'] = $exists;

        $this->redirect('/shop/product');
    }

    function doSigninAction(){
        $auth = $this->post('auth');
        $email = str_replace("'","\'", $auth['email']);
        $pwd = $auth['password'];
        $exists = $this->userExists($email);

        if (empty($exists) ) {
            // User not found
            $_SESSION['message']='Usuario no registrado';
            unset($exists);
            $this->redirect('/shop/auth/signin');
        }
        elseif ($exists['password'] !== sha1($pwd)) {
            // Invalid Password
            $_SESSION['message']='Password invalido!';
            unset($exists);
            $this->redirect('/shop/auth/signin');
        }
        $_SESSION['user'] = $exists;
        $this->redirect('/shop/product');
    }

    function logoutAction(){
      unset($_SESSION['user']);
      $this->redirect('/shop/product');
    }

    private function userExists($email){
        return (new User)->select(['id','password','email', 'fullname', 'is_admin'], "email='$email'")->fetch();
    }

}
