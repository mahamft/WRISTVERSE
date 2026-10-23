<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Shop | WRISTVERSE</title>
    <meta name="description" content="Browse WRISTVERSE premium smart watches, fitness bands and high-performance wrist accessories.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .shop-product-card {
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .shop-product-card .product-art {
            position: relative;
            display: block;
            width: 100%;
            height: 260px;
            overflow: hidden;
            background: #090807;
            border-radius: 0;
            text-decoration: none;
            margin: 0;
            padding: 0;
            border-bottom: 1px solid rgba(215, 173, 91, 0.18);
        }
        .shop-product-card .shop-product-image {
            position: relative;
            z-index: 1;
            display: block;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
            border-radius: 0;
            object-fit: cover;
            object-position: center;
            transition: transform .4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .shop-product-card:hover .shop-product-image {
            transform: scale(1.08);
        }
        .shop-product-card .product-placeholder {
            position: relative;
            z-index: 1;
            margin: 50px auto;
        }
        .shop-product-card .product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            z-index: 3;
            background: rgba(10, 9, 8, 0.82);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(215, 173, 91, 0.35);
            color: #d7ad5b;
            font-size: 8px;
            letter-spacing: .12em;
            padding: 5px 10px;
            border-radius: 30px;
        }
        .shop-product-card .product-info {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .shop-product-card .product-info button {
            margin-top: auto;
        }
        .page-hero {
            position: relative;
            overflow: hidden;
            background: 
                linear-gradient(180deg, rgba(8,8,7,0.85), rgba(8,8,7,0.95)),
                radial-gradient(ellipse at 80% 0%, rgba(215,173,91,0.18), transparent 50%),
                url('assets/images/hero-bg.jpg') center top / cover no-repeat !important;
        }
        .category-pill {
            cursor: pointer;
            padding: 6px 16px;
            border-radius: 20px;
            background: rgba(255,255,255,0.06);
            color: #9bb4ca;
            border: 1px solid rgba(255,255,255,0.1);
            font-size: 13px;
            transition: all 0.2s ease;
        }
        .category-pill.active, .category-pill:hover {
            background: rgba(0,229,255,0.15);
            color: #00e5ff;
            border-color: #00e5ff;
        }
    </style>
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container">
        <a class='navbar-brand brand brand-image' href='index.php'><img src="assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#pvNav" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="pvNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class='nav-link' href='index.php'>Home</a></li>
                <li class="nav-item"><a class='nav-link active' href='shop.php'>Shop</a></li>
                <li class="nav-item"><a class='nav-link' href='track-order.php'>Track Order</a></li>
                <li class="nav-item"><a class='nav-link' href='about.php'>About</a></li>
                <li class="nav-item"><a class='nav-link' href='contact.php'>Contact</a></li>
                <li class="nav-item">
                    <a class='nav-link cart-link' href='cart.php'>
                        Cart <span class="cart-count">0</span>
                    </a>
                </li>
                <li class="nav-item" id="navAuthSlot">
                    <a class='nav-link' href='account/login.php'>Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <section class="page-hero">
        <div class="container">
            <div class="eyebrow">WRISTVERSE COLLECTION</div>
            <h1>Find your <span class="gradient-text">next essential.</span></h1>
            <p>Browse premium accessories, explore product images and order with fast TCS express delivery.</p>

            <div class="search-form mt-4">
                <input id="searchInput" class="shop-search-input" type="search" placeholder="Search by name or category..." aria-label="Search products">
                <button id="searchBtn" type="button" class="btn btn-neon">Search</button>
                <button id="clearBtn" type="button" class="btn btn-outline-glow d-none">Clear</button>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-center mt-3" id="categoryPills">
                <span class="category-pill active" data-cat="">All Products</span>
                <span class="category-pill" data-cat="Smart Watches">Smart Watches</span>
                <span class="category-pill" data-cat="Fitness Bands">Fitness Bands</span>
                <span class="category-pill" data-cat="Accessories">Accessories</span>
            </div>
        </div>
    </section>

    <section class="section-pad">
        <div class="container">
            <div class="section-heading">
                <div>
                    <div class="eyebrow">OUR PRODUCTS</div>
                    <h2>Explore the <span class="gradient-text">Collection.</span></h2>
                    <p id="countNote">Showing all available products.</p>
                </div>
            </div>

            <div class="row g-4" id="shopGrid">
                <!-- Dynamically rendered -->
            </div>
        </div>
    </section>

    <section class="section-pad payment-strip">
        <div class="container">
            <div class="section-heading">
                <div>
                    <div class="eyebrow"><span class="pulse-dot"></span> CHECKOUT &amp; DELIVERY</div>
                    <h2>Simple, flexible <span class="gradient-text">payments &amp; fast delivery.</span></h2>
                    <p>Doorstep Cash on Delivery, instant digital wallet checkout with 5% off, and nationwide express TCS delivery.</p>
                </div>
            </div>
            <div class="payment-methods">
                <div class="payment-card">
                    <div class="payment-badge">DOORSTEP</div>
                    <div class="payment-icon">💵</div>
                    <b>COD</b>
                    <span>Cash on Delivery</span>
                    <small>Pay with cash when your parcel arrives</small>
                </div>
                <div class="payment-card payment-discount-card">
                    <div class="payment-badge discount-badge">5% OFF</div>
                    <div class="payment-icon">📱</div>
                    <b>EP</b>
                    <span>Easypaisa Digital</span>
                    <small>Instant wallet payment · 5% auto discount</small>
                </div>
                <div class="payment-card payment-discount-card">
                    <div class="payment-badge discount-badge">5% OFF</div>
                    <div class="payment-icon">⚡</div>
                    <b>JC</b>
                    <span>JazzCash Mobile</span>
                    <small>Direct mobile transfer · 5% auto discount</small>
                </div>
                <div class="payment-card">
                    <div class="payment-badge">TRACKED</div>
                    <div class="payment-icon">📦</div>
                    <b>TCS</b>
                    <span>Courier Express</span>
                    <small>Verified nationwide courier delivery</small>
                </div>
                <div class="payment-card payment-fast-card">
                    <div class="payment-badge fast-badge">⚡ 24-48H</div>
                    <div class="payment-icon">🚀</div>
                    <b>FAST</b>
                    <span>Fast Delivery</span>
                    <small>Express 24–48 hours nationwide dispatch</small>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="pv-footer prestige-footer" id="contact">
    <div class="footer-topbar">
        <div class="container footer-topbar-inner">
            <a class="footer-top-logo" href="index.php" aria-label="WRISTVERSE home">
                <img src="assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE">
            </a>
            <div class="footer-top-tagline">TIME BEYOND LIMITS</div>
        </div>
    </div>

    <div class="container footer-showcase">
        <div class="footer-panel footer-brand-panel">
            <div class="footer-heading">Brand</div>
            <a class="footer-brand-lockup" href="index.php">
                <img src="assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE">
            </a>
            <div class="footer-brand-star">✦</div>
            <div class="footer-brand-copy">Premium watches</div>
            <div class="footer-brand-subcopy">Timeless style. Modern confidence.</div>
        </div>

        <div class="footer-panel footer-links-panel">
            <div class="footer-heading">Quick Links</div>
            <a class="footer-link-row" href="shop.php"><span class="footer-icon">◇</span><span>Shop Products</span></a>
            <a class="footer-link-row" href="cart.php"><span class="footer-icon">▱</span><span>Shopping Cart</span></a>
            <a class="footer-link-row" href="track-order.php"><span class="footer-icon">⌖</span><span>Track Order</span></a>
            <a class="footer-link-row" href="admin/login.php"><span class="footer-icon">◈</span><span>Admin Portal</span></a>
        </div>

        <div class="footer-panel footer-support-panel">
            <div class="footer-heading">Support</div>
            <a class="footer-support-row" href="mailto:supportwristversepk@gmail.com"><span class="footer-icon">✉</span><span><b>Email:</b> supportwristversepk@gmail.com</span></a>
            <a class="footer-whatsapp" href="https://wa.me/923273822228" target="_blank" rel="noopener"><span>◉</span> Chat Now</a>
            <div class="footer-support-row"><span class="footer-icon">▰</span><span><b>TCS Express</b> Nationwide delivery</span></div>
            <div class="footer-support-row footer-payment-note"><span class="footer-icon">◫</span><span>COD · Easypaisa · JazzCash</span></div>
        </div>
    </div>

    <div class="footer-bottombar">
        <div class="container">© <span id="yearSpan"></span> WRISTVERSE · Crafted for timeless style.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/store.js"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
    await PV.ready;
    document.getElementById('yearSpan').textContent = new Date().getFullYear();

    const u = PV.getCurrentUser();
    if (u) {
        document.getElementById('navAuthSlot').innerHTML = `<a class="nav-link" href="account/index.php">My Account</a>`;
    }

    let selectedCat = '';
    const searchInput = document.getElementById('searchInput');
    const clearBtn = document.getElementById('clearBtn');
    const grid = document.getElementById('shopGrid');
    const countNote = document.getElementById('countNote');

    function render() {
        const query = searchInput.value.trim().toLowerCase();
        let products = PV.getProducts();

        if (selectedCat) {
            products = products.filter(p => (p.category || '').toLowerCase() === selectedCat.toLowerCase());
        }

        if (query) {
            products = products.filter(p => 
                (p.name || '').toLowerCase().includes(query) || 
                (p.description || '').toLowerCase().includes(query) ||
                (p.category || '').toLowerCase().includes(query)
            );
            clearBtn.classList.remove('d-none');
        } else {
            clearBtn.classList.add('d-none');
        }

        countNote.textContent = `${products.length} product${products.length === 1 ? '' : 's'} available.`;

        if (products.length === 0) {
            grid.innerHTML = `
                <div class="col-12">
                    <div class="empty-state">
                        No products found matching your search.
                        <div class="mt-3">
                            <button class="btn btn-outline-glow" onclick="resetSearch()">View All Products</button>
                        </div>
                    </div>
                </div>
            `;
            return;
        }

        grid.innerHTML = products.map(p => `
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="product-card shop-product-card">
                    <a class="product-art" href="product.php?id=${p.id}" aria-label="View ${p.name}">
                        <div class="art-glow"></div>
                        ${p.image ? `<img class="shop-product-image" src="${p.image}" alt="${p.name}" loading="lazy">` : `
                            <div class="product-placeholder">
                                <span class="device-screen"></span>
                                <span class="device-port"></span>
                                <span class="device-bolt">ϟ</span>
                            </div>
                        `}
                        <span class="product-badge">PV COLLECTION</span>
                    </a>
                    <div class="product-info">
                        <div class="product-category">${p.category || 'ACCESSORY'}</div>
                        <h3>${p.name}</h3>
                        <p>${p.description || 'Premium accessory.'}</p>
                        <div class="product-bottom">
                            <strong>${p.price ? PV.formatMoney(p.price) : 'Price not set'}</strong>
                            <a class="btn-mini" href="product.php?id=${p.id}">Details ↗</a>
                        </div>
                        ${p.price && p.stock > 0 ? `
                            <button class="btn btn-neon w-100 mt-3" onclick="PV.addToCart(${p.id})">
                                Add to Cart
                            </button>
                        ` : `
                            <button class="btn btn-disabled w-100 mt-3" disabled>
                                ${p.stock <= 0 ? 'Out of Stock' : 'Price Not Set'}
                            </button>
                        `}
                    </div>
                </div>
            </div>
        `).join('');
    }

    searchInput.addEventListener('input', render);
    document.getElementById('searchBtn').addEventListener('click', render);

    window.resetSearch = function () {
        searchInput.value = '';
        selectedCat = '';
        document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
        document.querySelector('.category-pill[data-cat=""]').classList.add('active');
        render();
    };

    clearBtn.addEventListener('click', resetSearch);

    document.querySelectorAll('.category-pill').forEach(pill => {
        pill.addEventListener('click', function () {
            document.querySelectorAll('.category-pill').forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            selectedCat = this.getAttribute('data-cat') || '';
            render();
        });
    });

    render();
});
</script>
</body>
</html>
