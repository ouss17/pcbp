<?php

class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $product = $productModel->getOneProduct($_GET['id']);
      return[
        'product'=>$product
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
