<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=business_card_manager;", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Error " .$e->getMessage();
}