<div>
    <div class="ed_dashboard_inner_tab">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo $domain ?>panel/atlit">Daftar Atlit</a></li>
                <li role="presentation"><a href="<?php echo $domain ?>panel/atlit/tambah">Tambah Atlit</a></li>
            </ul>
            <div class="tab-content">
                <?php if($_GET["tipe"]=="tambah"){ ?>
                    <?php if(isset($_POST["nama"]) && isset($_POST["jekel"]) && isset($_POST["dojang"]) && isset($_POST["sabuk"]) && isset($_POST["bb"])){
                    $data=array(
                        "nama"  => $_POST["nama"],
                        "jekel"  => $_POST["jekel"],
                        "dojang"  => $_POST["dojang"],
                        "sabuk"  => $_POST["sabuk"],
                        "bb"  => $_POST["bb"]
                    );
                    Insert("tbl_atlit",$data);
                    echo"Berhasil Disimpan";
                    }
                    ?>
                <div class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Atlit</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="jekel">Jekel</label>
                                        <select name="jekel" class="form-control">
                                            <option value="lk">Laki-laki</option>
                                            <option value="pr">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dojang">Dojang</label>
                                        <input name="dojang" type="text" class="form-control" placeholder="Dojang">
                                    </div>
                                    <div class="form-group">
                                        <label for="sabuk">Sabuk</label>
                                        <select name="sabuk" class="form-control">
                                            <?php
                                            foreach($sabuk as $detail => $isi){?>
                                            <option value="<?php echo $detail;?>"><?php echo $isi["nama"];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bb">Berat Badan</label>
                                        <input name="bb" type="text" class="form-control" placeholder="Berat Badan">
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
                        $quotes_qry="SELECT * FROM tbl_atlit WHERE id='".$_GET["id"]."'";
                        $detail=mysqli_fetch_array(mysqli_query($connect,$quotes_qry));
                        if(isset($_POST["nama"]) && isset($_POST["jekel"]) && isset($_POST["dojang"]) && isset($_POST["sabuk"]) && isset($_POST["bb"])){
                            $data=array(
                                "nama"  => $_POST["nama"],
                                "jekel"  => $_POST["jekel"],
                                "dojang"  => $_POST["dojang"],
                                "sabuk"  => $_POST["sabuk"],
                                "bb"  => $_POST["bb"]
                            );
                            Update("tbl_atlit",$data,"WHERE id = '".$_GET['id']."'");
                            echo"Berhasil Diubah";
                        }
                ?>
                <div class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Ubah Atlit</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $detail['nama'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jekel">Jekel</label>
                                        <select name="jekel" class="form-control">
                                            <option value="lk" <?php if($detail["jekel"]=="lk"){ echo"selected";} ?>>Laki-laki</option>
                                            <option value="pr" <?php if($detail["jekel"]=="pr"){ echo"selected";} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dojang">Dojang</label>
                                        <input name="dojang" type="text" class="form-control" placeholder="Dojang" value="<?php echo $detail['dojang'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="sabuk">Sabuk</label>
                                        <select name="sabuk" class="form-control">
                                            <?php
                                            foreach($sabuk as $sdetail => $isi){?>
                                            <option value="<?php echo $sdetail;?>" <?php if($sdetail==$detail["sabuk"]){ echo"selected";} ?>><?php echo $isi["nama"];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="bb">Berat Badan</label>
                                        <input name="bb" type="text" class="form-control" placeholder="Berat Badan" value="<?php echo $detail["bb"];?>">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn ed_btn ed_green" type="submit">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){ 
                    Delete("tbl_atlit", "WHERE id = '".$_GET['id']."'");
                    header("Location:".$domain."panel/atlit");  
                }else{
                ?>
                <div role="tabpanel" class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Atlit</h2>
                        <table id="siswa" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jekel</th>
                                    <th>Sabuk</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $quotes_qry="SELECT * FROM tbl_atlit";
                                    $data=mysqli_query($connect,$quotes_qry);
                                    $no=1;
                                    while($row=mysqli_fetch_array($data)){ 
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row["nama"];?></td>
                                    <td><?php if($row["jekel"]=="lk"){echo "Laki-laki"; }else{ echo"Perempuan"; } ?></td>
                                    <td><a><?php echo $sabuk[$row["sabuk"]]["nama"];?></a></td>
                                    <td>
                                        <a href='<?php echo$domain."panel/atlit/hapus/".$row["id"];?>'>
                                            <button class="btn btn-danger">Hapus</button>
                                        </a>
                                        <a href='<?php echo$domain."panel/atlit/ubah/".$row["id"];?>'>
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $no++; }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>