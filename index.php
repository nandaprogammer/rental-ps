<?php 
$rentalList = [
    ["Playstation 3","Isi Deskripsi Playstation 3",10000,"o.jpg"],
    ["playstation 4","Isi Deskripsi Playstation 4",20000,"PS4.jpg"],
    ["Playstation 5","Isi Deskripsi Playstation 5",25000,"ps5.jpg"]
];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental PlayStation</title>

    <style>
        .carousel-item img {
            height: 450px;
            object-fit: cover;
        }
        .produk-card img{
            width:100%;
            height:200px;
            object-fit:cover;
            border-radius:20px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-body-secondary">
    <div class="container-fluid">
        

<nav class="navbar bg-body-secondary">
  <div class="container">
      <img src="img/logops.jpg" alt="Bootstrap" width="30" height="24">
    </a>
  </div>
</nav>
       <h5><a class="nav-link disabled" aria-disabled="true">Rental PlayStation</a></h5>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                   <h5><a class="nav-link active" href="index.php">Home</a></h5>
                </li>
                <li class="nav-item">
                  <h5><a class="nav-link" href="Rental.php">Rental</a></h5>  
                </li>
            </ul>

           
        </div>
    </div>
</nav>

<!-- CAROUSEL -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/toko1.jpg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Perawatan Terbaik</h5>
                <p>Perawatan berkualitas tinggi</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://tangerangkota.go.id/assets/storage/files/photos/50317reborn-game-center-rental-ps-premium-termurah-di-kota-tangerang-50317.jpeg" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Kami Menjamin Kenyamanan Anda</h5>
                <p>Perawatan berkualitas tinggi</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/p2/230/2024/06/20/gaming-1621067944.png" class="d-block w-100" alt="">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tersedia Berbagai Game</h5>
                <p>Dari Yang Muda Sampai yang Tua Bisa Memainkannya</p>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>

<!-- PRODUK -->
<section id="produk">
    <div class="container mt-5">
        <h2 class="text-center fw-bold mb-4">Daftar Rental PLayStation</h2>
        <div class="row">

            <?php foreach ($rentalList as $rental => $tampil) { ?>
            <div class="col-md-4 mb-3">
                <div class="produk-card border p-3 rounded shadow-sm h-100 text-center">
                    <img src="img/<?=$tampil[3]?>" alt="<?=$tampil[0]?>">
                    <h5 class="mt-3 fw-bold"><?=$tampil[0]?></h5>
                    <p><?=$tampil[1]?></p>
                    <h6 class="fw-bold text-success">
                        Rp <?=number_format($tampil[2],0,',','.')?>
                    </h6>
                   
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<center><a class="button" href="rental.php">Rental ps</a>
</center>

<!-- FOOTER -->

<footer class="bg-secondary text-light mt-5 pt-4">
    <div class="container">
        <div class="row">

            <!-- Tentang Rental -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Rental PlayStation</h5>
                <p class="small">
                    Rental PlayStation terpercaya dengan unit PS3, PS4, dan PS5.
                    Nyaman, terawat, dan harga terjangkau.
                </p>
            </div>

            <!-- Menu -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="index.php" class="text-light text-decoration-none">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="Rental.php" class="text-light text-decoration-none">
                            Rental
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-md-4 mb-3">
                <h5 class="fw-bold">Kontak Kami</h5>
                <p class="small mb-1">📍 Jl. Game Center No. 10</p>
                <p class="small mb-1">📞 0812-3456-7890</p>
                <p class="small">✉️ rentalps@email.com</p>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center pb-3">
            <small>
                &copy; <?= date("Y"); ?> Rental PlayStation. All Rights Reserved.
            </small>
        </div>
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
