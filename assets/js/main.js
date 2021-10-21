$(document).ready(function(){
    $(".advertisement").owlCarousel({
        loop:true,
        margin:10,
        items:1,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true
    });
    //function report
    $(document).on('click', '.flag',function(){
        if(!$(this).hasClass("active")){
            $(this).addClass("active");
        }
        else{
            $(this).removeClass("active");
        }
    });
    //function vote
    $(document).on('click', '.vote',function(){
        if(!$(this).hasClass("active")){
            $(this).addClass("active");
        }
        else{
            $(this).removeClass("active");
        }
    });
    //function load question
    
});

function post(){
    $('#main-content').addClass("class-none");
    $('#post-question').removeClass("class-none");
    // document.getElementById("post-question").removeClass("class-none");
    // document.getElementById("main-content").addClass("class-none");
}
function cancel(){
    $('#post-question').addClass("class-none");
    $('#main-content').removeClass("class-none");
    // document.getElementById("post-question").addClass("class-none");
    // document.getElementById("main-content").removeClass("class-none");
}

//load main page and post question page
$(document).ready(function() {
    $(".change-button").click(function(event) {
        
        var idButton=event.target.id;

        $.ajax({
            url:"php/change_page_index.php",
            method:"POST",
            data: {idButton:idButton},
            dataType:'html',
            success:function(data) 
            {   
                $("#main-content").html(data); 
                // alert("OK");
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});


//Load content question
$(document).ready(function() {
    $(".question-content").click(function(event) {
        
        var idQuestion=$(this).attr("id");
        event.preventDefault();
        $.ajax({
            url:"php/loadpagequestion.php",
            method:"POST",
            data: {idQuestion:idQuestion},
            success:function(data) 
            {   
                window.location.href="question.php";
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});
//Load category link
$(document).ready(function() {
    $(".category-item-link").click(function(event) {
        
        var nameCategory=event.target.id;
        $.ajax({
            url:"php/loadindex.php",
            method:"POST",
            data: {nameCategory:nameCategory},
            dataType:'html',
            success:function(data) 
            {   
                $("#index_load").html(data); 
               // alert("OK");
            },
            error:function(data)
            {
                alert("Lỗi load item");
            }
        });
    });
});
//Search
// $(document).ready(function() {
//     $("#search").click(function(event) {
        
//         var nameCategory=event.target.id;
//         $.ajax({
//             url:"php/loadindex.php",
//             method:"POST",
//             data: {nameCategory:nameCategory},
//             dataType:'html',
//             success:function(data) 
//             {   
//                 $("#index_load").html(data); 
//                // alert("OK");
//             },
//             error:function(data)
//             {
//                 alert("Lỗi load item");
//             }
//         });
//     });
// });


//Vote
$(document).ready(function() {
    $(".vote").click(function(event) {
        
        var id=$(this).attr("id");
        event.preventDefault();
        $.ajax({
            url:"php/vote.php",
            method:"POST",
            data: {id:id},
            // dataType:'html',
            success:function(data) 
            {   
                // alert(data);
                // window.location.reload();
                $('.'+id).html(data);
            },
            error:function(data)
            {
            }
        });
    });
});

//Flag
$(document).ready(function() {
    $(".flag").click(function(event) {
        
        var idFlag = $(this).attr("id");
        event.preventDefault();
        $.ajax({
            url:"php/flag.php",
            method:"POST",
            data: {idFlag:idFlag},
            dataType:'html',
            success:function(data) 
            {   
                alert(data);
                window.location.reload();
            },
            error:function(data)
            {
            }
        });
    });
});