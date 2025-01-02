$(function() {
    AOS.init()
}), $(window).scroll(function() {
    $(window).scrollTop() >= 50 ? $("header").addClass("fixed-header") : $("header").removeClass("fixed-header")
}),
$(".business-cardslider").slick({
    centerMode: !0,
    slidesToShow: 3,
    dots: !1,
    autoplay: true,
    pauseOnFocus : false,
    swipe : false,
    touchThreshold: 100,
    autoplaySpeed: 1000,
     pauseOnHover: false,
   pauseOnDotsHover:false,
    edgeFriction: .05,
    arrows: !1,
    infinite: true,
    responsive: [{
        breakpoint: 1025,
        settings: {
            slidesToShow: 2
        }
    }],
    responsive: [{
        breakpoint: 456,
        settings: {
            slidesToShow: 1
        }
    }]
}),
$(".create-slider").slick({
    dots: false,
    autoplay: true,
    arrows: false,
    swipe : false,
    pauseOnHover:false


}), $(".charity-needhelp-slider").slick({
  slidesToShow: 3,
  dots: true,
  autoplay: true,
  autoplaySpeed: 900,
swipe : false,
  pauseOnDotsHover: false,
  // edgeFriction: .05,
  pauseOnHover:false,
  arrows: !1,
  infinite: !0,
    responsive: [{
        breakpoint: 1025,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        }
    }, {
        breakpoint: 769,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        breakpoint: 480,
        settings: {
          dots: true,
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }]
}), $(".charity-reviewsldier").slick({
    slidesToShow: 2,
    dots: !1,
    autoplay: true,
    autoplaySpeed: 1e3,
     pauseOnHover: false,
     swipe : false,
     pauseOnDotsHover: false,
     responsiveClass: true,
     loop: true,
    edgeFriction: .05,
    arrows: !1,
    infinite: !0,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 2
        }
    }],
    responsive: [{
        breakpoint: 456,
        settings: {
            slidesToShow: 1
        }
    }]
}), $("#testimonial10").slick({
    slidesToShow: 3,
    dots: !1,
    autoplay: !0,
    autoplaySpeed: 1e3,
     pauseOnHover: false,
     swipe : false,
    // pauseOnDotsHover: false,
    edgeFriction: .05,
    arrows: !1,
    infinite: !0,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 2
        }
    }],
    responsive: [{
        breakpoint: 456,
        settings: {
            slidesToShow: 1
        }
    }]
});
var a = function(a, b, c) {
    this.toRotate = b, this.el = a, this.loopNum = 0, this.period = parseInt(c, 10) || 2e3, this.txt = "", this.tick(), this.isDeleting = !1
};
a.prototype.tick = function() {
    var c = this.loopNum % this.toRotate.length,
        b = this.toRotate[c];
    this.isDeleting ? this.txt = b.substring(0, this.txt.length - 1) : this.txt = b.substring(0, this.txt.length + 1), this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";
    var d = this,
        a = 200 - 100 * Math.random();
    this.isDeleting && (a /= 2), this.isDeleting || this.txt !== b ? this.isDeleting && "" === this.txt && (this.isDeleting = !1, this.loopNum++, a = 500) : (a = this.period, this.isDeleting = !0), setTimeout(function() {
        d.tick()
    }, a)
}, window.onload = function() {
    for (var c = document.getElementsByClassName("typewrite"), b = 0; b < c.length; b++) {
        var e = c[b].getAttribute("data-type"),
            f = c[b].getAttribute("data-period");
        e && new a(c[b], JSON.parse(e), f)
    }
    var d = document.createElement("style");
    d.type = "text/css", d.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid transparent}", document.body.appendChild(d)
}, $(".video-img").on("click", function() {
    $(this).addClass("hide"), $(".embed-responsive").show().removeClass("hide"), $("video").each(function() {
        this.play()
    })
}), 
// $("#slider4").bsTouchSlider(), $(".carousel .carousel-inner").swipe({
//     swipeLeft: function(a, b, c, d, e) {
//         this.parent().carousel("next")
//     },
//     swipeRight: function() {
//         this.parent().carousel("prev")
//     },
//     threshold: 0
// }), 
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})

