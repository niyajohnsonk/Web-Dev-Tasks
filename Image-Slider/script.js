$(document).ready(function(){
    let current=0;
    const slides=$('.slide');
    let slideInterval;

    slides.eq(current).fadeIn();

    function showSlide(index){
        slides.eq(current).fadeOut(function(){
            current=index;
            if (current>=slides.length) current=0;
            if (current<0) current=slides.length-1;
            slides.eq(current).fadeIn();
        })
    }

    function nextSlide(){
        showSlide(current+1);
    }

    function prevSlide(){
        showSlide(current-1);
    }

    function startSlider(){
        slideInterval=setInterval(nextSlide,3000);
    }

    function stopSlider(){
        clearInterval(slideInterval);
    }

    $('.next').click(function(){
        stopSlider();
        nextSlide();
        startSlider();
    });

    $('.prev').click(function(){
        stopSlider();
        prevSlide();
        startSlider();
    });

    $('.slider').hover(stopSlider,startSlider);

    startSlider();

});