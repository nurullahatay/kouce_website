<?php

    include 'db/baglan.php';
    include 'turkcetarih.php';
        
    $tarih = date('2016-11-13');    

    $genel = $db->query("select * from duyurular where tur='1' and aktif='1' and bitTarih > '{$tarih}' Order By id DESC LIMIT 10",PDO::FETCH_ASSOC);
    $bolum = $db->query("select * from duyurular where tur='2' and aktif='1' and bitTarih > '{$tarih}' Order By id DESC LIMIT 10 ",PDO::FETCH_ASSOC);
    $etkinlik = $db->query("select * from duyurular where tur='3' and aktif='1' and bitTarih > '{$tarih}' Order By id DESC LIMIT 10",PDO::FETCH_ASSOC);
    $etkIcerik = $db->query("select * from duyurular where tur='3' and aktif='1' and bitTarih > '{$tarih}' order by id desc limit 10",PDO::FETCH_ASSOC);
    $slider = $db->query("select * from slider where aktif='1'",PDO::FETCH_ASSOC);


?>


<html lang="en">
    <!--<![endif]-->
    <head>
        <!-- Title -->
        <title>Kocaeli Üniversitesi Bilgisayar Mühendisliği</title>
        <!-- Meta -->
        <?php include 'header.php';?>
		<style type="text/css">  .fa{
		font-size: 200%;
		
		
		}
		/*duyuru çizgi için*/
		.margin-vert-40 {
		
		margin-top:-15px;
		margin-bottom:-5px
		}
        /* Alt çizgiyi Kaldırdım */
        .bottom-border{
            box-shadow:0 0px 0 #33747a inset, 0 0 20px rgba(0, 0, 0, 0.1) ;
        }
        
        /*Slider yazısı için gereklidir*/
        .carousel-caption > div{
        padding:0px 50px 80px 20%;
        top:2%;
        }
        /*  3 noktayı belirtir */
        .carousel-indicators{
            left:27%;
        }
        /* üç noktanın rengini belirler */
        .carousel-indicators .active{
            background-color: #C58917;
        }
        /* slider yazısı için gerekli */
        h4, .h4, h5, .h5, h6, .h6{
            margin-top:300px;
            padding-left: -300px;
        }
		</style>
    </head>
    <body>
        
            <!-- Header -->
            <div id="header">
                <div class="container">
                    <div class="row">
                        <div class="logo">
                            <a href="index.php" title="">
                                <img src="assets\img\kou-logo.png" alt="Logo" width="100" height="100" style="margin-left:-500px;margin-top:-25px">
                            </a>
                                <h1 style="margin-top:-40px;margin-left:-10px">Kocaeli Üniversitesi <br> <b>Bilgisayar</b> Mühendisliği</h1>

                        </div>
					
					
				
                        <!-- Logo -->
                        <!-- End Logo -->
                    </div>
                </div>
            </div>
            
           <?php include 'navbar.php';?>
            <div id="slideshow" class="bottom-border-shadow">
                <div class="container no-padding background-white bottom-border">
                    <div class="row">
                        <!-- Carousel Slideshow -->
                        <div id="carousel-example" class="carousel slide" data-ride="carousel" style="max-height:250px;min-height:250px">
                            <!-- Carousel Indicators -->
                            <ol class="carousel-indicators">
                                
                                <?php
                                
                                $say = $slider->rowCount();
                                $a = 0;
                                for($i=0;$i<$say;$i++)
                                {
                                  echo '<li data-target="#carousel-example" data-slide-to="'.$i.'"';
                                  if($a==0)
                                  echo ' class="active"';
                                    echo '></li>';
                                    
                                    $a++;
                                }
                                
                                ?>
                                
                                
                            </ol>
                            <div class="clearfix"></div>
                            <div id="carousel-example-1" class="carousel slide" data-ride="carousel">
                            <div id="carousel-example-2" class="carousel slide alternative" data-ride="carousel">
  
  <!-- Wrapper for slides -->

							
							
                            <!-- End Carousel Indicators -->
                            <!-- Carousel Images -->
                            
                           <div class="carousel-inner">
                               
                            <?php 
                             $i = 0;
                            foreach ($slider as $item)
                            {
                                echo '<div class="item ';
                                if($i==0)
                                   echo 'active';
                                
                            echo '
                                "><img width="800px" style="max-height:200px;min-height:200px" src="img/slider/'.$item["resim"].'" />
           
                        <div class="carousel-caption" >
                            <div class="animated bounceInRight" style="color:white" >
                                <h4 ><a style="color:white;background-color:rgba(15,116,143,0.8)" href="'.$item["link"].'">'.$item["baslik"].'</a></h4>
                                
                            </div>
                        </div>        
                        </div>';
                                $i++;
                            }
                            ?>


                            </div>
                            
                         <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                      
                       </div>  
                    </div>
                </div>
            </div>
            </div>
			</div>
                  
                   
                      
                 
            
			<div id="content" class="bottom-border-shadow">
                <div class="container background-white bottom-border">
                    <div class="row margin-vert-30">
			
       
			<div class="col-md-12">
			
			<div class="col-md-6" style="">
			<div class="panel panel-primary	">
  <div class="panel-heading " style="text-align:center">Genel Duyuruları</div>
