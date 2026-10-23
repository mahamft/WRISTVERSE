<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Customer Orders | WRISTVERSE Admin</title>
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
                <a class='active' href='orders.php'>⇄ Orders</a>
                <a href='customers.php'>👥 Customers</a>
                <a href='profit-loss.php'>⌁ Profit & Loss</a>
                <a href='settings.php'>⚙ Settings</a>
                <a href="javascript:void(0)" onclick="PV.logout().finally(()=>window.location.replace('login.php'));">↪ Logout</a>
            </aside>

            <div class="admin-content">
                <div class="eyebrow">ORDER MANAGEMENT</div>
                <h1>Customer <span class="gradient-text">Orders</span></h1>
                <p>Track, fulfill, and update delivery status for nationwide customer orders.</p>

                <div class="dashboard-panel mt-4">
                    <div class="table-responsive">
                        <table class="table pv-table">
                            <thead>
                                <tr>
                                    <th>Order Reference / Customer</th>
                                    <th>Items Ordered</th>
                                    <th>Payment</th>
                                    <th>Total Amount</th>
                                    <th>Update Status / Tracking</th>
                                </tr>
                            </thead>
                            <tbody id="ordersTableBody">
                                <!-- Rendered dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal to view payment screenshot -->
    <div class="modal fade" id="proofModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background:#0c0b09; border:1px solid #d7ad5b; color:#fff;">
                <div class="modal-header" style="border-bottom:1px solid rgba(215,173,91,0.2);">
                    <h5 class="modal-title" id="proofModalTitle" style="color:#d7ad5b; font-size:16px;">Payment Screenshot Proof</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-3">
                    <div id="proofModalTid" class="mb-2 text-warning font-monospace" style="font-size:13px;"></div>
                    <img id="proofModalImg" src="" alt="Proof" style="max-width:100%; max-height:480px; object-fit:contain; border-radius:8px; border:1px solid rgba(255,255,255,0.1); box-shadow:0 8px 30px rgba(0,0,0,0.6);">
                </div>
                <div class="modal-footer" style="border-top:1px solid rgba(215,173,91,0.2);">
                    <button type="button" class="btn btn-sm btn-outline-glow" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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

    const tbody = document.getElementById('ordersTableBody');

    function renderOrders() {
        const orders = PV.getOrders();
        if (orders.length === 0) {
            tbody.innerHTML = '<tr><td colspan="5" class="text-center py-4 text-muted">No orders received yet.</td></tr>';
            return;
        }

        tbody.innerHTML = orders.map(o => `
            <tr>
                <td>
                    <b>${o.order_number}</b>
                    <small class="d-block text-white">${o.customer_name} · ${o.phone}</small>
                    <small class="d-block muted">${o.address}, ${o.city}</small>
                    <small class="d-block text-secondary mt-1">${o.created_at || ''}</small>
                </td>
                <td>
                    ${(o.items || []).map(i => `<small class="d-block text-white">• ${i.name} (x${i.qty})</small>`).join('')}
                </td>
                <td>
                    <span class="badge bg-dark border border-secondary">${(o.payment_method || 'cod').toUpperCase()}</span>
                    <small class="d-block muted mt-1">${o.payment_status || 'Unpaid'}</small>
                    ${o.transaction_id ? `<small class="d-block text-warning mt-1" style="font-size:10px;">TID: <b>${o.transaction_id}</b></small>` : ''}
                    ${o.payment_proof ? `
                        <button type="button" class="btn btn-mini btn-outline-glow mt-2 w-100" onclick="showProofModal('${o.order_number}')">
                            📸 View Screenshot
                        </button>
                    ` : ''}
                </td>
                <td>
                    <b>${PV.formatMoney(o.total)}</b>
                </td>
                <td>
                    <div class="order-edit">
                        <select id="status_${o.id}" class="form-select form-select-sm mb-2">
                            ${['Pending', 'Confirmed', 'Processing', 'Dispatched', 'Delivered', 'Cancelled'].map(st => `
                                <option value="${st}" ${o.status === st ? 'selected' : ''}>${st}</option>
                            `).join('')}
                        </select>
                        <input id="tracking_${o.id}" class="form-control form-control-sm mb-2" placeholder="TCS Tracking number" value="${o.tracking_number || ''}">
                        <button class="btn btn-neon btn-sm w-100" onclick="saveOrder(${o.id})">Save Update</button>
                    </div>
                </td>
            </tr>
        `).join('');
    }

    window.showProofModal = function (orderNumber) {
        const orders = PV.getOrders();
        const o = orders.find(x => x.order_number === orderNumber);
        if (!o || !o.payment_proof) return;
        document.getElementById('proofModalTitle').textContent = 'Payment Proof: ' + o.order_number;
        document.getElementById('proofModalTid').textContent = o.transaction_id ? ('Transaction Ref / TID: ' + o.transaction_id) : 'No TID provided';
        document.getElementById('proofModalImg').src = o.payment_proof.startsWith('http') ? o.payment_proof : '../' + o.payment_proof;
        const modal = new bootstrap.Modal(document.getElementById('proofModal'));
        modal.show();
    };

    window.saveOrder = async function (id) {
        const status = document.getElementById(`status_${id}`).value;
        const tracking = document.getElementById(`tracking_${id}`).value.trim();
        try {
            await PV.updateOrderStatus(id, status, tracking);
            renderOrders();
            PV.showToast('Order details updated!');
        } catch (err) { PV.showToast(err.message, 'error'); }
    };

    renderOrders();
});
</script>
</body>
</html>
