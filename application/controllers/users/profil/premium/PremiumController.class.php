<?php

class PremiumController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || $_SESSION['role'] === 'premium' || $_SESSION['role'] === 'admin') {
          $http->redirectTo('/');
      }
      $userModel = new UserModel();
      $userModel->updateRoleToPremium();

    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
