<?php
namespace Controller\Backend;

use Library\Controller;
use Model\Company;
use Model\User;


class GestorController extends Controller {
    static $template = 'Layout/base.html.php';
    
    function indexAction(){
        return [];
    }
}
