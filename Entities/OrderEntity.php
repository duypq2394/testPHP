<?php
namespace App\Entities;
class OrderEntity
{
    public $id;
    public $clientName;
    public $clientPhoneNumber;
    public $orderContent;
    public $price;
    public $orderDate;

    
    function __construct($id, $clientName, $clientPhoneNumber, $orderContent, $price, $orderDate) {
        $this->id = $id;
        $this->clientName = $clientName;
        $this->clientPhoneNumber = $clientPhoneNumber;
        $this->orderContent = $orderContent;
        $this->price = $price;
        $this->orderDate = $orderDate;
    }
}
?>
