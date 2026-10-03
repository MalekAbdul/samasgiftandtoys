import { saveWishlist, showToast, state } from './state';

function renderWishlist() {
    const badge = document.getElementById('wishlist-badge');
    if (badge) badge.textContent = String(state.wishlist.length);

    document.querySelectorAll('[data-wishlist-toggle]').forEach((button) => {
        const selected = state.wishlist.includes(Number(button.dataset.wishlistToggle));
        button.setAttribute('aria-pressed', String(selected));
        button.setAttribute('aria-label', `${selected ? 'Remove' : 'Add'} product ${button.dataset.wishlistToggle} ${selected ? 'from' : 'to'} wishlist`);
        const icon = button.querySelector('i');
        icon?.classList.toggle('fa-solid', selected);
        icon?.classList.toggle('fa-regular', !selected);
        icon?.classList.toggle('text-rose-500', selected);
    });
}

document.addEventListener('click', (event) => {
    const button = event.target.closest('[data-wishlist-toggle]');
    if (!button) return;

    const id = Number(button.dataset.wishlistToggle);
    const index = state.wishlist.indexOf(id);
    if (index >= 0) {
        state.wishlist.splice(index, 1);
        showToast('Removed from Wishlist');
    } else {
        state.wishlist.push(id);
        showToast('Added to Wishlist!');
    }
    saveWishlist();
    renderWishlist();
    window.dispatchEvent(new CustomEvent('storefront:wishlist-changed'));
});

document.addEventListener('DOMContentLoaded', renderWishlist);
