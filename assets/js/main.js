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

        let lastRegion = ".poland path.slask";
        let lastItem = ".poland .region-wrapper .slask";
        let regions = {
            pomorskie: 'Pomorskie',
            slaskie: 'Śląskie',
            warminskomazurskie: 'Warmińsko-mazurskie',
            opolskie: 'Opolskie',
            podkarpackie: 'Podkarpackie',
            lubelskie: 'Lubelskie',
            podlaskie: 'Podlaskie',
            mazowieckie: 'Mazowieckie',
            lodzkie: 'Łódzkie',
            zachodniopomorskie: 'Zachodnio-pomorskie',
            kujawskopomorskie: 'Kujawsko-pomorskie',
            malopolskie: 'Małopolsie',
            wielkopolskie: 'Wielkopolskie',
            dolnoslaskie: 'Dolnośląskie',
            lubuskie: 'Lubuskie',
            swietokrzyskie: "Świętokrzyskie"



        };

        $(".poland path").each(function(i) {

            $(this).on('mouseover', function (){

                $(lastRegion).css({fill: "#a6d71e"});
                $(lastItem).css({display: "none"});

                let dataRegion = $(this).data("region")
                let region = 'div.' + dataRegion;

                console.log(dataRegion)

                if(!$(region).length){

                    let regionTitle = regions[dataRegion];
                    console.log(regionTitle)
                    $('.region.empty .region-title').text(regionTitle)
                    region = '.region.empty'

                }

                $(region).css({display: "flex"});


                lastRegion = this;
                lastItem = region;
                $(this).css({fill: "#55B047"});


            })



        }
        )};

    hoverRegionEfect( )





    $( window ).resize(function() {
        hoverEffect()
    });






});
