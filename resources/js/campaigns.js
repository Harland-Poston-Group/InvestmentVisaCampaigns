$(function() {
    $(".btn-close").on("click", function(){
        $('.work-visa-message').hide().removeClass('show');
    });

    $(".what_are_you_looking_for").change(function() {
        let val = $(this).val();
        const alert = $('<div id="work-visa-message" class="alert alert-warning alert-dismissible fade show" role="alert"><a class="btn-close" data-dismiss="alert" aria-label="Close"><i class="far fa-times-circle"></i></a><i class="fas fa-info-circle"></i> You have selected Work Visa<br>Investment Visa does not offer services in regards to Work Visas.</div>');

        var selectedValue = $(this).val();
        console.log("Selected Value: " + selectedValue);

        if (selectedValue === "Work visa") {
            $('.submit-button').attr("disabled", true);
            // const toast = new bootstrap.Toast(document.querySelector('.toast'));
            // toast.show({ delay: 50000 });
            $('.work-visa-message').addClass('show').show();
        }
        else {
            $('.submit-button').attr("disabled", false);
            $('.work-visa-message').hide().removeClass('show');
        }
    });

});

$(document).ready(function() {

    // Check if the user is in a mobile screen
    function isMobile(){

        if($("body").width() < 762){
            return true;
        }else{
            return false;

        }

    }

    let bottomFormContainer = $("#slide-up-form-container");

    $(".performance-talk-to-us").on("click", function(){

        if( isMobile() ){

            bottomFormContainer.animate({
                top: "0px",
            }, 200 );

        }else{

            let formContainerWidth = bottomFormContainer.width();
            let calculatedLeft = ( $(window).width() / 2 ) - ( formContainerWidth / 2 );

            bottomFormContainer.animate({
                top: "25px",
                left: calculatedLeft,
            }, 200 );

        }

    })

    $("#slide-up-form-container .close-button").on("click", function(){

        bottomFormContainer.animate({
            top: "100%",
        }, 200 );

    })

    /* TOPIC ITEMS CODE SECTION */
    // $(".topic-item").on("mouseover", function(){

    //     let currentHeight = $(this).height();

    //     $(this).find('.topic-title').stop().fadeOut(1);
    //     $(this).find('.content').stop().fadeIn(200);
    //     $(this).find('.topic-icon').stop().fadeOut(50);
    //     $(this).css('height', currentHeight);

    // }).on("mouseleave", function(){

    //     $(this).find('.topic-title').stop().fadeIn(1);
    //     $(this).find('.content').stop().fadeOut(100);
    //     $(this).find('.topic-icon').stop().fadeIn(50);
    //     $(this).css('height', 'unset');

    // });


    // Revamped way of animating the items as the previous one was bugged
    let hoverTimeout, revertTimeout;

    $(".topic-item").on("mouseover", function() {
        clearTimeout(revertTimeout); // Clear any pending revert timeout

        let $this = $(this);
        let currentHeight = $this.height();

        // Apply the active class
        $this.addClass('active');

        $this.find('.topic-title').stop().fadeOut(1);
        $this.find('.content').stop().fadeIn(200);
        $this.find('.topic-icon').stop().fadeOut(50);
        $this.css('height', currentHeight);

        // Set a timeout to revert after 3 seconds if not hovered
        revertTimeout = setTimeout(function() {
            if (!$this.is(':hover')) {
                $this.removeClass('active');
                $this.find('.topic-title').stop().fadeIn(1);
                $this.find('.content').stop().fadeOut(100);
                $this.find('.topic-icon').stop().fadeIn(50);
                $this.css('height', 'unset');
            }
        }, 3000);
    }).on("mouseleave", function() {
        clearTimeout(revertTimeout); // Clear the revert timeout on mouse leave

        let $this = $(this);

        // Check if we are still hovering and set a timeout to keep active state if still hovered
        hoverTimeout = setTimeout(function() {
            if (!$this.is(':hover')) {
                $this.removeClass('active');
                $this.find('.topic-title').stop().fadeIn(1);
                $this.find('.content').stop().fadeOut(100);
                $this.find('.topic-icon').stop().fadeIn(50);
                $this.css('height', 'unset');
            }
        }, 3000);
    });

    /* END OF TOPIC ITEMS CODE SECTION

    /* Banner Text Slider */
    if( $(".banner-text-slider").length ){

        var testimonial_slide = new Splide('.banner-text-slider', {
            type: 'loop',
            perPage: 1,
            perMove: 1,
            autoplay: true,
            interval: 3500,
            speed: '500',
            easing: 'ease',
            arrows: false,
            pagination:false,
            // Appending the pagination buttons to a specific element
            // pagination: '#testimonial-slider-container',
            breakpoints: {
                991: {
                    perPage: 1
                },
            }
            // autoWidth: true,
        }).mount();

        // Adaptar a height do container ao tamanho de cada slider dado que há testimonials com tamanhos diferentes no website
        testimonial_slide.on('mounted moved', function () {


            // If we are on mobile, adapt the slider height on each slider move
            if( $(window).width() < 991 ){

                let active_slide_height = $(".banner-text-slider .is-visible").outerHeight();

                // console.log(active_slide_height);

                $(".banner-text-slider .splide__list").css("height",active_slide_height+"px");

            }

        })
    }

    /* Private Meetings Pages Campaign per Country */

    /* Banner Text Slider */
    if( $(".banner-image-slider").length ){

        var banner_slider = new Splide('.banner-image-slider', {
            //type: 'loop',
            perPage: 1,
            perMove: 1,
            autoplay: true,
            type: "fade",
            speed: 3000,
            interval: 7000,
            rewind: true,
            //easing: 'ease',
            arrows: false,
            pagination:false,
            // Appending the pagination buttons to a specific element
            // pagination: '#testimonial-slider-container',
            breakpoints: {
                991: {
                    perPage: 1
                },
            }
            // autoWidth: true,
        }).mount();

        // Adaptar a height do container ao tamanho de cada slider dado que há testimonials com tamanhos diferentes no website
        // testimonial_slide.on('mounted moved', function () {


        //     // If we are on mobile, adapt the slider height on each slider move
        //     if( $(window).width() < 991 ){

        //         let active_slide_height = $(".banner-image-slider .is-visible").outerHeight();

        //         // console.log(active_slide_height);

        //         $(".banner-image-slider .splide__list").css("height",active_slide_height+"px");

        //     }

        // })
    }


    var pmFadeInSection = $("#fade-in-booking-section");

    // Open and bring the booking form fade in section on a click on the BOOK button
    $("#private-meetings-booking-sections .meeting-item .book-button").on('click', function(){

        pmFadeInSection.fadeIn(200);

    });

    $(".popup-fade-in-form").on('click', function(){

        pmFadeInSection.fadeIn(200);

    })

    // Close booking form fade in section
    $("#form-container-element-banner .close-button").on('click', function(){

        pmFadeInSection.fadeOut();

    })
})
/* Testimonial Slider */
if( $(".testimonials-slider").length ){

    var testimonial_slide = new Splide('.testimonials-slider', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '50px',
        autoplay: true,
        interval: 6000,
        speed: '500',
        easing: 'ease',
        arrows: false,
        // Appending the pagination buttons to a specific element
        // pagination: '#testimonial-slider-container',
        breakpoints: {
            991: {
                perPage: 1
            },
        }
        // autoWidth: true,
    }).mount();

    // Adaptar a height do container ao tamanho de cada slider dado que há testimonials com tamanhos diferentes no website
    testimonial_slide.on('mounted moved', function () {


        // If we are on mobile, adapt the slider height on each slider move
        if( $(window).width() < 991 ){

            let active_slide_height = $(".testimonials-slider .is-visible").outerHeight();

            // console.log(active_slide_height);

            $(".testimonials-slider .splide__list").css("height",active_slide_height+"px");

        }

    })
}
/* Properties Slider */
if( $(".properties-slider").length ){

    var properties_slide = new Splide('.properties-slider', {
        type: 'loop',
        perPage: 3,
        perMove: 1,
        gap: '50px',
        autoplay: true,
        interval: 6000,
        speed: '500',
        easing: 'ease',
        arrows: false,
        // Appending the pagination buttons to a specific element
        // pagination: '#testimonial-slider-container',
        breakpoints: {
            991: {
                perPage: 1
            },
        }
        // autoWidth: true,
    }).mount();

    // Adaptar a height do container ao tamanho de cada slider dado que há testimonials com tamanhos diferentes no website
    properties_slide.on('mounted moved', function () {

        // If we are on mobile, adapt the slider height on each slider move
        if( $(window).width() < 991 ){

            let active_slide_height = $(".properties-slider .is-visible").outerHeight();
            // console.log(active_slide_height);
            $(".properties-slider .splide__list").css("height",active_slide_height+"px");

        }

    })
}
$(document).ready(function() {

    var blacklist = [
        "free visa",
        "jobless",
        "work parmit",
        "work permit",
        "uber",
        "need job",
        "need a job",
        "search a job",
        "job",
        "jobs",
        "encountered an error",
        "unsubscribe",
        "marketing emails",
        "language settings",
        "unable to access my account",
        "sponsor visa",
        "sponsorship visa",
        "tourist visa",
        "work visa",
        "fuck",
        "shit"
    ];


    $('textarea').on('input', function() {
        var content = $(this).val();
        var foundBlacklisted = false;

        // Check if any blacklisted word/sentence exists
        $.each(blacklist, function(index, word) {
            var regex = new RegExp('\\b' + word + '\\b', 'gi'); // Create regex for each blacklisted word
            if (regex.test(content)) {
                foundBlacklisted = true;
                alert("You have written '" + word + "' Investment Visa does not offer services in regard to '" + word + "'.");

                // Remove the word/sentence from the content
                content = content.replace(regex, '');
            }
        });

        // Update the textarea with the filtered content
        if (foundBlacklisted) {
            $('textarea').val(content); // Update if a blacklisted word was found
        }
    });
});
$(document).ready(function() {
    // Show/hide the button when scrolling
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.double-down-chevron-bottom').fadeIn();
        } else {
            $('.double-down-chevron-bottom').fadeOut();
        }
    });

    // Scroll to top when the button is clicked
    $('.double-down-chevron-bottom').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });
});

