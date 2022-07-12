(function($){
  $(function(){

  	$(".button-collapse").sideNav();
  	$('.dropdown-button').dropdown({constrainWidth: false, /*editar y eliminar del gestor*/});
  	$('.modal').modal();
  	$('.slider').slider({interval: 4000});
  	$('.carousel.carousel-slider').carousel({fullWidth: true,duration:0,dist:0,noWrap:true,indicators:false,shift:0});

  }); // end of document ready
})(jQuery); // end of jQuery name space

