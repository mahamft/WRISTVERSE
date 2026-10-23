<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Product Details | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .product-detail .detail-art {
            position: relative;
            min-width: 0;
            overflow: hidden;
            border-radius: 24px;
        }
        .product-detail .detail-product-image {
            position: relative;
            z-index: 1;
            display: block;
            width: 100%;
            height: clamp(340px, 44vw, 540px);
            object-fit: cover;
            object-position: center;
            padding: 0;
            border-radius: 12px;
            background: #090807;
            border: 1px solid rgba(215, 173, 91, 0.22);
        }
        .product-detail .detail-art .product-placeholder {
            position: relative;
            z-index: 1;
            margin: 70px auto;
        }
        .product-detail .quantity-input {
            max-width: 130px;
        }
        .detail-price {
            font-size: 2rem;
            font-weight: 700;
            color: #00e5ff;
            margin: 18px 0;
        }
        .detail-note {
            margin-top: 24px;
            padding: 16px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            font-size: 13px;
            color: #9bb4ca;
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
                <li class="nav-item"><a class='nav-link' href='shop.php'>Shop</a></li>
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
    <div id="productContainer">
        <!-- Rendered dynamically -->
    </div>
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

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');
    const container = document.getElementById('productContainer');

    if (!id) {
        window.location.replace('shop.php');
        return;
    }

    const p = PV.getProduct(id);
    if (!p) {
        container.innerHTML = `
            <div class="container section-pad text-center">
                <div class="empty-state">
                    <h2>Product Not Found</h2>
                    <p>The product you are looking for does not exist or has been removed.</p>
                    <a class="btn btn-neon mt-3" href="shop.php">Return to Shop</a>
                </div>
            </div>
        `;
        return;
    }

    document.title = `${p.name} | WRISTVERSE`;

    const waMsg = encodeURIComponent(`Hello WRISTVERSE, I am interested in: ${p.name} (${PV.formatMoney(p.price)}). Is this currently available?`);
    const waUrl = `https://wa.me/923273822228?text=${waMsg}`;

    container.innerHTML = `
        <section class="section-pad">
            <div class="container product-detail">
                <div class="detail-art">
                    <div class="art-glow"></div>
                    ${p.image ? `<img class="detail-product-image" src="${p.image}" alt="${p.name}">` : `
                        <div class="product-placeholder large">
                            <span class="device-screen"></span>
                            <span class="device-port"></span>
                            <span class="device-bolt">ϟ</span>
                        </div>
                    `}
                </div>

                <div class="detail-copy">
                    <div class="eyebrow">${p.category || 'WRISTVERSE COLLECTION'}</div>
                    <h1>${p.name}</h1>
                    <p class="muted">${p.description || 'Premium accessories engineered for durability and reliable performance.'}</p>

                    <div class="detail-price">${p.price ? PV.formatMoney(p.price) : 'Price not set'}</div>

                    <p class="muted">
                        Stock: ${p.stock > 0 ? `<b class="text-success">${p.stock} units in stock</b>` : '<b class="text-danger">Currently out of stock</b>'}
                    </p>

                    ${p.price && p.stock > 0 ? `
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <label class="form-label mb-0" for="qtyInput">Quantity:</label>
                            <input id="qtyInput" type="number" class="form-control quantity-input" min="1" max="${p.stock}" value="1">
                        </div>
                        <div class="d-flex flex-wrap gap-3">
                            <button id="addCartBtn" class="btn btn-neon flex-grow-1">Add to Cart</button>
                            <a href="${waUrl}" target="_blank" rel="noopener" class="btn btn-outline-glow">Order via WhatsApp ↗</a>
                        </div>
                    ` : `
                        <button class="btn btn-disabled w-100" disabled>Out of Stock</button>
                    `}

                    <div class="detail-note">
                        ✦ <b>Payment Options:</b> Cash on Delivery, Easypaisa & JazzCash.<br>
                        ✦ <b>Fast Delivery:</b> TCS Express with nationwide tracking within 2-4 days.<br>
                        ✦ <b>Special Discount:</b> 5% discount applies automatically on online Easypaisa/JazzCash checkout.
                    </div>
                </div>
            </div>
        </section>
    `;

    const addBtn = document.getElementById('addCartBtn');
    if (addBtn) {
        addBtn.addEventListener('click', () => {
            const qty = Number(document.getElementById('qtyInput').value || 1);
            if (PV.addToCart(p.id, qty)) {
                // optional redirect or toast
            }
        });
    }
});
</script>
</body>
</html>
