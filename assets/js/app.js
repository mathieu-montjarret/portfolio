$(document).ready(function () {

  /*          dark effect + local storage         */

  $('#body').toggleClass(window.localStorage.toggled);

  $('#nightMode').on('click',function(){
    
    if (window.localStorage.toggled != "bg-dark" ) {
        $('#body').toggleClass("bg-dark", true );
        window.localStorage.toggled = "bg-dark";
    } else {
        $('#body').toggleClass("bg-dark", false );
        window.localStorage.toggled = "";
    }
});

  /*          scroll effect          */

  $(window).on('scroll', function () {

    var elmt = $('.from-left, .from-right');
    var scroll = $(window).scrollTop();

    $(elmt).each(function () {

      var topImg = $(this).offset().top - 500;

      if (topImg < scroll) {

        $(this).css("transform", "translate(0,0)");
        $(this).css("opacity", "1");

      };
    });
  });

  $('button').click(function(){
    window.location.href = '#contact';
  });

  /*          onload effect          */

  $(window).on('load', function () {
      var title = $('.from-top');
      $(title).css("transform", "translate(0,0)");
      $(title).css("opacity", "1");  
  });

  /*            burger menu         */

  $("#open").click(function () {
    $(".nav-part").slideToggle("slow", function () {
      $("#close").show();
      $("#open").hide();
    });
  });

  $("#close").click(function () {
    $(".nav-part").slideToggle("slow", function () {
      $("#open").show();
      $("#close").hide();
    });
  });

  $("main").click(function () {
    $(".nav-part").slideUp("slow", function () {
      $("#open").show();
      $("#close").hide();
    });
  });

  /*            projects gallery            */     
  
  const article = [1,2,3,4];
  article.map((value,index) => {
    $(`.article${value}`).mouseenter(function () {
      $(`.p-article${value}`).css('visibility', 'visible');
      $(`.p-article${value}`).animate({opacity: 1}, 1000);
    });
  
    $(`.article${value}`).mouseleave(function () {
      $(`.p-article${value}`).animate({opacity: 0}, 1000);
    });
  }) 
});