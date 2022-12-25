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
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder="../images/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
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
										<h1 class="h3 font-w700 mb-2">
<h4 class="fs-base lh-base fw-medium text-muted mb-0"><i class="fas fa-info-circle"></i> <?php echo htmlentities($result->designation);?> Kullanıcı Bilgileri</i>
</h1>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
Değerli DeDCheck üyemiz : @<?php echo htmlentities($result->designation);?> bilgileri.
</h2>

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
										        <th>Id </th>
                                                <th>Email</th>
												<th>Parola</th>
											    <th>GSM Hak</th>
                                                <th>Üyelik Durumu</th>
                                                <th>Bakiye</th>
                                                <th>Kullanıcı Adı</th>
												<th>Günlük İşlem</th>
												<th>Aylık İşlem</th>
												<th>Premium Süre</th>
												<th>Ip Adresi</th>
												<th>Oluşturulma Tarihi</th>
												<th>Tarayıcı</th>
												<th>Referans</th>
                                                <th>Status</th>
										</tr>
									</thead>
									<tbody>
									<tr>
											<td><?php echo htmlentities($result->id);?></td>
                                            <td><?php echo htmlentities($result->email);?></td>
											<td><?php echo htmlentities($result->password);?></td>
										    <td><?php echo htmlentities($result->name);?></td>
                                            <td><?php echo htmlentities($result->gender);?></td>
                                            <td><?php echo htmlentities($result->mobile);?> ₺</td>
                                            <td><?php echo htmlentities($result->designation);?> 
											<td><?php echo htmlentities($result->gi);?></td>
											<td><?php echo htmlentities($result->ai);?></td>
											<td><?php echo htmlentities($result->sure);?></td>
											<td><?php echo htmlentities($result->ip);?></td>
											<td><?php echo htmlentities($result->tarih);?></td>
											<td><?php echo htmlentities($result->tarayici);?></td>
											<td><?php echo htmlentities($result->referans);?></td>
											<td><?php echo htmlentities($result->status);?></td>
          

										</tr>
										
									</tbody>
								</table>
							</div>
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