<?php

class DeleteController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $productModel = new ProductModel();
    $productModel->deleteProduct($_GET['id']);


  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }
}
