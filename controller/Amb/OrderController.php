<?php
namespace Controller\Shop;

use Library\Controller;
use Model\Entity\Order;

class OrderController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        $userId = $_SESSION['user']['id'];
        $orders = (new Order)->getAllOrderForUser($userId);

        $status = [
            1=>'Pendiente',
            2=>'En proceso',
            3=>'En despacho',
            4=>'Entregado',
            5=>'Devolución',
            6=>'Anulado',
        ];
        return [
            'orders'=>$orders,
            'status'=>$status,
            'title'=>"La Tienda > Listado de Ordenes de Compra",
        ];
    }


    function detailsAction(){
        $id = (int)$this->get('id');
        $order = new Order;
        $details = $order->getOrderDetails($id)->fetchAll();
        $order = $order->select(['id', 'payment_type', 'payment_delivery', 'delivery_address'], "id=$id");

        return [
            'details'=>$details,
            'order'=>$order->fetch(),
            'title' => 'Detalle Orden'
        ];
    }
}
