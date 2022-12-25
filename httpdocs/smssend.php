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
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">
<i class="fas fa-sms"> SMS SEND</i>
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
İstediğniz telefon numarası üzerinden istediğiniz numaraya SMS gönderin!
</h2>


	
</div>
</div>


	 <?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
 else if($msg){?><div class="succWrap"><strong>✔️</strong><?php echo htmlentities($msg); ?> </div><?php }?>
<br>
  <div class="card">
                                        <div class="card-body">


<h5>SMS SEND ile ne yapabilirim ?</h5>
<p>
    İstediğiniz bir numaraya numarayı girerek ve mesajınızı bırakarak <u>SMS</u> üzeri SMS yollayabilirsiniz.
</p>
	<small id="name" class="form-text text-muted"><strong>*NOT: </strong> SMS Gönderim <u>TURKCELL</u> Operatör <b><u>DESTEKLEMEMEKTEDİR.</u></b> Turkcell Dışı Tüm operatörler'de sms gönderimi yapılmaktadır.</small>
<br><br>
	


  <form method="post">
  <div class="block-content tab-content">
<div class="tab-pane active" id="tc" role="tabpanel">

    <label for="to">SMS Atılacak Numara</label>
    <input type="text" class="form-control" maxlength="20" placeholder="Telefon Numarası Örnek; 905301112323" name="to" id="to" required><br>

    <label for="from">SMS Atan Numara</label>
    <select class="form-control custom-select" id="from" name="from" onchange="if (!window.__cfRLUnblockHandlers) return false; if (!window.__cfRLUnblockHandlers) return false;" data-cf-modified-356c90b184544ad8153059eb-="">
      <option value="909999999999">+90 999 999 9999</option>
      <option value="904300000000">+90 430 000 0000</option>
      <option value="901234567890">+90 123 456 7890</option>
      <option value="9230">9230</option>
      <option value="0850">0850</option>
      <option value="8575">8575</option>
      <option value="908508543564">0850 854 3564</option>
      <option value="908509756224">0850 975 6224</option>
      <option value="908504336222">0850 433 6222</option>
    </select>
	<br><br>
    <label for="sms">SMS İçeriği</label>
    <textarea id="sms" name="sms" type="text" style="text-align: center;" placeholder="Mesajınız..." class="textarea form-control mb-3" rows="10" required></textarea>
                                </div>


    <center>
<button name="submit" type="submit" class="btn btn-success" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">Gönder <i class="fas fa-paper-plane"></i></button></form>
<br><br>
</center>


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
<th scope="col">Durum</th>
<th scope="col">Gönderen Numara</th>
<th scope="col">Gönderilen Numara</th>
<th scope="col">Gönderilen Mesaj</th>


</tr>
                            </thead>
                            <tr>
                  
<tbody id="kisiData">
    
<td><?php echo $message; ?> </td>   

<td> </td>

<td> </td>

<td> </td>
  

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