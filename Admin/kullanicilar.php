<?php
session_start();

if($_SESSION["yetki"]!=1)
    {
        header("location:../index.php");
    }

include '../db/baglan.php';

$kullanicilar = $db->query("select * from kullanicilar where aktif='1'",PDO::FETCH_ASSOC);
$unvanlar = $db->query("select * from unvanlar where aktif='1'",PDO::FETCH_ASSOC);

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
                            <h3 class="margin-bottom-20">Kullanıcılar</h3>
                            <p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Yeni Kullanıcı Oluştur</button></p>
                            
                            
                           
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Yeni Kullanıcı Oluştur</h4>
                                      </div>
                                      <div class="modal-body">
                                     <p>
                                        <form action="kulEkle.php" method="post">
                                            <div class="form-group">
                                              <label>Kullanıcı Adı</label>
                                              <input type="text" name="kAdi" class="form-control" placeholder="Kullanıcı Adı"/>
                                            </div>
                                             <div class="form-group">
                                              <label>Ad Soyad</label>
                                              <input type="text" name="adSoyad" class="form-control" placeholder="Ad Soyad"/>
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputPassword1">Şifre</label>
                                              <input type="password" name="sifre" class="form-control" id="exampleInputPassword1" placeholder="Şifre"/>
                                            </div>
                                              <div class="form-group">
                                                  <label>E-Posta</label>
                                                  <input type="text" name="eposta" class="form-control" placeholder="E-Posta"/>
                                              </div>
                                          <div class="form-group">
                                              <label for="unv">Ünvan</label>
                                              <select class="form-control" id="unv" name="unvan">
                                               <?php
                                               foreach ($unvanlar as $item)
                                               {
                                                   echo '<option value='.$item["id"].'>'.$item["unvan"].'</option>';
                                               }
                                               
                                               ?>
                                                  
                                              </select>
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
                                </div>
                            
                            
                            
                            <table class="table table-striped table-bordered table-hover">
				<tr>
                                    <th>#</th>
                                    <th>Ünvan</th>
                                    <th>Ad Soyad</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>E-Posta</th>									
				</tr>
                                <?php
                                
                                $i = 1;
                                foreach ($kullanicilar as $item)
                                {
                                    $unvan = $db->query("select * from unvanlar where id='{$item["unvanID"]}'")->fetch(PDO::FETCH_ASSOC);
                                    echo '<tr>
                                            <th>'.$i.'</th>
                                            <td>'.$unvan["unvan"].'</td>
                                            <td>'.$item["adSoyad"].'</td>
                                            <td>'.$item["kAdi"].'</td>
                                            <td>'.$item["eposta"].'</td>
                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#silModal'.$item["id"].'">Sil</button>
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
                                                            <p style="color:red"><strong>'.$item["kAdi"].'</strong> Siliniyor...</p>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <a href="kulSil.php?id='.$item["id"].'" class="btn btn-danger">Sil</a>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                                          </div>
                                                        </div>

                                                      </div>
                                                    </div>    

                                            </td>
                                            
                                                    
                                            <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#duzModal'.$item["id"].'">Düzenle</button>
                                                    <!-- Modal -->
                                                    <div id="duzModal'.$item["id"].'" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">'.$item["adSoyad"].' Düzenleniyor.</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                              <p>
                                                                    <form action="kulDuzenle.php?id='.$item["id"].'" method="post">
                                                                        <div class="form-group">
                                                                          <label>Kullanıcı Adı</label>
                                                                          <input type="text" name="kAdi" value="'.$item["kAdi"].'" class="form-control" placeholder="Kullanıcı Adı"/>
                                                                        </div>
                                                                         <div class="form-group">
                                                                          <label>Ad Soyad</label>
                                                                          <input type="text" name="adSoyad" value="'.$item["adSoyad"].'" class="form-control" placeholder="Ad Soyad"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                          <label for="exampleInputPassword1">Şifre</label>
                                                                          <input type="password" name="sifre" value="'.$item["sifre"].'" class="form-control" id="exampleInputPassword1" placeholder="Şifre"/>
                                                                        </div>
                                                                          <div class="form-group">
                                                                              <label>E-Posta</label>
                                                                              <input type="text" name="eposta" value="'.$item["eposta"].'" class="form-control" placeholder="E-Posta"/>
                                                                          </div>
                                                                      <div class="form-group">
                                                                          <label for="unv">Ünvan</label>
                                                                          <select class="form-control" id="unv" name="unvan">';
                                                                               
                                                                            $unvanlar = $db->query("select * from unvanlar where aktif=1",PDO::FETCH_ASSOC);
                                    
                                                                           foreach ($unvanlar as $unv)
                                                                           {
                                                                               if($unv["id"] == $item["unvanID"])
                                                                                echo '<option value='.$unv["id"].' selected>'.$unv["unvan"].'</option>';
                                                                               else
                                                                                  echo '<option value='.$unv["id"].'>'.$unv["unvan"].'</option>'; 
                                                                           }


                                                                         echo ' </select>
                                                                        </div>   
                                                                            <div class="col-md-offset-8">
                                                                              <button type="submit" class="btn btn-success">Kaydet</button>
                                                                              <button type="button" class="btn btn-default" data-dismiss="modal">İptal Et</button>
                                                                           </div>
                                                                      </form>
                                                                  </p>
                                                            
                                                          </div> 
                                                        </div>

                                                      </div>
                                                    </div>    

                                            </td>        
                                        </tr>';
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



