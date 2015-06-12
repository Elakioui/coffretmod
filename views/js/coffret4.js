$(document).ready(function() {
    if (!!$.prototype.bxSlider)
        $('.bxslider-hometabs').bxSlider({
            minSlides: 1,
            maxSlides: 8,
            slideWidth: 270,
            slideMargin: 10,
            pager: false,
            controls: true,
            nextText: 'Next',
            prevText: 'Prev',
            moveSlides:2,
            infiniteLoop:false,
            hideControlOnEnd: false
        });
    alert('dddd');
});