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
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
								<h4 class="card-title mb-4"><i class="fad fa-asterisk"></i> DeDCheck Data Düzeltici</h4>
								<p class="mb-1">
                                    <p>
										Datalarınızı bu bölümden kolayca checklenebilir formata getirebilirsiniz.</br>
									</p>
                                </p>
							<form action="" method="POST">
			<textarea name="text" type="text" style="text-align: center;" placeholder="Datayı bu alana giriniz.." class="textarea form-control mb-3" rows="10"></textarea>
			<center><button id="baslatButon" type="submit" name="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;" value="Clean that HTML" onclick="goSanitize();" /><i class="fas fa-play"></i> Başlat</button>		</form>
		       <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="dataduzeltici.php" class="text-white"> Temizle</a></button><br><br>
		
		</center>
		</form>
                             
                                <span class="ml-1"><span id="countLine">0</span> tane satır girdiniz. <span id="countInLine">0</span> tane kaldı.</span>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-success">
                                    <div class="card-header bg-transparent border-success">
                                        <h5 class="my-0 text-success"><i class="fad fa-check-circle mr-2"></i>Düzeltilenler <span class="badge badge-pill badge-success" id="countLive">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="liveToggle" type="button" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="collapse show card-body" id="new">
                                            <div style="font-size: 13.5px;">
                                                <span id=".live" class="live">                             
												</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						
							</div>
						</div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-danger">
                                    <div class="card-header bg-transparent border-danger">
                                        <h5 class="my-0 text-danger"><i class="fad fa-times-circle mr-2"></i>Düzeltilemeyenler <span class="badge badge-pill badge-danger" id="countDec">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="decToggle" type="button" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="collapse show card-body" id="decdiv">
                                            <div style="font-size: 13.5px;">
                                                <span id=".dec" class="dec">
                                                
												</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
                     </div>
               </div>
               <!-- container-fluid -->
            </div>
             		<!-- FOOTER -->
				<?php
        include_once("includes/footer.php");
        ?>

      <!-- JAVASCRIPT -->


	  

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