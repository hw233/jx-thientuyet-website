$(document).ready(function () {
    $("#activity li .sub-nav").hide();
    $("#activity li").live("click", function () {
        var a = document.getElementById("activity").getElementsByTagName("li");
        for (i = 0; i < a.length; i++)a.item(i).className = "";
        !1 == $(this).children(".sub-nav").is(":visible") && $("#activity li .sub-nav").slideUp(300);
        $(this).addClass("active");
        $(this).children(".sub-nav").slideToggle(100)
    });
    $("#activity li .sub-nav:eq(0)").show();


    $("#accordion li .sub-nav").hide();
    $("#accordion li").live("click", function () {
        var a = document.getElementById("accordion").getElementsByTagName("li");
        for (i = 0; i < a.length; i++)a.item(i).className = "";
        !1 == $(this).children(".sub-nav").is(":visible") && $("#accordion li .sub-nav").slideUp(300);
        $(this).addClass("active");
        $(this).children(".sub-nav").slideToggle(300)
    });
    //$("#accordion li .sub-nav:eq(1)").show();

    $('#ui-tabs .cnt').hide();
    $('#ui-tabs .cnt:first').show();
    $('#ui-tabs ul.header li:first').addClass('active');
    $('#ui-tabs ul.header li a').hover(function () {
        $('#ui-tabs ul.header li').removeClass('active');
        $(this).parent().addClass('active');
        var currentTab = $(this).attr('href');
        $('#ui-tabs .cnt').hide();
        $(currentTab).show();
        return false;
    });

    $('#ui-tabs-1 .cnt').hide();
    $('#ui-tabs-1 .cnt:first').show();
    $('#ui-tabs-1 ul.header li:first').addClass('active');
    $('#ui-tabs-1 ul.header li a').hover(function () {
        $('#ui-tabs-1 ul.header li').removeClass('active');
        $(this).parent().addClass('active');
        var currentTab = $(this).attr('href');
        $('#ui-tabs-1 .cnt').hide();
        $(currentTab).show();
        return false;
    });

    $('#ui-imgs .bigImg li').hide();
    $('#ui-imgs .bigImg li:first').show();
    $('#ui-imgs .tab_view ul li:first').addClass('active');
    $('#ui-imgs .tab_view ul li a').click(function () {
        $('#ui-imgs .tab_view ul li').removeClass('active');
        $(this).parent().addClass('active');
        var currentTab = $(this).attr('href');
        $('#ui-imgs .bigImg li').hide();
        $(currentTab).show();
        return false;
    });

    $('a#linkTop').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 300);
        return false;
    });

});