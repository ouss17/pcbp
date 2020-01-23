<?php
class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true) {
          $http->redirectTo('/');
      }



    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
