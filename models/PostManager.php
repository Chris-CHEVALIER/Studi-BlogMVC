<?php 
require_once("models/Manager.php"); // appelle de la classe mère

class PostManager extends Manager
{
  // Récupération de la liste des 5 derniers posts 
  public function getPosts()
  {
      $db = $this->dbConnect();
      $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

      return $req;
  }

  // Récupération du post selon son id
  public function getPost($postId)
  {
      $db = $this->dbConnect();
      $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
      $req->execute(array($postId));
      $post = $req->fetch();

      return $post;
  }

  public function postPost($redactor, $title, $content, $image)
  {
      $db = $this->dbConnect();
      $posts = $db->prepare('INSERT INTO posts(redactor, title, content, image, created_date) VALUES(?, ?, ?, ?, NOW())');
      $lines = $posts->execute(array($redactor, $title, $content, $image));

      return $lines;
  }
}

?>


