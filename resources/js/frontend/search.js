import { formatPrice, products, state } from './state';

function renderResults(input) {
    const mobile = input.id === 'mobile-search-input';
    const dropdown = document.getElementById(mobile ? 'mobile-search-results-dropdown' : 'search-results-dropdown');
    const content = document.getElementById(mobile ? 'mobile-search-results-content' : 'search-results-content');
    const clear = document.getElementById(mobile ? 'mobile-search-clear' : 'header-search-clear');
    if (!dropdown || !content) return;

    const query = input.value.trim().toLowerCase();
    state.searchQuery = query;
    clear?.classList.toggle('hidden', query.length === 0);
    content.replaceChildren();

    if (!query) {
        dropdown.classList.add('hidden');
        window.dispatchEvent(new CustomEvent('storefront:search-changed'));
        return;
    }

    const matches = products.filter((product) => product.title.toLowerCase().includes(query)).slice(0, 8);
    if (matches.length === 0) {
        const empty = document.createElement('p');
        empty.className = 'p-4 text-xs text-slate-400 text-center';
        empty.textContent = 'No matching toys found';
        content.append(empty);
    } else {
        matches.forEach((product) => {
            const link = document.createElement('a');
            link.href = product.url;
            link.className = 'p-2.5 hover:bg-slate-50 cursor-pointer flex items-center gap-3';

            const image = document.createElement('img');
            image.src = product.image;
            image.alt = '';
            image.className = 'w-10 h-10 rounded-lg object-cover';

            const info = document.createElement('div');
            info.className = 'flex-1';
            const title = document.createElement('h2');
            title.className = 'text-xs font-bold text-slate-900';
            title.textContent = product.title;
            const price = document.createElement('span');
            price.className = 'text-[11px] text-brand-primary font-extrabold';
            price.textContent = formatPrice(product.price);
            info.append(title, price);
            link.append(image, info);
            content.append(link);
        });
    }
    dropdown.classList.remove('hidden');
    window.dispatchEvent(new CustomEvent('storefront:search-changed'));
}

document.addEventListener('input', (event) => {
    if (event.target.matches('[data-search-input]')) renderResults(event.target);
});

document.addEventListener('click', (event) => {
    const clear = event.target.closest('[data-clear-search]');
    if (clear) {
        const input = document.getElementById(clear.dataset.clearSearch);
        if (input) {
            input.value = '';
            renderResults(input);
            input.focus();
        }
        return;
    }

    if (!event.target.closest('#search-results-dropdown, #mobile-search-results-dropdown, [data-search-input]')) {
        document.querySelectorAll('#search-results-dropdown, #mobile-search-results-dropdown')
            .forEach((dropdown) => dropdown.classList.add('hidden'));
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key !== 'Escape') return;
    document.querySelectorAll('#search-results-dropdown, #mobile-search-results-dropdown')
        .forEach((dropdown) => dropdown.classList.add('hidden'));
});

document.addEventListener('DOMContentLoaded', () => {
    const initial = document.getElementById('header-search-input')?.value ?? '';
    state.searchQuery = initial.trim().toLowerCase();
    window.dispatchEvent(new CustomEvent('storefront:search-changed'));
});
