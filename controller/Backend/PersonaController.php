<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Entity\User;
/**
* 
*/
class PersonaController extends Controller
{
	
	static $template = 'Layout/base.html.php';
    
    function indexAction(){
        $user = new User;
        $users = $user-> getAll();

        return ["users" => $users];
    }

    function deleteAction(){
      $user_id = $_GET["id"];

      $user = new User;
      $user->delete($user_id);
      $this->redirect('/admin/persona?success=true');
    }
}