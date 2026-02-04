<?php
// ARRAY MULTIDIMENSI
$daftarPlaystation = [
    ["PlayStation 3", 10000],
    ["PlayStation 4", 20000],
    ["PlayStation 5", 25000]
];

// AMBIL PILIHAN PS
$pilihanPlaystation = $_POST['pilps'] ?? 0;
if (!isset($daftarPlaystation[$pilihanPlaystation])) {
    $pilihanPlaystation = 0;
}

$hargaPerJam = $daftarPlaystation[$pilihanPlaystation][1];

// INPUT FORM
$nama        = $_POST['nama'] ?? '';
$jk          = $_POST['jk'] ?? '';
$noIdentitas = $_POST['no_identitas'] ?? '';
$tanggal     = $_POST['tanggal'] ?? '';
$durasiJam   = ($_POST['durasi'] ?? '');
$uangBayar   = ($_POST['bayar'] ?? '');
$snack       = isset($_POST['snack']) ? 20000 : 0;
$voucher     = trim($_POST['voucher'] ?? '');

$totalBayar = $_POST['total'] ?? '';
$kembalian  = '';

// PROSES HITUNG TOTAL
if (isset($_POST['hitung'])) {
    if ($durasiJam > 0) {
        $totalBayar = $hargaPerJam * $durasiJam;

        // DISKON 10% JIKA LEBIH DARI 5 JAM
        if ($durasiJam > 5) {
            $totalBayar -= $totalBayar * 0.10;
        }

        // TAMBAHAN SNACK
        $totalBayar += $snack;

        // DISKON VOUCHER
        if ($voucher == 'ramadan26') {
            $totalBayar -= $totalBayar * 0.26;
        }
        elseif ($voucher == 'sahur') {
            $totalBayar -= $totalBayar * 0.10;

           } elseif ($voucher == 'ngabuburit') {
                $totalBayar -= $totalBayar * 0.15;
            }
        }
    }



// PROSES HITUNG KEMBALIAN
if (isset($_POST['hitung_kembalian'])) {
    if ($uangBayar >= $totalBayar) {
        $kembalian = $uangBayar - $totalBayar;
    } else {
        echo "<script>alert('Uang bayar kurang');</script>";
    }
}

// PROSES SIMPAN (VALIDASI UANG DITAMBAHKAN)
if (isset($_POST['simpan'])) {

    if ($nama == '' || $jk == '' || $noIdentitas == '' || $durasiJam <= 0) {
        echo "<script>alert('Lengkapi semua data terlebih dahulu');</script>";
    }
    elseif ($noIdentitas < 1000000000000000) {
        echo "<script>alert('Nomor identitas harus minimal 16 digit');</script>";
    }
    elseif ($uangBayar === '' || $uangBayar <= 0) {
        echo "<script>alert('ANDA BELUM MEMASUKAN UANG ANDA');</script>";
    }
    elseif ($uangBayar < $totalBayar) {
        echo "<script>alert('UANG ANDA KURANG PERIKSA KEMBALI NOMINAL YANG ANDA MASUKAN');</script>";
    }
    else {
        echo "<script>
            alert(
                'DATA TRANSAKSI\\n' +
                'Nama: $nama\\n' +
                'Jenis Kelamin: $jk\\n' +
                'No Identitas: $noIdentitas\\n' +
                'PlayStation: {$daftarPlaystation[$pilihanPlaystation][0]}\\n' +
                'Durasi: $durasiJam Jam\\n' +
                'Voucher: ".($voucher != '' ? $voucher : '-')."\\n' +
                'Total: Rp $totalBayar'
            );
        </script>";
    }
}

// CANCEL
if (isset($_POST['cancel'])) {
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}
?>

<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Form Rental PlayStation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        <nav class="navbar bg-body-secondary">
            <div class="container">
                <img src="img/logops.jpg" width="30" height="24">
            </div>
        </nav>
        <h5><a class="nav-link disabled">Rental PlayStation</a></h5>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <h5><a class="nav-link active" href="index.php">Home</a></h5>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
<div class="card">
<div class="card-header text-center">
<h5>Form Transaksi Rental PlayStation</h5>
</div>
<div class="card-body">

<form method="post">

<input class="form-control mb-3" name="nama" value="<?= $nama ?>" placeholder="Nama Penyewa">

<div class="mb-3">
<label>Jenis Kelamin</label><br>
<input type="radio" name="jk" value="Laki-laki" <?= $jk=='Laki-laki'?'checked':'' ?>> Laki-laki
<input type="radio" name="jk" value="Perempuan" <?= $jk=='Perempuan'?'checked':'' ?>> Perempuan
</div>

<input class="form-control mb-3" name="no_identitas" value="<?= $noIdentitas ?>" maxlength="16"
oninput="this.value=this.value.replace(/[^0-9]/g,'')" placeholder="Nomor Identitas">

<input class="form-control mb-3" type="date" name="tanggal" value="<?= $tanggal ?>">

<select class="form-select mb-3" name="pilps" onchange="this.form.submit()">
<?php foreach ($daftarPlaystation as $i => $ps): ?>
<option value="<?= $i ?>" <?= $i==$pilihanPlaystation?'selected':'' ?>>
<?= $ps[0] ?>
</option>
<?php endforeach ?>
</select>

<input class="form-control mb-3" value="<?= $hargaPerJam ?>" readonly placeholder="Harga / Jam">

<input class="form-control mb-3" type="number" name="durasi" value="<?= $durasiJam ?>" placeholder="Durasi (Jam)">

<div class="form-check mb-3">
<input class="form-check-input" type="checkbox" name="snack" <?= $snack?'checked':'' ?>>
<label class="form-check-label">Snack (+20.000)</label>
</div>

<input class="form-control mb-3" name="voucher" value="<?= $voucher ?>" placeholder="Kode Voucher (opsional)">

<input class="form-control mb-3" name="total" value="<?= $totalBayar ?>" readonly placeholder="Total Bayar">

<input class="form-control mb-3" type="number" name="bayar" value="<?= $uangBayar ?>" placeholder="Uang Bayar">

<input class="form-control mb-3" value="<?= $kembalian ?>" readonly placeholder="Kembalian">

<button name="hitung_kembalian" class="btn btn-secondary mb-2">Hitung Kembalian</button>
<button name="hitung" class="btn btn-primary mb-2">Hitung Total</button>
<button name="simpan" class="btn btn-success mb-2">Simpan</button>
<button name="cancel" class="btn btn-danger mb-2">Cancel</button>

</form>

</div>
</div>
</div>

</body>
</html>
