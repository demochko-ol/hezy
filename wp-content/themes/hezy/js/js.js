$(function (){
    var numberImages = $('img').length;
    var numberLoaded = 0;

    $('img').load(function() {
        numberLoaded++;
        var progress = Math.round(numberLoaded * 100 / numberImages);
        /*$('body').css('overflow', 'hidden');*/
        $('#preloader .perc').text(progress + '%');
        $('#preloader .line').stop().animate({
            width: progress + '%'
        }, 500, 'linear', function() {});
    });

    $(window).load(function() {
        setTimeout(function() {
            $('#preloader').fadeOut();
          /*  $('body').css('overflow', 'auto');*/
        }, 1000);
    });



    $(function() {
        var price_none = $(".add_to_cart_btn").find('form');
        if(!price_none.length) {
            $('.add_to_cart_btn').css({'display' : 'none'});
        }
        if(!$('.free-download-link').length){
            $('.download_btn').remove();
        }
    });

    $('#fullpage').fpSlider({

        /* anchors: ['', '', '', 'works'],*/

        navigation: true,

        navigationPosition: 'right',

        scrollOverflow: true

    });
    $(function(){
        $('.download-link').remove();
    });
    $(function(){
        $('#list > li').hoverdir();
    });

    $('.bxslider').bxSlider({
        adaptiveHeight: true
    });

    $('.navbar_button').click(function() {

        if ($('.wrapper').hasClass('move-right')) {

            $('body').css({'overflow-x' : 'hidden'})

            $('.wrapper').removeClass('move-right');

            $('.navbar_button').removeClass('glyphicon-remove');

            $('.main_nav').removeClass('open');

            $('.navbar_button').addClass('glyphicon-th-list');

            $('.wrapper').click( function/*(event){
             if( $(event.target).closest(".main_nav").length )
             return;
             $(".main_nav").removeClass("open");
             event.stopPropagation();
             });*/(){

            });


        } else {

            $('.navbar_button').addClass('glyphicon-remove');

            $('.main_nav').addClass('open');

            $('.navbar_button').removeClass('glyphicon-th-list');

            $('.wrapper').addClass('move-right');

        }

    });

    $(".shopping-cart-button").click(function () {

        if ($('.wrapper').hasClass('move-left')) {

            $('.wrapper').removeClass('move-left');

            $('.shopping-cart-button').removeClass('glyphicon-remove');

            $('.shopping-cart').removeClass('open');

            $('#fp-nav.right').css({'right' : '17px'})

        } else {

            $('.shopping-cart-button').addClass('glyphicon-remove');

            $('.shopping-cart').addClass('open');

            $('.wrapper').addClass('move-left');

            $('#fp-nav.right').css({'right' : '100%'})

        }

    });

    $('#scrollup').click( function(){
        var delay = 700;
        $('body, html').animate({
            scrollTop: 0
        }, delay);
    });

    $(window).scroll(function () {
        if ($(document).scrollTop() <= 1) {
            $('.page-nav').removeClass('nav-white');
            $('.fixed_panel').removeClass('show');
        } else {
            $('.page-nav').addClass('nav-white');
            $('.fixed_panel').addClass('show');
        }
    });


    $('.cart-btn').appendTo( $('.fixed_panel') );

    $('.col-6.product_description > #gallery-1').appendTo( $('.show_images') );


    /*function changeHeight(){
        $.each($('#section2 .img_container img'),function(){
            var containerHeight = $(this).parent().innerHeight(),
                imgHeight = $(containerHeight).children();

            $(this).attr('height', containerHeight);
        });
    }
    changeHeight();*/
/*

    $(window).resize(function(){
        changeHeight();
    });
*/




    $('.section .woocommerce-error, .section .woocommerce-message').appendTo('.wrapper');

    if($(".woocommerce-error, .woocommerce-message").length>0) {
        $('body').addClass('move-bottom');
        setTimeout(function() {
            $( '.woocommerce-error, .woocommerce-message' ).slideUp('slow');
            $('body').removeClass('move-bottom');
        }, 4000);
    }

    /*$('.wpcf7-submit').attr('value', 'submit');*/
    $('.wpcf7-submit').click(function(){
        if($(".wpcf7-response-output").css('display','block')) {
            $('body').addClass('move-bottom');
            setTimeout(function() {
                $('body').removeClass('move-bottom');
                $( '.wpcf7-response-output' ).slideUp('slow');
            }, 4000);
        }
    });

    $('#gallery-1 figure:nth-child(5), #gallery-1 figure:nth-child(8)').addClass('dark_bg');

    $('.screens a').addClass('gallery_items');

    while(($children = $(':not(.col)>.gallery_items:lt(5)')).length) {
        $children.wrapAll($('<div class="col"></div>'));
    }

    $("#screenshots").click(function() {
        var delay = 0;
        if($(".screens").is(":hidden")){
            $(".screens").show("normal");
            $('.screens a').each(function(){
                $(this).delay(delay).animate({opacity: "1", marginTop: '0px',marginBottom: '21px', marginLeft: '0px',marginRight: '0px'}, 500);
                delay = delay+60;
            });

        } else {
            $(".screens").slideUp(1000);
            $('.screens li').each(function(){
                $(this).delay(delay).animate({opacity: "0", marginTop: '40px',marginBottom: '19px', marginLeft: '-5px',marginRight: '5px'}, 500);
                delay = delay+50;
            });

        }
    });

    $('#section3 #menu-categories-filter li:first').addClass('current-menu-item');

    $('.newsletter-email').attr('value', 'E-mail address');
});

