<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Track Order | WRISTVERSE</title>
    <meta name="description" content="Track your WRISTVERSE smart watch order and nationwide TCS Express delivery status.">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .tracker-wrap {
            max-width: 820px;
            margin: 0 auto;
        }
        .track-search-card {
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 30px;
            background: linear-gradient(145deg, #08192a, #030c17);
            margin-bottom: 30px;
        }
        .progress-timeline {
            position: relative;
            padding: 24px 0;
            margin: 30px 0;
        }
        .timeline-steps {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            position: relative;
            z-index: 2;
        }
        .timeline-step {
            text-align: center;
        }
        .timeline-node {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border: 2px solid var(--line);
            background: #030d17;
            color: var(--muted);
            display: grid;
            place-items: center;
            font-size: 18px;
            margin: 0 auto 12px;
            transition: all 0.3s ease;
        }
        .timeline-step.completed .timeline-node {
            border-color: #22c55e;
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            box-shadow: 0 0 16px rgba(34, 197, 94, 0.3);
        }
        .timeline-step.active .timeline-node {
            border-color: var(--cyan);
            background: rgba(0, 200, 255, 0.18);
            color: #fff;
            box-shadow: 0 0 20px rgba(0, 200, 255, 0.45);
            animation: pulse 1.6s infinite;
        }
        .timeline-title {
            font-size: 12px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2px;
        }
        .timeline-desc {
            font-size: 10px;
            color: var(--muted);
        }
        .quick-pill {
            background: rgba(0, 200, 255, 0.08);
            border: 1px solid rgba(0, 200, 255, 0.25);
            color: var(--cyan);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            cursor: pointer;
            transition: 0.2s;
        }
        .quick-pill:hover {
            background: var(--cyan);
            color: #00101a;
        }
        @media (max-width: 767px) {
            .timeline-steps {
                grid-template-columns: 1fr;
                gap: 20px;
                text-align: left;
            }
            .timeline-step {
                display: flex;
                align-items: center;
                gap: 15px;
                text-align: left;
            }
            .timeline-node {
                margin: 0;
                flex-shrink: 0;
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
                <li class="nav-item"><a class='nav-link active' href='track-order.php'>Track Order</a></li>
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
            <div class="eyebrow">NATIONWIDE TCS TRACKING</div>
            <h1>Track Your <span class="gradient-text">Shipment</span></h1>
            <p>Enter your order reference code or TCS tracking number to check live packaging and delivery status.</p>
        </div>
    </section>

    <section class="section-pad">
        <div class="container tracker-wrap">
            <div class="track-search-card">
                <form id="trackForm" class="row g-3 align-items-end">
                    <div class="col-md-9">
                        <label class="form-label" for="trackInput">Order Reference Number or TCS Tracking Number</label>
                        <input id="trackInput" class="form-control" placeholder="e.g. WV-261014-9A4B or 03XXXXXXXXX" required>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-neon w-100">Track Now ⌁</button>
                    </div>
                </form>

                <div class="d-flex align-items-center gap-2 mt-3 flex-wrap">
                    <span style="font-size:11px; color:var(--muted);">Quick Test Examples:</span>
                    <span class="quick-pill" onclick="autoSearch('WV-261014-9A4B')">WV-261014-9A4B (Delivered)</span>
                    <span class="quick-pill" onclick="autoSearch('WV-261014-3C8F')">WV-261014-3C8F (Processing)</span>
                </div>
            </div>

            <div id="trackingResult">
                <!-- Populated on search -->
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
function autoSearch(code) {
    document.getElementById('trackInput').value = code;
    doSearch(code);
}

async function doSearch(query) {
    query = (query || '').trim();
    if (!query) return;
    await PV.ready;
    const found = await PV.trackOrder(query);

    const resBox = document.getElementById('trackingResult');

    if (!found) {
        resBox.innerHTML = `
            <div class="empty-state">
                <span style="font-size:36px;">🔍</span>
                <h3 class="mt-3">No Order Found for "${query}"</h3>
                <p>Please double-check your Order Reference Code (e.g. WV-261014-9A4B) or TCS tracking number.</p>
                <div class="d-flex justify-content-center gap-3 mt-3">
                    <a href="https://wa.me/923273822228?text=Hello%20WRISTVERSE,%20I%20need%20help%20tracking%20my%20order:%20${encodeURIComponent(query)}" target="_blank" rel="noopener" class="btn btn-neon">
                        Inquire on WhatsApp ↗
                    </a>
                    <a href="shop.php" class="btn btn-outline-glow">Continue Shopping</a>
                </div>
            </div>
        `;
        return;
    }

    const status = (found.status || 'Pending').toLowerCase();
    
    let s1 = 'active';    // Order Received
    let s2 = '';          // Processing
    let s3 = '';          // Dispatched
    let s4 = '';          // Delivered

    if (status === 'confirmed' || status === 'processing') {
        s1 = 'completed';
        s2 = 'active';
    } else if (status === 'shipped' || status === 'dispatched') {
        s1 = 'completed';
        s2 = 'completed';
        s3 = 'active';
    } else if (status === 'delivered') {
        s1 = 'completed';
        s2 = 'completed';
        s3 = 'completed';
        s4 = 'completed';
    } else if (status === 'cancelled') {
        s1 = '';
        s2 = '';
        s3 = '';
        s4 = '';
    }

    resBox.innerHTML = `
        <div class="dashboard-panel">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-3 pb-3" style="border-bottom:1px solid rgba(100,170,210,0.15);">
                <div>
                    <span class="eyebrow" style="font-size:10px;">ORDER TRACKING DETAILS</span>
                    <h2 class="mt-1 mb-1" style="color:var(--cyan); font-size:22px; font-weight:800;">${found.order_number}</h2>
                    <div style="font-size:12px; color:var(--muted);">Placed on: ${found.created_at || 'Recently'}</div>
                </div>
                <div class="text-end">
                    <span class="status-pill ${status === 'delivered' ? 'border-success text-success' : ''}" style="font-size:11px; padding:6px 14px;">
                        ${found.status || 'Pending'}
                    </span>
                    <div style="font-size:11px; color:var(--muted); margin-top:5px;">Courier: TCS Express Pakistan</div>
                </div>
            </div>

            <!-- Progress Timeline -->
            <div class="progress-timeline">
                <div class="timeline-steps">
                    <div class="timeline-step ${s1}">
                        <div class="timeline-node">1</div>
                        <div class="timeline-title">Order Received</div>
                        <div class="timeline-desc">Details confirmed</div>
                    </div>
                    <div class="timeline-step ${s2}">
                        <div class="timeline-node">2</div>
                        <div class="timeline-title">Processing</div>
                        <div class="timeline-desc">Packing & Testing</div>
                    </div>
                    <div class="timeline-step ${s3}">
                        <div class="timeline-node">3</div>
                        <div class="timeline-title">Dispatched</div>
                        <div class="timeline-desc">With TCS Courier</div>
                    </div>
                    <div class="timeline-step ${s4}">
                        <div class="timeline-node">4</div>
                        <div class="timeline-title">Delivered</div>
                        <div class="timeline-desc">Package handed over</div>
                    </div>
                </div>
            </div>

            <!-- Courier Details Strip -->
            <div class="p-3 mb-4 rounded-3" style="background:rgba(0,200,255,0.06); border:1px solid rgba(0,200,255,0.2);">
                <div class="row g-2 align-items-center">
                    <div class="col-md-7">
                        <span style="font-size:11px; color:var(--muted); display:block;">TCS COURIER TRACKING NO:</span>
                        <strong style="font-size:16px; color:#fff;">${found.tracking_number || 'Will be assigned upon courier dispatch'}</strong>
                    </div>
                    <div class="col-md-5 text-md-end">
                        ${found.tracking_number ? `
                            <a href="https://www.tcsexpress.com/tracking?trackNo=${encodeURIComponent(found.tracking_number)}" target="_blank" rel="noopener" class="btn btn-sm btn-neon">
                                Verify on TCS Website ↗
                            </a>
                        ` : `
                            <span class="badge-status pending">Preparing Parcel</span>
                        `}
                    </div>
                </div>
            </div>

            <!-- Delivery & Items Info -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="border:1px solid rgba(100,170,210,0.15); background:#030c17;">
                        <h4 style="font-size:13px; font-weight:700; color:var(--cyan); margin-bottom:12px;">Delivery Destination</h4>
                        <div style="font-size:12px; line-height:1.8;">
                            <b>Recipient:</b> ${found.customer_name}<br>
                            <b>Destination City:</b> ${found.city}<br>
                            <b>Shipping Address:</b> ${found.address}<br>
                            <b>Payment Mode:</b> ${(found.payment_method || 'cod').toUpperCase()} (${found.payment_status || 'Pending'})
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 rounded-3" style="border:1px solid rgba(100,170,210,0.15); background:#030c17;">
                        <h4 style="font-size:13px; font-weight:700; color:var(--cyan); margin-bottom:12px;">Package Contents</h4>
                        ${(found.items || []).map(item => `
                            <div class="d-flex justify-content-between py-1" style="font-size:12px; border-bottom:1px dashed rgba(100,170,210,0.1);">
                                <span>${item.name} × ${item.qty}</span>
                                <b>${PV.formatMoney(item.line || (item.price * item.qty))}</b>
                            </div>
                        `).join('')}
                        <div class="d-flex justify-content-between pt-2 mt-2" style="font-size:13px; font-weight:700; color:#fff;">
                            <span>Total (incl. TCS shipping):</span>
                            <span style="color:var(--cyan);">${PV.formatMoney(found.total)}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center mt-4 pt-3" style="border-top:1px solid rgba(100,170,210,0.15);">
                <a href="https://wa.me/923273822228?text=Hello%20WRISTVERSE,%20inquiring%20about%20my%20order%20${found.order_number}" target="_blank" rel="noopener" class="btn btn-outline-glow btn-sm">
                    Inquire on WhatsApp ↗
                </a>
                <a href="shop.php" class="btn btn-neon btn-sm">
                    Continue Shopping →
                </a>
            </div>
        </div>
    `;
}

document.addEventListener('DOMContentLoaded', async () => {
    await PV.ready;
    document.getElementById('yearSpan').textContent = new Date().getFullYear();

    const u = PV.getCurrentUser();
    if (u) {
        document.getElementById('navAuthSlot').innerHTML = `<a class="nav-link" href="account/index.php">My Account</a>`;
    }

    document.getElementById('trackForm').addEventListener('submit', (e) => {
        e.preventDefault();
        const q = document.getElementById('trackInput').value;
        doSearch(q);
    });

    const params = new URLSearchParams(window.location.search);
    const orderNum = params.get('order');
    if (orderNum) {
        document.getElementById('trackInput').value = orderNum;
        doSearch(orderNum);
    }
});
</script>
</body>
</html>
