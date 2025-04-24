$(document).ready(function(){
    $(".question").click(function(){
        $(this).toggleClass("active").next(".answer").slideToggle();
    });
});