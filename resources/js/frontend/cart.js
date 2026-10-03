import { findProduct, formatPrice, products, saveCart, showToast, state } from './state';

const subtotal = () => state.cart.reduce((sum, item) => {
    const product = findProduct(item.id);
    return sum + (product ? product.price * item.qty : 0);
}, 0);

function createElement(tag, className, text) {
    const element = document.createElement(tag);
    if (className) element.className = className;
    if (text !== undefined) element.textContent = text;
    return element;
}

function renderDrawer() {
    const container = document.getElementById('cart-drawer-items');
    const total = document.getElementById('drawer-subtotal');
    if (!container || !total) return;

    container.replaceChildren();
    if (state.cart.length === 0) {
        container.append(createElement('p', 'text-center text-slate-400 text-xs py-8', 'Your shopping cart is empty.'));
    } else {
        state.cart.forEach((item) => {
            const product = findProduct(item.id);
            if (!product) return;

            const row = createElement('div', 'flex gap-3 py-3 items-center');
            const image = createElement('img', 'w-14 h-14 rounded-xl object-cover border border-slate-100');
            image.src = product.image;
            image.alt = '';

            const info = createElement('div', 'flex-1');
            info.append(
                createElement('h3', 'font-bold text-xs text-slate-800 line-clamp-1', product.title),
                createElement('span', 'text-xs text-slate-500 font-semibold', `${formatPrice(product.price)} x ${item.qty}`),
            );

            const remove = createElement('button', 'text-slate-400 hover:text-rose-500 text-xs p-1');
            remove.type = 'button';
            remove.dataset.removeFromCart = String(product.id);
            remove.setAttribute('aria-label', `Remove ${product.title} from cart`);
            remove.innerHTML = '<i class="fa-solid fa-trash" aria-hidden="true"></i>';
            row.append(image, info, remove);
            container.append(row);
        });
    }
    total.textContent = formatPrice(subtotal());
}

function renderCartPage() {
    const container = document.getElementById('cart-page-items-container');
    if (!container) return;

    container.replaceChildren();
    if (state.cart.length === 0) {
        const empty = createElement('p', 'text-center text-slate-500 py-12 font-bold', 'Your cart is currently empty.');
        const browse = createElement('a', 'block mt-3 text-center text-brand-primary underline text-sm', 'Explore the shop');
        browse.href = container.dataset.shopUrl;
        container.append(empty, browse);
    } else {
        state.cart.forEach((item) => {
            const product = findProduct(item.id);
            if (!product) return;

            const row = createElement('div', 'py-4 flex flex-col sm:flex-row items-center justify-between gap-4');
            const productInfo = createElement('div', 'flex items-center gap-4 w-full sm:w-auto');
            const link = createElement('a');
            link.href = product.url;
            const image = createElement('img', 'w-16 h-16 rounded-2xl object-cover border border-slate-100');
            image.src = product.image;
            image.alt = '';
            link.append(image);
            const text = createElement('div');
            const title = createElement('a', 'font-bold text-slate-900 text-sm', product.title);
            title.href = product.url;
            const sku = createElement('span', 'block text-xs text-slate-500', `SKU: ${product.specs.sku}`);
            text.append(title, sku);
            productInfo.append(link, text);

            const actions = createElement('div', 'flex items-center gap-6 justify-between w-full sm:w-auto');
            actions.append(createElement('span', 'font-extrabold text-slate-900 text-sm', formatPrice(product.price)));
            const quantity = createElement('div', 'flex items-center border rounded-xl overflow-hidden bg-slate-50');
            const decrease = createElement('button', 'px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs', '−');
            decrease.type = 'button';
            decrease.dataset.cartQuantity = '-1';
            decrease.dataset.productId = String(product.id);
            decrease.setAttribute('aria-label', `Decrease ${product.title} quantity`);
            const count = createElement('span', 'px-3 text-xs font-bold', String(item.qty));
            const increase = createElement('button', 'px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs', '+');
            increase.type = 'button';
            increase.dataset.cartQuantity = '1';
            increase.dataset.productId = String(product.id);
            increase.setAttribute('aria-label', `Increase ${product.title} quantity`);
            quantity.append(decrease, count, increase);

            const lineTotal = createElement('span', 'font-extrabold text-brand-primary text-sm', formatPrice(product.price * item.qty));
            const remove = createElement('button', 'text-slate-400 hover:text-rose-500');
            remove.type = 'button';
            remove.dataset.removeFromCart = String(product.id);
            remove.setAttribute('aria-label', `Remove ${product.title} from cart`);
            remove.innerHTML = '<i class="fa-solid fa-trash-can text-sm" aria-hidden="true"></i>';
            actions.append(quantity, lineTotal, remove);
            row.append(productInfo, actions);
            container.append(row);
        });
    }

    const value = subtotal();
    const discount = state.couponApplied ? value * 0.1 : 0;
    const tax = (value - discount) * 0.08;
    document.getElementById('cart-summary-subtotal').textContent = formatPrice(value);
    document.getElementById('cart-summary-tax').textContent = formatPrice(tax);
    document.getElementById('cart-summary-total').textContent = formatPrice(value - discount + tax);

    const discountRow = document.getElementById('promo-applied-row');
    if (discountRow) discountRow.classList.toggle('hidden', !state.couponApplied);
    const discountValue = document.getElementById('cart-summary-discount');
    if (discountValue) discountValue.textContent = `-${formatPrice(discount)}`;

    const progress = Math.min(100, (value / 50) * 100);
    const bar = document.getElementById('free-shipping-bar');
    const message = document.getElementById('free-shipping-msg');
    if (bar) bar.style.width = `${progress}%`;
    if (message) message.textContent = value >= 50
        ? 'Free USA shipping threshold reached in this preview.'
        : `${formatPrice(50 - value)} more to reach the demo free-shipping threshold.`;
}

