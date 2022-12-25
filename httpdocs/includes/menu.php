  <script  data-cf-settings="c0746b70745e39c225c525b8-|49"></script><body data-sidebar="dark" onload="discordModalStart()">




        <div id="layout-wrapper">
		
		<div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
		
		
		<?php
		$email = $_SESSION['alogin'];
		$sql = "SELECT * from users where email = (:email);";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$result=$query->fetch(PDO::FETCH_OBJ);
		$cnt=1;	
?>
            
        
            
  <header id="page-topbar">
            <div class="navbar-header">
               <div class="d-flex">
                  <!-- LOGO -->
                  <div class="navbar-brand-box">
                     <a href="dashboard.php" class="logo logo-dark">
                     <span class="logo-sm">
                     <img src="../assets/images/ded/ded.png" alt="" height="22">
                     </span>
                     <span class="logo-lg">
                     <img src="../assets/images/ded/ded.png" alt="" height="17">
                     </span>
                     </a>
                     <a href="dashboard.php" class="logo logo-light">
						<span class="logo-sm">
							<img src="../assets/images/ded/ded.png" alt="" height="50">
						</span>
						<span class="logo-lg">
							<img src="../assets/images/ded/ded.png" alt="" height="50">
						</span>
                     </a>
                  </div>
                  <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                  <i class="fa fa-fw fa-bars"></i>
                  </button>
               </div>
               <div class="d-flex">
				  <div class="dropdown d-inline-block">
				<p class="text-muted mt-4 mr-4"><i class="fad fa-circle faa-pulse animated text-success mr-1"></i> <span id="countOnlineUser"></span> Server Active</p>
				   </div>
                  <div class="dropdown d-none d-lg-inline-block ml-1">
                     <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                     <i class="bx bx-fullscreen"></i>
                     </button>
                  </div>
                  <div class="dropdown d-inline-block">
                     <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded-circle header-profile-user" src="../assets/images/ded/ded.png"
                        alt="Header Avatar">
                     <span class="d-none d-xl-inline-block ml-1" key="t-henry"><?php echo htmlentities($result->designation);?></span>
                     <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                     </button>
                     <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        
						<a class="dropdown-item d-block" href="bakiyeyukle.php"><i class="fas fa-wallet font-size-16 align-middle mr-1 text-white"></i> <span key="t-user">Bakiye Yükle</span></a>
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item d-block" href="paketler.php"><i class="fas fa-infinity font-size-16 align-middle mr-1 text-white"></i> <span key="t-user">Hesabını Yükselt</span></a>
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item d-block" href="bildirimler.php"><i class="fas fa-bell font-size-16 align-middle mr-1 text-white"></i> <span key="t-user">Hesap Bildirimleri<sup style="color:red">*</sup></span></a>
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item d-block" href="s.s.s.php"><i class="fas fa-life-ring font-size-16 align-middle mr-1 text-white"></i> <span key="t-user">Yardım Merkezi</span></a>
                        <div class="dropdown-divider"></div>
						<a class="dropdown-item d-block" href="ayarlar.php"><i class="bx bx-cog bx-spin font-size-16 align-middle mr-1"></i> <span key="t-settings">Hesap Ayarları</span></a>
						<div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> <span key="t-logout">Çıkış yap</span></a></div>
                  </div>
               </div>
            </div>
         </header>

