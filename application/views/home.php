<?php include 'head.php'; ?>

<body class="sb-nav-fixed">
    <?php include 'nav.php'; ?>
    <div id="layoutSidenav">
        <?php include 'menu.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Dashboard</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
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
                                        <th>Opsi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($mhs as $hasil) : ?>
                                        <tr>
                                            <td><?php echo $hasil->nim ?></td>
                                            <td><?php echo $hasil->nama ?></td>
                                            <td><?php echo $hasil->ipk ?></td>
                                            <td><?php echo $hasil->semester ?></td>
                                            <td><?php echo $hasil->sks ?></td>
                                            <td><?php echo $hasil->piagam ?></td>
                                            <td><?php echo $hasil->sk ?></td>
                                            <td><?php echo $hasil->penghasilan_ortu ?></td>
                                            <td><i class="fas fa-pencil-alt"></i> | <a href="<?php echo base_url() . "welcome/hapusMhs/" . $hasil->nim; ?>"><i class="fas fa-trash"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
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