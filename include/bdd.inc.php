<?php
  $serveur = 'localhost';
  $db = 'rentfr';
  $user = 'root';
  $pass = 'root';
  $con = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);

 ?>