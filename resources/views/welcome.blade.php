<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMA's GIFTS & TOYS | Thoughtful Gifts & Joyful Toys</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#FF6B57', // Warm Coral
                            primaryHover: '#E85542',
                            secondary: '#FFF3EE',
                            amber: '#FFB800',
                            sage: '#4E9F8E',
                            sageLight: '#EBF5F3',
                            dark: '#1E293B',
                            muted: '#64748B',
                            bg: '#FAF8F5',
                            card: '#FFFFFF',
                            border: '#E2E8F0'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'sans-serif'],
                        body: ['Inter', 'sans-serif'],
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(30, 41, 59, 0.05)',
                        'hover': '0 12px 30px -4px rgba(255, 107, 87, 0.15)',
                        'floating': '0 20px 40px -10px rgba(0,0,0,0.12)'
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background-color: #FAF8F5;
            color: #1E293B;
            font-family: 'Plus Jakarta Sans', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .view-section {
            display: none;
            opacity: 0;
            transition: opacity 0.25s ease-in-out;
        }
        .view-section.active {
            display: block;
            opacity: 1;
        }
        .badge-pulse {
            animation: pulse-ring 2s infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 107, 87, 0.4); }
            70% { transform: scale(1); box-shadow: 0 0 0 8px rgba(255, 107, 87, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(255, 107, 87, 0); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between antialiased selection:bg-brand-primary selection:text-white">

            @include('partials.announcement-bar')
<!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

            @include('partials.header')
<main class="flex-grow">
        @include('partials.frontend.home')
        @include('partials.frontend.shop')
        @include('partials.frontend.product-details')
        @include('partials.frontend.cart')
        @include('partials.frontend.checkout')
        @include('partials.frontend.confirmation')
        @include('partials.frontend.about')
        @include('partials.frontend.faq')
        @include('partials.frontend.contact')
</main>
        @include('partials.cart-drawer')
        @include('partials.footer')
    <script src="{{ asset('js/storefront.js') }}"></script>
</body>
</html>