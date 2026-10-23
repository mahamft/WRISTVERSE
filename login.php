<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Admin Login | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container">
        <a class='navbar-brand brand brand-image' href='../index.php'><img src="../assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
    </div>
</nav>

<main>
    <section class="section-pad">
        <div class="container auth-wrap">
            <form id="adminLoginForm" class="form-panel auth-card">
                <div class="eyebrow">RESTRICTED ACCESS</div>
                <h1>Admin <span class="gradient-text">Portal</span></h1>
                <p class="muted">Sign in to manage store products, inventory, and customer orders.</p>
                <div id="errorBox" class="alert alert-danger d-none"></div>

                <label class="form-label" for="adminEmail">Admin Email</label>
                <input class="form-control mb-3" id="adminEmail" type="email" required value="admin@wristverse.pk">

                <label class="form-label" for="adminPass">Password</label>
                <input class="form-control mb-4" id="adminPass" type="password" required autocomplete="current-password">

                <button class="btn btn-neon w-100">Access Dashboard</button>
                <p class="muted small mt-3">First-run credentials: <code>admin@wristverse.pk</code> / <code>Admin@12345</code></p>
            </form>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/store.js"></script>
<script>
(async () => {
    await PV.ready;
    const current = PV.getCurrentUser();
    if (current && current.role === 'admin') { window.location.replace('index.php'); return; }
    document.getElementById('adminLoginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const err = document.getElementById('errorBox');
        err.classList.add('d-none');
        const user = await PV.login(document.getElementById('adminEmail').value.trim(), document.getElementById('adminPass').value);
        if (user && user.role === 'admin') window.location.replace('index.php');
        else {
            if (user) await PV.logout();
            err.textContent = 'Invalid administrator credentials.';
            err.classList.remove('d-none');
        }
    });
})();
</script>
</body>
</html>
