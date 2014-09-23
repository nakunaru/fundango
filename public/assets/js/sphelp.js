/**
 * Created by kara_mage on 2014/09/23.
 */
$(document).ready( function() {
    var slider = $.fn.fsvs({
        speed : 5000,
        bodyID : 'fsvs-body',
        selector : '> .slide',
        mouseSwipeDisance : 40,
        afterSlide : function(){},
        beforeSlide : function(){},
        endSlide : function(){},
        mouseWheelEvents : true,
        mouseDragEvents : true,
        touchEvents : true,
        arrowKeyEvents : true,
        pagination : true,
        nthClasses : false,
        detectHash : true
    });
    //slider.slideUp();
    //slider.slideDown();
    //slider.slideToIndex( index );
});