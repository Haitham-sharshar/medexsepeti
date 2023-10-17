/******************** Sign Up Validation ****************************/
function signUpValidateForm() {
    var x, y, z, i, valid = true;
    x = document.getElementById("openForm");
    y = x.getElementsByTagName("input");
    z = x.getElementsByClassName("select2");

    for (i = 0; i < y.length; i++) {
        if (y[i].value == "" && y[i].ariaRequired == "true") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    for (i = 0; i < z.length; i++) {
        if (z[i].value == "" && z[i].ariaRequired == "true") {
            z[i].className += " invalid";
            valid = false;
        }
    }
    return valid;
}
/******************** contact us Validation ****************************/
function contactValidateForm() {
    var x, y, z, i, valid = true;
    x = document.getElementById("contactForm");
    y = x.getElementsByTagName("input");
    z = x.getElementsByClassName("select2");

    for (i = 0; i < y.length; i++) {
        if (y[i].value == "" && y[i].ariaRequired == "true") {
            y[i].className += " invalid";
            valid = false;
        }
    }
    for (i = 0; i < z.length; i++) {
        if (z[i].value == "" && z[i].ariaRequired == "true") {
            z[i].className += " invalid";
            valid = false;
        }
    }
    return valid;
}
/******************** home banner carousel ****************************/
$(document).ready(function () {
    $(function(){
        $('.home_banner .owl-slider').owlCarousel({
            loop:true,
            nav:true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.home_banner.container-fluid .custom-nav',
            items:1,
            margin:0,
            smartSpeed: 1000,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplaySpeed: 1000
        });
    });
    /******************** menu scroll down ****************************/
    $(".slideDown").click(function(){
        $(".sub_menu").slideToggle();
        $('.sub_menu').css('display', 'block');
        $(".slideDown").toggleClass("arrow");
    });
    if ($(".sub_menu a").hasClass("active_link")) {
        $('.sub_menu').css('display', 'block');
        $(".slideDown").toggleClass("arrow");
    }
    /******************** controlling sidenav ****************************/
    $(".open-menu").click(function(){
        $("#background_overlay").fadeIn(200);
        $('#background_overlay').addClass('activeBG');
        $("#sidenavResponsive").css("left", "0px");
    });
    $('#sidenavResponsive').find('#close').on('click',function(){
        $('#sidenavResponsive').css('left', '-300px');
        $('#background_overlay').fadeOut(500);
        $('#background_overlay').removeClass('activeBG');
        $('#logo').css('display', 'block');
        $('#open-nav').css('display', 'block');
        $('#close').css('display', 'block');
    });
    // close modal on click outside at anywhere

    $(document).on('click',function(e){
            if( !(($(e.target).closest("#sidenavResponsive").length > 0 ) || ($(e.target).closest(".open-menu").length > 0))){
                $('#sidenavResponsive').css('left', '-300px');
                $('#background_overlay').removeClass('activeBG');
                $('#background_overlay').fadeOut(500);
            }
    });
    /******************** about us read more ****************************/
    $("#about_full_content").click(function(){
        // $('#about-more').css('display', 'inline');
        if ($("#about-more").css("display") == "none") {
            // $("#about-more").slideDown();
            $("#about_full_content").html("read less <span>&lt;&lt;</span>");
            $("#about-more").slideDown();
        } else {
            $("#about_full_content").html("read more <span>&gt;&gt;</span>");
            $("#about-more").slideUp();
        }
    });
    /******************** job show more ****************************/
    /*$(".details_job").click(function(){
        if ($(".requirements").css("display") == "none") {
            $(".details_job").html("show less");
            $(".requirements").css("display", "inline");
        } else {
            $(".details_job").html("...show more");
            $(".requirements").css("display", "none");
        }
    });*/
    $(".requirements").hide();
    $(".details_job").on("click", function() {
        $(this).prev('.requirements').slideToggle(0);
        console.log($(this).text().trim())
        if ($(this).text().trim() == "...show more") {
            $(this).text("show less");
        } else {
            $(this).text("...show more")
        }
    });
    /******************** Sign Up popup ****************************/
    $('.signUp').on('click', function(){
        $('.sign_up').fadeIn(200);
        $(".sign_up").css("display", "flex");

    });
    // close modal on clicking close button
    $('.container').find('#popup_close').on('click',function(){
        $(this).parents('.sign_up').fadeOut(500);
    });
    // close modal on click outside at anywhere
    $(document).on('click',function(event){
        if(!(($(event.target).closest("#openForm").length > 0 ) || ($(event.target).closest(".signUp").length > 0))){
            $('.sign_up').fadeOut(500);
    }
    });

    if ($.fn.select2 !== undefined) {
        $('.select2').select2({
          width: '100%'
        });
      }
    /******************** article popup ****************************/
    // $('.article').on('click', function(){
    //     $('.article_popup').fadeIn(200);
    //     $(".article_popup").css("display", "flex");
    // });
    // $('.article_img').on('click', function(){
    //     $('.article_popup').fadeIn(200);
    //     $(".article_popup").css("display", "flex");
    // });
    // // close modal on clicking close button
    // $('.container').find('#popup_close').on('click',function(){
    //     $(this).parents('.article_popup').fadeOut(500);
    // });
    // close modal on click outside at anywhere
    // $(document).on('click',function(event){
    //     if(!(($(event.target).closest("#openPopup").length > 0 ) || ($(event.target).closest(".article_img").length > 0) || ($(event.target).closest(".article").length > 0))){
    //         $('.article_popup').fadeOut(500);
    // }
    // });
    /******************** services popup ****************************/
    $('.view_service').on('click', function(){
        $('.service_popup').fadeIn(200);
        $(".service_popup").css("display", "flex");
    });
    // close modal on clicking close button
    $('.container').find('#popup_close').on('click',function(){
        $(this).parents('.service_popup').fadeOut(500);
    });
    // close modal on click outside at anywhere
    $(document).on('click',function(event){
        if(!(($(event.target).closest("#openService").length > 0 ) || ($(event.target).closest(".view_service").length > 0))){
            $('.service_popup').fadeOut(500);
    }
    });
    /******************** offers carousel ****************************/
    $(function(){
        $('.offer_sec .owl-slider').owlCarousel({
            loop:true,
            nav:true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            navContainer: '.offer_sec.container-fluid .custom-nav',
            items:4,
            smartSpeed: 1000,
            autoplay: false,
            autoplayTimeout: 8000,
            autoplaySpeed: 1000,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    loop:true
                },
                400:{
                    items:2,
                    nav:false,
                    loop:true
                },
                800:{
                    items:4,
                    nav:false,
                    loop:true
                }
            }
        });
    });
    /******************** show more categories ****************************/
    $(document).ready(function(){
        $(".category.col-md-4").slice(0,6).show();
        $(".allCategories.show_more").click(function(e){
        e.preventDefault();
        $(".category.col-md-4:hidden").slice(0,6).fadeIn("slow");

        if($(".category.col-md-4:hidden").length == 0){
            $(".allCategories.show_more").fadeOut("slow");
            }
        });
    })
    /******************** show more vendors ****************************/
    $(document).ready(function(){
        $(".item.col-6").slice(0,8).show();
        $(".allVendors.show_more").click(function(e){
        e.preventDefault();
        $(".item.col-6:hidden").slice(0,8).fadeIn("slow");

        if($(".item.col-6:hidden").length == 0){
            $(".allVendors.show_more").fadeOut("slow");
            }
        });
    })
    /******************** show more products ****************************/
    $(document).ready(function(){
        $(".article.col-12").slice(0,6).show();
        $(".allArticles.show_more").click(function(e){
        e.preventDefault();
        $(".article.col-12:hidden").slice(0,6).fadeIn("slow");

        if($(".article.col-12:hidden").length == 0){
            $(".allArticles.show_more").fadeOut("slow");
            }
        });
    })
    /******************** show more jobs ****************************/
    $(document).ready(function(){
        $(".job.col-12").slice(0,6).show();
        $(".allJobs.show_more").click(function(e){
        e.preventDefault();
        $(".job.col-12:hidden").slice(0,6).fadeIn("slow");

        if($(".job.col-12:hidden").length == 0){
            $(".allJobs.show_more").fadeOut("slow");
            }
        });
    })
    /******************** show more services ****************************/
    $(document).ready(function(){
        $(".service.col-12").slice(0,6).show();
        $(".allServices.show_more").click(function(e){
        e.preventDefault();
        $(".service.col-12:hidden").slice(0,6).fadeIn("slow");

        if($(".service.col-12:hidden").length == 0){
            $(".allServices.show_more").fadeOut("slow");
            }
        });
    })
})

