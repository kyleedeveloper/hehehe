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
        
       <?php
        include_once("includes/head.php");
        ?>

    </head>

    
   <?php
        include_once("includes/menu.php");
        ?>
                 <div class="main-content">
			    
			    
			<div class="page-content">
                    <div class="container-fluid">

            

								    
								    <div class="card">
                                        <div class="card-body">
                                            
								    

<h4 class="fs-base lh-base fw-medium text-muted mb-0">
					DeDCheck Wordlist Generator
						</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
Bir sosyal medya hesabı çalmak için kurbanın bilgilerini girerek bir wordlist (şifreleme) oluşturun.
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
<h5>Wordlist ile ne yapabilirim ?</h5>
<p>Belirli bir kişinin bilgilerini girerek, 10.000 üzerinde ona ait şifre oluşturup hesabına kaba kuvvet (brute force) saldırısı yapabilirsiniz.</p>
<h5>DİKKAT!</h5>
<p>Şifreleme daha güçlü olması için bilgileri girerken türkçe kelime kullanmayın, ve 2 kelimeli olan kelimeleri birleşik yazın.</p>
</div>

<div class="block-content tab-content">
<div class="tab-pane active" id="tc" role="tabpanel">
    
<form method=POST action="customwordlistgenerator.php">
                                    
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Adı:</strong></small>
                                   <input class="form-control" type="text" name="fname"   placeholder="Örnek ; Alex"><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Soyadı:</strong></small>
                                   <input class="form-control" type="text" name="lname"   placeholder="Örnek ; Cristoper"><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Takma Adı:</strong></small>
                                   <input class="form-control" type="text" name="nname"   placeholder="Örnek ; Helios"><br>
                                   <input type=hidden name=key value=jgsue6r32enaskd0823>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Doğum Yılı Minimum:</strong></small>
                                   <input class="form-control" type="text" name="min" maxlength=4 min=1950 max=2030   placeholder="Örnek ; 1990"><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Doğum Yılı Maximum:</strong></small>
								   <input class="form-control" type="text" name="max" maxlength=4 min=1950 max=2030   placeholder="Örnek ; 2000 "><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın İş Yeri Veya Okul Adı:</strong></small>
								   <input class="form-control" type="text" name="insname" placeholder="Örnek ; Cafe Bistro"><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Evcil Hayvanının Adı:</strong></small>
								   <input class="form-control" type="text" name="pet"     placeholder="Örnek ; Abdullah Öcalan"><br>
								   <small id="name" class="form-text text-muted"><strong>Kurbanın Kişilik Kelimeleri:</strong></small>
								   <input class="form-control" type="text" name="extra"   placeholder="Örnek ; Kral, Adam, Alexo"><br>
                                   <input type=checkbox name=common value=1> Ayrıca yaygın olarak kullanılan şifreleri de ekleyin<br><br>
</div>


<center>
<button type="submit" name="yolla" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-plus-square"></i> Oluştur</button> </form>
<br><br>
</center>
</form>

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