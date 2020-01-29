<?php

class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $productModel = new ProductModel();
      $commentModel = new CommentModel();
      $comments = $commentModel->getAllCommentsByProduct($_GET['id']);
      $product = $productModel->getOneProduct($_GET['id']);
      $reduc = $productModel->getOneReduction($_GET['id']);
      return[
        'comments'=>$comments,
        'product'=>$product,
        'reduc'=>$reduc
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
