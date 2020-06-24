<?php  
    $datacheckin = $this->session->userdata('datacheckin');
    if (empty($datacheckin['check-in'])) {
        redirect(base_url('home'),'refresh');
    }
?>
<div class="container">
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-white">Ketersediaan Kamar : <span class="text-warning">(<?= $datacheckin['check-in'].' s/d '.$datacheckin['check-out'].' Jumlah Tamu: '.$datacheckin['total-tamu'] ?>)</span></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php foreach ($tipekamar as $key => $tk) { ?>
                                    <?php  
                                        $jmlKamar = $this->db->get_where('rooms', ['class_id'=>$tk['id'],'status'=>1])->result_array();
                                    ?>
                                    <a <?php if ($key==0) { ?> class="nav-link active" <?php }else { ?> class="nav-link" <?php } ?> id="tab-tipe-<?= $tk['id'] ?>" data-toggle="pill" href="#nav-tipe-<?= $tk['id'] ?>" role="tab" aria-controls="nav-tipe-<?= $tk['id'] ?>" aria-selected="true"><?= $tk['name'] ?> ( Jumlah Kamar: <?= count($jmlKamar) ?> )</a>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            <div class="tab-content" id="v-pills-tabContent">
                                <?php foreach ($tipekamar as $key => $tk) { ?>
                                    <div <?php if ($key==0) { ?> class="tab-pane fade show active" <?php }else { ?> class="tab-pane fade" <?php } ?> id="nav-tipe-<?= $tk['id'] ?>" role="tabpanel" aria-labelledby="tab-tipe-<?= $tk['id'] ?>">
                                        <div class="row">
                                            <?php  
                                                $dataKamar = $this->db->get_where('rooms', ['class_id'=>$tk['id'],'status'=>1])->result_array();
                                            ?>
                                            <?php foreach ($dataKamar as $no => $dk) { ?>
                                                <div class="col-md-4">
                                                    <div class="card">
                                                        <img class="card-img-top" src="<?= base_url('assets/uploads/'.$tk['photo']) ?>" alt="Card image cap">
                                                        <div class="card-body">
                                                            <b class="card-title"><?= $dk['title'] ?></b>
                                                            <p>Harga: <?= number_format($tk['price']) ?></p>
                                                            <a href="<?= base_url('pilihkamar/'.$dk['id']) ?>" class="btn btn-primary">Pilih Kamar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

