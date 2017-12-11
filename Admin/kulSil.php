<?php


include '../db/baglan.php';

$silID = $_GET["id"];

$silKul = $db->query("update kullanicilar set aktif = 0 where id='{$silID}'")->fetch(PDO::FETCH_ASSOC);

if(isset($silKul))
{
  header("location:kullanicilar.php");
}
