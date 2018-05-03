// nav bar

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

// faq page

$(document).ready(function(){
    $("#p1").hide();
    $("#show1").click(function(){
        $("#p1").toggle();
    });
});

$(document).ready(function(){
    $("#p2").hide();
    $("#show2").click(function(){
        $("#p2").toggle();
    });
});
    
$(document).ready(function(){
    $("#p3").hide();
    $("#show3").click(function(){
        $("#p3").toggle();
    });
});
    
$(document).ready(function(){
    $("#p4").hide();
    $("#show4").click(function(){
        $("#p4").toggle();
    });
});
    
$(document).ready(function(){
    $("#p5").hide();
    $("#show5").click(function(){
        $("#p5").toggle();
    });
});
    
$(document).ready(function(){
    $("#p6").hide();
    $("#show6").click(function(){
        $("#p6").toggle();
    });
});
    
$(document).ready(function(){
    $("#p7").hide();
    $("#show7").click(function(){
        $("#p7").toggle();
    });
});
    
$(document).ready(function(){
    $("#p8").hide();
    $("#show8").click(function(){
        $("#p8").toggle();
    });
});
    
$(document).ready(function(){
    $("#p9").hide();
    $("#show9").click(function(){
        $("#p9").toggle();
    });
});
    
$(document).ready(function(){
    $("#p10").hide();
    $("#show10").click(function(){
        $("#p10").toggle();
    });
});

var ifOnAdminPage = document.getElementById("scroll_button");

if(ifOnAdminPage){
    window.onscroll = function() {scrollFunction()};
}

function scrollFunction() {
    if (document.body.scrollTop > 1300 || document.documentElement.scrollTop > 1300) {
        document.getElementById("scroll_button").style.display = "block";
    } else {
        document.getElementById("scroll_button").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}