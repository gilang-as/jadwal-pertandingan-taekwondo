<header id="ed_header_wrapper">
	<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p>SELAMAT DATANG</p>
					<div class="ed_info_wrapper">
						<?php if(empty($_SESSION)){?>
						<a href="#" id="login_button">MASUK</a>
						<?php }else{ ?>
						<a href="<?php echo $domain."panel";?>">PANEL</a>
						<?php }?>
						<div id="login_one" class="ed_login_form">
								<h3>log in</h3>
								<form class="form" method="POST">
									<div class="form-group">
										<label class="control-label">Username :</label>
										<input type="text" name="username" class="form-control" >
									</div>
									<div class="form-group">
										<label  class="control-label">Sandi :</label>
										<input type="password" name="sandi" class="form-control">
									</div>
									<div class="form-group">
										<button type="submit">login</button>
									</div>
								</form>
								<?php 
								if(isset($_POST["username"]) && isset($_POST["sandi"])){
									$username = $_POST['username'];
									$sandi = md5($_POST['sandi']);
									$profil_qry="SELECT * FROM tbl_pengguna WHERE username='".$username."' AND password='".$sandi."'";
									$profil=mysqli_fetch_assoc(mysqli_query($connect,$profil_qry));
									$cek=mysqli_num_rows(mysqli_query($connect,$profil_qry));
									if($cek > 0){
										$_SESSION['status'] = "masuk";
										header("location:".$domain."panel");
									}else{
									header("location:".$domain);
									}
								}
								?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ed_header_bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_logo"> <a href="index.html"><img src="images/header/Logo.png" alt="logo" /></a> </div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-8">
					<div class="edoco_menu_toggle navbar-toggle" data-toggle="collapse" data-target="#ed_menu">Menu <i class="fa fa-bars"></i>
					</div>
					<div class="edoco_menu">
						<ul class="collapse navbar-collapse" id="ed_menu">
							<li><a href="<?php echo $domain;?>">Beranda</a></li>
							<li><a href="<?php echo $domain;?>turnamen">Turnamen</a></li>
							<li><a href="#alamat">Alamat</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="educo_call"><i class="fa fa-phone"></i><a href="#">1-220-090</a></div>
				</div>
			</div>
		</div>
    </div>
</header>