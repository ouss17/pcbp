<?php

class HomeController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $productModel = new productModel();
    $products = $productModel->getAllProducts();
    return[
      'products'=>$products
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }

}