<link href="assets/css/fontawesome-pro.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/font-awesome-animation@1.1.1/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css" />

            <div class="vertical-menu">

                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
				
						 

                                <li class="menu-title" key="t-apps">DASHBOARD</li>

                            <li>
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="fad fa-home"></i>
                                    <span>Anasayfa</span>
                                </a>
                            </li>
                            
  

                            
                            <li class="menu-title" key="t-apps">CHECKER</li>

                            <li>
                                <a href="checker.php" class="waves-effect">
                                    <i class="fad fa-bolt"></i>
                                    <span>CC Checker</span>
                                </a>
                            </li>
							
							<li>
                                <a href="proxychecker.php" class="waves-effect">
                                    <i class="fas fa-globe"></i>
                                    <span>Proxy Checker</span>
                                </a>
                            </li>
							
							<li>
                                <a href="accountchecker.php" class="waves-effect">
                                    <i class="fad fa-user-check"></i>
                                    <span>Account Checker</span>
                                </a>
                            </li>
							
							
							
							<li>
                                 <a href="dnschecker.php" class="waves-effect">
                                    <i class="fas fa-globe-americas"></i>
                                    <span>DNS Checker</span>
                                </a>
                            </li>
                         
						 
						  <li>
                                <a href="binchecker.php" class="waves-effect">
                                    <i class="fad fa-search"></i>
                                    <span>BIN Checker</span>
                                </a>
                            </li>
                            
							
							<li class="menu-title" key="t-apps">QUESTIONING</li>
							
							

							<li>
                                <a href="gsmsorgu.php" class="waves-effect">
                                    <i class="fad fa-phone-plus"></i>
                                    <span>Gsm Sorgu </span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="mernis2015.php" class="waves-effect">
                                <i class="fas fa-id-card-alt"></i>
                                    <span>Mernis 2015 </a></span>
                                </a>
                            </li>
							
														
														
							<li>
                                <a href="mernis.php" class="waves-effect">
                                <i class="fad fa-id-card"></i>
                                    <span>Mernis 2021</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="plakasorgu.php" class="waves-effect">
                                <i class="fas fa-car-side"></i>
                                    <span>Plaka Sorgu</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="ipsorgu.php" class="waves-effect">
                                    <i class="fas fa-map-marked"></i>
                                    <span>Ip Sorgu </span>
                                </a>
                            </li>


                            
                            <li class="menu-title" key="t-apps">TOOLS</li>
						

                            <li>
                                <a href="dataduzeltici.php" class="waves-effect">
                                <i class="fad fa-asterisk"></i>
                                    <span>Data Düzeltici</span>
                                </a>
                            </li>

                            <li>
                                <a href="tagtemizleyici.php" class="waves-effect">
                                <i class="fad fa-edit"></i>
                                    <span>Tag Temizleyici</span>
                                </a>
                            </li>
							
							<li>
                                <a href="htmlcleaner.php" class="waves-effect">
                                    <i class="fab fa-html5"></i>
                                    <span>Html Cleaner</span>
                                </a>
                            </li>
							
							<li>
                                <a href="wordlistgenerator.php" class="waves-effect">
                                    <i class="fab fa-keycdn"></i>
                                    <span>Wordlist Generator</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="whatsappsend.php" class="waves-effect">
                                <i class="fab fa-whatsapp"></i>
                                    <span>WP Dm Send <span class="mr-2 badge badge-pill badge-danger"></span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="smssend.php" class="waves-effect">
                                <i class="fas fa-sms"></i>
                                    <span>SMS Send <span class="mr-2 badge badge-pill badge-danger"></span>
                                </a>
                            </li>
                            
                            
							<li class="menu-title">RULES</li>
							
							<li>
                                <a href="kurallar.php" target="_blank" class="waves-effect">
									<i class="fad fa-bookmark"></i>
                                    <span>Kurallar</span>
                                </a>
                            </li>
							
							<li class="menu-title">SOCİAL MEDİA</li>
							
							
							<li>
                                <a href="https://www.youtube.com/channel/UCo9VzZmz6EmSt4xtARh3pLA" target="_blank" class="waves-effect">
                                    <i class="fab fa-youtube"></i>
                                    <span>Youtube Hesabımız</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="https://instagram.com/dedcheck" target="_blank" class="waves-effect">
                                    <i class="fab fa-instagram"></i>
                                    <span>Instagram Hesabımız</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="https://discord.gg/q73mmEr4D9" target="_blank" class="waves-effect">
                                    <i class="fab fa-discord"></i>
                                    <span>Discord Sunucumuz</span>
                                </a>
                            </li>

                            <li class="menu-title" key="t-apps">HESABIM</li>

                            
							<li>
                                <a href="paketler.php" class="waves-effect">
                                    <i class="fas fa-coins"></i>
                                    <span>Üyelik Paketleri</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="bakiyeyukle.php" class="waves-effect">
                                    <i class="fas fa-wallet"></i>
                                    <span>Bakiye Yükle</span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="bildirimler.php" class="waves-effect">
                                    <i class="fas fa-bell"></i>
                                    <span>Hesap Bildirimleri<sup style="color:red">*</sup></span>
                                </a>
                            </li>
							
							
							<li>
                                <a href="mesajlar.php" class="waves-effect">
                                    <i class="fas fa-comment-dots"></i>
                                    <span>Gelen Mesajlar</span>
                                </a>
                            </li>
							
                            
									     <li>
                                <a href="s.s.s.php" class="waves-effect">
                                    <i class="fas fa-life-ring"></i>
                                    <span>Yardım Merkezi</span>
                                </a>
                            </li>
							
                            
                            <li>
                                <a href="ayarlar.php" class="waves-effect">
                                    <i class="fas fa-sliders-h"></i>
                                    <span>Hesap Ayarları</span>
                                </a>
                            </li>
                            
							
							
                            
                            <li>
                                <a href="logout.php" class="waves-effect">
                                    <i class="fad fa-sign-out-alt"></i>
                                    <span>Çıkış Yap</span>
                                </a>
                            </li>
                            

                        </ul>
                        
                        
      
                    </div>
                </div>
            </div>
			
			
			
			
			