document.querySelectorAll('[data-banner-slider]').forEach((slider) => {
    const slides = Array.from(slider.querySelectorAll('.banner-slide'));
    if (slides.length < 2) return;

    let activeIndex = slides.findIndex((slide) => slide.classList.contains('opacity-100'));
    if (activeIndex < 0) activeIndex = 0;

    const showSlide = (index) => {
        slides.forEach((slide, slideIndex) => {
            const active = slideIndex === index;
            slide.classList.toggle('opacity-100', active);
            slide.classList.toggle('opacity-0', !active);
            slide.setAttribute('aria-hidden', String(!active));
        });
        activeIndex = index;
    };

    showSlide(activeIndex);

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const preloadNextSlide = () => {
        slides[(activeIndex + 1) % slides.length].loading = 'eager';
    };
    preloadNextSlide();

    window.setInterval(() => {
        showSlide((activeIndex + 1) % slides.length);
        preloadNextSlide();
    }, 5000);
});
