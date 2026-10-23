<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Shopping Cart | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
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
                    <a class='nav-link cart-link active' href='cart.php'>
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
    <section class="page-hero compact">
        <div class="container">
            <div class="eyebrow">YOUR SELECTION</div>
            <h1>Shopping <span class="gradient-text">Cart</span></h1>
        </div>
    </section>

    <section class="section-pad">
        <div class="container" id="cartContent">
            <!-- Rendered dynamically -->
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

    const container = document.getElementById('cartContent');
    const settings = PV.getSettings();

    function renderCart() {
        const { items, subtotal } = PV.getCartItems();
        const shipping = settings.shipping_charge || 250;
        const total = subtotal + shipping;

        if (items.length === 0) {
            container.innerHTML = `
                <div class="empty-state">
                    <div class="empty-icon">⌑</div>
                    <h2>Your cart is waiting.</h2>
                    <p>Explore our collection and add premium smart watches & accessories.</p>
                    <a class="btn btn-neon mt-3" href="shop.php">Explore Products →</a>
                </div>
            `;
            return;
        }

        container.innerHTML = `
            <div class="row g-4">
                <div class="col-lg-8">
                    ${items.map(it => `
                        <div class="cart-row">
                            <div class="cart-thumb" style="overflow:hidden;">
                                ${it.image ? `<img src="${it.image}" alt="${it.name}" style="width:100%;height:100%;object-fit:contain;">` : `<span class="device-bolt">ϟ</span>`}
                            </div>
                            <div class="cart-item-copy">
                                <h3><a href="product.php?id=${it.id}" style="color:inherit;text-decoration:none;">${it.name}</a></h3>
                                <p>${it.category || 'WRISTVERSE'}</p>
                                <strong>${PV.formatMoney(it.price)}</strong>
                            </div>
                            <div class="cart-qty">
                                <label>Qty</label>
                                <input type="number" min="1" max="${it.stock}" value="${it.qty}" class="form-control" onchange="updateQty(${it.id}, this.value)">
                            </div>
                            <div class="cart-line">
                                <b>${PV.formatMoney(it.line)}</b>
                                <button type="button" class="remove-link" onclick="removeItem(${it.id})">Remove</button>
                            </div>
                        </div>
                    `).join('')}
                    <div class="mt-3">
                        <a href="shop.php" class="btn btn-outline-glow">← Continue Shopping</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="summary-card">
                        <h3>Order Summary</h3>
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <b>${PV.formatMoney(subtotal)}</b>
                        </div>
                        <div class="summary-line">
                            <span>Shipping (TCS)</span>
                            <b>${PV.formatMoney(shipping)}</b>
                        </div>
                        <div class="summary-line total">
                            <span>Estimated total</span>
                            <b>${PV.formatMoney(total)}</b>
                        </div>
                        <p class="muted small">A 5% discount applies automatically to Easypaisa and JazzCash orders at checkout.</p>
                        <a class="btn btn-neon w-100" href="checkout.php">Proceed to Checkout →</a>
                    </div>
                </div>
            </div>
        `;
    }

    window.updateQty = function(id, val) {
        PV.updateCart(id, val);
        renderCart();
    };

    window.removeItem = function(id) {
        PV.removeFromCart(id);
        renderCart();
    };

    renderCart();
});
</script>
</body>
</html>
