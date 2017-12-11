<?php

include '../db/baglan.php';

$id = @$_GET["id"];


$duzDuy = $db->query("select * from duyurular where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
if(!isset($id) || $duzDuy==null)
{
    header("location:index.php");
}
if(!empty($_POST))
{
    $baslik = $_POST["baslik"];
    $bitTarih = $_POST["bitTarih"];
    $icerik = $_POST["icerik"];
    $link = @$_POST["link"];

if(!isset($id) || $duzDuy==null)
{
    header("location:index.php");
}

    if(strcmp($baslik, $duzDuy["baslik"])){
        $a = $db->query("update duyurular set baslik = '{$baslik}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if($bitTarih != $duzDuy["bitTarih"]){
        $a = $db->query("update duyurular set bitTarih = '{$bitTarih}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
   } 
    if(strcmp($icerik , $duzDuy["icerik"])){
        $a = $db->query("update duyurular set icerik = '{$icerik}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if(strcmp($link, $duzDuy["link"])){
        $a = $db->query("update duyurular set link = '{$link}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
       
  header("location:paylas.php");
}