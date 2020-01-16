<?php

class ProductModel {

  public function getAllProductLines(){
    $database = new Database();
    $sql = 'SELECT *
    FROM productline';
    return $database->query($sql, []);
  }

  public function getAllProducts(){
    $database = new Database();
    $sql = 'SELECT *
    FROM products
    ORDER BY CreationTimestamp';
    return $database->query($sql, []);
  }

  public function getAllProductsByProductLine($get){
    $database = new Database();
    $sql = 'SELECT *
    FROM products
    WHERE productline = ?';
    return $database->query($sql, [$get]);
  }

  public function getAllProductsBySearch($post){
    $database = new Database();
    $sql = 'SELECT *
    FROM products
    WHERE productline LIKE "%"?"%" || Name LIKE "%"?"%"';
    return $database->query($sql, [$post['search'], $post['search']]);
  }

  public function getOneProduct($get){
    $database = new Database();
    $sql = 'SELECT *
    FROM products
    WHERE Id = ?';
    return $database->queryOne($sql, [$get]);
  }

  public function getOneLine($get){
    $database = new Database();
    $sql = 'SELECT *
    FROM productline
    WHERE Title = ?';
    return $database->queryOne($sql, [$get]);
  }
  public function getAllReductions($get){
    $database = new Database();
    $sql = 'SELECT Id, Name, ProductLine, Photo, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp, (SalePrice * (1 - Reduction / 100)) AS reduc
    FROM products
    WHERE productLine = ?';
    return $database->query($sql, [$get]);
  }

  public function getOneReduction($get){
    $database = new Database();
    $sql = 'SELECT Id, Name, ProductLine, Photo, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp, (SalePrice * (1 - Reduction / 100)) AS reduc
    FROM products
    WHERE Id = ?';
    return $database->queryOne($sql, [$get]);
  }
}


?>
