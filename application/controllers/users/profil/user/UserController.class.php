<?php

class UserController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || $_SESSION['role'] === 'user' || $_SESSION['role'] === 'admin') {
          $http->redirectTo('/');
      }
      $userModel = new UserModel();
      $userModel->updateRoleToUser();

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
