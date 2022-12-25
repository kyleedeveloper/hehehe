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
 
<?php
if($_POST){
$mesaj = $_POST['mobile'];
if( !empty($mesaj) )
    {
    $message = "<b>✅ Gönderildi  </b>";  
    }
else
    {
   $message = "Bekleniyor";
    }
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
		
		
          <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
                                

                
                                              <div class="card">
                                        <div class="card-body">
										<h4 class="fs-base lh-base fw-medium text-muted mb-0">
 <i class="fab fa-whatsapp"> DeDCheck Whatsapp DM SEND</i>
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
WhatsApp INC hesabınız olmadan istediğiniz numaraya mesaj gönderin!
</h2>

</div>
</div>





  <div class="card">
                                        <div class="card-body">


<h5>Whatsapp DM SEND ile ne yapabilirim ?</h5>
<p>
    İstediğiniz bir numaraya numarayı girerek ve mesajınızı bırakarak <u>Whatsapp</u> üzeri mesaj yollayabilirsiniz.
</p>


                               <form action="" method="post">
<div class="block-content tab-content">
<div class="tab-pane active" id="tc" role="tabpanel">

<input type="text" class="form-control" maxlength="20" placeholder="Telefon Numarası Örnek; +905301112323" name="mobile" required><br>
<textarea name="message" type="text" style="text-align: center;" placeholder="Mesajınız..." class="textarea form-control mb-3" rows="10" required></textarea>
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
<th scope="col">Telefon Numarası</th>
<th scope="col">Gönderilen Mesaj</th>
<th scope="col">Gelen Mesaj</th>

</tr>
                            </thead>
                            <tr>
                  
<tbody>
    
<td><?php echo $message; ?> </td>    

<td><?php echo $mobile=$_POST['mobile']; ?> </td>


<td><?php echo $message=$_POST['message']; ?> </td>

<td><?php echo $message2; ?> </td>  

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

<?php 

if(isset($_POST['submit']))
{
	$mobile=$_POST['mobile'];
	$message=$_POST['message'];
	$data = [
    'phone' => $mobile, // Receivers phone
    'body' => $message, // Message
];
$json = json_encode($data); // Encode data to JSON
// URL for request POST /message
$url = 'https://api.chat-api.com/instance311108/message?token=hgxx8mrxvlig16vz';
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);
print_r($result);
}




 ?>









