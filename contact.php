<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Contact & Customer Support | WRISTVERSE</title>
    <meta name="description" content="Contact WRISTVERSE customer care for order inquiries, TCS parcel tracking, warranty support, and wholesale questions.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .contact-channel-card {
            border: 1px solid var(--line);
            border-radius: 14px;
            padding: 24px;
            background: linear-gradient(145deg, #08192a, #030c17);
            height: 100%;
            transition: transform 0.25s ease, border-color 0.25s ease;
        }
        .contact-channel-card:hover {
            transform: translateY(-5px);
            border-color: var(--cyan);
            box-shadow: 0 10px 30px rgba(0, 200, 255, 0.15);
        }
        .channel-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            border: 1px solid var(--line);
            background: rgba(0, 200, 255, 0.1);
            color: var(--cyan);
            display: grid;
            place-items: center;
            font-size: 22px;
            margin-bottom: 16px;
        }
        .accordion-item {
            background: #04111e;
            border: 1px solid rgba(100, 170, 210, 0.15);
            margin-bottom: 10px;
            border-radius: 10px !important;
            overflow: hidden;
        }
        .accordion-button {
            background: #04111e;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 16px 20px;
        }
        .accordion-button:not(.collapsed) {
            background: rgba(0, 200, 255, 0.1);
            color: var(--cyan);
            box-shadow: none;
        }
        .accordion-button::after {
            filter: invert(1);
        }
        .accordion-body {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
            padding: 16px 20px;
            background: #030a12;
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
                <li class="nav-item"><a class='nav-link active' href='contact.php'>Contact</a></li>
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
            <div class="eyebrow">24/7 CUSTOMER CARE</div>
            <h1>Contact <span class="gradient-text">WRISTVERSE</span></h1>
            <p>We are here to answer your questions regarding products, delivery, warranty and orders.</p>
        </div>
    </section>

    <!-- Support Channels -->
    <section class="section-pad pt-5 pb-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="contact-channel-card">
                        <div class="channel-icon">💬</div>
                        <h3 style="font-size:16px;">WhatsApp Support</h3>
                        <p style="font-size:12px;">Instant replies for orders, tracking & inquiries.</p>
                        <a href="https://wa.me/923273822228" target="_blank" rel="noopener" class="btn btn-sm btn-neon w-100">
                            Chat: 03273822228 ↗
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="contact-channel-card">
                        <div class="channel-icon">✉️</div>
                        <h3 style="font-size:16px;">Email Care</h3>
                        <p style="font-size:12px;">Write to our support team for warranty & feedback.</p>
                        <a href="mailto:supportwristversepk@gmail.com" class="btn btn-sm btn-outline-glow w-100">
                            Send Email ↗
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="contact-channel-card">
                        <div class="channel-icon">💳</div>
                        <h3 style="font-size:16px;">Payment Verification</h3>
                        <p style="font-size:12px;">Easypaisa &amp; JazzCash<br>Instant 5% Online Discount</p>
                        <a href="https://wa.me/923273822228?text=Hello%20WRISTVERSE,%20sharing%20my%20payment%20proof" target="_blank" rel="noopener" class="btn btn-sm btn-outline-glow w-100">
                            Share Screenshot ↗
                        </a>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="contact-channel-card">
                        <div class="channel-icon">🚚</div>
                        <h3 style="font-size:16px;">TCS Dispatch</h3>
                        <p style="font-size:12px;">Fast nationwide shipping within 2 to 4 business days.</p>
                        <a href="track-order.php" class="btn btn-sm btn-outline-glow w-100">
                            Track Your Parcel ⌁
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Contact Form & FAQ -->
    <section class="section-pad pt-4">
        <div class="container">
            <div class="row g-5">
                <!-- Form Column -->
                <div class="col-lg-7">
                    <div class="form-panel">
                        <div class="eyebrow">MESSAGE US</div>
                        <h2 class="mb-2">Send an <span class="gradient-text">Inquiry</span></h2>
                        <p class="mb-4">Fill out the form below. We respond rapidly via WhatsApp and email.</p>

                        <div id="contactSuccess" class="alert alert-success d-none mb-3"></div>

                        <form id="contactForm" class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="msgName">Your Name *</label>
                                <input class="form-control" id="msgName" required placeholder="e.g. Bilal Shah">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="msgPhone">WhatsApp / Phone *</label>
                                <input class="form-control" id="msgPhone" required placeholder="03XXXXXXXXX">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="msgEmail">Email Address</label>
                                <input type="email" class="form-control" id="msgEmail" placeholder="name@example.com">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="msgSubject">Inquiry Topic</label>
                                <select class="form-select" id="msgSubject">
                                    <option value="Order Status">Order Tracking / Status</option>
                                    <option value="Product Details">Product Inquiries & Compatibility</option>
                                    <option value="Warranty Return">Warranty & 7-Day Replacement</option>
                                    <option value="Payment Verification">Payment Proof (Easypaisa/JazzCash)</option>
                                    <option value="Other">Other Question</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="msgOrder">Order Reference (optional)</label>
                                <input class="form-control" id="msgOrder" placeholder="e.g. WV-261014-9A4B">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="msgContent">Your Message *</label>
                                <textarea class="form-control" id="msgContent" rows="4" required placeholder="How can our team help you?"></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap gap-3">
                                <button type="submit" class="btn btn-neon">Send Message ↗</button>
                                <button type="button" id="btnSendWA" class="btn btn-outline-glow">Send via WhatsApp Directly 💬</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- FAQ Column -->
                <div class="col-lg-5">
                    <div class="section-heading mb-3">
                        <div>
                            <div class="eyebrow">COMMON QUERIES</div>
                            <h2>Frequently Asked <span class="gradient-text">Questions</span></h2>
                        </div>
                    </div>

                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How long does delivery take across Pakistan?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We dispatch all orders via <b>TCS Express</b>. Major cities (Karachi, Lahore, Islamabad, Rawalpindi, Faisalabad) typically receive deliveries within <b>2 to 3 working days</b>. Other regions take 3 to 4 working days.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Is Cash on Delivery (COD) available?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! We provide nationwide Cash on Delivery. You pay the TCS rider in cash when receiving your parcel at your doorstep. We also offer a <b>5% Instant Discount</b> for Easypaisa and JazzCash advance payments.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    What is the WRISTVERSE replacement warranty?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Every WRISTVERSE watch comes with a <b>7-day peace-of-mind replacement warranty</b> covering manufacturing faults or defects. Just notify us via WhatsApp with your unboxing video.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Are smartwatches compatible with Android & iPhone?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! All WRISTVERSE smart watches connect smoothly with both iOS (Apple iPhone) and Android smartphones via Bluetooth using the dedicated companion app.
                                </div>
                            </div>
                        </div>
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
        document.getElementById('msgName').value = u.name || '';
        document.getElementById('msgEmail').value = u.email || '';
    }

    // Direct WhatsApp Button
    document.getElementById('btnSendWA').addEventListener('click', () => {
        const name = document.getElementById('msgName').value.trim() || 'Customer';
        const subject = document.getElementById('msgSubject').value;
        const orderRef = document.getElementById('msgOrder').value.trim();
        const content = document.getElementById('msgContent').value.trim() || 'Hello, I have an inquiry.';

        const text = encodeURIComponent(
            `*WRISTVERSE Support Inquiry*\n` +
            `From: ${name}\n` +
            `Subject: ${subject}\n` +
            (orderRef ? `Order Ref: ${orderRef}\n` : '') +
            `Message: ${content}`
        );
        window.open(`https://wa.me/923273822228?text=${text}`, '_blank');
    });

    // Form Submission
    document.getElementById('contactForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const successBox = document.getElementById('contactSuccess');
        successBox.textContent = 'Thank you! Your message has been received. Our team will contact you shortly.';
        successBox.classList.remove('d-none');
        PV.showToast('Inquiry submitted successfully!');
        document.getElementById('contactForm').reset();
    });
});
</script>
</body>
</html>
