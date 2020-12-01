<?php
try {
  $pdo = new PDO('mysql:host=localhost;dbname=inquirer;charset=utf8', 'soraisu', 'sprwAeixb26vds');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo $e->getMessage();
  exit;
}
