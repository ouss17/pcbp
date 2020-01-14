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
      FROM products';
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
  }

?>
