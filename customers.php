<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Customer Accounts | WRISTVERSE Admin</title>
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
            <button onclick="PV.logout().finally(()=>window.location.replace('login.php'));" class="btn btn-sm btn-neon">Logout</button>
        </div>
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
                <a class='active' href='customers.php'>👥 Customers</a>
                <a href='profit-loss.php'>⌁ Profit & Loss</a>
                <a href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="eyebrow">USER DATABASE</div>
                <h1>Customer <span class="gradient-text">Accounts</span></h1>
                <p>View registered customer profiles, transaction totals, and contact details.</p>

                <div class="stats-grid mb-4">
                    <div class="stat-card">
                        <span>Total Registered Users</span>
                        <b id="totalUsersCount">0</b>
                        <small>Customer logins</small>
                    </div>
                    <div class="stat-card">
                        <span>Active Buyers</span>
                        <b id="activeBuyersCount">0</b>
                        <small>Customers with orders</small>
                    </div>
                    <div class="stat-card">
                        <span>Total Customer Spend</span>
                        <b id="totalCustomerSpend">Rs. 0.00</b>
                        <small>All user order records</small>
                    </div>
                </div>

                <div class="dashboard-panel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="m-0">Registered User Accounts</h3>
                        <input id="userSearch" class="form-control" style="max-width:260px; font-size:11px;" placeholder="Search by name or email...">
                    </div>
                    <div class="table-responsive">
                        <table class="table pv-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Customer Name</th>
                                    <th>Email Address</th>
                                    <th>Role</th>
                                    <th>Orders Placed</th>
                                    <th>Total Spend</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="customersTableBody">
                                <!-- Populated dynamically -->
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
    const admin = PV.getCurrentUser();
    if (!admin || admin.role !== 'admin') {
        window.location.replace('login.php');
        return;
    }

    const users = PV.getUsers();
    const orders = PV.getOrders();

    // Render function
    function render(list) {
        const tbody = document.getElementById('customersTableBody');
        if (list.length === 0) {
            tbody.innerHTML = '<tr><td colspan="7" class="text-center py-4 text-muted">No customer accounts found.</td></tr>';
            return;
        }

        tbody.innerHTML = list.map(u => {
            const userOrders = orders.filter(o => 
                (o.email && o.email.toLowerCase() === u.email.toLowerCase()) ||
                (o.customer_name && o.customer_name.toLowerCase() === u.name.toLowerCase())
            );
            const totalSpend = userOrders.reduce((sum, o) => sum + Number(o.total || 0), 0);

            return `
                <tr>
                    <td>#${u.id}</td>
                    <td>
                        <strong style="color:#fff;">${u.name}</strong>
                        ${u.phone ? `<div style="font-size:10px; color:var(--muted);">${u.phone}</div>` : ''}
                    </td>
                    <td>${u.email}</td>
                    <td>
                        <span class="status-pill ${u.role === 'admin' ? 'border-primary text-info' : ''}">
                            ${(u.role || 'customer').toUpperCase()}
                        </span>
                    </td>
                    <td><b>${userOrders.length}</b> orders</td>
                    <td style="color:var(--cyan); font-weight:700;">${PV.formatMoney(totalSpend)}</td>
                    <td>
                        <a href="${u.phone ? `https://wa.me/${u.phone.replace(/[^0-9]/g, '').replace(/^0/, '92')}?text=Hello%20${encodeURIComponent(u.name)}` : `https://wa.me/?text=Hello%20${encodeURIComponent(u.name)}`}" target="_blank" class="btn btn-mini btn-outline-glow">WhatsApp</a>
                    </td>
                </tr>
            `;
        }).join('');
    }

    // Calculate overall stats
    let activeBuyers = 0;
    let totalSpend = 0;

    users.forEach(u => {
        const userOrders = orders.filter(o => 
            (o.email && o.email.toLowerCase() === u.email.toLowerCase()) ||
            (o.customer_name && o.customer_name.toLowerCase() === u.name.toLowerCase())
        );
        if (userOrders.length > 0) activeBuyers++;
        totalSpend += userOrders.reduce((sum, o) => sum + Number(o.total || 0), 0);
    });

    document.getElementById('totalUsersCount').textContent = users.length;
    document.getElementById('activeBuyersCount').textContent = activeBuyers;
    document.getElementById('totalCustomerSpend').textContent = PV.formatMoney(totalSpend);

    render(users);

    document.getElementById('userSearch').addEventListener('input', (e) => {
        const q = e.target.value.toLowerCase().trim();
        const filtered = users.filter(u => 
            u.name.toLowerCase().includes(q) || 
            u.email.toLowerCase().includes(q)
        );
        render(filtered);
    });
});
</script>
</body>
</html>
