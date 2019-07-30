<?php
$quotes_qry="SELECT * FROM tbl_turnamen WHERE id='".$_GET["id"]."'";
$detailturnamen=mysqli_fetch_array(mysqli_query($connect,$quotes_qry)); 
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<title><?php echo $detailturnamen["nama"];?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="Educo, html template, Education template" />
<meta name="author"  content="Kamleshyadav"/>
<meta name="MobileOptimized" content="320" />
<link href="<?php echo $domain; ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="<?php echo $domain; ?>assets/images/header/favicon.png" />
</head>
<body>
<div id="educo_wrapper">
<?php include("include/header.php");?>
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/408X227);">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>TURNAMEN</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo $domain;?>">Beranda</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="<?php echo $domain."turnamen";?>">Turnamen</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><?php echo $detailturnamen["nama"];?></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<div class="ed_graysection ed_course_single ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="ed_course_single_item">
                                    <div class="ed_course_single_image">
                                        <img src="<?php echo $domain."upload/".$detailturnamen["img"]?>" alt="event image" />
                                    </div>
                                    <div class="ed_course_single_info">
                                        <h2><?php echo $detailturnamen["nama"];?><span><?php echo $detailturnamen["tanggal"];?></span></h2>
                                    </div>
                                    <div class="ed_course_single_tab">
                                        <div role="tabpanel">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Informasi Turnamen</a></li>
                                                <li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab">Data Atlit</a></li>
                                                <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">Data Wasit</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="description">
                                                    <div class="ed_course_tabconetent">
                                                        <h2>INFORMASI</h2>
                                                        <?php echo $detailturnamen["informasi"];?>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="students">
                                                    <div class="ed_inner_dashboard_info">
                                                        <div class="ed_course_single_info">
                                                        <table id="siswa" class="display" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Sabuk</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody> 
                                                            <?php 
                                                            $quotes_qry="SELECT tbl_ikutserta.id_atlit, tbl_ikutserta.id_turnamen, tbl_atlit.* FROM tbl_atlit LEFT JOIN tbl_ikutserta ON tbl_ikutserta.id_atlit = tbl_atlit.id WHERE tbl_ikutserta.id_turnamen='".$_GET["id"]."'";
                                                            $no=1;
                                                            $detail=mysqli_query($connect,$quotes_qry);
                                                            while($row=mysqli_fetch_array($detail)){ 
                                                            ?>
                                                            <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $row["nama"];?></td>
                                                                        <td><?php echo $sabuk[$row["sabuk"]]["nama"];?></td>
                                                                    </tr>
                                                            <?php $no++; } ?>
                                                            </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="news">
                                                <div class="ed_inner_dashboard_info">
                                                        <div class="ed_course_single_info">
                                                            <table id="wasit" class="display" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Nama</th>
                                                                        <th>Sabuk</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>   
                                                            <?php 
                                                            $quotes_qry="SELECT tbl_sertawasit.id_wasit, tbl_sertawasit.id_turnamen, tbl_wasit.* FROM tbl_wasit LEFT JOIN tbl_sertawasit ON tbl_sertawasit.id_wasit = tbl_wasit.id WHERE tbl_sertawasit.id_turnamen='".$_GET["id"]."'";
                                                            $detail=mysqli_query($connect,$quotes_qry);
                                                            $no=1;
                                                            while($row=mysqli_fetch_array($detail)){ 
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $no; ?></td>
                                                                        <td><?php echo $row["nama"];?></td>
                                                                        <td><?php echo $sabuk[$row["sabuk"]]["nama"];?></td>
                                                                    </tr>
                                                            <?php $no++; } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
				<div class="ed_time_executor ed_toppadder40">
					<ul>
						<li><a>Jenjang</a> <span>Total</span></li>
						<li><a>Pra-Kadet</a> <span><?php echo total_peserta(0,$_GET["id"])?></span></li>
						<li><a>Kadet</a> <span><?php echo total_peserta(1,$_GET["id"])?></span></li>
						<li><a>Junior</a> <span><?php echo total_peserta(2,$_GET["id"])?></span></li>
						<li><a>Senior</a> <span><?php echo total_peserta(3,$_GET["id"])?></span></li>
						
					</ul>
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
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/revel/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/countto/jquery.countTo.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/plugins/countto/jquery.appear.js"></script>
<script type="text/javascript" src="<?php echo $domain; ?>assets/js/custom.js"></script> 
<script>
$(document).ready(function() {
    $('#siswa').DataTable();
    $('#wasit').DataTable();
} );
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
</body>
</html>