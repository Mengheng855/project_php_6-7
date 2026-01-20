<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DURALUX - Premium Products Store</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background:
                radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.3) 0%, transparent 50%),
                linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
            color: #fff;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 30% 40%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 70% 60%, rgba(168, 85, 247, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 90%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Glassmorphism utility */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
        }

        /* Navbar */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 2rem;
            color: #fff !important;
            letter-spacing: 1px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(90deg, #00d4ff, #0099cc);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: #00d4ff !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8) 0%, rgba(118, 75, 162, 0.8) 100%);
            backdrop-filter: blur(10px);
            color: white;
            padding: 8rem 0 6rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .hero-section h1 {
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            animation: fadeInUp 1s ease-out;
        }

        .hero-section p {
            font-size: 1.4rem;
            margin-bottom: 3rem;
            opacity: 0.95;
            animation: fadeInUp 1.2s ease-out;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);
            border: none;
            padding: 1rem 3rem;
            font-weight: 700;
            border-radius: 50px;
            transition: all 0.4s ease;
            color: #1a1a2e;
            box-shadow: 0 8px 32px rgba(0, 212, 255, 0.3);
            animation: fadeInUp 1.4s ease-out;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #0099cc 0%, #0077aa 100%);
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 12px 40px rgba(0, 212, 255, 0.4);
        }

        /* Main Content */
        main {
            position: relative;
            z-index: 2;
        }

        /* User Profile Section */
        .user-profile-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 3rem;
            border-radius: 24px;
            margin-bottom: 4rem;
            box-shadow: 0 16px 64px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .user-profile-section:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.15);
        }

        .user-profile-header {
            display: flex;
            align-items: center;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .user-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            flex-shrink: 0;
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 40px rgba(102, 126, 234, 0.4);
        }

        .user-info h3 {
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .user-info p {
            color: rgba(255, 255, 255, 0.9);
            margin: 0.3rem 0;
            font-size: 1.1rem;
        }

        .user-stats {
            display: flex;
            gap: 3rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.15);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #00d4ff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1rem;
            margin-top: 0.5rem;
            font-weight: 600;
        }

        /* Category Section */
        .category-section {
            margin-bottom: 5rem;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 4rem;
            text-align: center;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }

        .category-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 1rem 0.5rem;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            height: auto;
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
            transition: left 0.3s;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-color: rgba(0, 212, 255, 0.3);
        }



        .category-card h3 {
            font-size: 0.875rem;
            font-weight: 600;
            color: #fff;
            margin-bottom: 0.25rem;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .category-card p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.75rem;
            line-height: 1.2;
            margin: 0;
        }

        /* Products Section */
        .products-section {
            margin-bottom: 5rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            position: relative;
        }


        .product-image {
            width: 100%;
            height: 240px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            transition: all 0.3s ease;
        }


        .product-info {
            padding: 2rem;
        }

        .product-category {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .product-name {
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .product-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 1.6rem;
            font-weight: 900;
            color: #00d4ff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .btn-add-cart {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: 0 4px 16px rgba(102, 126, 234, 0.3);
        }

        .btn-add-cart:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: scale(1.05);
            box-shadow: 0 8px 24px rgba(102, 126, 234, 0.4);
        }

        /* Footer */
        footer {
            background: rgba(12, 12, 12, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 6rem;
        }

        footer a {
            color: #00d4ff;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        footer a:hover {
            color: #fff;
            transform: translateX(4px);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-section h4 {
            font-weight: 800;
            margin-bottom: 1.5rem;
            font-size: 1.3rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 1rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }

            .user-profile-header {
                flex-direction: column;
                text-align: center;
            }

            .user-stats {
                justify-content: center;
                flex-wrap: wrap;
                gap: 1.5rem;
            }

            .category-card {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Left Section: Logo -->
            <a class="navbar-brand" href="#">DURALUX</a>
            
            <!-- Center Section: Navigation Items -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
            
            <!-- Right Section: Profile -->
            <div class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            
            <!-- Mobile Toggler -->
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <h1>Welcome to DURALUX</h1>
            <p>Discover Premium Products Across All Categories</p>
            <button class="btn btn-primary-custom">Shop Now</button>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container">
 
        <!-- Categories Section -->
        <section class="category-section" id="categories">
            <h2 class="section-title">Shop By Category</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <h3>Electronics</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <h3>Fashion</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <h3>Home & Garden</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="category-card">
                        <h3>Books</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-section" id="products">
            <h2 class="section-title">Featured Products</h2>
            <div class="product-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">ELECTRONICS</span>
                        <div class="product-name">Premium Laptop</div>
                        <p class="product-description">High-performance laptop for professionals</p>
                        <div class="product-footer">
                            <span class="product-price">$1,299</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <i class="fas fa-shirt"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">FASHION</span>
                        <div class="product-name">Designer T-Shirt</div>
                        <p class="product-description">Comfortable and stylish daily wear</p>
                        <div class="product-footer">
                            <span class="product-price">$49</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <i class="fas fa-sofa"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">HOME & GARDEN</span>
                        <div class="product-name">Modern Sofa</div>
                        <p class="product-description">Elegant sofa for your living room</p>
                        <div class="product-footer">
                            <span class="product-price">$599</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">BOOKS</span>
                        <div class="product-name">Bestseller Novel</div>
                        <p class="product-description">Award-winning fiction book</p>
                        <div class="product-footer">
                            <span class="product-price">$24</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>

                <!-- Product 5 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                        <i class="fas fa-microchip"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">TECHNOLOGY</span>
                        <div class="product-name">Smart Device</div>
                        <p class="product-description">IoT enabled smart home device</p>
                        <div class="product-footer">
                            <span class="product-price">$199</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-card">
                    <div class="product-image" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                        <i class="fas fa-spa"></i>
                    </div>
                    <div class="product-info">
                        <span class="product-category">HEALTH & BEAUTY</span>
                        <div class="product-name">Skincare Set</div>
                        <p class="product-description">Premium organic skincare collection</p>
                        <div class="product-footer">
                            <span class="product-price">$89</span>
                            <button class="btn-add-cart"><i class="fas fa-shopping-cart"></i> Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>About DURALUX</h4>
                    <p>Your trusted platform for premium products across all categories.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#categories">Categories</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Customer Service</h4>
                    <ul>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Follow Us</h4>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            <div class="text-center border-top pt-3" style="border-color: rgba(255,255,255,0.1) !important;">
                <p>&copy; 2024 DURALUX. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
