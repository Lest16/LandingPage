$(".slick-container").slick({dots:true});
$(".form").on("submit", sendForm);

function sendForm(e) {
    e.preventDefault();
    var data = $(".form").serialize();
    $('input').each(function(){
        $(this).removeClass('error-input');
    });
    $.ajax({
        url :"ajaxForm.php",
        type : "POST",
        data: data,
        dataType: "json",
        success : function (data) {
            console.dir(data);

            if(data.result == 'success'){
                $(".form")[0].reset();
                $(".contact-form").hide();
                $(".sendFormSuccess").show();
                $(".sendFormSuccess").addClass("js-flex");

            }else{
                for(var errorField in data.fieldError){
                    $('input[name='+errorField+']').addClass('error-input');
                }
            }
        }
    })
}

ymaps.ready(function () {

    var myMap = new ymaps.Map('ymap', {
            center: [59.930150, 30.374750],
            zoom: 17,
            behaviors: ['default', 'scrollZoom'],
            controls: ['zoomControl']
        }, {
            searchControlProvider: 'yandex#search'
        }),

        myPlacemark = new ymaps.Placemark([59.930150, 30.374750],

            {
                iconLayout: 'default#image',
                iconImageHref: '/wp-content/themes/bbs-theme/img/map-marker.png',
                iconImageSize: [66, 90],
                iconImageOffset: [-33, -90]
            });

    myMap.geoObjects.add(myPlacemark);
    myMap.behaviors.disable('scrollZoom');

});


