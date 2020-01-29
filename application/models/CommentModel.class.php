<?php

  class CommentModel {

    public function getAllComments(){
      $database = new Database();
      $sql = 'SELECT *
      FROM comment
      ORDER BY CreationTimestamp';
      return $database->query($sql, []);
    }

    public function getAllCommentsByProduct($get){

      $database = new Database();
      $sql = 'SELECT *
      FROM comment
      WHERE Product_Id = ?';
      return $database->query($sql, [$get]);

    }

    public function addComment($post)
    {
      $database = new Database();
      $database->executeSql("INSERT INTO comment (Author, Comment, Title, Product_Id, CreationTimestamp) VALUES (?, ?, ?, ?, NOW())", [
      $_SESSION['pseudo'],
      $post["comment"],
      $post["title"],
      $post["product_id"]
      ]);
      $http = new HTTP();
      $http->redirectTo("/products/product?id=".$post['product_id']);
      exit();
    }

  }

?>
