<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Store Settings | WRISTVERSE Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container-fluid px-4">
        <a class='navbar-brand brand brand-image' href='../index.php'><img src="../assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
    </div>
</nav>

<main>
    <section class="section-pad">
        <div class="container-fluid admin-layout">
            <aside class="admin-sidebar">
                <div class="eyebrow">CONTROL CENTER</div>
                <a href='index.php'>▦ Dashboard</a>
                <a href='products.php'>◇ Products</a>
                <a href='inventory.php'>▤ Inventory</a>
                <a href='orders.php'>⇄ Orders</a>
                <a href='customers.php'>👥 Customers</a>
                <a href='profit-loss.php'>⌁ Profit & Loss</a>
                <a class='active' href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="eyebrow">STORE CONFIGURATION</div>
                <h1>Store <span class="gradient-text">Settings</span></h1>
                <p>Customize store branding, customer support channels, and payment details.</p>

                <div class="dashboard-panel mt-4">
                    <h3>Contact & Payment Channels</h3>
                    <form id="settingsForm" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="storeName">Store Name</label>
                            <input id="storeName" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeEmail">Support Email</label>
                            <input id="storeEmail" type="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storePhone">Store Contact Phone</label>
                            <input id="storePhone" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeWA">WhatsApp Support Number (92XXXXXXXXXX)</label>
                            <input id="storeWA" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeEP">Easypaisa Number</label>
                            <input id="storeEP" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeJC">JazzCash Number</label>
                            <input id="storeJC" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeShip">Nationwide Shipping Charge (Rs.)</label>
                            <input id="storeShip" type="number" min="0" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="storeDiscount">Prepaid Discount (%)</label>
                            <input id="storeDiscount" type="number" min="0" max="100" step="0.1" class="form-control" required>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-neon">Save Store Settings</button>
                        </div>
                    </form>
                </div>

                <div class="dashboard-panel mt-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">🐘 PHP & MySQL Database Server</h3>
                        <span id="phpStatusBadge" class="badge bg-secondary">Checking Status...</span>
                    </div>
                    <p class="muted">
                        Connect WRISTVERSE to a local or remote <strong>PHP + MySQL (XAMPP/WAMP/cPanel)</strong> backend.
                        Full REST API and database migrations are located in the <code>backend/</code> folder.
                    </p>

                    <div class="alert alert-dark border border-secondary mb-3">
                        <small class="text-light">
                            <strong>MySQL Quick Setup (XAMPP):</strong> Start <em>Apache & MySQL</em> in XAMPP Control Panel.
                            Import <code>database.sql</code> via phpMyAdmin, or click <strong>"Run Web Installer"</strong> below!
                        </small>
                    </div>

                    <form id="phpForm" class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label" for="phpApiUrl">PHP REST API Endpoint URL</label>
                            <input id="phpApiUrl" class="form-control" placeholder="Default: ../../backend/api (Auto-detected)">
                        </div>
                        <div class="col-12 d-flex flex-wrap gap-2 mt-3">
                            <button type="submit" class="btn btn-neon">Save PHP API URL</button>
                            <button type="button" id="btnTestPhp" class="btn btn-outline-glow">Test MySQL Connection</button>
                            <a href="../../backend/install.php" target="_blank" class="btn btn-outline-warning">Run Web Installer (install.php) ↗</a>
                            <button type="button" id="btnResetPhp" class="btn btn-outline-secondary">Reset to Default</button>
                        </div>
                        <div id="phpFeedback" class="col-12 mt-2" style="font-size: 13px;"></div>
                    </form>
                </div>

                <div class="dashboard-panel mt-4">
                    <h3>Administrator Security</h3>
                    <p class="muted">Signed in as <code id="currentAdminEmail"></code>. Change the default password after first setup.</p>
                    <form id="passwordForm" class="row g-3" style="max-width:720px;">
                        <div class="col-md-6"><label class="form-label">Current Password</label><input id="currentAdminPassword" type="password" class="form-control" required autocomplete="current-password"></div>
                        <div class="col-md-6"><label class="form-label">New Password</label><input id="newAdminPassword" type="password" class="form-control" minlength="8" required autocomplete="new-password"></div>
                        <div class="col-12"><button class="btn btn-outline-glow" type="submit">Change Admin Password</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/store.js"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
    await PV.ready;
    const u = PV.getCurrentUser();
    if (!u || u.role !== 'admin') {
        window.location.replace('login.php');
        return;
    }

    document.getElementById('currentAdminEmail').textContent = u.email;
    document.getElementById('passwordForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        try {
            await PV.changePassword(document.getElementById('currentAdminPassword').value, document.getElementById('newAdminPassword').value);
            e.target.reset();
            PV.showToast('Admin password changed successfully!');
        } catch (err) { PV.showToast(err.message, 'error'); }
    });

    const s = PV.getSettings();
    document.getElementById('storeName').value = s.store_name || 'WRISTVERSE';
    document.getElementById('storeEmail').value = s.support_email || 'supportwristversepk@gmail.com';
    document.getElementById('storePhone').value = s.store_phone || '03273822228';
    document.getElementById('storeWA').value = s.whatsapp_number || '92327382228';
    document.getElementById('storeEP').value = s.easypaisa_number || '03273822228';
    document.getElementById('storeJC').value = s.jazzcash_number || '03074364067';
    document.getElementById('storeShip').value = s.shipping_charge ?? 250;
    document.getElementById('storeDiscount').value = s.discount_percent ?? 5;

    document.getElementById('settingsForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const updated = {
            store_name: document.getElementById('storeName').value.trim(),
            support_email: document.getElementById('storeEmail').value.trim(),
            store_phone: document.getElementById('storePhone').value.trim(),
            whatsapp_number: document.getElementById('storeWA').value.trim(),
            easypaisa_number: document.getElementById('storeEP').value.trim(),
            jazzcash_number: document.getElementById('storeJC').value.trim(),
            shipping_charge: Number(document.getElementById('storeShip').value || 250),
            discount_percent: Number(document.getElementById('storeDiscount').value || 0)
        };
        try { await PV.saveSettings(updated); PV.showToast('Store settings saved successfully!'); }
        catch (err) { PV.showToast(err.message, 'error'); }
    });

    // PHP & MySQL Backend Handlers
    const phpBadge = document.getElementById('phpStatusBadge');
    const phpFeedback = document.getElementById('phpFeedback');
    const phpApiInput = document.getElementById('phpApiUrl');

    async function checkPhpStatus() {
        if (!window.WV_PHP) {
            phpBadge.className = 'badge bg-secondary';
            phpBadge.textContent = 'PHP Bridge Not Loaded';
            return;
        }

        const customUrl = localStorage.getItem('WV_PHP_API_URL');
        if (customUrl) phpApiInput.value = customUrl;

        phpBadge.className = 'badge bg-warning text-dark';
        phpBadge.textContent = 'Pinging MySQL...';

        const ok = await window.WV_PHP.checkHealth();
        if (ok) {
            phpBadge.className = 'badge bg-success';
            phpBadge.textContent = '🟢 Connected to MySQL';
        } else {
            phpBadge.className = 'badge bg-secondary';
            phpBadge.textContent = '⚪ MySQL / PHP Server Offline';
        }
    }

    setTimeout(checkPhpStatus, 600);

    document.getElementById('phpForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const url = phpApiInput.value.trim();
        if (window.WV_PHP) {
            window.WV_PHP.setBaseUrl(url);
            phpFeedback.innerHTML = '<span class="text-info">Testing endpoint...</span>';
            const ok = await window.WV_PHP.checkHealth();
            if (ok) {
                phpBadge.className = 'badge bg-success';
                phpBadge.textContent = '🟢 Connected to MySQL';
                phpFeedback.innerHTML = '<span class="text-success">✔ PHP & MySQL API connected successfully!</span>';
                PV.showToast('PHP API Connected!');
            } else {
                phpBadge.className = 'badge bg-secondary';
                phpBadge.textContent = '⚪ Offline / Error';
                phpFeedback.innerHTML = '<span class="text-danger">✖ Could not reach API or MySQL. Check Apache & MySQL in XAMPP.</span>';
            }
        }
    });

    document.getElementById('btnTestPhp').addEventListener('click', async () => {
        if (!window.WV_PHP) return;
        phpFeedback.innerHTML = '<span class="text-info">Testing connection to PHP API & MySQL...</span>';
        const ok = await window.WV_PHP.checkHealth();
        if (ok) {
            phpBadge.className = 'badge bg-success';
            phpBadge.textContent = '🟢 Connected to MySQL';
            phpFeedback.innerHTML = '<span class="text-success">✔ Connection active! MySQL database is responding.</span>';
            PV.showToast('MySQL Connection Verified!');
        } else {
            phpBadge.className = 'badge bg-secondary';
            phpBadge.textContent = '⚪ Offline';
            phpFeedback.innerHTML = '<span class="text-danger">✖ Unable to reach MySQL. Make sure Apache & MySQL are started in XAMPP.</span>';
        }
    });

    document.getElementById('btnResetPhp').addEventListener('click', () => {
        localStorage.removeItem('WV_PHP_API_URL');
        phpApiInput.value = '';
        checkPhpStatus();
        phpFeedback.innerHTML = '<span class="text-info">Reset to default auto-detected path.</span>';
    });
});
</script>
</body>
</html>
