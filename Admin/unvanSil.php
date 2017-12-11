<?php

session_start();

include '../db/baglan.php';


if($_SESSION["yetki"]!=1)
{
    header("location:../index.php");
}

$id=$_GET["id"];

$pasif = 0;

$sil = $db->prepare("update unvanlar set aktif=? where id=?");
$sil->execute(array($pasif,$id));

if($sil)
{
    header("location:unvan.php");
}
else{
    echo 'boyle bir kullanıcı bulunmamaktadır.';
}
