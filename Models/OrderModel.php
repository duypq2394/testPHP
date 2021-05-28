<?php
namespace App\Models;
use App\Entities\OrderEntity;
class OrderModel extends BaseModel {
    function GetOrders() {
    }
    function InsertOrder(OrderEntity $order) {
        echo '<script>';
        echo 'console.log('. json_encode( $order ) .')';
        echo '</script>';
        $sql = "INSERT INTO ordercoffee (clientName, clientPhoneNumber, orderContent, price, date)
                    VALUES (?,?,?,?,?,?,?)";

        $dbh= $this->db->prepare($sql);
        
        $dbh->execute([$order->clientName, $order->clientPhoneNumber, $order->orderContent, $order->price, $order->date]);
    }
    function DeleteOrder() {
    }
}
?>