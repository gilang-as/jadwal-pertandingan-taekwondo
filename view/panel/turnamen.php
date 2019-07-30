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
                    $ekstensi_diperbolehkan	= array('png','jpg');
                    $nama = $_FILES['file']['name'];
                    $x = explode('.', $nama);
                    $ekstensi = strtolower(end($x));
                    $ukuran	= $_FILES['file']['size'];
                    $file_tmp = $_FILES['file']['tmp_name'];
                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1044070){			
                            move_uploaded_file($file_tmp, 'upload/'.$nama);

                            $data=array(
                                "nama"  => $_POST["nama"],
                                "lokasi"  => $_POST["lokasi"],
                                "penyelenggara"  => $_POST["nama"],
                                "tanggal"  => $_POST["tanggal"],
                                "informasi"  => $_POST["informasi"],
                                "img"  => $nama
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
                            echo"Berhasil Disimpan";
                        }else{
                            echo 'UKURAN FILE TERLALU BESAR';
                        }
                    }else{
                        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                    }
                    }?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                            <h2>Tambah Turnamen</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="ed_tabpersonal" method="POST" enctype="multipart/form-data">
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
                                            <select name="wasit[]" class="form-control" id="atlit" multiple="multiple" required>
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
                                        <label for="atlit">Poster</label>
                                            <input name="file" type="file" class="form-control" required>
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
                }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){
                    $quotes_qry="SELECT * FROM tbl_turnamen WHERE id='".$_GET["id"]."'";
                    $detailturnamen=mysqli_fetch_array(mysqli_query($connect,$quotes_qry));    
                ?>
                    <?php if(isset($_POST["nama"]) && isset($_POST["lokasi"]) && isset($_POST["penyelenggara"]) && isset($_POST["tanggal"])){
                     $ekstensi_diperbolehkan	= array('png','jpg');
                     $nama = $_FILES['file']['name'];
                     $x = explode('.', $nama);
                     $ekstensi = strtolower(end($x));
                     $ukuran	= $_FILES['file']['size'];
                     $file_tmp = $_FILES['file']['tmp_name'];
                     if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                         if($ukuran < 1044070){			
                             move_uploaded_file($file_tmp, 'upload/'.$nama);
 
                             $data=array(
                                 "nama"  => $_POST["nama"],
                                 "lokasi"  => $_POST["lokasi"],
                                 "penyelenggara"  => $_POST["nama"],
                                 "tanggal"  => $_POST["tanggal"],
                                 "informasi"  => $_POST["informasi"],
                                 "img"  => $nama
                             );
                             Update("tbl_turnamen",$data,"WHERE id = '".$_GET['id']."'");
                             Delete("tbl_sertawasit","WHERE id_turnamen = '".$_GET['id']."'");
                             $limit="SELECT id FROM tbl_turnamen ORDER BY id DESC LIMIT 1";
                             $id_turnamen=mysqli_fetch_array(mysqli_query($connect,$limit));
                             foreach($_POST["wasit"] as $wasitkey){
                                 $datawasit=array(
                                     "id_wasit"  => $wasitkey,
                                     "id_turnamen"  => $id_turnamen["id"]
                                 );
                                 Insert("tbl_sertawasit",$datawasit);
                             }
                             echo"Berhasil Disimpan";
                         }else{
                             echo 'UKURAN FILE TERLALU BESAR';
                         }
                     }else{
                         echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                     }
                    }?>
                    <div role="tabpanel" class="tab-pane active" id="personal">
                        <div class="ed_dashboard_inner_tab">
                            <h2>Ubah Turnamen</h2>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <form class="ed_tabpersonal" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <label for="atlit">Nama Turnamen</label>
                                            <input name="nama" type="text" value="<?php echo $detailturnamen["nama"];?>" class="form-control"  placeholder="Nama Turnamen" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Lokasi</label>
                                            <input name="lokasi" type="text" value="<?php echo $detailturnamen["lokasi"];?>" class="form-control"  placeholder="Lokasi" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Penyelenggara</label>
                                            <input name="penyelenggara" type="text"  value="<?php echo $detailturnamen["penyelenggara"];?>" class="form-control"  placeholder="Penyelenggara" required>
                                        </div>
                                        <div class="form-group">
                                        <label for="atlit">Tanggal</label>
                                            <input name="tanggal" type="date"  value="<?php echo $detailturnamen["tanggal"];?>" class="form-control"  placeholder="Tanggal" required>
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
                                            <textarea name="informasi" class="form-control" cols="50" rows="5" required><?php echo $detailturnamen["informasi"];?></textarea>
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
                }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){ 
                    Delete("tbl_ikutserta", "WHERE id_turnamen = '".$_GET['id']."'");
                    Delete("tbl_sertawasit", "WHERE id_turnamen = '".$_GET['id']."'");
                    Delete("tbl_turnamen", "WHERE id = '".$_GET['id']."'");
                    header("Location:".$domain."panel/atlit"); 
                 }elseif($_GET["tipe"]=="ubah-peserta"  && isset($_GET["id"])){ 
                ?>
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
                            <table id="siswa" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
								<?php
                                    $quotes_qry="SELECT * FROM tbl_turnamen";
                                    $data=mysqli_query($connect,$quotes_qry);
                                    $no=1;
                                    while($row=mysqli_fetch_array($data)){ 
                                ?>
                                
            <tr>
                <td><?=$no?></td>
                <td><?=$row['nama']?></td>
                <td><?=$row['tanggal']?></td>
                <td>
                <a href="<?php echo $domain."turnamen/".$row['id'];?>" class="btn btn-success">Lihat</a>
                <a href="<?php echo $domain."panel/turnamen/ubah/".$row['id'];?>" class="btn btn-info">Ubah</a>
                <a href="<?php echo $domain."panel/turnamen/hapus/".$row['id'];?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
                                <?php $no++; } ?>
                                
            </tbody>
            </table>
                            </div>
                        </div>
                    </div>
				</div>
				<?php } ?>
            </div>
        </div>
    </div>
</div>