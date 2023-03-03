jQuery(document).ready(function(){
    var $ = jQuery.noConflict();


    function hoverEffect(){
        $(".city-wrapper").each(function(i){


            const content = $(this).find('.city .pin-position .content')
            const mobileContent = $(this).find('.mobile-content')
            const dot = $(this).find('.city .pin-position .dot')
            const exitPopup = $(this).find('.mobile-content .mobile-content-close')





            if($( window ).width() <= 510){
                console.log('Small device logic')

                dot.off();

                dot.on('click', function(){

                    console.log('on')

                    mobileContent.fadeIn()

                    dot.addClass('bigDot')

                })

                exitPopup.on('click', function(){


                    console.log('off')


                    mobileContent.fadeOut()

                    dot.removeClass('bigDot')
                })


            } else{
                dot.off();
                console.log('bigdevide')
                mobileContent.fadeOut();


                dot.on('mouseover', function(){

                    console.log('on')

                    content.fadeIn()

                    dot.addClass('bigDot')

                })

                dot.on('mouseleave', function(){


                    console.log('off')


                    content.fadeOut()

                    dot.removeClass('bigDot')
                })
            }


        })
    }
    hoverEffect()




    function hoverRegionEfect(){

        let lastItem = "";


        $(".poland path").each(function(i) {



            $(this).on('mouseover', function (){

                $(lastItem).css({fill: "#a6d71e"});
                $('div.hover').css({display: "flex"});

                lastItem = this;
                $(this).css({fill: "#55B047"});

                $(this).on('mouseleave', function (lastItem){
                    $('div.hover').css({display: "none"});
                    $(lastItem).css({fill: "#a6d71e"});

                })
            })



        }
        )};

    hoverRegionEfect()





    $( window ).resize(function() {
        hoverEffect()
    });






});
