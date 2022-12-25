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
                  <div class="row">
                     <div class="col-xl-12">
					 

                        <div class="card">
                            <div class="card-body">
								<h4 class="card-title mb-4"><i class="fad fa-edit"></i> DeDCheck Tag Temizleyici</h4>
								
													 <div class="succWrap">
	<span id="hint">Temizlendi ve kopyalandı!</span>
	<br><br>
	</div>
	
								<p class="mb-1">
                                    <p>
										Kodlamalarınızı aşağıda ki kutu sayesinde düzeltilebilir hale getirebilirsiniz.</br>
									</p>
                                </p>
	
							
    <div contenteditable="true" id="content"></div>
			<center><button id="remove-all-style" type="submit" name="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;" value="Clean that HTML" onclick="goSanitize();" /><i class="fas fa-trash-alt"></i> Temizle</button>		</form>
		         <button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> <a href="tagtemizleyici.php" class="text-white"> Sıfırla </a></button><br><br>
		
		</center>
                             
                                <span class="ml-1"><span id="countLine">0</span> tane satır girdiniz. <span id="countInLine">0</span> tane kaldı.</span>
                            </div>
                        </div>
						          </div>
								            </div>
											          </div>          </div>
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