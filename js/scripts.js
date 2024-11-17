/*!
* Start Bootstrap - Freelancer v7.0.7 (https://startbootstrap.com/theme/freelancer)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-freelancer/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    // Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    }


    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});


// Hy! You can really help me if you donate me leastways 1 dollor :)
// -_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-


var mouse = {
        X: 0,
        Y: 0,
        CX: 0,
        CY: 0
    },
    block = {
        X: mouse.X,
        Y: mouse.Y,
        CX: mouse.CX,
        CY: mouse.CY
    },
    imags = [
        'img/gallery9.jpg',
        'img/gallery6.jpg',
        'img/gallery4.jpg',
        'img/gallery3.jpg',
        'img/gallery5.jpg',
        'img/gallery2.jpg',
        'img/gallery7.jpg',
        'img/gallery8.jpg',
        'img/gallery1.jpg',
    ];

$('.block').on('mousemove', function (e) {
    mouse.X = (e.pageX - $(this).offset().left) - $('.block').width() / 2;
    mouse.Y = (e.pageY - $(this).offset().top) - $('.block').height() / 2;
})

$('.block').on('mouseleave', function (e) {
    mouse.X = mouse.CX;
    mouse.Y = mouse.CY;
})

setInterval(function () {

    block.CY += (mouse.Y - block.CY) / 12;
    block.CX += (mouse.X - block.CX) / 12;

    $('.block .circleLight').css('background', 'radial-gradient(circle at ' + mouse.X + 'px ' + mouse.Y + 'px, #fff, transparent)')
    $('.block').css({
        transform: 'scale(1.03) translate(' + (block.CX * 0.05) + 'px, ' + (block.CY * 0.05) + 'px) rotateX(' + (block.CY * 0.05) + 'deg) rotateY(' + (block.CX * 0.05) + 'deg)'
    })

}, 20);

$('.gallery-slider .item').each(function (i) {

    if (i == 0) {

        $(this).addClass('active');
        $(this).next().addClass('next');
        $(this).prev().addClass('prev');
    }

    $(this).attr('id', 'slide-' + i);

    $(this).prepend(
        $('<div>', {class: 'blur', style: 'background-image: url(' + imags[i] + ');'}),
        $('<div>', {class: 'bg', style: 'background-image: url(' + imags[i] + ');'})
    )

    $(this).find('.block').css('background-image', 'url(' + imags[i] + ')')

    $('.navigations .dots').append(
        $('<li>', {class: i == 0 ? 'active' : '', id: i}).on('click', function () {
            var cSlide = $('.gallery-slider #slide-' + $(this).attr('id'));

            $('.navigations .dots li').removeClass('active');
            $(this).addClass('active');

            $('.gallery-slider .item').removeClass('active prev next');
            cSlide.addClass('active');
            cSlide.next().addClass('next');
            cSlide.prev().addClass('prev');
        })
    )
})
