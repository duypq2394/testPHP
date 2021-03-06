<?php
namespace App\Controllers;

use App\Models\OrderModel;
use App\Entities\OrderEntity;
/**
  * Containing functions for the pages relating to order object
  */
class OrderController extends BaseController
{
    function CreateOrderList()
    {
        $orderModel = new OrderModel();

        $orderArray = $orderModel->GetOrders();
        $this->tpl->assign('orderArray', $orderArray);
        $result = $this->tpl->fetch('pages/listOrders.tpl');
        return $result;
    }

    function InsertOrder()
    {
        $orderModel = new OrderModel();
        
        $customerName = $_POST["customerName"];
        $phoneNumber = $_POST["phoneNumber"];
        $coffeeName = $_POST["txtName"];
        $price = $_POST["price"];
        $numberOrder = $_POST["numberOrder"];
        $currentDate = date("Y/m/d")."  hours:".date("h:i");
        $orderContent = "";
        $totalPayment;
        for($i = 0; $i < count($coffeeName); $i++)
        {
            if($numberOrder[$i] > 0){
                $orderContent = $orderContent."$numberOrder[$i] cups of $coffeeName[$i] \n";
            }
            
            $totalPayment = $totalPayment + $price[$i]*$numberOrder[$i];
        }

        if ($totalPayment == 0) return "Please chosse coffee";  
        
        if (empty($_POST["customerName"]) || empty($_POST["phoneNumber"])) return "Please enter phone number and name";

        if(!empty($orderContent)) {
            $order = new OrderEntity(-1, $customerName, $phoneNumber, $orderContent, $totalPayment, $currentDate);
            $orderModel->InsertOrder($order);
        }
    }

    function DeleteOrder($id)
    {
        $orderModel = new OrderModel();
        $orderModel->DeleteOrder($id);
    }
}
?>