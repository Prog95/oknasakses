$(function() {
    var doorSlider,
        handleSlider;

    if ($('#door_slider').length) {
        doorSlider = initSwiperSlider('#door_slider');

        $('#door_slider .swiper-container .swiper-slide').on('click', function(e) {
            clickHandler(doorSlider, '#door_slider');
        });
    }

    if ($('#handle_slider').length) {
        handleSlider = initSwiperSlider('#handle_slider');

        $('#handle_slider .swiper-container .swiper-slide').on('click', function(e) {
            clickHandler(handleSlider, '#handle_slider');
        });

        $('#handle_slider .swiper-container .swiper-slide[data-slide="0"]').trigger('click');
    }



});

$(document).on('click','.spoiler-trigger',function(e){
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).parent().find('.spoiler-block').first().slideToggle(300);
        $(this).parent().find('.spoiler-img').toggleClass('active')
    })


function clickHandler(slider, id) {
    if (slider.clickedIndex !== undefined) {
        $(id + ' .swiper-container .swiper-slide .item').removeClass('active');
        $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.clickedIndex + '"] .item').addClass('active');

        var doorImage,
            handleImage;

        doorImage = $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.clickedIndex + '"] .item').attr('data-door-image');
        handleImage = $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.clickedIndex + '"] .item').attr('data-handle-image');

        if (doorImage) {
            $('#window_block').find('.mask').css('background-image', 'url(' + doorImage + ')');
        }

        if (handleImage) {
            $('#window_block').find('.handle').css('background-image', 'url(' + handleImage + ')');
        }

    }
}

function setInitImages(slider, id) {
    if (slider.activeIndex !== undefined) {
        $(id + ' .swiper-container .swiper-slide .item').removeClass('active');
        $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.activeIndex + '"] .item').addClass('active');

        var doorImage,
            handleImage;

        doorImage = $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.activeIndex + '"] .item').attr('data-door-image');
        handleImage = $(id + ' .swiper-container .swiper-slide[data-slide="' + slider.activeIndex + '"] .item').attr('data-handle-image');

        if (doorImage) {
            $('#window_block').find('.mask').css('background-image', 'url(' + doorImage + ')');
        }

        if (handleImage) {
            $('#window_block').find('.handle').css('background-image', 'url(' + handleImage + ')');
        }

    }
}


function initSwiperSlider(id) {
    if (!id) return;



    var options = {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        slidesPerView: 5,
        slidesPerGroup: 5,
        spaceBetween: 16,
        // observer: true,
        // observeParents: true,
        // observeSlideChildren: true,
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 3,
                slidesPerGroup: 3,
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 3,
                slidesPerGroup: 3
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 4,
                slidesPerGroup: 4
            },
            768: {
                slidesPerView: 5,
                slidesPerGroup: 5
            }
        },
        // If we need pagination
        pagination: {
            el:  id + ' .swiper-pagination',
        },

        on: {
            init: function(slider) {
                setInitImages(slider, id);
                console.log('init ' + id + ' ' + slider.activeIndex);

            },
            slideChange: function(slider) {
                console.log('change ' + slider.activeIndex);
            },
            click: function(slider) {

                console.log('click ' + slider.clickedIndex);
            }

        },

        // Navigation arrows
        navigation: {
            nextEl: id + ' .swiper-button-next',
            prevEl: id + ' .swiper-button-prev',
            disabledClass: 'diss',
            lockClass: 'lokek'
        },
    }

    if (id === '#door_slider') options.slidesPerColumn = 2;


    return new Swiper(id + ' .swiper-container', options);
}
    
var swiper = new Swiper('.block-itemsVideo--wrap', {
    slidesPerView: 3,
    slidesPerColumn: 1,
    slidesPerColumnFill:"row",
    spaceBetween: 30,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 1,
            slidesPerGroup: 1,
        },
        768: {
            slidesPerView: 3,
            slidesPerGroup: 3
        }
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});
$(document).ready(function () {
    $('.anchor').click(function(event) {
        event.preventDefault();
        var id = $(this).attr('href');
        var top = $(id).offset().top;
        $('body,html').animate({ scrollTop: top - 95 }, 300);
    });
    $("input[type='tel']").mask("+7(999)-999-99-99");
});

