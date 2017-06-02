<?php
namespace Controller\Frontend;

use Library\Controller;
use Model\Entity\Product;

class DefaultController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        $this->redirect('/frontend/auth/signin');
    }

}
