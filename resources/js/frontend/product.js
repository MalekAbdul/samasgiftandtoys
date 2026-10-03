import { state } from './state';

const featuredOrder = new WeakMap();

function filterProducts() {
    const section = document.getElementById('view-shop');
    const grid = document.getElementById('shop-products-grid');
    if (!section || !grid) return;

    const cards = Array.from(grid.querySelectorAll('.product-card'));
    cards.forEach((card, index) => {
        if (!featuredOrder.has(card)) featuredOrder.set(card, index);
    });
    const category = section.dataset.selectedCategory ?? 'all';
    const maxPrice = Number(document.getElementById('price-range-input')?.value ?? 100);
    const ageGroups = Array.from(document.querySelectorAll('[data-age-filter]:checked')).map((input) => input.value);
    const search = state.searchQuery;

    const visibleCards = cards.filter((card) => {
        const cardCategory = card.dataset.category;
        const matchesCategory = category === 'all'
            || cardCategory === category
            || (category === 'sale' && card.dataset.sale === 'true')
            || (category === 'baby' && card.dataset.ageGroup === '0-2')
            || (category === 'wishlist' && state.wishlist.includes(Number(card.dataset.productId)));
        const matchesPrice = Number(card.dataset.price) <= maxPrice;
        const matchesAge = ageGroups.length === 0 || ageGroups.includes(card.dataset.ageGroup);
        const matchesSearch = card.dataset.title.toLowerCase().includes(search);

        card.hidden = !(matchesCategory && matchesPrice && matchesAge && matchesSearch);
        return !card.hidden;
    });

    const sort = document.getElementById('shop-sort-select')?.value;
    if (sort === 'featured') {
        visibleCards.sort((left, right) => featuredOrder.get(left) - featuredOrder.get(right));
        visibleCards.forEach((card) => grid.append(card));
    } else if (sort) {
        visibleCards.sort((left, right) => {
            if (sort === 'price-low') return Number(left.dataset.price) - Number(right.dataset.price);
            if (sort === 'price-high') return Number(right.dataset.price) - Number(left.dataset.price);
            if (sort === 'rating') return Number(right.dataset.rating) - Number(left.dataset.rating);
            return 0;
        });
        visibleCards.forEach((card) => grid.append(card));
    }

    const count = document.getElementById('shop-product-count');
    const emptyState = document.getElementById('shop-empty-state');
    const breadcrumb = document.getElementById('shop-breadcrumb-category');
    const categoryNames = {
        all: 'Shop All Products',
        toys: 'Toys & Playsets',
        gifts: 'Gifts & Celebrations',
        plush: 'Plush & Dolls',
        stem: 'Educational & STEM',
        games: 'Games & Puzzles',
        baby: 'Baby & Toddler',
        sale: 'Sale & Clearance',
        wishlist: 'Wishlist',
    };
    if (count) count.textContent = String(visibleCards.length);
    if (breadcrumb) breadcrumb.textContent = categoryNames[category] ?? 'Filtered Collection';
    emptyState?.classList.toggle('hidden', visibleCards.length > 0);
}

function resetFilters() {
    const section = document.getElementById('view-shop');
    if (!section) return;

    section.dataset.selectedCategory = 'all';
    document.querySelector('input[name="shop-category"][value="all"]').checked = true;
    document.getElementById('price-range-input').value = '100';
    document.getElementById('price-range-value').textContent = '$100';
    document.querySelectorAll('[data-age-filter]').forEach((input) => { input.checked = false; });
    document.getElementById('shop-sort-select').value = 'featured';
    state.searchQuery = '';
    document.querySelectorAll('[data-search-input]').forEach((input) => { input.value = ''; });
    document.querySelectorAll('#search-results-dropdown, #mobile-search-results-dropdown')
        .forEach((dropdown) => dropdown.classList.add('hidden'));
    filterProducts();
}

document.addEventListener('change', (event) => {
    if (event.target.matches('[data-category-filter]')) {
        const section = document.getElementById('view-shop');
        if (section) {
            section.dataset.selectedCategory = event.target.value;
            filterProducts();
        }
    }

    if (event.target.matches('[data-age-filter], [data-sort-products]')) filterProducts();
});

document.addEventListener('input', (event) => {
    if (event.target.matches('[data-price-filter]')) {
        const value = document.getElementById('price-range-value');
        if (value) value.textContent = `$${event.target.value}`;
        filterProducts();
    }
});

document.addEventListener('click', (event) => {
    if (event.target.closest('[data-reset-filters]')) resetFilters();

    const quantityButton = event.target.closest('[data-quantity-change]');
    if (quantityButton) {
        const detail = quantityButton.closest('[data-product-detail]');
        const display = detail?.querySelector('[data-quantity-value]');
        if (display) display.textContent = String(Math.max(1, Number(display.textContent) + Number(quantityButton.dataset.quantityChange)));
    }

    const thumbnail = event.target.closest('[data-product-thumbnail]');
    if (thumbnail) {
        const image = document.getElementById('detail-main-image');
        if (image) image.src = thumbnail.dataset.productThumbnail;
    }
});

window.addEventListener('storefront:search-changed', filterProducts);
window.addEventListener('storefront:wishlist-changed', filterProducts);
document.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementById('view-shop');
    if (!section) return;
    state.searchQuery = (section.dataset.searchQuery ?? '').trim().toLowerCase();
    filterProducts();
});