function renderCheckoutSummary() {
    const container = document.getElementById('checkout-items-summary');
    if (!container) return;

    container.replaceChildren();
    state.cart.forEach((item) => {
        const product = findProduct(item.id);
        if (!product) return;
        const row = createElement('div', 'py-2.5 flex justify-between items-center text-xs');
        const info = createElement('div', 'flex items-center gap-2');
        info.append(
            createElement('span', 'font-bold text-slate-800', `${item.qty}x`),
            createElement('span', 'text-slate-600 line-clamp-1', product.title),
        );
        row.append(info, createElement('span', 'font-bold text-slate-900', formatPrice(product.price * item.qty)));
        container.append(row);
    });

    const value = subtotal();
    const tax = value * 0.08;
    document.getElementById('checkout-subtotal').textContent = formatPrice(value);
    document.getElementById('checkout-tax').textContent = formatPrice(tax);
    document.getElementById('checkout-total').textContent = formatPrice(value + tax);
}

export function refreshCart() {
    const count = state.cart.reduce((sum, item) => sum + item.qty, 0);
    const badge = document.getElementById('header-cart-badge');
    if (badge) badge.textContent = String(count);

    renderDrawer();
    renderCartPage();
    renderCheckoutSummary();
}

function addToCart(productId, qty = 1) {
    const product = findProduct(productId);
    if (!product || !Number.isInteger(qty) || qty < 1) return;

    const item = state.cart.find((cartItem) => cartItem.id === product.id);
    if (item) item.qty += qty;
    else state.cart.push({ id: product.id, qty });

    saveCart();
    refreshCart();
    showToast(`Added ${qty}x "${product.title}" to cart!`);
}

document.addEventListener('click', (event) => {
    const addButton = event.target.closest('[data-add-to-cart]');
    if (addButton) {
        addToCart(Number(addButton.dataset.addToCart));
        return;
    }

    const detailAdd = event.target.closest('[data-add-detail-to-cart]');
    if (detailAdd) {
        const detail = detailAdd.closest('[data-product-detail]');
        const qty = Number(detail?.querySelector('[data-quantity-value]')?.textContent ?? '1');
        addToCart(Number(detail?.dataset.productDetail), qty);
        return;
    }

    const buyNow = event.target.closest('[data-buy-now]');
    if (buyNow) {
        const detail = buyNow.closest('[data-product-detail]');
        const qty = Number(detail?.querySelector('[data-quantity-value]')?.textContent ?? '1');
        addToCart(Number(detail?.dataset.productDetail), qty);
        return;
    }

    const removeButton = event.target.closest('[data-remove-from-cart]');
    if (removeButton) {
        state.cart = state.cart.filter((item) => item.id !== Number(removeButton.dataset.removeFromCart));
        saveCart();
        refreshCart();
        return;
    }

    const quantityButton = event.target.closest('[data-cart-quantity]');
    if (quantityButton) {
        const id = Number(quantityButton.dataset.productId);
        const item = state.cart.find((cartItem) => cartItem.id === id);
        if (!item) return;
        item.qty += Number(quantityButton.dataset.cartQuantity);
        if (item.qty <= 0) state.cart = state.cart.filter((cartItem) => cartItem.id !== id);
        saveCart();
        refreshCart();
    }

    if (event.target.closest('[data-apply-promo]')) {
        const input = document.getElementById('promo-input');
        if (input?.value.trim().toUpperCase() === 'SAMAGIFT') {
            state.couponApplied = true;
            showToast('10% demo discount applied.');
        } else {
            state.couponApplied = false;
            showToast('Invalid promo code. Try SAMAGIFT.');
        }
        renderCartPage();
    }
});

document.addEventListener('DOMContentLoaded', refreshCart);
