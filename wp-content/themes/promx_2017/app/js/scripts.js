$(window).load(function () {
  homeSlider();
});

$(document).ready(function () {
  select2();
  if ($('.numbers-item').length > 0) {
    numbers();
  }
});

function homeSlider() {
  if ($.fn.slick) {
    $('.featured-slider').slick({
      lazyLoad: 'ondemand',
      arrows: false,
      dots: false,
      infinite: false,
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 8000,
    });
  }
}

function numbers() {
    var circle1 = $('#number1'),
        circle2 = $('#number2'),
        circle3 = $('#number3'),
        circle4 = $('#number4');

    var waypoint = new Waypoint({
        element: document.getElementById('numbers'),
        handler: function () {
            circle1.circleProgress({
                value: 0.9,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(500 * progress));
            });
            circle2.circleProgress({
                value: 0.4,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(25 * progress));
            });
            circle3.circleProgress({
                value: 0.82,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(82 * progress));
            });
            circle4.circleProgress({
                value: 0.3,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(17 * progress));
            });
        },
        offset: '75%'
    });

}

function select2() {
  if ($.fn.select2) {
    $('.promx-select').select2({
      minimumResultsForSearch: -1,
      placeholder: "Select vacancy"
    });
  }
}