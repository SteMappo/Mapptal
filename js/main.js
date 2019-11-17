// Start Jquery
jQuery(document).ready(function() {

    //Responsive Nav - On click of hamburger make 3 elemtents active
    // 1 hamburger effect 2.Display menu 3. cover screen with overlay
	jQuery('.hamburger--squeeze').click(function(e) {
        jQuery(this).toggleClass('is-active');
        // jQuery('.inner-nav .nav-menu').toggleClass('is-active');
        jQuery('.nav').toggleClass('is-open');
        jQuery('.nav-overlay').toggleClass('active');
        e.preventDefault();
        
    });
// Show sub navagtion on click of the menu with the class '.main-menu-item'
    jQuery('.main-menu-item').click(function(e){
        jQuery('.sub-menu').toggleClass('.sub-menu-active');
        e.preventDefault();
    });

    jQuery(function($){
      $('#filter').submit(function(){
        var filter = $('#filter');
        $.ajax({
          url:filter.attr('action'),
          data:filter.serialize(), // form data
          type:filter.attr('method'), // POST
          beforeSend:function(xhr){
            filter.find('button').text('Processing...'); // changing the button label
          },
          success:function(data){
            filter.find('button').text('Apply filter'); // changing the button label back
            $('#response').html(data); // insert data
          }
        });
        return false;
      });
    });

    jQuery(function($){
      // $("#owl-carousel").owlCarousel();
        $('#owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      // nav:true,
      smartSpeed: 3000,
      autoplay: true,
      autoplayTimeout: 7000,
      dots:true,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:1
          }
      }
  })
  
  
  });

// Isotope filter and grid setup with load more button :)
jQuery(function ($) {
 
 var $container = $('#isotope-list'); //The ID for the list with all the blog posts
 $container.isotope({ //Isotope options, 'item' matches the class in the PHP
 itemSelector : '.grid-item', 
   layoutMode : 'masonry',
   percentPosition: true,
   masonry: {
    fitWidth: true,
    columnWidth: '.grid-sizer',
    gutter:20,

  }
 });

 
 //Add the class selected to the item that is clicked, and remove from the others
 var $optionSets = $('#filters'),
 $optionLinks = $optionSets.find('a');
 
 $optionLinks.click(function(){
 var $this = $(this);
 // don't proceed if already selected
 if ( $this.hasClass('selected') ) {
   return false;
 }
 var $optionSet = $this.parents('#filters');
 $optionSets.find('.selected').removeClass('selected');
 $this.addClass('selected');
 
 //When an item is clicked, sort the items.
 var selector = $(this).attr('data-filter');
 $container.isotope({ filter: selector });
 
 return false;
 });

 // external js: isotope.pkgd.js

  // init Isotope
  var $container = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'masonry',
    masonry:{
      gutter: 20,
      horizontalOrder: true,
     }
  });


  //****************************
  // Isotope Load more button
  //****************************
  var initShow = 3; //number of items loaded on init & onclick load more button
  var counter = initShow; //counter for load more button
  var iso = $container.data('isotope'); // get Isotope instance

  loadMore(initShow); //execute function onload

  function loadMore(toShow) {
    $container.find(".hidden").removeClass("hidden");

    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
      return item.element;
    });
    $(hiddenElems).addClass('hidden');
    $container.isotope('layout');

    //when no more to load, hide show more button
    if (hiddenElems.length == 0) {
      jQuery("#load-more").hide();
    } else {
      jQuery("#load-more").show();
    };

  }

  //append load more button
  // $container.after('<button id="load-more"> Load More</button>');

  //when load more button clicked
  $("#load-more").click(function() {
    if ($('#filters').data('clicked')) {
      //when filter button clicked, set initial value for counter
      counter = initShow;
      $('#filters').data('clicked', false);
    } else {
      counter = counter;
    };

    counter = counter + initShow;

    loadMore(counter);

  });

  
  //when filter button clicked
  $("#filters").click(function() {
    $(this).data('clicked', true);

    loadMore(initShow);

  });

});

});

// jQuery(document).ready(function() {

// });

function myMap() {
    var mapProp= {center:new google.maps.LatLng(-8.616220,115.159640),zoom:13,};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({position:mapProp.center,animation:google.maps.Animation.BOUNCE});
    marker.setMap(map);};
