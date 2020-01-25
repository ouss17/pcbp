<?php

class DetailController
{

      public function httpGetMethod(Http $http, array $queryFields)
      {
        if(empty($_SESSION) == true) {
            $http->redirectTo('/');
        }
        $orderModel = new OrderModel();
        $orderlines = $orderModel->getOwnOrderLine($_GET['id']);
        return [
          'orderlines'=>$orderlines
        ];
      }

      public function httpPostMethod(Http $http, array $formFields)
      {



      }
}

?>
