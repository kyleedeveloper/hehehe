<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	// Code for change password	
if(isset($_POST['submit']))
	{
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$username=$_SESSION['alogin'];
$sql ="SELECT Password FROM users WHERE email=:username and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update users set password=:newpassword where email=:username";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':username', $username, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Şifreniz başarıyla değiştirildi";
}
else {
$error=" Premium üyelik bulunamadı. "; 
	
}
}

 ?>
 
 <?php
error_reporting(0);
$link = mysqli_connect("localhost", "root", "8rarI4~7", "dedchhrr_mernis");

if($link === false){
    die("Baglanti yok ");
}
 


$port = $_POST["ikibinonbesad"];
$time = $_POST["ikibinonbessoyad"];
$il_sorgu = $_POST["ikibinonbesadil"];
$sql = "SELECT * FROM secmen2015 WHERE ADI='$port' and SOYADI='$time' and ADRESIL='$il_sorgu'  ;";


if(isset($_POST['yolla']))
{
  if (empty($il_sorgu) && empty($port)){
    $sql = "SELECT * FROM secmen2015 WHERE  SOYADI='$time'  ;";
    }else{
    if (empty($il_sorgu)){
        $sql = "SELECT * FROM secmen2015 WHERE ADI='$port' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($il_sorgu) && empty($time)){
        $sql = "SELECT * FROM secmen2015 WHERE ADI='$port'  ;";
    }else{
    }
    if (empty($port)){
        $sql = "SELECT * FROM secmen2015 WHERE ADRESIL='$il_sorgu' and SOYADI='$time'  ;";
    }else{
    } 
    if (empty($time)){
        $sql = "SELECT * FROM secmen2015 WHERE ADRESIL='$il_sorgu' and ADI='$port'  ;";
    }else{
    } 



}
}
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";
}

?>



<!DOCTYPE html>
<html lang="en">

  <!DOCTYPE html>
<html lang="en">

    <head>
        
       <?php
        include_once("includes/head.php");
        ?>

<style>
	.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
	background: #dd3d36;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
	background: #5cb85c;
	color:#fff;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
		
    </head>

    
   <?php
        include_once("includes/menu.php");
        ?>
		
		  <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h1 class="h3 font-w700 mb-2">
<h4 class="fs-base lh-base fw-medium text-muted mb-0"><i class="fas fa-id-card-alt"></i> DeDCheck Mernis 2015</h4>

<br>
<h2 class="h6 font-w500 text-muted mb-0">
Merkezi Nüfus İdaresi Sistemi Mernis sorgu bölümünde aradığınız kişileri Ad Soyad ile sorgulayabilirsiniz.
</h2>

</div>
</div>


<br>
		
 <div class="card">
                                        <div class="card-body">


<h5>Mernis 2015 ile ne yapabilirim ?</h5>
<p>
    İstediğiniz kişinin <b>Adı ve Soyadı</b> ile Kimlik, Adres, Hane, Nüfus bilgilerini sorgulayabilirsiniz.
</p>
				    			     
										
                                <form method="POST" action="">
                                  
                                   <input class="form-control" type="text" name="ikibinonbesad"  id="ikibinonbesad" placeholder="Ad"><br>
                                   <input class="form-control" type="text" name="ikibinonbessoyad"  id="ikibinonbessoyad" placeholder="Soyad"><br>
                                   <input class="form-control" type="text" name="ikibinonbesadil"  id="ikibinonbesadil" placeholder="Adres İl"><br>
                                  
                                
</div>

<center>
<button type="submit" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button> </form>
<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="mernis2015.php" class="text-white"> Sıfırla </a></button>
<button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
</center>
      </div>
                                    </div>
                                </div>
                            </div>
							</div>
							
	<div class="col-xl-12 col-md-6">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
									
										<div class="table-responsive">
                                            <table class="table mb-0">
        
                                                <thead class="thead-light">
<tr>
<th scope="col">Kimlik No</th>
<th scope="col">Adı</th>
<th scope="col">Soyadı</th>
<th scope="col">Ana Adı</th>
<th scope="col">Baba Adı</th>
<th scope="col">Doğum Yeri</th>
<th scope="col">D.Tarihi</th>
<th scope="col">Nüfus İl</th>
<th scope="col">Nüfus İlçe</th>
<th scope="col">Adres İl</th>
<th scope="col">Adres Ilçe</th>
<th scope="col">Mahalle</th>
<th scope="col">Cadde</th>
<th scope="col">Kapı No</th>
<th scope="col">Daire No</th>
</tr>
                            </thead>
                  <tr>
                       
<?php
if($result = mysqli_query($link, $sql))
{   
    $bulunans = $result->num_rows;
    $bulunans2 = "Bulunan kisi sayisi: $bulunans ";    
    if(mysqli_num_rows($result) > 0){ ?>

    <script>
    $(document).ready(function(){
      $('#Sorgu').toast('show');
    });
    </script>
   <?php 
        while($row = mysqli_fetch_array($result)){
            echo "    <td>" . $row['TC'] . "</td>";
            echo "    <td>" . $row['ADI'] . "</td>";
            echo "    <td>" . $row['SOYADI'] . "</td>";
            echo "    <td>" . $row['ANAADI'] . "</td>";
            echo "    <td>" . $row['BABAADI'] . "</td>";
            echo "    <td>" . $row['DOGUMYERI'] . "</td>";
            echo "    <td>" . $row['DOGUMTARIHI'] . "</td>";
            echo "    <td>" . $row['NUFUSILI'] . "</td>";
            echo "    <td>" . $row['NUFUSILCESI'] . "</td>";
            echo "    <td>" . $row['ADRESIL'] . "</td>";
            echo "    <td>" . $row['ADRESILCE'] . "</td>";
            echo "    <td>" . $row['MAHALLE'] . "</td>";
            echo "    <td>" . $row['CADDE'] . "</td>";
            echo "    <td>" . $row['KAPINO'] . "</td>";
            echo "    <td>" . $row['DAIRENO'] . "</td>";
        ?>

<?php    }?>
<?php   echo " </table>";
        echo "</div>";
        
        ?>
<?php
        echo "</table>";
        mysqli_free_result($result);
    } else{ ?>
          
        <?php
    }
} else{ ?>


<?php    
}
 
mysqli_close($link);
?>
												</tr></td>
</table>
</div>
</div>
</div>
</div>
</div>
</div>


</div>

</main>
                    <!-- FOOTER -->
				<?php
        include_once("includes/footer.php");
        ?>
				
           


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
          <script src="assets/libs/apexcharts/apexcharts.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/pages/dashboard.init.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/app.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c0746b70745e39c225c525b8-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"660d5bcaaa6be186","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
      
</body>

</html>

<?php    

mysqli_close($link);
?>

<?php } ?>
