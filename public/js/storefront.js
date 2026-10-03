// Product Database
        const PRODUCTS = [
            {
                id: 9,
                title: "Giant Banana Squishy Toy",
                category: "toys",
                price: 9.99,
                oldPrice: null,
                rating: 4.8,
                reviewsCount: 36,
                ageGroup: "3-5",
                badge: "NEW",
                image: "/productphoto/p1.jpeg",
                description: "A soft, stretchy banana-shaped squishy toy for stress relief and playful squeezing.",
                specs: { sku: "SAMA-109", weight: "0.5 lbs" }
            },
            {
                id: 10,
                title: "Squishy Friends Surprise Toy",
                category: "toys",
                price: 12.99,
                oldPrice: null,
                rating: 4.7,
                reviewsCount: 28,
                ageGroup: "3-5",
                badge: "NEW",
                image: "/productphoto/p2.jpeg",
                description: "A colorful assortment of character squishy toys for imaginative play and collecting.",
                specs: { sku: "SAMA-110", weight: "0.8 lbs" }
            },
            {
                id: 11,
                title: "Remote Control Sports Car",
                category: "toys",
                price: 24.99,
                oldPrice: null,
                rating: 4.8,
                reviewsCount: 42,
                ageGroup: "6-8",
                badge: "NEW",
                image: "/productphoto/p3.jpeg",
                description: "A bright red remote control car toy made for high-energy racing and pretend-play adventures.",
                specs: { sku: "SAMA-111", weight: "1.4 lbs" }
            },
            {
                id: 12,
                title: "Pretend Play Doctor Kit",
                category: "toys",
                price: 19.99,
                oldPrice: null,
                rating: 4.7,
                reviewsCount: 31,
                ageGroup: "3-5",
                badge: "NEW",
                image: "/productphoto/p4.jpeg",
                description: "A child-friendly medical play set for pretend checkups and imaginative role-play.",
                specs: { sku: "SAMA-112", weight: "1.2 lbs" }
            },
            {
                id: 13,
                title: "Mystery Squishy Dumpling",
                category: "games",
                price: 8.99,
                oldPrice: null,
                rating: 4.9,
                reviewsCount: 57,
                ageGroup: "3-5",
                badge: "POPULAR",
                image: "/productphoto/p5.jpeg",
                description: "A collectible surprise squishy dumpling with a mystery character inside.",
                specs: { sku: "SAMA-113", weight: "0.4 lbs" }
            },
            {
                id: 14,
                title: "Mystery Dumpling Collector Set",
                category: "gifts",
                price: 29.99,
                oldPrice: null,
                rating: 4.9,
                reviewsCount: 64,
                ageGroup: "3-5",
                badge: "NEW",
                image: "/productphoto/p6.jpeg",
                description: "A gift-ready collection of colorful mystery dumpling squishy toys to collect and share.",
                specs: { sku: "SAMA-114", weight: "1.0 lbs" }
            },
            {
                id: 15,
                title: "Capybara Smoosh Plush",
                category: "plush",
                price: 19.99,
                oldPrice: null,
                rating: 4.9,
                reviewsCount: 48,
                ageGroup: "3-5",
                badge: "NEW",
                image: "/productphoto/p7.jpeg",
                description: "A soft capybara-inspired plush toy with a squeezable, huggable feel.",
                specs: { sku: "SAMA-115", weight: "0.9 lbs" }
            },
            {
                id: 1,
                title: "Rainbow Plush Bear",
                category: "plush",
                price: 19.99,
                oldPrice: 24.99,
                rating: 4.9,
                reviewsCount: 84,
                ageGroup: "0-2",
                badge: "BESTSELLER",
                image: "https://images.unsplash.com/photo-1559454403-b8fb88521f11?auto=format&fit=crop&w=800&q=80",
                description: "Ultra-soft premium plush teddy bear made with hypoallergenic child-safe materials.",
                specs: { sku: "SAMA-101", weight: "0.8 lbs" }
            },
            {
                id: 2,
                title: "Musical Learning Toy Piano",
                category: "toys",
                price: 29.99,
                oldPrice: 34.99,
                rating: 4.8,
                reviewsCount: 62,
                ageGroup: "3-5",
                badge: "NEW",
                image: "https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?auto=format&fit=crop&w=800&q=80",
                description: "Interactive keyboard featuring cheerful tunes, light-up keys, and early sound learning mode.",
                specs: { sku: "SAMA-102", weight: "1.5 lbs" }
            },
            {
                id: 3,
                title: "Kids Creative Building Blocks",
                category: "stem",
                price: 34.99,
                oldPrice: 39.99,
                rating: 5.0,
                reviewsCount: 112,
                ageGroup: "6-8",
                badge: "HOT",
                image: "https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80",
                description: "120-piece wooden & colorful building set fostering spatial thinking and creativity.",
                specs: { sku: "SAMA-103", weight: "2.8 lbs" }
            },
            {
                id: 4,
                title: "Wooden Animal Puzzle Game",
                category: "stem",
                price: 14.99,
                oldPrice: 18.99,
                rating: 4.7,
                reviewsCount: 45,
                ageGroup: "3-5",
                badge: "SALE",
                image: "https://images.unsplash.com/photo-1618842676088-c4d48a6a7c9d?auto=format&fit=crop&w=800&q=80",
                description: "Hand-finished wooden puzzle with smooth edges designed for fine motor skill development.",
                specs: { sku: "SAMA-104", weight: "1.0 lbs" }
            },
            {
                id: 5,
                title: "Adorable Princess Doll & Set",
                category: "plush",
                price: 24.99,
                oldPrice: 29.99,
                rating: 4.9,
                reviewsCount: 78,
                ageGroup: "3-5",
                badge: "NEW",
                image: "https://images.unsplash.com/photo-1566576721346-d4a3b4eaeb55?auto=format&fit=crop&w=800&q=80",
                description: "Cute cloth doll with interchangeable outfits and tea party accessories.",
                specs: { sku: "SAMA-105", weight: "1.2 lbs" }
            },
            {
                id: 6,
                title: "Soft Huggable Teddy & Gift Box",
                category: "gifts",
                price: 22.99,
                oldPrice: null,
                rating: 4.8,
                reviewsCount: 51,
                ageGroup: "0-2",
                badge: "GIFT",
                image: "https://images.unsplash.com/photo-1513542789411-b6a5d4f31634?auto=format&fit=crop&w=800&q=80",
                description: "Ready-to-gift box wrapped in silk ribbon with cozy plush pal.",
                specs: { sku: "SAMA-106", weight: "1.1 lbs" }
            },
            {
                id: 7,
                title: "Junior STEM Science Kit",
                category: "stem",
                price: 39.99,
                oldPrice: 49.99,
                rating: 4.9,
                reviewsCount: 93,
                ageGroup: "9+",
                badge: "STEM",
                image: "https://images.unsplash.com/photo-1530210124550-912dc1381cb8?auto=format&fit=crop&w=800&q=80",
                description: "Safe kitchen & lab science experiments for curious young minds.",
                specs: { sku: "SAMA-107", weight: "3.0 lbs" }
            },
            {
                id: 8,
                title: "Birthday Celebration Box",
                category: "gifts",
                price: 49.99,
                oldPrice: 59.99,
                rating: 5.0,
                reviewsCount: 130,
                ageGroup: "6-8",
                badge: "POPULAR",
                image: "https://images.unsplash.com/photo-1513151233558-d860c5398176?auto=format&fit=crop&w=800&q=80",
                description: "Ultimate birthday surprise box containing party favors, toys, and greeting card.",
                specs: { sku: "SAMA-108", weight: "3.5 lbs" }
            },
        ];

        // Global Reactive State
        let state = {
            cart: [
                { id: 1, qty: 1 } // Pre-loaded item for immediate demo appeal
            ],
            wishlist: [2],
            activeView: 'home',
            activeDetailProductId: 1,
            detailQty: 1,
            appliedCoupon: null,
            filterCategory: 'all',
            filterMaxPrice: 100,
            filterAgeGroups: [],
            searchQuery: ''
        };


        // Initialize application on window load
        window.onload = function() {
            renderFeaturedHomeProducts();
            renderShopProducts();
            updateCartUI();
            document.getElementById('wishlist-badge').textContent = state.wishlist.length;
        };

        // Navigation Switcher (SPA View Switcher)
        function navigateTo(viewId) {
            // Hide all views
            document.querySelectorAll('.view-section').forEach(el => el.classList.remove('active'));
            
            // Show target view
            const target = document.getElementById(`view-${viewId}`);
            if (target) {
                target.classList.add('active');
                state.activeView = viewId;
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Sync View Specific Data
            if (viewId === 'cart') renderCartPage();
            if (viewId === 'checkout') renderCheckoutPage();
        }

        // Filter Shop Category Handler
        function filterShopCategory(cat) {
            state.filterCategory = cat;
            
            // Sync radio button if exists
            const radio = document.querySelector(`input[name="shop-category"][value="${cat}"]`);
            if (radio) radio.checked = true;

            const categoryNameMap = {
                all: "Shop All Products",
                toys: "Toys & Playsets",
                gifts: "Gifts & Celebrations",
                plush: "Plush & Dolls",
                stem: "Educational & STEM",
                games: "Games & Puzzles",
                baby: "Baby & Toddler",
                sale: "Sale & Clearance",
                wishlist: "Wishlist"
            };

            const labelEl = document.getElementById('shop-breadcrumb-category');
            if (labelEl) labelEl.textContent = categoryNameMap[cat] || "Filtered Collection";

            renderShopProducts();
            navigateTo('shop');
        }

        // Render Home Featured Products
        function renderFeaturedHomeProducts() {
            const container = document.getElementById('home-featured-grid');
            if (!container) return;

            const featured = PRODUCTS.slice(0, 4);
            container.innerHTML = featured.map(p => createProductCardHTML(p)).join('');
        }

        // Render Shop Page Products
        function renderShopProducts() {
            const container = document.getElementById('shop-products-grid');
            if (!container) return;

            let filtered = PRODUCTS.filter(p => {
                const matchCat = state.filterCategory === 'all'
                    || p.category === state.filterCategory
                    || (state.filterCategory === 'sale' && p.badge === 'SALE')
                    || (state.filterCategory === 'games' && /game|puzzle/i.test(p.title))
                    || (state.filterCategory === 'baby' && p.ageGroup === '0-2')
                    || (state.filterCategory === 'wishlist' && state.wishlist.includes(p.id));
                const matchPrice = p.price <= state.filterMaxPrice;
                const matchSearch = p.title.toLowerCase().includes(state.searchQuery.toLowerCase());
                const matchAge = state.filterAgeGroups.length === 0 || state.filterAgeGroups.includes(p.ageGroup);
                return matchCat && matchPrice && matchSearch && matchAge;
            });

            const sortOrder = document.getElementById('shop-sort-select')?.value || 'featured';
            const sorters = {
                'price-low': (a, b) => a.price - b.price,
                'price-high': (a, b) => b.price - a.price,
                rating: (a, b) => b.rating - a.rating
            };
            if (sorters[sortOrder]) filtered.sort(sorters[sortOrder]);

            document.getElementById('shop-product-count').textContent = filtered.length;

            if (filtered.length === 0) {
                container.innerHTML = `
                    <div class="col-span-full py-12 text-center text-slate-500">
                        <i class="fa-solid fa-gift text-4xl mb-3 text-slate-300"></i>
                        <p class="font-bold">No products found matching your filters.</p>
                        <button onclick="resetShopFilters()" class="mt-3 text-xs text-brand-primary underline font-bold">Reset Filters</button>
                    </div>
                `;
                return;
            }

            container.innerHTML = filtered.map(p => createProductCardHTML(p)).join('');
        }

        function applyShopFilters() {
            state.filterAgeGroups = Array.from(document.querySelectorAll('#view-shop input[type="checkbox"]:checked'))
                .map(input => input.value);
            renderShopProducts();
        }

        // Reusable HTML Generator for Product Cards (Matches Blade partial structure)
        function createProductCardHTML(p) {
            return `
                <div class="group bg-white rounded-2xl border border-slate-200/80 hover:border-brand-primary/40 p-4 shadow-soft hover:shadow-hover transition-all flex flex-col justify-between relative">
                    <span class="absolute top-6 left-6 z-10 bg-brand-primary text-white font-extrabold text-[10px] px-2.5 py-0.5 rounded-full uppercase shadow-xs">${p.badge}</span>
                    
                    <button onclick="toggleWishlist(${p.id})" class="absolute top-6 right-6 z-10 w-8 h-8 rounded-full bg-white/80 backdrop-blur-xs text-slate-400 hover:text-rose-500 flex items-center justify-center shadow-xs transition">
                        <i class="fa-${state.wishlist.includes(p.id) ? 'solid text-rose-500' : 'regular'} fa-heart text-xs"></i>
                    </button>

                    <div onclick="openProductDetail(${p.id})" class="cursor-pointer">
                        <div class="rounded-xl overflow-hidden bg-slate-50 mb-3 aspect-square relative">
                            <img src="${p.image}" alt="${p.title}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        
                        <div class="flex items-center gap-1 text-amber-400 text-xs mb-1">
                            <i class="fa-solid fa-star"></i>
                            <span class="font-bold text-slate-800 text-[11px]">${p.rating}</span>
                            <span class="text-slate-400 text-[10px]">(${p.reviewsCount})</span>
                        </div>

                        <h3 class="font-bold text-slate-900 text-sm group-hover:text-brand-primary transition line-clamp-1">${p.title}</h3>
                    </div>

                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-slate-100">
                        <div>
                            <span class="font-extrabold text-slate-900 text-base">$${p.price.toFixed(2)}</span>
                            ${p.oldPrice ? `<span class="text-xs text-slate-400 line-through ml-1.5 font-semibold">$${p.oldPrice.toFixed(2)}</span>` : ''}
                        </div>
                        <button onclick="addToCart(${p.id})" class="bg-brand-primary hover:bg-brand-primaryHover text-white text-xs font-bold px-3.5 py-2 rounded-xl shadow-xs transition flex items-center gap-1.5">
                            <i class="fa-solid fa-cart-plus"></i> Add
                        </button>
                    </div>
                </div>
            `;
        }


        // Product Details View Opener
        function openProductDetail(productId) {
            const product = PRODUCTS.find(p => p.id === productId);
            if (!product) return;

            state.activeDetailProductId = productId;
            state.detailQty = 1;

            document.getElementById('detail-breadcrumb-title').textContent = product.title;
            document.getElementById('detail-title').textContent = product.title;
            document.getElementById('detail-category-tag').textContent = product.category;
            document.getElementById('detail-main-image').src = product.image;
            document.getElementById('detail-price').textContent = `$${product.price.toFixed(2)}`;
            document.getElementById('detail-old-price').textContent = product.oldPrice ? `$${product.oldPrice.toFixed(2)}` : '';
            document.getElementById('detail-description').textContent = product.description;
            document.getElementById('detail-sku-spec').textContent = product.specs.sku;
            document.getElementById('detail-age-spec').textContent = `${product.ageGroup} Years`;
            document.getElementById('detail-qty-val').textContent = 1;

            // Rating Stars
            document.getElementById('detail-rating-stars').innerHTML = Array(5).fill('<i class="fa-solid fa-star"></i>').join('');

            // Thumbnails
            const thumbs = document.getElementById('detail-thumbnails-container');
            thumbs.innerHTML = [product.image, product.image, product.image, product.image].map((img, i) => `
                <img src="${img}" onclick="document.getElementById('detail-main-image').src='${img}'" class="rounded-xl border border-slate-200 cursor-pointer object-cover h-16 w-full hover:border-brand-primary transition">
            `).join('');

            navigateTo('product-details');
        }

        // Adjust Detail Qty
        function adjustDetailQty(delta) {
            state.detailQty = Math.max(1, state.detailQty + delta);
            document.getElementById('detail-qty-val').textContent = state.detailQty;
        }

        function addDetailToCart() {
            addToCart(state.activeDetailProductId, state.detailQty);
        }

        function buyNowFromDetails() {
            addToCart(state.activeDetailProductId, state.detailQty);
            navigateTo('checkout');
        }

        // Add to Cart Logic
        function addToCart(productId, qty = 1) {
            const existing = state.cart.find(item => item.id === productId);
            if (existing) {
                existing.qty += qty;
            } else {
                state.cart.push({ id: productId, qty });
            }
            updateCartUI();
            const product = PRODUCTS.find(p => p.id === productId);
            showToast(`Added ${qty}x "${product.title}" to cart!`);
        }

        // Update Global Cart UI
        function updateCartUI() {
            const totalQty = state.cart.reduce((sum, item) => sum + item.qty, 0);
            document.getElementById('header-cart-badge').textContent = totalQty;

            // Render Cart Drawer
            const drawerContainer = document.getElementById('cart-drawer-items');
            if (drawerContainer) {
                if (state.cart.length === 0) {
                    drawerContainer.innerHTML = '<p class="text-center text-slate-400 text-xs py-8">Your shopping cart is empty.</p>';
                } else {
                    drawerContainer.innerHTML = state.cart.map(item => {
                        const p = PRODUCTS.find(prod => prod.id === item.id);
                        return `
                            <div class="flex gap-3 py-3 items-center">
                                <img src="${p.image}" class="w-14 h-14 rounded-xl object-cover border border-slate-100">
                                <div class="flex-1">
                                    <h4 class="font-bold text-xs text-slate-800 line-clamp-1">${p.title}</h4>
                                    <span class="text-xs text-slate-500 font-semibold">$${p.price.toFixed(2)} x ${item.qty}</span>
                                </div>
                                <button onclick="removeFromCart(${p.id})" class="text-slate-400 hover:text-rose-500 text-xs p-1"><i class="fa-solid fa-trash"></i></button>
                            </div>
                        `;
                    }).join('');
                }
            }

            // Subtotals
            const subtotal = calculateSubtotal();
            document.getElementById('drawer-subtotal').textContent = `$${subtotal.toFixed(2)}`;
        }

        function removeFromCart(productId) {
            state.cart = state.cart.filter(item => item.id !== productId);
            updateCartUI();
            if (state.activeView === 'cart') renderCartPage();
        }

        function calculateSubtotal() {
            return state.cart.reduce((sum, item) => {
                const p = PRODUCTS.find(prod => prod.id === item.id);
                return sum + (p.price * item.qty);
            }, 0);
        }

        // Render Cart Page
        function renderCartPage() {
            const container = document.getElementById('cart-page-items-container');
            if (!container) return;

            if (state.cart.length === 0) {
                container.innerHTML = '<p class="text-center text-slate-500 py-12 font-bold">Your cart is currently empty.</p>';
            } else {
                container.innerHTML = state.cart.map(item => {
                    const p = PRODUCTS.find(prod => prod.id === item.id);
                    return `
                        <div class="py-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                            <div class="flex items-center gap-4 w-full sm:w-auto">
                                <img src="${p.image}" class="w-16 h-16 rounded-2xl object-cover border border-slate-100">
                                <div>
                                    <h3 class="font-bold text-slate-900 text-sm">${p.title}</h3>
                                    <span class="text-xs text-slate-500">SKU: ${p.specs.sku}</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-6 justify-between w-full sm:w-auto">
                                <span class="font-extrabold text-slate-900 text-sm">$${p.price.toFixed(2)}</span>
                                <div class="flex items-center border rounded-xl overflow-hidden bg-slate-50">
                                    <button onclick="updateCartItemQty(${p.id}, -1)" class="px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs"><i class="fa-solid fa-minus"></i></button>
                                    <span class="px-3 text-xs font-bold">${item.qty}</span>
                                    <button onclick="updateCartItemQty(${p.id}, 1)" class="px-2.5 py-1 text-slate-600 hover:bg-slate-200 text-xs"><i class="fa-solid fa-plus"></i></button>
                                </div>
                                <span class="font-extrabold text-brand-primary text-sm">$${(p.price * item.qty).toFixed(2)}</span>
                                <button onclick="removeFromCart(${p.id})" class="text-slate-400 hover:text-rose-500"><i class="fa-solid fa-trash-can text-sm"></i></button>
                            </div>
                        </div>
                    `;
                }).join('');
            }

            // Summary calculations
            const subtotal = calculateSubtotal();
            const discount = state.appliedCoupon ? subtotal * (state.appliedCoupon.discountPercent / 100) : 0;
            const tax = (subtotal - discount) * 0.08;
            const total = (subtotal - discount) + tax;

            document.getElementById('cart-summary-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('cart-summary-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('cart-summary-total').textContent = `$${total.toFixed(2)}`;

            // Free Shipping Progress Bar
            const threshold = 50;
            const progress = Math.min(100, (subtotal / threshold) * 100);
            document.getElementById('free-shipping-bar').style.width = `${progress}%`;
            
            const msgEl = document.getElementById('free-shipping-msg');
            if (subtotal >= threshold) {
                msgEl.innerHTML = '<i class="fa-solid fa-circle-check text-emerald-600 mr-1"></i> You qualify for FREE USA Shipping!';
            } else {
                msgEl.textContent = `Add $${(threshold - subtotal).toFixed(2)} more to unlock FREE Shipping!`;
            }
        }

        function updateCartItemQty(productId, delta) {
            const item = state.cart.find(i => i.id === productId);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    removeFromCart(productId);
                } else {
                    updateCartUI();
                    renderCartPage();
                }
            }
        }

        // Apply Promo Code
        function applyPromoCode() {
            const val = document.getElementById('promo-input').value.trim().toUpperCase();
            if (val === 'SAMAGIFT') {
                state.appliedCoupon = { code: 'SAMAGIFT', discountPercent: 10 };
                document.getElementById('promo-applied-row').classList.remove('hidden');
                showToast('10% Discount applied successfully!');
                renderCartPage();
            } else {
                showToast('Invalid Promo Code. Try SAMAGIFT');
            }
        }


        // Render Checkout Page
        function renderCheckoutPage() {
            const container = document.getElementById('checkout-items-summary');
            if (!container) return;

            container.innerHTML = state.cart.map(item => {
                const p = PRODUCTS.find(prod => prod.id === item.id);
                return `
                    <div class="py-2.5 flex justify-between items-center text-xs">
                        <div class="flex items-center gap-2">
                            <span class="font-bold text-slate-800">${item.qty}x</span>
                            <span class="text-slate-600 line-clamp-1">${p.title}</span>
                        </div>
                        <span class="font-bold text-slate-900">$${(p.price * item.qty).toFixed(2)}</span>
                    </div>
                `;
            }).join('');

            const subtotal = calculateSubtotal();
            const tax = subtotal * 0.08;
            const total = subtotal + tax;

            document.getElementById('checkout-subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('checkout-tax').textContent = `$${tax.toFixed(2)}`;
            document.getElementById('checkout-total').textContent = `$${total.toFixed(2)}`;
        }

        // Handle Order Placement
        function handlePlaceOrder(e) {
            e.preventDefault();
            if (state.cart.length === 0) {
                showToast('Your cart is empty!');
                return;
            }

            const randNum = Math.floor(10000 + Math.random() * 90000);
            document.getElementById('confirm-order-number').textContent = `#SAMA-${randNum}`;
            
            // Clear cart
            state.cart = [];
            updateCartUI();

            navigateTo('confirmation');
        }

        // Live Header Search Filter
        function handleLiveSearch(query, inputId = 'header-search-input') {
            state.searchQuery = query;
            const isMobile = inputId === 'mobile-search-input';
            const dropdownId = isMobile ? 'mobile-search-results-dropdown' : 'search-results-dropdown';
            const dropdown = document.getElementById(dropdownId);
            const content = document.getElementById(isMobile ? 'mobile-search-results-content' : 'search-results-content');
            const clearBtn = document.getElementById(isMobile ? 'mobile-search-clear' : 'header-search-clear');

            if (query.trim().length > 0) {
                clearBtn?.classList.remove('hidden');
                const matches = PRODUCTS.filter(p => p.title.toLowerCase().includes(query.toLowerCase()));
                
                if (matches.length > 0) {
                    content.innerHTML = matches.map(p => `
                        <div onclick="openProductDetail(${p.id}); document.getElementById('${dropdownId}').classList.add('hidden');" class="p-2.5 hover:bg-slate-50 cursor-pointer flex items-center gap-3">
                            <img src="${p.image}" class="w-10 h-10 rounded-lg object-cover">
                            <div class="flex-1">
                                <h4 class="text-xs font-bold text-slate-900">${p.title}</h4>
                                <span class="text-[11px] text-brand-primary font-extrabold">$${p.price.toFixed(2)}</span>
                            </div>
                        </div>
                    `).join('');
                } else {
                    content.innerHTML = '<p class="p-4 text-xs text-slate-400 text-center">No matching toys found</p>';
                }
                dropdown.classList.remove('hidden');
            } else {
                clearBtn?.classList.add('hidden');
                dropdown.classList.add('hidden');
            }

            if (state.activeView === 'shop') renderShopProducts();
        }

        function clearHeaderSearch(inputId = 'header-search-input') {
            document.getElementById(inputId).value = '';
            handleLiveSearch('', inputId);
        }

        function handleSearchSubmit(event, inputId) {
            if (event.key !== 'Enter') return;
            event.preventDefault();
            state.searchQuery = document.getElementById(inputId).value.trim();
            document.getElementById(inputId === 'mobile-search-input' ? 'mobile-search-results-dropdown' : 'search-results-dropdown').classList.add('hidden');
            state.filterMaxPrice = 100;
            state.filterAgeGroups = [];
            document.getElementById('price-range-input').value = 100;
            document.getElementById('price-range-value').textContent = '$100';
            document.querySelectorAll('#view-shop input[type="checkbox"]').forEach(input => input.checked = false);
            document.getElementById('shop-sort-select').value = 'featured';
            filterShopCategory('all');
        }

        function updatePriceFilter(val) {
            state.filterMaxPrice = parseFloat(val);
            document.getElementById('price-range-value').textContent = `$${val}`;
            renderShopProducts();
        }

        function resetShopFilters() {
            state.filterCategory = 'all';
            state.filterMaxPrice = 100;
            state.filterAgeGroups = [];
            state.searchQuery = '';
            document.getElementById('price-range-input').value = 100;
            document.getElementById('price-range-value').textContent = '$100';
            document.querySelectorAll('#view-shop input[type="checkbox"]').forEach(input => input.checked = false);
            document.getElementById('shop-sort-select').value = 'featured';
            document.getElementById('header-search-input').value = '';
            document.getElementById('mobile-search-input').value = '';
            filterShopCategory('all');
        }

        // UI Drawer Toggles
        function toggleCartDrawer() {
            const drawer = document.getElementById('cart-drawer');
            const backdrop = document.getElementById('cart-drawer-backdrop');
            drawer.classList.toggle('translate-x-full');
            backdrop.classList.toggle('hidden');
        }

        function toggleMobileMenu() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        }

        function toggleWishlist(productId) {
            const idx = state.wishlist.indexOf(productId);
            if (idx > -1) {
                state.wishlist.splice(idx, 1);
                showToast('Removed from Wishlist');
            } else {
                state.wishlist.push(productId);
                showToast('Added to Wishlist!');
            }
            document.getElementById('wishlist-badge').textContent = state.wishlist.length;
            renderShopProducts();
            renderFeaturedHomeProducts();
        }

        function copyPromoCode(code) {
            navigator.clipboard.writeText(code);
            showToast(`Code "${code}" copied to clipboard!`);
        }

        // Toast Feedback System
        function showToast(msg) {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = 'bg-slate-900 text-white font-semibold text-xs px-4 py-3 rounded-2xl shadow-floating flex items-center gap-2 border border-slate-800 transition-all transform translate-y-2 pointer-events-auto';
            toast.innerHTML = `<i class="fa-solid fa-sparkles text-brand-primary"></i> <span>${msg}</span>`;
            
            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }

        function handleNewsletterSubmit(e) {
            e.preventDefault();
            showToast('Thank you for subscribing! Check your inbox for $10 off code.');
            e.target.reset();
        }

        function showAccountModal() {
            showToast('Account Portal placeholder: Demo view ready');
        }
