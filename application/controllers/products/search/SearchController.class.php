<?php

class SearchController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $products = $productModel->getAllProductsByProductLine($_GET['result']);
      return[
        'products'=>$products
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $productModel = new ProductModel();
      $products = $productModel->getAllProductsBySearch($_POST);
      return[
        'products'=>$products
      ];

    }
}
