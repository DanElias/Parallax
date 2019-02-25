$(document).ready(function(){$('.parallax').parallax();}) ;
$(document).ready(function(){$('.carousel').carousel({fullWidth: true, autoplay: true, indicators: false}).css('height',$(window).height()*0.8);});
$('.carousel.carousel-slider').carousel({fullWidth: true, autoplay: true, indicators: false});
autoplay();
function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}
$(document).ready(function(){$('.materialboxed').materialbox();});
$(document).ready(function(){$('.tooltipped').tooltip();});
$(document).ready(function(){$('.sidenav').sidenav();});
$(document).ready(function(){$('.modal').modal();});
$(document).ready(function(){$('.datepicker').datepicker();});
$(document).ready(function(){$('select').formSelect();});
$(document).ready(function(){$('.tabs').tabs();});