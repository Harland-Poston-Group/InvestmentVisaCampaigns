import 'animate.css';

$(document).ready(function () {


    function bannerLoadAnimation(){
        
        let bannerContent = $('.rollover-element');
        let bannerSubtitle = $('.banner-subtitle');
        let formElement = $('.generic-form-container');
        // let bannerContentHeight = bannerContent.outerHeight();


        // Clone the element
        let clone = bannerContent.clone()
        .css({
            visibility: 'hidden', // Make it invisible
            position: 'absolute', // Remove it from the flow
            height: 'auto', // Let it expand naturally
            width: bannerContent.width() // Match the original element's width
        })
        .appendTo('body');
        
        setTimeout(() => {
            
            bannerSubtitle.addClass('animate__animated animate__fadeInLeft');
            formElement.addClass('animate__animated animate__fadeInRight');

        }, 1500); // Add it temporarily to the DOM

        // Get the natural height
        let naturalHeight = clone.outerHeight() + 15; // Use .height() if padding/border are irrelevant

        // Remove the clone
        clone.remove();

        // Animate the original element to its natural height
        bannerContent.animate({ height: naturalHeight }, 500); // 500ms animation

    }

    bannerLoadAnimation();

})