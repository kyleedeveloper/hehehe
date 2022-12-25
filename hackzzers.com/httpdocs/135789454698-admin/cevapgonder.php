<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

	if(isset($_GET['reply']))
	{
	$replyto=$_GET['reply'];
	}   

	if(isset($_POST['submit']))
  {	
	$reciver=$_POST['email'];
    $message=$_POST['message'];
	$notitype='Mesaj Gönderdi';
	$sender='JOKER';
	
    $sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
    $querynoti = $dbh->prepare($sqlnoti);
	$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
	$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
    $querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
    $querynoti->execute();

	$sql="insert into feedback (sender, reciver, feedbackdata) values (:user,:reciver,:description)";
	$query = $dbh->prepare($sql);
	$query-> bindParam(':user', $sender, PDO::PARAM_STR);
	$query-> bindParam(':reciver', $reciver, PDO::PARAM_STR);
	$query-> bindParam(':description', $message, PDO::PARAM_STR);
    $query->execute(); 
	$msg=" Cevap Gönderildi";
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
		$sql = "SELECT * from users;";
		$query = $dbh -> prepare($sql);
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
								<div class="bg-body-light">
   <div class="card">
   <div class="card-body">                           
 <div class="card">
                                        <div class="card-body">
                           <h4 class="fs-base lh-base fw-medium text-muted mb-0">
						   Cevap Gönder
						   </h4>
						   <br>
								<div class="panel panel-default">
<?php if($error){?><div class="errorWrap"><strong>HATA</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>✔️</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">

<div class="form-group">
	<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
	<div class="form-group">
	<input type="text" name="email" class="form-control" value="<?php echo htmlentities($replyto);?>">
	</div>
	</div>


<div class="form-group">
	<label class="col-sm-2 control-label">Mesaj<span style="color:red">*</span></label>
	<div class="form-group">
	<textarea name="message" class="form-control" cols="30" rows="10"></textarea>
	</div>
</div>

<input type="hidden" name="editid" class="form-control" required value="<?php echo htmlentities($result->id);?>">

<div class="form-group">
	<div class="col-sm-8 col-sm-offset-2">
	
		<button class="btn btn-primary" name="submit" type="submit">Gönder</button>
			
	</div>
</div>

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
					</div>
				</div>
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