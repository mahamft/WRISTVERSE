<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Manage Products | WRISTVERSE Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .product-thumb-sm {
            width: 48px;
            height: 48px;
            object-fit: contain;
            border-radius: 8px;
            background: #fff;
            padding: 4px;
        }
    </style>
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
                <a class='active' href='products.php'>◇ Products</a>
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
                        <div class="eyebrow">CATALOG MANAGEMENT</div>
                        <h1>Manage <span class="gradient-text">Products</span></h1>
                        <p>Add new accessories, set pricing, adjust stock, or upload product photos.</p>
                    </div>
                </div>

                <div class="dashboard-panel mb-4">
                    <h3 id="formTitle">Add / Edit Product</h3>
                    <form id="productForm" class="row g-3">
                        <input type="hidden" id="prodId" value="0">

                        <div class="col-md-6">
                            <label class="form-label" for="prodName">Product Name *</label>
                            <input class="form-control" id="prodName" required placeholder="e.g. WRISTVERSE Apex Pro Smart Watch">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="prodCategory">Category</label>
                            <input class="form-control" id="prodCategory" placeholder="e.g. Smart Watches, Fitness Bands, Accessories">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="prodDesc">Description</label>
                            <textarea class="form-control" id="prodDesc" rows="2" placeholder="Product features and specifications..."></textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="prodPrice">Selling Price (Rs.) *</label>
                            <input class="form-control" id="prodPrice" type="number" min="0" step="0.01" required placeholder="2499">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="prodCost">Purchase Cost Price (Rs.)</label>
                            <input class="form-control" id="prodCost" type="number" min="0" step="0.01" placeholder="1500">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label" for="prodStock">Initial Stock *</label>
                            <input class="form-control" id="prodStock" type="number" min="0" required placeholder="15">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label d-flex justify-content-between align-items-center">
                                <span><b>Product Image</b></span>
                                <small class="text-muted">Choose from PC or enter image path/URL</small>
                            </label>

                            <div class="d-flex flex-wrap gap-2 align-items-center mb-2">
                                <input type="file" id="prodFileInput" accept="image/*" class="d-none">
                                <button type="button" class="btn btn-outline-glow btn-sm" onclick="document.getElementById('prodFileInput').click()">
                                    📁 Choose File from PC
                                </button>
                                <span id="fileNameLabel" class="small text-muted">No file chosen</span>
                            </div>

                            <input class="form-control" id="prodImage" placeholder="Or enter image path: uploads/products/... or https://...">

                            <div id="imagePreviewContainer" class="mt-2 d-none align-items-center gap-3 p-2 rounded" style="background:rgba(215,173,91,0.08); border:1px solid rgba(215,173,91,0.25); width:fit-content;">
                                <img id="prodImagePreview" src="" alt="Preview" style="height:64px; width:64px; object-fit:contain; border-radius:6px; background:#0c0b09; border:1px solid var(--line); padding:4px;">
                                <div>
                                    <span class="d-block small text-white fw-bold">Image Preview</span>
                                    <button type="button" class="btn btn-mini btn-danger mt-1" onclick="clearProductImage()">Remove Image</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-neon">Save Product</button>
                            <button type="button" class="btn btn-outline-glow" onclick="resetForm()">Clear Form</button>
                        </div>
                    </form>
                </div>

                <div class="dashboard-panel">
                    <h3>Product Catalog (<span id="totalProdCount">0</span>)</h3>
                    <div class="table-responsive">
                        <table class="table pv-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="catalogTableBody">
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

    const form = document.getElementById('productForm');
    const tbody = document.getElementById('catalogTableBody');
    const totalCount = document.getElementById('totalProdCount');

    function resolveProductImg(img) {
        if (!img) return '';
        if (img.startsWith('data:') || img.startsWith('blob:') || img.startsWith('http://') || img.startsWith('https://')) {
            return img;
        }
        return '../' + img;
    }

    const fileInput = document.getElementById('prodFileInput');
    const prodImage = document.getElementById('prodImage');
    const previewContainer = document.getElementById('imagePreviewContainer');
    const previewImg = document.getElementById('prodImagePreview');
    const fileNameLabel = document.getElementById('fileNameLabel');
    let selectedProductFile = null;
    let previewObjectUrl = '';

    function updatePreview(src) {
        if (src) {
            previewImg.src = resolveProductImg(src);
            previewContainer.classList.remove('d-none');
            previewContainer.classList.add('d-flex');
        } else {
            previewContainer.classList.add('d-none');
            previewContainer.classList.remove('d-flex');
            previewImg.src = '';
        }
    }

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        if (file.size > 8 * 1024 * 1024) {
            this.value = '';
            PV.showToast('Please choose an image under 8MB', 'error');
            return;
        }
        if (!['image/jpeg','image/png','image/webp','image/gif'].includes(file.type)) {
            this.value = '';
            PV.showToast('Please choose JPG, PNG, WEBP or GIF.', 'error');
            return;
        }
        selectedProductFile = file;
        prodImage.value = '';
        fileNameLabel.textContent = file.name;
        if (previewObjectUrl) URL.revokeObjectURL(previewObjectUrl);
        previewObjectUrl = URL.createObjectURL(file);
        updatePreview(previewObjectUrl);
    });

    prodImage.addEventListener('input', function () {
        selectedProductFile = null;
        fileInput.value = '';
        const val = this.value.trim();
        if (val) {
            fileNameLabel.textContent = 'Custom URL / Path';
            updatePreview(val);
        } else {
            updatePreview('');
        }
    });

    window.clearProductImage = function () {
        prodImage.value = '';
        fileInput.value = '';
        selectedProductFile = null;
        if (previewObjectUrl) { URL.revokeObjectURL(previewObjectUrl); previewObjectUrl = ''; }
        fileNameLabel.textContent = 'No file chosen';
        updatePreview('');
    };

    function renderTable() {
        const products = PV.getProducts(true);
        totalCount.textContent = products.length;

        if (products.length === 0) {
            tbody.innerHTML = '<tr><td colspan="6" class="text-center py-4 text-muted">No products found. Add your first product above.</td></tr>';
            return;
        }

        tbody.innerHTML = products.map(p => `
            <tr>
                <td>
                    ${p.image ? `<img src="${resolveProductImg(p.image)}" class="product-thumb-sm" alt="${p.name}">` : `<span class="badge bg-secondary">No img</span>`}
                </td>
                <td>
                    <b>${p.name}</b>
                    <small class="d-block text-muted">${p.category || 'General'}</small>
                </td>
                <td><b>${p.price ? PV.formatMoney(p.price) : 'Not set'}</b></td>
                <td>${p.stock} units</td>
                <td>
                    <span class="status-pill ${p.active ? '' : 'warning'}">
                        ${p.active ? 'Active' : 'Disabled'}
                    </span>
                </td>
                <td>
                    <button class="btn btn-sm btn-outline-glow me-1" onclick="editProduct(${p.id})">Edit</button>
                    <button class="btn btn-sm ${p.active ? 'btn-danger' : 'btn-success'}" onclick="toggleStatus(${p.id})">
                        ${p.active ? 'Disable' : 'Enable'}
                    </button>
                </td>
            </tr>
        `).join('');
    }

    window.editProduct = function (id) {
        selectedProductFile = null;
        fileInput.value = '';
        const p = PV.getProduct(id);
        if (!p) return;
        document.getElementById('prodId').value = p.id;
        document.getElementById('prodName').value = p.name;
        document.getElementById('prodCategory').value = p.category || '';
        document.getElementById('prodDesc').value = p.description || '';
        document.getElementById('prodPrice').value = p.price || '';
        document.getElementById('prodCost').value = p.cost_price || '';
        document.getElementById('prodStock').value = p.stock || 0;
        document.getElementById('prodImage').value = p.image || '';
        if (p.image) {
            fileNameLabel.textContent = p.image.startsWith('data:') ? 'Attached Image' : p.image;
            updatePreview(p.image);
        } else {
            fileNameLabel.textContent = 'No file chosen';
            updatePreview('');
        }
        document.getElementById('formTitle').textContent = `Edit Product: ${p.name}`;
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    window.toggleStatus = async function (id) {
        try { await PV.toggleProduct(id); renderTable(); PV.showToast('Product status updated.'); }
        catch (err) { PV.showToast(err.message, 'error'); }
    };

    window.resetForm = function () {
        form.reset();
        document.getElementById('prodId').value = '0';
        document.getElementById('formTitle').textContent = 'Add / Edit Product';
        clearProductImage();
    };

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const data = {
            id: Number(document.getElementById('prodId').value || 0),
            name: document.getElementById('prodName').value.trim(),
            category: document.getElementById('prodCategory').value.trim(),
            description: document.getElementById('prodDesc').value.trim(),
            price: Number(document.getElementById('prodPrice').value || 0),
            cost_price: Number(document.getElementById('prodCost').value || 0),
            stock: Number(document.getElementById('prodStock').value || 0),
            image: document.getElementById('prodImage').value.trim()
        };

        try {
            await PV.saveProduct(data, selectedProductFile);
            resetForm();
            renderTable();
            PV.showToast('Product saved successfully!');
        } catch (err) { PV.showToast(err.message, 'error'); }
    });

    renderTable();
});
</script>
</body>
</html>
