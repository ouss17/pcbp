<?php

class UpdateController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
        $http->redirectTo('/');
      }

      $productModel = new ProductModel();
      $line = $productModel->getOneLineById($_GET['id']);
      return['line'=>$line];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $productModel = new ProductModel();
      $productModel->updateLine($_POST, $_FILES);

    }
}
