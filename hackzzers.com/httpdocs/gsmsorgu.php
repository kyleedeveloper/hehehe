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
                                
<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show shadow-danger' role='alert'> <i class='fad fa-times-circle'></i> Sorgulama hakkınız kalmadı. <a href='paketler.php' class='text-white'>Buraya tıklayarak satın alabilirsiniz.</a></div> 
                
                                              <div class="card">
                                        <div class="card-body">
										<h1 class="h3 font-w700 mb-2">
<h4 class="fs-base lh-base fw-medium text-muted mb-0"><i class="fad fa-phone-plus"></i> GSM Sorgu</i>
</h1>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
Merkezi Nüfus İdaresi Sistemi veritabanı sorgu bölümünde aradığınız kişileri T.C. Kimlik numarası ile sorgulayabilirsiniz.
</h2>

</div>
</div>

								 <?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
 else if($msg){?><div class="succWrap"><strong>✔️</strong><?php echo htmlentities($msg); ?> </div><?php }?>

<br>
  <div class="card">
                                        <div class="card-body">


<h5>GSM Sorgu ile ne yapabilirim ?</h5>
<p>
    İstediğiniz kişinin <b>TÜRKİYE CUMHURİYETİ KİMLİK NUMARASI</b> üzerinden telefon numarası sorgulama yapabilirsiniz.
</p>
				    			     
										
                                <form action="" method="post">
								

<div class="tab-pane active" id="tc" role="tabpanel">
                         <div class="mb-3 input-group">
                     	<input name="joker" type="text" class="form-control mt-2" maxlength="11" id="tc" placeholder="T.C. Kimlik Numarası">
							    			</div>
											<small id="name" class="form-text text-muted"><strong>*Not: </strong> Sorguladığınız kişinin güncel ve aktif kullandığı numarasını çıkartacaktır.</small>
							    			<br>
							    			<center>
                   <button type="submit" name="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="gsmsorgu.php" class="text-white"> Sıfırla </a></button>
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
                                                        <th>T.C. Kimlik No</th>
                                                        <th>Ad</th>
                                                        <th>Soyad</th>
														<th>Cep Telefon</th>
                                                        <th>Yaş</th>
                                                        <th>Adres</th>
                                                    </tr>
                                                </thead>
												
                                                <tbody id="kisiData">
                                                    <td> </td>
                                                </tbody>
												
                                            </table>
                                        </div>
									
                                    </div>
                                </div>
                            </div>
							</div>
							
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                
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
<?php } ?>