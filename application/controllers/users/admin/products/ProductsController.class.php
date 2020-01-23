<?php

class ProductsController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }

    $productModel = new ProductModel();
    $products = $productModel->getAllProducts();
    return[
      'products'=>$products
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $productModel = new ProductModel();
    $productModel->addProduct($_POST, $_FILES);
    $products = $productModel->getAllProducts();
    return[
      'products'=>$products
    ];

  }
}
