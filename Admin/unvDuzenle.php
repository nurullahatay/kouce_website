<?php

include '../db/baglan.php';

$id = $_GET["id"];

if(!empty($_POST)){
    
    $unvanAdi = $_POST["unvan"];
    
    $unv = $db->query("update unvanlar set unvan='{$unvanAdi}' where id='{$id}'");
    
    header("location:unvan.php");
}
