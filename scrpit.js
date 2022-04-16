$('.clients-carousel').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 4000,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    smartSpeed: 1100,
    margin: 30,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        991: {
            items: 2
        },
        1200: {
            items: 2
        },
        1920: {
            items: 2
        }
    }
});
$('.slide-carousel').owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    autoplayTimeout: 4000,
    animateOut: 'fadeOut',
    animateIn: 'easeIn',
    smartSpeed: 1500,
    margin:  546,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        991: {
            items: 2
        },
        1200: {
            items: 2
        },
        1920: {
            items: 2
        }
    }
});