<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>404 - Page Not Found | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .error-hero {
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .error-code {
            font-size: clamp(80px, 15vw, 150px);
            font-weight: 900;
            line-height: 1;
            letter-spacing: -0.05em;
            background: linear-gradient(180deg, #fff 20%, rgba(0, 200, 255, 0.4) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 0 40px rgba(0, 200, 255, 0.3);
            margin-bottom: 15px;
        }
        .error-card {
            max-width: 600px;
            padding: 40px 24px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: radial-gradient(ellipse at center, rgba(0, 200, 255, 0.1), transparent 70%), #05101d;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container">
        <a class='navbar-brand brand brand-image' href='index.php'><img src="assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
        <div class="ms-auto">
            <a class="btn btn-outline-glow btn-sm" href="shop.php">Browse Shop ↗</a>
        </div>
    </div>
</nav>

<main class="error-hero">
    <div class="container d-flex justify-content-center">
        <div class="error-card">
            <div class="eyebrow justify-content-center mb-2">
                <span class="pulse-dot"></span>
                TIMELINE DISRUPTED
            </div>
            <div class="error-code">404</div>
            <h1 style="font-size: clamp(22px, 3vw, 32px); font-weight:800; margin-bottom:12px;">
                Page Lost in <span class="gradient-text">Time</span>
            </h1>
            <p class="muted mb-4">
                The page you are looking for has been moved, removed, or never existed in this dimension. Don't worry—our smart watch collection is right here.
            </p>
            <div class="d-flex flex-wrap gap-3 justify-content-center">
                <a href="index.php" class="btn btn-neon">Back to Home ⚡</a>
                <a href="shop.php" class="btn btn-outline-glow">Shop Products ↗</a>
                <a href="track-order.php" class="btn btn-outline-glow">Track Order ⌁</a>
            </div>
        </div>
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

<script>
document.getElementById('yearSpan').textContent = new Date().getFullYear();
</script>
</body>
</html>
