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
                    <?php if(isset($_POST["nama"]) && isset($_POST["lokasi"]) && isset($_POST["penyelenggara"]) && isset($_POST["tanggal"])){
                    $data=array(
                        "nama"  => $_POST["nama"],
                        "lokasi"  => $_POST["lokasi"],
                        "penyelenggara"  => $_POST["nama"],
                        "tanggal"  => $_POST["tanggal"],
                        "informasi"  => $_POST["informasi"],
                    );
                    Insert("tbl_turnamen",$data);
                    $limit="SELECT id FROM tbl_turnamen ORDER BY id DESC LIMIT 1";
                    $id_turnamen=mysqli_fetch_array(mysqli_query($connect,$limit));
                    foreach($_POST["wasit"] as $wasitkey){
                        $datawasit=array(
                            "id_wasit"  => $wasitkey,
                            "id_turnamen"  => $id_turnamen["id"]
                        );
                        Insert("tbl_sertawasit",$datawasit);
                    }
                    echo"Berhasil";
                    }?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                            <h2>Tambah Turnamen</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="ed_tabpersonal" method="POST">
                                        <div class="form-group">
                                        <label for="atlit">Nama Turnamen</label>
                                            <input name="nama" type="text" class="form-control"  placeholder="Nama Turnamen" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Lokasi</label>
                                            <input name="lokasi" type="text" class="form-control"  placeholder="Lokasi" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Penyelenggara</label>
                                            <input name="penyelenggara" type="text" class="form-control"  placeholder="Penyelenggara" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Tanggal</label>
                                            <input name="tanggal" type="date" class="form-control"  placeholder="Tanggal" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Wasit</label>
                                            <select name="wasit[]" class="form-control" id="wasit" multiple="multiple" required>
                                            <?php
                                            $quotes_qry="SELECT id, nama FROM tbl_wasit";
                                            $data=mysqli_query($connect,$quotes_qry);
                                            while($row=mysqli_fetch_array($data)){ 
                                            ?>
                                                <option value="<?php echo $row["id"];?>"><?php echo $row["nama"];?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Informasi</label>
                                            <textarea name="informasi" class="form-control" cols="50" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn ed_btn ed_green" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>    
                <?php
                }elseif($_GET["tipe"]=="lihat" && isset($_GET["id"])){
                    $quotes_qry="SELECT * FROM tbl_turnamen WHERE id='".$_GET["id"]."'";
                    $detailturnamen=mysqli_fetch_array(mysqli_query($connect,$quotes_qry));
                ?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                            <h2>Detail Turnamen</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="ed_course_single_item">
                                    <div class="ed_course_single_image">
                                        <img src="http://placehold.it/806X387" alt="event image" />
                                    </div>
                                    <div class="ed_course_single_info">
                                        <h2><?php echo $detailturnamen["nama"];?><span>SELESAI</span></h2>
                                    </div>
                                    <div class="ed_course_single_tab">
                                        <div role="tabpanel">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Informasi Turnamen</a></li>
                                                <li role="presentation"><a href="#students" aria-controls="students" role="tab" data-toggle="tab">Data Atlit</a></li>
                                                <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">Data Wasit</a></li>
                                                <li role="presentation"><a href="#events" aria-controls="events" role="tab" data-toggle="tab">Peraih Medali</a></li>
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
                                                            <?php 
                                                            $quotes_qry="SELECT tbl_ikutserta.id_atlit, tbl_ikutserta.id_turnamen, tbl_atlit.* FROM tbl_atlit LEFT JOIN tbl_ikutserta ON tbl_ikutserta.id_atlit = tbl_atlit.id WHERE tbl_ikutserta.id_turnamen='".$_GET["id"]."'";
                                                            $detail=mysqli_query($connect,$quotes_qry);
                                                            while($row=mysqli_fetch_array($detail)){ 
                                                            ?>
                                                            <div class="ed_add_students">
                                                                <img src="http://placehold.it/50X50" alt="">
                                                                <span><?php echo $row["nama"];?></span>
                                                                <p><?php echo $sabuk[$row["sabuk"]]["nama"];?></p>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="ed_blog_bottom_pagination ed_toppadder40">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="news">
                                                <div class="ed_inner_dashboard_info">
                                                        <div class="ed_course_single_info">
                                                            <?php 
                                                            $quotes_qry="SELECT tbl_sertawasit.id_wasit, tbl_sertawasit.id_turnamen, tbl_wasit.* FROM tbl_wasit LEFT JOIN tbl_sertawasit ON tbl_sertawasit.id_wasit = tbl_wasit.id WHERE tbl_sertawasit.id_turnamen='".$_GET["id"]."'";
                                                            $detail=mysqli_query($connect,$quotes_qry);
                                                            while($row=mysqli_fetch_array($detail)){ 
                                                            ?>
                                                            <div class="ed_add_students">
                                                                <img src="http://placehold.it/50X50" alt="">
                                                                <span><?php echo $row["nama"];?></span>
                                                                <p><?php echo $sabuk[$row["sabuk"]]["nama"];?></p>
                                                            </div>
                                                            <?php } ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="ed_blog_bottom_pagination ed_toppadder40">
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="events">
                                                    <div class="">
                                                        <h2>PERAIH MENDALI</h2>
                                                        <?php echo $detailturnamen["informasi"];?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <div class="ed_time_executor ed_toppadder40">
                                    <ul>
                                        <li><a>Jenjang</a> <span>Jumlah Atlit</span></li>
                                        <li><a>Pra-Kadet</a> <span>1Hourse 10 Minuts</span></li>
                                        <li><a>Kadet</a> <span>2Hourse 30 Minuts</span></li>
                                        <li><a>Junior</a> <span>3Hourse 15 Minuts</span></li>
                                        <li><a>Senior</a> <span>1Hourse 30 Minuts</span></li>
                                        
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){ ?>
                    <?php if(isset($_POST["nama"]) && isset($_POST["lokasi"]) && isset($_POST["penyelenggara"]) && isset($_POST["tanggal"])){
                    $data=array(
                        "nama"  => $_POST["nama"],
                        "lokasi"  => $_POST["lokasi"],
                        "penyelenggara"  => $_POST["nama"],
                        "tanggal"  => $_POST["tanggal"],
                        "informasi"  => $_POST["informasi"],
                    );
                    //Insert("tbl_turnamen",$data);
                    print_r($_POST);
                    echo"Berhasil";
                    }?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                            <h2>Ubah Turnamen</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="ed_tabpersonal" method="POST">
                                        <div class="form-group">
                                        <label for="atlit">Nama Turnamen</label>
                                            <input name="nama" type="text" class="form-control"  placeholder="Nama Turnamen" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Lokasi</label>
                                            <input name="lokasi" type="text" class="form-control"  placeholder="Lokasi" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Penyelenggara</label>
                                            <input name="penyelenggara" type="text" class="form-control"  placeholder="Penyelenggara" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Tanggal</label>
                                            <input name="tanggal" type="date" class="form-control"  placeholder="Tanggal" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Wasit</label>
                                            <select name="wasit[]" class="form-control" id="wasit" multiple="multiple" required>
                                            <?php
                                            $quotes_qry="SELECT id, nama FROM tbl_wasit";
                                            $data=mysqli_query($connect,$quotes_qry);
                                            while($row=mysqli_fetch_array($data)){ 
                                            ?>
                                                <option value="<?php echo $row["id"];?>"><?php echo $row["nama"];?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Informasi</label>
                                            <textarea name="informasi" class="form-control" cols="50" rows="5" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn ed_btn ed_green" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){ ?>
                <?php }elseif($_GET["tipe"]=="ubah-peserta"  && isset($_GET["id"])){ ?>
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
                <?php }elseif($_GET["tipe"]=="hapus-peserta"  && isset($_GET["id"])){ ?>
                <?php }elseif($_GET["tipe"]=="tambah-peserta"){ ?>
                    <?php if(isset($_POST["turnamen"]) && isset($_POST["atlit"]) && isset($_POST["kategori"]) && isset($_POST["jenjang"]) && isset($_POST["tingkatan"])){
                    $data=array(
                        "id_atlit"  => $_POST["atlit"],
                        "id_turnamen"  => $_POST["turnamen"],
                        "kategori"  => $_POST["kategori"],
                        "jenjang"  => $_POST["jenjang"],
                        "tingkatan"  => $_POST["tingkatan"]
                    );
                    Insert("tbl_ikutserta",$data);
                    echo"Berhasil Disimpan";
                    }?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Peserta</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal" method="POST">
                                <div class="form-group">
                                        <label for="turnamen">Turnamen</label>
										<select name="turnamen" class="form-control" id="turnamen">
                                            <option selected disabled>Turnamen</option>
                                        <?php
                                            $quotes_qry="SELECT id, nama FROM tbl_turnamen";
                                            $data=mysqli_query($connect,$quotes_qry);
                                            while($row=mysqli_fetch_array($data)){ 
                                        ?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["nama"];?></option>
                                        <?php } ?>
										</select>
									</div>
									<div class="form-group">
                                        <label for="atlit">Atlit</label>
										<select name="atlit" class="form-control" id="atlit">
                                            <option selected disabled>Atlit</option>
                                        <?php
                                            $quotes_qry="SELECT id, nama FROM tbl_atlit";
                                            $data=mysqli_query($connect,$quotes_qry);
                                            while($row=mysqli_fetch_array($data)){ 
                                        ?>
											<option value="<?php echo $row["id"];?>"><?php echo $row["nama"];?></option>
                                        <?php } ?>
										</select>
									</div>
									<div class="form-group">
                                        <label for="kategori">Kategori</label>
										<select name="kategori" class="form-control" id="kategori">
											<option selected disabled>Kategori</option>
                                            <?php foreach($kategori as $a => $isi){ ?>
                                            <option value="<?php echo $a;?>"><?php echo $isi["kategori"];?></option>
                                            <?php } ?>
										</select>
									</div>
									<div class="form-group">
                                        <label for="jenjang">Jenjang</label>
										<select name="jenjang" class="form-control" id="jenjang">
											<option selected disabled>Jenjang</option>
											<?php foreach($kategori[0]["data"] as $jenjang => $isi){ ?>
                                            <option value="<?php echo $jenjang;?>"><?php echo $isi["jenjang"];?></option>
                                            <?php } ?>
										</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tingkatan">Tingkatan</label>
										<select name="tingkatan" class="form-control" id="tingkatan">
											<option selected disabled>Tingkatan</option>
											<?php  foreach(($kategori[0]["data"][0]["tingkatan"]) as $tingkatan => $isi){ ?>
                                            <option value="<?php echo $tingkatan;?>"><?php echo $isi["nama"];?></option>
                                            <?php } ?>
										</select>
									</div>
                                    <div class="form-group">
                                        <button type="submit" class="btn ed_btn ed_green">Simpan</button>
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
								<?php
                                    $quotes_qry="SELECT * FROM tbl_turnamen";
                                    $data=mysqli_query($connect,$quotes_qry);
                                    while($row=mysqli_fetch_array($data)){ 
                                ?>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
                                <a href="<?php echo $domain.'panel/turnamen/lihat/'.$row["id"]?>">
                                    <div class="ed_item_img">
                                        <img src="http://placehold.it/248X156" alt="item1" class="img-responsive">
                                    </div>
                                    <div class="ed_item_description ed_most_recomended_data">
                                        <h4><?php echo $row["nama"]?></h4>
                                        <div class="row">
                                            <div class="ed_rating">
                                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-6">
													<div class="ed_views">
                                                        <i class="fa fa-users"></i>
                                                        <span><?php echo $row["tanggal"]?></span>
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
                                    </a>
								</div>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
				</div>
				<?php } ?>
            </div>
        </div>
    </div>
</div>