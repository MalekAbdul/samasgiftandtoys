# SAMA'S GIFTS & TOYS

Laravel 12 storefront frontend for SAMA'S GIFTS & TOYS. The current product catalog and shopping interactions are demonstration-only; there is no product database, order storage, payment processing, inventory, or authentication.

## Local development

```sh
composer install
npm install
php artisan serve
npm run dev
```

Build production frontend assets with `npm run build`. Clear generated Laravel caches during development with `php artisan optimize:clear`.

## Frontend structure

- `app/Http/Controllers/Frontend/` contains thin page controllers.
- `resources/views/layouts/frontend.blade.php` provides shared SEO metadata, assets, and storefront chrome.
- `resources/views/components/frontend/` and `resources/views/components/home/` contain shared UI components and homepage sections.
- `resources/views/frontend/` contains one Blade view for each storefront page.
- `config/demo-catalog.php` is the replaceable sample catalog; it is not a database.
- `resources/js/frontend/` separates navigation, cart, wishlist, search, product interactions, and shared state.
- `public/images/products/` contains the local sample product photos.

The cart and wishlist are stored in browser local storage for demonstration. Checkout only displays a preview and never creates an order or processes payment.

## Planned inventory and sales lifecycle

When a future database-backed sales module is added, inventory changes must be tied to persisted sale records—not cart actions or pending orders:

- Online order: `Pending` → `Confirmed/Paid` → create a Sale → deduct inventory.
- Physical sale: create a Sale → deduct inventory.
- Purchase: record a Purchase → increase inventory.

The future implementation should persist the sale/purchase and its inventory movement atomically. No such order, payment, sale, purchase, or inventory behavior is implemented in this frontend-only project.
