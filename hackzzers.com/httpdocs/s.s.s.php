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
		
		<link rel="stylesheet" href="s.s.s/sss.css">
		
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
<div class="bg-body-light">

                            
                                            
 <div class="card">
                                        <div class="card-body">
							

<center>
<h1 class="h2 text-white mb-0">Destek Merkezi</h1><br>
<h5 class="fs-base lh-base fw-medium text-muted mb-0"> DeDCheck ile ilgili yardıma ihtiyacınız olduğunda her daim yanınızdayız. </h5>
</div>
</div>



 <div class="container">
    <h2>Hesap & Ödeme Sorunları</h2>
	 <div class="card">
                                        <div class="card-body">
    <div class="accordion">
	<div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false">
          <span class="accordion-title">Nasıl bakiye yüklerim?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Bakiye yüklemek için papara veya ininal hesabınızın olması lazım, papara veya ininal hesabınız var ise <a href="bakiyeyukle.php" class="text-white">Bakiye Yükle</a> Sayfasına giderek gerekli adımları yapabilirsiniz.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false">
          <span class="accordion-title">Ödemem ne zaman onaylanır?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Kripto ödemeler hariç diğer ödeme yöntemlerinden yaptığınız ödemeler manuel olarak incelenmektedir.Ödeme Departmanımız maksimum 1 iş gününde ödemenizi onaylayacaktır.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false">
          <span class="accordion-title">Ödeme açıklamasını yazmadım , ne yapmam gerek?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Endişelenmeyin sayfanın altındaki destek talebi oluştur butonuna tıklayarak destek talebi oluşturun , sizden ödeme yaptığınıza dair bazı bilgiler isteyeceğiz.Bu işlem 1 iş günü sürebilir.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false">
          <span class="accordion-title">Hesabımı ortak kullanabilir miyim?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Böyle bir şey tespit edildiğinde üyeliğiniz iptal edilecektir ve kalıcı olarak yasaklanacaktır.Yaptığınız ödemeler iade edilmeyecektir.</p>
        </div>
      </div>
	  <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false">
          <span class="accordion-title">Bilgilerim güvende mi? Yaptığım sorgular kaydediliyor mu?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Hesap bilgileriniz şifrelenerek off-shore sunucularda depolanmaktadır.Hiç bir devlet yetkilisi bu bilgilere erişemez.Yaptığınız T.C. , GSM Sorgular kesinlikle kayıt altına alınmamaktadır , ancak bu bilgilerle yapacağınız işlemler size aittir.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


 <div class="container">
    <h2>Checker Sorunları</h2>
	 <div class="card">
                                        <div class="card-body">
    <div class="accordion">
      <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false">
          <span class="accordion-title">CC Checker hatalı test yapıyor?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Bunun nedeni POS'larımızın bakımda olmasıdır.Sizlere en iyi kart/hesap/proxy check sistemini sunmak için güçlü POS'lar kullanıyoruz ve bazen sistemlerimizde arıza yaşanabiliyor.En kısa sürede bu sorunu gidererek yeniden stabil hale getirmekteyiz.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false">
          <span class="accordion-title">Ödeme açıklamasını yazmadım , ne yapmam gerek?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Endişelenmeyin sayfanın altındaki destek talebi oluştur butonuna tıklayarak destek talebi oluşturun , sizden ödeme yaptığınıza dair bazı bilgiler isteyeceğiz.Bu işlem 1 iş günü sürebilir.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false">
          <span class="accordion-title">Üretilmiş Kartlar Yasak mı?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>HiCheck olarak en katı kurallarımızdan biri de geçersiz kartları POS'larımızda kullanmanızdır.Geçersiz kartlar POS'larımıza zarar vermekte ve hızlı bir şekilde işlev göremez hale gelmesine sebep olmaktadır.Üretilmiş , geçersiz kart numarası giren kullanıcılar sistem tarafından tespit edilip 5 gün boyunca sistemden uzaklaştırılmaktadır.</p>
        </div>
      </div>
	  <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false">
          <span class="accordion-title">Kart Formatı Geçersiz hatası nedir?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Kartlarınızı düzenlemediğiniz takdirde bu hatayla karşılaşmanız muhtemeldir.Card Formatter sayfasından kartlarınızı düzelttikten sonra tekrar deneyiniz.</p>
            </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="container">
    <h2>Sistem Sorunları</h2>
	 <div class="card">
                                        <div class="card-body">
    <div class="accordion">
      <div class="accordion-item">
        <button id="accordion-button-1" aria-expanded="false">
          <span class="accordion-title">DeDCheck Ücretsiz mi?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>DeDCheck tamamen ücretsiz değildir.Ücretsiz kullanıcılarımız belli kart , hesap , proxy checker sunucularında işlem yapabilmektedirler.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-2" aria-expanded="false">
          <span class="accordion-title">Kredi Kartıyla ödeme yapabilir miyim?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>DeDCheck resmi bir site değildir , bu yüzden kredi kartıyla ödeme yapamazsınız.Ancak farklı ödeme yöntemleri eklememizi istiyorsanız destek talebi oluşturarak bunu belirtebilirsiniz.</p>
        </div>
      </div>
      <div class="accordion-item">
        <button id="accordion-button-3" aria-expanded="false">
          <span class="accordion-title">Deneme amaçlı DeDPremium olabilir miyim?</span>
          <span class="icon" aria-hidden="true"></span>
        </button>
        <div class="accordion-content">
          <p>Böyle bir şey ne yazık ki söz konusu değildir.DeDCheck yetkilisi olduğunu iddia eden kişilerle iletişim kurmayınız , sadece web sitemiz üzerinden destek alınız.</p>
        </div>
      </div>
    </div>
  </div>
</div>

	
<div class="bg-body-dark">
<div class="content content-full">
<div class="my-5 text-center">
<h3 class="h4 fw-bold mb-4">Aradığını bulamıyor musun?</h3>
<a class="btn rounded-pill btn-primary px-4 py-2" href="yardim.php">Destek Talebi Oluştur</a>
</div>
</div>
</div>                  
</div>
</div>
</div>
</div>

</main>


<script>
const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
		
		<!-- FOOTER		-->
		
		   <?php
        include_once("includes/footer.php");
        ?>
            </div>

        </div>
        
		

	
		
		

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

        <script src="assets/js/pages/dashboard.init.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

        <!-- App js -->
        <script src="assets/js/app.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
		
		<script src="assets/libs/toastr/build/toastr.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

        <!-- toastr init -->
        <script src="assets/js/pages/toastr.init.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="cf56b57abb6a0e391d15fdc1-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"662d095cebc8507b","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
	<script type="text/javascript">
		<script type="text/javascript">
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>
</body>

</html>
<?php } ?>