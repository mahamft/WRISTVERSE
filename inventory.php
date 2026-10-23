<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Inventory Management | WRISTVERSE Admin</title>
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
                <a class='active' href='inventory.php'>▤ Inventory</a>
                <a href='orders.php'>⇄ Orders</a>
                <a href='customers.php'>👥 Customers</a>
                <a href='profit-loss.php'>⌁ Profit & Loss</a>
                <a href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="eyebrow">STOCK CONTROL</div>
                <h1>Inventory <span class="gradient-text">Management</span></h1>
                <p>Monitor warehouse quantities and execute manual stock adjustments.</p>

                <div class="dashboard-panel mt-4">
                    <h3>Adjust Stock Level</h3>
                    <form id="stockForm" class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label" for="stockProduct">Select Product</label>
                            <select id="stockProduct" class="form-select" required></select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="stockDelta">Quantity Change (+ / -)</label>
                            <input id="stockDelta" type="number" class="form-control" required placeholder="+10 or -5">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="stockReason">Adjustment Reason</label>
                            <input id="stockReason" class="form-control" value="Manual inventory count">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-neon">Apply Stock Adjustment</button>
                        </div>
                    </form>
                </div>

                <div class="dashboard-panel mt-4">
                    <h3>Current Inventory Levels</h3>
                    <div class="table-responsive">
                        <table class="table pv-table">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Current Units</th>
                                    <th>Stock Status</th>
                                </tr>
                            </thead>
                            <tbody id="stockTableBody">
                                <!-- Rendered dynamically -->
                            </tbody>
                        </table>
                    </div>
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

    const select = document.getElementById('stockProduct');
    const tbody = document.getElementById('stockTableBody');

    function renderStock() {
        const products = PV.getProducts(true);

        select.innerHTML = products.map(p => `
            <option value="${p.id}">${p.name} (Current: ${p.stock})</option>
        `).join('');

        tbody.innerHTML = products.map(p => `
            <tr>
                <td><b>${p.name}</b></td>
                <td>${p.category || 'General'}</td>
                <td><b>${p.stock} units</b></td>
                <td>
                    <span class="status-pill ${p.stock < 5 ? 'warning' : ''}">
                        ${p.stock < 5 ? (p.stock === 0 ? 'Out of stock' : 'Low stock') : 'In stock'}
                    </span>
                </td>
            </tr>
        `).join('');
    }

    document.getElementById('stockForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const prodId = Number(select.value);
        const delta = Number(document.getElementById('stockDelta').value);
        const p = PV.getProduct(prodId);

        if (p) {
            const newStock = Math.max(0, Number(p.stock) + delta);
            try {
                await PV.saveProduct({ id: p.id, stock: newStock });
                document.getElementById('stockDelta').value = '';
                renderStock();
                PV.showToast(`Updated stock for ${p.name} to ${newStock} units.`);
            } catch (err) { PV.showToast(err.message, 'error'); }
        }
    });

    renderStock();
});
</script>
</body>
</html>
