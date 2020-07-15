<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>ADMIN</h4>
                    <p><b><?= count($this->db->get_where('users', ['level'=>'admin'])->result_array()) ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-file fa-3x"></i>
                <div class="info">
                    <h4>KAMAR</h4>
                    <p><b><?= count($this->db->get('rooms')->result_array()) ?></b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>TRANSAKSI</h4>
                    <p><b><?= count($this->db->get('transactions')->result_array()) ?></b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <h3 class="tile-title">GRAFIK TRANSAKSI</h3>
          <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
              <i class="fa fa-calendar"></i>&nbsp;
              <span></span> <i class="fa fa-caret-down"></i>
          </div>
          <div>
            <canvas id="grafik" width="400" height=200"></canvas>
          </div>
        </div>
    </div>
</main>