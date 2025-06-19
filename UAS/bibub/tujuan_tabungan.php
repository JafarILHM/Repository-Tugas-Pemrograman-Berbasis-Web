<?php
session_start();
include 'koneksi.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_tujuan'])) {
    $nama_tujuan = $_POST['nama_tujuan'];
    $target_amount = $_POST['target_amount'];
    $kategori_terkait = $_POST['kategori_terkait'];
    $target_date = !empty($_POST['target_date']) ? $_POST['target_date'] : NULL;

    $stmt = $conn->prepare("INSERT INTO goals (user_id, nama_tujuan, target_amount, kategori_terkait, target_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $user_id, $nama_tujuan, $target_amount, $kategori_terkait, $target_date);
    if ($stmt->execute()) {
        $pesan = "<div class='alert alert-success'>Tujuan baru berhasil ditambahkan!</div>";
    } else {
        $pesan = "<div class='alert alert-danger'>Gagal menambahkan tujuan.</div>";
    }
    $stmt->close();
}

if (isset($_GET['hapus_id'])) {
    $hapus_id = $_GET['hapus_id'];
    $stmt = $conn->prepare("DELETE FROM goals WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $hapus_id, $user_id);
    if ($stmt->execute()) {
        $_SESSION['notif'] = ['pesan' => 'Tujuan berhasil dihapus.', 'tipe' => 'success'];
    } else {
        $_SESSION['notif'] = ['pesan' => 'Gagal menghapus tujuan.', 'tipe' => 'danger'];
    }
    $stmt->close();
    header("Location: tujuan_tabungan.php");
    exit();
}

$goals = [];
$stmt_goals = $conn->prepare("SELECT * FROM goals WHERE user_id = ? ORDER BY created_at DESC");
$stmt_goals->bind_param("i", $user_id);
$stmt_goals->execute();
$result_goals = $stmt_goals->get_result();

if ($result_goals) {
    while ($row = $result_goals->fetch_assoc()) {
        $kategori = $row['kategori_terkait'];
        $stmt_sum = $conn->prepare("SELECT SUM(amount) as terkumpul FROM transactions WHERE user_id = ? AND kategori = ? AND type = 'Pemasukan'");
        $stmt_sum->bind_param("is", $user_id, $kategori);
        $stmt_sum->execute();
        $result_sum = $stmt_sum->get_result()->fetch_assoc();
        $row['terkumpul'] = $result_sum['terkumpul'] ? $result_sum['terkumpul'] : 0;
        $goals[] = $row;
        $stmt_sum->close();
    }
}
$stmt_goals->close();

$kategori_list = [];
$stmt_kategori = $conn->prepare("SELECT DISTINCT kategori FROM transactions WHERE user_id = ?");
$stmt_kategori->bind_param("i", $user_id);
$stmt_kategori->execute();
$result_kategori = $stmt_kategori->get_result();

if($result_kategori){
    while($row = $result_kategori->fetch_assoc()){
        $kategori_list[] = $row['kategori'];
    }
}
$stmt_kategori->close();

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tujuan Tabungan - Money Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'sidebar.php'; ?>

<div class="main-content">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3><i class="mdi mdi-bullseye-arrow"></i> Tujuan Tabungan</h3>
        </div>
        
        <?php
        if (isset($_SESSION['notif'])) {
            $notif = $_SESSION['notif'];
            echo "<div class='alert alert-{$notif['tipe']} alert-dismissible fade show' role='alert'>
                    {$notif['pesan']}
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            unset($_SESSION['notif']);
        }
        echo $pesan;
        ?>

        <div class="card mb-4">
            <div class="card-header">
                Tambah Tujuan Baru
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_tujuan" class="form-label">Nama Tujuan</label>
                            <input type="text" class="form-control" id="nama_tujuan" name="nama_tujuan" placeholder="Contoh: Beli Laptop Baru" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="target_amount" class="form-label">Target Nominal (Rp)</label>
                            <input type="number" class="form-control" id="target_amount" name="target_amount" placeholder="Contoh: 15000000" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="kategori_terkait" class="form-label">Tautkan ke Kategori Pemasukan</label>
                            <input class="form-control" list="kategoriOptions" id="kategori_terkait" name="kategori_terkait" placeholder="Ketik untuk mencari atau buat baru..." required>
                            <datalist id="kategoriOptions">
                                <?php foreach($kategori_list as $k): ?>
                                    <option value="<?php echo htmlspecialchars($k); ?>">
                                <?php endforeach; ?>
                            </datalist>
                            <div class="form-text">Setiap Pemasukan dengan kategori ini akan dihitung sebagai progres.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="target_date" class="form-label">Tanggal Target (Opsional)</label>
                            <input type="date" class="form-control" id="target_date" name="target_date">
                        </div>
                    </div>
                    <button type="submit" name="tambah_tujuan" class="btn btn-primary">Simpan Tujuan</button>
                </form>
            </div>
        </div>

        <h4>Daftar Tujuan Anda</h4>
        <div class="row">
            <?php if (empty($goals)): ?>
                <div class="col-12">
                    <p class="text-center">Anda belum memiliki tujuan. Ayo buat satu!</p>
                </div>
            <?php else: ?>
                <?php foreach ($goals as $goal): ?>
                    <?php
                        $progress_percent = ($goal['target_amount'] > 0) ? ($goal['terkumpul'] / $goal['target_amount']) * 100 : 0;
                        if ($progress_percent > 100) $progress_percent = 100;
                    ?>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title"><?php echo htmlspecialchars($goal['nama_tujuan']); ?></h5>
                                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#hapusModal" data-id="<?php echo $goal['id']; ?>"></button>
                                </div>
                                <h6 class="card-subtitle mb-2 text-muted">Target: Rp <?php echo number_format($goal['target_amount'], 0, ',', '.'); ?></h6>
                                <p class="card-text">
                                    Terkumpul: <strong>Rp <?php echo number_format($goal['terkumpul'], 0, ',', '.'); ?></strong>
                                    <br>
                                    <small>Tertaut ke kategori: "<?php echo htmlspecialchars($goal['kategori_terkait']); ?>"</small>
                                </p>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $progress_percent; ?>%;" aria-valuenow="<?php echo $progress_percent; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo round($progress_percent); ?>%</div>
                                </div>
                                <?php if ($goal['target_date']): ?>
                                    <p class="card-text mt-2"><small class="text-muted">Target Tanggal: <?php echo date('d F Y', strtotime($goal['target_date'])); ?></small></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        Apakah Anda yakin ingin menghapus tujuan tabungan ini? Tindakan ini tidak dapat dibatalkan.
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="#" id="linkHapus" class="btn btn-danger">Ya, Hapus</a>
    </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var hapusModal = document.getElementById('hapusModal');
    if(hapusModal) {
        hapusModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var goalId = button.getAttribute('data-id');
            
            var linkHapus = hapusModal.querySelector('#linkHapus');
            linkHapus.href = 'tujuan_tabungan.php?hapus_id=' + goalId;
        });
    }
});
</script>
</body>
</html>