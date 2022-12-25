<?php

$ip = $_SERVER['REMOTE_ADDR'];
$tarih = date('d.m.Y H:i:s');
$tarayici = getenv('HTTP_USER_AGENT');
$referans = $_SERVER['HTTP_REFERER'];

$kayit = fopen("jokerkytyawrasrwrfytea.txt", "a");
fputs($kayit, "IP: $ip - TARIH: $tarih - BROWSER: $browser - REFERANS: $referans \n");
fclose($kayit);

?>

<?php
include('includes/config.php');
if(isset($_POST['submit']))
{

$email=$_POST['email'];
$password=md5($_POST['password']);
$designation=$_POST['designation'];

$notitype='Hesap Oluşturuldu!';
$reciver='Admin';
$sender=$email;

$sqlnoti="insert into notification (notiuser,notireciver,notitype) values (:notiuser,:notireciver,:notitype)";
$querynoti = $dbh->prepare($sqlnoti);
$querynoti-> bindParam(':notiuser', $sender, PDO::PARAM_STR);
$querynoti-> bindParam(':notireciver',$reciver, PDO::PARAM_STR);
$querynoti-> bindParam(':notitype', $notitype, PDO::PARAM_STR);
$querynoti->execute();    
    
$sql ="INSERT INTO users(name, email, password, designation, gi, ai, sure, ip, tarih, tarayici, referans, mobile, gender, status) VALUES('0', :email, :password, :designation, '50', '300', '0', :ip, :tarih, :tarayici, :referans, '0.00', 'Freemium', 1)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
$query-> bindParam(':ip', $ip, PDO::PARAM_STR);
$query-> bindParam(':tarih', $tarih, PDO::PARAM_STR);
$query-> bindParam(':tarayici', $tarayici, PDO::PARAM_STR);
$query-> bindParam(':referans', $referans, PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script type='text/javascript'>alert('Kayıt Başarılı!');</script>";
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
}
else 
{
$error="Bir şeyler ters gitti, lütfen tekrar deneyin.";
}

}


?>

   <?php
        include_once("includes/head.php");
        ?>






    </head>
	

	
	<script type="text/javascript">
	
		function showAlert(string, type){
			if(string !== ''){
				switch(type){
					case "success":
					string = '<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show shadow-success" role="alert">' + string + '</div>';
						break;
					case "danger":
					string = '<div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show shadow-danger" role="alert">' + string + '</div>';
						break;
					case "warning":
					string = '<div class="alert alert-warning alert-dismissible bg-warning text-white border-0 fade show shadow-warning" role="alert">' + string + '</div>';
						break;
					case "primary":
					string = '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show shadow-primary" role="alert">' + string + '</div>';
						break;
				}
				$("#alert").show();
				$("#alert").html(string);
			}
		}
		
	</script>
	
	<script src="https://www.google.com/recaptcha/api.js" async defer type="text/javascript"></script>

    <body>
    <div class="container">

 <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-soft-primary">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Hoş geldiniz!</h5>
                                            <p>Bu bölümden kayıt olabilirsiniz.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div>
                                    <span>
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="/assets/images/ded/ded.png" alt="" class="rounded-circle" height="50">
                                            </span>
                                        </div>
                                    </span>
                                </div>
                                
                                  <?php

                    if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                    {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                    }
                ?>
				
				<?php if (isset($error)) : ?>
	<div class="btn btn-primary-inverse btn-lg btn-block" role="alert">
	<?php Util::display($error); ?>
	</div>
<?php endif; ?>

              </div>


 <div class="p-2">
                                 
                                 
                <form method="post" class="form-horizontal" enctype="multipart/form-data" name="regform" onSubmit="return validate();">
						
                                           
										
										<div class="form-group">
                                            <label for="email">Kullanıcı Adı</label>
                                            <input type="text" class="form-control form-control-user" name="designation" placeholder="Kullanıcı Adınızı giriniz" onkeydown="if(event.keyCode == 13) $('#girisbuton').click()" required="">
                                        </div>
										
                                        <div class="form-group">
                                            <label for="kullaniciadi">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email adresinizi giriniz" onkeydown="if(event.keyCode == 13) $('#girisbuton').click()" required="">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="sifre">Şifre</label>
                                            <input type="password" class="form-control" name="password" placeholder="Şifrenizi giriniz" onkeydown="if(event.keyCode == 13) $('#girisbuton').click()" required="">
                                        </div>
	
										<div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline"><a href="kurallar.php" target="_blank">Kuralları okudum</a>, kabul ediyorum.</label>
                                        </div>

                                        <div class="mt-3">
											<div class="g-recaptcha" data-sitekey="6LeENNYZAAAAAHCCTw9bKSU-ElKVPoclYLnsXHXp" data-callback="createAccount" data-size="invisible"></div>
                                            <button name="submit" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Kayıt Ol</button>
                                        </div>
										
										<div class="mt-2">
										<a href="index.php" class="btn btn-outline-primary btn-block text-white waves-effect waves-light">Giriş Yap</a>
										   </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        </form>



