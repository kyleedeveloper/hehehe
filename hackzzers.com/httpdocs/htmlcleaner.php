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
   
     <style>
  
    a, a:hover, a:visited, a:active {
      color: #0078e7;
    }
    #page {
      margin: 0px auto;
      max-width: 960px;
    }
    #content {
      border-width: 3px;
      border-style: dashed;
      height: 40vh;
      margin: 10px 0;
      overflow: auto;
      padding: 6px 10px;
      resize: both;
    }
    #hint {
      color: forestgreen;
      font-weight: bold;
      opacity: 0%;
      margin-left: 1em;
    }
    .pure-button {
      border-radius: 30px;
    }
    @keyframes flash-show {
      from {
        opacity: 100%;
      }
      to {
        opacity: 0%;
      }
    }
    @keyframes flash-green {
      from {
        border-color: forestgreen;
      }
      to {
        border-color: #000;
      }
    }
    #content.run {
      animation: flash-green 4s ease-in;
    }
    #hint.run {
      animation: flash-show 4s ease-in;
    }
    .footnote {
      font-size: 80%;
    }
  </style>
  
  
   
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
						DeDCheck HTML Cleaner
						</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
Biçimlendirilmiş içeriğinizi (ör. Google Dokümanlar'dan) kopyalayıp aşağıdaki kutuya yapıştırın.
</h2>
</div>
</div>
</div>

<div class="succWrap">
	<span id="hint">Temizlendi ve kopyalandı!</span>
	<br><br>
	</div>



                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
								<div class="bg-body-light">

				
				                              <div class="card">
                                        <div class="card-body">
                                            




<div class="block block-rounded">
<div class="block-content">
<h5>Html Cleaner ile ne yapabilirim ?</h5>
<p>Html Dökümanlarınızı aşağıda ki kutuya yapıştırıp düzenleyip, kaldırabilirsiniz</p>
<h5>Neden dökümanlarım düzelmedi?</h5>
<p>Kart dökümanlarınız düzelmediyse bizlere <a href="yardim.php" class="text-white"><b>Geri Bildirim</b></a> gönderebilirsiniz.</p>
</div>
									 
							    			<div id="alert"></div>

    <div contenteditable="true" id="content"></div>
	<br>
	<br>
	<center>
    <button id="remove-white-space-pre" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"
      title="Beyaz boşluk dizileri ve yeni satır karakterleri daraltıldı. Diğer tüm biçimlendirmeleri koruyun. Biçimlendirilmiş Google Dokümanlar içeriğini e-posta istemcisine kopyalarken kullanışlıdır.">Düzeltin ve Kaldırın</button>
	<button id="remove-all-style" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;" title="Yalnızca şematik biçimlendirmenin kalması için tüm 'stil' etiketlerini kaldırın.">Hepsini kaldır</button>
    <button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="htmlcleaner.php" class="text-white"> Sıfırla </a></button>
	</center>
	<br><br>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  
			
			<script src="https://cdnjs.cloudflare.com/ajax/libs/cash/8.1.0/cash.min.js" integrity="sha512-sgDgZX/GgfD7qSeMjPN/oE9EQgXZJW55FIjdexVT60QerG2gAWhR9QDQEGt3O90Dy9jVcwMWsoTMhLgldIiKXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function hide_hint() {
      $("#hint, #content").removeClass();
      void document.getElementById("hint").offsetWidth;
      void document.getElementById("content").offsetWidth;
    }

    function copy_content_and_show_hint() {
      document.getElementById("content").focus();
      var success = document.execCommand("selectAll") && document.execCommand("copy");
      $("#hint").html(success ? "Temizlendi ve kopyalandı!" : "Temizlendi. Ama lütfen manuel olarak yeniden kopyalayın!");
      $("#hint, #content").addClass("run");
    }

    $("#remove-white-space-pre").on("click", () => {
      hide_hint();
      if ($("#content").html()) {
        var contents = $("#content *");
        contents.each((i, elem) => {
          var e = $(elem);
          var s = e.attr("style");
          if(s) e.attr("style", s.replace(/\bwhite-space\s*:\s*[nowrapelibksc-]+\b\s*;?/ig, "").trim());
        });
        contents.removeAttr("class");
        copy_content_and_show_hint();
      }
    });

    $("#remove-all-style").on("click", () => {
      hide_hint();
      if ($("#content").html()) {
        var contents = $("#content *");
        contents.removeAttr("class width height");
        contents.not("b, i, u, em").removeAttr("style");
        copy_content_and_show_hint();
      }
    });
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
<?php } ?>