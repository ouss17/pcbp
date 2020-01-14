<?php

class RegisterController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    $error = null;
    return[
      'error'=>$error
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $error = null;
    $userModel = new UserModel();
    $error = $userModel->addUser($_POST);
    if (array_key_exists('role',$_SESSION) === false) {
      return[
        'error'=>$error
      ];
    }

  }
}
