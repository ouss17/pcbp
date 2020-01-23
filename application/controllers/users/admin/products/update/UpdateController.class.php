<?php

class UpdateController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $productModel = new ProductModel();
    $product = $productModel->getOneProduct($_GET['id']);
    return['product'=>$product];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    $productModel = new ProductModel();
    $productModel->updateProduct($_POST, $_FILES);


  }
}
