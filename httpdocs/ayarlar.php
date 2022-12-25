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
$error="Mevcut şifreniz geçerli değil.";	
}
}
	
if(isset($_POST['submit']))
  {	
	
	
	$idedit=$_POST['editid'];

	$sql="UPDATE users SET Image=(:image) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':image', $image, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg=" Profil Bilgilerin Başarılıyla Güncellendi!";
}    
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        
         <?php
        include_once("includes/head.php");
        ?>
		
		
		<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert(" Parolalar eşleşmiyor !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
		

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
<img class="rounded-circle header-profile-user" src="../assets/images/ded/ded.png" alt="Header Avatar" style="width:70px; height:70px; border-radius:80%;">
<br><br>
<h1 class="h2 text-white mb-0">Hesabını Düzenle</h1>
<h2 class="h4 font-w400 text-white-75"> <?php echo htmlentities($result->designation);?> </h2>
<br>
<a class="btn btn-light" href="dashboard.php">
<i class="fa fa-fw fa-arrow-left text-danger"></i> Panele Dön </a>
</div>
</div>

<?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>✔️</strong><?php echo htmlentities($msg); ?> </div><?php }?>

 <div class="card">

                                        <div class="card-body">
										
<h3 class="block-title">Profil Ayarları</h3>
<br>
<div class="col-lg-4">
<p class="fs-sm text-muted">
Hesap ayarlarınızı sıfırlayın, mevcut bilgilerinizi görüntüleyin.
</p>
</div>

<br>
<label for="one-profile-edit-username">Kullanıcı Adı</label>
<input type="text" class="form-control" id="one-profile-edit-username" name="designation" placeholder="Yeni Kullanıcı Adı Giriniz.." value="<?php echo htmlentities($result->designation);?>" disabled="">

<br>
<label for="one-profile-edit-email">Email Adresiniz</label>
<input type="email" class="form-control" id="one-profile-edit-email" name="email" placeholder="Enter your email.." value="<?php echo htmlentities($result->email);?>" disabled="">

<br>
<label for="one-profile-edit-email">Üyelik Durumu</label>
<input type="text" class="form-control" id="one-profile-edit-freemium" name="freemium" placeholder="Enter your email.." value="Freemium" disabled="">



<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

</div>
</div>

</form>


<div class="card">
<div class="card-body">
<h3 class="block-title">Parolanı Değiştir</h3>
<div class="col-lg-4">
<br>
<p class="fs-sm text-muted">
Parolanızı değiştirerek hesabınızı güvence altına alın.
</p>
</div>
<br>

<form method="post" name="chngpwd" class="form-horizontal" onSubmit="return valid();">

<label for="one-profile-edit-password">Şuanki Parolanız</label>
<input type="password" class="form-control" name="password" id="password" required>

<br>
<label for="one-profile-edit-password-new">Yeni Parolanız</label>
<input type="password" class="form-control" name="newpassword" id="newpassword" required>

<br>
<label for="one-profile-edit-password-new-confirm">Yeni Parolanızı Onaylayın</label>
<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>

<br>
<button type="submit" name="submit" class="btn btn-success" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
Güncelle </button>
</div>
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
            </div>

        </div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

	
		
		

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
				 $(document).ready(function () {          
					setTimeout(function() {
						$('.succWrap').slideUp("slow");
					}, 3000);
					});
	</script>

</body>

</html>
<?php } ?>