$(document).ready(function() {

    $('.nav_btn').click(function(){
        $(this).parents('.tabs_my').find('.nav_btn').removeClass('act');
        $(this).addClass('act');
        $(this).parents('.tabs_my').find('.content_bl .cont_bl').removeClass('active');
        $(this).parents('.tabs_my').find('.content_bl .cont_bl:nth-child('+(parseInt($(this).index()+1))+')').addClass('active');
        $('.btn_nav_bl').attr('data-class', 'num' + (parseInt($(this).index()+1)));
    });

    $('.questions_inner').click(function(){
        $(this).toggleClass('active');
    });

    $('#blog1201 .advantages .more').click(function(){
        $('#blog1201 .advantages .text_all').show();
        $(this).hide();
        return false;
    });

});


function opentable() {
    document.getElementById("table-all").style.display = "table-row-group";
    document.getElementById("button-open").style.display = "none";
    document.getElementById("button-close").style.display = "block";
}

function openclose() {
    document.getElementById("table-all").style.display = "none";
    document.getElementById("button-close").style.display = "none";
    document.getElementById("button-open").style.display = "block";
}

// function opentext() {
//     document.getElementById("text-further").style.display = "inline-block";
//     document.getElementById("button-further").style.display = "none";
// }
//
// function opentextLod() {
//     document.getElementById("text-further_Lod").style.display = "inline-block";
// }
$(document).ready(function(){
    $('#button-further-new').click(function(){
        $('#text-further').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('#button-further-new').html('Читать далее');
            } else {
                $('#button-further-new').html('Скрыть текст');
            }
        });
        return false;
    });
    $('#button-further_Lod').click(function(){
        $('#text-further_Lod').slideToggle(300, function(){
            if ($(this).is(':hidden')) {
                $('#button-further_Lod').html('Читать далее');
            } else {
                $('#button-further_Lod').html('Скрыть текст');
            }
        });
        return false;
    });
});



// function repairServicesItemAll() {
//     document.querySelector('.repair-services_item').style.display = "block";
// }

$('.repair-services_item-all').click(function(){
    $(".repair-services_item:nth-child(n+4)").fadeToggle(100);
    $(".repair-services_item-all").hide(100);
});

for (let i = 1; i <= 6; i++) {
    $("#button_text"+(2*i-1)).click(function () {
        $(".window_option .window_option-all:nth-child("+(i+2)+") .window_option-block-content-text .window_option-block-content-text-p").hide();
        $(".window_option .window_option-all:nth-child("+(i+2)+") .window_option-block-content-text .window_option-block-content-text-b").show();
        $("#button_text"+(2*i-1)).addClass('active_button');
        $("#button_text"+(2*i)).removeClass('active_button');
    });
    $("#button_text"+(2*i)).click(function () {
        $(".window_option .window_option-all:nth-child("+(i+2)+") .window_option-block-content-text .window_option-block-content-text-p").show();
        $(".window_option .window_option-all:nth-child("+(i+2)+") .window_option-block-content-text .window_option-block-content-text-b").hide();
        $("#button_text"+(2*i)).addClass('active_button');
        $("#button_text"+(2*i-1)).removeClass('active_button');
    });
}


// $(document).ready(function() {
//     $(window).resize(function() {
//         if ($(window).width() <= '995') {
//             $('#sliader').removeClass('slaider')
//         }
//     });
// });
            if ($(window).width() >= '576') {
                $('.slaider').slick({
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    prevArrow: '<span class="icon-left" aria-hidden="true">' +
                        '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' +
                        '\t width="30px" height="30px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">\n' +
                        '\n' +
                        '\t<g id="chevron-left">\n' +
                        '\t\t<polygon points="247.35,35.7 211.65,0 58.65,153 211.65,306 247.35,270.3 130.05,153 \t\t" fill="#000000"/>\n' +
                        '\t</g>\n' +
                        '\n' +
                        '\n' +
                        '</svg>' +
                        '</span>',
                    nextArrow: '<span class="icon-right" aria-hidden="true">' +
                        '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"\n' +
                        '\t width="30px" height="30px" viewBox="0 0 306 306" style="enable-background:new 0 0 306 306;" xml:space="preserve">\n' +
                        '\n' +
                        '\t<g id="keyboard-arrow-right">\n' +
                        '\t\t<polygon points="58.65,267.75 175.95,153 58.65,35.7 94.35,0 247.35,153 94.35,306 \t\t" fill="#000000"/>\n' +
                        '\t</g>\n' +
                        '\n' +
                        '</svg>' +
                        '</span>',
                    responsive: [
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,

                            }
                        }
                ]
                });

            }

// $('.burger-wrap').click(function(){
//     $('html').toggleClass("overlow_html");
// })
