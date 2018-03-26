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
        circle4 = $('#number4'),
        circle1Number = $('#number1').data('number-block-item'),
        circle2Number = $('#number2').data('number-block-item'),
        circle3Number = $('#number3').data('number-block-item'),
        circle4Number = $('#number4').data('number-block-item'),
        circle1Sign = $('#number1').data('sign-block-item'),
        circle2Sign = $('#number2').data('sign-block-item'),
        circle3Sign = $('#number3').data('sign-block-item'),
        circle4Sign = $('#number4').data('sign-block-item');

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
                $(this).find('p').html(Math.round(parseInt(circle1Number) * progress));
            }).on('circle-animation-end', function (event) {
                if(circle1Sign){
                    $(this).find('p').html(circle1Number + circle1Sign);
                }
            });
            circle2.circleProgress({
                value: 0.4,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(parseInt(circle2Number) * progress));
            }).on('circle-animation-end', function (event) {
                if(circle2Sign){
                    $(this).find('p').html(circle2Number + circle2Sign);
                }
            });
            circle3.circleProgress({
                value: 0.82,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(parseInt(circle3Number) * progress));
            }).on('circle-animation-end', function (event) {
                if(circle3Sign){
                    $(this).find('p').html(circle3Number + circle3Sign);
                }
            });
            circle4.circleProgress({
                value: 0.3,
                size: 120,
                fill: {
                    gradient: ['#4e1624', '#4e1624']
                }
            }).on('circle-animation-progress', function (event, progress) {
                $(this).find('p').html(Math.round(parseInt(circle4Number) * progress));
            }).on('circle-animation-end', function (event) {
                if(circle4Sign){
                    $(this).find('p').html(circle4Number + circle4Sign);
                }
            });
        },
        offset: '75%'
    });

}

function select2() {
  var promxSelect = $('.promx-select');
  var placeholderAttr = promxSelect.data('placeholder');
  var placeholder = (placeholderAttr) ? placeholderAttr : "Select option";
  if ($.fn.select2) {
      promxSelect.select2({
      minimumResultsForSearch: -1,
      placeholder: placeholder
    });
  }
}