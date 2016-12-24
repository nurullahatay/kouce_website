<?php
session_start();
    include 'db/baglan.php';
    
    if(!empty($_POST))
    {
        $kAdi = @$_POST["kAdi"];
        $sifre = @$_POST["sifre"];
        
        if(!empty($kAdi) && !empty($sifre))
        {
            $sql_check = $db->prepare("select * from kullanicilar where kAdi=? and sifre=?");
            $sql_check->execute(array($kAdi,$sifre));
            $islem = $sql_check->fetch();


            if($islem && $islem["aktif"]){

                $_SESSION["kAdi"] = $islem["kAdi"];
                $_SESSION["adSoyad"] = $islem["adSoyad"];
                $_SESSION["yetki"] = $islem["yetki"];
                $_SESSION["id"] = $islem["id"];
                if($_SESSION["yetki"] == '1'){
                    header('location:Admin/index.php');
                }else if($_SESSION["yetki"]==0){
                    header("location:Uye/index.php");
                }
                else{
                    header("location:index.php");
                }
            }/**else{
                header("location:index.php");
            }*/
        }
    }
?>

<html>
<head>
<title>Sisteme Giriş</title>
<?php include 'header.php';?>

    
    
</head>    
<div id="header">
    <div class="container">
        <div class="row">
            <div class="logo">
                <a href="index.html" title="">
                    <img src="assets\img\kou-logo.png" alt="Logo" width="100" height="100" style="margin-left:-500px;margin-top:-25px"/></a>
                        <h1 style="margin-top:-40px;margin-left:-10px">Kocaeli Üniversitesi <br> <b>Bilgisayar</b> Mühendisliği</h1>

            </div>
         </div>
    </div>
</div>
<?php include 'navbar.php';?> 

<div id="content">
                <div class="container background-white">
                    <div class="container">
                        <div class="row margin-vert-30">
                            <!-- Login Box -->
                            <div class="col-md-6 col-md-offset-3 col-sm-offset-3">
                                <form action="" method="post" class="login-page">
                                    <div class="login-header margin-bottom-30">
                                        <h2>Sisteme Giriş</h2>
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <input placeholder="Kullanıcı Adı" name="kAdi" class="form-control" type="text">
                                    </div>
                                    <div class="input-group margin-bottom-20">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock"></i>
                                        </span>
                                        <input placeholder="Şifre" name="sifre" class="form-control" type="password">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-6 col-md-6">
                                            <button class="btn btn-primary pull-right" type="submit">Giriş Yap</button>
                                        </div>
                                    </div>                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <?php include 'footer.php';?>
        <?php include 'script.php';?>
    
</html>
