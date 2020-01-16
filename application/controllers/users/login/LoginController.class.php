<?php

class LoginController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {

    if (array_key_exists('role', $_SESSION) === true) {
      $http->redirectTo('/');
    }

    $error = null;
    return[
      'error'=>$error
    ];

  }

  public function httpPostMethod(Http $http, array $formFields)
  {

    $error = null;
    $userModel = new UserModel();
    $error = $userModel->logUser($_POST);
    if (array_key_exists('role',$_SESSION) === false) {
      return[
        'error'=>$error
      ];
    }

  }
}