<div class="panel-content">

                                    <div class="tab-content">
                                        <div class="tab-pane active in fade" id="faq">
                                            <div class="panel-group" id="accordion">
                                                <!-- FAQ Item -->
                                                <?php
                                                    $i=0;
                                                foreach ($genel as $item)
                                                {
                                                    $kullanici = $db->query("select * from kullanicilar where id = '{$item["kID"]}'")->fetch(PDO::FETCH_ASSOC);
                                                    echo '<div class="panel panel-default panel-faq"  >
                                                    <div class="panel-heading" ';
                                                    if($i%2)
                                                     echo 'style="background-color:#ccc"' ;
													
                                                     echo '><a data-toggle="collapse" data-parent="#accordion" href="#faq-sub'.$item["id"].'" class="collapsed">
                                                            
															<h4 class="panel-title">
															<p>
                                                                '.$item["baslik"].'
																</p>
																
								  					<hr class="margin-vert-40">

																
															<span class="pull-right" >
                                                                    <b>'.turkcetarih('j F Y',$item["basTarih"]).'</b>
                                                                </span>
                                                                

													<i style="margin-bottom:-30px">	
                                                                                                         '.$kullanici["adSoyad"].'                       
													</i>
													<!--<i class="fa-toggle-down fa-lg" id="ac" style="margin-left:325px"></i>-->
													<!--<i class="fa-level-down fa-lg "style="margin-left:325px;color:yellow"></i>-->
													
                                                            </h4>
                                                        </a>
                                                    </div>
													<!-- buradaki id ile a daki href aynı olmalı -->
                                                    <div id="faq-sub'.$item["id"].'" class="panel-collapse collapse" style="height: 0px;">
                                                        <div class="panel-body" style="background-color:#CFECEC;color:black">
														<p><i class="fa fa-angle-double-down fa-lg" aria-hidden="true"></i>'.$item["icerik"].'</p>';
                                                                     if($item["link"])
                                                                        echo '<p><a href="'.$item["link"].'">indir</a></p>';
                                                                                                                    
														
							echo '</div>
                                                    </div>
                                                </div>';						
                                                        
                                                     $i++;
                                                }
                                                    
                                                
                                                
                                                
                                                
                                                
                                                ?>
                                                <!-- End FAQ Item -->
                                                <!-- Faq Item -->
                                                
                                                
                                                
                                                
                                                
                                                
                                              <!-- Buraya Genel ile Duyurular gelecek-->
                                            </div>
                                        </div>
                                    </div>
                                                 <p>
                                        <a href="genel_tum_duyuru.php"><button style="margin-left:20px" type="button" class="btn btn-primary btn-sm" >Tümünü Göster</button></a></p>
                                               
                                </div>
								</div>
								</div>
								
								<div class="col-md-6" style="margin-left:0px">
			<div class="panel panel-primary	">
  <div class="panel-heading " style="text-align:center">Bölüm Duyuruları</div>
