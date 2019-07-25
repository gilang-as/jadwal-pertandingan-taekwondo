<header id="ed_header_wrapper">
	<div class="ed_header_top">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<p>welcome guest</p>
					<div class="ed_info_wrapper">
						<a href="#" id="login_button">Login</a>
							<div id="login_one" class="ed_login_form">
								<h3>log in</h3>
								<form class="form">
									<div class="form-group">
										<label class="control-label">Email :</label>
										<input type="text" class="form-control" >
									</div>
									<div class="form-group">
										<label  class="control-label">Password :</label>
										<input type="password" class="form-control">
									</div>
									<div class="form-group">
										<button type="submit">login</button>
										<a href="signup.html">sign up</a>	
									</div>
								</form>
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
							<li><a href="<?php echo $domain;?>tentang">Tentang</a></li>
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