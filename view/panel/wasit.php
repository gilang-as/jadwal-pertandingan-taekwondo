<div>
    <div class="ed_dashboard_inner_tab">
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="<?php echo $domain ?>panel/wasit">Daftar Wasit</a></li>
                <li role="presentation"><a href="<?php echo $domain ?>panel/wasit/tambah">Tambah Wasit</a></li>
            </ul>
            <div class="tab-content">
                <?php if($_GET["tipe"]=="tambah"){ ?>
                    <?php 
                    if(isset($_POST["nama"]) && isset($_POST["ttl"]) && isset($_POST["jekel"]) && isset($_POST["asal"]) && isset($_POST["sabuk"])){
                    $data=array(
                        "nama"  => $_POST["nama"],
                        "ttl"  => $_POST["ttl"],
                        "jekel"  => $_POST["jekel"],
                        "asal"  => $_POST["asal"],
                        "sabuk"  => $_POST["sabuk"]
                    );
                    Insert("tbl_wasit",$data);
                    echo"Berhasil Disimpan";
                    }
                    ?>
                <div class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Wasit</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat Tanggal Lahir</label>
                                        <input name="ttl" type="text" class="form-control" placeholder="Tempat Tanggal Lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="jekel">Jenis Kelamin</label>
                                        <select name="jekel" class="form-control">
                                            <option value="lk">Laki-laki</option>
                                            <option value="pr">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asal">Asal</label>
                                        <input name="asal" type="text" class="form-control" placeholder="Asal">
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
                                        <button class="btn ed_btn ed_green" type="submit">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }elseif($_GET["tipe"]=="ubah" && isset($_GET["id"])){ 
                        $quotes_qry="SELECT * FROM tbl_wasit WHERE id='".$_GET["id"]."'";
                        $detail=mysqli_fetch_array(mysqli_query($connect,$quotes_qry));
                        if(isset($_POST["nama"]) && isset($_POST["ttl"]) && isset($_POST["jekel"]) && isset($_POST["asal"]) && isset($_POST["sabuk"])){
                            $data=array(
                                "nama"  => $_POST["nama"],
                                "ttl"  => $_POST["ttl"],
                                "jekel"  => $_POST["jekel"],
                                "asal"  => $_POST["asal"],
                                "sabuk"  => $_POST["sabuk"]
                            );
                            Update("tbl_wasit",$data,"WHERE id = '".$_GET['id']."'");
                            echo"Berhasil Diubah";
                        }
                ?>
                <div class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Ubah Wasit</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal" method="POST">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo $detail['nama'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Tempat Tanggal Lahir</label>
                                        <input name="ttl" type="text" class="form-control" placeholder="Tempat Tanggal Lahir" value="<?php echo $detail['ttl'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jekel">Jenis Kelamin</label>
                                        <select name="jekel" class="form-control">
                                            <option value="lk" <?php if($detail["jekel"]=="lk"){ echo"selected";} ?>>Laki-laki</option>
                                            <option value="pr" <?php if($detail["jekel"]=="pr"){ echo"selected";} ?>>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="asal">Asal</label>
                                        <input name="asal" type="text" class="form-control" placeholder="Asal" value="<?php echo $detail["asal"];?>">
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
                                        <button class="btn ed_btn ed_green" type="submit">Ubah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }elseif($_GET["tipe"]=="hapus" && isset($_GET["id"])){ 
                    Delete("tbl_wasit", "WHERE id = '".$_GET['id']."'");
                    header("Location:".$domain."panel/wasit");  
                }else{
                ?>
                <div role="tabpanel" class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Wasit</h2>
                        <table id="profile_view_settings">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jekel</th>
                                    <th>Sabuk</th>
                                    <th>Asal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $quotes_qry="SELECT * FROM tbl_wasit";
                                    $data=mysqli_query($connect,$quotes_qry);
                                    $no=1;
                                    while($row=mysqli_fetch_array($data)){ 
                                ?>
                                <tr>
                                    <td><?php echo $no;?></td>
                                    <td><?php echo $row["nama"];?></td>
                                    <td><?php if($row["jekel"]=="lk"){echo "Laki-laki"; }else{ echo"Perempuan"; } ?></td>
                                    <td><a><?php echo $sabuk[$row["sabuk"]]["nama"];?></a></td>
                                    <td><?php echo $row["asal"];?></td>
                                    <td>
                                        <a href='<?php echo$domain."panel/wasit/hapus/".$row["id"];?>'>
                                            <button class="btn btn-danger">Hapus</button>
                                        </a>
                                        <a href='<?php echo$domain."panel/wasit/ubah/".$row["id"];?>'>
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