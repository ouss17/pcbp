<?php

class DeleteController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }
    $userModel = new UserModel();
    $userModel->deleteUser($_GET['id']);


  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }
}
