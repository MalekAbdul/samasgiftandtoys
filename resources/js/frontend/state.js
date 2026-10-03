const catalogNode = document.getElementById('product-catalog');
export const products = JSON.parse(catalogNode?.textContent ?? '[]');

if (!Array.isArray(products)) {
    throw new TypeError('The storefront product catalog must be a JSON array.');
}

const productById = new Map(products.map((product) => [Number(product.id), product]));
export const findProduct = (id) => productById.get(Number(id));
export const formatPrice = (value) => `$${Number(value).toFixed(2)}`;

function readArray(key, validate) {
    try {
        const stored = localStorage.getItem(key);
        if (stored === null) return [];

        const parsed = JSON.parse(stored);
        if (!Array.isArray(parsed)) throw new TypeError(`${key} must contain an array.`);

        return parsed.filter(validate);
    } catch (error) {
        console.error(`Unable to read storefront data from ${key}.`, error);
        return [];
    }
}

function writeArray(key, value) {
    try {
        localStorage.setItem(key, JSON.stringify(value));
    } catch (error) {
        console.error(`Unable to save storefront data to ${key}.`, error);
    }
}

export const state = {
    cart: readArray('samasgift.cart.v1', (item) => (
        Number.isInteger(Number(item?.id))
        && productById.has(Number(item.id))
        && Number.isInteger(Number(item.qty))
        && Number(item.qty) > 0
    )).map((item) => ({ id: Number(item.id), qty: Number(item.qty) })),
    wishlist: readArray('samasgift.wishlist.v1', (id) => (
        Number.isInteger(Number(id)) && productById.has(Number(id))
    )).map(Number),
    searchQuery: '',
    couponApplied: false,
};

export function saveCart() {
    writeArray('samasgift.cart.v1', state.cart);
}

export function saveWishlist() {
    writeArray('samasgift.wishlist.v1', state.wishlist);
}

export function showToast(message) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'bg-slate-900 text-white font-semibold text-xs px-4 py-3 rounded-2xl shadow-floating flex items-center gap-2 border border-slate-800 transition-all transform translate-y-2 pointer-events-auto';

    const icon = document.createElement('i');
    icon.className = 'fa-solid fa-sparkles text-brand-primary';
    icon.setAttribute('aria-hidden', 'true');

    const text = document.createElement('span');
    text.textContent = message;
    toast.append(icon, text);
    container.append(toast);

    window.setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        window.setTimeout(() => toast.remove(), 300);
    }, 2500);
}
