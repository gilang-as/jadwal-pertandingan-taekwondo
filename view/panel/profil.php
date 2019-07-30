<?php
$quotes_qry="SELECT * FROM tbl_pengguna WHERE username='".$_SESSION["username"]."'";
$admin=mysqli_fetch_array(mysqli_query($connect,$quotes_qry)); 
if(isset($_POST["nama"]) && isset($_POST["sandi"])){
	$data=array(
		"username"  => $_POST["nama"],
		"password"  => md5($_POST["sandi"])
	);
	Update("tbl_pengguna",$data,"WHERE username = '".$_SESSION['username']."'");
	$_SESSION['username'] = $_POST["nama"];
}
?>
					<div>
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_dashboard_inner_tab">
										<h2>Ubah</h2>
											<form class="ed_tabpersonal" method="POST">
												<div class="form-group">
													<label for="nama">Username</label>
													<input type="text" name="nama" value="<?php echo $admin["username"]; ?>" class="form-control"  placeholder="Nama" required>
												</div>
												<div class="form-group">
													<label for="sandi">Sandi</label>
													<input type="password" name="sandi" class="form-control"  placeholder="Sandi" required>
												</div>
												<div class="form-group">
												<button class="btn ed_btn ed_green" type="submit">Simpan</button>
												</div>
											</form>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>