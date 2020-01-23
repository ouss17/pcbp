<?php

class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $product = $productModel->getOneProduct($_GET['id']);
      $reduc = $productModel->getOneReduction($_GET['id']);
      return[
        'product'=>$product,
        'reduc'=>$reduc
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
