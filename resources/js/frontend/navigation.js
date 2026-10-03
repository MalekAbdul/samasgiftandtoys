import { showToast } from './state';

function setExpanded(element, expanded) {
    element.setAttribute('aria-expanded', String(expanded));
}

function toggleCart() {
    const drawer = document.getElementById('cart-drawer');
    const backdrop = document.getElementById('cart-drawer-backdrop');
    if (!drawer || !backdrop) return;

    const isOpen = drawer.classList.contains('translate-x-full');
    drawer.classList.toggle('translate-x-full', !isOpen);
    backdrop.classList.toggle('hidden', !isOpen);
    document.querySelectorAll('[data-action="toggle-cart"]').forEach((button) => setExpanded(button, isOpen));
}

document.addEventListener('click', async (event) => {
    const mobileLink = event.target.closest('#mobile-menu a');
    if (mobileLink) {
        document.getElementById('mobile-menu')?.classList.add('hidden');
        const toggle = document.querySelector('[data-action="toggle-mobile-menu"]');
        if (toggle) setExpanded(toggle, false);
    }

    const action = event.target.closest('[data-action], [data-copy-promo], [data-print]');
    if (!action) return;

    if (action.matches('[data-action="toggle-cart"]')) {
        toggleCart();
    } else if (action.matches('[data-action="toggle-mobile-menu"]')) {
        const menu = document.getElementById('mobile-menu');
        if (!menu) return;
        const isOpen = menu.classList.toggle('hidden') === false;
        setExpanded(action, isOpen);
    } else if (action.matches('[data-action="account"]')) {
        showToast('Account features will be available in a future update.');
    } else if (action.matches('[data-copy-promo]')) {
        try {
            await navigator.clipboard.writeText(action.dataset.copyPromo);
            showToast(`Code "${action.dataset.copyPromo}" copied to clipboard!`);
        } catch (error) {
            console.error('Unable to copy the promo code.', error);
            showToast('Unable to copy the promo code. Please copy it manually.');
        }
    } else if (action.matches('[data-print]')) {
        window.print();
    } else if (action.matches('[data-newsletter-submit]')) {
        const email = document.getElementById('newsletter-email');
        if (!email?.reportValidity()) return;
        showToast('Newsletter signup is not enabled yet.');
    }
});