$(function(){
    //navigation
    $('#menu-categories-filter a').click(function(){
        var page = $(this).attr("href"), url = page,
            categoriesContainer = "#works-content",
            categoriesContent =  $(categoriesContainer).children();
        $(categoriesContent).remove();
        $(categoriesContainer).append('<div class="load"></div>')
        $.ajax({
            url: url,
            success: function(response) {
                appendCategories(response);
            },
            error: function(response) {
                /*$(loadingId).text("Sorry, there was some error with the request. Please refresh the page.");*/
            }
        });
        var appendCategories = function(response) {
            var loadPage = $(response).find('#works-content').children(),
                pageNew = $(response).find('#pagination a').attr("href"),
                pageThis = $(document).find('#pagination a').attr("href"),
                pageNewLink = $(response).find('#pagination a');

                $(loadPage).appendTo($(categoriesContainer));
                $('#list > li').hoverdir();
                $(categoriesContainer).find(".load").remove();

            if(pageNew && !pageThis){
                $('#pagination').append(pageNewLink);
                $('#pagination a').unbind("click").click(function(){
                    var page = $(this).attr("href"),
                        pageLink = $(this),
                        loadingId = "#loading-div",
                        container = "#list";

                    var url = page;
                    $(pageLink).text("Loading...");
                    $.ajax({
                        url: url,
                        success: function(response) {
                            appendContests(response);
                        },
                        error: function(response) {
                            $(loadingId).text("Sorry, there was some error with the request. Please refresh the page.");
                        }
                    });
                    var appendContests = function(response) {
                        var loadMore = $(response).find('#list').children(),
                            pageNew = $(response).find('#pagination a').attr("href");
                        $(loadMore).appendTo($(container));
                        $(pageLink).text("view more +");
                        if(pageNew){
                            $(pageLink).attr('href', pageNew);
                        }else{
                            $(pageLink).remove();
                        }
                    };
                    return false;

                });
            }

        };
        //cancel browser default so the page doesn't reload
        $('#menu-categories-filter li').removeClass("current-menu-item");
        $(this).parent().addClass("current-menu-item");

        return false;

    });

    $(document).bind("ajaxComplete",function(){
        $('#list > li').hoverdir();
    });
});


$(function(){
    //navigation
    $('#pagination a').unbind("click").click(function(){
        var page = $(this).attr("href"),
            pageLink = $(this),
            loadingId = "#loading-div",
            container = "#list";

        var url = page;
        $(pageLink).text("Loading...");
        $.ajax({
            url: url,
            success: function(response) {
                appendContests(response);
            },
            error: function(response) {
                $(loadingId).text("Sorry, there was some error with the request. Please refresh the page.");
            }
        });
        var appendContests = function(response) {
            var loadMore = $(response).find('#list').children(),
                pageNew = $(response).find('#pagination a').attr("href");
            $(loadMore).appendTo($(container));
            $(pageLink).text("view more +");
            if(pageNew){
                $(pageLink).attr('href', pageNew);
            }else{
                $(pageLink).remove();
            }
        };
        return false;

    });

    $(document).bind("ajaxComplete",function(){
        $('#list > li').hoverdir();/*
         $( '.woocommerce-error, .woocommerce-message' ).slideUp('slow');*/
        setTimeout(function() {
            $( '.woocommerce-error, .woocommerce-message' ).slideUp('slow');
        }, 4000);
    });

});
