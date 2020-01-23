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

  public function getOneLineById($get){
    $database = new Database();
    $sql = 'SELECT *
    FROM productline
    WHERE Id = ?';
    return $database->queryOne($sql, [$get]);
  }

  public function getAllReductions($get){
    $database = new Database();
    $sql = 'SELECT Id, Name, ProductLine, Photo, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp, (SalePrice * (1 - Reduction / 100)) AS reduc
    FROM products
    WHERE productLine = ?';
    return $database->query($sql, [$get]);
  }

  public function getAllReductionsBySearch($post){
    $database = new Database();
    $sql = 'SELECT Id, Name, ProductLine, Photo, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp, (SalePrice * (1 - Reduction / 100)) AS reduc
    FROM products
    WHERE productLine LIKE "%"?"%" || Name LIKE "%"?"%"';
    return $database->query($sql, [$post['search'], $post['search']]);
  }

  public function getOneReduction($get){
    $database = new Database();
    $sql = 'SELECT Id, Name, ProductLine, Photo, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp, (SalePrice * (1 - Reduction / 100)) AS reduc
    FROM products
    WHERE Id = ?';
    return $database->queryOne($sql, [$get]);
  }

  public function updateProduct($post, $files)
  {
    $database = new Database();
    if (empty($files["photo"]["name"])) {
      $database->executeSql('UPDATE products
      SET Name = ?, Description = ?, QuantityInStock = ?, BuyPrice = ?, SalePrice = ?, Reduction = ?
      WHERE Id = ?', [
      $post["name"],
      $post["description"],
      $post["quantityInStock"],
      $post["buyprice"],
      $post["saleprice"],
      $post["reduction"],
      $post['id']]
      );
    } else {
      $database->executeSql('UPDATE products
        SET Name = ?, Description = ?, Photo = ?, QuantityInStock = ?, BuyPrice = ?, SalePrice = ?, Reduction = ?
        WHERE Id = ?', [
        $post["name"],
        $post["description"],
        $files["photo"]["name"],
        $post["quantityInStock"],
        $post["buyprice"],
        $post["saleprice"],
        $post["reduction"],
        $post['id']]
        );
    }
    $http = new HTTP();
    $http->moveUploadedFile("photo", "/images/pc/buy");
    $http->redirectTo("/users/admin/products");
  }
  public function deleteProduct($get)
  {
    $database = new Database();
    $database->executeSql('DELETE
    FROM products
    WHERE Id = ?',
    [$get]);
    $http = new Http();
    $http->redirectTo('users/admin/products');
  }

  public function addProduct($post, $files)
  {
    if (empty($files['photo']['name'])) {
      $files['photo']['name'] = null;
    }
    $database = new Database();
    $database->executeSql("INSERT INTO products (Name, Photo, ProductLine, Description, QuantityInStock, BuyPrice, SalePrice, Reduction, CreationTimestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())", [
    $post["name"],
    $files["photo"]["name"],
    $post["type"],
    $post["description"],
    $post["quantityInStock"],
    $post["buyprice"],
    $post["saleprice"],
    $post["reduction"]
    ]);
    $http = new HTTP();
    $http->moveUploadedFile("photo", "/images/pc/buy");
    $http->redirectTo("/users/admin/products");
    exit();
  }

  public function updateLine($post, $files)
  {
    $database = new Database();
    if (empty($files["image"]["name"])) {
      $database->executeSql('UPDATE productline
      SET productLine = ?, Resume = ?, Title = ?
      WHERE Id = ?', [
      $post["productline"],
      $post["resume"],
      $post["title"],
      $post['id']]
      );
    } else {
      $database->executeSql('UPDATE productline
      SET productLine = ?, Resume = ?, Title = ?, Image = ?
        WHERE Id = ?', [
          $post["productline"],
          $post["resume"],
          $post["title"],
          $files['image']['name'],
          $post['id']]
        );
    }
    $http = new HTTP();
    $http->moveUploadedFile("image", "/images/pc/lines");
    $http->redirectTo("/users/admin/categories");
  }

  public function addLine($post, $files)
  {
    if (empty($files['image']['name'])) {
      $files['image']['name'] = null;
    }
    $database = new Database();
    $database->executeSql("INSERT INTO productline (productLine, Resume, Title, Image) VALUES (?, ?, ?, ?)", [
    $post["productline"],
    $post["resume"],
    $post["type"],
    $files["image"]["name"]
    ]);
    $http = new HTTP();
    $http->moveUploadedFile("image", "/images/pc/lines");
    $http->redirectTo("/users/admin/categories");
    exit();
  }
}


?>
