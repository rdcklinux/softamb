<?php
namespace Controller\Frontend;

use Library\Controller;
use Model\Entity\Persona;

class AuthController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction() {
    	$this->redirect('/frontend/auth/signin');
    }

    function signinAction(){
      return [
          'title'=> "Ingreso de Usuarios",
      ];
    }

    function doSigninAction(){
        $auth = $this->post('auth');
        $rut = str_replace("'","\'", $auth['rut']);
        $pwd = $auth['password'];
        $exists = $this->userExists($rut);

        if (empty($exists) ) {
            // User not found
            $_SESSION['message']='Usuario o password invalidos';
            unset($exists);
            $this->redirect('/frontend/auth/signin');
        }
        elseif ($exists['password'] !== sha1($pwd)) {
            // Invalid Password
            $_SESSION['message']='Usuario o password invalidos';
            unset($exists);
            $this->redirect('/frontend/auth/signin');
        }
        unset($exists['password']);
        $_SESSION['user'] = $exists;
        $this->redirect('/backend/welcome');
    }

    function logoutAction(){
      session_destroy();
      $this->redirect('/frontend');
    }

    private function userExists($rut){
        return (new Persona)->select('*', "rut='$rut' AND activo=1")->fetch();
    }

}
