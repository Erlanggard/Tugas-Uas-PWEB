<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
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
                        <li><a href="index.php">Data Mahasiswa</a></li>
                        <li>Edit Mahasiswa</li>
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
                            Edit Mahasiswa
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section is-main-section">
        <div class="card">
            <div class="card-content">
                <?php
                require 'config.php';

                // Ambil data mahasiswa berdasarkan ID
                $id = $_GET['id'];
                $stmt = $config->prepare("SELECT * FROM mahasiswa WHERE id = ?");
                $stmt->execute([$id]);
                $mahasiswa = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$mahasiswa) {
                    exit('Mahasiswa tidak ditemukan.');
                }
                ?>
                <form action="proses_edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $mahasiswa['id']; ?>">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($mahasiswa['nama']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="1" <?php echo ($mahasiswa['jenis_kelamin'] == 1) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="laki-laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="0" <?php echo ($mahasiswa['jenis_kelamin'] == 0) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat"><?php echo htmlspecialchars($mahasiswa['alamat']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="program_studi">Program Studi</label>
                        <input type="text" class="form-control" id="program_studi" name="program_studi" value="<?php echo htmlspecialchars($mahasiswa['program_studi']); ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>