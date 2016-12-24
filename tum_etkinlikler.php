<?php

	include 'db/baglan.php';
	include 'turkcetarih.php';
        $tarih = date('2016-11-13');    

	$etkinlik = $db->query("select * from duyurular where aktif=1 and tur=3 and bitTarih > '{$tarih}'",PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kocaeli Üniversitesi Bilgisayar Mühendisliği Tüm Etkinlikler</title>

     <?php include "header.php";?>
     <style type="text/css">
.margin-vert-40 {
margin-bottom: -5px;
margin-top:-5px;

}
     </style>

</head>
<body>
<?php include "Ust_logo.php" ;?>
<?php include"navbar.php";?><div>



<div id="content" class="bottom-border-shadow">
                <div class="container background-white bottom-border">
                    <div class="row margin-vert-30">
            
            <div class="col-md-12">
            
          
            <div class="panel panel-primary ">
  <div class="panel-heading " style="text-align:center;font-size:19px">Etkinlikler</div>
<div class="panel-content">

                                    <div class="tab-content">
                                        <div class="tab-pane active in fade" id="faq">
                                            <div class="panel-group" id="accordion">
                                                <!-- FAQ Item -->
                                                
												<?php
												
													foreach($etkinlik as $item){
														
														$kullanici = $db->query("select * from kullanicilar where id='{$item["kID"]}'")->fetch(PDO::FETCH_ASSOC);
														echo '<div class="panel panel-default panel-faq">
                                                    <div class="panel-heading">
                                                    
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#faq-sub'.$item["id"].'" class="collapsed">
                                                            
                                                            <h4 class="panel-title">
                                                            <p>
                                                              '.$item["baslik"].' 
                                                                </p>
                                                                
                                                    <hr class="margin-vert-40">

                                                                
                                                            <span class="pull-right" >
                                                                    <b>'.turkcetarih('j F Y',$item["basTarih"]).'</b>
                                                                </span>
                                                                

                                                                <i style="margin-bottom:-30px"> 
                                                    Bilgisayar Mühendisliği                                        
                                                    </i>
                                                    <!--<i class="fa-toggle-down fa-lg" id="ac" style="margin-left:325px"></i>-->
                                                    <!--<i class="fa-level-down fa-lg "style="margin-left:325px;color:yellow"></i>-->
                                                    
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="faq-sub'.$item["id"].'" class="panel-collapse collapse" style="height: 0px;">
                                                        <div class="panel-body" style="background-color:#CFECEC;color:black">
                                                        <p><i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
														
														'.$item["icerik"].'
                                                        
                                                        </div>
                                                    </div>
                                                </div>';
														
														
														
													}
												
												
												?>
												
                                                
                                                
                                                
                                                
                                              <!-- Buraya Genel ile Duyurular gelecek-->
                                            </div>
                                        </div>
                                    </div>
                                                 
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>



    
    
    

<?php include "footer.php"; ?>
<?php include"script.php";?>


</body>
</html>

