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
                <div class="tab-pane active">
                    <div class="ed_dashboard_inner_tab">
                        <h2>Tambah Turnamen</h2>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form class="ed_tabpersonal">
                                    <div class="form-group">
                                        <label for="atlit">Nama Turnamen</label>
                                        <input name="nama" type="text" class="form-control" placeholder="Nama Turnamen">
                                    </div>
                                    <div class="form-group">
                                        <label for="atlit">Lokasi</label>
                                        <input name="lokasi" type="text" class="form-control" placeholder="Lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="atlit">Penyelenggara</label>
                                        <input name="penyelenggara" type="text" class="form-control" placeholder="Penyelenggara">
                                    </div>
                                    <div class="form-group">
                                        <label for="atlit">Tanggal</label>
                                        <input name="tanggal" type="date" class="form-control" placeholder="Tanggal">
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
                <?php }else{ ?>
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
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">andrehouse@123</a></td>
                                    <td><a href="#">andrehouse@123</a></td>
                                    <td><a href="#">andrehouse@123</a></td>
                                    <td>
                                        <a href="#">
                                            <button class="btn btn-danger">Hapus</button>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>