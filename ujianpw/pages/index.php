<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>
    <section class="section is-title-bar">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <ul>
                        <li>Admin</li>
                        <li>Data Mahasiswa</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="hero is-hero-bar">
        <div class="hero-body">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <h1 class="title">
                            Data Mahasiswa
                        </h1>
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <a href="tambah.php" class="button is-small is-primary">Tambah Mahasiswa</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section is-main-section">
        <div class="card">
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Program Studi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'config.php';
                            $query = $config->query("SELECT * FROM mahasiswa");
                            $no = 1;
                            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>' . $no++ . '</td>';
                                echo '<td>' . htmlspecialchars($row['nim']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                                echo '<td>' . ($row['jenis_kelamin'] == 1 ? 'Laki-laki' : 'Perempuan') . '</td>';
                                echo '<td>' . htmlspecialchars($row['alamat']) . '</td>';
                                echo '<td>' . htmlspecialchars($row['program_studi']) . '</td>';
                                echo '<td>';
                                echo '<a class="btn btn-sm btn-primary" href="detail.php?id=' . $row['id'] . '">';
                                echo '<i class="mdi mdi-eye"></i> Detail</a> ';
                                echo '<a class="btn btn-sm btn-info" href="edit.php?id=' . $row['id'] . '">';
                                echo '<i class="mdi mdi-pencil"></i> Edit</a> ';
                                echo '<a class="btn btn-sm btn-danger" href="hapus.php?id=' . $row['id'] . '">';
                                echo '<i class="mdi mdi-trash-can"></i> Hapus</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>