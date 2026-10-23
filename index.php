<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Admin Dashboard | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container-fluid px-4">
        <a class='navbar-brand brand brand-image' href='../index.php'><img src="../assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <a class='btn btn-outline-glow btn-sm' href='../index.php' target='_blank'>View Store ↗</a>
            <button id="logoutBtn" class="btn btn-sm btn-neon">Logout</button>
        </div>
    </div>
</nav>

<main>
    <section class="section-pad">
        <div class="container-fluid admin-layout">
            <aside class="admin-sidebar">
                <div class="eyebrow">CONTROL CENTER</div>
                <a class='active' href='index.php'>▦ Dashboard</a>
                <a href='products.php'>◇ Products</a>
                <a href='inventory.php'>▤ Inventory</a>
                <a href='orders.php'>⇄ Orders</a>
                <a href='customers.php'>👥 Customers</a>
                <a href='profit-loss.php'>⌁ Profit & Loss</a>
                <a href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="section-heading">
                    <div>
                        <div class="eyebrow">OVERVIEW</div>
                        <h1>Admin <span class="gradient-text">Dashboard</span></h1>
                        <p>Welcome back, <span id="adminName">Administrator</span>. Here is your live business snapshot.</p>
                    </div>
                    <a class='btn btn-neon' href='products.php'>+ Add Product</a>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <span>Total Orders</span>
                        <b id="statOrders">0</b>
                        <small>All customer records</small>
                    </div>
                    <div class="stat-card">
                        <span>Total Revenue</span>
                        <b id="statRevenue">Rs. 0.00</b>
                        <small>Completed & Pending</small>
                    </div>
                    <a href="customers.php" class="stat-card text-decoration-none">
                        <span>Registered Users</span>
                        <b id="statCustomers">0</b>
                        <small>Manage customer accounts ↗</small>
                    </a>
                    <div class="stat-card">
                        <span>Active Products</span>
                        <b id="statProducts">0</b>
                        <small id="statPending">0 pending orders</small>
                    </div>
                </div>

                <div class="row g-4 mt-1">
                    <div class="col-xl-7">
                        <div class="dashboard-panel">
                            <h3>Revenue Overview</h3>
                            <canvas id="salesChart" height="130"></canvas>
                        </div>
                    </div>

                    <div class="col-xl-5">
                        <div class="dashboard-panel">
                            <h3>Quick Actions</h3>
                            <div class="quick-actions">
                                <a href='products.php'>＋ Add or edit products</a>
                                <a href='inventory.php'>▤ Update inventory & stock</a>
                                <a href='orders.php'>⇄ Manage customer orders</a>
                                <a href='profit-loss.php'>⌁ Record operating expenses</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="dashboard-panel">
                            <div class="section-heading">
                                <h3>Recent Customer Orders</h3>
                                <a class='text-link' href='orders.php'>View all ↗</a>
                            </div>

                            <div class="table-responsive">
                                <table class="table pv-table">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Customer</th>
                                            <th>Payment</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="recentOrdersBody">
                                        <!-- Rendered dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/store.js"></script>
<script>
document.addEventListener('DOMContentLoaded', async () => {
    await PV.ready;
    const u = PV.getCurrentUser();
    if (!u || u.role !== 'admin') {
        window.location.replace('login.php');
        return;
    }
    document.getElementById('adminName').textContent = u.name;

    document.getElementById('logoutBtn').addEventListener('click', async () => {
        await PV.logout();
        window.location.replace('login.php');
    });

    const orders = PV.getOrders();
    const products = PV.getProducts(true);
    const users = PV.getUsers();

    const revenue = orders.filter(o => o.status !== 'Cancelled').reduce((sum, o) => sum + Number(o.total || 0), 0);
    const pendingCount = orders.filter(o => o.status === 'Pending').length;

    document.getElementById('statOrders').textContent = orders.length;
    document.getElementById('statRevenue').textContent = PV.formatMoney(revenue);
    document.getElementById('statCustomers').textContent = users.length;
    document.getElementById('statProducts').textContent = products.filter(p => p.active !== 0).length;
    document.getElementById('statPending').textContent = `${pendingCount} pending orders`;

    const recentBody = document.getElementById('recentOrdersBody');
    if (orders.length === 0) {
        recentBody.innerHTML = '<tr><td colspan="5" class="text-center py-4 text-muted">No orders placed yet.</td></tr>';
    } else {
        recentBody.innerHTML = orders.slice(0, 6).map(o => `
            <tr>
                <td><b>${o.order_number}</b></td>
                <td>${o.customer_name} <small class="text-muted d-block">${o.phone}</small></td>
                <td>${(o.payment_method || 'cod').toUpperCase()}</td>
                <td><b>${PV.formatMoney(o.total)}</b></td>
                <td><span class="status-pill">${o.status}</span></td>
            </tr>
        `).join('');
    }

    // Chart.js Revenue Trend
    const ctx = document.getElementById('salesChart');
    const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    const revValues = [4500, 7200, 3100, 8900, 6400, 11200, revenue > 0 ? revenue : 5400];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: days,
            datasets: [{
                label: 'Revenue (Rs.)',
                data: revValues,
                tension: 0.35,
                fill: true,
                borderColor: '#00c8ff',
                backgroundColor: 'rgba(0, 200, 255, 0.12)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { labels: { color: '#dceeff' } }
            },
            scales: {
                x: { ticks: { color: '#9bb4ca' }, grid: { color: 'rgba(100, 160, 200, 0.1)' } },
                y: { ticks: { color: '#9bb4ca' }, grid: { color: 'rgba(100, 160, 200, 0.1)' } }
            }
        }
    });
});
</script>
</body>
</html>
