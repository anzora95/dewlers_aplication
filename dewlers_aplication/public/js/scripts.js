function blinker() {
    var element = document.getElementById("blink");
    var element2 = document.getElementById("blink2");
    element.classList.add("blink_me");
    element2.classList.add("blink_me");
    console.log(element);
}

function createdewl() {

    $('#exampleModalCenter').modal('toggle');
}

// DATA TABLE
$(document).ready(function() {
    $('#example').DataTable();
} );

$(document).ready(function() {
    $('#example2').DataTable();
} );

$(document).ready(function() {
    $('#example3').DataTable();
} );


$( function() {
    $( "#tabs" ).tabs();
} );

