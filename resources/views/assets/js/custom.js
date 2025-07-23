/*-----------------------------------------------------------------------------------

    Template Name: Webite


    Note: This is Custom Js file

-----------------------------------------------------------------------------------

    [Table of contents]

      01. accordion-item
      02. page-loaded
      03. scroll-top-inner
      04. hover-overlay
      05. cunter
      06. footer-fixed
      07. Splitting
      08. js-reviews-carousel
      09. move-anim
      10. team-swiper
     
-----------------------------------------------------------------------------------*/
 
  
/* 01. accordion-item */

$('.accordion-item .heading').on('click', function(e) {
    e.preventDefault();

    if($(this).closest('.accordion-item').hasClass('active')) {
        $('.accordion-item').removeClass('active');
    } else {
        $('.accordion-item').removeClass('active');

        $(this).closest('.accordion-item').addClass('active');
    }
    var $content = $(this).next();
    $content.slideToggle(100);
    $('.accordion-item .content').not($content).slideUp('fast');
});
 
 
/* 02. page-loaded */

$(window).on('load', function () {
    $("body").addClass("page-loaded");
    ("loaded")
});

/* 03. scroll-top-inner */

    $('.scroll-top-inner').on("click", function () {
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    });


    function handleScrollbar() {
        const bHeight = $('body').height();
        const scrolled = $(window).innerHeight() + $(window).scrollTop();

        let percentage = ((scrolled / bHeight) * 100);

        if (percentage > 100) percentage = 100;

        $('.scroll-top-inner .bar-inner').css( 'width', percentage + '%');
    }
 
    
    $(window).on('scroll', function() {
        handleScrollbar();
        if ($(window).scrollTop() > 200) {
                $('.scroll-top-inner').addClass('visible');
            } else {
                $('.scroll-top-inner').removeClass('visible');
            }
    });


/* 04. hover-overlay */


  window.addEventListener("DOMContentLoaded", () => {
    // Set default GSAP configuration

    // Initialize defaults
    gsap.defaults({
      ease: "power2.out",
      duration: 0.5,
    }); 
    
    // Get all target boxes and create overlays
    const targetBoxes = document.querySelectorAll(
      ".workflow, .blog-style"
    );

    targetBoxes.forEach((box) => {
      // Create overlay element
      const overlay = document.createElement("div");
      overlay.className = "hover-overlay";
      box.insertBefore(overlay, box.firstChild);

      // Initial setup - hide the overlay
      gsap.set(overlay, {
        autoAlpha: 0,
        y: 0,
        x: 0,
      });

      const getDirection = (box, event) => {
        const rect = box.getBoundingClientRect();
        const mouseX = event.clientX - rect.left;
        const mouseY = event.clientY - rect.top;

        // Calculate mouse position relative to box center
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const relativeX = mouseX - centerX;
        const relativeY = mouseY - centerY;

        // Calculate angle from center
        const angle = Math.atan2(relativeY, relativeX);
        const degrees = angle * (180 / Math.PI);

        // Determine quadrant
        if (degrees >= -45 && degrees <= 45) return "right";
        if (degrees > 45 && degrees <= 135) return "bottom";
        if (degrees > 135 || degrees <= -135) return "left";
        return "top";
      };

      const getAnimationProps = (direction, isEntering) => {
        const animProps = {
          autoAlpha: isEntering ? 1 : 0,
          x: 0,
          y: 0,
        };
        const distance = 100; // percentage to move

        switch (direction) {
          case "right":
            animProps[isEntering ? "startX" : "x"] = distance + "%";
            break;
          case "left":
            animProps[isEntering ? "startX" : "x"] = -distance + "%";
            break;
          case "bottom":
            animProps[isEntering ? "startY" : "y"] = distance + "%";
            break;
          case "top":
            animProps[isEntering ? "startY" : "y"] = -distance + "%";
            break;
        }

        return animProps;
      };

      // Mouse enter handler
      box.addEventListener("mouseenter", (e) => {
        const direction = getDirection(box, e);
        const animProps = getAnimationProps(direction, true);

        gsap.fromTo(
          overlay,
          {
            autoAlpha: 0,
            x: animProps.startX || 0,
            y: animProps.startY || 0,
          },
          {
            duration: 0.5,
            autoAlpha: 1,
            x: 0,
            y: 0,
            ease: "power2.out",
          }
        );
      });

      // Mouse leave handler
      box.addEventListener("mouseleave", (e) => {
        const direction = getDirection(box, e);
        const animProps = getAnimationProps(direction, false);

        gsap.to(overlay, {
          duration: 0.5,
          ...animProps,
          ease: "power2.in",
        });
      });
    });
  });

/* 05. cunter */ 

