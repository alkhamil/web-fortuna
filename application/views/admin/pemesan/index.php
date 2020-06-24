<main class="app-content">
    <div class="app-title">
        <div>
            <h1>Data Pemesan</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemesan as $key => $p) { ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $p['title'] ?></td>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $p['birthday'] ?></td>
                                        <td><?= $p['email'] ?></td>
                                        <td><?= $p['phone'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
