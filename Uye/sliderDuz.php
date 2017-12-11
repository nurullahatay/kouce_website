<?php

include '../db/baglan.php';

session_start();


    if($_SESSION["yetki"]!=0)
    {
        header("location:../index.php");
    }

$id = $_GET["id"];

$duzSlide = $db->query("select * from slider where id='{$id}'")->fetch(PDO::FETCH_ASSOC);

if(!empty($_POST))
{
    $baslik = $_POST["baslik"];    
    $icerik = $_POST["icerik"];
    $link = $_POST["link"];
    
    if(!isset($id) || $duzSlide==null)
{
    header("location:index.php");
}

    if(strcmp($baslik, $duzSlide["baslik"])){
        $a = $db->query("update slider set baslik = '{$baslik}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if(isset($_FILES["resim"])){
        
        $dizin = "img/slider/";
        $dosyaDizin = $dizin.basename($_FILES['resim']['name']);
        if(move_uploaded_file($_FILES['resim']['tmp_name'] , $dosyaDizin)){
            $isim= basename($_FILES['resim']['name']);
            $a = $db->query("update slider set resim = '{$isim}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
        }
                     
    } 
    if(strcmp($icerik , $duzSlide["icerik"])){
        $a = $db->query("update slider set icerik = '{$icerik}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
    if(strcmp($link, $duzSlide["link"])){
        $a = $db->query("update slider set link = '{$link}' where id='{$id}'")->fetch(PDO::FETCH_ASSOC);
    }
       
  header("location:slider.php");

}