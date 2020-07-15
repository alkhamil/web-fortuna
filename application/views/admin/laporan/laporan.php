<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Laporan Transaksi</title>
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <h5 class="text-center">LAPORAN TRANSAKSI PEMESANAN <br> PERIODE <?= date('d/m/Y', strtotime($dari)) ?> s/d <?= date('d/m/Y', strtotime($sampai)) ?></h5>
        <h5 class="text-center">HOTEL RAKACIA</h5>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-sm table-bordered">
          <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>No Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tipe Kamar</th>
                <th>Biaya Sewa</th>
            </tr>
          </thead>
          <tbody>

            <?php $total = 0; foreach ($laporan as $key => $l) { ?>
              <?php 
                  $rsv = $this->db->get_where('reservations', ['id'=>$l['reservation_id']])->row_array();
                  $class = $this->db->get_where('classes', ['id'=>$rsv['class_id']])->row_array();
                  $total+=$l['amount'];
              ?>
              <tr>
                  <td><?= $key+1 ?></td>
                  <td><?= date('d-m-Y', strtotime($l['created_at'])) ?></td>
                  <td><?= $l['code'] ?></td>
                  <td><?= $rsv['name'] ?></td>
                  <td><?= $class['name'] ?></td>
                  <td align="right">Rp. <?= number_format($l['amount']) ?></td>
              </tr>
            <?php } ?>
            <tr>
              <td colspan="5" align="center"><b>TOTAL</b></td>
              <td align="right"><b>Rp. <?= number_format($total) ?></b></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>