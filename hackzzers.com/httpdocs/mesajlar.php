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
	


	<link rel="stylesheet" href="css/bootstrap.min.css">

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

            

								    
								    <div class="card">
                                        <div class="card-body">
                                            

						<h4 class="fs-base lh-base fw-medium text-muted mb-0">
						Gelen Mesajlar
						</h4>
						<br>
						<div class="panel panel-default">
							<?php if($error){?><div class="errorWrap" id="msgshow"><?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" id="msgshow"><?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										       <th>#</th>
												<th>Kullanıcı</th>
												<th>Mesaj</th>
										</tr>
									</thead>
									
									
									
									<tbody>

<?php 
$reciver = $_SESSION['alogin'];
$sql = "SELECT * from  feedback where reciver = (:reciver)";
$query = $dbh -> prepare($sql);
$query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
                                            <td><?php echo htmlentities($result->sender);?></td>
											<td><?php echo htmlentities($result->feedbackdata);?></td>
										</tr>
														<?php $cnt=$cnt+1; }} ?>
										
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
     <!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<?php
        include_once("includes/tablo.php");
        ?>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/main.js"></script>
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