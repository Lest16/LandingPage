var button = $(".download-button");
/*button.addEventListener("click", function (e) {
    alert("Hello world");
    e.preventDefault();
})*/
button.on("click", function (e) {
    alert("Hello world");
    e.preventDefault();
})

$(".slick-container").slick({dots:true});

$(".form").on("submit", sendForm);

function sendForm(e) {
    e.preventDefault();
    //console.log("привет");
    var data = $(".form").serialize();
    console.dir(data);
}

