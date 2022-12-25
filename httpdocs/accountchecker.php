
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
								<h4 class="card-title mb-4"><i class="fad fa-user-circle"></i> DeDCheck Account Checker</h4>
								<p class="mb-1">
                                    <p>
										Bu bölümden seçtiğiniz platformdaki hesapları kolaylıkla checkleyebilirsiniz!</br>
                                        <strong>Örnek format: </strong><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="017564727541666c60686d2f626e6c"></a>test@gmail.com:sifre
                                    </p>
                                </p>
								<textarea style="text-align: center;" id="list" placeholder="Hesapları bu alana giriniz..&#10;Örnek: test@gmail.com:sifre" class="textarea form-control mb-3" rows="10"></textarea>
                                <center class="mb-1">
									<button id="start" type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
									<button id="stop" type="submit" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                                    <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="accountchecker" class="text-white"> Temizle </a></button>
                                </center>
                                <span class="ml-1"><span id="">0</span> tane satır girdiniz. Checklenmemiş satır sayısı: <span id="">0</span></span>
                                <div class="form-group col-3 mt-3 mb-3">
                                    <label for="checker_name"><i class="fad fa-user-circle"></i> Platform</label>
                                    <select class="form-control custom-select" id="checker_name" name="checker_name" onchange="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false;" data-cf-modified-a4f4b86c1326a86f15dcd0de-="">
										<option value="craftrise" selected>CraftRise (Freemium)</option>
										<option value="trendyol"  disabled>Trendyol (Premium)</option>
										<option value="gittigidiyor"  disabled>GittiGidiyor (Premium)</option>
																			</select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-success">
                                    <div class="card-header bg-transparent border-success">
                                        <h5 class="my-0 text-success"><i class="fad fa-check-circle mr-2"></i>Onaylananlar <span class="badge badge-pill badge-success" id="cLive">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="mostra" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>
                                    </div>
									
  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span  id="cLive2" class="badge badge-success"></span></h6>
    <div id="bode"><span id="lives" class="aprovadas"></span>
                                            </div>
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
                                        <h5 class="my-0 text-danger"><i class="fad fa-times-circle mr-2"></i>Onaylanmayanlar <span class="badge badge-pill badge-danger" id="cDie">0</span></h5>
										<div style="position: absolute; top:10px; right: 10px;"><button id="mostra2" class="btn btn-light btn-rounded btn-sm"><i class="fas fa-eye-slash"></i> Gizle</button></div>
                                    </div>
									 <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span id="cDie2" class="badge badge-danger"></span></h6>
    <div id="bode2"><span id="dies" class="reprovadas">
                                                
												</span>
                                 
                                               
                                      </div>    
                                    </div>
                                </div>
							</div>
						</div>
                     </div>
               </div>
               <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            
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

				<script>
   // var audio = new Audio('blop.mp3'); -> isterseniz kullanın
    $(document).ready(function() {
        $('#start').attr('disabled', null);
        $('#start').click(function() {
            //audio.play();

            var line = $('#list').val().split('\n');
            var total = line.length;
            var ap = 0;
            var rp = 0;
            var st = 'Komut Bekleniyor!';
            $('#carregadas').html(total);
            $('#status').html(st);
            line.forEach(function(value) {
                var list = value.split('|');
                var ajaxCall = $.ajax({
                    url: 'acapi.php',
                    type: 'GET',
					data: {istek: value},
                    beforeSend: function() {
                        $('#stop').attr('disabled', null);
                        $('#start').attr('disabled', 'disabled');
                        var st = 'Başlatıldı!';
                        $('#status').html(st);

                    },

                    success: function(data) {
                        if (data.indexOf("Giriş Başarılı") >= 0) {
                            $("#lives").val(data + "\n" + $("#lives").val());
                            ap = ap + 1;
                            document.getElementById("lives").innerHTML += data + "";

                            //audio.play(); --> Aktif hesap çıkınca
                            removelinha();
                        } else {
                            $("#dies").val(data + "\n" + $("#dies").val());

                            rp = rp + 1;
                            document.getElementById("dies").innerHTML += data + "";
                            removelinha();
                        }
                        var fila = parseInt(ap) + parseInt(rp);
                        $('#cLive').html(ap);
                        $('#cDie').html(rp);
                        $('#total').html(fila);
                        if (fila == total) {
                            $('#start').attr('disabled', null);
                            $('#stop').attr('disabled', 'disabled');
                            audio.play();
                            var st = 'Başarıyla Bitti';
                            $('#status').html(st);

                        }

                    }

                });
                $('#stop').click(function() {
                    ajaxCall.abort();
                    $('#start').attr('disabled', null);
                    $('#stop').attr('disabled', 'disabled');
                    var st = 'Durduruldu';
                    $('#status').html(st);
                });
            });
        });
    });

    function removelinha() {
        var lines = $("#list").val().split('\n');
        lines.splice(0, 1);
        $("#list").val(lines.join("\n"));
    }
                </script>
			
                      
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