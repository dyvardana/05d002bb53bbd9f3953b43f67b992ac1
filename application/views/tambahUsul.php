<?php include 'head.php'; ?>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
    <div id="layoutSidenav">
        <?php include 'menu.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Usul</h1>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Usul Beasiswa PPA
                        </div>
                        <div class="card-body col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="<?php echo base_url() ?>welcome/prosesInput">
                                        <div class="form-group">
                                            <label for="nim">NIM</label>
                                            <input type="text" name="nim" class="form-control" id="nim" placeholder="NIM">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input name="nama" type="text" class="form-control" id="nama" placeholder="Edi Wardana">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">IPK</label>
                                            <input name="ipk" type="text" class="form-control" id="ipk" placeholder="3.0">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Semester</label>

                                            <select name="smt" class="form-control">
                                                <?php for ($i = 2; $i <= 12; $i++) { ?>
                                                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">SKS</label>
                                            <input name="sks" type="text" class="form-control" id="sks" placeholder="120">
                                        </div>


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Piagam</label>
                                        <input name="piagam" type="text" class="form-control" id="piagam" placeholder="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Surat Keputusan / Surat Tugas (dari lembaga)</label>
                                        <input name="sk" type="text" class="form-control" id="sk" placeholder="10">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Penghasilan Orang TUa</label>
                                        <input name="penghOrtu" type="text" class="form-control" id="penghOrtu" placeholder="1500000 (tanpa tanda .)">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <button type="submit" class="form-control btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                    </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    </main>
    <?php include 'footer.php' ?>
    </div>
    </div>
    <?php include 'foot.php'; ?>