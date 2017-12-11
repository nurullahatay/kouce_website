<?php

session_start();


    if($_SESSION["yetki"]!=0)
    {
        header("location:../index.php");
    }

include '../db/baglan.php';

$id = $_GET["id"];

$silDuy = $db->query("update duyurular set aktif=0 where id='{$id}'")->fetch(PDO::FETCH_ASSOC);

header("location:paylas.php");