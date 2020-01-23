<?php

class CategoriesController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
        $http->redirectTo('/');
      }

      $productModel = new ProductModel();
      $lines = $productModel->getAllProductLines();
      return['lines'=>$lines];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $productModel = new ProductModel();
      $lines = $productModel->getAllProductLines();
      $productModel->addLine($_POST, $_FILES);
      return['lines'=>$lines];

    }
}
