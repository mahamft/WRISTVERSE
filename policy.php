<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Shipping, Warranty & Return Policy | WRISTVERSE</title>
    <meta name="description" content="Read the official WRISTVERSE policy for TCS nationwide express shipping, 7-day replacement warranty, and payment terms.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .policy-card {
            border: 1px solid var(--line);
            border-radius: 14px;
            background: linear-gradient(145deg, #08192a, #030c17);
            padding: 30px;
            margin-bottom: 24px;
        }
        .policy-card h2 {
            font-size: 20px;
            font-weight: 800;
            color: var(--cyan);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .policy-card p, .policy-card li {
            font-size: 13px;
            line-height: 1.8;
            color: var(--muted);
        }
        .policy-card ul {
            padding-left: 20px;
            margin-bottom: 0;
        }
        .policy-nav-pills {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .policy-nav-pills a {
            padding: 8px 16px;
            border: 1px solid var(--line);
            border-radius: 20px;
            font-size: 12px;
            color: #fff;
            background: rgba(0, 200, 255, 0.05);
            transition: 0.2s;
        }
        .policy-nav-pills a:hover {
            border-color: var(--cyan);
            background: rgba(0, 200, 255, 0.15);
            color: var(--cyan);
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
    <section class="page-hero compact">
        <div class="container">
            <div class="eyebrow">STORE POLICIES &amp; TERMS</div>
            <h1>Shipping, Warranty &amp; <span class="gradient-text">Returns</span></h1>
            <p>Clear, transparent, and customer-first policies designed to give you complete peace of mind.</p>
        </div>
    </section>

    <section class="section-pad">
        <div class="container" style="max-width: 900px;">
            <div class="policy-nav-pills">
                <a href="#shipping">🚚 Shipping Policy</a>
                <a href="#warranty">🛡️ 7-Day Replacement Warranty</a>
                <a href="#payment">💳 Payment & Discount Policy</a>
                <a href="#returns">↩️ Returns & Exchanges</a>
                <a href="#privacy">🔒 Privacy & Data Protection</a>
            </div>

            <!-- Shipping Policy -->
            <div class="policy-card" id="shipping">
                <h2><span>🚚</span> Nationwide Shipping &amp; Delivery</h2>
                <p>
                    All orders placed on <b>WRISTVERSE</b> are dispatched through our official courier partner, <b>TCS Express</b>, ensuring insured, safe, and expedited nationwide delivery.
                </p>
                <ul>
                    <li><b>Delivery Timelines:</b> Major cities (Lahore, Karachi, Islamabad, Rawalpindi, Faisalabad, Multan, Peshawar, Quetta) receive parcels within <b>2 to 3 business days</b>. Outlying towns and rural districts typically take 3 to 4 business days.</li>
                    <li><b>Standard Shipping Charge:</b> A flat nominal delivery rate of <b>Rs. 250</b> is applied to all nationwide orders regardless of weight.</li>
                    <li><b>Order Verification:</b> Our dispatch department verifies your order via telephone call or WhatsApp confirmation message before the courier is handed over.</li>
                    <li><b>Live Tracking:</b> As soon as your order leaves our fulfillment center, a unique TCS Tracking ID is generated and sent via SMS and WhatsApp. You can track it anytime on our <a href="track-order.php">Track Order</a> page.</li>
                </ul>
            </div>

            <!-- 7-Day Replacement Warranty -->
            <div class="policy-card" id="warranty">
                <h2><span>🛡️</span> 7-Day Replacement Warranty</h2>
                <p>
                    We stand firmly behind the build quality of our smart watches. Every device purchased directly from WRISTVERSE is backed by a <b>7-day replacement warranty</b> covering technical and hardware manufacturing defects.
                </p>
                <ul>
                    <li><b>Covered Under Warranty:</b> Dead on arrival (DOA) units, touchscreen sensor malfunctions, charging port failure, Bluetooth connectivity defects, or display abnormalities.</li>
                    <li><b>Unboxing Video Recommendation:</b> To protect your claim against courier transit mishandling, we strongly recommend recording a 30-second continuous unboxing video while opening the parcel.</li>
                    <li><b>Exclusions:</b> Warranty does not cover accidental physical impact (cracked screens), unauthorized third-party repairs, or water immersion exceeding product IP ratings.</li>
                </ul>
            </div>

            <!-- Payment Policy -->
            <div class="policy-card" id="payment">
                <h2><span>💳</span> Payment Methods &amp; 5% Advance Discount</h2>
                <p>
                    We support modern and flexible payment options across Pakistan:
                </p>
                <ul>
                    <li><b>Cash on Delivery (COD):</b> Available for all locations nationwide. Pay the exact parcel total in cash directly to the TCS delivery rider.</li>
                    <li><b>Easypaisa &amp; JazzCash (Instant 5% Discount):</b> Pay via Easypaisa or JazzCash to enjoy an <b>instant 5% discount</b> deducted automatically at checkout. Official account details are provided securely at final order confirmation.</li>
                    <li><b>Payment Proof:</b> For digital payments, simply take a screenshot of the transaction and share it with our WhatsApp team at <b>03273822228</b> with your Order Reference.</li>
                </ul>
            </div>

            <!-- Returns & Exchanges -->
            <div class="policy-card" id="returns">
                <h2><span>↩️</span> Returns &amp; Exchange Process</h2>
                <p>
                    Initiating a warranty replacement or model exchange is quick and hassle-free:
                </p>
                <ul>
                    <li>1. Reach out to our customer care team on WhatsApp at <b>03273822228</b> within 7 days of receiving the package.</li>
                    <li>2. Share your Order Number (e.g. WV-261014-9A4B) along with a brief description and photo/video of the issue.</li>
                    <li>3. Our team will arrange a reverse pickup or authorize a return dispatch via TCS to our verification hub.</li>
                    <li>4. Once received and inspected, a brand-new replacement unit is dispatched immediately.</li>
                </ul>
            </div>

            <!-- Privacy -->
            <div class="policy-card" id="privacy">
                <h2><span>🔒</span> Customer Privacy &amp; Data Security</h2>
                <p>
                    WRISTVERSE respects your personal privacy. Customer details including contact phone numbers, delivery addresses, and order histories are stored strictly for fulfillment, courier logistics, and customer support purposes. We never sell, lease, or share customer data with third-party advertisers.
                </p>
            </div>

            <div class="text-center mt-4">
                <p class="muted">Have questions not answered above? We are always here to help.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="contact.php" class="btn btn-neon">Contact Customer Support</a>
                    <a href="https://wa.me/923273822228" target="_blank" rel="noopener" class="btn btn-outline-glow">WhatsApp Helpline ↗</a>
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
});
</script>
</body>
</html>
