# WRISTVERSE — PHP + MySQL Full-Stack Store

WRISTVERSE is a real XAMPP-ready full-stack e-commerce project built with **HTML, CSS, Vanilla JavaScript, PHP 8+ and MySQL/MariaDB**.

The MySQL database is authoritative for products, users, orders, stock, settings and expenses. Browser `localStorage` is used only for the shopping cart and an optional custom API URL; it is **not** used as the product/order/customer database.

## Main Features

- MySQL-backed product catalogue and inventory
- Secure PHP session login for customers and administrators
- Passwords stored with `password_hash()` / verified with `password_verify()`
- CSRF protection for state-changing requests
- Admin-only APIs for products, customers, orders, settings and expenses
- Server-side order totals, discounts and shipping calculations
- Transaction + stock locking during checkout
- Product image uploads to `watches/uploads/products/`
- Payment-proof uploads to `watches/uploads/payment-proofs/`
- Customer account with MySQL-backed order history
- Public order tracking without exposing the full delivery address
- Admin password change screen
- Non-destructive database installer/migrator

## XAMPP Setup

1. Extract/copy the project folder into:

   `C:\xampp\htdocs\wristverse`

2. Open XAMPP Control Panel and start **Apache** and **MySQL**.

3. Open this URL once:

   `http://localhost/wristverse/backend/install.php`

   The installer creates/verifies the `wristverse` database, creates missing tables/columns and seeds the initial products/settings without deleting existing orders or customers.

   You can alternatively import `database.sql` in phpMyAdmin.

4. Open the storefront:

   `http://localhost/wristverse/`

5. Admin login:

   - URL: `http://localhost/wristverse/watches/admin/login.php`
   - Email: `admin@wristverse.pk`
   - First-run password: `Admin@12345`

6. After first login, go to **Admin → Settings → Administrator Security** and change the default password.

## Database Configuration

Default XAMPP settings are in `backend/config/db.php`:

- Host: `127.0.0.1`
- Port: `3306`
- Database: `wristverse`
- User: `root`
- Password: empty

For another server, set environment variables `DB_HOST`, `DB_PORT`, `DB_NAME`, `DB_USER`, and `DB_PASS`, or edit `backend/config/db.php`.

## Important Hosting Note

This version requires a PHP + MySQL server. **GitHub Pages cannot execute PHP or MySQL**, so do not use GitHub Pages as the production host for this full-stack build. Use XAMPP locally or PHP hosting/cPanel for deployment.

## Project Structure

```text
wristverse/
├── index.php
├── database.sql
├── backend/
│   ├── install.php
│   ├── config/
│   │   ├── db.php
│   │   ├── cors.php
│   │   └── security.php
│   └── api/
│       ├── auth.php
│       ├── products.php
│       ├── orders.php
│       ├── settings.php
│       └── expenses.php
└── watches/
    ├── index.php
    ├── shop.php
    ├── product.php
    ├── cart.php
    ├── checkout.php
    ├── track-order.php
    ├── order-success.php
    ├── account/
    ├── admin/
    ├── assets/
    │   ├── css/
    │   ├── images/
    │   └── js/
    │       ├── php-client.js
    │       └── store.js
    └── uploads/
        ├── products/
        └── payment-proofs/
```

## Data Ownership

| Data | Storage |
|---|---|
| Products / inventory | MySQL |
| Users / admin | MySQL + PHP session |
| Orders / order items | MySQL |
| Store settings | MySQL |
| Expenses | MySQL |
| Product images | Server filesystem + MySQL path |
| Payment proof | Server filesystem + MySQL path |
| Shopping cart | Browser localStorage |

**WRISTVERSE — Time Beyond Limits.**

## PHP Page Structure

All browser pages in this XAMPP build use `.php` extensions. There are no `.html` page files. Examples:

- `/index.php`
- `/watches/index.php`
- `/watches/shop.php`
- `/watches/product.php?id=1`
- `/watches/cart.php`
- `/watches/checkout.php`
- `/watches/account/login.php`
- `/watches/admin/login.php`
- `/watches/admin/index.php`

CSS and JavaScript remain normal `.css` and `.js` asset files. Backend APIs remain PHP under `/backend/api/`.
