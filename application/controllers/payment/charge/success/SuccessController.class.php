<?php

class SuccessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true) {
          $http->redirectTo('/');
      }

       $orderModel = new OrderModel();
       $orderModel->completeTimestamp();
       // $msg = "<p>Une commande a été effectué<p><p>Email : ".$_SESSION['email']." num commande :".$_GET['tid'];
       //
       // mail('diarraousmane37@gmail.com', 'commande passé num : '.$_GET['tid'], $msg);
       //
       // return ['num' => $_GET['tid']];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
