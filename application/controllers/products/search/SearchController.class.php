<?php

class SearchController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $products = $productModel->getAllProductsByProductLine($_GET['result']);
      $line = $productModel->getOneLine($_GET['result']);
      $reducs = $productModel->getAllReductions($_GET['result']);
      return[
        'products'=>$products,
        'reducs'=>$reducs,
        'line'=>$line
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $productModel = new ProductModel();
      $products = $productModel->getAllProductsBySearch($_POST);
      $reducs = $productModel->getAllReductionsBySearch($_POST);
      if ($_POST['search'] === " ") {
        $http->redirectTo('/products');
      }
      return[
        'reducs'=>$reducs,
        'products'=>$products
      ];

    }
}
