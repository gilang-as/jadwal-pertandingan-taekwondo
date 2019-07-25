<div>
    <div class="ed_dashboard_inner_tab">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo $domain ?>panel/turnamen">Daftar Turnamen</a></li>
                <li role="presentation"><a href="<?php echo $domain ?>panel/turnamen/tambah">Tambah Turnamen</a></li>
            </ul>
            <div class="tab-content">
				<?php if($_GET["tipe"]=="tambah"){ ?>
				<div role="tabpanel" class="tab-pane active" id="personal">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Turnamen</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal">
									<div class="form-group">
										<input name="nama" type="text" class="form-control"  placeholder="Nama Turnamen">
									</div>
									<div class="form-group">
										<select name="kategori" class="form-control">
											<option value="volvo" selected disabled>Kategori</option>
											<option value="volvo">Volvo</option>
										</select>
									</div>
									<div class="form-group">
										<input name="lokasi" type="text" class="form-control"  placeholder="Lokasi">
									</div>
									<div class="form-group">
										<input name="penyelenggara" type="text" class="form-control"  placeholder="Penyelenggara">
									</div>
									<div class="form-group">
										<input name="tanggal" type="date" class="form-control"  placeholder="Tanggal">
									</div>
									<div class="form-group">
										<input name="maps" type="text" class="form-control"  placeholder="maps">
									</div>
                                    <div class="form-group">
                                        <textarea name="info" class="form-control" cols="50" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn ed_btn ed_green">post update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>        
				<?php }else{ ?>
                <div class="tab-pane active">
                    <div class="ed_inner_dashboard_info">
                        <div class="row">
                            <div class="ed_mostrecomeded_course_slider">
								
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
                                    <div class="ed_item_img">
                                        <img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
                                    </div>
                                    <div class="ed_item_description ed_most_recomended_data">
                                        <h4><a href="course_single.html">Project Learning </a></h4>
                                        <div class="row">
                                            <div class="ed_rating">
                                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-6">
													<div class="ed_views">
                                                        <i class="fa fa-users"></i>
                                                        <span>17 Jan 2017</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-5 col-sm-6 col-xs-6">
                                                    <div class="ed_views">
                                                        <i class="fa fa-users"></i>
                                                        <span>35 peserta</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
								</div>

                            </div>
                        </div>
                    </div>
				</div>
				<?php } ?>
            </div>
        </div>
    </div>
</div>