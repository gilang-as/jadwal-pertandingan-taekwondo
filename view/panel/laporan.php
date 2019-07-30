<div>
    <div class="ed_dashboard_inner_tab">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#started" aria-controls="started" role="tab" data-toggle="tab">Turnamen</a></li>
                <li role="presentation"><a href="#favourite" aria-controls="favourite" role="tab" data-toggle="tab">Atlit</a></li>
                <li role="presentation"><a href="#subscribed" aria-controls="subscribed" role="tab" data-toggle="tab">Wasit</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="started">
                    <div class="ed_dashboard_inner_tab">
                        <h2>CETAK DAFTAR TURNAMEN</h2>
                        <span><a href="<?php echo $domain?>cetak-turnamen.php" class="btn btn-success">CETAK</a></span>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="favourite">
                    <div class="ed_dashboard_inner_tab">
                        <h2>CETAK DAFTAR ATLIT</h2>
                        <span><a href="<?php echo $domain?>cetak-atlit.php" class="btn btn-success">CETAK</a></span>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="subscribed">
                    <div class="ed_dashboard_inner_tab">
                        <h2>CETAK DAFTAR WASIT</h2>
                        <span><a href="<?php echo $domain?>cetak-wasit.php" class="btn btn-success">CETAK</a></span>
                    </div>
                </div>
            </div>

        </div>
        <!--tab End-->
    </div>
</div>