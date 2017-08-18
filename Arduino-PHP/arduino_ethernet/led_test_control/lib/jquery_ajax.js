$(document).on("change", "#red,#green,#blue", function(){
    $.ajax({
         url: 'http://arduino.dev/led_test_control/process.php',
         type: "post",
         data: $("#myform").serialize(),
         success: function(){
             $.ajax({
                url: 'http://arduino.dev/led_test_control/display.php',
                type: "GET",
                data: "html",
                success: function(response) {
                    $("#response_one").hide();
                    $("#response").html(response);
                }
            });
             
         }
    });
    return false;
});
