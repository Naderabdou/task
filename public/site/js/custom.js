
// Aos
AOS.init();




setTimeout(() => {
  $(".loader").fadeOut(1000);
}, 100);





if ($('#slider_1').length) {
  $('#slider_1').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    responsiveClass: true,
    items: 3,
    rtl:true,
    dots: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1,

      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      }
    }
  })
}


$('.remove_mune').click(function () {
  $('#menu-div').removeClass('active')
  $('.bg_menu').removeClass('active')
})


function open() {
  $('.navicon').addClass('is-active');
  $("#menu-div").addClass("active")
  $("#times-ican").addClass("active");
  $('.bg_menu').addClass('active');

}

function close() {
  $('.navicon').removeClass('is-active');
  $("#menu-div").removeClass("active")
  $("#times-ican").removeClass("active");
  $('.bg_menu').removeClass('active')
  $('.remove_mune').click(function () {
    $('#menu-div').removeClass('active')
    $('.bg_menu').removeClass('active')
  })

}

$("#times-ican").click(function () {
  if ($(this).hasClass('active')) {
    close()
  } else {
    open();
  }
})

var $winl = $(window); // or $box parent container
var $boxl = $("#menu-div, #times-ican");
$winl.on("click.Bst", function (event) {
  if (
    $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
    !$boxl.is(event.target) //checks if the $box itself was clicked
  ) {
    close()
  }
});








// scorll Top
$('#scroll-1').click(function () {
  $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top - 100
  }, 600);
  return false;
});


// scorll Top
$('#scroll-2').click(function () {
  $('html, body').animate({
    scrollTop: $($(this).attr('href')).offset().top - 100
  }, 600);
  return false;
});



// upload images
$(document).ready(function () {
  var readURL = function (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.profile-pic').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }


  $(".file-upload").on('change', function () {
    readURL(this);
  });

  $(".upload-button").on('click', function () {
    $(".file-upload").click();
  });
});




