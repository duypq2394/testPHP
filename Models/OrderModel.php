<?php
namespace App\Models;
use App\Entities\OrderEntity;
class OrderModel extends BaseModel {
    function GetOrders() {
        $dbh = $this->db->prepare("SELECT * FROM ordercoffee");
        $dbh->execute();
        $orderArray = array();

        //Get data from database.
        foreach ($dbh->fetchAll() as $row) {
            $id = $row[0];
            $clientName = $row[1];
            $clientPhoneNumber = $row[2];
            $orderContent = $row[3];
            $price = $row[4];
            $orderDate = $row[5];

            //Create coffee objects and store them in an array.
            $order = new OrderEntity ($id, $clientName, $clientPhoneNumber, $orderContent, $price, $orderDate);
            array_push($orderArray, $order);
        }
        return $orderArray;
    }
    function InsertOrder(OrderEntity $order) {
        
        $sql = "INSERT INTO ordercoffee (clientName, clientPhoneNumber, orderContent, price, orderDate)
                    VALUES (?, ?, ?, ?, ?)";

        $dbh= $this->db->prepare($sql);
       
        $dbh->execute([$order->clientName, $order->clientPhoneNumber, $order->orderContent, $order->price, $order->orderDate]);
    }
    function DeleteOrder($id) {
        $dbh = $this->db->prepare("DELETE FROM ordercoffee WHERE id = $id");
        $dbh->execute();
    }
}
?>