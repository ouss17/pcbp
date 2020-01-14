<?php

class LogoutController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      if(empty($_SESSION) == true) {
        $http->redirectTo('/');
      }
      session_destroy();
      $http->redirectTo('/users/login');



    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
