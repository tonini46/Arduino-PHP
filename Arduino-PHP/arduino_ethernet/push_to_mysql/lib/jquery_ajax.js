$(document).on("change", "#red,#green,#blue", function() {
    
            $.ajax({
                url: 'http://arduino.dev/led_on_off/display.php',
                type: "GET",
                data: "html",
                success: function(response) {
                    $("#response_one").hide();
                    $("#response").html(response);
                }
            });
       
    return false;

});

    