function inVisible(element) { 
  var WindowTop = $(window).scrollTop();
  var WindowBottom = WindowTop + $(window).height();
  var ElementTop = element.offset().top;
  var ElementBottom = ElementTop + element.height();
  //animating the element if it is
  //visible in the viewport
  if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop)
    animate(element);
}

function animate(element) { 
  if (!element.hasClass('ms-animated')) {
    var maxval = element.data('max');
    var html = element.html();
    element.addClass("ms-animated");
    $({
      countNum: element.html()
    }).animate({
      countNum: maxval
    }, { 
      duration: 5000,
      easing: 'linear',
      step: function() {
        element.html(Math.floor(this.countNum) + html);
      },
      complete: function() {
        element.html(this.countNum + html);
      }
    });
  } 
} 
$(function() { 
  $(window).scroll(function() { 
    $("h3[data-max]").each(function() {
      inVisible($(this));
    });
  })
});

/* 06. footer-fixed */

if ($(".footer-fixed").length) {
    var footerHeight = $(".footer-fixed .webilte-footer").outerHeight();
    $(".wrapper").css("margin-bottom", footerHeight + "px");
}

/* 07. Splitting */

Splitting({
    target: document.querySelector(".my-text"),
    by: "lines"
});

/* 08. js-reviews-carousel */

$(".js-reviews-carousel").each(function () {
    var $carousel = $(this);
    var autoplayDelay = $carousel.data("autoplay");
    var loopEnabled = !!$carousel.data("loop");

    var autoplayConfig = false;
    if (autoplayDelay > 1) {
        autoplayConfig = {
            delay: autoplayDelay
        };
        $carousel.find(".swiper-slide").attr("data-swiper-autoplay", autoplayDelay);
    }

    new Swiper($carousel[0], {
        slidesPerView: 1,
        effect: "fade",
        loop: loopEnabled,
        autoplay: autoplayConfig,
        spaceBetween: 50,
        pagination: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
});

/* 09. move-anim */

let text_animation = gsap.utils.toArray(".move-anim");

  if (text_animation) {
    text_animation.forEach((splitTextLine) => {
      var delay_value = 0.1;
      if (splitTextLine.getAttribute("data-delay")) {
        delay_value = splitTextLine.getAttribute("data-delay");
      }
      const tl = gsap.timeline({
        scrollTrigger: {
          trigger: splitTextLine,
          start: "top 85%",
          duration: 1.3,
          scrub: false,
          markers: false,
          toggleActions: "play none none none",
        },
      });

      const itemSplitted = new SplitText(splitTextLine, {
        type: "lines",
      });
      gsap.set(splitTextLine, {
        perspective: 400,
      });
      itemSplitted.split({
        type: "lines",
      });
      tl.from(itemSplitted.lines, {
        duration: 1,
        delay: delay_value,
        opacity: 0,
        rotationX: -80,
        force3D: true,
        transformOrigin: "top center -50",
        stagger: 0.1,
      });
    });
  }


  document.addEventListener("DOMContentLoaded", function () {
    // Create the SplitText instance
    const splitt = new SplitText(".text_invert", { type: "lines" });

    // Set initial styles for the lines
    gsap.set(splitt.lines, {
      color: "#ddd", // Initial text color
      overflow: "hidden",
    });

    // Animate each line
    splitt.lines.forEach((target) => {
      gsap.to(target, {
        color: "#000000", // Final text color (red)
        duration: 1,
        ease: "power2.out",
        backgroundPositionX: 0,
        scrollTrigger: {
          trigger: target,
          scrub: true,
          start: "top 55%",
          end: "bottom center",
        },
      });
    });


    let horizontalSection = document.querySelector(".horizontal-scroll");
  let device_width = window.innerWidth;

  if (device_width > 1199 && horizontalSection) {
    gsap.registerPlugin(ScrollTrigger);
    gsap.to(horizontalSection, {
      x: () => horizontalSection.scrollWidth * -1,
      xPercent: 100,
      scrollTrigger: {
        trigger: horizontalSection,
        start: "center center",
        end: "+=3000px",
        pin: true, // Change this
        scrub: true,
        invalidateOnRefresh: true,
      },
    });
  }

  });



  if (typeof Swiper !== 'undefined') {

  /* 10. team-swiper */ 

   var swiper = new Swiper(".team-swiper", {
    loop: true,
    speed: 1000,
    freeMode: true,
    slidesPerView: 2,
    spaceBetween: 30, 
    allowTouchMove: false,
    pagination: {
        el: ".swiper-pagination",
      },
      autoplay: {
        delay: 2000,
      },
      breakpoints: {
      1: {
        slidesPerView: 1,
      }, 
      992: {
        slidesPerView: 2,
      },  
    }
 });
}