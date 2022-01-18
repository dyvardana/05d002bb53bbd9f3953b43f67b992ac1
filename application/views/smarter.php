<?php include 'head.php'; ?>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
    <div id="layoutSidenav">
        <?php include 'menu.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">SPK</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Smarter-FUzzy</li>
                    </ol>
                    <a href="<?php echo base_url() ?>welcome/tambahUsul" class="btn btn-primary btn-sm"> <i class="fas fa-plus-square"></i> Tambah Usul</a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Usul Beasiswa PPA
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>SKS</th>
                                        <th>Piagam</th>
                                        <th>SK</th>
                                        <th>Pengh. Ortu</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 0; $i < $jml; $i++) { ?>
                                        <tr>
                                            <td><?php echo $nim[$i] ?></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td><?php echo $ipk[$i] ?></td>
                                            <td><?php echo $semester[$i] ?></td>
                                            <td><?php echo $sks[$i] ?></td>
                                            <td><?php echo $piagam[$i] ?></td>
                                            <td><?php echo $sk[$i] ?></td>
                                            <td><?php echo $penghasilan[$i] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple2">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>IPK</th>
                                        <th>Semester</th>
                                        <th>SKS</th>
                                        <th>Piagam</th>
                                        <th>SK</th>
                                        <th>Pengh. Ortu</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php for ($i = 0; $i < $jml; $i++) { ?>
                                        <tr>
                                            <td><?php echo $nim[$i] ?></td>
                                            <td><?php echo $nama[$i] ?></td>
                                            <td><?php echo $ipk[$i] ?></td>
                                            <td><?php echo $semester[$i] ?></td>
                                            <td><?php echo $sks[$i] ?></td>
                                            <td><?php echo $piagam[$i] ?></td>
                                            <td><?php echo $sk[$i] ?></td>
                                            <td><?php echo $penghasilan[$i] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </main>
            <?php include 'footer.php' ?>
        </div>
    </div>
    <?php include 'foot.php'; ?>