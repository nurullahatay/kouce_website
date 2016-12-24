<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kocaeli Üniversitesi Bilgisayar Mühendisliği İdari Personel</title>

     <?php include "header.php";?>
<style type="text/css">
	.person-details figure figcaption{
		height:150px;
	}
</style>
</head>
<body>
<?php include "Ust_logo.php" ;?>
<?php include"navbar.php";?>

<!-- Silinebir-->





    
    
      
            <!-- Phone/Email -->
           
            <!-- End Phone/Email -->
            <!-- Header -->
            
            <!-- End Header -->
            <!-- Top Menu -->
          
            <!-- End Top Menu -->
            <!-- === END HEADER === -->
            <!-- === BEGIN CONTENT === -->
            <div id="content">
                <div class="container background-white">
                    <div class="row ">
                        <div class="col-md-12">
                            <h2 class="margin-bottom-10" style="text-align: center;margin-top:15px"><b>Bilgisayar  Mühendisliği İdari Personel</b></h2>
                                                        <hr class="margin-top-40">

                            <div class="row margin-bottom-30">
                            <!-- şu kısma hoca gelecek -->
                                
                                <!-- Person Details -->
                               <div class="col-md-4 col-sm-12 col-xs-12 person-details" style="padding-bottom:10px">
                                    <figure>

                                        <figcaption>

                                            <h3 class="margin-bottom-10"><small>Bölüm Sekreteri  </small>Resul ÖZKAN
                                            </h3>
                                            
                                            <span style="height:300px;size-font:12px" >
                                            <h4 style="text-align: center">Araştırma Alanları <hr class="margin-top-0" style="margin-bottom: 1px">
                                            </h4>
                                            <h5>Anabilim Dalı : <hr class="margin-top-0" style="margin-bottom: 1px"></h5>
                                            
                                            </span>
                                        </figcaption>
                                        <img src="http://bilgisayar.kocaeli.edu.tr/img/kadro/ResulOzkan.jpg" alt="image1" width="350">
                                        <ul class="list-inline person-details-icons">
    										      <div class="tikla">
    										      <li>
                                                
                                                    <i class="fa fa-chevron-down fa-lg" aria-hidden="true" style="cursor: pointer"></i>  
                                                
                                            </li>      
                                            </div>                          
                                        </ul>
                                        <div class="gizle" >
                                        <figcaption>

                                            <hr class="margin-top-0" style="margin-bottom: 1px">
                                            <span>
                                                <h5><i class="fa fa-laptop" aria-hidden="true"></i>&nbsp<a href="http://www.gezginresul.com/" style="color:white">Kişisel Web Sitesi </a></h5>

                                                <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i>&nbspMail : <a href="mailto:bilgisayar@kocaeli.edu.tr" style="color:white">bilgisayar@kocaeli.edu.tr</a>
												
                                                <h5><i class="fa fa-building fa-lg" aria-hidden="true"></i>&nbspOda No: 3003</h5>
                                            
                                               <h5><i class="fa fa-phone fa-lg" aria-hidden="true"></i>&nbspTelefon : 303 3560</h5>  
                                            </span>
                                        </figcaption>
                                        </div>

                                    </figure>
                                </div>
                                <!-- //Portfolio Item// -->
                                <!-- Person Details -->
                              

                                
                                <!-- //Portfolio Item// -->
                            </div>
                            
                           
                            <hr class="margin-top-40">
                        </div>
                    </div>
                </div>
            </div>
           
    

<?php include "footer.php"; ?>
<?php include"script.php";?>
<script type="text/javascript">
	$(document).ready(function(){
        
$(document).ready(function(){
	$(".gizle").hide();
        $(".tikla").click(function(){
            $(".gizle").toggle(500);
        });
    });

    });
</script>

</body>
</html>

