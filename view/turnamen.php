<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<title>Educo Responsive HTML Template</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta name="description"  content="Educo"/>
<meta name="keywords" content="Educo, html template, Education template" />
<meta name="author"  content="Kamleshyadav"/>
<meta name="MobileOptimized" content="320" />
<link href="<?php echo $domain; ?>assets/css/main.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/png" href="<?php echo $domain; ?>assets/images/header/favicon.png" />
</head>
<body>
<div id="educo_wrapper">
<?php include("include/header.php");?>
<div class="ed_pagetitle" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="0" style="background-image: url(http://placehold.it/921X533);">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>Educo Courses</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.html">home</a></li>
					<li><i class="fa fa-chevron-left"></i></li>
					<li><a href="course.html">Educo Courses</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!-- Section eleven start -->
<div class="ed_courses ed_toppadder80 ed_bottompadder80">
	<div class="container">
		<div class="row">
		<?php
            $quotes_qry="SELECT * FROM tbl_turnamen ORDER BY id DESC LIMIT 6";
            $data=mysqli_query($connect,$quotes_qry);
            while($row=mysqli_fetch_array($data)){ 
        ?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
				<div class="ed_mostrecomeded_course">
					<div class="ed_item_img">
						<img src="<?php echo $domain."upload/".$row["img"]?>" alt="item1" class="img-responsive">
					</div>
					<div class="ed_item_description ed_most_recomended_data">
							<h4><a href="<?php echo $domain."turnamen/".$row["id"];?>"><?php echo $row["nama"];?></a></h4>
					</div>
				</div>
			</div>
		<?php } ?>
			<div class="col-lg-12">
				<div class="ed_blog_bottom_pagination">
				<nav>
					<ul class="pagination">
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="active"><a href="#">Next <span class="sr-only">(current)</span></a></li>
					</ul>
				</nav>
				</div>
			</div>
		</div>
    </div><!-- /.container -->
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
</body>
</html>