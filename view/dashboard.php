<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Educo Responsive HTML Template</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="Educo, html template, Education template" />
<meta name="author"  content="Kamleshyadav"/>
<meta name="MobileOptimized" content="320" />
<link href="<?php echo $domain; ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="<?php echo $domain; ?>assets/images/header/favicon.png" />
</head>
<body>
<div id="educo_wrapper">
<?php include("include/header.php");?>
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/360X227);">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>Panel Admin</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
			<?php include("include/sidebar.php")?>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<?php
						if($_GET["halaman"]=="turnamen"){
							include("panel/turnamen.php");
						}elseif($_GET["halaman"]=="wasit"){
							include("panel/wasit.php");
						}elseif($_GET["halaman"]=="atlit"){
							include("panel/atlit.php");
						}elseif($_GET["halaman"]=="laporan"){
							include("panel/laporan.php");
						}elseif($_GET["halaman"]=="profil"){
							include("panel/profil.php");
						}else{
							include("panel/dashboard.php");
						}
					?>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
<?php include("include/footer.php");?>
</div>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/jquery-1.12.2.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/bootstrap.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/modernizr.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/owl.carousel.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/jquery.stellar.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/smooth-scroll.js"></script> 
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/countto/jquery.countTo.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/countto/jquery.appear.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/custom.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script>
$('#atlit').select2({
  selectOnClose: true
});
$('#kategori').select2({
  selectOnClose: true
});
$('#jenjang').select2({
  selectOnClose: true
});
$('#tingkatan').select2({
  selectOnClose: true
});
$('#wasit').select2({
  selectOnClose: true
});
$('#turnamen').select2({
  selectOnClose: true
});
</script>
<script>
$(document).ready(function() {
    $('#siswa').DataTable();
    $('#wasit').DataTable();
} );
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
</body>
</html>