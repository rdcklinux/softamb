<?php
namespace Model\Entity;

use Library\Repository;
use Library\Database;

class Order extends Repository {
    protected $table = 'cash_order';

    public function getOrderDetails($orderId){
        $sqlOderDetail = "
            SELECT
                od.id, p.name, od.quantity, od.price
            FROM order_detail od
            JOIN product p ON od.product_id = p.id AND od.order_id=:order_id
        ";
        $sqlOderDetail = str_replace(':order_id', (int)$orderId, $sqlOderDetail);

        return $this->customQuery($sqlOderDetail);
    }

    public function getAllOrderForUser($userId){
        $sqlAllOders = "
            SELECT
                o.id, o.status, o.created_at,
                payment_delivery, payment_type,
                delivery_address
            FROM $this->table o
            WHERE o.user_id=:user_id
        ";
        $sqlAllOders = str_replace(':user_id', (int)$userId, $sqlAllOders);

        return $this->customQuery($sqlAllOders);
    }

    public function getAllOrders(){
      $query = "select * from cash_order;";
      $rows = (new Order)->customQuery($query);
      return $rows;

    }
}
