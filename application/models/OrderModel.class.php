<?php

  class OrderModel {

    public function saveOrder($orders, $userId, $totalAmount) {
      $database = new Database();
      $sql = "INSERT INTO `orders` (User_Id, CreationTimestamp) VALUES ( ?, NOW() )";

      $values = [ $userId ];

      $orderId = $database->executeSql($sql, $values);

      foreach($orders as $order) {
        $sql = "INSERT INTO orderline (Quantity_ordered	,Product_Id, Order_Id, PriceEach) VALUES (?, ?, ?, ?)";
        $values = [ $order->quantity, $order->productId, $orderId, $order->safePrice ];
        $database->executeSql($sql, $values);
      }


      $sql = "UPDATE `orders` SET totalAmount=?, taxAmount=?, taxRate=? WHERE id= ?";

      $taxRate = 20;
      $taxAmount = $totalAmount * $taxRate;


      $database->executeSql($sql, [ $totalAmount, $taxAmount, $taxRate, $orderId  ]);
    }

    public function getAllOrders(){
      $database = new Database();
      $sql = 'SELECT *
      FROM orders
      ORDER BY CreationTimestamp';
      return $database->query($sql, []);
    }

    public function getOwnOrder(){

      $database = new Database();
      $sql = 'SELECT *
      FROM orders
      WHERE User_Id = ?';
      return $database->query($sql, [$_SESSION['id']]);

    }

    public function getOwnOrderLine($id){
      $database = new Database();
      $sql = 'SELECT orderline.Id, Product_Id, Quantity_Ordered, PriceEach, Order_Id,
      Name, Photo
      FROM orderline
      INNER JOIN products ON orderline.Product_Id = products.Id
      WHERE Order_Id = ?';
      return $database->query($sql, [$id]);
    }

    public function getAllOrderDetail($id) {
      $database = new Database();

      $sql = "SELECT orderline.Id, Quantity_ordered, PriceEach, Name, Photo
      FROM
      orderline
      INNER JOIN
      products
      ON
      orderline.Product_Id = products.Id
      WHERE Order_Id= ? ";

      return $database->query($sql, [$id]);
    }


    public function getUserAdminOrderInfo($id) {
      $database = new Database();

      $sql = "SELECT User_Id FROM orders WHERE Id = ?";

      $user = $database->queryOne($sql, [$id]);

      $sql2 = "SELECT * FROM users WHERE Id = ?";

      return  $database->queryOne($sql2, [ $user['User_Id'] ]);

    }

    public function getTotalAmount($id) {
      $database = new Database();

      $sql = "SELECT TotalAmount FROM orders WHERE Id = ?";

      return $database->queryOne($sql, [$id]);
    }

    public function completeTimestamp(){

      $database = new Database();
      $user = $database->queryOne('SELECT Id
        FROM orders
        WHERE User_Id = ?',
        [$_SESSION['id']]);

        $sql = "UPDATE `orders` SET CompleteTimestamp = NOW() WHERE Id= ?";
        $database->executeSql($sql, [$user['Id']]);
      }

  }

?>
