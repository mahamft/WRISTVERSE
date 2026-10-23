# Full-Stack Fix Summary

This build was converted from a browser/localStorage-first demo into an XAMPP PHP + MySQL application.

## Fixed

- MySQL is authoritative for products, inventory, customers, orders, settings and expenses.
- PHP session authentication replaces browser-only admin authentication.
- Admin APIs are protected by server-side role checks.
- Passwords are hashed; legacy plaintext passwords are migrated by the installer/login flow.
- CSRF protection added to state-changing requests.
- Customer listing and full order listing are admin-only.
- Customer account loads only that customer's orders.
- Public tracking returns privacy-reduced order information.
- Checkout prices, discounts, shipping and totals are recalculated on the server.
- Stock is checked and locked inside a MySQL transaction before order creation.
- Cancelled orders restore stock; reopening checks stock before deducting it again.
- Product images are uploaded as real files, not Base64 strings in LocalStorage/MySQL.
- Easypaisa/JazzCash payment proof is uploaded as a real server file and stored by path in MySQL.
- Store settings and prepaid discount are MySQL-backed.
- Expenses/P&L data is MySQL-backed.
- Customer profile updates persist to MySQL.
- Admin password can be changed from Settings.
- Database installer is non-destructive and migrates older ZIP schema columns.
- Upload directories block executable PHP/script files through `.htaccess`.
- Old Supabase/static fallback code and Git repository metadata were removed.
- Existing `order-success.php` JavaScript syntax error was fixed.
