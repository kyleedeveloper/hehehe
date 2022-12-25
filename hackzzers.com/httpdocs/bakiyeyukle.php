<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{   
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
										 <div class="card-body">
										
<h1 class="h3 fw-bold mb-2"><b>
Bakiye Yükle</b>
</h1>
<h5 class="fs-base lh-base fw-medium text-muted mb-0">
Size uygun ödeme yöntemleri ile hesabınıza bakiye yükleyin.
</h5>
</div>
<nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
<ol class="breadcrumb breadcrumb-alt">
<li class="breadcrumb-item">
<a href="ayarlar.php" class="text-white">Hesabım</a>
</li>
<li class="breadcrumb-item" aria-current="page">
Bakiye Yükle
</li>
</ol>
</nav>
</div>
</div>





<div class="content" id="purchase">
<h5 class="text-blue"><b>BİLGİLENDİRME<b></h5>
</div>


<div class="col-xl-12 col-xl-12">
<div class="block">
 <div class="card">
                                        <div class="card-body">
<div class="block-header">
<h3 class="fs-base lh-base fw-medium text-muted mb-0">ÖDEMELER HAKKINDA GENEL BİLGİLENDİRME</h3>
</div>
<br>
<div class="block-content">
<p>Papara Ödemeleri</p>
<li><b>1325774925</b> Papara numarasına belirttiğiniz ücret üzerinden Ödeme açıklamasına [DED-PAY-<?php echo htmlentities($result->designation);?><?php echo htmlentities($result->id);?>] Yazarak Bakiye yükleyebilirsiniz.</li>
<br>

<p>Ininal Ödemeleri</p>
<li><b>4012450298650</b> Ininal numarasına belirttiğiniz ücret üzerinden Ödeme açıklamasına [DED-PAY-<?php echo htmlentities($result->designation);?><?php echo htmlentities($result->id);?>] Yazarak Bakiye yükleyebilirsiniz.</li>

<br>

<p>Genel Bilgilendirme</p>
<li>Bu ödeme yöntemlerinden numaraya gönderdiğiniz TL kadar ödeme yaparsanız DedCheck Hesabınıza o kadar bakiye yüklenecektir..</li>
<li>Ödemeler manuel incelendiği için maksimum 1 iş gününde hesabınıza tanımlanır , destek talebi oluşturup dekont resmini yüklerseniz işlemlerinizi hızlandırabiliriz.</li><br>

</div>
</div>
</div>
</div>
</div>


<div class="content" id="purchase">
<h5 class="text-blue"><b>SON ÖDEMELERİM<b></h5>
</div>

<div class="col-xl-12 col-xl-12">
<div class="block">
<div class="card">
                                        <div class="card-body">
<div class="block-header">

<h3 class="fs-base lh-base fw-medium text-muted mb-0">SON 2 ÖDEMELERİM</h3>
</div>
<br>
<div class="block-content">
<table class="table table-hover table-vcenter">
<thead>
<tr>
<th>Ödeme Yöntemi</th>
<th>Ödeme Durumu</th>
<th class="d-none d-sm-table-cell" style="width: 15%;">Ödenecek Tutar</th>
</tr>
</thead>
<tbody>
<tr>
<td class="fw-semibold fs-sm">
<a href="">Papara [DED-PAY-<?php echo htmlentities($result->designation);?><?php echo htmlentities($result->id);?>]</a>

<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Ödeme Bekleniyor</span>
</td>
<td class="d-none d-sm-table-cell">
Belirsiz
</td>
</tr>
<td class="fw-semibold fs-sm">
<a href="">Ininal [DED-PAY-<?php echo htmlentities($result->designation);?><?php echo htmlentities($result->id);?>]</a>
</td>

<td class="d-none d-sm-table-cell">
<span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-info-light text-info">Ödeme Bekleniyor</span>
</td>
<td class="d-none d-sm-table-cell">
Belirsiz
</td>
</table>
</div>
</div>
</div>
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
