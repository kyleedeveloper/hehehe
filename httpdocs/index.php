<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$status='1';
$email=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT email,password FROM users WHERE email=:email and password=:password and status=(:status)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':status', $status, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Kullanıcı Adı Veya Şifre Yanlış!');</script>";

}

}

?>
      <?php
        include_once("includes/head.php");
        ?>




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
                                            <p>Hizmetlerimize erişebilmek için ilk önce giriş yapın.</p>
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
                
                
                <div id="alert"></div>
                <?php if (isset($error)) : ?>
  <div class="btn btn-primary-inverse btn-lg btn-block" role="alert">
      <!DOCTYPE html><html><title>p</title><body onload="alert('  <?php Util::display($error); ?>')">


  </div>

<?php endif; ?>
                                <div class="p-2">
                                        <div class="form-group">
                                          <form class="user" method="POST">
                                            <label for="username">Email</label>
                                           <input type="text-s" name="username" class="form-control form-control-user" placeholder="Email Adresinizi giriniz" required="">
                                        </div>
                
                                        <div class="form-group">
                                            <label for="userpassword">Şifre</label>
                                            <input type="password" name="password" class="form-control form-control-user" placeholder="Şifrenizi giriniz" required="">
                                        </div>
                
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline" checked="">
                                            <label class="custom-control-label" for="customControlInline">Beni hatırla</label>
                                        </div>
                                        
                                        <div class="mt-3">
                     
                                            <button name="login" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Giriş Yap</button>
                                        </div>
                    
                    <div class="mt-2">
                    <a href="kayit.php" class="btn btn-outline-primary btn-block text-white waves-effect waves-light">Kayıt Ol</a>
                    </div>

                                        <div class="mt-4 text-center">
                                            <a id="sifremiunuttum" href="https://discord.gg/q73mmEr4D9" target="_blank" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Şifrenizi mi unuttunuz?</a>
                                        </div>
                                </div>
            
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            
                            <div>
                                <p>Hesabınız yok mu ? <a href="kayit.php" class="font-weight-medium text-primary"> Hemen kayıt ol </a> </p>
                          <p>Copyright © 2021 <b>DeDCheck Community</b> all rights reserved.<br> <i class="fas fa-code text-danger"></i> by teamded</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        

<script type="text/javascript" src="https://webkodu.ozgurlukicin.com/kod-kaynak/wk-kar-efekt.js"></script>




</html>





