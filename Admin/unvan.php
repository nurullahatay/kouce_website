<?php

session_start();


    if($_SESSION["yetki"]!=1)
    {
        header("location:../index.php");
    }
include '../db/baglan.php';

$unvanlar = $db->query("select * from unvanlar where aktif=1",PDO::FETCH_ASSOC);

if(!empty($_POST))
{
    $unvanAdi = $_POST["unvan"];
    
    $ekle = $db->query("insert into unvanlar set unvan='{$unvanAdi}' , aktif=1");
    
    header("location:unvan.php");
    
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
                            <h3 class="margin-bottom-20">Ünvanlar</h3>
                               <form action="" method="post" class="form-inline">
                                <div class="form-group">
                                  <label for="exampleInputName2">Ünvan Adı : </label>
                                  <input type="text" class="form-control" id="exampleInputName2" name="unvan" placeholder="Ünvan Adı"/>
                                </div>
                                <button type="submit" class="btn btn-success">Ünvan Oluştur</button>
                              </form>
                            <table style="margin-top: 20px" class="table table-striped table-bordered table-hover">
				<tr>
                                    <th>#</th>
                                    <th>Ünvan</th>									
				</tr>
                                <?php
                                $i = 1;
                                foreach ($unvanlar as $item)
                                {
                                    echo '<tr> 
                                            <th>'.$i.'</th>
                                            <td>'.$item["unvan"].'</td>
                                            <td><a href="unvanSil.php?id='.$item["id"].'" class="btn btn-danger">Sil</a></td>
                                            <td><button type="button" data-toggle="modal" data-target="#duzModal'.$item["id"].'" class="btn btn-info">Düzenle</button></td>
                                         </tr>';
                                    echo '
                                <!-- Modal -->
                                <div id="duzModal'.$item["id"].'" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Ünvan Adı Düzenle</h4>
                                      </div>
                                      <div class="modal-body">
                                     <p>
                                        <form action="unvDuzenle.php?id='.$item["id"].'" method="post">
                                            <div class="form-group">
                                              <label>Ünvan Adı</label>
                                              <input type="text" name="unvan" value="'.$item["unvan"].'" class="form-control" placeholder="Ünvan Adı"/>
                                            </div>
                                            <button type="submit" class="btn btn-success">Kaydet</button>
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