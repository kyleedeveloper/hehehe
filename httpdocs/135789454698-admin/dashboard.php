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
	
<!doctype html>
<html lang="en" class="no-js">

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
                                    <div>
                                        <div class="row">
                                            <div class="col-lg-9 col-sm-8">
                                                <div class="p-4">
                                                    <h5 class="text-primary">Tekrar hoş geldin ADMİN!</h5>
                                                    <p>DeDCheck Güvenliği açısından yapılan tüm işlemler kayıt altına alınmaktadır.</p>

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
<?php 
$sql ="SELECT id from users";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$bg=$query->rowCount();
?>
<p class="text-muted font-weight-medium">Toplam Kullanıcı</p>
                                                        <h4 class="mb-0"><?php echo htmlentities($bg);?></h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="fa fa-users font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
																<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="kullanicilistesi.php">
<span><?php echo htmlentities($bg);?> Değerli Kullanıcı</span>
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
                                                        

<?php 
$reciver = 'Admin';
$sql1 ="SELECT id from feedback where reciver = (:reciver)";
$query1 = $dbh -> prepare($sql1);;
$query1-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$regbd=$query1->rowCount();
?>

<p class="text-muted font-weight-medium">Geribildirim Mesajları</p>
                                                        <h4 class="mb-0"><?php echo htmlentities($regbd);?></h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fa fa-envelope font-size-24"></i>
                                                        </span>
                                                    </div>
                                                 </div>
												 				<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="geribildirim.php">
<span><?php echo htmlentities($regbd);?> Geri Bildirim</span>
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
													

<?php 
$reciver = 'Admin';
$sql12 ="SELECT id from notification where notireciver = (:reciver)";
$query12 = $dbh -> prepare($sql12);;
$query12-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
$query12->execute();
$results12=$query12->fetchAll(PDO::FETCH_OBJ);
$regbd2=$query12->rowCount();
?>

<p class="text-muted font-weight-medium">Bildirimler</p>
                                                        <h4 class="mb-0"><?php echo htmlentities($regbd2);?></h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fa fa-bell font-size-24"></i>
                                                        </span>
                                                    </div>
                                                 </div>
												 				<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="bildirimler.php">
<span><?php echo htmlentities($regbd2);?> Bildirim</span>
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
													
												
												<?php 
$sql6 ="SELECT id from deleteduser ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>


<p class="text-muted font-weight-medium">Silinen Kullanıcılar</p>
                                                        <h4 class="mb-0"><?php echo htmlentities($query);?></h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="fa fa-user-times font-size-24"></i>
                                                        </span>
                                                    </div>
                                                 </div>
												 				<hr>
<a class="block-content block-content-full block-content-sm fs-sm fw-medium d-flex align-items-center justify-content-between" href="silinenkullanicilar.php">
<span><?php echo htmlentities($query);?> Silinen Kullanıcı</span>
<i class="fa fa-arrow-alt-circle-right ms-1 opacity-25 fs-base"></i>
</a>
                                            </div>
                                        </div>
                                    </div>	
									</div>	
									</div>	
									
	
		<?php
        include_once("includes/footer.php");
        ?>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	 <script src="../assets/libs/jquery/jquery.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/libs/node-waves/waves.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
          <script src="../assets/libs/apexcharts/apexcharts.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/js/pages/dashboard.init.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="../assets/js/app.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c0746b70745e39c225c525b8-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"660d5bcaaa6be186","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
	
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php } ?>