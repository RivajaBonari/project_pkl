<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAK - Sistem Manajemen Surat BKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f6f8;
            color: #333;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .hero {
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            color: white;
            padding: 80px 0;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .features {
            padding: 60px 0;
        }

        .feature-box {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        footer {
            background: #2c5364;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .btn-login {
            border-radius: 30px;
            padding: 8px 20px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            {{-- <a class="navbar-brand fw-bold text-primary" href="#">SIMAK</a> --}}
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/images/simak.png') }}" alt="SIMAK Logo" height="40">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav me-3">
                    <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
                    <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
                </ul>
                <a href="{{ route('login') }}" class="btn btn-primary btn-login">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero text-center">
        <div class="container">
            <h1>Sistem Informasi Surat Masuk & Keluar</h1>
            <p>BKAD Kabupaten Dairi - Kelola surat Anda secara efisien dan modern</p>
        </div>
    </section>

    <!-- Fitur -->
    <section id="fitur" class="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Fitur Unggulan</h2>
                <p>Berikut fitur utama dari sistem pengelolaan surat kami</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-box text-center">
                        <h5>Surat Masuk</h5>
                        <p>Input surat masuk dengan file, nomor, tanggal, dan perihal secara digital.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-box text-center">
                        <h5>Disposisi</h5>
                        <p>Kepala Badan langsung mendisposisikan surat secara sistematis.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-box text-center">
                        <h5>Surat Keluar</h5>
                        <p>Surat keluar dengan penomoran otomatis dan fitur upload dokumen.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-box text-center">
                        <h5>Keamanan Data</h5>
                        <p>Role-based access memastikan hanya pihak berwenang yang bisa mengakses surat tertentu.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container text-center">
            <h3 class="fw-bold mb-3">Tentang Sistem</h3>
            <p class="mx-auto" style="max-width: 700px;">
                SIMAK (Sistem Informasi Manajemen Tata Surat) adalah platform internal BKAD Kabupaten Dairi untuk
                mengelola seluruh proses surat menyurat. Sistem ini mendukung efisiensi, akurasi, dan keamanan
                administrasi surat masuk dan keluar.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>© {{ now()->year }} SIMAK - BKAD Kabupaten Dairi</p>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
