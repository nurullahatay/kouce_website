<?php
session_start();


    if($_SESSION["yetki"]!=1)
    {
        header("location:../index.php");
    }
include '../db/baglan.php';
include '../turkcetarih.php';

$genel = $db->query("select * from duyurular where kID='{$_SESSION["id"]}' and aktif=1",PDO::FETCH_ASSOC);
if(!empty($_POST))
{
    $baslik = $_POST["baslik"];
    $bitTarih = $_POST["bitTarih"];
    $icerik = $_POST["icerik"];
    $link = @$_POST["link"];
    $aktif = 1;
    $tur = $_POST["tur"];
    $kID = $_SESSION["id"];
    
    $ekle = $db->prepare("insert into duyurular set baslik = ?,bitTarih = ?,icerik = ?,link = ? , aktif = ?,tur = ? , kID = ?");
    $ekle->execute(array($baslik ,$bitTarih ,$icerik,$link , $aktif, $tur , $kID));    
    if($ekle)
    {
        header("location:paylas.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Kocaeli Üniversitesi</title>
        <meta name="description" content="Installation Documentation for your Bootstrap Template" />
        <meta name="robots" content="noindex, nofollow">
        <!-- Responsive Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Stylesheets -->
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    </head>
    
    <body data-spy="scroll" data-target="#sidebar-menu">
        <!-- Header for Screens Small or Extra Small -->
        <header class="nav-scope navbar navbar-default navbar-static-top hidden-lg hidden-md" role="banner">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
                
                    <nav class="collapse navbar-collapse" role="navigation">
                        <ul class="nav navbar-nav hidden-md">
                            <li><a href="index.php"><?php echo $_SESSION["adSoyad"]; ?></a>
                            <li><a href="kullanicilar.php">Kullanıcılar</a></li>
                            <li><a href="slider.php">Slider</a></li>
                            <li><a href="paylas.php">Paylaş</a></li>
                            <li><a href="unvan.php">Ünvanlar</a></li>
                            <li><a href="../logout.php">Çıkış</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <!-- Showcase Header for screen sizes Medium or Large-->
            
            <!-- Begin Body -->
            <div class="container">
                <div class="row">
				 <div class="logo">
                            <a href="index.html" title="">
                                <img src="assets\img\kou-logo.png" alt="Logo" width="100" height="100" style="margin-left:50px" >
                            </a>
                                <h1 style="margin-top:-85px;margin-left:150px">Kocaeli Üniversitesi <br> <b>Bilgisayar</b> Mühendisliği</h1>

                        </div>
                    <!-- Sidebar -->
                    <div class="col-md-3" style="margin-top:20px" >
                        <div class="well hidden-sm hidden-xs" id="sidebar-menu" data-spy="affix" data-offset-top="330">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="index.php"><?php echo $_SESSION["adSoyad"]; ?></a></li>
                                <li><a href="kullanicilar.php">Kullanıcılar</a></li>
                                <li><a href="slider.php">Slider</a></li>
                                <li><a href="paylas.php">Paylaş</a></li>
                                <li><a href="unvan.php">Ünvanlar</a></li>
                                <li><a href="../logout.php">Çıkış</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="col-md-9" style="margin-top:20px">
                        <!-- Overview -->
                        <div class="well well-scope" id="overview">
                            <h3 class="margin-bottom-20">Duyurular</h3>
                            <p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Yeni Duyuru Oluştur</button></p>
                            
                            <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                            
                            <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Yeni Duyuru Oluştur</h4>
                                      </div>
                                      <div class="modal-body">
                                     <p>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label for="dyr">Duyuru Türü</label>
                                                <select class="form-control" name="tur" id="dyr">
                                                    <option value="1">Genel Duyuru</option>
                                                    <option value="2" >Bölüm Duyurusu</option>
                                                    <option value="3" >Etkinlik ve Haber</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <label>Başlık</label>
                                              <input type="text" name="baslik" class="form-control" placeholder="Başlık"/>
                                            </div>
                                             <div class="form-group">
                                              <label>İçerik</label>
                                              <textarea rows="5" cols="50" name="icerik" class="form-control" placeholder="İçerik"></textarea>    
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Bitiş Tarih</label>
                                              <input type="date" name="bitTarih" class="form-control" placeholder="Tarih"/>
                                            </div>
                                              <div class="form-group">
                                                  <label>Link</label>
                                                  <input type="text" name="link" class="form-control" placeholder="Link"/>
                                              </div>
                                             

                                                  <button type="submit" class="btn btn-success pull-right">Kaydet</button>
                                          </form>
                                      </p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            
                            <table class="table table-striped table-bordered table-hover">
				<tr>
                                    <th>#</th>
                                    <th>Başlık</th>
                                    <th>Başlangıç Tarihi</th>
                                    <th>Bitiş Tarih</th>
                                    <th>Duyuru Türü</th>
                                    <th>Link</th>				
				</tr>
                                <?php
                                    
                                   $i = 1;
                                   foreach($genel as $item){
                                       
                                       echo '<tr>
                                                 <th>
                                                 '.$i.'
                                                 </th>
                                                 <td>
                                                 '.$item["baslik"].'
                                                 </td>
                                                 <td>
                                                 '.turkcetarih('j F Y',$item["basTarih"]).'
                                                 </td>
                                                 <td>
                                                 '.turkcetarih('j F Y',$item["bitTarih"]).'
                                                 </td>
                                                 <td>';
                                                 if($item["tur"]==1)
                                                     echo 'Genel Duyuru';
                                                 else if($item["tur"] == 2)
                                                     echo 'Bölüm Duyurusu';
                                                 else
                                                     echo 'Etkinlik ve Haberler';
                                                 
                                                echo ' </td>
                                                 <td>
                                                 '.$item["link"].'
                                                 </td>
                                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#silModal'.$item["id"].'">Sil</button>
                                                       

                                            </td>
                                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#duzModal'.$item["id"].'">Düzenle</button>
                                            </td>
                                            </tr>
                                            <!-- Modal -->
                                                    <div id="silModal'.$item["id"].'" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title" style="color:red">Emin Misiniz?</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            <p style="color:red"><strong>'.$item["baslik"].'</strong> Siliniyor...</p>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <a href="silDuy.php?id='.$item["id"].'" class="btn btn-danger">Sil</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                                          </div>
                                                        </div>

                                                      </div>
                                                    </div> 
                                                    <!-- Modal -->
                                                    <div id="duzModal'.$item["id"].'" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Yeni Duyuru Oluştur</h4>
                                      </div>
                                      <div class="modal-body">
                                     <p>
                                        <form action="duyDuzenle.php?id='.$item["id"].'" method="post">
                                            <div class="form-group">
                                                <label for="dyr">Duyuru Türü</label>
                                                <select class="form-control" name="tur" id="dyr">
                                                    <option value="1" >Genel Duyuru</option>
                                                    <option value="2" >Bölüm Duyurusu</option>
                                                    <option value="3" >Etkinlik ve Haber</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                              <label>Başlık</label>
                                              <input type="text" name="baslik" value="'.$item["baslik"].'" class="form-control" placeholder="Başlık"/>
                                            </div>
                                             <div class="form-group">
                                              <label>İçerik</label>
                                              <textarea rows="5" cols="50" name="icerik" class="form-control" placeholder="İçerik">'.$item["icerik"].'</textarea>    
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Bitiş Tarih</label>
                                              <input type="date" name="bitTarih" value="'.$item["bitTarih"].'" class="form-control" placeholder="Tarih"/>
                                            </div>
                                              <div class="form-group">
                                                  <label>Link</label>
                                                  <input type="text" name="link" value="'.$item["link"].'" class="form-control" placeholder="Link"/>
                                              </div>
                                             

                                                  <button type="submit" class="btn btn-info pull-right">Güncelle</button>
                                          </form>
                                      </p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                                      </div>
                                                    </div>';
                                       $i++;
                                       
                                       
                                   }
                                    
                                
                                
                                
                                ?>
								
                            </table>
                        </div>
                        
                </div>
            </div>
            </div>
            <!-- load required scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script>
            $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
            $('html,body').animate({
            scrollTop: target.offset().top
            }, 1000);
            return false;
            }
            }
            });
            });
            </script>
            <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
        </body>
    </html>