<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	
if(isset($_POST['submit']))
  {	
	$title=$_POST['title'];
    $description=$_POST['description'];
	$user=$_SESSION['alogin'];
	$reciver= 'Admin';
    $notitype='Geri Bildirim Yolladı!';

	$notireciver = 'Admin';
    $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
    $querynoti = $dbh->prepare($sqlnoti);
	$querynoti-> bindParam(':notiuser', $user, PDO::PARAM_STR);
	$querynoti-> bindParam(':notireciver', $notireciver, PDO::PARAM_STR);
    $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
    $querynoti->execute();

	$sql="insert into feedback (sender, reciver, title,feedbackdata) values (:user,:reciver,:title,:description)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':user', $user, PDO::PARAM_STR);
	$query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
	$query-> bindParam(':title', $title, PDO::PARAM_STR);
	$query-> bindParam(':description', $description, PDO::PARAM_STR);
    $query->execute(); 
	$msg=" Yardım Talep Gönderildi!";
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
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
                                              <div class="card">
                                        <div class="card-body">
							
											 <form method="post" class="form-horizontal" enctype="multipart/form-data">
											 
<center>
<img src="images/mail.png" alt="" height="40"><br><br>
<h1 class="h2 text-white mb-0">Destek Merkezi</h1><br>
<h5> DeDCheck ile ilgili yardıma ihtiyacınız olduğunda her daim yanınızdayız. </h5>
</div>
</div>


<?php
		$sql = "SELECT * from users;";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>


<?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>BAŞARILI</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
	
	
	 <div class="card">

                                        <div class="card-body">
										
							    				<div class="form-group">
											    <label for="one-profile-edit-username">Sana nasıl yardımcı olabiliriz?</label>
												<select class="form-control custom-select"> 
                                                <option >Yardım & Destek</option> 
                                                <option >Faturalandırma</option> 
                                                <option >Güvenlik</option> 
												<option >İstek & Öneri</option>
												<option >Hata Raporu</option>
												<option >Çeviri Hataları</option>
												<option >Tools & Checker Sorunları</option>
												</select> 
												<br><br><br>
												<label for="one-profile-edit-username">Başlık:</label>
												<input type="text" name="title" class="form-control" placeholder="Lütfen bir başlık giriniz."  required>
							    				<br><br>
												<label for="one-profile-edit-username">Açıklama:</label>
												<textarea type="text" name="description" style="text-align: center;" placeholder="Açıklama" class="textarea form-control mb-3" rows="10" required=""></textarea>
												<br>

							    		<center>
							    				<button  type="submit" name="submit" class="btn btn-success" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">Gönder </button>
							    			</center><br><br>
											
											 </form>
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