<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Company;
use Model\User;


class UserController extends Controller {
    static $template = 'Layout/base.html.php';

    function indexAction() {
      $otro = $this->get('otro');
      $company = new Company;
      $user = new User;
      #$user->create(['nombre'=>'katherine']);

      return [
        'list'=> $user->select(['id', 'nombre']),
        'user'=> $user,
      ];
    }

    function newAction(){

      return [];
    }

    function signupAction(){

      return [];
    }

    
}
