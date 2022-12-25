<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_GET['edit']))
	{
		$editid=$_GET['edit'];
	}


	
if(isset($_POST['submit']))
  {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$mobileno=$_POST['mobileno'];
	$designation=$_POST['designation'];
	$idedit=$_POST['idedit'];
    $gi=$_POST['gi'];
    $ai=$_POST['ai'];
	$sure=$_POST['sure'];
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$image=$final_file;
		}

	$sql="UPDATE users SET name=(:name), email=(:email), gender=(:gender), mobile=(:mobileno), designation=(:designation), gi=(:gi), ai=(:ai), sure=(:sure) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':gender', $gender, PDO::PARAM_STR);
	$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
	$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
    $query-> bindParam(':gi', $gi, PDO::PARAM_STR);
	$query-> bindParam(':ai', $ai, PDO::PARAM_STR);
	$query-> bindParam(':sure', $sure, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg=" Bilgi Başarıyla Güncellendi";
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

<?php
		$sql = "SELECT * from users where id = :editid";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':editid',$editid,PDO::PARAM_INT);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
	
<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
                                              <div class="card">
                                        <div class="card-body">
										
										
										<form method="post" class="form-horizontal" enctype="multipart/form-data" name="imgform">
										
										
										<center>
<img class="rounded-circle header-profile-user" src="../assets/images/ded/ded.png" alt="Header Avatar" style="width:70px; height:70px; border-radius:80%;">
<br><br>
<h1 class="h2 text-white mb-0">Kullanıcıyı Düzenle</h1><br>
<h2 class="h4 font-w400 text-white-75">@<?php echo htmlentities($result->designation);?> </h2>
<br>
<a class="btn btn-light" href="kullanicilistesi.php">
<i class="fa fa-fw fa-arrow-left text-danger"></i> Panele Dön </a>
</div>
</div>
										
	<?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>✔️</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>					
						
								
 <div class="card">

                                        <div class="card-body">

		<h3 class="block-title"><?php echo htmlentities($result->designation);?> Profil Ayarları</h3>
<br>
<div class="col-lg-4">
<p class="fs-sm text-muted">
Kullanıcının profil resmini güncelleyin , mevcut bilgilerini düzenleyin.
</p>
</div>

<br>
<label for="one-profile-edit-username">Kullanıcı Adı</label>
<input type="text" class="form-control" id="one-profile-edit-username" name="designation" placeholder="Yeni Kullanıcı Adı Giriniz.." value="<?php echo htmlentities($result->designation);?>">

<br>
<label for="one-profile-edit-email">Email Adresiniz</label>
<input type="email" class="form-control" id="one-profile-edit-email" name="email" placeholder="Yeni E-mail Giriniz.." value="<?php echo htmlentities($result->email);?>">

<br>
<label for="one-profile-edit-gender">Üyelik Durumu</label>
<select name="gender" class="form-control">
                            <option value="Freemium">Freemium</option>
                            <option value="DedPass">DedPass</option>
							<option value="Premium">Premium</option>
                            <option value="Premium+">Premium+</option>
                            </select>



<br>
<label for="one-profile-edit-gi">Günlük İşlem</label>
<input type="number" class="form-control" id="one-profile-edit-gi" name="gi" placeholder="Günlük İşlem Belirleyiniz..." value="<?php echo htmlentities($result->gi);?>">

<br>


<label for="one-profile-edit-ai">Aylık İşlem</label>
<input type="number" class="form-control" id="one-profile-edit-ai" name="ai" placeholder="Aylık İşlem Belirleyiniz..." value="<?php echo htmlentities($result->ai);?>">


<br>
<label for="one-profile-edit-sure">Premium Süre</label>
<input type="number" class="form-control" id="one-profile-edit-sure" name="sure" placeholder="Premium Süresini Belirleyiniz..." value="<?php echo htmlentities($result->sure);?>">

<br>
<label for="one-profile-edit-email">Bakiye</label>
<input type="text" class="form-control" id="one-profile-edit-mobileno" name="mobileno" placeholder="Bakiye Giriniz.." value="<?php echo htmlentities($result->mobile);?>">

<br>
<label for="one-profile-edit-email">GSM Hak</label>
<input type="text" class="form-control" id="one-profile-edit-mobileno" name="name" placeholder="GSM Hak Giriniz.." value="<?php echo htmlentities($result->name);?>">

		<input type="hidden" name="idedit" value="<?php echo htmlentities($result->id);?>" >

<br>
<button type="submit" name="submit" class="btn btn-success" style="width: 180px; height: 45px; outline: none; margin-left: 5px;">
Güncelle </button>
</div>
</div>

</form>



									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
	
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