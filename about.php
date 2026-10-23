<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>About Us | WRISTVERSE - Time Beyond Limits</title>
    <meta name="description" content="Discover WRISTVERSE - Pakistan's premier destination for high-performance smart watches and next-generation wrist technology.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .about-story-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 50px;
            align-items: center;
        }
        .story-badge {
            display: inline-block;
            padding: 6px 14px;
            background: rgba(0, 200, 255, 0.1);
            border: 1px solid var(--line);
            border-radius: 20px;
            color: var(--cyan);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.1em;
            margin-bottom: 16px;
        }
        .stats-strip {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 40px 0;
            border-top: 1px solid var(--line);
            border-bottom: 1px solid var(--line);
            background: rgba(4, 17, 30, 0.6);
            margin: 60px 0;
            text-align: center;
        }
        .stats-strip-item b {
            display: block;
            font-size: clamp(28px, 4vw, 42px);
            font-weight: 900;
            color: var(--cyan);
            line-height: 1;
            margin-bottom: 6px;
        }
        .stats-strip-item span {
            font-size: 12px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }
        .pillar-card {
            border: 1px solid var(--line);
            border-radius: 14px;
            background: linear-gradient(145deg, #08192a, #030c17);
            padding: 28px;
            height: 100%;
            transition: transform 0.25s ease, border-color 0.25s ease;
        }
        .pillar-card:hover {
            transform: translateY(-5px);
            border-color: var(--cyan);
            box-shadow: 0 12px 30px rgba(0, 200, 255, 0.15);
        }
        .pillar-icon {
            font-size: 32px;
            color: var(--cyan);
            margin-bottom: 16px;
            display: block;
        }
        @media (max-width: 991px) {
            .about-story-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            .stats-strip {
                grid-template-columns: repeat(2, 1fr);
                gap: 25px;
            }
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
                <li class="nav-item"><a class='nav-link active' href='about.php'>About</a></li>
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
        <div class="container text-center">
            <div class="eyebrow justify-content-center">OUR VISION & HERITAGE</div>
            <h1>Time Beyond <span class="gradient-text">Limits.</span></h1>
            <p style="max-width:680px; margin:0 auto;">
                WRISTVERSE was founded to bridge the gap between premium horological aesthetics and modern smart technology for the digital age in Pakistan.
            </p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="section-pad">
        <div class="container">
            <div class="about-story-grid">
                <div>
                    <span class="story-badge">THE WRISTVERSE PHILOSOPHY</span>
                    <h2 style="font-size:clamp(26px, 3.5vw, 40px); font-weight:800; margin-bottom:20px;">
                        Engineering the future of <span class="gradient-text">wearable excellence</span>.
                    </h2>
                    <p style="line-height:1.8; font-size:14px;">
                        At WRISTVERSE, we believe a watch is more than a tool to tell time—it is a personal statement, a fitness coach, and an essential command center on your wrist.
                    </p>
                    <p style="line-height:1.8; font-size:14px;">
                        Every product in our collection is carefully curated and subjected to stringent quality verification. From crisp AMOLED high-refresh displays and aerospace-grade cases to multi-day batteries, we deliver cutting-edge technology without the outrageous luxury markup.
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="shop.php" class="btn btn-neon">Browse Our Collection ↗</a>
                        <a href="contact.php" class="btn btn-outline-glow">Contact Our Team</a>
                    </div>
                </div>

                <div class="text-center">
                    <div style="border:1px solid var(--line); border-radius:20px; padding:30px; background:radial-gradient(ellipse at center, rgba(0,200,255,0.15), transparent 70%), #04101d;">
                        <img src="uploads/products/hero.png?v=2" alt="WRISTVERSE Smartwatch" style="max-width:100%; height:auto; filter:drop-shadow(0 15px 35px rgba(0,200,255,0.3)); border-radius:14px;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Banner -->
    <section class="container">
        <div class="stats-strip">
            <div class="stats-strip-item">
                <b>10,000+</b>
                <span>Happy Customers</span>
            </div>
            <div class="stats-strip-item">
                <b>100%</b>
                <span>Tested &amp; Verified</span>
            </div>
            <div class="stats-strip-item">
                <b>2-4 Days</b>
                <span>TCS Nationwide Delivery</span>
            </div>
            <div class="stats-strip-item">
                <b>7 Days</b>
                <span>Replacement Warranty</span>
            </div>
        </div>
    </section>

    <!-- Pillars / Why Choose Us -->
    <section class="section-pad pt-0">
        <div class="container">
            <div class="section-heading text-center d-block mb-5">
                <div class="eyebrow justify-content-center">WHY CHOOSE US</div>
                <h2>Built on <span class="gradient-text">Trust &amp; Innovation</span></h2>
                <p>What sets WRISTVERSE apart in Pakistan’s smartwatch industry.</p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-4">
                    <div class="pillar-card">
                        <span class="pillar-icon">✧</span>
                        <h3>Pristine AMOLED Displays</h3>
                        <p>Ultra-sharp vibrant panels with Always-On Display (AOD) support, high brightness for sunny outdoor clarity, and responsive touch feedback.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="pillar-card">
                        <span class="pillar-icon">⌁</span>
                        <h3>Precision Health Tracking</h3>
                        <p>Continuous heart-rate tracking, SpO2 blood oxygen monitoring, deep sleep architecture analysis, and multi-sport workout modes tailored for active routines.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="pillar-card">
                        <span class="pillar-icon">⚡</span>
                        <h3>Extended Battery Autonomy</h3>
                        <p>Optimized dual-core processors providing up to 14 days of typical usage on a single charge with rapid magnetic charging.</p>
                    </div>
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
