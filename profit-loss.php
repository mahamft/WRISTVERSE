<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Profit & Loss | WRISTVERSE Admin</title>
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
                <a class='active' href='profit-loss.php'>⌁ Profit & Loss</a>
                <a href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="eyebrow">FINANCIAL OVERVIEW</div>
                <h1>Profit & <span class="gradient-text">Loss</span></h1>
                <p>Track business revenue, inventory cost of goods sold, and operating expenses.</p>

                <div class="stats-grid mt-4">
                    <div class="stat-card">
                        <span>Net Sales (Revenue)</span>
                        <b id="statRevenue">Rs. 0.00</b>
                        <small>Total confirmed sales</small>
                    </div>
                    <div class="stat-card">
                        <span>Estimated Product Cost</span>
                        <b id="statCost">Rs. 0.00</b>
                        <small>Cost of goods sold</small>
                    </div>
                    <div class="stat-card">
                        <span>Operating Expenses</span>
                        <b id="statExpenses">Rs. 0.00</b>
                        <small>Packaging, ads, shipping</small>
                    </div>
                    <div class="stat-card">
                        <span>Net Profit / Result</span>
                        <b id="statNetResult" class="text-success">Rs. 0.00</b>
                        <small>Revenue - Cost - Expenses</small>
                    </div>
                </div>

                <div class="dashboard-panel mt-4">
                    <h3>Record Operating Expense</h3>
                    <form id="expenseForm" class="row g-3">
                        <div class="col-md-5">
                            <label class="form-label" for="expLabel">Expense Description</label>
                            <input id="expLabel" class="form-control" required placeholder="e.g. TCS packaging flyers, Meta ads, electric bill">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="expAmount">Amount (Rs.)</label>
                            <input id="expAmount" type="number" min="0" step="0.01" class="form-control" required placeholder="5000">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="expDate">Date</label>
                            <input id="expDate" type="date" class="form-control">
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-neon">Add</button>
                        </div>
                    </form>
                </div>

                <div class="dashboard-panel mt-4">
                    <h3>Recent Operating Expenses</h3>
                    <div class="table-responsive">
                        <table class="table pv-table">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id="expensesTableBody">
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

    document.getElementById('expDate').value = new Date().toISOString().slice(0, 10);
    const tbody = document.getElementById('expensesTableBody');

    function renderFinances() {
        const orders = PV.getOrders();
        const expenses = PV.getExpenses();
        const products = PV.getProducts(true);

        const revenue = orders.filter(o => o.status !== 'Cancelled').reduce((sum, o) => sum + Number(o.total || 0), 0);
        let totalCost = 0;
        orders.filter(o => o.status !== 'Cancelled').forEach(o => {
            (o.items || []).forEach(it => {
                const p = products.find(x => x.id === it.id);
                const cost = p ? Number(p.cost_price || (p.price * 0.6)) : 0;
                totalCost += cost * Number(it.qty || 1);
            });
        });

        const totalExpenses = expenses.reduce((sum, e) => sum + Number(e.amount || 0), 0);
        const netResult = revenue - totalCost - totalExpenses;

        document.getElementById('statRevenue').textContent = PV.formatMoney(revenue);
        document.getElementById('statCost').textContent = PV.formatMoney(totalCost);
        document.getElementById('statExpenses').textContent = PV.formatMoney(totalExpenses);
        document.getElementById('statNetResult').textContent = PV.formatMoney(netResult);

        if (expenses.length === 0) {
            tbody.innerHTML = '<tr><td colspan="3" class="text-center py-4 text-muted">No expenses recorded yet.</td></tr>';
            return;
        }

        tbody.innerHTML = expenses.map(e => `
            <tr>
                <td><b>${e.label}</b></td>
                <td><b>${PV.formatMoney(e.amount)}</b></td>
                <td>${e.expense_date}</td>
            </tr>
        `).join('');
    }

    document.getElementById('expenseForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const label = document.getElementById('expLabel').value.trim();
        const amount = Number(document.getElementById('expAmount').value);
        const date = document.getElementById('expDate').value;

        try {
            await PV.addExpense(label, amount, date);
            document.getElementById('expLabel').value = '';
            document.getElementById('expAmount').value = '';
            renderFinances();
            PV.showToast('Expense added successfully.');
        } catch (err) { PV.showToast(err.message, 'error'); }
    });

    renderFinances();
});
</script>
</body>
</html>
