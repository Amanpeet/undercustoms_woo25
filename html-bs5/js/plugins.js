jQuery(document).ready(function( $ ) { //noconflicts
  console.log('plugins initilized.');

  jQuery('#owl-uno').owlCarousel({
    loop: true,
    navRewind: false,
    autoplay: true,
    autoplayTimeout: 6000,
    center: false,
    margin: 30,
    nav: true,
    dots: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: { items: 1 },
      640: { items: 1 },
      768: { items: 1 },
      991: { items: 1 },
      1200: { items: 1 }
    }
  });

  jQuery('#owl-duo').owlCarousel({
    loop: true,
    navRewind: false,
    autoplay: true,
    autoplayTimeout: 6000,
    center: false,
    margin: 30,
    nav: true,
    dots: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: { items: 1 },
      640: { items: 1 },
      768: { items: 1 },
      991: { items: 2 },
      1200: { items: 2 }
    }
  });

  jQuery('#owl-trio').owlCarousel({
    loop: true,
    navRewind: false,
    autoplay: true,
    autoplayTimeout: 6000,
    center: false,
    margin: 30,
    nav: true,
    dots: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: { items: 1 },
      640: { items: 2 },
      768: { items: 2 },
      991: { items: 3 },
      1200: { items: 3 }
    }
  });

  jQuery('#owl-quad').owlCarousel({
    loop: true,
    navRewind: false,
    autoplay: true,
    autoplayTimeout: 6000,
    center: false,
    margin: 30,
    nav: true,
    dots: true,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: { items: 1 },
      640: { items: 2 },
      768: { items: 2 },
      991: { items: 3 },
      1200: { items: 4 }
    }
  });

  jQuery('#owl-penta').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    center: false,
    margin: 20,
    nav: false,
    dots: false,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    responsive: {
      0: { items: 1 },
      640: { items: 2 },
      768: { items: 3 },
      991: { items: 4 },
      1200: { items: 5 }
    }
  });

  //Top Search bar Show Hide function by = custom.js//
  function site_search() {
    jQuery('#search_btn').on('click', function (event) {
      jQuery('#search').addClass('open');
      jQuery('#search > form > input[type="search"]').focus();
      console.log('searching...');
    });

    jQuery('#search, #search button.close').on('click keyup', function (event) {
      if (event.target === this || event.target.className === 'close') {
        jQuery(this).removeClass('open');
      }
    });
  }
  site_search();

  //Smooth scrolling with links v2
  // $('a.inner-link, .menu-item a[href*=\\#]').on('click', function (event) {
  //   if(this.pathname === window.location.pathname){
  //     event.preventDefault();
  //     $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
  //     // $('#menuModal').modal('hide');
  //   } else {
  //     // $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
  //   }
  // });

  //smooth scroll
  $(document).on('click', 'a.inner-link', function (event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: $($.attr(this, 'href')).offset().top - 200 }, 500);
  });

  //back to top
  backToTop();
  function backToTop(){
    $(".back-to-top").css("display","none");
    $(window).scroll(function(){
      if($(window).scrollTop() > 0 ){
        $(".back-to-top").fadeIn(300);
      } else {
        $(".back-to-top").fadeOut(300);
      }
    });
    $(".back-to-top").click(function(){
      $("html, body").animate({
        scrollTop: 0
      }, 500);
    });
  };


});