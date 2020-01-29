<?php

class CommentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true) {
        $http->redirectTo('/');
      }

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

      $commentModel = new CommentModel();
      $commentModel->AddComment($_POST);


    }
}
