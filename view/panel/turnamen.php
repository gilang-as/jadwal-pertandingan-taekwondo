<div>
    <div class="ed_dashboard_inner_tab">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo $domain ?>panel/turnamen">Daftar Turnamen</a></li>
                <li role="presentation"><a href="<?php echo $domain ?>panel/turnamen/tambah">Tambah Turnamen</a></li>
                <li role="presentation"><a href="<?php echo $domain ?>panel/turnamen/tambah-peserta">Tambah Peserta</a></li>
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
                                    <label for="atlit">Nama Turnamen</label>
										<input name="nama" type="text" class="form-control"  placeholder="Nama Turnamen">
									</div>
									<div class="form-group">
                                    <label for="atlit">Lokasi</label>
										<input name="lokasi" type="text" class="form-control"  placeholder="Lokasi">
									</div>
									<div class="form-group">
                                    <label for="atlit">Penyelenggara</label>
										<input name="penyelenggara" type="text" class="form-control"  placeholder="Penyelenggara">
									</div>
									<div class="form-group">
                                    <label for="atlit">Tanggal</label>
										<input name="tanggal" type="date" class="form-control"  placeholder="Tanggal">
									</div>
									<div class="form-group">
                                    <label for="atlit">Wasit</label>
										<select name="states[]" class="form-control" id="wasit" multiple="multiple">
											<option value="volvo">A</option>
											<option value="volvo">B</option>
										</select>
									</div>
                                    <div class="form-group">
                                    <label for="atlit">Informasi</label>
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
                <?php }elseif($_GET["tipe"]=="tambah-peserta"){ ?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Peserta</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal">
                                <div class="form-group">
                                        <label for="atlit">Turnamen</label>
										<select name="kategori" class="form-control" id="turnamen">
                                            <option value="volvo" selected disabled>Atlit</option>
											<option value="volvo">Volvo</option>
										</select>
									</div>
									<div class="form-group">
                                        <label for="atlit">Atlit</label>
										<select name="kategori" class="form-control" id="atlit">
                                            <option value="volvo" selected disabled>Atlit</option>
											<option value="volvo">Volvo</option>
										</select>
									</div>
									<div class="form-group">
                                        <label for="kategori">Kategori</label>
										<select name="kategori" class="form-control" id="kategori">
                                            <option value="volvo" selected disabled>Kategori</option>
                                            <?php foreach($data as $kategori => $isi){ ?>
                                            <option value="<?php echo $kategori;?>"><?php echo $isi["kategori"];?></option>
                                            <?php } ?>
										</select>
									</div>
									<div class="form-group">
                                        <label for="jenjang">Jenjang</label>
										<select name="kategori" class="form-control" id="jenjang">
											<option value="volvo" selected disabled>Jenjang</option>
											<?php foreach($data[0]["data"] as $jenjang => $isi){ ?>
                                            <option value="<?php echo $jenjang;?>"><?php echo $isi["jenjang"];?></option>
                                            <?php } ?>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tingkatan">Tingkatan</label>
										<select name="kategori" class="form-control" id="tingkatan">
											<option value="volvo" selected disabled>Tingkatan</option>
											<?php  foreach(($data[0]["data"][0]["tingkatan"]) as $tingkatan => $isi){ ?>
                                            <option value="<?php echo $tingkatan;?>"><?php echo $isi;?></option>
                                            <?php } ?>
										</select>
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