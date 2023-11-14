<?php

$dsn = "mysql:host=localhost:3307;dbname=to_do_list";

$dbusername = "root";
$dbpassword = "root_password14";

try {
  $pdo = new PDO($dsn, $dbusername, $dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
