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

require_once('lib/CURLRequest.php');

$errors = array();

try {
  $req = new CURLRequest('http://www.dns-lg.com/nodes.json');
  $nodes_raw = $req->get();
  $nodes = json_decode($nodes_raw);
  $nodes = $nodes->nodes;
  $nodes_json = json_encode($nodes);
} catch(CURLRequestException $e) {
  $errors[] = '<strong>Oh noes!</strong> ' . $e->getCode() . ': ' . $e->__toString();
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        
         <?php
        include_once("includes/head.php");
        ?>
		
		
  <style>
    iframe {
      border: none;
      width: 100%;
      height: 84px;
    }
    iframe#autocomplete-host {
      display: none;
    }
    .no-transition {
      -webkit-transition: none;
      -o-transition: none;
      transition: none;
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
DeDCheck DNS Checker
</h4>
<br>
<h2 class="h6 font-w500 text-muted mb-0">
DNS Checker, işlemi birçok aşama için önemlidir. Bizleri <b>Subdomain'ler, Ns Adresleri, İp adresleri</b> gibi bir çok bilgiye ulaştırabilir.
</h2>
</div>
</div>
</div>

  <?php
      if( ! empty($errors)) {
        foreach($errors as $k=>$error) {
          echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
      }
      ?>


                        <div class="row">
                            <div class="col-xl-12 col-md-6">
                                <div class="col-lg-12">
								
								<div class="bg-body-light">

				
				                              <div class="card">
                                        <div class="card-body">
                                            





<div class="panel panel-default">
      
        <div class="panel-body">
          <iframe name="autocomplete_host" id="autocomplete-host" src=""></iframe>
          <form autocomplete="on" target="autocomplete_host">

            <div class="form-group">
              <label for="domain">Domain</label>
              <div class="input-group">
                <span class="input-group-addon">http://</span>
                <input type="text" class="form-control" id="domain" name="domain" required>
              </div>
            </div><!-- /form-group -->

            <div class="form-group">
              <label for="record-type">Kayıt tipi</label><br>
              <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-sm btn-default active">
                  <input type="radio" name="recordType" value="a" checked>A
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="cname">CNAME
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="mx">MX
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="ns">NS
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="spf">SPF
                </label>
                <label class="btn btn-sm btn-default">
                  <input type="radio" name="recordType" value="txt">TXT
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="domain">Beklenen değer</label> <small>İsteğe Bağlı</small>
              <input type="text" class="form-control" id="expected" name="expected">
            </div><!-- /form-group -->
			
			<br>

				                                <center>
							    				<button type="submit" id="go" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;" data-loading-text="Sorgulanıyor..."><i class="fas fa-search"></i> Sorgula</button></form>
							    				<button id="durdurButon" type="button" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i><a href="dnschecker.php" class="text-white"> Sıfırla </a></button>
                                                <button id="temizleButon" type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-print"></i> Yazdır Detay</button><br><br>
							    				</center>
<br>

 


        <div class="progress">
          <div class="progress-bar progress-bar-success" style="width: 0%">
            0%
          </div>
          <div class="progress-bar progress-bar-danger" style="width: 0%">
            0%
          </div>
          <div class="progress-bar progress-bar-warning" style="width: 0%">
            0%
          </div>
        </div>
		
		
		
            <div class="table-responsive">
<table class="table table-hover">
<thead>
<tr>
          <th scope="col">Server</th>
          <th scope="col">Result</th>
          <th scope="col">TTL</th>
        </thead>
                            <tr>
                  
<tbody>
        <?php
        if( ! empty($nodes)) {
          foreach($nodes as $node) {
            echo '<tr id="' . $node->name . '">';
            echo '<td width="175" class="country"><span data-toggle="tooltip" title="' . $node->operator . '">' . $node->country . ' ' . $node->name{3} . '</span></td>';
            echo '<td class="result"></td>';
            echo '<td width="50" class="ttl"></td>';
            echo '</tr>';
          }
        }
        ?>
      </table>

    </div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <?php
  if( ! empty($nodes)) {
  ?>
  <script src="js/app.js"></script>
  <script>
    DNSPC.app.query.setNodes(<?php echo $nodes_json; ?>);
    DNSPC.app.init();
  </script>
  <?php
  }
  ?>
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
				
           

          		<script src="https://code.jquery.com/jquery-3.5.1.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/simplebar/simplebar.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/libs/node-waves/waves.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
          <script src="assets/libs/apexcharts/apexcharts.min.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/pages/dashboard.init.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
        <script src="assets/js/app.js" type="c0746b70745e39c225c525b8-text/javascript"></script>
				<script src="assets/libs/toastr/build/toastr.min.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>

        <!-- toastr init -->
        <script src="assets/js/pages/toastr.init.js" type="cf56b57abb6a0e391d15fdc1-text/javascript"></script>
    <script src="https://ajax.cloudflare.com/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="c0746b70745e39c225c525b8-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js" data-cf-beacon='{"rayId":"660d5bcaaa6be186","token":"e6744a75b48847d79ca94b903ae51a33","version":"2021.5.2","si":10}'></script>
      
</body>

</html>
<?php } ?>