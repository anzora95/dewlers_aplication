function blinker() {
    var element = document.getElementById("blink");
    var element2 = document.getElementById("blink2");
    element.classList.add("blink_me");
    element2.classList.add("blink_me");
    console.log(element);
}

$(document).ready(
    function()
    {
        $(".option").click(
            function(event)
            {
                $(this).addClass("active").siblings().removeClass("active");
            }
        );
    });


