<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Kocaeli Üniversitesi Bilgisayar Mühendisliği Yönetim</title>

     <?php include "header.php";?>
     <style type="text/css">
  
.rwd-table {
  margin: 1em 0;
  min-width: 300px;
}
.rwd-table tr {
  border-top: 1px solid #ddd;
  border-bottom: 1px solid #ddd;
}
.rwd-table th {
  display: none;
}
.rwd-table td {
  display: block;
}
.rwd-table td:first-child {
  padding-top: .5em;
}
.rwd-table td:last-child {
  padding-bottom: .5em;
}
.rwd-table td:before {
  content: attr(data-th) ": ";
  font-weight: bold;
  width: 6.5em;
  display: inline-block;
}
@media (min-width: 480px) {
  .rwd-table td:before {
    display: none;
  }
}
.rwd-table th, .rwd-table td {
  text-align: left;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    display: table-cell;
    padding: .25em .5em;
  }
  .rwd-table th:first-child, .rwd-table td:first-child {
    padding-left: 0;
  }
  .rwd-table th:last-child, .rwd-table td:last-child {
    padding-right: 0;
  }
}



h1 {
  font-weight: normal;
  letter-spacing: -1px;
  color: #34495E;
}

.rwd-table {
  background: #313131;
  color: #fff;
  border-radius: .4em;
  overflow: hidden;
}
.rwd-table tr {
  border-color: #46637f;
}
.rwd-table th, .rwd-table td {
  margin: .5em 1em;
}
@media (min-width: 480px) {
  .rwd-table th, .rwd-table td {
    padding: 1em !important;
  }
}
.rwd-table th, .rwd-table td:before {
  color: #3bb0bb;
}

</style>

</head>
<body>
<?php include "Ust_logo.php" ;?>
<?php include"navbar.php";?>


<div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-12">
                    <h2 class="margin-bottom-10" style="text-align: center;margin-top:15px"><b>Yönetim</b></h2>
                    <hr class="margin-top-40">

            <div align="center">  <table  class="rwd-table" >
                <tr>
                  <th>Görevi</th>
                  <th>Adı &nbsp; Soyadı</th>
                  <th>Oda No </th>
                  <th>Telefon</th>
                  <th>E Posta</th>
                  
                </tr>
                <tr>
                  <td data-th="Görevi">Bölüm Başkanı</td>
                  <td data-th="Adı &nbsp; Soyadı"><a style="color:white" href="http://akademikpersonel.kocaeli.edu.tr/nduru/" > Prof. Dr. Nevcihan DURU</a></td>
                    <td data-th="Oda No">3002</td>
                    <td data-th="Telefon">303 3560</td>
                    <td data-th="E Posta"><a style="color:white" href="mailto:nduru@kocaeli.edu.tr" >nduru@kocaeli.edu.tr</a></td>
                </tr>
                 <tr>
                  <td data-th="Görevi">Bölüm Başkan Yrd.</td>
                  <td data-th="Adı &nbsp; Soyadı"><a style="color:white" href="http://akademikpersonel.kocaeli.edu.tr/silhan/" >Doç. Dr. Sevinç İLHAN OMURCA</a></td>
                    <td data-th="Oda No">3009</td>
                    <td data-th="Telefon">303 3572</td>
                    <td data-th="E Posta"><a style="color:white" href="mailto:silhan@kocaeli.edu.tr" >silhan@kocaeli.edu.tr</a></td>
                </tr>
                <tr>
                  <td data-th="Görevi">Bölüm Başkan Yrd.</td>
                  <td data-th="Adı &nbsp; Soyadı"><a style="color:white" href="http://akademikpersonel.kocaeli.edu.tr/suhapsahin/" >Yrd. Doç. Dr. Suhap ŞAHİN</a></td>
                    <td data-th="Oda No">3007</td>
                    <td data-th="Telefon">303 3576</td>
                    <td data-th="E Posta"><a style="color:white" href="mailto:suhapsahin@kocaeli.edu.tr" >suhapsahin@kocaeli.edu.tr</a></td>
                </tr>
                 <tr>
                  <td data-th="Görevi">Bölüm Sekreteri</td>
                  <td data-th="Adı &nbsp; Soyadı">Resul ÖZKAN</td>
                    <td data-th="Oda No">3003</td>
                    <td data-th="Telefon">303 3560</td>
                    <td data-th="E Posta"><a style="color:white" href="mailto:bilgisayar@kocaeli.edu.tr" >bilgisayar@kocaeli.edu.tr</a></td>
                </tr>
                
               
                
               
                
                
                
              </table>
              </div>
</div>
</div>
</div>
</div>


              
                        <!-- End Main Column -->
                    </div>
                </div>
            </div>

<?php include "footer.php"; ?>
<?php include"script.php";?>


</body>
</html>

