<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../assets/images/wristverse-emblem.png">
    <title>Create Account | WRISTVERSE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="topline"></div>
<nav class="navbar navbar-expand-lg navbar-dark pv-nav sticky-top">
    <div class="container">
        <a class='navbar-brand brand brand-image' href='../index.php'><img src="../assets/images/wristverse-wordmark.png?v=2" alt="WRISTVERSE"></a>
        <div class="collapse navbar-collapse" id="pvNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
                <li class="nav-item"><a class='nav-link' href='../index.php'>Home</a></li>
                <li class="nav-item"><a class='nav-link' href='../shop.php'>Shop</a></li>
                <li class="nav-item"><a class='nav-link' href='../track-order.php'>Track Order</a></li>
                <li class="nav-item"><a class='nav-link' href='../contact.php'>Contact</a></li>
                <li class="nav-item">
                    <a class='nav-link cart-link' href='../cart.php'>
                        Cart <span class="cart-count">0</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <section class="section-pad auth-bg">
        <div class="container auth-wrap">
            <form id="registerForm" class="form-panel auth-card">
                <div class="eyebrow">JOIN WRISTVERSE</div>
                <h1>Create <span class="gradient-text">Account</span></h1>
                <div id="errorBox" class="alert alert-danger d-none"></div>

                <label class="form-label" for="regName">Full Name</label>
                <input class="form-control mb-3" id="regName" required placeholder="e.g. Ali Ahmed">

                <label class="form-label" for="regEmail">Email Address</label>
                <input class="form-control mb-3" id="regEmail" type="email" required placeholder="name@example.com">

                <label class="form-label" for="regPass">Password (minimum 6 characters)</label>
                <input class="form-control mb-4" id="regPass" type="password" minlength="6" required>

                <button class="btn btn-neon w-100">Create Account</button>
                <p class="muted mt-3">Already registered? <a href='login.php'>Log in</a></p>
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
    if (current) { window.location.replace(current.role === 'admin' ? '../admin/index.php' : 'index.php'); return; }
    document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const err = document.getElementById('errorBox'); err.classList.add('d-none');
        const res = await PV.register(document.getElementById('regName').value.trim(), document.getElementById('regEmail').value.trim(), document.getElementById('regPass').value);
        if (res.error) { err.textContent = res.error; err.classList.remove('d-none'); }
        else window.location.replace('index.php');
    });
})();
</script>
</body>
</html>