/*
document.querySelector('.navbar-toggler').addEventListener('click', function() {
    this.classList.toggle('collapsed');
});
*/
$(function(){
    $(window).scroll(function() {
        const scrollTop = $(this).scrollTop();
        const windowHeight = $(this).height();
        const documentHeight = $(document).height();

        if (scrollTop >= 10) {
            $('#campaign-navbar').css('position', 'sticky'); // Change color when at bottom
        }
        else {
            $('#campaign-navbar').css('position', 'absolute');
        }


        // Check if the user has scrolled to the bottom of the page
        if (scrollTop + windowHeight >= documentHeight - 1) {
            $('.double-down-chevron-bottom svg').css('fill', '#fff'); // Change color when at bottom
        }
        // Check if the scroll is between 800 and 1500
        else if (scrollTop >= 800 && scrollTop <= 1500) {
            $('.double-down-chevron-bottom svg').css('fill', '#fff'); // Change color between 800 and 1500
        }
        // Otherwise revert color
        else {
            $('.double-down-chevron-bottom svg').css('fill', '#6A257A'); // Revert color
        }
    });
});


/*
$('#why-portugal-homes-section-pm').addClass('animate-on-scroll');

const sections = document.querySelectorAll('.animate-on-scroll');
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__animated', 'animate__fadeIn');
            observer.unobserve(entry.target);
        }
    });
});

sections.forEach(section => {
    observer.observe(section);
});
*/