<div class="mt-5 text-center">
                            
                            <div>
                                <p>Hesabınız var mı ? <a href="index.php" class="font-weight-medium text-primary"> Hemen giriş yap </a> </p>
                                <p>Copyright © 2021 <b>DeDCheck Community</b> all rights reserved.<br> <i class="fas fa-code text-danger"></i> by teamded</p>
                            </div>
                        </div>
        
        	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		
		<script type="text/javascript">
		
			function createAccount(token){
				var kullaniciadi = $("#kullaniciadi").val();
				var sifre = $("#sifre").val();
				if(!validate){
					showAlert('Lütfen formu onaylayın!', 'danger');
					return false;
				}
				$.ajax({
					url: './inc/function?q=kayit',
					type: 'POST',
					dataType: 'JSON',
					data: { kullaniciadi: kullaniciadi, sifre: sifre, captcha: grecaptcha.getResponse() },
					beforeSend: function(){
						updateButton('<i class="fad fa-spinner-third fa-spin"></i> Kayıt olunuyor', 'true');
					},
					success: function(response){
						if( response.status == true ){
							$.extend({
								redirectPost: function(location, args)
								{
									var form = '';
									$.each( args, function( key, value ) {
										value = value.split('"').join('\"')
										form += '<input type="hidden" name="'+key+'" value="'+value+'">';
									});
									$('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
								}
							});
						} else {
							if( response.alert.type ){
								showAlert(response.alert.message, response.alert.type);
							} else {
								showAlert('Bir hata oluştu, lütfen daha sonra tekrar deneyin!', 'danger');
							}
							updateButton('Kayıt Ol', 'false');
						}
					},
					error: function(response){
						showAlert('Bir sorun oluştu, lütfen daha sonra tekrar deneyin!', 'danger');
						console.log(response);
					}
				});
				grecaptcha.reset();
			}
			
		</script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#kayitbuton").click(function(){
					var kullaniciadi = $("#kullaniciadi").val();
					var sifre = $("#sifre").val();
					var kuralkabul = false;
					
					$('.custom-control-input').each(function(){
						if($(this).is(":checked")){
							kuralkabul = true;
						}
					});
					
					if( kuralkabul == false ){
						showAlert('Kuralları kabul etmelisiniz!', 'danger');
						return false;
					} else if( email == '' || kullaniciadi == '' || sifre == '' ){
						showAlert('Lütfen tüm alanları doldurduğunuzdan emin olun!', 'danger');
						return false;
					} else if( kullaniciadi.length < 4 ){
						showAlert('Kullanıcı adının uzunluğu en az 4 olmalıdır', 'danger');
						return false;
					} else if( kullaniciadi.length > 32 ){
						showAlert('Kullanıcı adının uzunluğu en fazla 32 olabilir', 'danger');
						return false;
					} else if( sifre.length < 6 ){
						showAlert('Şifre en az 6 haneli olmalıdır', 'danger');
						return false;
					} else if( sifre.length > 32 ){
						showAlert('Şifre en fazla 32 haneli olabilir', 'danger');
						return false;
					} else {
						validate = true;
						grecaptcha.execute();
						return true;
					}
				});
			});
			
			function updateButton(html, disabled){
				if( html == '' || disabled == ''){
					return false;
				}
				if( disabled == 'true' ){
					$("#kayitbuton").attr('disabled', true);
				} else if ( disabled == 'false' ) {
					$("#kayitbuton").attr('disabled', false);
				}
				$("#kayitbuton").html(html);
			}
			
			var validate;
			
			
		</script>
		
		
		 <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        
        <script src="assets/js/app.js"></script>



</body>
</html>
