<?php

class ProfilController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if (array_key_exists('role', $_SESSION) === false) {
        $http->redirectTo('/users/login');
      }
      $orderModel = new OrderModel();
      $orders = $orderModel->getOwnOrder();
      return [
        'orders'=>$orders
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $userModel = new UserModel();
      $userModel->updateUser($_POST);
      $orderModel = new OrderModel();
      $orders = $orderModel->getOwnOrder();
      return [
        'orders'=>$orders
      ];


    }
}
