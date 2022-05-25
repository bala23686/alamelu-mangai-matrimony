//========= Category Slider
tns({
    container: ".category-slider",
    items: 3,
    slideBy: "page",
    autoplay: false,
    mouseDrag: true,
    gutter: 0,
    nav: false,
    controls: true,
    controlsText: [
        '<i class="lni lni-chevron-left"></i>',
        '<i class="lni lni-chevron-right"></i>',
    ],
    responsive: {
        0: {
            items: 1,
        },
        540: {
            items: 2,
        },
        768: {
            items: 4,
        },
        992: {
            items: 5,
        },
        1170: {
            items: 6,
        },
    },
});
tns({
    container: ".category-slider-1",
    items: 3,
    slideBy: "page",
    autoplay: false,
    mouseDrag: true,
    gutter: 0,
    nav: false,
    controls: true,
    controlsText: [
        '<i class="lni lni-chevron-left"></i>',
        '<i class="lni lni-chevron-right"></i>',
    ],
    responsive: {
        0: {
            items: 1,
        },
        540: {
            items: 2,
        },
        768: {
            items: 4,
        },
        992: {
            items: 5,
        },
        1170: {
            items: 6,
        },
    },
});
//========= testimonial
tns({
    container: ".testimonial-slider",
    items: 3,
    slideBy: "page",
    autoplay: false,
    mouseDrag: true,
    gutter: 0,
    nav: true,
    controls: false,
    controlsText: [
        '<i class="lni lni-arrow-left"></i>',
        '<i class="lni lni-arrow-right"></i>',
    ],
    responsive: {
        0: {
            items: 1,
        },
        540: {
            items: 1,
        },
        768: {
            items: 2,
        },
        992: {
            items: 2,
        },
        1170: {
            items: 2,
        },
    },
});

//====== Clients Logo Slider
tns({
    container: ".client-logo-carousel",
    slideBy: "page",
    autoplay: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    gutter: 15,
    nav: false,
    controls: false,
    responsive: {
        0: {
            items: 1,
        },
        540: {
            items: 3,
        },
        768: {
            items: 4,
        },
        992: {
            items: 4,
        },
        1170: {
            items: 6,
        },
    },
});

//========= glightbox
GLightbox({
    href: "https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM",
    type: "video",
    source: "youtube", //vimeo, youtube or local
    width: 900,
    autoplayVideos: true,
});

const current = document.getElementById("current");
const opacity = 0.6;
const imgs = document.querySelectorAll(".img");
imgs.forEach((img) => {
    img.addEventListener("click", (e) => {
        //reset opacity
        imgs.forEach((img) => {
            img.style.opacity = 1;
        });
        current.src = e.target.src;
        //adding class
        //current.classList.add("fade-in");
        //opacity
        e.target.style.opacity = opacity;
    });
});

// let colors = {
//     "--primary-color": "blue",
//     '--bs-primary': 'blue'
// }

// function color(colors) {
//     var bodyStyles = document.body.style;
//     for (const key in colors) {
//         bodyStyles.setProperty(key, colors[key]);
//     }

// };

// color(colors);
