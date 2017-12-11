<?php
session_start();

    if($_SESSION["yetki"]!=0)
    {
        header("location:../index.php");
    }
    include '../db/baglan.php';
    include '../turkcetarih.php';
        
    date_default_timezone_set('Europe/Istanbul');

    

    
    $slider = $db->query("select * from slider where aktif=1 and kID='{$_SESSION["id"]}'",PDO::FETCH_ASSOC);
    
    if(!empty($_POST))
    {
        $baslik = $_POST["baslik"];    
        $icerik = $_POST["icerik"];
        $link = $_POST["link"];
        $tarih = date("d/m/Y");
        $aktif = 1;
        if(isset($_FILES['resim'])){
            $dizin = "img/slider/";
            $dosyaDizin = $dizin.basename($_FILES['resim']['name']);
            if(move_uploaded_file($_FILES['resim']['tmp_name'] , $dosyaDizin)){
                $resim= basename($_FILES['resim']['name']); 
            }
        }
        
       $ekle = $db->prepare("insert into slider set baslik=? , icerik=? , link=? , kID = ? , aktif = ? , tarih = ? , resim =?");
       $ekle->execute(array($baslik , $icerik , $link , $_SESSION["id"] , $aktif , $tarih , $resim));
   /// $dosya = $_FILES["resim"];
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>        
    
        <title>Kocaeli Üniversitesi</title>
        <?php include 'head.php';?>
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
                            <li><a href="index.php">Admin</a>
                            <li><a href="slider.php">Slider</a></li>
                            <li><a href="paylas.php">Paylaş</a></li> 
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
                                <li><a href="slider.php">Slider</a></li>
                                <li><a href="paylas.php">Paylaş</a></li>
                                <li><a href="../logout.php">Çıkış</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div class="col-md-9" style="margin-top:20px">
                        <!-- Overview -->
                        <div class="well well-scope" id="overview">
                            <h3 class="margin-bottom-20">Slider</h3>
                            <p><button data-toggle="modal" data-target="#myModal" class="btn btn-primary">Yeni Slide Oluştur</button></p>
                            
                            <div id="myModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                            
                            <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Yeni Slide Oluştur</h4>
                                      </div>
                                      <div class="modal-body">
                                     <p>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            
                                            <div class="form-group">
                                              <label>Başlık</label>
                                              <input type="text" name="baslik" class="form-control" placeholder="Başlık"/>
                                            </div>
                                             <div class="form-group">
                                              <label>İçerik</label>
                                              <textarea rows="5" cols="50" name="icerik" class="form-control" placeholder="İçerik"></textarea>    
                                            </div>
                                              <div class="form-group">
                                                  <label>Link</label>
                                                  <input type="text" name="link" class="form-control" placeholder="Link"/>
                                              </div>
                                            <div class="form-group">
                                                <label>Resim</label>
                                                <input type="file" name="resim" id="exampleInputFile"/>
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
                                    <th>Resim</th>
                                    <th>Yayınlanma Tarihi</th>
                                    <th>Link</th>									
				</tr>
                                <?php
                                    $i = 1;
                                    foreach ($slider as $item)
                                    {
                                        echo '<tr>
                                                <th>'.$i.'</th>
                                                <td>'.$item["baslik"].'</td>
                                                <th><img height="60" width="192" src="../img/slider/'.$item["resim"].'"/></th>
                                                <td>'.turkcetarih('j F Y',$item["tarih"]).'</td>
                                                <td>'.$item["link"].'</td>
                                                <td><a href="sliderSil.php?id='.$item["id"].'" class="btn btn-danger">Sil</a></td>
                                                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#duzModal'.$item["id"].'">Düzenle</button>
                                                    <!-- Modal -->
                                                    <div id="duzModal'.$item["id"].'" class="modal fade" role="dialog">
                                                      <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">'.$item["baslik"].' Düzenleniyor.</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                              <p>
                                                                    <form action="sliderDuz.php?id='.$item["id"].'" method="post" enctype="multipart/form-data">
                                                                        <div class="form-group">
                                                                          <label>Başlık</label>
                                                                          <input type="text" name="baslik" value="'.$item["baslik"].'" class="form-control" placeholder="Başlık"/>
                                                                        </div>
                                                                         <div class="form-group">
                                                                          <label>İçerik</label>
                                                                            <textarea rows="5" cols="50" name="icerik" class="form-control" placeholder="İçerik">'.$item["icerik"].'</textarea>                                                                        </div>
                                                                        
                                                                          <div class="form-group">
                                                                              <label>Link</label>
                                                                              <input type="text" name="link" value="'.$item["link"].'" class="form-control" placeholder="E-Posta"/>
                                                                          </div>
                                                                            <div class="form-group">
                                                                                    <label>Resim</label>
                                                                                        <input type="file" name="resim" id="exampleInputFile">
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