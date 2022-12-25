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
$error=" Yetersiz Bakiye. "; 
	
}
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- HEAD -->
        
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
	


    
    <!-- MENÜ -->
  
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
										
<h1 class="h3 fw-bold mb-2"><b>
Üyelik Paketleri</b>
</h1>
<h5 class="fs-base lh-base fw-medium text-muted mb-0">
DeDPremium ile daha güçlü araçlara erişim imkanı sağlayın.
</h5>
</div>
<nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
<ol class="breadcrumb breadcrumb-alt">
<li class="breadcrumb-item">
<a href="ayarlar.php" class="text-white">Hesabım</a>
</li>
<li class="breadcrumb-item" aria-current="page">
Üyelik Paketleri
</li>
</ol>
</nav>
</div>
</div>
</div>
</div>

<form method="post" class="form-horizontal" enctype="multipart/form-data">

 <?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
 else if($msg){?><div class="succWrap"><strong>✔️</strong><?php echo htmlentities($msg); ?> </div><?php }?>
				
<div class="content" id="purchase">

<h5 class="text-blue"><b>ÜYELİK PAKETLERİ<b></h5>
 <div class="card">
                                        <div class="card-body">
<div class="block block-rounded">
<div class="table-responsive">
<table class="table table-borderless table-hover table-vcenter text-center mb-0">
<thead class="table-dark text-uppercase fs-sm">
<tr>
<th class="py-3 bg-primary" style="width: 180px;"></th>
<th class="py-3 bg-primary">Freemium</th>
<th class="py-3 bg-primary">DeDPass</th>
<th class="py-3 bg-primary">
<i class="fa fa-thumbs-up me-1"></i> Premium
</th>
<th class="py-3 bg-primary">Premium+</th>
</tr>
</thead>
<tbody>
<tr class="bg-body-light">
<td></td>
<td class="py-4">
<div class="h1 fw-bold mb-2">0 ₺</div>
<div class="h6 text-muted mb-0">aylık</div>
</td>
<td class="py-4">
<div class="h1 fw-bold mb-2">75 ₺</div>
<div class="h6 text-muted mb-0">aylık</div>
</td>
<td class="py-4">
<div class="h1 fw-bold text-primary mb-2">150 ₺</div>
<div class="h6 text-primary-light mb-0">aylık</div>
</td>
<td class="py-4">
<div class="h1 fw-bold mb-2">500 ₺</div>
<div class="h6 text-muted mb-0">yıllık</div>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Günlük Limit</td>
<td>50</td>
<td>1000</td>
<td><i class="fa fa-infinity fa-fw text-warning"></i></td>
<td><i class="fa fa-infinity fa-fw text-warning"></i></td>
</tr>
<tr>
<td class="fw-semibold text-start">Aylık Limit</td>
<td>300</td>
<td>30000</td>
<td><i class="fa fa-infinity fa-fw text-warning"></i></td>
<td><i class="fa fa-infinity fa-fw text-warning"></i></td>
</tr>
<tr>
<td class="fw-semibold text-start">Premium Checker</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Mernis 2015 Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Öğrenci Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<td class="fw-semibold text-start">Mernis Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">İş Yeri Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Aile Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">GSM Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Ad Soyad Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr>
<td class="fw-semibold text-start">Sınıf Sorgu</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-times fa-fw text-danger"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
<td>
<i class="fa fa-check fa-fw text-success"></i>
</td>
</tr>
<tr class="bg-body-light">
<td></td>
<td>
</td>
<td>
<button type="submit" name="submit" class="btn rounded-pill btn-secondary px-4" @click="package = 'dedpass';purchase_start();">Satın Al</button>
</td>
<td>
<button type="submit" name="submit" class="btn rounded-pill btn-primary px-4" @click="package = 'premium';purchase_start();">Satın Al</button>
</td>
<td>
<button type="submit" name="submit" class="btn rounded-pill btn-secondary px-4" @click="package = 'premium+';purchase_start();">Satın Al</button>
</td>
</tr>
</tbody>
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
        <script src="assets/libs/jquery/jquery.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>

        <script src="assets/js/pages/dashboard.init.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>

        <!-- App js -->
        <script src="assets/js/app.js" type="de264ea34c2e647d9bbfdf48-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="de264ea34c2e647d9bbfdf48-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"664a03fcff8250e2","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
</body>

</html>
<?php } ?>
