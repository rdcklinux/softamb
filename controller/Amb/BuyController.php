<?php
namespace Controller\Shop;

use Library\Controller;
use Model\Entity\Order;
use Model\Entity\OrderDetail;
use Model\Entity\User;

class BuyController extends Controller {
    static $template ='Layout/base.html.php';

    function indexAction(){
        //debe verificar si el usuario esta en session.
        if(!isset($_SESSION['user']['id'])){
            $this->redirect('/shop/buy/auth');
        }
        return [
            'title'=>"La Tienda > Proceso de Compra",
        ];
    }

    function authAction(){
        return [];
    }

    function verifyAction(){
        if(!$this->isPOST()) $this->redirect('/shop/buy/auth');
        $auth = $this->post('auth');
        $email = $auth['email'];
        $pwd = $auth['password'];
        $email = str_replace("'","\'", $email);
        $user = new User;

        $exists = $user->select(['id','password','email', 'fullname', 'is_admin'], "email='$email'")->fetch();
        if(empty($exists)) {
            if((int)$auth['method'] != 2) {
                $_SESSION['message']='Usuario o password invalido!';
                $this->redirect('/shop/buy/auth');
            }
            $exists = [
                'email'=>$email,
                'password'=>sha1($pwd),
                'is_admin'=>'0',
                'vcard'=>null,
                'address'=>null,
            ];
            $user->create($exists);
            $exists['id']=$user->getLastId();
        } else {
            if((bool)(int)$exists['is_admin']){
                $_SESSION['message']='Usuario o password invalido!';
                unset($exists);
                $this->redirect('/shop/buy/auth');
            }

            if((int)$auth['method'] != 1){
                $_SESSION['message']='Usuario o password invalido!';
                unset($exists);
                $this->redirect('/shop/buy/auth');
            }
            if($exists['password'] !== sha1($pwd)){
                $_SESSION['message']='Usuario o password invalido!';
                unset($exists);
                $this->redirect('/shop/buy/auth');
            }
        }
        $_SESSION['user'] = $exists;
        $this->redirect('/shop/buy');
    }

    function paymentAction(){
        if(!$this->isPOST()) $this->redirect('/shop/buy');
        $payment = $this->post('pay');
        $vcard = null;
        $address = null;
        if((int)$payment['type'] == 1){
            $vcard = $payment['vcard'];
        }
        if((int)$payment['delivery'] == 2){
            $address = $payment['address'];
        }
        (new User)->update((int)$_SESSION['user']['id'], ['vcard'=>$vcard,'address'=>$address]);
        $_SESSION['payment'] = $payment;
        $this->redirect('/shop/buy/summary');
    }

    function summaryAction(){
        $payment=$_SESSION['payment'];
        $cart=$_SESSION['cart'];
        $sum=0;
        foreach($cart as $item){
            $sum += $item['price'] * $item['quantity'];
        }
        $total = $sum * 1.19 + ($payment['delivery']==2?1000:0);
        $type = ($payment['type']==1?'Pago en Linea (TC) N°:':'Pago en tienda');
        $delivery = ($payment['delivery']==1 || $payment['type']==2?'Retiro en Tienda':'Despacho Domicilio');
        $address = ($payment['delivery']==2?$payment['address']:null);

        return [
            'total'=>$total,
            'type'=>$type,
            'delivery'=>$delivery,
            'address'=>$address,
            'title'=>"La Tienda > Detalle de Compra",
        ];
    }

    function confirmAction(){
        if(!$this->isPOST()) $this->redirect('/shop/buy');
        $payment = $_SESSION['payment'];
        $order = new Order;
        $order->create([
            'status'=>1,
            'created_at'=>(new \DateTime())->format('Y-m-d H:i:s'),
            'user_id'=>$_SESSION['user']['id'],
            'payment_type'=>(int)$payment['type'],
            'payment_delivery'=>(int)$payment['delivery'],
            'delivery_address'=>$payment['address'],
        ]);
        $orderId = $order->getLastId();
        $detail = new OrderDetail;
        foreach($_SESSION['cart'] as $product){
            $detail->create([
                'product_id'=>$product['id'],
                'order_id'=>$orderId,
                'quantity'=>$product['quantity'],
                'price'=>$product['price'],
            ]);
        }
        unset($_SESSION['cart'], $_SESSION['payment']);
        $this->redirect('/shop/buy/success');
    }

    function successAction(){
        return [
            'title'=>"La Tienda > Compra Exitosa",
        ];
    }
}
