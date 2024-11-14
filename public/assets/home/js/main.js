
(function() {
  "use strict";

 /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
 const selectBody = document.querySelector('body');
 const selectHeader = document.querySelector('#header');

 function toggleScrolled() {
   if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top')) return;
   window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
 }

 document.addEventListener('scroll', toggleScrolled);
 window.addEventListener('load', toggleScrolled);

 /**
  * Scroll up sticky header to headers with .scroll-up-sticky class
  */
 let lastScrollTop = 0;
 window.addEventListener('scroll', function() {
   if (!selectHeader.classList.contains('scroll-up-sticky')) return;

   let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

   if (scrollTop > lastScrollTop && scrollTop > selectHeader.offsetHeight) {
     selectHeader.style.setProperty('position', 'sticky', 'important');
     selectHeader.style.top = `-${header.offsetHeight + 50}px`;
   } else if (scrollTop > selectHeader.offsetHeight) {
     selectHeader.style.setProperty('position', 'sticky', 'important');
     selectHeader.style.top = "0";
   } else {
     selectHeader.style.removeProperty('top');
     selectHeader.style.removeProperty('position');
   }
   lastScrollTop = scrollTop;
 });

 /**
  * Navmenu links active state on scroll
  */
 let navmenulinks = document.querySelectorAll('#navmenu a');

 function navmenuActive() {
   navmenulinks.forEach(navmenulink => {
     if (!navmenulink.hash) return;
     let section = document.querySelector(navmenulink.hash);
     if (!section) return;
     let position = window.scrollY + 200;
     if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
       document.querySelectorAll('#navmenu a.active').forEach(link => link.classList.remove('active'));
       navmenulink.classList.add('active');
     } else {
       navmenulink.classList.remove('active');
     }
   })
 }
 window.addEventListener('load', navmenuActive);
 document.addEventListener('scroll', navmenuActive);

 /**
  * Adjust scroll position on load with URL hash links
  */
 window.addEventListener('load', function(e) {
   if (window.location.hash) {
     if (document.querySelector(window.location.hash)) {
       e.preventDefault();
       setTimeout(() => {
         let section = document.querySelector(window.location.hash);
         let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
         window.scrollTo({
           top: section.offsetTop - parseInt(scrollMarginTop),
           behavior: 'smooth'
         });
       }, 1);
     }
   }
 });

 /**
  * Mobile nav toggle
  */
 const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

 function mobileNavToogle() {
   document.querySelector('body').classList.toggle('mobile-nav-active');
   mobileNavToggleBtn.classList.toggle('bi-list');
   mobileNavToggleBtn.classList.toggle('bi-x');
 }
 mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

 /**
  * Hide mobile nav on same-page/hash links
  */
 document.querySelectorAll('#navmenu a').forEach(navmenu => {
   navmenu.addEventListener('click', () => {
     if (document.querySelector('.mobile-nav-active')) {
       mobileNavToogle();
     }
   });

 });

 /**
  * Toggle mobile nav dropdowns
  */
 document.querySelectorAll('.navmenu .has-dropdown i').forEach(navmenu => {
   navmenu.addEventListener('click', function(e) {
     if (document.querySelector('.mobile-nav-active')) {
       e.preventDefault();
       this.parentNode.classList.toggle('active');
       this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
       e.stopImmediatePropagation();
     }
   });
 });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  /**
   * Auto generate the carousel indicators
   */
  document.querySelectorAll('.carousel-indicators').forEach((carouselIndicator) => {
    carouselIndicator.closest('.carousel').querySelectorAll('.carousel-item').forEach((carouselItem, index) => {
      if (index === 0) {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}" class="active"></li>`;
      } else {
        carouselIndicator.innerHTML += `<li data-bs-target="#${carouselIndicator.closest('.carousel').id}" data-bs-slide-to="${index}"></li>`;
      }
    });
  });

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Initiate Pure Counter
   */
  new PureCounter();

  /**
   * Animate the skills items on reveal
   */
  let skillsAnimation = document.querySelectorAll('.skills-animation');
  skillsAnimation.forEach((item) => {
    new Waypoint({
      element: item,
      offset: '80%',
      handler: function(direction) {
        let progress = item.querySelectorAll('.progress .progress-bar');
        progress.forEach(el => {
          el.style.width = el.getAttribute('aria-valuenow') + '%';
        });
      }
    });
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }





    var swiper = new Swiper(".swiper-container-h", {
            direction: "horizontal",
            effect: "slide",
            autoplay: {
            delay: 10000, 
            disableOnInteraction: false
        },
            parallax: true,
            speed: 1600,
            rtl: true,
            loop: true,
            loopFillGroupWithBlank: !0,
  
        
            keyboard: {
              enabled: true,
              onlyInViewport: true
            },
            scrollbar: {
              el: ".swiper-scrollbar",
              hide: false,
              draggable: true
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "progressbar"
              }
          });
        var swiper = new Swiper(".swiper-container-h1", {
            direction: "horizontal",
            effect: "slide",
            autoplay: false,
            parallax: true,
            speed: 1600,
            rtl: true,
            loop: true,
            loopFillGroupWithBlank: !0,
            keyboard: {
              enabled: true,
              onlyInViewport: true
            },
            scrollbar: {
              el: ".swiper-scrollbar",
              hide: false,
              draggable: true
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable:"true"
              }
          });

          var swiper = new Swiper(".productDetails1", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesProgress: true,
          });
          var swiper2 = new Swiper(".productDetails2", {
            spaceBetween: 10,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            thumbs: {
              swiper: swiper,
            },
          });



          window.addEventListener('load', function() {
            const logoTrack = document.querySelector('.logo-track');
            const logos = document.querySelectorAll('.logo-item');
            
            logos.forEach(logo => {
              const clone = logo.cloneNode(true);
              logoTrack.appendChild(clone);
            });
          });
          

  window.addEventListener("load", initSwiper);

})();






