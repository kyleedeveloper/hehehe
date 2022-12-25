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
	$file = $_FILES['image']['name'];
	$file_loc = $_FILES['image']['tmp_name'];
	$folder="images/";
	$new_file_name = strtolower($file);
	$final_file=str_replace(' ','-',$new_file_name);
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobileno=$_POST['mobile'];
	$designation=$_POST['designation'];
	$idedit=$_POST['editid'];
	$image=$_POST['image'];

	if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$image=$final_file;
		}

	$sql="UPDATE users SET name=(:name), email=(:email), mobile=(:mobileno), designation=(:designation), Image=(:image), gi=(:gi), ai=(:ai), sure=(:sure) WHERE id=(:idedit)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':name', $name, PDO::PARAM_STR);
	$query-> bindParam(':email', $email, PDO::PARAM_STR);
	$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
	$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
	$query-> bindParam(':image', $image, PDO::PARAM_STR);
	$query-> bindParam(':gi', $gi, PDO::PARAM_STR);
	$query-> bindParam(':ai', $ai, PDO::PARAM_STR);
	$query-> bindParam(':sure', $sure, PDO::PARAM_STR);
	$query-> bindParam(':idedit', $idedit, PDO::PARAM_STR);
	$query->execute();
	$msg="Bilgi Başarıyla Güncellendi";
}    
?>

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

  <?php
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>

            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
						
												
												
						<div class="col-xl-12">
							<div class="card">
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8">
                                                <div class="p-4">
                                                    <h5 class="text-primary">Tekrar hoş geldin <?php echo htmlentities($result->designation);?>!</h5>
                                                    <p>DeDCheck artık tamamen yenilendi. Version 2 ile sizler için en uygun hale getirildi.</p>

                                                    <div class="text-muted">
                                                        <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary mr-1"></i> Premium üyelik sistemi eklendi.</p>
                                                        <p class="mb-1"><i class="mdi mdi-circle-medium align-middle text-primary mr-1"></i> Panel kullanım açısından kolaylaştırıldı.</p>
                                                        <p class="mb-0"><i class="mdi mdi-circle-medium align-middle text-primary mr-1"></i> Sistem stabil hale getirildi.</p>
                                                    </div>
                                                        <p class="pt-4">Discord Sunucumuz: <a target="_blank" class="text-white" href="https://discord.gg/q73mmEr4D9">DeD Grup</a></p>
                                                        
       </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-4 align-self-center">
                                                <div>
                                                    <img src="images/img-2.png" alt="" class="img-fluid d-block">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
								
						          </div>
                            </div>
								 </div>
						

							
                            <div class="col-xl-12">
                                <div class="row">
								                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Günlük İşleminiz</p>
                                                        <h4 class="mb-0">0</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="fa fa-box font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
																<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
<span><?php echo htmlentities($result->gi);?> Limitiniz Kaldı</span>
<i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
</a>
                                            </div>
                                        </div>
                                    </div>
									                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Aylık İşleminiz</p>
                                                        <h4 class="mb-0">0</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fa fa-boxes font-size-24"></i>
                                                        </span>
                                                    </div>
                                                 </div>
												 				<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
<span><?php echo htmlentities($result->ai);?> Limitiniz Kaldı</span>
<i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
</a>
                                            </div>
                                        </div>
                                    </div>
									                                    <div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">DeD Cüzdan</p>
                                                        <h4 class="mb-0"><?php echo htmlentities($result->mobile);?> ₺</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fa fa-wallet font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            				<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="bakiyeyukle.php">
<span>Bakiye Yükle</span>
<i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
</a>
											
											</div>
                                        </div>
                                    </div>
																		<div class="col-md-3">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Mevcut Üyelik</p>
                                                        <h4 class="mb-0"><b><?php echo htmlentities($result->gender);?></b></h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
															<i class="far fa-user-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                    </div> 
						<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="javascript:void(0)">
<span><?php echo htmlentities($result->sure);?> Gününüz Kaldı</span>
<i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
</a>
             </div>
             </div>
             </div>
             </div>
                                                
									
									
									
				<div class="card">
                                        <div class="card-body">
				
 <h5 class="text-primary">ÜYELİK BİLGİLERİNİZ</h5>

<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">GSM Pass</th>
<th scope="col">Üyelik Durumu</th>
<th scope="col">Sorgu Pass</th>


</tr>
                            </thead>
                            <tr>
                  
<tbody>
<td> <span class="text-danger"><b><span class="mr-2 badge badge-pill badge-danger"><?php echo htmlentities($result->name);?> Hakkınız Kaldı</span></b></span> </td>

<td> <span class="text-danger"><b><span class="mr-2 badge badge-pill badge-danger"><?php echo htmlentities($result->gender);?></span></b></span> </td>

<td> <span class="text-danger"><b><span class="mr-2 badge badge-pill badge-danger">Bulunamadı</span></b></span> </td>


</tbody>       
</tbody>
</table>
</div>
</div>
</div>							




<div class="card">
                                        <div class="card-body">
				
 <h5 class="text-primary">SİSTEM DURUMLARI</h5>

<div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">SİSTEM</th>
<th scope="col">DURUM</th>
<th scope="col">GECİKME</th>



</tr>
                            </thead>
 <tr>
                  
<tbody>
<td><b>1</b></td>

<td><a href="checker.php">Credit Card Checker</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>3.46 SN</b></td>

</tr>

<tr>
                  
<tbody>
<td><b>2</b></td>

<td><a href="accountchecker.php">Account Checker</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>0.23 SN</b></td>

</tr>

<tr>
                  
<tbody>
<td><b>3</b></td>

<td><a href="proxychecker.php">Proxy Checker</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>5.39 SN</b></td>

</tr>


<tr>
                  
<tbody>
<td><b>4</b></td>

<td><a href="dnschecker.php">DNS Checker</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>2.29 SN</b></td>

</tr>

<tr>
                  
<tbody>
<td><b>5</b></td>

<td><a href="mernis.php">Kişi Sorgu</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>6.35 SN</b></td>

</tr>


<tr>
                  
<tbody>
<td><b>6</b></td>

<td><a href="gsmsorgu.php">GSM Sorgu</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>6.16 SN</b></td>

</tr>


<tr>
                  
<tbody>
<td><b>7</b></td>

<td><a href="plakasorgu.php">Plaka Sorgu</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>2.13 SN</b></td>

</tr>


<tr>
                  
<tbody>
<td><b>8</b></td>

<td><a href="ipsorgu.php">Ip Sorgu</a></td>

<td><span class="text-success"><b><span class="mr-2 badge badge-pill badge-success">Aktif</span></b></span></td>

<td><b>1.34 SN</b></td>

</tr>



</tbody>       
</tbody>
</table>
<hr>
</div>
</div>
</div>
</div>



<!-- DUYURULAR -->
			  	<?php
        include_once("includes/duyurular.php");
        ?>						                                 


                
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