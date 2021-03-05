/**
 * 
 *
 * This file contains all template JS functions
 *
 * @package Repair Shop 
--------------------------------------------------------------
                   Contents
--------------------------------------------------------------

 * 01 - Owl Carousel
          - Home Slider 
          - Home Slider Two 
          - Service Slider 
          - Service Slider Two
          - Testimonial Slider 
          - Testimonial Slider Two
          - Testimonial Slider Three
          - Product Slider 
          - Product Slider Two 
          - Team Slider 
          - Brand Slider 
          - Brand Slider Two 
          - Shop Slider 
          - Gallery Slider 
 * 02 - Before N After Slider  
 * 03 - Facts Count
 * 04 - Video Play
 * 05 - Smooth Scroll
 * 06 - Mailchimp Form 
 * 07 - Navigation
 * 08 - Search 
 * 09 - Price Slider / Filter
 * 10 - Video Popup 
 * 11 - Popup Dialog
 * 12 - Audio Popup 
 * 13 - Image Popup 
 * 14 - Popup Mail
 * 15 - Progress Bar 
 * 16 - Datepicker
 * 17 - Timepicker
 * 18 - Product Zoom 
 * 19 - Quantity Increase Decrease
 * 20 - Go To Top
 * 21 - Rating
 * 22 - Share Btn
 * 23 - Preloader   


--------------------------------------------------------------*/
(function($) {
  "use strict";
  
  var $window     = $( window )
  var counter     = $( '.counter' )
  var search      = $( '.search' )
  var amount      = $( '#amount' )
  var sliderrange = $( '#slider-range' )
  var scrollbar   = $( '.scroll-bar' )
  var datepick    = $( '.date-pick' )
  var sharebtn    = $( '.share-btn' )
  var gototop     = $( '#go-to-top' )
  var zoom        = $( '#zoom-01' )

// Owl Carousel 
    // Home Slider    
    if( $("#home-slider").length ){
        $("#home-slider").owlCarousel({
          loop: true,
          items: 1,
          dots: true,
          nav: false,
          autoplayTimeout: 10000,
          smartSpeed: 4000,
          autoHeight: true,
          touchDrag: true,
          mouseDrag: true,
          margin: 0,
          autoplay: true,
          slideSpeed: 10000,
          navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
          responsive: {
            0: {
                items: 1,
                dots: false
            },
            600: {
                items: 1,
                dots: false
            },
            768: {
                items: 1,
                dots: true
            },
            1100: {
                items: 1,
                nav: true
            }
          }
        });
  }
  
  // Home Slider Two 
  if( $("#home-slider-two").length ){
      $("#home-slider-two").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        margin: 0,
        autoplay: true,
        slideSpeed: 600,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          768: {
              items: 1
          },
          1100: {
              items: 1
          }
        }
      });
  }
 
  // Service Slider 
  if( $("#service-slider").length ){
      $("#service-slider").owlCarousel({
        loop: true,
        items: 5,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        margin: 30,
        slideSpeed: 600,
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 2
          },
          768: {
              items: 3
          },
          1100: {
              items: 5
          }
        }
      }); 
  }

  // Service Slider Two
  if( $("#service-slider-two").length ){
      $("#service-slider-two").owlCarousel({
        loop: true,
        items: 4,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        margin: 30,
        slideSpeed: 600,
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 2
          },
          768: {
              items: 3
          },
          1100: {
              items: 4
          }
        }
      });
  } 
  
  // Testimonial Slider 
  if( $("#testimonial-slider").length ){
      $("#testimonial-slider").owlCarousel({
        loop: true,
        items: 1,
        dots: true,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600, 
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
              nav: false,
          },
          600: {
              items: 1,
              nav: false,
          },
          768: {
              items: 1,
              nav: false,
          },
          1100: {
              items: 1,
              nav: true
          }
        }
      }); 
  }

  // Testimonial Slider Two
  if( $("#testimonial-slider-two").length ){
      $("#testimonial-slider-two").owlCarousel({
        loop: true,
        items: 3,
        dots: false,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,      
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        center: true,
        slideSpeed: 600, 
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
               nav: false
          },
          600: {
              items: 2, 
              nav: false,
              center: false
          },
          768: {
              items: 2,
              nav: false,
              center: false
          },
          1100: {
              items: 3,
              nav: true
          }
        }
      });
  }

  // Testimonial Slider Three
  if( $("#testimonial-slider-three").length ){
      $("#testimonial-slider-three").owlCarousel({
        loop: true,
        items: 2,
        dots: true,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,      
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600, 
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
               nav: false,
               dots: false
          },
          600: {
              items: 1, 
              nav: false,
              dots: false
          },
          768: {
              items: 1,
              nav: true,
              dots: true
          },
          1100: {
              items: 2,
              nav: true,
              dots: true
          }
        }
      }); 
  }

  // Product Slider 
  if( $("#product-slider").length ){
      $("#product-slider").owlCarousel({
        loop: true,
        items: 3,
        dots: false,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600,
        margin: 30, 
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
              nav: false
          },
          600: {
              items: 2,
              nav: false,
              center: false
          },
          768: {
              items: 2,
              nav: true,
              center: false
          },
          1100: {
              items: 3,            
              nav: true
          }
        }
      }); 
  }

  // Product Slider Two
  if( $("#product-slider-two").length ){
      $("#product-slider-two").owlCarousel({
        loop: true,
        items: 3,
        dots: true,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600,
        margin: 30,
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 2
          },
          768: {
              items: 2,
              dots: true
          },
          1100: {
              items: 3,            
              dots: true
          }
        }
      }); 
  }
  
  // Team Slider 
  if( $("#team-slider").length ){
      $("#team-slider").owlCarousel({
        loop: true,
        items: 2,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        margin: 30,
        autoplay: true,
        slideSpeed: 600,
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          768: {
              items: 2
          },
          1100: {
              items: 2
          }
        }
      });
  } 

  // Brand Slider 
  if( $("#brand-slider").length ){
      $("#brand-slider").owlCarousel({
          loop: true,
          items: 5,
          dots: false,
          nav: false,
          autoplayTimeout: 2500,
          smartSpeed: 2000,
          autoHeight: true,
          touchDrag: true,
          mouseDrag: true,
          center: true,
          margin: 30,
          autoplay: true,
          slideSpeed: 600,
          responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2,            
                center: false
            },
            768: {
                items: 3
            },
            1100: {
                items: 5
            }
          }
        }); 
  }

  // Brand Slider Two 
  if( $("#brand-slider-two").length ){
      $("#brand-slider-two").owlCarousel({
          loop: true,
          items: 4,
          dots: false,
          nav: true,
          autoplayTimeout: 2500,
          smartSpeed: 2000,
          autoHeight: true,
          touchDrag: true,
          mouseDrag: true,
          margin: 30,
          autoplay: true,
          slideSpeed: 600,
          navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
          responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            768: {
                items: 3,
                nav: false
            },
            1100: {
                items: 4
            }
          }
        });
  }

  // Shop Slider 
  if( $("#shop-slider").length ){
      $("#shop-slider").owlCarousel({
        loop: true,
        items: 2,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        margin: 30,
        autoplay: true,
        slideSpeed: 600,
        responsive: {
          0: {
              items: 1
          },
          600: {
              items: 1
          },
          768: {
              items: 2
          },
          1100: {
              items: 2
          }
        }
      }); 
  }

  //Blog Post slider
  if( $("#blog-post-slider").length ){
      $("#blog-post-slider").owlCarousel({
        loop: true,
        items: 1,
        dots: false,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,
        mouseDrag: true,
        autoplay: true,
        margin: 30,
        slideSpeed: 600,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
              nav: false
          },
          600: {
              items: 1,            
              nav: false
          },
          768: {
              items: 1,            
              nav: true
          },
          1100: {
              items: 1,            
              nav: true
          }
        }
      });
  }

  // Gallery Slider 
  if( $("#gallery-slider").length ){
      $("#gallery-slider").owlCarousel({
        loop: true,
        items: 3,
        dots: false,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,      
        margin: 30,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600, 
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        responsive: {
          0: {
              items: 1,
               nav: false
          },
          600: {
              items: 2, 
              nav: false,
              center: false
          },
          768: {
              items: 2,
               nav: true,
              center: false
          },
          1100: {
              items: 3,
              nav: true
          }
        }
      });
  }

  // Before After Slider  
  if( $("#ba-slider").length ){
      $("#ba-slider").owlCarousel({
        loop: true,
        items: 3,
        dots: false,
        nav: true,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: false,
        mouseDrag: false,
        margin: 30,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        slideSpeed: 600,
        responsive: {
          0: {
              items: 1,
              nav: true,
          },
          600: {
              items: 1,
              nav: true,
          },
          768: {
              items: 2,
              nav: true,
          },
          1100: {
              items: 3,
              nav: true,
          }
        }
      }); 
  }    
      
  // Mt store Slider 
  if( $("#my-store-slider").length ){
      $("#my-store-slider").owlCarousel({
        loop: true,
        items: 4,
        dots: false,
        nav: false,
        autoplayTimeout: 2500,
        smartSpeed: 2000,
        autoHeight: true,
        touchDrag: true,      
        margin: 15,
        mouseDrag: true,
        autoplay: true,
        slideSpeed: 600,
        responsive: {
          0: {
              items: 2
          },
          600: {
              items: 2
          },
          768: {
              items: 3
          },
          1100: {
              items: 4
          }
        }
      });
  }

  // Facts Count 
  if (counter.length) {
      counter.counterUp({ delay: 20, time: 2000 });
  }

  // Video Play 
  if( $('.btn-video-play').length ){
      $('.btn-video-play').on('click',function() {
        $('.video-item .video-preview').append(video_url);
        $(this).hide();
      });
  }
  if( $('.btn-video-play-two').length ){
      $('.btn-video-play-two').on('click',function() {
        $('.video-item .video-preview-two').append(video_url);
        $(this).hide();
      });
  }

  // Smooth Scroll
    smoothScroll.init();
    
  // Mailchimp Form
  if( $('#subscribe-form').length ){
      $('#subscribe-form').ajaxChimp({
          url: 'http://blahblah.us1.list-manage.com/subscribe/post?u=5afsdhfuhdsiufdba6f8802&id=4djhfdsh9'
      });
  }

  // Navigation 
  if( $("#cssmenu").length ){
      $("#cssmenu").menumaker({
        title: "Menu",
        format: "multitoggle"
      });
  }

 // Search
  if( $('.search-icon').length ){
      $('.search-icon').on('click', function (e) {
        e.preventDefault();
        search.addClass('active');
      });
  }

  if( $('.search-close').length ){
      $('.search-close').on('click', function (e) {
        e.preventDefault();
        search.removeClass('active');
      });
  }

  // Price Slider / Filter
  if( $( sliderrange ).length ){
      $( sliderrange ).slider({
          range: true,
          min: 0,
          max: 800,
          values: [ 12, 499 ],
          slide: function( event, ui ) {
              $( amount).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
          }
      });
  }

    if( $( amount ).length ){
        $( amount ).val( "$" + $( sliderrange ).slider( "values", 0 ) +
            " - $" + $( sliderrange ).slider( "values", 1 ) );
    }

  // Video Popup       
  if( $('#mList A').length ){
      $('#mList A').on('click',function(e){
        e.preventDefault();
        var u = $(this).attr('href');
        if($(window).width() > 800){
          var i = u.substring(u.search('=')+1,u.length);
          $('#mPlayer DIV').html('<iframe width="560" height="315" src="https://www.youtube.com/embed/' + i + '" frameborder="0" allowfullscreen></iframe>');
          $('#mPlayer').fadeIn(500);
        }else{
          window.location.href = u;
        }
      });
  }

  if( $('#mPlayer').length ){
      $('#mPlayer').on('click',function(e){
        $('#mPlayer').fadeOut(500);
        $('#mPlayer DIV').empty();
      }); 
  }
    
  // Popup Dialog  
  if( $('.gallery-popup').length ){
      $('.gallery-popup').magnificPopup({
        delegate: '.gallery-img a',
        type: 'image',    
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',    
        gallery: {
          enabled: true,
          navigateByImgClick: true,
          preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
          tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
          titleSrc: function(item) {
            return item.el.attr('title') + '<small>by Repair Shop</small>';
          }
        }
      });
  }   

  // Audio Popup  
  if( $('.popup-audio').length ){
      $('.popup-audio').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
      });
   }

  // Image Popup 
  if( $('.image-popup').length ){
      $('.image-popup').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        image: {
          verticalFit: false
        }
      });
  }

  // Popup Mail
  if( $(".send-msg-btn").length ){
      $(".send-msg-btn").on("click", function(){
         $(".contact-popup-block").fadeToggle();
      });    
  }

  // Progress Bar 
    if ($(scrollbar).length) {    
        $(scrollbar).appear(function(){
          var el = $(this);
          var percent = el.data('percent');
          $(el).css('width',percent);
        },{accY: -50});
    }    

  // Datepicker
    if ($(datepick).length) {
        $(datepick).datepicker({
          format : "dd/mm/yyyy",
          startDate: '+1d',
        });
    }

  // Timepicker   
  if( $('.time-picker').length ){
      $('.time-picker').timepicker({});    
  }
    
 // Product Zoom
 if( $(zoom).length ){

      $(zoom).elevateZoom({gallery:'gallery-01', zoomType: 'lens', lensShape: 'round', lensSize : 150, galleryActiveClass: 'active', imageCrossfade: true}); 

      $(zoom).on("click", function(e) {  
        var ez =   $(zoom).data('elevateZoom'); 
          $.fancybox(ez.getGalleryList());
          return false;
      });
  }
    

  // Quantity Increase Decrease
  if( $(".qty-plus-minus").length ){
      $(".qty-plus-minus").append('<div class="dec qty"><i class="fa fa-angle-down"></i></div><div class="inc qty"><i class="fa fa-angle-up"></i></div>');
  }

  if( $(".qty").length ){
      $(".qty").on("click", function() {

          var $button = $(this);
          var oldValue = $button.parent().find("input").val();

          if ($button.text() == " ") {
            var newVal = parseFloat(oldValue) + 1;

          }else {
             // Don't allow decrementing below zero
            if (oldValue > 0) {
              var newVal = parseFloat(oldValue) - 1;
            } else {
              newVal = 0;
            }
          }
          
          $button.parent().find("input").val(newVal);
      });    
  }

  // Go To Top
  if( gototop.length ){
    $(gototop).on("click", function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
       });       
      $window.scroll(function() {
        if($window.scrollTop() >= 550){
          $(gototop).fadeIn();
        }else{
          $(gototop).fadeOut();
        }           
    }); 
  }   

  // Rating    
  if( $(".rateus").length ){
      $(".rateus").rateYo({
        starWidth: "22.6px",
        spacing: "4.5px",
        normalFill: "rgba(51,51,51,0.5)",
        ratedFill: "#FC9A39"
      });
  }

  if( $(".set-rating").length ){
      $(".set-rating").rateYo({
        starWidth: "16px",
        spacing: "3.2px",
        normalFill: "#C9C9C9",
        ratedFill: "#FC9A39",
        readOnly: true
      });  
  }

  // Share Btn
  if( sharebtn.length ){
    $(sharebtn).on('click',function() {
      $( this ).next().css({
          'opacity': '1'
      });
      $( this ).css({
          'display': 'none'
      });
    });
  }

  // Preloader   
  $window.on('load', function(){ 
    $('.status').fadeOut();
    $('.preloader').delay(350).fadeOut('slow'); 
  }); 

})(jQuery);