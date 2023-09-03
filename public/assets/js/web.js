// Loading
const lodaing = document.querySelector('.wrap-loader');
const body = document.querySelector('.body');
window.addEventListener('load',function(){ 
    // setTimeout(()=>{
        lodaing.style.display='none'
        body.style. overflowY= "scroll";
    // },5000);
});

// upbox
var upIcont = document.querySelector('.upbox');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 10) {
        upIcont.style.right = "10px";
    } else {
        upIcont.style.right = "-100px";
    }
});

// paralax
        let layer_1 = document.querySelector('.layer-1');
        let layer_2 = document.querySelector('.layer-2');
        let layer_3 = document.querySelector('.layer-3');
        let layer_4 = document.querySelector('.layer-4');
        let layer_5 = document.querySelector('.layer-5');
        let layer_6 = document.querySelector('.layer-6');

        window.onscroll = function(){
            let Y = window.scrollY;

            layer_1.style.transform = 'translateY('+ Y/2 +'px)';
            layer_2.style.transform = 'translateY('+ 0 +'px)';
            layer_3.style.transform = 'translateY('+ Y/1.5 +'px)';
            layer_4.style.transform = 'translateY('+ Y/2 +'px)';
            layer_5.style.transform = 'translateY('+ Y/3 +'px)';
            layer_6.style.transform = 'translateY('+ 0 +'px)';
        }

// caroucel

var carouselWidth = $('.carousel-inner')[0].scrollWidth;
var cardWidth = $('.carousel-item').width();
var scrollPosition = 0;
console.log(cardWidth)
$('.carousel-control-next').on('click', function() {
    if (scrollPosition < (carouselWidth - (cardWidth * 4))) {
        console.log('next');
        scrollPosition = scrollPosition + cardWidth;
        $('.carousel-inner').animate({
                scrollLeft: scrollPosition
            },
            600);
    }
});
$('.carousel-control-prev').on('click', function() {
    if (scrollPosition > 0) {
        console.log('prev');
        scrollPosition = scrollPosition - cardWidth;
        $('.carousel-inner').animate({
                scrollLeft: scrollPosition
            },
            600);
    }
});

