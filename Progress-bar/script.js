$(document).ready(function () {
    $("#uploadBtn").click(function () {
      $("#message").hide(); // Reset message
      $("#progressBar").css("width", "0%");
  
      $("#progressBar").animate(
        { width: "100%" },
        5000,
        function () {
          $("#message").fadeIn(); // Show message when done
        }
      );
    });
  });
  