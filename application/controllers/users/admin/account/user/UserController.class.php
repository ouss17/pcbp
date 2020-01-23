<?php

class UserController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if(empty($_SESSION) == true || $_SESSION['role'] !== 'admin') {
      $http->redirectTo('/');
    }

    $userModel = new UserModel();
    $user = $userModel->getOneUser($_GET['id']);
    return[
      'user'=>$user
    ];


  }

  public function httpPostMethod(Http $http, array $formFields)
  {



  }
}
