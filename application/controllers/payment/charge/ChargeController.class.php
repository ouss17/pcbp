<?php

class ChargeController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true) {
          $http->redirectTo('/');
      }


    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        $orders = json_decode($_POST['orders']);

        $totalAmount = 0;


        $productModel = new ProductModel();
        if ($_SESSION['role']==='user') {
          foreach($orders as $order) {
            $product = $productModel->getOneProduct($order->productId);

            $order->safePrice = $product['SalePrice'];
            $totalAmount += ($order->safePrice*$order->quantity);
          }
        }
        elseif($_SESSION['role']==='premium'){
          foreach($orders as $order) {
            $product = $productModel->getOneReduction($order->productId);

            $order->safePrice = $product['reduc'];
            $totalAmount += ($order->safePrice*$order->quantity);
          }
        }


        $orderModel = new OrderModel();
        $orderModel->saveOrder($orders, $_SESSION['id'], $totalAmount);

try {

        \Stripe\Stripe::setApiKey('sk_test_dVBW5iFKvqM7MKi4KUbzWPid00lXlmQMmf');


        $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
        var_dump($_POST);

        $email = $_SESSION['email'];
        $token = $_POST['stripeToken'];


        $customer = \Stripe\Customer::create(array(
          "email" => $email,
        	"source" => $token
        ));

        $charge = \Stripe\Charge::create(array(
        	"amount" => $totalAmount * 100,
        	"currency" => "eur",
        	"description"=>"Commande ok",
        	"customer" => $customer->id
        ));


        $http->redirectTo('payment/charge/success?tid='.$charge->id.'&product='.$charge->decription);

      } catch (Exception $error) {
        $errorMessage = "Le paiement a échoué";
              if($error->httpStatus == 402) {
                  $errorMessage = "Votre carte a malheureusement été refusé merci de tester une autre carte";
              } else {
                  $errorMessage = "le paiement a échoué a malheureusement échoué, merci de tester ultérieurment";
              }

              return ['errorMessage' => $errorMessage];
      }


    }
}
