<?php

class DetailController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $id= $_GET['orderId'];
    $orderModel = new OrderModel() ;
    $orderdetail = $orderModel->getAllOrderDetail($id);
    $user = $orderModel->getUserAdminOrderInfo($id);
    $order = $orderModel->getTotalAmount($id);
    $totalAmount = $order['TotalAmount'];

    return [
                "user"=>$user,
                'orderdetail'=>$orderdetail,
                'totalAmount'=>$totalAmount
            ];



  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }
}
