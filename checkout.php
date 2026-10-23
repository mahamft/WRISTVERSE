<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/images/wristverse-emblem.png">
    <title>Secure Checkout | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .payment-option {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px;
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            margin-bottom: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .payment-option:hover {
            border-color: rgba(0,229,255,0.4);
            background: rgba(0,229,255,0.04);
        }
        .payment-option input[type="radio"] {
            margin-top: 4px;
        }
        .payment-option b {
            display: block;
            color: #fff;
            font-size: 15px;
        }
        .payment-option small {
            display: block;
            color: #9bb4ca;
            font-size: 13px;
            margin-top: 2px;
        }
        .payment-proof-box {
            background: linear-gradient(145deg, #13110e, #090806);
            border: 1px solid rgba(215, 173, 91, 0.35);
            border-radius: 12px;
            padding: 20px;
            margin-top: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            animation: fadeIn 0.3s ease;
        }
        .account-info-card {
            background: rgba(215, 173, 91, 0.08);
            border: 1px solid rgba(215, 173, 91, 0.25);
            border-radius: 10px;
            padding: 14px 16px;
        }
        .proof-dropzone {
            border: 2px dashed rgba(215, 173, 91, 0.45);
            border-radius: 10px;
            padding: 24px;
            text-align: center;
            background: rgba(255, 255, 255, 0.02);
            cursor: pointer;
            transition: all 0.25s ease;
        }
        .proof-dropzone:hover {
            border-color: #d7ad5b;
            background: rgba(215, 173, 91, 0.06);
        }
        .proof-icon {
            font-size: 34px;
            margin-bottom: 6px;
        }
        .proof-preview-img {
            max-height: 200px;
            max-width: 100%;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid rgba(215, 173, 91, 0.3);
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
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

<main>
    <section class="page-hero compact">
        <div class="container">
            <div class="eyebrow">ALMOST THERE</div>
            <h1>Secure <span class="gradient-text">Checkout</span></h1>
            <p>Enter your shipping details and select your preferred payment method.</p>
        </div>
    </section>

    <section class="section-pad">
        <div class="container">
            <form id="checkoutForm" class="row g-4 checkout-form">
                <div class="col-lg-7">
                    <div class="form-panel">
                        <h2>Shipping Information</h2>
                        <div id="errorBox" class="alert alert-danger d-none"></div>

                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label" for="custName">Full Name *</label>
                                <input class="form-control" id="custName" required placeholder="e.g. Muhammad Ali">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="custPhone">Phone Number (WhatsApp) *</label>
                                <input class="form-control" id="custPhone" required placeholder="03XXXXXXXXX">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="custEmail">Email Address *</label>
                                <input type="email" class="form-control" id="custEmail" required placeholder="name@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="custAddress">Complete Street Address *</label>
                                <textarea class="form-control" id="custAddress" rows="2" required placeholder="House/Flat number, Street, Area"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="custCity">City *</label>
                                <input class="form-control" id="custCity" required placeholder="e.g. Lahore, Karachi, Islamabad">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="custPostal">Postal Code</label>
                                <input class="form-control" id="custPostal" placeholder="Optional">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="custNotes">Order Notes</label>
                                <textarea class="form-control" id="custNotes" rows="2" placeholder="Special delivery instructions..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-panel mt-4">
                        <h2>Payment Method</h2>

                        <label class="payment-option">
                            <input type="radio" name="payment" value="cod" checked>
                            <span>
                                <b>Cash on Delivery (COD)</b>
                                <small>Pay cash to the courier rider upon delivery.</small>
                            </span>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment" value="easypaisa">
                            <span>
                                <b>Easypaisa (Instant 5% Discount)</b>
                                <small>Enjoy an instant 5% discount deducted automatically at checkout.</small>
                            </span>
                        </label>

                        <label class="payment-option">
                            <input type="radio" name="payment" value="jazzcash">
                            <span>
                                <b>JazzCash (Instant 5% Discount)</b>
                                <small>Enjoy an instant 5% discount deducted automatically at checkout.</small>
                            </span>
                        </label>

                        <!-- Screenshot Proof of Payment Section -->
                        <div id="paymentProofBox" class="payment-proof-box d-none">
                            <div class="proof-account-strip">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
                                    <span class="eyebrow m-0" id="proofAccountType" style="font-size:10px;">EASYPAISA PAYMENT DETAILS</span>
                                    <span class="badge bg-success" style="font-size:10px;">5% Online Discount Applied</span>
                                </div>
                                <div class="account-info-card">
                                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                        <div>
                                            <small class="text-muted d-block">Official Account Number</small>
                                            <strong id="proofAccNumber" style="color:#d7ad5b; font-size:18px; letter-spacing:0.05em;">03273822228</strong>
                                        </div>
                                        <button type="button" class="btn btn-mini btn-outline-glow" id="copyAccBtn">Copy Number</button>
                                    </div>
                                    <div class="mt-2 pt-2 border-top border-secondary-subtle d-flex justify-content-between align-items-center flex-wrap gap-2">
                                        <div>
                                            <small class="text-muted">Account Title:</small>
                                            <strong class="text-white ms-1">WRISTVERSE PK</strong>
                                        </div>
                                        <div class="text-end">
                                            <small class="text-muted">Discounted Total:</small>
                                            <strong id="proofTotalPayable" style="color:#d7ad5b; font-weight:700;" class="ms-1">Rs. 0.00</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Upload Screenshot Section -->
                            <div class="proof-upload-wrap mt-3">
                                <label class="form-label d-flex justify-content-between align-items-center">
                                    <span><b>Attach Payment Screenshot (Proof of Payment) *</b></span>
                                    <small class="text-muted">PNG, JPG, WEBP</small>
                                </label>
                                
                                <div class="proof-dropzone" id="proofDropzone" onclick="document.getElementById('proofFileInput').click();">
                                    <input type="file" id="proofFileInput" accept="image/*" class="d-none">
                                    <div id="proofPlaceholder" class="proof-placeholder">
                                        <div class="proof-icon">📸</div>
                                        <strong style="color:#f8f4ec;">Click to Upload Screenshot / Receipt</strong>
                                        <small class="text-muted d-block mt-1">Tap to select transaction receipt from gallery or camera</small>
                                    </div>
                                    <div id="proofPreviewWrap" class="proof-preview-wrap d-none">
                                        <img id="proofPreviewImg" class="proof-preview-img" src="" alt="Payment Proof Preview">
                                        <div class="mt-2 d-flex justify-content-center gap-2">
                                            <span class="badge bg-success">✓ Screenshot Attached</span>
                                            <button type="button" class="btn btn-mini btn-danger" id="removeProofBtn" onclick="event.stopPropagation(); removeProofImage();">Remove</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label class="form-label" for="proofTidInput">Transaction ID (TID) / Reference Code (Optional)</label>
                                    <input type="text" class="form-control" id="proofTidInput" placeholder="e.g. 104829104829 or Easypaisa/JazzCash Ref ID">
                                    <small class="text-muted d-block mt-1">TID verification enables priority dispatch with TCS courier.</small>
                                </div>
                            </div>
                        </div>

                        <p class="muted small mt-3">Courier: TCS Express Nationwide Delivery.</p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="summary-card sticky-summary">
                        <h3>Order Summary</h3>
                        <div id="checkoutItemsList"></div>
                        <hr>
                        <div class="summary-line">
                            <span>Subtotal</span>
                            <b id="subtotalVal">Rs. 0.00</b>
                        </div>
                        <div class="summary-line">
                            <span>Online Discount (5%)</span>
                            <b id="discountVal" class="text-success">- Rs. 0.00</b>
                        </div>
                        <div class="summary-line">
                            <span>Shipping (TCS)</span>
                            <b id="shippingVal">Rs. 250.00</b>
                        </div>
                        <div class="summary-line total">
                            <span>Total Payable</span>
                            <b id="totalVal">Rs. 0.00</b>
                        </div>
                        <button type="submit" class="btn btn-neon w-100 mt-4">
                            Place Order Securely →
                        </button>
                    </div>
                </div>
            </form>
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

    const { items, subtotal } = PV.getCartItems();
    if (items.length === 0) {
        window.location.replace('cart.php');
        return;
    }

    // Auto fill user details if logged in
    const u = PV.getCurrentUser();
    if (u) {
        document.getElementById('navAuthSlot').innerHTML = `<a class="nav-link" href="account/index.php">My Account</a>`;
        document.getElementById('custName').value = u.name || '';
        document.getElementById('custEmail').value = u.email || '';
        if (u.phone) document.getElementById('custPhone').value = u.phone;
        if (u.city) document.getElementById('custCity').value = u.city;
        if (u.address) document.getElementById('custAddress').value = u.address;
    }

    const itemsList = document.getElementById('checkoutItemsList');
    itemsList.innerHTML = items.map(it => `
        <div class="summary-line">
            <span>${it.name} × ${it.qty}</span>
            <b>${PV.formatMoney(it.line)}</b>
        </div>
    `).join('');

    const settings = PV.getSettings();
    const shipping = settings.shipping_charge || 250;

    let uploadedProofFile = null;

    function recalculate() {
        const method = document.querySelector('input[name="payment"]:checked').value;
        const discountRate = Math.max(0, Number(settings.discount_percent ?? 5)) / 100;
        const discount = (method === 'easypaisa' || method === 'jazzcash') ? Math.round(subtotal * discountRate * 100) / 100 : 0;
        const total = Math.max(0, subtotal - discount + shipping);

        document.getElementById('subtotalVal').textContent = PV.formatMoney(subtotal);
        document.getElementById('discountVal').textContent = discount > 0 ? `- ${PV.formatMoney(discount)}` : 'Rs. 0.00';
        document.getElementById('shippingVal').textContent = PV.formatMoney(shipping);
        document.getElementById('totalVal').textContent = PV.formatMoney(total);

        // Manage Payment Proof box visibility & account info
        const proofBox = document.getElementById('paymentProofBox');
        if (method === 'easypaisa' || method === 'jazzcash') {
            proofBox.classList.remove('d-none');
            const isEP = method === 'easypaisa';
            document.getElementById('proofAccountType').textContent = isEP ? 'EASYPAISA PAYMENT DETAILS' : 'JAZZCASH PAYMENT DETAILS';
            const accNum = isEP ? (settings.easypaisa_number || '03273822228') : (settings.jazzcash_number || '03074364067');
            document.getElementById('proofAccNumber').textContent = accNum;
            document.getElementById('proofTotalPayable').textContent = PV.formatMoney(total);
        } else {
            proofBox.classList.add('d-none');
        }

        return { discount, total };
    }

    // Payment proof image handling
    const proofInput = document.getElementById('proofFileInput');
    proofInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            if (file.size > 8 * 1024 * 1024) {
                this.value = '';
                PV.showToast('Please select an image under 8MB', 'error');
                return;
            }
            if (!['image/jpeg','image/png','image/webp'].includes(file.type)) {
                this.value = '';
                PV.showToast('Payment proof must be JPG, PNG or WEBP.', 'error');
                return;
            }
            uploadedProofFile = file;
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('proofPreviewImg').src = e.target.result;
                document.getElementById('proofPlaceholder').classList.add('d-none');
                document.getElementById('proofPreviewWrap').classList.remove('d-none');
                PV.showToast('Payment screenshot attached successfully!');
            };
            reader.readAsDataURL(file);
        }
    });

    window.removeProofImage = function () {
        uploadedProofFile = null;
        document.getElementById('proofFileInput').value = '';
        document.getElementById('proofPreviewImg').src = '';
        document.getElementById('proofPlaceholder').classList.remove('d-none');
        document.getElementById('proofPreviewWrap').classList.add('d-none');
    };

    document.getElementById('copyAccBtn').addEventListener('click', (e) => {
        e.preventDefault();
        const num = document.getElementById('proofAccNumber').textContent;
        navigator.clipboard.writeText(num);
        PV.showToast('Account number copied: ' + num);
    });

    document.querySelectorAll('input[name="payment"]').forEach(r => r.addEventListener('change', recalculate));
    recalculate();

    document.getElementById('checkoutForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const { discount, total } = recalculate();
        const method = document.querySelector('input[name="payment"]:checked').value;

        const orderData = {
            customer_name: document.getElementById('custName').value.trim(),
            phone: document.getElementById('custPhone').value.trim(),
            email: document.getElementById('custEmail').value.trim(),
            address: document.getElementById('custAddress').value.trim(),
            city: document.getElementById('custCity').value.trim(),
            postal_code: document.getElementById('custPostal').value.trim(),
            notes: document.getElementById('custNotes').value.trim(),
            payment_method: method,
            payment_proof: '',
            transaction_id: document.getElementById('proofTidInput').value.trim() || '',
            subtotal,
            discount,
            shipping,
            total,
            items: items.map(i => ({ id: i.id, name: i.name, price: i.price, qty: i.qty, line: i.line }))
        };

        if (method !== 'cod' && !uploadedProofFile) { PV.showToast('Please attach payment screenshot.', 'error'); return; }
        try {
            const placed = await PV.placeOrder(orderData, uploadedProofFile);
            if (placed) window.location.replace('order-success.php');
        } catch (err) { PV.showToast(err.message, 'error'); }
    });
});
</script>
</body>
</html>
