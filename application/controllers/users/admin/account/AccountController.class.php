<?php

class AccountController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true || $_SESSION['role'] != 'admin') {
        $http->redirectTo('/');
      }
      $userModel = new UserModel();
      $users = $userModel->getAllUsers();
      return[
        'users'=>$users
      ];


    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
