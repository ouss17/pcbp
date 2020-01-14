<?php

class ProductsController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $productlines = $productModel->getAllProductLines();
      return[
        'productlines'=>$productlines
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