<div class="panel-content">

                                    <div class="tab-content">
                                        <div class="tab-pane active in fade" id="faq">
                                            <div class="panel-group" id="accordion">
                                                <!-- FAQ Item -->
                                                <?php
                                                
                                                 $i = 0;
                                                 foreach ($bolum as $item)
                                                 {
                                                     $kullanici = $db->query("select * from kullanicilar where id = '{$item["kID"]}'")->fetch(PDO::FETCH_ASSOC);
                                                    echo '<div class="panel panel-default panel-faq"  >
                                                    <div class="panel-heading" ';
                                                    if($i%2)
                                                     echo 'style="background-color:#ccc"' ;
													
                                                     echo '><a data-toggle="collapse" data-parent="#accordion" href="#faq-sub'.$item["id"].'" class="collapsed">
                                                            
															<h4 class="panel-title">
															<p>
                                                                '.$item["baslik"].'
																</p>
																
								  					<hr class="margin-vert-40">

																
															<span class="pull-right" >
                                                                    <b>'.turkcetarih('j F Y',$item["basTarih"]).'</b>
                                                                </span>
                                                                

													<i style="margin-bottom:-30px">	
                                                                                                         '.$kullanici["adSoyad"].'                       
													</i>
													<!--<i class="fa-toggle-down fa-lg" id="ac" style="margin-left:325px"></i>-->
													<!--<i class="fa-level-down fa-lg "style="margin-left:325px;color:yellow"></i>-->
													
                                                            </h4>
                                                        </a>
                                                    </div>
													<!-- buradaki id ile a daki href aynı olmalı -->
                                                    <div id="faq-sub'.$item["id"].'" class="panel-collapse collapse" style="height: 0px;">
                                                        <div class="panel-body" style="background-color:#CFECEC;color:black">
														<p><i class="fa fa-angle-double-down fa-lg" aria-hidden="true"></i>'.$item["icerik"].'</p>';
                                                                     if($item["link"])
                                                                        echo '<p><a href="'.$item["link"].'">indir</a></p>';
                                                                                                                    
														
							echo '</div>
                                                    </div>
                                                </div>';						
                                                        
                                                     $i++;
                                                 }
                                                
                                                
                                                
                                                
                                                
                                                ?>
                                                <!-- End FAQ Item -->
                                                <!-- Faq Item -->
                                                
                                                
                                                
                                                
                                        
                                                
                                              <!-- Buraya Bölüm Duyurular gelecek-->
                                            </div>
                                        </div>
                                    </div>
                                      <p><a href="bolum_tum_duyuru.php"> <button type="button" style="margin-left:20px" class="btn btn-primary btn-sm" >Tümünü Göster</button></a></p>

                                </div>
				</div>
				</div>
				</div>
                                </div>
                            </div>
                        </div>







                                <div id="content" class="bottom-border-shadow">
                <div class="container background-white bottom-border">
                    <div class="row margin-vert-30">


								<div class="col-md-12">
								<div class="panel panel-primary	">
								
  <div class="panel-heading " style="text-align:center">Haber ve Etkinlikler</div>
       <div class="panel-body">
	<div class="col-sm-3">
        <ul class="nav nav-pills nav-stacked">
            <?php
              $i = 0;                       
              foreach ($etkinlik as $item)
              {
                  echo '<li ';
                  if($i==0)
                  echo 'class="active"';
                     echo '>
                      <a href="#sample'.$item["id"].'" data-toggle="tab">
                      <b>'.turkcetarih('j F Y',$item["basTarih"]).'</b></a>
                      </li>';
                     $i++;
              }
                                        
                                        
              ?>               
       </ul>
                                                  <p>
                                       <a href="tum_etkinlikler.php"><button type="button" class="btn btn-primary btn-sm">Tümünü Göster</button></a></p>
                                </div>
								

								<div class="col-sm-9">
                                    <div class="tab-content">
                                        <?php
                                            
                                          $i=0;
                                          foreach ($etkIcerik as $item){
                                              
                                              echo '<div class="tab-pane fade ';
                                              if($i==0)
                                              echo 'active in';
                                             echo '" style ="margin-left:15px" id="sample'.$item["id"].'">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <h3 class="no-margin no-padding">'.$item["baslik"].'</h3>
                                                    <p>'.$item["icerik"].'</p>';
                                              if($item["link"])
                                                  echo '<p><a href="'.$item["link"].'">indir</a></p>';

                                               echo ' </div>
                                            </div>
                                        </div>';
                                               $i++;
                                              
                                          }
                                        
                                        
                                        
                                        
                                        ?>
                                        
                                        
                                    </div>

                                </div>
								</div>
								</div>
								</div>
</div>
</div>
</div>                            
                               
        </div>


        <?php include 'footer.php';?>
        <?php include 'script.php';?>

    </body>
</html>
