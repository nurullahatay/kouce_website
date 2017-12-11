<?php

include '../db/baglan.php';

if(!empty($_POST))
{
    $adSoyad = $_POST["adSoyad"];
    $kAdi = $_POST["kAdi"];
    $sifre = $_POST["sifre"];
    $eposta = $_POST["eposta"];
    $yetki = 0;
    $aktif = 1;
    $unvan = $_POST["unvan"];
    $ekle = $db->prepare("insert into kullanicilar set adSoyad = ?,kAdi = ?,sifre = ?,aktif = ?,eposta = ? , yetki = ?,unvanID = ?");
    $ekle->execute(array($adSoyad ,$kAdi ,$sifre ,$aktif,$eposta , $yetki, $unvan));
    if($ekle)
    {
        header("location:kullanicilar.php");
    }
}
