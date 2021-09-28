$(document).ready(function(){
    $(".advertisement").owlCarousel({
        loop:true,
        margin:10,
        items:1,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });
    $(document).on('click', '.flag',function(){
        if(!$(this).hasClass("active")){
            $(this).addClass("active");
        }
        else{
            $(this).removeClass("active");
        }
    });
    $(document).on('click', '.vote',function(){
        if(!$(this).hasClass("active")){
            $(this).addClass("active");
        }
        else{
            $(this).removeClass("active");
        }
    });
});
function post(){
    document.getElementById("main-content").style.display="none";
    document.getElementById("post-question").style.display="block";
}
function cancel(){
    document.getElementById("main-content").style.display="block";
    document.getElementById("post-question").style.display="none";
}

