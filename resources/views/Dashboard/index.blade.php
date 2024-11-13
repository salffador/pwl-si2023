<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d;
            --background-color: #f8f9fa;
            --text-color: #212529;
            --navbar-bg-color: #fff;
            --card-bg-color: #fff;
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .navbar {
            background-color: var(--navbar-bg-color);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.8rem 1rem;
            transition: background-color 0.3s ease;
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: var(--primary-color);
        }

        .navbar .navbar-brand:hover {
            color: var(--primary-color);
        }

        .navbar-light .navbar-nav .nav-link {
            color: var(--text-color);
            padding-right: 15px;
        }

        .card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-color: var(--card-bg-color);
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .carousel-inner img {
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .dark-mode {
            --background-color: #121212;
            --text-color: #f1f1f1;
            --navbar-bg-color: #1e1e1e;
            --card-bg-color: #1e1e1e;
        }

        /* Ubah warna teks untuk card saat dark mode */
        body.dark-mode .card h3,
        body.dark-mode .card p {
            color: white; /* Warna teks putih */
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* Smooth transition for dark mode */
        body, .navbar, .card {
            transition: background-color 0.4s ease, color 0.4s ease;
        }
    </style>
</head>
<body>

    <!-- Navbar with Dark Mode Switch -->
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item d-flex align-items-center">
                        <span class="me-2">Dark Mode</span>
                        <label class="switch">
                            <input type="checkbox" id="dark-mode-switch">
                            <span class="slider"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <!-- Carousel Section -->
        <div id="dashboardCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn0-production-images-kly.akamaized.net/tNIDFbSzAsVvTZgmioKfFumL4RU=/0x0:1000x563/1200x675/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/4269000/original/080235300_1671677561-shutterstock_2201226261.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-flex justify-content-center align-items-center" style="bottom: 20%;">
                        <div class="text-center">
                            <h5 class="display-5">Welcome to Dashboard</h5>
                            <p class="lead">Manage your business efficiently.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/image2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-flex justify-content-center align-items-center" style="bottom: 20%;">
                        <div class="text-center">
                            <h5 class="display-5">Products Overview</h5>
                            <p class="lead">Check out your product list and details.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/image3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-flex justify-content-center align-items-center" style="bottom: 20%;">
                        <div class="text-center">
                            <h5 class="display-5">Transactions Summary</h5>
                            <p class="lead">Monitor your sales and transaction history.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Cards Section -->
        <div class="row mt-4">
            <!-- Total Suppliers -->
            <div class="col-md-4">
                <div class="card text-center animate__animated animate__fadeInUp">
                    <div class="card-body">
                        <h3>Total Suppliers</h3>
                        <p>{{ $totalSuppliers }}</p>
                        <a href="{{ route('supplier.index') }}" class="btn btn-primary">View Suppliers</a>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="col-md-4">
                <div class="card text-center animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                    <div class="card-body">
                        <h3>Total Products</h3>
                        <p>{{ $totalProducts }}</p>
                        <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                    </div>
                </div>
            </div>

            <!-- Total Transactions -->
            <div class="col-md-4">
                <div class="card text-center animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                    <div class="card-body">
                        <h3>Total Transactions</h3>
                        <p>{{ $totalTransactions }}</p>
                        <a href="{{ route('transaction.index') }}" class="btn btn-primary">View Transactions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const darkModeSwitch = document.getElementById('dark-mode-switch');
        const body = document.body;

        // Load dark mode preference from localStorage
        if (localStorage.getItem('dark-mode') === 'enabled') {
            body.classList.add('dark-mode');
            darkModeSwitch.checked = true;
        }

        // Toggle dark mode with smooth transition
        darkModeSwitch.addEventListener('change', () => {
            if (darkModeSwitch.checked) {
                body.classList.add('dark-mode');
                localStorage.setItem('dark-mode', 'enabled');
            } else {
                body.classList.remove('dark-mode');
                localStorage.removeItem('dark-mode');
            }
        });
    </script>
</body>
</html>
