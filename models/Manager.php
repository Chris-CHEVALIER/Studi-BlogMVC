<?php

class Manager 
{
  // Connexion à la base de données, fonction dbConnect() à appeler dans les autres parties du code
  // protected pour être disponible dans les classes filles
  protected function dbConnect() 
  {
    $db = new PDO('mysql:host=localhost;dbname=blog_one;charset=utf8', 'root', 'root');
    return $db;
  }
}