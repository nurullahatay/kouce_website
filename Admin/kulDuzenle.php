<?php

include '../db/baglan.php';

$id = @$_GET["id"];


$duzKul = $db->query("select * from kullanicilar where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
if(!isset($id) || $duzKul==null)
{
    header("location:index.php");
}
if(!empty($_POST))
{
    $kAdi = $_POST["kAdi"];
    $adSoyad = $_POST["adSoyad"];
    $eposta = $_POST["eposta"];
    $unvan = $_POST["unvan"];


if(!isset($id) || $duzKul==null)
{
    header("location:index.php");
}

    if(strcmp($kAdi, $duzKul["kAdi"])){
        $a = $db->query("update kullanicilar set kAdi = '{$kAdi}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if(strcmp($adSoyad, $duzKul["adSoyad"])){
        $a = $db->query("update kullanicilar set adSoyad = '{$adSoyad}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
   } 
    if(strcmp($eposta , $duzKul["eposta"])){
        $a = $db->query("update kullanicilar set eposta = '{$eposta}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if(strcmp($unvan, $duzKul["unvanID"])){
        $a = $db->query("update kullanicilar set unvanID = '{$unvan}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
       
  header("location:kullanicilar.php");
}