$('.testi7').owlCarousel({
	loop: true,
	margin: 30,
	nav: true,
	navText: ['<i class="fa mdi mdi-arrow-left-bold-circle-outline"></i>', '<i class="fa mdi mdi-arrow-right-bold-circle-outline"></i>'],
	dots: false,
	autoplay: true,
	center: true,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1
		},
		1650: {
			items: 1
		}
	}
});
$('.Testimonials10').owlCarousel({
	loop: true,
	margin: 30,
	nav: true,
	navText: ['<i class="fa mdi mdi-arrow-left-bold-circle-outline"></i>', '<i class="fa mdi mdi-arrow-right-bold-circle-outline"></i>'],
	dots: false,
	autoplay: true,
	center: true,
	responsiveClass: true,
	responsive: {
		0: {
			items: 1
		},
		768: {
			items: 3
		}
	}
});
$(document).ready(function() {
  jQuery(document).on("click", ".mega-dropdown", function(o) {
      o.stopPropagation();
    }),
    jQuery(document).on("click", ".navbar-nav > .dropdown", function(o) {
      o.stopPropagation();
    }),
    jQuery(document).on("click", "#test123 > .dropdown", function(o) {
      o.stopPropagation();
    }),
    $(".dropdown-submenu").click(function() {
      $(".dropdown-submenu > .dropdown-menu").toggleClass('show')
    });
});

var mybutton = document.getElementById("myBtn");
window.onscroll = function() {
	scrollFunction()
};

function scrollFunction() {
	if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		mybutton.style.display = "block";
	} else {
		mybutton.style.display = "none";
	}
}
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}



$(function() {
  $(document).click(function (event) {
    $('.navbar-collapse').collapse('hide');
  });

});
$('.op-clo').on('click', function() {
    $('body .h7-nav-box').toggleClass("show");
});
$('.tgl-cl').on('click', function() {
  $('body .h17-main-nav').toggleClass("show");
});
// $('.h17-main-nav').perfectScrollbar();

$(document).ready(function(){
    $('.testi9').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            1650: {
                items: 1
            }
        }
    });

    $('.testi10').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            1650: {
                items: 1
            }
        }
    });

    $('.testi4').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1

            },
            1650: {
                items: 1
            }
        }
    });

    $('.testi8').owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            1650: {
                items: 1
            }
        }
    });

    $('.port1').owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        autoplay: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            1170: {
                items: 1
            }
        }
    });
});

$(document).ready(function() {

    var toTop = $('#myBtn');

    // logic

    toTop.on('click', function() {

      $('html, body').animate({

        scrollTop: $('html, body').offset().top,

      });

    });  

    $('.toast').toast('show');

    $(function () {
        $('[data-bs-toggle="popover"]').popover();
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    // this is for the pricing 1
    $(".pricing1 .onoffswitch-label").click(function () {
        $(".pricing1 .monthly, .pricing1 .yearly").toggle();
    });

    // this is for the pricing 5
    $(".pricing5 .btn-group .btn").click(function () {
        $(".pricing5 .monthly, .pricing5 .yearly").toggle();
    });

    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    
    $("form#contactform").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        $('.response_message').hide();
        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            dataType: 'JSON',
            cache : false,
            processData: false,
            success: function(data) {
                $('.response_message').show();
                if(data.status == 1){
                    $('.response_message').html(data.message);      
                }else{
                    $('.response_message').html(data.message);      
                }
            },
        })
    });

    // $('#portfolio').mixItUp({  

    //     selectors: {
    //       target: '.tile',
    //       filter: '.filter',
    //       sort: '.sort-btn'
    //     },
        
    //         animation: {
    //         animateResizeContainer: false,
    //         effects: 'fade scale'
    //       }
      
    //   });
});