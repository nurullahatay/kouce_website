<?php


/** Veritabanı Bağlantı */
try{
    $db = new PDO("mysql:host=localhost;dbname=bil_duyuru;charset=utf8","root","");
} catch (PDOException $e) {
    print $e->getMessage();
}
