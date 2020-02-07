$(function () {
  $(document).scroll(function () {
    let scrolledLevel = $(document).scrollTop();
    if (scrolledLevel > 10) {
      $('.navbar').addClass('give-background');
    } else {
      $('.navbar').removeClass('give-background');
    }
  });
})