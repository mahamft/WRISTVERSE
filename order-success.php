<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Order Confirmed | WRISTVERSE</title>
    <meta name="description" content="Thank you for your order. Your WRISTVERSE package is being prepared for dispatch with TCS Express.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .order-step-bar {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
            margin: 28px 0;
            text-align: center;
        }
        .order-step {
            padding: 12px 8px;
            border-radius: 10px;
            border: 1px solid rgba(0, 200, 255, 0.2);
            background: rgba(6, 21, 35, 0.7);
            font-size: 11px;
            color: var(--muted);
            transition: all 0.3s ease;
        }
        .order-step.active {
            border-color: var(--cyan);
            background: rgba(0, 200, 255, 0.12);
            color: #fff;
            box-shadow: 0 0 15px rgba(0, 200, 255, 0.25);
        }
        .order-step b {
            display: block;
            color: var(--cyan);
            font-size: 13px;
            margin-bottom: 3px;
        }
        .payment-box {
            border: 1px solid rgba(0, 200, 255, 0.35);
            background: rgba(4, 17, 30, 0.85);
            border-radius: 14px;
            padding: 22px;
            margin: 24px 0;
            text-align: left;
        }
        .order-item-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid rgba(100, 170, 210, 0.15);
            font-size: 13px;
        }
        .order-item-row:last-child {
            border-bottom: 0;
        }
        .copy-btn {
            background: none;
            border: 1px solid var(--line);
            color: var(--cyan);
            border-radius: 6px;
            padding: 2px 10px;
            font-size: 11px;
            margin-left: 8px;
            cursor: pointer;
            transition: 0.2s;
        }
        .copy-btn:hover {
            background: var(--cyan);
            color: #00101a;
        }
        @media print {
            .pv-nav, .pv-footer, .no-print, .topline {
                display: none !important;
            }
            body {
                background: #fff !important;
                color: #000 !important;
            }
            .success-card {
                border: 1px solid #ccc !important;
                background: #fff !important;
                color: #000 !important;
                box-shadow: none !important;
            }
            .gradient-text, .brand span {
                color: #000 !important;
                background: none !important;
                -webkit-background-clip: unset !important;
            }
            .order-step-bar, .payment-box {
                border-color: #ddd !important;
                background: #f9f9f9 !important;
                color: #000 !important;
            }
            .order-item-row b, .summary-line b, .order-number strong {
                color: #000 !important;
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

<main class="section-pad">
    <div class="container">
        <div id="orderSuccessContent">
            <!-- Dynamically populated -->
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

    const container = document.getElementById('orderSuccessContent');
    let order = PV.getLastOrder();

    // If no recent session order, check URL param or latest order
    if (!order) {
        const params = new URLSearchParams(window.location.search);
        const orderNum = params.get('order');
        if (orderNum) {
            const allOrders = PV.getOrders();
            order = allOrders.find(o => o.order_number === orderNum);
        }
    }

    if (!order) {
        container.innerHTML = `
            <div class="success-card">
                <div class="success-check" style="border-color:#087dff;color:#087dff;">?</div>
                <div class="eyebrow justify-content-center">NO RECENT ORDER DETECTED</div>
                <h1>Looking for your <span class="gradient-text">Order?</span></h1>
                <p>We couldn't find an active order in this session. You can track your existing orders using your reference number.</p>
                <div class="d-flex justify-content-center gap-3 mt-4">
                    <a href="track-order.php" class="btn btn-neon">Track An Order</a>
                    <a href="shop.php" class="btn btn-outline-glow">Visit Shop</a>
                </div>
            </div>
        `;
        return;
    }

    const settings = PV.getSettings();
    const isCOD = order.payment_method === 'cod';
    const isEP = order.payment_method === 'easypaisa';
    const isJC = order.payment_method === 'jazzcash';

    // Build WhatsApp message
    const waText = encodeURIComponent(
        `*WRISTVERSE Order Confirmation*\n` +
        `Order Ref: ${order.order_number}\n` +
        `Name: ${order.customer_name}\n` +
        `Phone: ${order.phone}\n` +
        `City: ${order.city}\n` +
        `Items: ${(order.items || []).map(i => i.name + ' x ' + i.qty).join(', ')}\n` +
        `Total: ${PV.formatMoney(order.total)}\n` +
        `Payment: ${order.payment_method.toUpperCase()}\n` +
        `Please confirm dispatch via TCS Express.`
    );
    const waUrl = `https://wa.me/${settings.whatsapp_number || '923273822228'}?text=${waText}`;

    container.innerHTML = `
        <div class="success-card">
            <div class="success-check">✓</div>
            <div class="eyebrow justify-content-center">
                <span class="pulse-dot"></span>
                ORDER PLACED SUCCESSFULLY
            </div>
            <h1>Thank You, <span class="gradient-text">${order.customer_name}</span>!</h1>
            <p>Your order has been recorded and is currently being packed for TCS Express nationwide courier dispatch.</p>

            <div class="order-number">
                ORDER REFERENCE
                <strong>${order.order_number} <button class="copy-btn" onclick="navigator.clipboard.writeText('${order.order_number}'); PV.showToast('Order Number Copied!');">Copy</button></strong>
            </div>

            <div class="order-step-bar">
                <div class="order-step active">
                    <b>1. Received</b>
                    <span>Order Placed</span>
                </div>
                <div class="order-step active">
                    <b>2. Processing</b>
                    <span>Packaging Item</span>
                </div>
                <div class="order-step">
                    <b>3. Dispatched</b>
                    <span>TCS Tracking</span>
                </div>
                <div class="order-step">
                    <b>4. Delivered</b>
                    <span>At Your Doorstep</span>
                </div>
            </div>

            <div class="payment-box">
                <div class="eyebrow mb-2">PAYMENT & DELIVERY DETAILS</div>
                ${isCOD ? `
                    <div style="color:#dff8ff; font-size:14px; line-height:1.7;">
                        💵 <b>Cash on Delivery (COD):</b> Please keep <b>${PV.formatMoney(order.total)}</b> cash ready when the TCS courier rider arrives at your address.
                    </div>
                ` : isEP ? `
                    <div style="color:#dff8ff; font-size:14px; line-height:1.7;">
                        📱 <b>Easypaisa Payment Required:</b><br>
                        Please send <b>${PV.formatMoney(order.total)}</b> to Easypaisa account:<br>
                        • Number: <b style="color:var(--cyan); font-size:16px;">${settings.easypaisa_number || '03273822228'}</b><br>
                        • Account Title: <b>WRISTVERSE PK</b><br>
                        • Reference: <b>${order.order_number}</b><br>
                        <small style="color:var(--muted)">Share the transaction ID / receipt via WhatsApp to accelerate dispatch.</small>
                    </div>
                ` : `
                    <div style="color:#dff8ff; font-size:14px; line-height:1.7;">
                        📱 <b>JazzCash Payment Required:</b><br>
                        Please send <b>${PV.formatMoney(order.total)}</b> to JazzCash account:<br>
                        • Number: <b style="color:var(--cyan); font-size:16px;">${settings.jazzcash_number || '03074364067'}</b><br>
                        • Account Title: <b>WRISTVERSE PK</b><br>
                        • Reference: <b>${order.order_number}</b><br>
                        <small style="color:var(--muted)">Share the transaction ID / receipt via WhatsApp to accelerate dispatch.</small>
                    </div>
                `}
                ${order.payment_proof ? `
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(100,170,210,0.15);">
                        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                            <span class="badge bg-success">✓ Attached Payment Screenshot Proof</span>
                            ${order.transaction_id ? `<span class="badge bg-dark border border-secondary" style="font-size:11px;">TID: ${order.transaction_id}</span>` : ''}
                        </div>
                        <div class="text-center">
                            <img src="${order.payment_proof}" alt="Attached Proof" style="max-height:200px; max-width:100%; border-radius:8px; border:1px solid rgba(215,173,91,0.35); box-shadow:0 6px 20px rgba(0,0,0,0.5);">
                        </div>
                    </div>
                ` : ''}
                <div class="mt-3 pt-3" style="border-top:1px solid rgba(100,170,210,0.15); font-size:12px; color:var(--muted);">
                    📍 <b>Shipping Address:</b> ${order.address}, ${order.city} | <b>Phone:</b> ${order.phone}
                </div>
            </div>

            <div class="form-panel text-start my-4">
                <h3 class="mb-3">Order Items (${(order.items || []).length})</h3>
                <div class="order-items-list mb-3">
                    ${(order.items || []).map(item => `
                        <div class="order-item-row">
                            <div>
                                <strong style="color:#fff;">${item.name}</strong>
                                <div style="font-size:11px; color:var(--muted);">Quantity: ${item.qty} × ${PV.formatMoney(item.price)}</div>
                            </div>
                            <b>${PV.formatMoney(item.line || (item.price * item.qty))}</b>
                        </div>
                    `).join('')}
                </div>

                <div class="summary-line">
                    <span>Subtotal</span>
                    <b>${PV.formatMoney(order.subtotal)}</b>
                </div>
                ${order.discount > 0 ? `
                    <div class="summary-line">
                        <span>Payment Discount (5%)</span>
                        <b style="color:#4ade80;">- ${PV.formatMoney(order.discount)}</b>
                    </div>
                ` : ''}
                <div class="summary-line">
                    <span>Nationwide TCS Courier Shipping</span>
                    <b>${PV.formatMoney(order.shipping || 250)}</b>
                </div>
                <div class="summary-line total">
                    <span>Final Amount Payable</span>
                    <b>${PV.formatMoney(order.total)}</b>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-3 justify-content-center mt-4 no-print">
                <a href="${waUrl}" target="_blank" rel="noopener" class="btn btn-neon">
                    Confirm via WhatsApp ↗
                </a>
                <a href="track-order.php?order=${order.order_number}" class="btn btn-outline-glow">
                    Track Order Live ⌁
                </a>
                <button onclick="window.print()" class="btn btn-outline-glow">
                    Print Invoice ⎙
                </button>
                <a href="shop.php" class="btn btn-outline-glow">
                    Continue Shopping →
                </a>
            </div>
        </div>
    `;
});
</script>
</body>
</html>
